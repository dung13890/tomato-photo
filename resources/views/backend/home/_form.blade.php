@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/home.js')) }}
    <script>
        $(function () {
            window.home.form();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/home.css') }}
@endpush

@include('backend._partials.components.errors')
<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    {{ Form::label('first_name', __('repositories.label.name'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.name')]) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-sm-8">
                    {{ Form::label('email', __('repositories.label.email'), ['class'=>'control-label']) }}
                    {{ Form::email('email', null, ['placeholder' => 'example@email.com', 'class' => 'form-control']) }}
                </div>
                <div class="col-sm-4">
                    <label></label>
                    <div class="checkbox">
                        <label>
                            {{ Form::checkbox('is_team', true, old('is_team'), ['data-toggle'=>'toggle', 'data-size' => 'small']) }} <b>{{ __('repositories.label.is_team') }}</b>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-8">
                    {{ Form::label('company', __('repositories.label.company'), ['class'=>'control-label']) }}
                    {{ Form::text('company', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.company')]) }}
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
            {{ Form::label('message', __('repositories.label.message'), ['class' => 'control-label']) }}
            <div class="grid-editor"></div>
            {{ Form::textarea('message', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-sm-4">
        {{ Form::label('name', __('repositories.label.avatar') . __('repositories.image_size.avatar'), ['class' => 'control-label']) }}
        @component('backend._partials.components.uploadfile', ['imgFields' => (isset($item) && $item->avatar) ? $item->avatar : null])
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
