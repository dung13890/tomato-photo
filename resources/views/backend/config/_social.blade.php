<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title">{{ __('repositories.title.social') }}</h3>
    </div>
    <div class="panel-body">
        <div class="form-group">
            {{ Form::label('facebook', 'Facebook', ['class'=>'control-label']) }}
            {{ Form::text('facebook[]', $items->keyBy('key')['facebook']['value'][0] ?? null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('youtube', 'Youtube', ['class'=>'control-label']) }}
            {{ Form::text('youtube[]', $items->keyBy('key')['youtube']['value'][0] ?? null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('linkedin', 'Linkedin', ['class'=>'control-label']) }}
            {{ Form::text('linkedin[]', $items->keyBy('key')['linkedin']['value'][0] ?? null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('twitter', 'Twitter', ['class'=>'control-label']) }}
            {{ Form::text('twitter[]', $items->keyBy('key')['twitter']['value'][0] ?? null, ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('instagram', 'Instagram', ['class'=>'control-label']) }}
            {{ Form::text('instagram[]', $items->keyBy('key')['instagram']['value'][0] ?? null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
