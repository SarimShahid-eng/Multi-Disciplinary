<div id="articleTypeModal" class="modal fade zoomIn delete_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Article Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="NotificationModalbtn-close"></button>
            </div>
            <hr>
            <form id="articleTypeForm" method="POST" class="ajaxForm" action="{{ route('admin.article_type.store') }}">
                @csrf
                <div class="modal-body pt-0">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Article Type</label>
                                <input type="hidden" name="update_id" id="update_id">
                                <input type="text" id="name" placeholder="Enter Article Type" name="name"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-2  mt-4 mb-2">
                        <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
