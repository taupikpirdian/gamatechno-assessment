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
                        <div class="col-6">
                            <div class="alert alert-info alert-border-left alert-dismissible fade show" role="alert">
                                <i class="ri-alert-line me-3 align-middle fs-16"></i>
                                    <label style="color: red">*</label> File wajib upload
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal-v2" class="table nowrap align-middle" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pasal</th>
                            <th>Asal KN</th>
                            <th>Tahap II</th>
                            <th>Perkara</th>
                            <th>Checklist <label style="color: red">*</label></th>
                            <th>SPDP <label style="color: red">*</label></th>
                            <th>P-16 <label style="color: red">*</label></th>
                            <th>BA-14 <label style="color: red">*</label></th>
                            <th>Rendak <label style="color: red">*</label></th>
                            <th>P-21 <label style="color: red">*</label></th>
                            <th>P-16A <label style="color: red">*</label></th>
                            <th>T-7</th>
                            <th>BA-BB</th>
                            <th>Fakta Integritas / Kesepakatan Perdamaian <label style="color: red">*</label></th>
                            <th>Nota Pendapat RJ <label style="color: red">*</label></th>
                            <th>SOP Form-07 <label style="color: red">*</label></th>
                            <th>RJ 1-33 <label style="color: red">*</label></th>
                            <th>RJ 33 (Word) <label style="color: red">*</label></th>
                            <th>Permohonan Perdamaian Tersangka dan Korban <label style="color: red">*</label></th>
                            <th>Kwitansi</th>
                            <th>Visum</th>
                            <th>Dokumentasi <label style="color: red">*</label></th>
                            <th>PPT <label style="color: red">*</label></th>
                            <th>Video <label style="color: red">*</label></th>
                            @hasanyrole('seksi-kejati')
                            <th>Pengantar Ekspose Jampidum <label style="color: red">*</label></th>
                            @endhasanyrole
                            <th>Status</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->pasal}}</td>
                                    <td>{{$data->institutionCategoryPart->name}}</td>
                                    <td>{{$data->tahap_2}}</td>
                                    <td>
                                        @if($data->type_seksi == "SEK_OH")
                                            OHARDA
                                        @elseif($data->type_seksi == "SEK_KAM")
                                            KAMNEGTIBUM
                                        @elseif($data->type_seksi == "SEK_NAR")
                                            NARKOTIKA
                                        @elseif($data->type_seksi == "SEK_TER")
                                            TERORISME
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Checklist", 
                                            'dataName' => "checklist",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileChecklist ? $data->fileChecklist->name : ""]),
                                            'fileName' => $data->fileChecklist ? $data->fileChecklist->name : "",
                                            'fileCreatedAt' => $data->fileChecklist ? $data->fileChecklist->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "SPDP", 
                                            'dataName' => "spdp",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileSpdp ? $data->fileSpdp->name : ""]),
                                            'fileName' => $data->fileSpdp ? $data->fileSpdp->name : "",
                                            'fileCreatedAt' => $data->fileSpdp ? $data->fileSpdp->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "P16", 
                                            'dataName' => "p16",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileP16 ? $data->fileP16->name : ""]),
                                            'fileName' => $data->fileP16 ? $data->fileP16->name : "",
                                            'fileCreatedAt' => $data->fileP16 ? $data->fileP16->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "BA-14", 
                                            'dataName' => "ba14",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileBa14 ? $data->fileBa14->name : ""]),
                                            'fileName' => $data->fileBa14 ? $data->fileBa14->name : "",
                                            'fileCreatedAt' => $data->fileBa14 ? $data->fileBa14->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Rendak", 
                                            'dataName' => "rendak",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileRendak ? $data->fileRendak->name : ""]),
                                            'fileName' => $data->fileRendak ? $data->fileRendak->name : "",
                                            'fileCreatedAt' => $data->fileRendak ? $data->fileRendak->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "P-21", 
                                            'dataName' => "p21",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileP21 ? $data->fileP21->name : ""]),
                                            'fileName' => $data->fileP21 ? $data->fileP21->name : "",
                                            'fileCreatedAt' => $data->fileP21 ? $data->fileP21->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "P-16A", 
                                            'dataName' => "p16a",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileP16A ? $data->fileP16A->name : ""]),
                                            'fileName' => $data->fileP16A ? $data->fileP16A->name : "",
                                            'fileCreatedAt' => $data->fileP16A ? $data->fileP16A->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "T-7", 
                                            'dataName' => "t7",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileT7 ? $data->fileT7->name : ""]),
                                            'fileName' => $data->fileT7 ? $data->fileT7->name : "",
                                            'fileCreatedAt' => $data->fileT7 ? $data->fileT7->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "BA-BB", 
                                            'dataName' => "ba_bb",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileBaBb ? $data->fileBaBb->name : ""]),
                                            'fileName' => $data->fileBaBb ? $data->fileBaBb->name : "",
                                            'fileCreatedAt' => $data->fileBaBb ? $data->fileBaBb->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Fakta Integritas / Kesepakatan Perdamaian", 
                                            'dataName' => "fakta",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileFaktaIntegritas ? $data->fileFaktaIntegritas->name : ""]),
                                            'fileName' => $data->fileFaktaIntegritas ? $data->fileFaktaIntegritas->name : "",
                                            'fileCreatedAt' => $data->fileFaktaIntegritas ? $data->fileFaktaIntegritas->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Nota Pendapat RJ", 
                                            'dataName' => "nota",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileNotaPendapatRj ? $data->fileNotaPendapatRj->name : ""]),
                                            'fileName' => $data->fileNotaPendapatRj ? $data->fileNotaPendapatRj->name : "",
                                            'fileCreatedAt' => $data->fileNotaPendapatRj ? $data->fileNotaPendapatRj->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "SOP FORM 7", 
                                            'dataName' => "sop_form_7",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileSopForm7 ? $data->fileSopForm7->name : ""]),
                                            'fileName' => $data->fileSopForm7 ? $data->fileSopForm7->name : "",
                                            'fileCreatedAt' => $data->fileSopForm7 ? $data->fileSopForm7->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "RJ 1-33", 
                                            'dataName' => "rj_1_33",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileRj133 ? $data->fileRj133->name : ""]),
                                            'fileName' => $data->fileRj133 ? $data->fileRj133->name : "",
                                            'fileCreatedAt' => $data->fileRj133 ? $data->fileRj133->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "RJ 33 (Word)", 
                                            'dataName' => "rj_33_word",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileRj33Word ? $data->fileRj33Word->name : ""]),
                                            'fileName' => $data->fileRj33Word ? $data->fileRj33Word->name : "",
                                            'fileCreatedAt' => $data->fileRj33Word ? $data->fileRj33Word->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Permohonan Perdamaian", 
                                            'dataName' => "permohonan_perdamaian",
                                            'dataHref' => route('application.download', [$data->uuid, $data->filePermohonanPerdamaian ? $data->filePermohonanPerdamaian->name : ""]),
                                            'fileName' => $data->filePermohonanPerdamaian ? $data->filePermohonanPerdamaian->name : "",
                                            'fileCreatedAt' => $data->filePermohonanPerdamaian ? $data->filePermohonanPerdamaian->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Kwitansi", 
                                            'dataName' => "kwitansi",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileKwitansi ? $data->fileKwitansi->name : ""]),
                                            'fileName' => $data->fileKwitansi ? $data->fileKwitansi->name : "",
                                            'fileCreatedAt' => $data->fileKwitansi ? $data->fileKwitansi->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Visum", 
                                            'dataName' => "visum",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileVisum ? $data->fileVisum->name : ""]),
                                            'fileName' => $data->fileVisum ? $data->fileVisum->name : "",
                                            'fileCreatedAt' => $data->fileVisum ? $data->fileVisum->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Dokumentasi", 
                                            'dataName' => "dokumentasi",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileDokumentasi ? $data->fileDokumentasi->name : ""]),
                                            'fileName' => $data->fileDokumentasi ? $data->fileDokumentasi->name : "",
                                            'fileCreatedAt' => $data->fileDokumentasi ? $data->fileDokumentasi->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "PPT", 
                                            'dataName' => "ppt",
                                            'dataHref' => route('application.download', [$data->uuid, $data->filePpt ? $data->filePpt->name : ""]),
                                            'fileName' => $data->filePpt ? $data->filePpt->name : "",
                                            'fileCreatedAt' => $data->filePpt ? $data->filePpt->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadModalUpdate"
                                        ])
                                    </td>
                                    <td class="text-center">
                                        @include('dashboard.component.row_template_video', [
                                            'uuid' => $data->uuid, 
                                            'dataLabel' => "Video", 
                                            'dataName' => "video",
                                            'dataHref' => route('application.download', [$data->uuid, $data->fileVideo ? $data->fileVideo->name : ""]),
                                            'fileName' => $data->fileVideo ? $data->fileVideo->name : "",
                                            'fileCreatedAt' => $data->fileVideo ? $data->fileVideo->created_at : "",
                                            'status' => $data->status,
                                            'modal' => "uploadVideoModal"
                                        ])
                                    </td>
                                    @hasanyrole('seksi-kejati')
                                        <td class="text-center">
                                            @include('dashboard.component.row_template', [
                                                'uuid' => $data->uuid, 
                                                'dataLabel' => "Pengantar Ekspose Jampidum", 
                                                'dataName' => "pengantar_jampidum",
                                                'dataHref' => route('application.download', [$data->uuid, $data->filePengantarEksposeJampidum ? $data->filePengantarEksposeJampidum->name : ""]),
                                                'fileName' => $data->filePengantarEksposeJampidum ? $data->filePengantarEksposeJampidum->name : "",
                                                'fileCreatedAt' => $data->filePengantarEksposeJampidum ? $data->filePengantarEksposeJampidum->created_at : "",
                                                'status' => $data->status,
                                                'modal' => "uploadModalUpdate"
                                            ])
                                        </td>
                                    @endhasanyrole
                                    <td>
                                        @if($data->status == "DICANCEL")
                                            <span class="badge badge-soft-warning">{{ $data->status  }}</span>
                                        @elseif($data->status == "DITERIMA" || $data->status == "PRA-EKSPOSE")
                                            <span class="badge badge-soft-info">{{ $data->status  }}</span>
                                        @elseif($data->status == "DIKIRIM")
                                            <span class="badge badge-soft-info">{{ $data->status  }}</span>
                                        @else
                                            <span class="badge badge-soft-info">{{ $data->status  }}</span>
                                        @endif
                                    </td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                @hasanyrole('kejari')
                                                    @if(!$data->fileSpdp)
                                                        <li><a href="{{ route('upload.pages', ['uuid' => $data->uuid]) }}" class="dropdown-item"><i class="ri-file-upload-line align-bottom me-2 text-muted"></i> Lengkapi Berkas</a></li>
                                                    @endif
                                                    @if($data->fileSpdp && $data->fileVideo && $data->status == "DITERIMA" && $data->fileChecklist)
                                                        <li><a href="#" class="dropdown-item modalSendFile" data-id="{{ $data->uuid  }}" data-bs-toggle="modal" data-bs-target="#modalSendFile"><i class="ri-file-upload-line align-bottom me-2 text-muted"></i> Kirim Berkas</a></li>
                                                    @endif
                                                    @if($data->status == "DITERIMA")
                                                        <li><a href="#" class="dropdown-item cancelData" data-id="{{ $data->uuid  }}"><i class="ri-close-circle-line align-bottom me-2 text-muted"></i> Batal</a></li>
                                                    @endif
                                                    @if($data->status == "REVISI-PENERIMAAN")
                                                        <li><a href="#" class="dropdown-item detailRevisiModal" data-desc="{{ $data->logRevision->desc  }}" data-title="{{ $data->logRevision->title  }}" data-bs-toggle="modal" data-bs-target="#detailRevisiModal"><i class="ri-eye-line align-bottom me-2 text-muted"></i> Detail Revisi</a></li>
                                                        <li><a href="#" class="dropdown-item revisionModal" data-id="{{ $data->uuid  }}" data-status="DIKIRIM" data-bs-toggle="modal" data-bs-target="#revisiModal"><i class="ri-upload-line align-bottom me-2 text-muted"></i> Kirim Revisi</a></li>
                                                    @endif
                                                @endhasanyrole
                                                @hasanyrole('seksi-kejati')
                                                    @if($data->filePengantarEksposeJampidum && $data->status == "DIKIRIM")
                                                        <li><a href="#" class="dropdown-item sendDataSeksi" data-id="{{ $data->uuid  }}"><i class="ri-file-upload-line align-bottom me-2 text-muted"></i> Kirim Berkas</a></li>
                                                    @endif
                                                    @if($data->status == "DIKIRIM")
                                                        <li><a href="#" class="dropdown-item revisionModal" data-id="{{ $data->uuid  }}" data-status="REVISI-PENERIMAAN" data-bs-toggle="modal" data-bs-target="#revisiModal"><i class="ri-close-line align-bottom me-2 text-muted"></i> Revisi</a></li>
                                                    @endif
                                                @endhasanyrole
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.component.modal_upload')
    @include('dashboard.component.modal_upload_update')
    @include('dashboard.component.modal_upload_video')
    @include('dashboard.component.modal_kirim_berkas')
    @include('dashboard.component.modal_revisi')
