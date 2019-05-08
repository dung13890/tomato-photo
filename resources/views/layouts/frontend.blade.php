<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend._partials._head')

    <!-- Styles -->
    @stack('prestyles')
    {{ Html::style(mix('assets/css/frontend/app.css')) }}
    @stack('sufstyles')
</head>
<body id="site-body" class="offcanvas-init">
    <div id="app" class="site-wrapper">
        {{-- <div class="site-overlay"></div> --}}
        @include('frontend._partials.header')

        @yield('content')

        @include('frontend._partials.footer')

        <a href="#site-body" id="back-top">
            <i class="ion ion-md-arrow-round-up"></i>
        </a>

        <a href="skype:{{ $configs['skype'][0] ?? null }}?chat" id="action-skype"><i class="ion ion-logo-skype"></i><span>Call for us</span></a>

        <div id="contact-box" class="contact-box">
            <div class="contact-box__content">
                <div class="contact-box__header">
                    <h4>Contact us</h4>
                </div>
                <div class="contact-box__form">
                    <form action="/">
                        <div class="form-group">
                            <input type="text" title="Name" value="" class="form-control" maxlength="40" placeholder="* Name">
                        </div>
                        <div class="form-group">
                            <input type="email" title="Email" value="" class="form-control" maxlength="150" placeholder="* Email">
                        </div>
                        <div class="form-group">
                            <textarea title="Message" maxlength="500" placeholder="* Message"></textarea>
                        </div>

                        <button class="btn">Send us</button>
                    </form>
                </div>
            </div>
            <a href="#" class="contact-box__button">
                <i class="contact-box__button--mail ion ion-ios-mail"></i>
                <i class="contact-box__button--close ion ion-ios-close"></i>
            </a>
        </div>
     </div>

    <!-- Scripts -->
    @stack('prescripts')
    {{ Html::script(mix('assets/js/manifest.js')) }}
    {{ Html::script(mix('assets/js/vendor.js')) }}
    {{ Html::script(mix('assets/js/frontend.js')) }}
    @stack('sufscripts')
</body>
</html>
