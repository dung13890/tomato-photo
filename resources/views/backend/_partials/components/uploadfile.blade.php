<div class="input-group">
    <span class="input-group-btn">
        <span class="btn btn-default btn-file">
            {{ __('repositories.title.browse') }} {{ $uploadFields }}
        </span>
    </span>
    <input type="text" class="form-control" readonly>
</div>

{{ Html::image( publicSrc($imgFields), '', [
    'id' => $elementFields ?? 'img-upload',
    'class' => 'file-upload',
]) }}
