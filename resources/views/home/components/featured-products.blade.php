<section class="padding-y bg-light">
    <div class="container">
        <!-- ============ COMPONENT BS CARD WITH IMG ============ -->
        <div class="row gy-3">
            <div class="mb-2 text-center"><h3>پرفروش‌ترین کالاها</h3></div>
            @foreach ($products->random(16) as $product)
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0 shadow-dark">
                    <article class="card bg-discover h-100">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             class="card-img-top p-2" style="object-fit: cover" height="200">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{!! Str::limit($product->description, 40) !!}</p>
                        </div>
                        <div class="card-body">
                            <a href="#"
                               class="btn btn-secondary">
                                خرید
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
