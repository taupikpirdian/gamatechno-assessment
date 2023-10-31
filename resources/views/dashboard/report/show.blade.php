@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Detail Berkas</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-md-4">
                            <div>
                                <label class="form-label red-bullet">File Combine</label><br>
                                <a href="{!! route('report.show', [$data->uuid, $data->fileSpdp->name]) !!}" target="_blank" class="btn btn-sm btn-success"><i class="ri-eye-line align-middle me-1"></i> Lihat</a>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-4">
                            <div>
                                <label class="form-label red-bullet">PPT</label><br>
                                <a href="{!! route('report.show', [$data->uuid, $data->filePpt->name]) !!}" target="_blank" class="btn btn-sm btn-success"><i class="ri-eye-line align-middle me-1"></i> Lihat</a>
                            </div>
                        </div>

                        <div class="col-xxl-4 col-md-4">
                            <div>
                                <label class="form-label red-bullet">Video</label><br>
                                <a href="{!! route('report.show', [$data->uuid, $data->fileVideo->name]) !!}" target="_blank" class="btn btn-sm btn-success"><i class="ri-eye-line align-middle me-1"></i> Lihat</a>
                            </div>
                        </div>

                        <div class="col-xxl-12 col-md-12">
                            <div>
                                <label class="form-label red-bullet">Kasus Posisi</label>
                                <textarea class="form-control" id="desc" name="desc" rows="4" cols="50" disabled>{{$data->posisi}}</textarea>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection


@push ('after-scripts')

@endpush