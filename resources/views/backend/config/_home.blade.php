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
                    <div class="panel panel-default">
                        <div class="panel-heading">How to 1</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('home', 'Icon', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][0][icon]', $items->keyBy('key')['home']['value']['how_to'][0]['icon'] ?? null, ['class' => 'form-control icon-picker']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Title', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][0][title]', $items->keyBy('key')['home']['value']['how_to'][0]['title'] ?? null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Description', ['class'=>'control-label']) }}
                                {{ Form::textarea('home[how_to][0][description]', $items->keyBy('key')['home']['value']['how_to'][0]['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">How to 2</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('home', 'Icon', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][1][icon]', $items->keyBy('key')['home']['value']['how_to'][1]['icon'] ?? null, ['class' => 'form-control icon-picker']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Title', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][1][title]', $items->keyBy('key')['home']['value']['how_to'][1]['title'] ?? null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Description', ['class'=>'control-label']) }}
                                {{ Form::textarea('home[how_to][1][description]', $items->keyBy('key')['home']['value']['how_to'][1]['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">How to 3</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('home', 'Icon', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][2][icon]', $items->keyBy('key')['home']['value']['how_to'][2]['icon'] ?? null, ['class' => 'form-control icon-picker']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Title', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][2][title]', $items->keyBy('key')['home']['value']['how_to'][2]['title'] ?? null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Description', ['class'=>'control-label']) }}
                                {{ Form::textarea('home[how_to][2][description]', $items->keyBy('key')['home']['value']['how_to'][2]['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">How to 4</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('home', 'Icon', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][3][icon]', $items->keyBy('key')['home']['value']['how_to'][3]['icon'] ?? null, ['class' => 'form-control icon-picker']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Title', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][3][title]', $items->keyBy('key')['home']['value']['how_to'][3]['title'] ?? null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Description', ['class'=>'control-label']) }}
                                {{ Form::textarea('home[how_to][3][description]', $items->keyBy('key')['home']['value']['how_to'][3]['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">How to 5</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('home', 'Icon', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][4][icon]', $items->keyBy('key')['home']['value']['how_to'][4]['icon'] ?? null, ['class' => 'form-control icon-picker']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Title', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][4][title]', $items->keyBy('key')['home']['value']['how_to'][4]['title'] ?? null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Description', ['class'=>'control-label']) }}
                                {{ Form::textarea('home[how_to][4][description]', $items->keyBy('key')['home']['value']['how_to'][3]['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">How to 6</div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{ Form::label('home', 'Icon', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][5][icon]', $items->keyBy('key')['home']['value']['how_to'][5]['icon'] ?? null, ['class' => 'form-control icon-picker']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Title', ['class'=>'control-label']) }}
                                {{ Form::text('home[how_to][5][title]', $items->keyBy('key')['home']['value']['how_to'][5]['title'] ?? null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('home', 'Description', ['class'=>'control-label']) }}
                                {{ Form::textarea('home[how_to][5][description]', $items->keyBy('key')['home']['value']['how_to'][3]['description'] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            {{ Form::label('instagram_account', __('repositories.label.instagram_account'), ['class'=>'control-label']) }}
            {{ Form::text('instagram_account[]', $items->keyBy('key')['instagram_account']['value'][0] ?? null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('iframe_fb', __('repositories.label.iframe_fb'), ['class'=>'control-label']) }}
            {{ Form::textarea('iframe_fb[]', $items->keyBy('key')['iframe_fb']['value'][0] ?? null, ['class' => 'form-control', 'rows' => 3]) }}
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
