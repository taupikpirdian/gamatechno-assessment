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
                            <th>Email</th>
                            <th>Alasan</th>
                            <th>Ditolak oleh</th>
                            <th>CreatedAt</th>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td>{{$data->pasal}}</td>
                                <td>{{$data->institutionCategoryPart ? $data->institutionCategoryPart->name : ""}}</td>
                                <td>{{$data->email}}</td>
                                <td>
                                    <a href="#" class="dropdown-item detailRevisiModal" data-reason="{{ $data->reason  }}" data-bs-toggle="modal" data-bs-target="#reason_{{ $data->id }}"><i class="ri-eye-line align-bottom me-2 text-muted"></i></a>
                                </td>
                                <td>
                                    {{$data->rejectedBy ? $data->rejectedBy->name : ""}}
                                </td>
                                <td>{{$data->created_at}}</td>
                            </tr>
                            <!-- Modal Cancel -->
                            <div id="reason_{{ $data->id }}" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="reason_{{ $data->id }}">Alasan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control" id="desc" name="desc" rows="4" cols="50">{{ $data->reason }}</textarea>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push ('after-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#scroll-horizontal-v2", {
                scrollX: true,
                order: [[6, "desc"]] // This orders the first column in descending order
            });
        })
    </script>
@endpush