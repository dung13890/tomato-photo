@extends('layouts.frontend')

@section('title', 'About page')

@section('content')
    <main class="site-main">
        <div class="page-header blog-bg-image" style="">
            <div class="container">
                <h2 class="page-header-title">About us</h2>
                <p class="page-header-desc">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            </div>
        </div>

        <section class="section-wrapper introduction-wrapper">
            <div class="container">
                <div class="section-content text-center">
                    <div class="section-content-wrapper">
                        <h1 class="color-primary">Company name - Who are we?</h1>
                        <p>Our team located in Vietnam, serves you in a wide range of services including photo editing, floor plans, virtual staging and video listing as a best center for your promotional campaigns, expand your photography bussiness. Every job is processed with calibrated screens, top softwares, high connection internet, fast turnaround time, affordable price.</p>
                        <p>Whether you are in real estate and need high-quality images to showcase a home or are presenting products to the retail market, Our will work with your images to get the best result for your needs. High quality photos are proven to increase sales and our editors will make your product or listing stand out from the competition.</p>
                    </div>
                    <div class="swiper-general swiper-general-images swiper-container mt-5">
                        <div class="swiper-wrapper">
                            @if (count($slides))
                                @foreach ($slides as $slide)
                                <div class="swiper-slide slide-item">
                                    <img src="{{ $slide->image_src }}" alt="{{ $slide->description }}" />
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
        </section>

        <section class="section-wrapper about-our-team-wrapper bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center mb-5">
                            <h2 class="heading">MEET OUR TEAM</h2>
                        </div>
                        <ul class="list-unstyled">
                            <li class="media align-items-center">
                                <img src="images/static/members/member-01.jpg" class="align-self-center mr-3" alt="member 01">
                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <span class="color-primary">CEO</span>
                                            <h5 class="mt-0 mb-1">Mr. Peter</h5>
                                            <ul class="social horizontal">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="ion ion-logo-facebook" aria-label="Facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="ion ion-logo-twitter" aria-label="Twitter"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-7">
                                            <p>2011年6月: ハノイ工科大学卒業</p>
                                            <p>2011年8月: Luvina Software JSC社入社</p>
                                            <p>2014年9月: 当社設立、代表取締役就任</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="media align-items-center">
                                <img src="images/static/members/member-02.jpg" class="align-self-center mr-3" alt="member 02">
                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <span class="color-primary">Designer</span>
                                            <h5 class="mt-0 mb-1">Ms. Lucky</h5>
                                            <ul class="social horizontal">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="ion ion-logo-facebook" aria-label="Facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="ion ion-logo-twitter" aria-label="Twitter"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-7">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</div>
                                    </div>
                                </div>
                            </li>
                            <li class="media align-items-center">
                                <img src="images/static/members/member-03.jpg" class="align-self-center mr-3" alt="member 03">
                                <div class="media-body">
                                    <div class="row align-items-center">
                                        <div class="col-5">
                                            <span class="color-primary">Development</span>
                                            <h5 class="mt-0 mb-1">Mr. Kevin</h5>
                                            <ul class="social horizontal">
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="ion ion-logo-facebook" aria-label="Facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" target="_blank">
                                                        <i class="ion ion-logo-twitter" aria-label="Twitter"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-7">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
