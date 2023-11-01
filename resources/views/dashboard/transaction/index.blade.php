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
                    <div class="col-6" style="text-align: right">
                        <a href="{{ route($route_create) }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="scroll-horizontal-v2" class="table nowrap align-middle" style="width:100%">
                    <thead>
                        <tr>
                            <th>No Trx</th>
                            <th>Product</th>
                            <th>Buyer</th>
                            <th>Date</th>
                            <th>Total Amount</th>
                            <th>CreatedAt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($datas as $data)
                           <tr>
                               <td>{{$data->no_transaction}}</td>
                               <td>{{$data->product->name}}</td>
                               <td>{{$data->customer->name}}</td>
                               <td>{{convertDateDynamis($data->date, 'Y-m-d', 'D, d M Y')}}</td>
                               <td>Rp. {{ number_format($data->total_amount, 0, ',', '.') }}</td>
                               <td>{{$data->created_at}}</td>
                               <td>
                                   <div class="dropdown d-inline-block">
                                       <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                           <i class="ri-more-fill align-middle"></i>
                                       </button>
                                       <ul class="dropdown-menu dropdown-menu-end">
                                           <li><a href="{{ route('transaction.show', $data->id) }}" class="dropdown-item edit-item-btn"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> Detail</a></li>
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
@endsection

@push ('after-styles')
@endpush

@push ('after-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#scroll-horizontal-v2", {
                scrollX: true,
                order: [[5, "desc"]] // This orders the first column in descending order
            });
        })
    </script>
@endpush
