@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.index'))

@push('prescripts')
{{ Html::script(mix('/assets/js/backend/modules/pricing.js')) }}
    <script>
        $(function () {
            window.flash_message = {!! session("flash_message") ?? '{}' !!};
            window.pricing.form();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/pricing.css') }}
@endpush

@section('page-content')
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $heading }}</h3>
                </div>
                <div class="panel-body">
                    @include('backend._partials.components.notification_message')
                    {{ Form::open([
                        'url' => route('backend.pricing.store'),
                        'autocomplete'=>'off',
                    ]) }}
                        @include('backend.pricing._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
