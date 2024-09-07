<section class="padding-y bg-light">
    <div class="container">
        <!-- ============ COMPONENT BS CARD WITH IMG ============ -->
        <div class="row gy-3">
            <div class="mb-2 text-center"><h3>خرید بر اساس دسته‌بندی</h3></div>
            @foreach ($categories as $category)
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <article class="card bg-dark border-0">
                        <img src="{{ asset('storage/' . $category->products->random()?->image) }}"
                             class="card-img opacity" style="object-fit: cover" height="200">
                        <div class="card-img-overlay">
                            <h5 class="mb-0 text-white">{{ $category->name }}</h5>
                            <p class="card-text text-white">{{ Str::limit($category->description) }}</p>
                            <a href="#"
                               class="btn btn-secondary">
                                مشاهده
                            </a>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
