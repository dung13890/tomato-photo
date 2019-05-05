@extends('layouts.frontend')
@section('title', isset($heading) ? $heading : __('repositories.title.category'))

@section('content')
<main class="site-main">
    <div class="page-header blog-bg-image" style="">
        <div class="container">
            <h2 class="page-header-title">{{ $category->name }}</h2>
            <p class="page-header-desc">{!! str_limit($category->description, 250, '...') !!}</p>
        </div>
    </div>

    <section class="section-wrapper our-services-wrapper">
        <div class="container py-5">
            <div class="tabs-block">
                <ul class="tab-list">
                    @foreach ($categories as $cat)
                    <li class="{{ $cat->slug === $category->slug ? 'active' : ''}}"><a href="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div class="swiper-gallery">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                @foreach ($services as $service)
                                <div class="swiper-slide" style="background-image:url({{ publicSrc($service->image_after_src) }})">
                                    <div class="slide-control"></div>
                                    <div class="slide-before">
                                        <img src="{{ publicSrc($service->image_before_src) }}" data-src="{{ publicSrc($service->image_before_src) }}" alt="">
                                        <span class="before-text"><span>Before</span></span>
                                    </div>
                                    <span class="after-text"><span>After</span></span>
                                </div>
                                @endforeach
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"><i class="ion ion-ios-arrow-dropleft"></i></div>
                            <div class="swiper-button-prev swiper-button-white"><i class="ion ion-ios-arrow-dropright"></i></div>
                        </div>
                        <div class="swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                @foreach ($services as $service)
                                <div class="swiper-slide" style="background-image:url({{ publicSrc($service->image_before_src) }})"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
