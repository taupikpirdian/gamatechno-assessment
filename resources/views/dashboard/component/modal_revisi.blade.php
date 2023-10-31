<!-- Modal Cancel -->
<div id="revisiModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="revisiModal">Revisi Berkas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('restorative-justice.revision') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="uuid" id="uuid_revision" value=""/>
                    <input type="hidden" name="status" id="status_revision" value=""/>
                    <p class="text-muted">Judul:</p>
                    <input class="form-control" id="title" name="title"></input>
                    <p class="text-muted">Deskripsi:</p>
                    <textarea class="form-control" id="desc" name="desc" rows="4" cols="50"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ">Kirim</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal Cancel -->
<div id="detailRevisiModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailRevisiModal">Detail Revisi Berkas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#">
                <div class="modal-body">
                    <p class="text-muted">Judul:</p>
                    <input class="form-control" id="title_revision" name="title" readonly></input>
                    <p class="text-muted">Deskripsi:</p>
                    <textarea class="form-control" id="desc_revision" name="desc" rows="4" cols="50" readonly></textarea>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>