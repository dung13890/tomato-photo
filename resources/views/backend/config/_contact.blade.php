<div class="form-group">
    {{ Form::label('name', __('repositories.label.banner') . __('repositories.image_size.banner'), ['class' => 'control-label']) }}
    @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['contact']['value']['banner'] ?? null, 'elementFields' => 'contact_banner-upload'])
    @slot('uploadFields')
        {{ Form::file('contact[banner]', ['id' => 'contact_banner']) }}
    @endslot
    @endcomponent
</div>
<div class="form-group">
    <div class="row">
        <div class="col-sm-8">
            {{ Form::label('description', __('repositories.label.description'), ['class'=>'control-label']) }}
            {{ Form::textarea('contact[description]', $items->keyBy('key')['contact']['value']['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {{ Form::label('description', 'Customer Service', ['class'=>'control-label']) }}
            {{ Form::textarea('contact[custom_service]', $items->keyBy('key')['contact']['value']['custom_service'] ?? null, ['class' => 'form-control', 'rows' => 10]) }}
        </div>
        <div class="col-sm-6">
            {{ Form::label('name', __('repositories.label.banner') . __('repositories.image_size.banner_contact'), ['class' => 'control-label']) }}
            @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['contact']['value']['banner_1'] ?? null, 'elementFields' => 'contact_banner_1-upload'])
            @slot('uploadFields')
                {{ Form::file('contact[banner_1]', ['id' => 'contact_banner_1']) }}
            @endslot
            @endcomponent
        </div>
    </div>
</div>

<div class="form-group">
    <div class="row">
        <div class="col-sm-6">
            {{ Form::label('name', __('repositories.label.banner') . __('repositories.image_size.banner_contact'), ['class' => 'control-label']) }}
            @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['contact']['value']['banner_2'] ?? null, 'elementFields' => 'contact_banner_2-upload'])
            @slot('uploadFields')
                {{ Form::file('contact[banner_2]', ['id' => 'contact_banner_2']) }}
            @endslot
            @endcomponent
        </div>
        <div class="col-sm-6">
            {{ Form::label('description', 'Contact Information', ['class'=>'control-label']) }}
            {{ Form::textarea('contact[contact_information]', $items->keyBy('key')['contact']['value']['contact_information'] ?? null, ['class' => 'form-control', 'rows' => 10]) }}
        </div>
    </div>
</div>
