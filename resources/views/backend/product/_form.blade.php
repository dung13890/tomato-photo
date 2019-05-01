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
                <div class="col-sm-4">
                    <label></label>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('is_home', true, old('is_home'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.is_home') }}</b>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    {{ Form::label('price', __('repositories.label.price'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('price', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.price')]) }}
                </div>
                <div class="col-md-4">
                    {{ Form::label('sort', __('repositories.label.sort'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::number('sort', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.sort')]) }}
                </div>
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('intro', __('repositories.label.intro'), ['class'=>'control-label']) }}
            {{ Form::textarea('intro', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('repositories.label.intro')]) }}
        </div>

    </div>
    <div class="col-sm-4">
        {{ Form::label('name', __('repositories.label.image') . __('repositories.image_size.product'), ['class' => 'control-label']) }}<span class="require">*</span>
        @component('backend._partials.components.uploadfile', ['imgFields' => (isset($item) && $item->image_src) ? $item->image_src : null])
        @slot('uploadFields')
            {{ Form::file('image', ['id' => 'image']) }}
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
