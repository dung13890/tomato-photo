<section class="section-wrapper we-wrapper" id="we-wrapper">
    <div class="container">
        <div class="row">
            {{-- <div class="col-12 col-md-6 col-lg-6 col-xl-6 d-flex align-items-center">
                <div class="section-about">
                    <div class="section-title">
                        <h3 class="heading">About Us</h3>
                    </div>
                    <div class="text-block">
                        <p>Our team located in Vietnam, serves you in a wide range of services including photo editing, floor plans, virtual staging and video listing as a best center for your promotional campaigns, expand your photography bussiness. Every job is processed with calibrated screens, top softwares, high connection internet, fast turnaround time, affordable price.</p>
                        <p>Whether you are in real estate and need high-quality images to showcase a home or are presenting products to the retail market, Our will work with your images to get the best result for your needs. High quality photos are proven to increase sales and our editors will make your product or listing stand out from the competition.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-1 col-lg-1 col-xl-1">
            </div> --}}
            {{-- <div class="col-12 col-md-5 col-lg-5 col-xl-5"> --}}
            {{-- <div class="contact-form-block col-6">
                <div class="section-contact">
                    <div class="section-title">
                        <h3 class="heading">Contact us</h3>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.6790075671793!2d105.82015161425761!3d20.96540198603266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acfdc32041f3%3A0xfb0ba343c3f5d627!2zQ1QxLUExLCBC4bqxbmcgQSAyLCBLaHUgxJHDtCB0aOG7iyBUw6J5IE5hbSBMaW5oIMSQw6BtLCBIb8OgbmcgTGnhu4d0LCBIb8OgbmcgTWFpLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1520319639447" width="100%" height="389" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
            </div> --}}
            <div class="col-6" style="margin: auto">
                <div class="section-contact">
                    <div class="section-title text-center">
                        <h3 class="heading">Contact us</h3>
                    </div>
                    <div class="text-block">
                        @if (Session::has('contact_flash_message'))
                            <div class="alert alert-success">{{ Session::get('contact_flash_message') }}</div>
                        @endif
                        {{ Form::open([
                            'url' => '#we-wrapper',
                            'role'  => 'form',
                            'autocomplete'=>'off',
                            'class' => 'form questions-form',
                        ]) }}
                            <div class="form-group">
                                {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.first_name') . ' (*)']) }}
                                @if ($errors->has('first_name'))
                                    <small class="form-text invalid-feedback">{{ $errors->first('first_name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.last_name') . ' (*)']) }}
                                @if ($errors->has('last_name'))
                                    <small class="form-text invalid-feedback">{{ $errors->first('last_name') }}</small>
                                @endif
                            </div>
                            <div class="form-group">
                                {{ Form::text('company', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.company') . ' (*)']) }}
                                @if ($errors->has('company'))
                                    <small class="form-text invalid-feedback">{{ $errors->first('company') }}</small>
                                @endif
                            </div>
                             <div class="form-group">
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('repositories.label.email') . ' (*)']) }}
                                @if ($errors->has('email'))
                                    <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
                                @endif
                            </div>
                             <div class="form-group">
                                {{ Form::textarea('message', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Message...']) }}
                            </div>
                             <button type="submit" class="btn btn-theme"><i class="fa fa-envelope"></i> Send message</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
