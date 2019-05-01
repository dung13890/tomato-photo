@extends('layouts.frontend')

@section('title', 'Contact page')

@section('content')

    <main class="site-main bg-grey">
        <div class="page-header blog-bg-image" style="">
            <div class="container">
                <h2 class="page-header-title">Contact us</h2>
                <p class="page-header-desc">Company name – We are working on 24/7</p>
            </div>
        </div>

        {{-- <section class="section-wrapper contact-block-wrapper">
            <div class="container">
                <div class="row m-0">
                    <div class="contact-block image-bottom col-md-6 p-0 bg-less-dark">
                        <div class="contact-block-text">
                            <h2>24/7 Customer Service</h2>
                            <p>{!! $configs['contact']['custom_service'] !!}</p>
                        </div>
                        <div class="contact-block-image">
                            <img src="{{ publicSrc($configs['contact']['banner_1'] ?? null) }}" alt="Brad Filliponi">
                        </div>
                    </div>
                    <div class="contact-block col-md-6 p-0 bg-dark">
                        <div class="contact-block-image">
                            <img src="{{ publicSrc($configs['contact']['banner_2'] ?? null) }}" alt="Brad Filliponi">
                        </div>
                        <div class="contact-block-text">
                            <h2>Contact Information</h2>
                            <p>{!! $configs['contact']['contact_information'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="section-wrapper contact-work-wrapper py-0">
            <div class="row m-0">
                <div class="contact-work contact-work__left col-md-6 text-right p-0">
                    <div class="crazy-style">
                        <h2><span class="sub-title">Our Team</span> Work 24/7</h2>
                    </div>
                </div>
                <div class="contact-work contact-work__right col-md-6 p-0 d-flex align-items-end">
                    <h3 class="text-uppercase">Around the Clock</h3>
                </div>
            </div>
        </section>

        <section class="section-wrapper contact-map-wrapper" id="we-wrapper">
            <div class="container">
                <div class="row">
                    <div class="contact-form-block col-lg-6">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.6790075671793!2d105.82015161425761!3d20.96540198603266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acfdc32041f3%3A0xfb0ba343c3f5d627!2zQ1QxLUExLCBC4bqxbmcgQSAyLCBLaHUgxJHDtCB0aOG7iyBUw6J5IE5hbSBMaW5oIMSQw6BtLCBIb8OgbmcgTGnhu4d0LCBIb8OgbmcgTWFpLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1520319639447" width="100%" height="345" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                    </div>
                    <div class="contact-form-block col-lg-6">
                        <h2>How Can We Help?</h2>
                        @if (Session::has('contact_flash_message'))
                            <div class="alert alert-success">{{ Session::get('contact_flash_message') }}</div>
                        @endif
                        {{ Form::open([
                            'url' => '#we-wrapper',
                            'role'  => 'form',
                            'autocomplete'=>'off',
                            'class' => 'form contact-form',
                        ]) }}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First name' . ' (*)']) }}
                                    @if ($errors->has('first_name'))
                                        <small class="form-text invalid-feedback">{{ $errors->first('first_name') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last name' . ' (*)']) }}
                                    @if ($errors->has('last_name'))
                                        <small class="form-text invalid-feedback">{{ $errors->first('last_name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {{ Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'Company' . ' (*)']) }}
                                    @if ($errors->has('company'))
                                        <small class="form-text invalid-feedback">{{ $errors->first('company') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email' . ' (*)']) }}
                                    @if ($errors->has('email'))
                                        <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Message...']) }}
                            </div>

                            <button type="submit" class="btn btn-theme">Send Us</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-wrapper contact-info-wrapper py-5">
            <div class="container">
                <div class="row m-0">
                    <div class="col-md-4">
                        <div class="crazy-style">
                            <h2><span class="sub-title">Our Team</span> Work 24/7</h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="text-uppercase">Company name</h3>
                        <div class="footer-contact-content">
                            <p> Company TNHH (Company Software Technology Co., Ltd.)</p>
                            <ul class="no-list">
                                <li><strong>Address :</strong>01, CT1 Tower, Our Street, Hanoi, Viet Nam</li>
                                <li><strong>Phone :</strong>( +84) 123 456789 ／ (+84) 24 068 6868</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
