@extends('layouts.customer.home')

@section('title', $product->name)

@section('content')
    <section class="padding-y bg-light">
        <main class="container">
            <div class="row">
                <!-- Product Image and Details -->
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h1 class="pt-2">{{ $product->name }}</h1>
                    <p class="text-muted pt-3">{{ $product->description }}</p>
                    <h3 class="pt-4">{{ format_persian_price($product->price) }} تومان</h3>
                    <form action="{{ route('home.product.add.to.cart', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-4">
                            افزودن به سبد خرید
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </section>
@endsection
