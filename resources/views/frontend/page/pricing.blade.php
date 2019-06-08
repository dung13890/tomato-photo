@extends('layouts.frontend')

@section('title', 'Pricing page')

@section('content')
    <main class="site-main">
        <section class="section-wrapper pricing-wrapper">
            <div class="container">
                <div class="section-content text-center">
                    <div class="section-content-wrapper">
                        <h1 class="color-primary">PHOTO EDITING PRICING</h1>
                        <p>Adjusting brightest and contrast, highlighting features and lightening shadows.</p>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-4">
                            <div class="pricing-item">
                                <div class="pricing-item__icon"><i class="fa fa-pencil"></i></div>
                                <h2 class="pricing-item__title">Day to Night conversion</h2>
                                <div class="pricing-item__price">from 5.0$</div>
                                <p>Adjusting brightest and contrast, highlighting features and lightening shadows.</p>
                                <p>Replacing outdoor dusk sky.</p>
                                <p>Turning on interior/exterior lighting and pool/garden lights.</p>
                                <p>Adding fire to fireplace, moons and stars.</p>
                                <p>Up to 12-24hrs Image Delivery</p>
                                <div class="pricing-item__btn">
                                    <a href="#" title="Contact us for detail" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="pricing-item box-shadow">
                                <div class="pricing-item__icon"><i class="fa fa-lightbulb-o"></i></div>
                                <h2 class="pricing-item__title">Photo editing</h2>
                                <div class="pricing-item__price">from 0.70$</div>
                                <p>Free test</p>
                                <p>Noise reduction</p>
                                <p>White balance, contrast, exposure, lens correction, color adjustments.</p>
                                <p>Removal of Camera Flashes</p>
                                <p>Removal of Minor Reflections</p>
                                <p>Resizing, cropping and removing background.</p>
                                <p>Up to 12-24hrs Image Delivery</p>
                                <div class="pricing-item__btn">
                                    <a href="#" title="Contact us for detail" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            <div class="pricing-item">
                                <div class="pricing-item__icon"><i class="fa fa-diamond"></i></div>
                                <h2 class="pricing-item__title">RETOUCHING</h2>
                                <div class="pricing-item__price">from 1.0$</div>
                                <p>Color correction.</p>
                                <p>Brightest/Contract Adjustment.</p>
                                <p>Remove small spots, camera flashes, dust, glare, reflection…</p>
                                <p>Add green grass, trees, and small objects like lamp, chair or table…</p>
                                <p>Complete details for unfinished property.</p>
                                <p>Up to 12-24hrs Image Delivery</p>
                                <div class="pricing-item__btn">
                                    <a href="#" title="Contact us for detail" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
