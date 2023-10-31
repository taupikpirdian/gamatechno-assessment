@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12">
                        <form action="/rekapitulasi/penghentian" method="get">
                            <div class="row g-3 mb-0 align-items-center">
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
                        <h5 class="card-title mb-0">Rekapitulasi Penghentian Penuntutan</h5><br>
                        <h5 class="card-title mb-0">Wilayah Kejaksaan Tinggi Sumatera Selatan</h5><br>
                        <h5 class="card-title mb-0">Tahun 2023</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal-v2" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kejari</th>
                            <th>Jumlah</th>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data['no']}}</td>
                                <td>{{$data['name']}}</td>
                                <td>{{$data['jumlah']}}</td>
                            </tr>
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
                pageLength: 50, // Show 50 rows per page
                order: [[0, "asc"]] // This orders the first column in descending order
            });
        })
    </script>
@endpush