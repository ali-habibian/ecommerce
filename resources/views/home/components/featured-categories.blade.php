<section class="padding-y bg-light">
    <div class="container">
        <!-- ============ COMPONENT BS CARD WITH IMG ============ -->
        <div class="row gy-3">
            <div class="mb-2 text-center"><h3>خرید بر اساس دسته‌بندی</h3></div>
            @foreach ($categories as $category)
                <div class="col-lg-3 col-md-4 mb-4 mb-md-0 shadow-dark">
                    <article class="card bg-discover h-100">
                        <img src="{{ asset('storage/' . $category->image) }}"
                             class="card-img-top p-2" style="object-fit: cover" height="200">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->name }}</h5>
                            <p class="card-text">{!! Str::limit($category->description, 40) !!}</p>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('home.category.products', $category) }}"
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
