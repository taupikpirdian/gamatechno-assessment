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
                            <th>Nama Pemohon</th>
                            <th>Hubungan</th>
                            <th>Nama Tersangka</th>
                            <th>Tempat Lahir Tersangka</th>
                            <th>Tanggal Lahir Tersangka</th>
                            <th>Alamat Tersangka</th>
                            <th>Pasal</th>
                            <th>Surat Permohonan Tersangka</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>CreatedAt</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->hubungan}}</td>
                                <td>{{$data->suspect ? $data->suspect->name : ''}}</td>
                                <td>{{$data->suspect ? $data->suspect->place_of_birth : ''}}</td>
                                <td>{{$data->suspect ? $data->suspect->date_of_birth : ''}}</td>
                                <td>{{$data->suspect ? $data->suspect->address : ''}}</td>
                                <td>{{$data->pasal}}</td>
                                <td class="text-center">
                                    <a class="btn btn-info" href="{!! route('report.show', [$data->uuid, $data->filePengajuan ? $data->filePengajuan->name : '']) !!}" target="_blank"><i class="ri-file-download-line" aria-hidden="true"></i></a>
                                </td>
                                <td>{{$data->email}}</td>
                                <td>
                                    <span class="badge badge-soft-danger">{{ $data->status  }}</span>
                                </td>
                                <td>{{$data->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push ('after-styles')
@endpush

@push ('after-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#scroll-horizontal-v2", {
                scrollX: true,
                order: [[10, "desc"]] 
            });
        })
    </script>
@endpush