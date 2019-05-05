<footer class="site-footer">
    <section class="footer-main">
        <div class="container">
            <div class="row">
                <div class="f-col f-logo-wrapper text-center col-sm-12 col-md-12 col-lg-3 col-xl-3">
                    <div class="sales-block">
                        <h4>Talk to Sales</h4>
                        <a class="phone-link" href="tel:{{ $configs['phone'][0] ?? null }}" target="_self">{{ $configs['phone'][0] ?? null }}</a>
                        <a class="btn btn-theme" href="{{ route('contact') }}">REQUEST A CONTACT</a>
                    </div>
                    <ul class="social horizontal">
                        <li><a href="{{ $configs['facebook'][0] ?? null }}" target="_blank"><i class="ion ion-logo-facebook" aria-label="Facebook"></i></a></li>
                        <li><a href="{{ $configs['instagram'][0] ?? null }}" target="_blank"><i class="ion ion-logo-instagram" aria-label="true"></i></a></li>
                        <li class="last"><a href="{{ $configs['youtube'][0] ?? null }}" target="_blank"><i class="ion ion-logo-youtube" aria-label="YouTube"></i></a></li>
                    </ul>
                </div>
                <div class="f-col col-sm-6 col-md-4 col-lg-2 col-xl-2">
                    <h3 class="f-title">Our Services</h3>
                    <ul class="nav-links">
                        @foreach ($__categories as $category)
                        <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="f-col col-sm-6 col-md-4 col-lg-3 col-xl-3">
                    <h3 class="f-title">Our Instagram</h3>
                    <instagram-gallery username="chanelcartoon01" />
                </div>


                <div class="f-col facebook-box-wrapper col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <div class="facebook-box">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFotoEditingService%2F&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="copyright">
        <div class="container">
            <div class="row">
                <p class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">{{ $configs['copyright'][0] ?? null }}</p>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <ul class="list-horizontal">
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('blog') }}">Blog</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</footer>
