<div class="row">
    <div class="col-sm-12">
        @include('backend._partials.components.errors')
    </div>
    <div class="col-sm-12">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('pricing_header', 'Pricing Header', ['class'=>'control-label']) }}
                    {{ Form::text('pricing_header', $pricingHeader, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('pricing_title', 'Pricing nội dung', ['class'=>'control-label']) }}
                    {{ Form::text('pricing_title', $pricingTitle, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
    @foreach ($pricings as $pricing)
    <div class="col-sm-4">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="form-group">
                    {{ Form::label('icon', 'Icon', ['class' => 'control-label']) }}
                    {{ Form::text("params[$pricing->id][icon]", $pricing->icon ?? null, ['class' => 'form-control icon-picker']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('title', __('repositories.label.title'), ['class' => 'control-label']) }}
                    {{ Form::text("params[$pricing->id][title]", $pricing->title ?? null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('price', __('repositories.label.price'), ['class' => 'control-label']) }}
                    {{ Form::text("params[$pricing->id][price]", $pricing->price ?? null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('description', __('repositories.label.description'), ['class' => 'control-label']) }}
                    {{ Form::textarea("params[$pricing->id][description]", $pricing->description ?? null, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('link', __('repositories.title.link'), ['class' => 'control-label']) }}
                    {{ Form::text("params[$pricing->id][link]", $pricing->link ?? null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-sm-12">
        <div class="form-group text-right">
            <button type="submit" class="btn btn-success btn-sm"><i class="ion-checkmark-circled"></i> {{ __('repositories.title.edit') }}</button>
        </div>
    </div>
</div>
