@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/product.js')) }}
    <script>
        $(function () {
            window.product.form();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/product.css') }}
@endpush

@include('backend._partials.components.errors')
<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    {{ Form::label('category_id', __('repositories.category.name'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
                </div>
                <div class="col-sm-2">
                    <label></label>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('locked', true, old('locked'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.locked') }}</b>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    {{ Form::label('sort', __('repositories.label.sort'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::number('sort', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.sort')]) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('description', __('repositories.label.description'), ['class'=>'control-label']) }}
            {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 8, 'placeholder' => __('repositories.label.description')]) }}
        </div>
    </div>
    <div class="col-sm-4">
        {{ Form::label('name', __('repositories.label.image_before_src') . __('repositories.image_size.product'), ['class' => 'control-label']) }}<span class="require">*</span>
        @component('backend._partials.components.uploadfile', ['imgFields' => (isset($item) && $item->image_before_src) ? $item->image_before_src : null, 'elementFields' => 'image_bf-upload'])
        @slot('uploadFields')
            {{ Form::file('image_before_src', ['id' => 'image_before_src']) }}
        @endslot
        @endcomponent
        {{ Form::label('name', __('repositories.label.image_after_src') . __('repositories.image_size.product'), ['class' => 'control-label']) }}<span class="require">*</span>
        @component('backend._partials.components.uploadfile', ['imgFields' => (isset($item) && $item->image_after_src) ? $item->image_after_src : null, 'elementFields' => 'image_af-upload'])
        @slot('uploadFields')
            {{ Form::file('image_after_src', ['id' => 'image_after_src']) }}
        @endslot
        @endcomponent
    </div>
</div>

<div class="form-group">
    <div class="text-right col-sm-4 col-sm-offset-4">
        <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
        <a href="javascript:window.history.back()" class="btn btn-primary btn-sm" ><i class="ion-arrow-left-a"></i> {{ __('repositories.title.back') }}</a>
    </div>
</div>
