@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <form action="/rekapitulasi" method="get">
                            <div class="row g-3 mb-0 align-items-center">
                                <div class="col-sm-auto">
                                    <div class="input-group">
                                        <select class="form-control bg-light border-light" name="seksi" id="seksi">
                                            <option value="">Pilih Seksi</option>
                                            <option value="all">Semua</option>
                                            @foreach($seksis as $sek)
                                                <option value="{{$sek->code}}">{{$sek->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-text bg-primary border-primary text-white">
                                            Seksi
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="input-group">
                                        <select class="form-control bg-light border-light" name="year" id="year">
                                            <option value="">Pilih Tahun</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                        <div class="input-group-text bg-primary border-primary text-white">
                                            Tahun
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12" style="text-align: center">
                        <h5 class="card-title mb-0">{{$title}}</h5><br>
                        <h5 class="card-title mb-0">Tahun {{$year}}</h5><br>
                        <h5 class="card-title mb-0">Seksi
                            @if($seksi == "SEK_OH")
                            OHARDA
                            @elseif($seksi == "SEK_KAM")
                            KAMNEGTIBUM
                            @elseif($seksi == "SEK_NAR")
                            NARKOTIKA
                            @elseif($seksi == "SEK_TER")
                            TERORISME
                            @else
                            -
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal-v2" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Jumlah</th>
                            <th>No</th>
                            <th>Nama Tersangka</th>
                            <th>Kejari</th>
                            <th>Pasal</th>
                            <th>Ket</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($seksi && $year)
                            @php
                                $total = 0;   
                            @endphp
                            @foreach($datas as $key=>$data)
                                @php
                                    $total += count($data);
                                @endphp
                                @if(count($data) == 0)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>0</td>
                                        <td colspan="6" style="text-align: center">NIHIL</td>
                                    </tr>
                                @endif
                                @foreach($data as $keyRj=>$rj)
                                <tr>
                                    @if($keyRj == 0)
                                        <td rowspan="{{count($data)}}">{{$key}}</td>
                                        <td rowspan="{{count($data)}}">{{count($data)}}</td>
                                    @endif
                                    <td>{{ $keyRj + 1 }}</td>
                                    <td>{{ $rj["nama_tersangka"] }}</td>
                                    <td>{{ $rj["kejari"] }}</td>
                                    <td>{{ $rj["pasal"] }}</td>
                                    <td>{{ $rj["status"] }}</td>
                                    <td>
                                        <a href="{!! route('report.show-page', [$rj["uuid"]]) !!}" class="dropdown-item" target="_blank"><i class="ri-eye-line align-bottom me-2 text-muted"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            @endforeach
                            <tr>
                                <td colspan="2"><b>TOTAL</b></td>
                                <td colspan="6" style="text-align: center">{{$total}}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push ('after-scripts')
@endpush