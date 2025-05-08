<style>
    .ri-error-warning-line {
        font-size: 101px;
        color: #f8bb86;
    }
</style>
<div id="remove_data" class="modal fade zoomIn delete_modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" class="ajaxForm" id="remove_data_form">
                    @csrf
                    <input type="hidden" name="id" id="remove_data_id">
                    <div class="mt-2 text-center">
                        <i id="" class="ri-error-warning-line"></i>
                        <div class=" pt-1 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0 customText">Are you sure you
                                want to remove this product ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="submit" class="notfiy_me btn w-sm btn-primary">Yes, I am
                            sure</button>
                        <button type="button" class="btn w-sm btn-danger" data-bs-dismiss="modal">Cancel</button>

                    </div>
            </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
{{-- <script></script> --}}
