@if($status == "TOLAK-PRA-EKSPOSE")
    <span class="badge badge-soft-danger">{{ $data->status  }}</span>
@else
    <span class="badge badge-soft-info">{{ $data->status  }}</span>
@endif