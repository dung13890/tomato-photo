@extends('layouts.frontend')

@section('title', 'Our services page')

@section('content')
    <main class="site-main">
        <div class="page-header blog-bg-image" style="">
            <div class="container">
                <h2 class="page-header-title">Our services</h2>
                <p class="page-header-desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            </div>
        </div>

        <section class="section-wrapper our-services-wrapper">
            <div class="container py-5">
                <div class="tabs-block">
                    <ul class="tab-list">
                        <li class="active"><a href="#">Photo Editing</a></li>
                        <li><a href="#">Photo Retouching</a></li>
                        <li><a href="#">Virtual Dusk</a></li>
                        <li><a href="#">720 Panorama</a></li>
                        <li><a href="#">Virtual Staging</a></li>
                        <li><a href="#">Floor Plan</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="swiper-gallery">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-02.jpg)">
                                        <div class="slide-control"></div>
                                        <div class="slide-before">
                                            <img src="images/static/temp/products/p-01.jpg" data-src="images/static/temp/products/p-01.jpg" alt="">
                                            <span class="before-text"><span>Before</span></span>
                                        </div>
                                        <span class="after-text"><span>After</span></span>
                                    </div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-03.jpg)">
                                        <div class="slide-control"></div>
                                        <div class="slide-before">
                                            <img src="images/static/temp/products/p-02.jpg" data-src="images/static/temp/products/p-02.jpg" alt="">
                                            <span class="before-text"><span>Before</span></span>
                                        </div>
                                        <span class="after-text"><span>After</span></span>
                                    </div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-04.jpg)">
                                        <div class="slide-control"></div>
                                        <div class="slide-before">
                                            <img src="images/static/temp/products/p-03.jpg" data-src="images/static/temp/products/p-03.jpg" alt="">
                                            <span class="before-text"><span>Before</span></span>
                                        </div>
                                        <span class="after-text"><span>After</span></span>
                                    </div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-05.jpg)">
                                        <div class="slide-control"></div>
                                        <div class="slide-before">
                                            <img src="images/static/temp/products/p-04.jpg" data-src="images/static/temp/products/p-04.jpg" alt="">
                                            <span class="before-text"><span>Before</span></span>
                                        </div>
                                        <span class="after-text"><span>After</span></span>
                                    </div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-06.jpg)">
                                        <div class="slide-control"></div>
                                        <div class="slide-before">
                                            <img src="images/static/temp/products/p-05.jpg" data-src="images/static/temp/products/p-05.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-07.jpg)">
                                        <div class="slide-control"></div>
                                        <div class="slide-before">
                                            <img src="images/static/temp/products/p-06.jpg" data-src="images/static/temp/products/p-06.jpg" alt="">
                                            <span class="before-text"><span>Before</span></span>
                                        </div>
                                        <span class="after-text"><span>After</span></span>
                                    </div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-01.jpg)">
                                        <div class="slide-control"></div>
                                        <div class="slide-before">
                                            <img src="images/static/temp/products/p-07.jpg" data-src="images/static/temp/products/p-07.jpg" alt="">
                                            <span class="before-text"><span>Before</span></span>
                                        </div>
                                        <span class="after-text"><span>After</span></span>
                                    </div>
                                </div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next swiper-button-white"><i class="ion ion-ios-arrow-dropleft"></i></div>
                                <div class="swiper-button-prev swiper-button-white"><i class="ion ion-ios-arrow-dropright"></i></div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-01.jpg)"></div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-02.jpg)"></div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-03.jpg)"></div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-04.jpg)"></div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-05.jpg)"></div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-06.jpg)"></div>
                                    <div class="swiper-slide" style="background-image:url(images/static/temp/products/p-07.jpg)"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
