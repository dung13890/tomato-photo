<div class="row">
    <div class="col-sm-8">
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', __('repositories.label.title'), ['class'=>'control-label']) }}<span class="require">*</span>
                    {{ Form::text('name[]', $items->keyBy('key')['name']['value'][0] ?? null, ['class' => 'form-control']) }}
                </div>

                <div class="col-md-6">
                    {{ Form::label('keywords', __('repositories.label.ceo_keywords'), ['class'=>'control-label']) }}
                    {{ Form::text('keywords[]', $items->keyBy('key')['keywords']['value'][0] ?? null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('description', __('repositories.label.ceo_description'), ['class'=>'control-label']) }}
            {{ Form::textarea('description[]', $items->keyBy('key')['description']['value'][0] ?? null, ['class' => 'form-control', 'rows' => 2]) }}
        </div>
        <div class="form-group">
            {{ Form::label('home', 'WHO WE ARE?', ['class'=>'control-label']) }}
            @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['home']['value']['who_we_are_image'] ?? null])
            @slot('uploadFields')
                {{ Form::file('home[who_we_are_image]', ['id' => 'image']) }}
            @endslot
            @endcomponent
            {{ Form::textarea('home[who_we_are]', $items->keyBy('key')['home']['value']['who_we_are'] ?? null, ['class' => 'form-control', 'rows' => 6]) }}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('home', 'Top Quality', ['class'=>'control-label']) }}
                    {{ Form::textarea('home[icons][twilight]', $items->keyBy('key')['home']['value']['icons']['twilight'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('home', 'Excellent Communication', ['class'=>'control-label']) }}
                    {{ Form::textarea('home[icons][remove_item]', $items->keyBy('key')['home']['value']['icons']['remove_item'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('home', 'Professional Team', ['class'=>'control-label']) }}
                    {{ Form::textarea('home[icons][day_to_dusk]', $items->keyBy('key')['home']['value']['icons']['day_to_dusk'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('home', 'Fast Turnaround Time', ['class'=>'control-label']) }}
                    {{ Form::textarea('home[icons][image_enhancement]', $items->keyBy('key')['home']['value']['icons']['image_enhancement'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('home', 'ABOUT US', ['class'=>'control-label']) }}
            {{ Form::textarea('home[about_us]', $items->keyBy('key')['home']['value']['about_us'] ?? null, ['class' => 'form-control', 'rows' => 10]) }}
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('email', __('repositories.label.email'), ['class'=>'control-label']) }}
                    {{ Form::text('email[]', $items->keyBy('key')['email']['value'][0] ?? null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('phone', __('repositories.label.phone'), ['class'=>'control-label']) }}
                    {{ Form::text('phone[]', $items->keyBy('key')['phone']['value'][0] ?? null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-12">
                    {{ Form::label('skype', __('repositories.label.skype'), ['class'=>'control-label']) }}
                    {{ Form::text('skype[]', $items->keyBy('key')['skype']['value'][0] ?? null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('address', __('repositories.label.address'), ['class'=>'control-label']) }}
            {{ Form::textarea('address[]', $items->keyBy('key')['address']['value'][0] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
        </div>
        <div class="form-group">
            {{ Form::label('copyright', __('repositories.label.copyright'), ['class'=>'control-label']) }}
            {{ Form::text('copyright[]', $items->keyBy('key')['copyright']['value'][0] ?? null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-sm-4">
        @include('backend.config._social')
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Map</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('map', __('repositories.label.map'), ['class'=>'control-label']) }}
                    {{ Form::text('map[]', $items->keyBy('key')['map']['value'][0] ?? null, ['class' => 'form-control']) }}
                    <iframe frameborder="0" style="width:100%;height:250px;border:0;" src="{{ $items->keyBy('key')['map']['value'][0] ?? null }}" allowfullscreen="allowfullscreen"></iframe>
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Logo</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('name', __('repositories.label.logo'), ['class' => 'control-label']) }}
                    @component('backend._partials.components.uploadfile', ['imgFields' => $items->keyBy('key')['logo']['value'][0] ?? null])
                    @slot('uploadFields')
                        {{ Form::file('logo[]', ['id' => 'image']) }}
                    @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</div>
