<section class="section-wrapper testimonials-wrapper wow fadeInUp">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="heading">Testimonials</h2>
        </div>
        <div class="section-content testimonials-slider">
            <div class="slides swiper-general swiper-container mt-5">
                <div class="swiper-wrapper">
                    @if (count($testimonials))
                        @foreach ($testimonials as $testimonial)
                        <div class="testimonial-item swiper-slide slide-item">
                            <div class="row align-items-center">
                                <div class="col-sm-12 testimonial-image">
                                    <img src="{{ $testimonial->avatar }}" alt="{{ $testimonial->first_name }}" />
                                </div>
                                <div class="col-sm-12 mt-3 text-center">
                                    <div class="testimonial-content">
                                        <p>{{ $testimonial->message }}</p>
                                        <p class="testimonial-name">{{ sprintf('– %s %s, %s', $testimonial->first_name, $testimonial->last_name, $testimonial->company) }}</p>
                                    </div>
                                </div>
                            </div>
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
