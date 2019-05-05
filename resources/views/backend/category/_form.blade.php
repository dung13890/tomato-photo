@include('backend._partials.components.errors')
<div class="form-group">
    {{ Form::label('ceo_title', __('repositories.label.ceo_title'), ['class'=>'control-label']) }}<span class="require">*</span>
    {{ Form::text('ceo_title', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.ceo_title')]) }}
</div>
<div class="form-group">
    {{ Form::label('ceo_keywords', __('repositories.label.ceo_keywords'), ['class'=>'control-label']) }}
    {{ Form::text('ceo_keywords', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.ceo_keywords')]) }}
</div>
<div class="form-group">
    {{ Form::label('ceo_description', __('repositories.label.ceo_description'), ['class'=>'control-label']) }}
    {{ Form::textarea('ceo_description', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('repositories.label.ceo_description')]) }}
</div>

<div class="form-group">
    {{ Form::label('name', __('repositories.label.name'), [ 'class' => 'control-label' ]) }}<span class="require">*</span>
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
</div>

<div class="form-group">
    {{ Form::label('name', __('repositories.label.image') . __('repositories.image_size.category'), ['class' => 'control-label']) }}<span class="require">*</span>
    @component('backend._partials.components.uploadfile', ['imgFields' => (isset($item) && $item->image_src) ? $item->image_src : null])
    @slot('uploadFields')
        {{ Form::file('image', ['id' => 'image']) }}
    @endslot
    @endcomponent
</div>

<div class="form-group">
    {{ Form::label('description', __('repositories.label.description'), ['class' => 'control-label']) }}
    <div class="grid-editor"></div>
    {{ Form::textarea('description', null, ['class' => 'form-control textarea-summernote']) }}
</div>

<div class="form-group">
    <label></label>
    <div class="checkbox">
        <label>
            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.locked') }}</b>
        </label>
    </div>
</div>

<div class="form-group text-right">
    @if (isset($item))
    {{-- <a href="{{ route('backend.category.collection', $item->id) }}" class="btn btn-info btn-sm"><i class="ion-images"></i> {{ __('repositories.title.collection') }}</a> --}}
    @endif
    <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
</div>
