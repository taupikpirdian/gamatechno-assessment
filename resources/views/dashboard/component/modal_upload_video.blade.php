<div id="uploadVideoModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInModalLabel">Upload Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div id="upload-container" class="text-center">
                        <button id="browseFile" class="btn btn-primary">Browse File</button>
                    </div>

                    <div class="col-xxl-12" id="box-download">
                        <a href="#" id="href-download-video"><i class="ri-file-download-line" aria-hidden="true"></i> Download file </a>
                        <p id="time-upload-video">Upload At: </p>
                    </div>

                </div>
                <div style="display: none" class="progress mt-3" style="height: 25px">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>