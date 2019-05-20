<div class="form-group">
    {{ Form::label('name', __('repositories.label.banner') . __('repositories.image_size.banner'), ['class' => 'control-label']) }}
    @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['about']['value']['banner'] ?? null, 'elementFields' => 'about_banner-upload'])
    @slot('uploadFields')
        {{ Form::file('about[banner]', ['id' => 'about_banner']) }}
    @endslot
    @endcomponent
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-8">
            {{ Form::label('description', __('repositories.label.description'), ['class'=>'control-label']) }}
            {{ Form::textarea('about[description]', $items->keyBy('key')['about']['value']['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::label('description', 'WHO ARE WE?', ['class'=>'control-label']) }}
    {{ Form::textarea('about[information]', $items->keyBy('key')['about']['value']['information'] ?? null, ['class' => 'form-control', 'rows' => 6]) }}
</div>
