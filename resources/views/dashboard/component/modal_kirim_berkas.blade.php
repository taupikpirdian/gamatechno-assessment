<!-- Modal Cancel -->
<div id="modalSendFile" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInModalLabel">Kirim File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('accept.send') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="text-muted">Posisi:</p>
                    <input type="hidden" name="uuid" id="uuidSendFile" value=""/>
                    <textarea class="form-control" id="posisi" name="posisi" rows="4" cols="50"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ">Kirim</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

