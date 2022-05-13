<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">@lang('system.delete_modal_title', ['item' => $item])</div>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">@lang('system.delete_modal_confirm', ['item' => $item])</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">@lang('system.cancel')</button>
                <form action="#" method="POST" id="modalDeleteForm">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">@lang('system.delete')</button>
                </form>
            </div>
        </div>
    </div>
</div>