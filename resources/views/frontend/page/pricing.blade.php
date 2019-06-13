@extends('layouts.frontend')

@section('title', 'PHOTO EDITING PRICING')

@section('content')
    <main class="site-main">
        <section class="section-wrapper pricing-wrapper">
            <div class="container">
                <div class="section-content text-center">
                    <div class="section-content-wrapper">
                        <h1 class="color-primary">{{ $configs['pricing_header'][0] ?? null }}</h1>
                        <p>{{ $configs['pricing_title'][0] ?? null }}</p>
                    </div>
                    <div class="row mt-5">
                        @foreach ($__pricings as $pricing)
                        <div class="col-sm-4">
                            <div class="pricing-item">
                                <div class="pricing-item__icon"><i class="{{ $pricing->icon }}"></i></div>
                                <h2 class="pricing-item__title">{{ $pricing->title }}</h2>
                                <div class="pricing-item__price">{{ $pricing->price }}</div>
                                <p>{{ $pricing->description }}</p>
                                <div class="pricing-item__btn">
                                    <a target="_blank" href="{{ $pricing->link }}" title="Contact us for detail" class="btn btn-primary">Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
