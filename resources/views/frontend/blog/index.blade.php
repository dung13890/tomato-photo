@extends('layouts.frontend')

@section('title', 'News')

@section('content')
    <main class="site-main blog-wrapper">
        <div class="page-header blog-bg-image">
            <div class="container">
                <h2 class="page-header-title">Blog</h2>
                <p class="page-header-desc">Our team and other experts offer their best advice, insights, and how-to's. All to help you improve the presentation of your property marketing.</p>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row blog-container">
                    @foreach ($posts as $post)
                        <div class="post col-md-6 col-lg-6 col-xl-6">
                            <a class="post-image" href="/news/detail">
                                @if ($post->image_src)
                                    <img src="{{ $post->image_src }}" alt="{{ $post->image_title }}">
                                @endif
                            </a>
                            <div class="post-content">
                                <div class="post-info">
                                    <span class="icon-date"><img width="20" height="17" alt="calendar icon" src="/images/static/calendar.svg" /></span>
                                    <span class="post-date">22-08-2019</span>
                                </div>

                                <h3 class="post-title">
                                    <a href="/news/detail">{{ $post->name }}</a>
                                </h3>

                                <div class="post-description">
                                    <p>{{ $post->ceo_description }}</p>
                                    {{-- <a class="readmore" href="/news/detail">Read More</a> --}}
                                    <a class="btn btn-theme mt-3" href="/news/detail">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