@endsection

@push ('after-styles')
@endpush

@push ('after-scripts')
    <script src="{{ asset('assets/js/resumable.min.js') }}"></script>
    <script>
        order = 26
        @hasanyrole('seksi-kejati')
            order = 27
        @endhasanyrole
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#scroll-horizontal-v2", {
                scrollX: true,
                order: [[
                    order, 
                    "desc"
                ]] // This orders the first column in descending order
            });
        })
    </script>

    <script type="text/javascript">
        var uuid;
        $(".uploadVideoModal").click(function(){
            // show data
            state = $(this).data('state');
            if (state == "update") {
                $('#box-download').removeClass("d-none");
                urlHref = $(this).data('href');
                timeUpload = $(this).data('time-file');
                document.getElementById("href-download-video").href = urlHref;
                document.getElementById("time-upload-video").innerHTML = timeUpload;
            }else {
                $('#box-download').addClass("d-none");
            }

            uuid = $(this).data('id');
            let browseFile = $('#browseFile');
            let resumable = new Resumable({
                target: '{{ route('file-upload') }}',
                query:{
                    _token:'{{ csrf_token() }}',
                    id: uuid,
                },
                fileType: ['mp4'],
                chunkSize: 10*1024*1024, // default is 1*1024*1024, this should be less than your maximum limit in php.ini
                headers: {
                    'Accept' : 'application/json',
                },
                testChunks: false,
                throttleProgressCallbacks: 1,
            });

            resumable.assignBrowse(browseFile[0]);
            resumable.on('fileAdded', function (file) { // trigger when file picked
                showProgress();
                resumable.upload() // to actually start uploading.
            });

            resumable.on('fileProgress', function (file) { // trigger when file progress update
                updateProgress(Math.floor(file.progress() * 100));
            });

            resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
                response = JSON.parse(response)
                submit(file, response.filename)
            });

            resumable.on('fileError', function (file, response) { // trigger when there is any error
                alert('file uploading error.')
            });

            let progress = $('.progress');

            function showProgress() {
                progress.find('.progress-bar').css('width', '0%');
                progress.find('.progress-bar').html('0%');
                progress.find('.progress-bar').removeClass('bg-success');
                progress.show();
            }

            function updateProgress(value) {
                progress.find('.progress-bar').css('width', `${value}%`)
                progress.find('.progress-bar').html(`${value}%`)
            }

            function hideProgress() {
                progress.hide();
            }

            function submit(file, nameFile) {
                $(document).ready(function (e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var payload = {
                        uuid: uuid,
                        name_file: nameFile
                    };

                    $.ajax({
                        type:'POST',
                        url: '/restorative-justice/upload-file/save/' + uuid,
                        {{--url: "{{ url('/restorative-justice/upload-file/save/' . $data->uuid)}}",--}}
                        data: payload,
                        success: (data) => {
                            var message = data.success;
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
                        },
                        error: function(data){
                            console.log(data);
                        }
                    });
                });
            }
        });

        $('.cancelData').click(function() {
            var uuid = $(this).data('id');

            Swal.fire({
                title: 'Kamu yakin?',
                text: 'Ini adalah proses cancel pengajuan RJ',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel pengajuan!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/restorative-justice/cancel/' + uuid,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if (data.success) {
                                // Item deleted successfully
                                Swal.fire(
                                    'Canceled!',
                                    'Data berhasil dicancel',
                                    'success'
                                ).then(function() {
                                    window.location.href = "{{URL::to('restorative-justice/accept?m=non-narkotika')}}"
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to cancel the item.',
                                    'error'
                                ).then(function() {
                                    window.location.href = "{{URL::to('restorative-justice/accept?m=non-narkotika')}}"
                                });
                            }
                        }
                    });
                }
            });
        });

        $('.sendDataSeksi').click(function() {
            var uuid = $(this).data('id');
            Swal.fire({
                title: 'Kamu yakin?',
                text: 'Ini adalah proses pra-ekspose',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, lanjutkan!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#loading').removeClass("d-none");
                    $.ajax({
                        url: '/restorative-justice/accept/pra-ekspose/' + uuid,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $('#loading').addClass("d-none");
                            if (data.success) {
                                Swal.fire(
                                    'Berhasil!',
                                    data.success,
                                    'success'
                                ).then(function() {
                                    window.location.href = "{{URL::to('restorative-justice/accept')}}"
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed',
                                    'error'
                                ).then(function() {
                                    window.location.href = "{{URL::to('restorative-justice/accept')}}"
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#loading').addClass("d-none");
                            Swal.fire(
                                'Error!',
                                'AJAX request failed: ' + error,
                                'error'
                            );
                        }
                    });
                }
            });
        });

        $(".modalSendFile").click(function(){
            $('#uuidSendFile').val($(this).data('id'));
        });
    </script>
    <script type="text/javascript">
        $('.update').click(function() {
            var uuid = $(this).data('id');
            var status = $(this).data('status');
            if (status == "EKSPOSE") {
                message = "Setujui Data Pra-Ekspose"
            }else{
                message = "Tolak Data Pra-Ekspose"
            }

            Swal.fire({
                title: 'Kamu yakin?',
                text: message,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/restorative-justice/update-status/' + uuid,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'status': status
                        },
                        success: function(data) {
                            if (data.success) {
                                // Item deleted successfully
                                Swal.fire(
                                    'Berhasil!',
                                    'Data berhasil diupdate',
                                    'success'
                                ).then(function() {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Failed to update the item.',
                                    'error'
                                ).then(function() {
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });

        $(function(){
            $(".revisionModal").click(function(){
                $('#uuid_revision').val($(this).data('id'));
                $('#status_revision').val($(this).data('status'));
            });
        });
        $(function(){
            $(".detailRevisiModal").click(function(){
                $('#title_revision').val($(this).data('title'));
                $('#desc_revision').val($(this).data('desc'));
            });
        });
    </script>
@endpush