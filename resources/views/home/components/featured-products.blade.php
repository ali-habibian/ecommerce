<section class="padding-y bg-light">
    <div class="container">
        <!-- ============ COMPONENT BS CARD WITH IMG ============ -->
        <div class="row gy-3">
            <div class="mb-2 text-center"><h3>پرفروش‌ترین کالاها</h3></div>
            @foreach ($products->random(16) as $product)
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0 shadow-dark">
                    <article class="card bg-discover h-100">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="card-img-top p-2" style="object-fit: cover" height="200" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{!! Str::limit($product->description, 60) !!}</p>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-end" style="height: 100%;">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('home.products.show', $product) }}" class="btn btn-outline-primary">
                                    مشاهده
                                </a>
                                <form action="{{ route('home.product.add.to.cart', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-info">
                                        خرید
                                    </button>
                                </form>

                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
