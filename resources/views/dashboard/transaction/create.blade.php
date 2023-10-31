@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $title_sub2 }} {{ $title }}</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form method="post" action="{{ $route_store }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-4 col-md-4">
                                <div>
                                    <label class="form-label red-bullet">Purchase Date</label>
                                    <input type="text" class="form-control date" name="date" id="date" required> 
                                </div>
                            </div>
                            <div class="col-xxl-4 col-md-4">
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
                            <div class="col-xxl-4 col-md-4">
                                <div>
                                    <label class="form-label red-bullet">Dicount</label>
                                    <input type="text" class="form-control trx" name="discount" id="discount" required>
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
                                    <label class="form-label">Total</label>
                                    <input type="text" class="form-control" name="total" id="total" readonly>
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
                                    <label class="form-label">Payment User</label>
                                    <input type="text" class="form-control" name="payment_user" id="payment_user">
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
                            $('#sub_total').val(data.sub_total);
                            $('#total').val(data.total);
                            $('#cashback').val(data.cashback);
                            $('#percent_discount').val(data.percent_discount);
                        }
                    }
                });
            }

        });
    </script>
@endpush