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
                            <th>Dokumen RJ</th>
                            <th>RJ-34</th>
                            <th>RJ-35</th>
                            <th>RJ-36</th>
                            <th>RJ-37</th>
                            <th>Sprint Penempatan Lembaga Rehabilitasi</th>
                            <th>BA-Pelaksanaan Penempatan Lembaga Rehabilitasi</th>
                            <th>P-31</th>
                            <th>P-32</th>
                            <th>P-33</th>
                            <th>P-48</th>
                            <th>BA-17</th>
                            <th>Dokumentasi / Foto</th>
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
                                    @include('dashboard.component.row_template_status', [
                                        'status' => $data->status,
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "Dokumen RJ", 
                                        'dataName' => "dokumen_rj",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileMergePraEkspose ? $data->fileMergePraEkspose->name : ""]),
                                        'fileName' => $data->fileMergePraEkspose ? $data->fileMergePraEkspose->name : "",
                                        'fileCreatedAt' => $data->fileMergePraEkspose ? $data->fileMergePraEkspose->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => false,
                                        'can_update' => false,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "RJ 34", 
                                        'dataName' => "rj_34",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileRj34 ? $data->fileRj34->name : ""]),
                                        'fileName' => $data->fileRj34 ? $data->fileRj34->name : "",
                                        'fileCreatedAt' => $data->fileRj34 ? $data->fileRj34->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => false,
                                        'can_update' => false,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "RJ 35", 
                                        'dataName' => "rj_35",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileRj35 ? $data->fileRj35->name : '']),
                                        'fileName' => $data->fileRj35 ? $data->fileRj35->name : "",
                                        'fileCreatedAt' => $data->fileRj35 ? $data->fileRj35->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->type_seksi != "SEK_NAR" && ($data->status == "EKSPOSE" || $data->status == "KIRIM-EKSPOSE") ? false : true,
                                        'can_update' => $data->fileMergeEkspose && $data->type_seksi != "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "RJ 36", 
                                        'dataName' => "rj_36",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileRj36 ? $data->fileRj36->name : '']),
                                        'fileName' => $data->fileRj36 ? $data->fileRj36->name : "",
                                        'fileCreatedAt' => $data->fileRj36 ? $data->fileRj36->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->type_seksi != "SEK_NAR" && ($data->status == "EKSPOSE" || $data->status == "KIRIM-EKSPOSE") ? false : true,
                                        'can_update' => $data->fileMergeEkspose && $data->type_seksi != "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "RJ 37", 
                                        'dataName' => "rj_37",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileRj37 ? $data->fileRj37->name : '']),
                                        'fileName' => $data->fileRj37 ? $data->fileRj37->name : "",
                                        'fileCreatedAt' => $data->fileRj37 ? $data->fileRj37->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->type_seksi != "SEK_NAR" && ($data->status == "EKSPOSE" || $data->status == "KIRIM-EKSPOSE") ? false : true,
                                        'can_update' => $data->fileMergeEkspose && $data->type_seksi != "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "Sprint Penempatan Lembaga Rehabilitasi", 
                                        'dataName' => "sprint_penempatan_lembaga_rehabilitasi",
                                        'dataHref' => route('application.download', [$data->uuid, $data->sprintPenempatanLembagaRehabilitasi ? $data->sprintPenempatanLembagaRehabilitasi->name : '']),
                                        'fileName' => $data->sprintPenempatanLembagaRehabilitasi ? $data->sprintPenempatanLembagaRehabilitasi->name : "",
                                        'fileCreatedAt' => $data->sprintPenempatanLembagaRehabilitasi ? $data->sprintPenempatanLembagaRehabilitasi->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'can_update' => $data->fileMergeEkspose && $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "BA-Pelaksanaan Penempatan Lembaga Rehabilitasi", 
                                        'dataName' => "ba_pelaksanaan_penempatan_lembaga_rehabilitasi",
                                        'dataHref' => route('application.download', [$data->uuid, $data->baPelaksanaanPenempatanLembagaRehabilitasi ? $data->baPelaksanaanPenempatanLembagaRehabilitasi->name : '']),
                                        'fileName' => $data->baPelaksanaanPenempatanLembagaRehabilitasi ? $data->baPelaksanaanPenempatanLembagaRehabilitasi->name : "",
                                        'fileCreatedAt' => $data->baPelaksanaanPenempatanLembagaRehabilitasi ? $data->baPelaksanaanPenempatanLembagaRehabilitasi->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'can_update' => $data->fileMergeEkspose && $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "P-31", 
                                        'dataName' => "p_31",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileP31 ? $data->fileP31->name : '']),
                                        'fileName' => $data->fileP31 ? $data->fileP31->name : "",
                                        'fileCreatedAt' => $data->fileP31 ? $data->fileP31->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->status == "EKSPOSE" || $data->status == "KIRIM-EKSPOSE" ? true : false,
                                        'can_update' => $data->fileMergeEkspose && $data->status == "DITOLAK-PRA-EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "P-32", 
                                        'dataName' => "p_32",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileP32 ? $data->fileP32->name : '']),
                                        'fileName' => $data->fileP32 ? $data->fileP32->name : "",
                                        'fileCreatedAt' => $data->fileP32 ? $data->fileP32->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'can_update' => $data->fileMergeEkspose && $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "P-33", 
                                        'dataName' => "p_33",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileP33 ? $data->fileP33->name : '']),
                                        'fileName' => $data->fileP33 ? $data->fileP33->name : "",
                                        'fileCreatedAt' => $data->fileP33 ? $data->fileP33->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->status == "EKSPOSE" || $data->status == "KIRIM-EKSPOSE" ? true : false,
                                        'can_update' => $data->fileMergeEkspose && $data->status == "DITOLAK-PRA-EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "P-48", 
                                        'dataName' => "p_48",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileP48 ? $data->fileP48->name : '']),
                                        'fileName' => $data->fileP48 ? $data->fileP48->name : "",
                                        'fileCreatedAt' => $data->fileP48 ? $data->fileP48->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'can_update' => $data->fileMergeEkspose && $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "BA-17", 
                                        'dataName' => "ba_17",
                                        'dataHref' => route('application.download', [$data->uuid, $data->fileBa17 ? $data->fileBa17->name : '']),
                                        'fileName' => $data->fileBa17 ? $data->fileBa17->name : "",
                                        'fileCreatedAt' => $data->fileBa17 ? $data->fileBa17->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'can_update' => $data->fileMergeEkspose && $data->type_seksi == "SEK_NAR" && $data->status == "EKSPOSE" ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td class="text-center">
                                    @include('dashboard.component.row_template_ekspose', [
                                        'uuid' => $data->uuid, 
                                        'dataLabel' => "Dokumentasi / Foto", 
                                        'dataName' => "dokumentasi_ekspose",
                                        'dataHref' => route('application.download', [$data->uuid, $data->dokumentasiEkpose ? $data->dokumentasiEkpose->name : '']),
                                        'fileName' => $data->dokumentasiEkpose ? $data->dokumentasiEkpose->name : "",
                                        'fileCreatedAt' => $data->dokumentasiEkpose ? $data->dokumentasiEkpose->created_at : "",
                                        'status' => $data->status,
                                        'disabled' => false,
                                        'can_update' => $data->fileMergeEkspose ? false : true,
                                        'modal' => "uploadModalUpdate"
                                    ])
                                </td>
                                <td>{{$data->created_at}}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            @if(
                                                (
                                                    $data->type_seksi != "SEK_NAR" &&
                                                    $data->status == "EKSPOSE" && 
                                                    $data->fileRj35 && 
                                                    $data->fileRj36 && 
                                                    $data->fileRj37 && 
                                                    $data->dokumentasiEkpose && 
                                                    !$data->fileMergeEkspose) ||
                                                (
                                                    $data->type_seksi == "SEK_NAR" &&
                                                    $data->sprintPenempatanLembagaRehabilitasi &&
                                                    $data->baPelaksanaanPenempatanLembagaRehabilitasi &&
                                                    $data->fileP31 &&
                                                    $data->fileP32 &&
                                                    $data->fileP48 &&
                                                    $data->dokumentasiEkpose &&
                                                    !$data->fileMergeEkspose) ||
                                                (
                                                    $data->fileP31 &&
                                                    $data->fileP33 &&
                                                    $data->dokumentasiEkpose &&
                                                    !$data->fileMergeEkspose)
                                            )
                                                <li><a href="#" class="dropdown-item update" data-id="{{ $data->uuid  }}"><i class="ri-check-line align-bottom me-2 text-muted"></i> Kirim</a></li>
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
                order: [[19, "desc"]] // This orders the first column in descending order
            });
        })
    </script>
    <script type="text/javascript">
        $('.update').click(function() {
            var uuid = $(this).data('id');
            Swal.fire({
                title: 'Kamu yakin?',
                text: 'Berkas Ekspose Akan dikirim!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/ekspose/send/' + uuid,
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            '_token': '{{ csrf_token() }}',
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
    </script>
@endpush