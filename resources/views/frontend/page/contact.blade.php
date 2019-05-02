@extends('layouts.frontend')

@section('title', isset($heading) ? $heading : __('repositories.frontend.contact'))

@section('content')

    <main class="site-main bg-grey">
        <div class="page-header blog-bg-image" style="">
            <div class="container">
                <h2 class="page-header-title">Contact us</h2>
                <p class="page-header-desc">{{ $configs['contact']['description'] ?? null }}</p>
            </div>
        </div>

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
                        <iframe src="{{ $configs['map'][0] ?? null }}" width="100%" height="345" frameborder="0" style="border:0" allowfullscreen=""></iframe>
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
                                    {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.first_name') . ' (*)']) }}
                                    @if ($errors->has('first_name'))
                                        <small class="form-text invalid-feedback">{{ $errors->first('first_name') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.last_name') . ' (*)']) }}
                                    @if ($errors->has('last_name'))
                                        <small class="form-text invalid-feedback">{{ $errors->first('last_name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {{ Form::text('company', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.company') . ' (*)']) }}
                                    @if ($errors->has('company'))
                                        <small class="form-text invalid-feedback">{{ $errors->first('company') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.email') . ' (*)']) }}
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
                        <h3 class="text-uppercase">{{ $configs['name'][0] ?? null }}</h3>
                        <div class="footer-contact-content">
                            <p>{!! $configs['contact']['contact_information'] !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
