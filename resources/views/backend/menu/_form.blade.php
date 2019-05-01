@include('backend._partials.components.errors')
<div class="form-group">
    {{ Form::label('category_id', __('repositories.category.name'), ['class'=>'control-label']) }}
    {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name', __('repositories.label.name'), ['class'=>'control-label']) }}<span class="require">*</span>
    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.title')]) }}
</div>

<div class="form-group">
    {{ Form::label('url', __('repositories.label.url'), ['class'=>'control-label']) }}<span class="require">*</span>
    {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.url')]) }}
</div>

<div class="form-group text-right">
    <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ isset($item) ? __('repositories.title.edit') : __('repositories.title.create') }}</button>
</div>
