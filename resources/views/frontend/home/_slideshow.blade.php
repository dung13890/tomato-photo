<section class="section-wrapper slider-wrapper py-0">
    <div id="slider" class="swiper-block slider-parallax full-screen">
        <div class="slider-parallax-inner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @if (count($slides))
                        @foreach ($slides as $slide)
                        <div class="swiper-slide slide-item">
                            <div class="img-wrapper">
                                <img src="{{ publicSrc($slide->image_src) }}" alt="{{ $slide->title }}" />
                            </div>
                            <div class="slide-item-text container crazy-style-1">
                                <div class="slide-item-text__inner">
                                    <h1 class="animate_left_to_right animate_duration_1">{{ $slide->title }}</h1>
                                    <p class="animate_left_to_right animate_duration_3">{{ $slide->description }}</p>
                                    <a href="{{ route('about') }}" class="bnt-slide animate_left_to_right animate_duration_5">Go to about us<i class="ion ion-md-arrow-forward"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"><i class="ion-ios-arrow-back"></i></div>
                <div class="swiper-button-next"><i class="ion-ios-arrow-forward"></i></div>
            </div>
        </div>
    </div>
</section>
