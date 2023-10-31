@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">FORM EKSPOSE - TERIMA</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form id="fileUploadForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">RJ-35</label>
                                    <input type="file" class="form-control bg-light border-light" id="rj_35" name="rj_35" onchange="validationFile('rj_35')" required/>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">RJ-36</label>
                                    <input type="file" class="form-control bg-light border-light" id="rj_36" name="rj_36" onchange="validationFile('rj_36')" required/>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">RJ-37</label>
                                    <input type="file" class="form-control bg-light border-light" id="rj_37" name="rj_37" onchange="validationFile('rj_37')" required/>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Dokumentasi</label>
                                    <input type="file" class="form-control bg-light border-light" id="dokumentasi" name="dokumentasi" onchange="validationFile('dokumentasi')" required/>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a class="btn btn-primary" href="/pra-ekspose/accept">Kembali</a>
                                <button class="btn btn-info" type="submit">Submit</button>
                            </div>
                        </div>
                        <div class="row d-none" id="progressBar">
                            <div class="col-lg-12 text-end">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection


@push ('after-scripts')
    <script>
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#fileUploadForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type:'POST',
                    url: "{{ url('/pra-ekspose/accept/upload/' . $data->uuid)}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        var message = data.success;
                        if(message){
                            Swal.fire({
                                title: 'Good job!',
                                text: message,
                                icon: 'success',
                                confirmButtonColor: "#f46a6a",
                                cancelButtonColor: "#3051d3"
                            }).then(function() {
                                window.location.href = "{{URL::to('pra-ekspose/index')}}"
                            });
                        }else{
                            Swal.fire({
                                title: 'Oops!',
                                text: data.error,
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