<div id="uploadModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInModalLabel">Upload File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-xxl-12">
                            <label class="form-label red-bullet" id="label-file">File</label>
                            <input type="hidden" name="uuid" id="uuid" value=""/>
                            <input type="hidden" name="code_file" id="code_file" value=""/>
                            <input class="form-control" type="file" id="file" name="file" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ">Upload</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>