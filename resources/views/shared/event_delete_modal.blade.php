<!-- Delete modal ========================================= -->
<div class="modal fade" id="delete_modal" role="dialog" aria-labelledby="delete_modal_label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_modal_label">削除します</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <p>イベント: 「{{ $event->name }}」削除してよろしいですか？</p>
            </div>

            <div class="modal-footer">
                <form action="{{ route('events.destroy', ['event' => $event]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</a>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
