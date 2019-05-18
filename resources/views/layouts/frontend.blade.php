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

        @if (empty($disableIconContact))
        <div id="contact-box" class="contact-box @if ($errors->any()) open @endif">
            <div class="contact-box__content">
                <div class="contact-box__header">
                    <h4>Contact us</h4>
                </div>
                <div class="contact-box__form">
                    {{ Form::open([
                        'url' => route('home.store.contact'),
                        'autocomplete' => 'off',
                    ]) }}
                        <div class="form-group">
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => '(*) ' . __('repositories.label.first_name') ]) }}
                            @if ($errors->has('name'))
                                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => '(*) ' . __('repositories.label.email') ]) }}
                            @if ($errors->has('email'))
                                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => '(*) Message...']) }}
                            @if ($errors->has('message'))
                                <small class="form-text text-danger">{{ $errors->first('message') }}</small>
                            @endif
                        </div>

                        <button class="btn">Send us</button>
                    {{ Form::close() }}
                </div>
            </div>
            <a href="#" class="contact-box__button">
                <i class="contact-box__button--mail ion ion-ios-mail"></i>
                <i class="contact-box__button--close ion ion-ios-close"></i>
            </a>
        </div>
        @endif
     </div>

    <!-- Scripts -->
    @stack('prescripts')
    {{ Html::script(mix('assets/js/manifest.js')) }}
    {{ Html::script(mix('assets/js/vendor.js')) }}
    {{ Html::script(mix('assets/js/frontend.js')) }}
    @stack('sufscripts')
</body>
</html>
