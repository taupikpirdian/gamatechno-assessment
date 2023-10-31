@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Blogs</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form method="post" action="{{ route('blog.update', $data->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$data->title}}" required>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label red-bullet">Highlight</label>
                                    <input type="text" class="form-control" name="highlight" value="{{$data->highlight}}" required>
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image">
                                    @if($data->image)
                                        <p class="text-danger">If you don't want to update the file, please don't choose it again.</p>
                                        <img class="mt-2" src="{{ asset('storage/blog/' . $data->image) }}" alt="Image Alt Text" width="120">
                                    @endif
                                </div>
                            </div>

                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label">Syarat Formil RJ Narkotika</label>
                                    <input type="file" class="form-control" name="formil_narkotika">
                                    <p class="text-danger">If you don't want to update the file, please don't choose it again.</p>
                                    <a href="{!! route('blog.download', $data->file_syarat_formil_rj_narkotika) !!}"><i class="ri-file-download-line" aria-hidden="true"></i> Download</a>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label class="form-label">Syarat Formil RJ Oharda/Kamneg</label>
                                    <input type="file" class="form-control" name="formil_oharda">
                                    <p class="text-danger">If you don't want to update the file, please don't choose it again.</p>
                                    <a href="{!! route('blog.download', $data->file_syarat_formil_rj_oharda) !!}"><i class="ri-file-download-line" aria-hidden="true"></i> Download</a>
                                </div>
                            </div>

                            <div class="col-xxl-12 col-md-12">
                                <div>
                                    <label class="form-label red-bullet">Detail</label>
                                    <textarea class="summernote" name="content">{{ $data->desc }}</textarea>
                                </div>
                            </div>

                            <div class="mt-4">
                                <a class="btn btn-primary" href="/blogs">Kembali</a>
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