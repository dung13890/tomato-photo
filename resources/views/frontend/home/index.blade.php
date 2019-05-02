@extends('layouts.frontend')

@section('title', 'Site name')

@section('content')
    <main class="site-main">
        @include('frontend.home._slideshow')
        @include('frontend.home._introduction')
        @include('frontend.home._category')
        @include('frontend.home._howto')
        @include('frontend.home._testimonials')
    </main>
@endsection
