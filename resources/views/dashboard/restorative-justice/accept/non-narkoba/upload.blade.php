@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Lengkapi Berkas</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form id="fileUploadForm" method="post" action="{{ route('upload.post.non-narkotika', ['uuid' => $data->uuid]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">LP, SP-DIK, SPDP</label>
                                    <input type="file" class="form-control bg-light border-light" id="spdp" name="spdp" onchange="validationFile('spdp')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">P16</label>
                                    <input type="file" class="form-control bg-light border-light" id="p16" name="p16" onchange="validationFile('p16')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">BA-14</label>
                                    <input type="file" class="form-control bg-light border-light" id="ba14" name="ba14" onchange="validationFile('ba14')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">RENDAK</label>
                                    <input type="file" class="form-control bg-light border-light" id="rendak" name="rendak" onchange="validationFile('rendak')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">P-21</label>
                                    <input type="file" class="form-control bg-light border-light" id="p21" name="p21" onchange="validationFile('p21')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">P-16 A</label>
                                    <input type="file" class="form-control bg-light border-light" id="p16a" name="p16a" onchange="validationFile('p16a')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label">T-7</label>
                                    <input type="file" class="form-control bg-light border-light" id="t7" name="t7" onchange="validationFile('t7')"/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label">BA-BB</label>
                                    <input type="file" class="form-control bg-light border-light" id="ba_bb" name="ba_bb" onchange="validationFile('ba_bb')"/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Fakta Integritas / Kesepakatan Perdamaian</label>
                                    <input type="file" class="form-control bg-light border-light" id="fakta_integritas" name="fakta_integritas" onchange="validationFile('fakta_integritas')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Nota Pendapat RJ</label>
                                    <input type="file" class="form-control bg-light border-light" id="nota_pendapat_rj" name="nota_pendapat_rj" onchange="validationFile('nota_pendapat_rj')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">SOP Form-07</label>
                                    <input type="file" class="form-control bg-light border-light" id="sop_form_07" name="sop_form_07" onchange="validationFile('sop_form_07')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">RJ 1-33</label>
                                    <input type="file" class="form-control bg-light border-light" id="rj_1_33" name="rj_1_33" onchange="validationFile('rj_1_33')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">RJ 33 (Word)</label>
                                    <input type="file" class="form-control bg-light border-light" id="rj_33_word" name="rj_33_word" onchange="validationFileDocx('rj_33_word')" required/>
                                    <p class="text-danger">format file: .docx max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Permohonan Perdamaian Tersangka dan Korban</label>
                                    <input type="file" class="form-control bg-light border-light" id="permohonan_perdamaian" name="permohonan_perdamaian" onchange="validationFile('permohonan_perdamaian')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Dokumentasi</label>
                                    <input type="file" class="form-control bg-light border-light" id="dokumentasi" name="dokumentasi" onchange="validationFile('dokumentasi')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Checklist</label>
                                    <input type="file" class="form-control bg-light border-light" id="checklist" name="checklist" onchange="validationFile('checklist')" required/>
                                    <p class="text-danger">format file: .pdf max file 2Mb</p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a class="btn btn-primary" href="/restorative-justice/accept?m=non-narkotika">Kembali</a>
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
                $('#loading').removeClass("d-none");
                $.ajax({
                    type:'POST',
                    url: "{{ url('/restorative-justice/upload-file/non-narkotika/' . $data->uuid)}}",
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#loading').addClass("d-none");
                        var message = data.success;
                        if(message){
                            Swal.fire({
                                title: 'Good job!',
                                text: message,
                                icon: 'success',
                                confirmButtonColor: "#f46a6a",
                                cancelButtonColor: "#3051d3"
                            }).then(function() {
                                // Reload the page after the user clicks "OK"
                                window.location.href = "{{URL::to('restorative-justice/accept?m=non-narkotika')}}"
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