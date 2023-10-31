@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title mb-0">{{$title}}</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tbody>
                        <tr>
                            <th class="ps-0" scope="row">Title :</th>
                            <td class="text-muted">{{$data->title}}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Highlight :</th>
                            <td class="text-muted">{{$data->highlight}}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Status :</th>
                            <td class="text-muted">
                                @if($data->status == "active")
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Non Active</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Image :</th>
                            <td class="text-muted">
                                <img src="{{ asset('storage/blog/' . $data->image) }}" alt="Image Alt Text" width="300">
                            </td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">File Syarat Formil RJ Narkotika :</th>
                            <td class="text-muted">
                                <a class="btn btn-info" href="{!! route('blog.download', $data->file_syarat_formil_rj_narkotika) !!}"><i class="ri-file-download-line" aria-hidden="true"></i> Download</a>
                            </td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">File Syarat Formil RJ Oharda/Kamneg :</th>
                            <td class="text-muted">
                                <a class="btn btn-info" href="{!! route('blog.download', $data->file_syarat_formil_rj_oharda) !!}"><i class="ri-file-download-line" aria-hidden="true"></i> Download</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-4">
                            <label class="form-label">Detail :</label>
                        </div>
                        <div class="col-8">
                            {!! $data->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection