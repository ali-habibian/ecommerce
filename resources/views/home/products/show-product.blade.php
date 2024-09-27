@extends('layouts.customer.home')

@section('title', $product->name)

@section('content')
    <main class="container mt-4">
        <div class="row">
            <!-- Product Image and Details -->
            <div class="col-md-6">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1 class="pt-2">{{ $product->name }}</h1>
                <p class="text-muted pt-3">{{ $product->description }}</p>
                <h3 class="pt-4">{{ number_format((int)$product->price, 0, '.', ',') }} تومان</h3>
                <button class="btn btn-primary mt-4">افزودن به سبد خرید</button>
            </div>
        </div>
    </main>
@endsection
