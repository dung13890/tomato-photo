<section class="section-wrapper introduction-wrapper text-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 wow fadeInLeft">
                <img src="{{ publicSrc($configs['home']['who_we_are_image']) }}" alt="">
            </div>
            <div class="col-lg-6 wow fadeInRight">
                <div class="section-title">
                    <h1 class="heading">WHO WE ARE?</h1>
                </div>
                <div class="section-content">
                    <div class="section-content-wrapper">
                        <p>{{ $configs['home']['who_we_are'] }}</p>
                        <a class="btn btn-theme mt-5" href="{{ route('about') }}">More about us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
