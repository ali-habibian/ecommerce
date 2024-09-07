@extends('layouts.home')

@section('content')
    {{-- Hero Banner --}}
    @include('home.components.hero-banner')
    {{-- Hero Banner End --}}

    {{-- why you should buy from us --}}
    @include('home.components.why-buy-from-us')
    {{-- why you should buy from us End --}}

    {{-- Featured Categories --}}
    @include('home.components.featured-categories')
    {{-- Featured Categories End --}}

    {{-- Featured Products --}}
    @include('home.components.featured-products')
    {{-- Featured Products End --}}
@endsection
