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
                            <th>CreatedAt</th>
                            <th>Action</th>
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
                                <td>{{$data->created_at}}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#" class="dropdown-item acceptModal" data-id="{{ $data->uuid  }}" data-bs-toggle="modal" data-bs-target="#acceptModal"><i class="ri-check-line align-bottom me-2 text-muted"></i> Terima</a></li>
                                            <li><a href="#" class="dropdown-item cancelModal" data-id="{{ $data->uuid  }}" data-bs-toggle="modal" data-bs-target="#zoomInModal"><i class="ri-close-line align-bottom me-2 text-muted"></i> Tolak</a></li>
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

    <!-- Modal Cancel -->
    <div id="zoomInModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zoomInModalLabel">Tolak Kasus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('application.reject') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-muted">Alasan penolakan:</p>
                        <input type="hidden" name="uuid" id="uuid" value=""/>
                        <textarea class="form-control" id="reason" name="reason" rows="4" cols="50"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ">Kirim</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- Modal Accept -->
    <div id="acceptModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="zoomInModalLabel">Terima Kasus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('application.accept') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-xxl-6">
                                <div>
                                    <label class="form-label red-bullet">Nomor SPDP</label>
                                    <input type="hidden" name="uuid" id="uuid_accept" value=""/>
                                    <input class="form-control" type="text" name="nomor_spdp" id="nomor_spdp" required/>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label class="form-label red-bullet">Nomor Berkas</label>
                                    <input class="form-control" type="text" name="nomor_berkas" id="nomor_berkas" required/>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <div>
                                    <label class="form-label red-bullet">Asal Penyidik</label>
                                    <input class="form-control" type="text" name="asal_penyidik" id="asal_penyidik" required/>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Nama Pemohon</label>
                                <input class="form-control" type="text" name="nama_pemohon" id="nama_pemohon" required/>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Hubungan</label>
                                <select class="form-control bg-light border-light" name="hubungan" id="hubungan" required>
                                    <option value="">Pilih Hubungan</option>
                                    <option value="Suami">Suami</option>
                                    <option value="Isteri">Isteri</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Tokoh Masyarakat">Tokoh Masyarakat</option>
                                    <option value="Pengacara">Pengacara</option>
                                    <option value="JPU">JPU</option>
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Nama Tersangka</label>
                                <input class="form-control" type="text" name="nama_tersangka" id="nama_tersangka" required/>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Tempat Lahir Tersangka</label>
                                <input class="form-control" type="text" name="tempat_lahir_tersangka" id="tempat_lahir_tersangka" required/>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Tanggal Lahir Tersangka</label>
                                <input class="form-control" type="date" name="tanggal_lahir_tersangka" id="tanggal_lahir_tersangka" required/>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Alamat Tersangka</label>
                                <input class="form-control" type="text" name="alamat_tersangka" id="alamat_tersangka" required/>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Pasal</label>
                                <input class="form-control" type="text" name="pasal" id="pasal" placeholder="PASAL 363 KUHP" required/>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Tahap II</label>
                                <input type="text" class="form-control date" name="tahap_2" id="tahap_2" required> 
                                {{-- <input class="form-control" type="date" name="tahap_2" id="tahap_2" required/> --}}
                            </div>
                            <!--end col-->
                            <div class="col-xxl-6">
                                <label class="form-label red-bullet">Perkara</label>
                                <select class="form-control" name="perkara" id="perkara" required>
                                    <option value="">Pilih Seksi</option>
                                    @foreach($seksis as $seksi)
                                        <option value="{{$seksi->id}}">{{$seksi->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ">Kirim</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@push ('after-styles')
@endpush

@push ('after-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#scroll-horizontal-v2", {
                scrollX: true,
                order: [[9, "desc"]] // This orders the first column in descending order
            });
        })

        $(function(){
            $(".cancelModal").click(function(){
                $('#uuid').val($(this).data('id'));
            });
        });

        $(function(){
            $(".acceptModal").click(function(){
                $('#uuid_accept').val($(this).data('id'));
            });
        });
    </script>
@endpush