{{ Form::model($item, [
    'method' => 'PATCH',
    'url' => route('backend.category.update.collection', $item->id) . '#collection',
    'autocomplete'=>'off',
]) }}
@include('backend._partials.components.errors')
<div id="collection">
    <div class="form-group">
        <div class="row">
            <div class="col-sm-6">
                {{ Form::label('collection_title', __('repositories.label.collection_title'), ['class'=>'control-label']) }}<span class="require">*</span>
                {{ Form::text('collection_title', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.collection_title')]) }}
            </div>
            <div class="col-sm-6">
                {{ Form::label('collection_intro', __('repositories.label.collection_intro'), ['class'=>'control-label']) }}
                {{ Form::textarea('collection_intro', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('repositories.label.collection_intro')]) }}
            </div>
        </div>
    </div>

    <div class="form-group" id="dropzone-form">
        {{ Form::label('collections[]', __('repositories.title.collection')) }}
        <upload-image
            :images="{{ $item->collections }}"
            :url="'{{ route('backend.home.store.collection', $item->id) }}'"
        ></upload-image>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ __('repositories.button.save') }}</button>
    </div>
</div>
{{ Form::close() }}
