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
                <table id="scroll-horizontal-v2" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pasal</th>
                            <th>Asal KN</th>
                            <th>Tahap II</th>
                            <th>Perkara</th>
                            <th>Status</th>
                            <th>Dokumen Lengkap</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->pasal}}</td>
                                <td>{{$data->institutionCategoryPart ? $data->institutionCategoryPart->name : ""}}</td>
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
                                <td>
                                    @if($data->status == "DITOLAK-PRA-EKSPOSE")
                                    <span class="badge badge-soft-danger">{{ $data->status  }}</span>
                                    @else
                                    <span class="badge badge-soft-info">{{ $data->status  }}</span>
                                    @endif
                                </td>
                                @if($data->status == "EKSPOSE")
                                <td class="text-center">
                                    @include('dashboard.component.row_template_report_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "Dokumen RJ", 
                                        'dataName' => "dokumen_rj",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileMergeEkspose ? $data->fileMergeEkspose->name : '']),
                                        'fileName' => $data->fileMergeEkspose ? $data->fileMergeEkspose->name : "",
                                        'fileCreatedAt' => $data->fileMergeEkspose ? $data->fileMergeEkspose->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => false,
                                        'can_update' => false,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                @else
                                <td class="text-center">
                                    @include('dashboard.component.row_template_report_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "Dokumen RJ", 
                                        'dataName' => "dokumen_rj",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileMergeTolakEkspose ? $data->fileMergeTolakEkspose->name : '']),
                                        'fileName' => $data->fileMergeEkspose ? $data->fileMergeEkspose->name : "",
                                        'fileCreatedAt' => $data->fileMergeEkspose ? $data->fileMergeEkspose->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => false,
                                        'can_update' => false,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                @endif
                                <td>{{$data->created_at}}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @if($data->status == "EKSPOSE" && $data->fileMergeEkspose)
                                                <li><a href="#" class="dropdown-item update" data-id="{{ $data->uuid  }}" data-status="LENGKAP"><i class="ri-check-line align-bottom me-2 text-muted"></i> Kirim dan Selesaikan</a></li>
                                                {{-- <li><a href="#" class="dropdown-item update" data-id="{{ $data->uuid  }}" data-status="REVISI-EKSPOSE"><i class="ri-close-line align-bottom me-2 text-muted"></i> Revisi</a></li> --}}
                                            @elseif ($data->status == "TOLAK-EKSPOSE" && $data->fileMergeEkspose)
                                                <li><a href="#" class="dropdown-item update" data-id="{{ $data->uuid  }}" data-status="DITOLAK-LENGKAP"><i class="ri-check-line align-bottom me-2 text-muted"></i> Kirim dan Selesaikan</a></li>
                                                {{-- <li><a href="#" class="dropdown-item update" data-id="{{ $data->uuid  }}" data-status="REVISI-TOLAK-EKSPOSE"><i class="ri-close-line align-bottom me-2 text-muted"></i> Revisi</a></li> --}}
                                            @endif
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

@endsection

@push ('after-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#scroll-horizontal-v2", {
                scrollX: true,
                order: [[7, "desc"]] // This orders the first column in descending order
            });
        })
    </script>
    <script type="text/javascript">
        $('.update').click(function() {
            var uuid = $(this).data('id');
            var status = $(this).data('status');
            var message = "Selesaikan data ekspose";
            if(status == "REVISI-EKSPOSE" || status == "REVISI-TOLAK-EKSPOSE"){
                var message = "Revisi data!";
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
                    $('#loading').removeClass("d-none");
                    $.ajax({
                        url: '/ekspose/finish/' + uuid,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'status': status
                        },
                        success: function(data) {
                            $('#loading').addClass("d-none");
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
    </script>
@endpush