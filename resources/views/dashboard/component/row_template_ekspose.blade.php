@if($fileName && $disabled == false)
    @if($can_update == true && $status != "KIRIM-EKSPOSE")
        <a class="btn btn-info {{ $modal }}" href="#" data-id="{{ $uuid  }}" data-label="{{$dataLabel}}" data-name="{{$dataName}}" data-href="{!! $dataHref !!}" data-time-file="{{ $fileCreatedAt  }}" data-bs-toggle="modal" data-bs-target="#{{ $modal }}"><i class="ri-file-upload-line" aria-hidden="true"></i></a>
    @else
        <a class="btn btn-success" href="{!! route('report.show', [$uuid, $fileName]) !!}" target="_blank"><i class="ri-file-download-line" aria-hidden="true"></i></a>
    @endif
@elseif($fileName == "" && $disabled == false)
    <a class="btn btn-primary uploadModal" href="#" data-id="{{ $uuid  }}" data-label="{{$dataLabel}}" data-name="{{$dataName}}" data-bs-toggle="modal" data-bs-target="#uploadModal"><i class="ri-file-upload-line" aria-hidden="true"></i></a>
@else
    <a class="btn btn-dark" href="#"><i class="ri-file-unknow-line" aria-hidden="true"></i></a>
@endif