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
                            <th class="ps-0" scope="row">Nama Pelanggan :</th>
                            <td class="text-muted">{{$transaction->customer->name}}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Nama Produk :</th>
                            <td class="text-muted">{{$transaction->product->name}}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">No Transaksi :</th>
                            <td class="text-muted">{{$transaction->no_transaction}}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Tanggal Transaksi :</th>
                            <td class="text-muted">{{convertDateDynamis($transaction->date, 'Y-m-d', 'D, d M Y')}}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Harga Produk :</th>
                            <td class="text-muted">Rp. {{ number_format($transaction->product->price, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Diskon(%) :</th>
                            <td class="text-muted">{{$transaction->discount}}%</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Nominal Diskon :</th>
                            <td class="text-muted">Rp. {{ number_format($transaction->cashback, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th class="ps-0" scope="row">Total Pembayaran :</th>
                            <td class="text-muted">Rp. {{ number_format($transaction->total_amount, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">Uang Masuk :</th>
                            <td class="text-muted">Rp. {{ number_format($transaction->total_payment, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <th class="ps-0" scope="row">Uang Kembali :</th>
                            <td class="text-muted">Rp. {{ number_format(( $transaction->total_payment - $transaction->product->price) + $transaction->cashback, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
