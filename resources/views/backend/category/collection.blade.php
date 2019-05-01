@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.index'))

@push('prescripts')
{{ Html::script(mix('assets/vue/dropzone.js')) }}
{{ Html::script(mix('/assets/js/backend/modules/category.js')) }}
    <script>
        $(function () {
            window.flash_message = {!! session("flash_message") ?? '{}' !!};
            window.category.sortImages();
        });
    </script>
@endpush

@push('prestyles')
{{ Html::style('assets/css/backend/category.css') }}
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
                    @include('backend.category._slides')
                    <br>
                    <h2 class="form-control-static text-center">{{ $item->title }}</h2>
                    <div class="text-center">{!! $item->description !!}</div>
                    <br>
                    @include('backend.category._products')
                    <hr>
                    @include('backend.category._collections')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
