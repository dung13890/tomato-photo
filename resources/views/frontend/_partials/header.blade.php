<div class="offcanvas-menu">
    <div class="offcanvas-inner">
        <div class="offcanvas-header">
            <div class="float-left">
                <span class="offcanvas-title">Menu</span>
            </div>
            <div class="float-right">
                <div class="close-offcanvas">Close</div>
            </div>
        </div>
        <div class="offcanvas-content">
            <div class="main-menu">
                @include('frontend._partials.navigation', ['class' => ''])
            </div>
        </div>
    </div>
</div>
<div class="site-topbar">
    <div class="container">
        <div class="row align-items-center">
            <ul class="col-md-12">
                <li class="email">
                    <a href="mailto:{{ $configs['email'][0] ?? null }}"><i class="ion ion-ios-mail"></i>{{ $configs['email'][0] ?? null }}</a>
                </li>
                <li class="skype">
                    <a href="skype:{{ $configs['skype'][0] ?? null }}?chat"><i class="ion ion-logo-skype"></i>{{ $configs['skype'][0] ?? null }}</a>
                </li>
                <li class="hotline">
                    <a href="tel:{{ $configs['phone'][0] ?? null }}"><i class="ion ion-ios-call"></i>{{ $configs['phone'][0] ?? null }}</a>
                </li>
                <li class="time"><i class="ion ion-ios-alarm"></i> <span id="timing"></span> Vietnam Time</li>
            </ul>
        </div>
    </div>
</div>
<header id="sticky" class="site-header">
    <nav class="site-navigation">
        <div class="container">
            <div class="row">
                <a class="site-logo col-6 col-sm-6 col-md-6 col-lg-2" href="/">
                    <img class="logo" src="{{ asset('images/static/logo.png') }}" alt="Site brand">
                </a>
                <div class="main-menu col-6 col-sm-6 col-md-6 col-lg-10">
                    <div id="offcanvas-toggler" class="d-lg-none d-xl-none">
                        <div class="ico-menu">
                            <div class="bar"></div>
                            <div class="bar"></div>
                            <div class="bar"></div>
                        </div>
                        <span>MENU</span>
                    </div>
                    @include('frontend._partials.navigation', ['class' => ' d-none d-lg-block'])
                </div>
            </div>
        </div>
    </nav>
</header>
