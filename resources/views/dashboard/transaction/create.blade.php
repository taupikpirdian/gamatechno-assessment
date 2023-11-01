@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $title_sub2 }} {{ $title }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form id="storeTrx" method="post" action="{{ $route_store }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Customer</label>
                                    <select class="form-control bg-light border-light" name="user_id" id="user_id" required>
                                        <option value="">Pilih Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Purchase Date</label>
                                    <input type="text" class="form-control date" name="date" id="date" required>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Product</label>
                                    <select class="form-control bg-light border-light trx" name="product" id="product" required>
                                        <option value="">Pilih Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Dicount</label>
                                    <input type="number" class="form-control trx" name="discount" id="discount" required>
                                </div>
                            </div>

                            <hr>

                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <label class="form-label">Subtotal</label>
                                    <input type="text" class="form-control" name="sub_total" id="sub_total" readonly>
                                </div>
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <label class="form-label">Discount(%)</label>
                                    <input type="text" class="form-control" name="percent_discount" id="percent_discount" readonly>
                                </div>
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <label class="form-label">Cashback</label>
                                    <input type="text" class="form-control" name="cashback" id="cashback" readonly>
                                </div>
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <label class="form-label">Total</label>
                                    <input type="text" class="form-control" name="total" id="total" readonly>
                                </div>
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <label class="form-label red-bullet">Payment User</label>
                                    <input type="text" class="form-control" name="payment_user" id="payment_user" required>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a class="btn btn-primary" href="/transaction">Kembali</a>
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection

@push('after-scripts')
    <script>
        $(document).ready(function (e) {
            $(document).on('change', '.trx', function() {
                var product = document.getElementById("product").value;
                var discount = document.getElementById("discount").value;
                if (product && discount) {
                    check(product, discount);
                }
            });

            $(document).on('keyup', '#discount', function() {
                var product = document.getElementById("product").value;
                var discount = document.getElementById("discount").value;
                if (product && discount) {
                    check(product, discount);
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function check(product, discount){
                $.ajax({
                    url: '/transaction/check/',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'product': product,
                        'discount': discount
                    },
                    success: function(data) {
                        if (data.success) {
                            var sub_total = data.sub_total
                            var total = data.total
                            var cashback = data.cashback
                            var percent_discount = data.percent_discount

                            $('#sub_total').val(formatRupiah(sub_total.toString()));
                            $('#total').val(formatRupiah(total.toString()));
                            $('#cashback').val(formatRupiah(cashback.toString()));
                            $('#percent_discount').val(percent_discount);
                        }
                    }
                });
            }

            var payment_user = document.getElementById('payment_user');
            payment_user.addEventListener('keyup', function(e)
            {
                payment_user.value = formatRupiah(this.value);
            });

            function formatRupiah(angka, prefix)
            {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split    = number_string.split(','),
                    sisa     = split[0].length % 3,
                    rupiah     = split[0].substr(0, sisa),
                    ribuan     = split[0].substr(sisa).match(/\d{3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            $('#storeTrx').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{ url('/transaction/store')}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        var status = data.success;
                        if(status){
                            Swal.fire({
                                title: 'Good job!',
                                text: data.message,
                                icon: 'success',
                                confirmButtonColor: "#f46a6a",
                                cancelButtonColor: "#3051d3"
                            }).then(function() {
                                window.location.href = "{{URL::to('transaction')}}"
                            });
                        }else{
                            Swal.fire({
                                title: 'Oops!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonColor: "#f46a6a",
                                cancelButtonColor: "#3051d3"
                            })
                        }
                    },
                    error: function(data){
                        console.log(data);
                    }
                });
            });

        });
    </script>
@endpush
