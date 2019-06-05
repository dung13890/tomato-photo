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
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>

<div class="form-group" id="link-youtube">
    {{ Form::label('link_youtube', __('repositories.label.link_youtube'), [ 'class' => 'control-label' ]) }}
    @if (!empty($item) && !empty($item->link_youtube))
        @foreach ($item->link_youtube as $linkYoutube)
            @if ($loop->first)
                <div class="input-group">
                    {{ Form::text('link_youtube[]', $linkYoutube, ['class' => 'form-control', 'placeholder' => __('repositories.label.link_youtube')]) }}
                    <span class="input-group-btn">
                        <a class="btn btn-default" href="javascript:void(0)"><i class="ion-ios-plus-outline"></i></a>
                    </span>
                </div>
            @else
            <br />
            {{ Form::text('link_youtube[]', $linkYoutube, ['class' => 'form-control', 'placeholder' => __('repositories.label.link_youtube')]) }}
            @endif
        @endforeach
    @else
    <div class="input-group">
        <input type="text" name="link_youtube[]" class="form-control" placeholder="{{ __('repositories.label.link_youtube') }}">
        <span class="input-group-btn">
            <a class="btn btn-default" href="javascript:void(0)"><i class="ion-ios-plus-outline"></i></a>
        </span>
    </div>
    @endif
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
