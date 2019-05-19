@extends('layouts.frontend')

@section('title', 'About page')

@section('content')
    <main class="site-main">
        <div class="page-header blog-bg-image" style="">
            <div class="container">
                <h2 class="page-header-title">About us</h2>
                <p class="page-header-desc">{{ $configs['about']['description'] }}</p>
            </div>
        </div>

        <section class="section-wrapper introduction-wrapper">
            <div class="container">
                <div class="section-content text-center">
                    <div class="section-content-wrapper">
                        <h1 class="color-primary">WHO ARE WE?</h1>
                        <p>{!! $configs['about']['information'] !!}</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="swiper-general swiper-general-images swiper-container mt-5">
                                <div class="swiper-wrapper">
                                    @if (count($__about_slides))
                                        @foreach ($__about_slides as $slide)
                                        <div class="swiper-slide slide-item">
                                            <img src="{{ publicSrc($slide->image_src) }}" alt="{{ $slide->description }}" />
                                        </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="swiper-pagination"></div>

                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"><i class="ion-ios-arrow-back"></i></div>
                                <div class="swiper-button-next"><i class="ion-ios-arrow-forward"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-wrapper about-our-team-wrapper bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center mb-5">
                            <h2 class="heading">MEET OUR TEAM</h2>
                        </div>
                        <ul class="list-unstyled">
                            @foreach ($__about_teams as $team)
                            <li class="media align-items-center">
                                <img src="{{ publicSrc($team->avatar) }}" class="align-self-center mr-3" alt="{{ $team->first_name }}">
                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <span class="color-primary">{{ $team->company }}</span>
                                            <h5 class="mt-0 mb-1">{{ $team->first_name }}</h5>
                                        </div>
                                        <div class="col-7">
                                            <p> {!! $team->message !!} </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
