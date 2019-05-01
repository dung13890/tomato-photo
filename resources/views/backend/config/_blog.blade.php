<div class="form-group">
    <div class="row">
        <div class="col-sm-8">
            {{ Form::label('description', __('repositories.label.description'), ['class'=>'control-label']) }}
            {{ Form::textarea('blog[description]', $items->keyBy('key')['blog']['value']['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('name', __('repositories.label.banner') . __('repositories.image_size.banner'), ['class' => 'control-label']) }}
    @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['blog']['value']['banner'] ?? null, 'elementFields' => 'blog_banner-upload'])
    @slot('uploadFields')
        {{ Form::file('blog[banner]', ['id' => 'blog_banner']) }}
    @endslot
    @endcomponent
</div>
