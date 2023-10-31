@if($fileName)
    <a class="btn btn-success" href="{!! route('report.show', [$uuid, $fileName]) !!}" target="_blank"><i class="ri-file-download-line" aria-hidden="true"></i></a>
@else
    <a class="btn btn-dark" href="#"><i class="ri-loader-2-line" aria-hidden="true"></i></a>
@endif