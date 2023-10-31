@if($fileName)
    @if($status == "DITERIMA")
        <a class="btn btn-info {{ $modal }}" href="#" data-id="{{ $uuid  }}" data-label="{{$dataLabel}}" data-name="{{$dataName}}" data-href="{!! $dataHref !!}" data-time-file="{{ $fileCreatedAt  }}" data-bs-toggle="modal" data-bs-target="#{{ $modal }}"><i class="ri-file-upload-line" aria-hidden="true"></i></a>
    @elseif($status == "REVISI-PENERIMAAN")
        @hasanyrole('kejari')
            <a class="btn btn-info {{ $modal }}" href="#" data-id="{{ $uuid  }}" data-label="{{$dataLabel}}" data-name="{{$dataName}}" data-href="{!! $dataHref !!}" data-time-file="{{ $fileCreatedAt  }}" data-bs-toggle="modal" data-bs-target="#{{ $modal }}"><i class="ri-file-upload-line" aria-hidden="true"></i></a>
        @endhasanyrole
        @hasanyrole('seksi-kejati')
            <a class="btn btn-success" href="{!! route('report.show', [$uuid, $fileName]) !!}" target="_blank"><i class="ri-file-download-line" aria-hidden="true"></i></a>
        @endhasanyrole
    @elseif($status == "DIKIRIM" || $status == "PRA-EKSPOSE" || $status == "REVISI-PENERIMAAN")
        <a class="btn btn-success" href="{!! route('report.show', [$uuid, $fileName]) !!}" target="_blank"><i class="ri-file-download-line" aria-hidden="true"></i></a>
    @else
        <a class="btn btn-dark" href="#"><i class="ri-close-circle-line" aria-hidden="true"></i></a>
    @endif
@else
    @if($data->fileSpdp)
        @if(($status == "DIKIRIM" || $status == "PRA-EKSPOSE") && ($dataName == "pengantar_jampidum" || $dataName == "rj_34"))
            <a class="btn btn-primary uploadModal" href="#" data-id="{{ $uuid  }}" data-label="{{$dataLabel}}" data-name="{{$dataName}}" data-bs-toggle="modal" data-bs-target="#uploadModal"><i class="ri-file-upload-line" aria-hidden="true"></i></a>
        @elseif($status == "DITERIMA")
            <a class="btn btn-primary uploadModal" href="#" data-id="{{ $uuid  }}" data-label="{{$dataLabel}}" data-name="{{$dataName}}" data-bs-toggle="modal" data-bs-target="#uploadModal"><i class="ri-file-upload-line" aria-hidden="true"></i></a>
        @else
            <a class="btn btn-dark" href="#"><i class="ri-file-unknow-line" aria-hidden="true"></i></a>
        @endif
    @else
        <a class="btn btn-dark" href="#"><i class="ri-file-unknow-line" aria-hidden="true"></i></a>
    @endif
@endif