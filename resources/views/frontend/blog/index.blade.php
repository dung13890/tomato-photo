@extends('layouts.frontend')

@section('title', 'News')

@section('content')
    <main class="site-main blog-wrapper">
        <div class="page-header blog-bg-image" style="background-image: url({{ publicSrc($configs['blog']['banner']) }});">
            <div class="container">
                <h2 class="page-header-title">Blog</h2>
                <p class="page-header-desc">{!! $configs['blog']['description'] !!}</p>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row blog-container">
                    @foreach ($posts as $post)
                        <div class="post col-md-6 col-lg-6 col-xl-6">
                            <a class="post-image" href="{{ route('blog.show', $post->slug) }}">
                                @if ($post->image_src)
                                    <img src="{{ publicSrc($post->image_src) }}" alt="{{ $post->image_title }}">
                                @endif
                            </a>
                            <div class="post-content">
                                <div class="post-info">
                                    <span class="icon-date"><img width="20" height="17" alt="calendar icon" src="/images/static/calendar.svg" /></span>
                                    <span class="post-date">{{ $post->updated_at->format(config('common.date.blog')) }}</span>
                                </div>

                                <h3 class="post-title">
                                    <a href="{{ route('blog.show', $post->slug) }}">{{ $post->name }}</a>
                                </h3>

                                <div class="post-description">
                                    <p>{{ $post->ceo_description }}</p>
                                    <a class="btn btn-theme mt-3" href="{{ route('blog.show', $post->slug) }}">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection
