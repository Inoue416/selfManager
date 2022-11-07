<div class="modal fade" id="{{ $modal_id }}" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        <h4 class="modal-title text-left">{{ $modal_title }}</h4>
      </div>
      <div class="modal-body text-left">
        &emsp;{{ $modal_body }}
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn {{ $modal_btn }}">{{ $modal_type }}</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">キャンセル</button>
      </div>
    </div>
  </div>
</div>
