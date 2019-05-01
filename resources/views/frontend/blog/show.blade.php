@extends('layouts.frontend')
@prepend('prescripts')
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property={{ env('SHARE_PLATFORM_API') }}&product=gdpr-compliance-tool" async="async"></script>
@endprepend
@section('title', 'News detail')

@section('content')
    <main class="site-main blog-wrapper">
        <div class="page-header" style="">
            <div class="container">
                <h2 class="page-header-title">Blog Detail</h2>
                <p class="page-header-desc">This is blog detail.</p>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="post">
                            <div class="post-content">
                                <div class="post-info">
                                    <span class="icon-date"><img width="20" height="17" alt="calendar icon" src="/images/static/calendar.svg" /></span>
                                    <span class="post-date">22-08-2019</span>
                                </div>
                                <h1 class="post-title">{{ $post->name }}</h1>
                                <div class="post-description">
                                    {!! $post->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
