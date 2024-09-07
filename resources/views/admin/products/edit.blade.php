@extends('layouts.app')

@section('title', 'ویرایش محصول')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.products.index') }}"
                   class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>
                ویرایش محصول
            </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">محصولات</a></div>
                <div class="breadcrumb-item">
                    ویرایش محصول
                </div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">
                ویرایش محصول
            </h2>

            <p class="section-lead">
                در این صفحه می توانید یک محصول را ویرایش کنید.
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>اطلاعات پایه</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="col-form-label" for='name'>عنوان</label>
                                    <input type="text"
                                           name="name"
                                           id='name'
                                           class="form-control"
                                           value="{{ old('name', $product->name) }}">

                                    <span class="invalid-feedback" id="name-error"></span>
                                </div>

                                <div class="form-group mb-3">
                                    <label for='description' class="col-form-label">توضیحات</label>
                                    <textarea name="description"
                                              id='description'
                                              rows="8"
                                              cols="80"
                                              class="form-control">{{ old('description', $product->description) }}</textarea>
                                    <span class="invalid-feedback" id="description-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>تصویر</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" type="file" name="image" id="image">
                                    <span class="invalid-feedback" id="image-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>قیمت گذاری</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for='price'>قیمت</label>
                                        <div class="input-group">
                                            <div class="input-group-text">ريال</div>
                                            <input type="text"
                                                   name="price"
                                                   id='price'
                                                   placeholder="قیمت را وارد کنید..."
                                                   class="form-control"
                                                   value="{{ old('price', $product->price) }}">
                                            <span class="invalid-feedback" id="price-error"></span>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label" for='discounted_price'>قیمت با تخفیف</label>
                                        <div class="input-group">
                                            <div class="input-group-text">ريال</div>
                                            <input type="text"
                                                   name="discounted_price"
                                                   id='discounted_price'
                                                   placeholder="0"
                                                   class="form-control"
                                                   value="{{ old('compare_price', $product->discounted_price) }}">
                                            <span class="invalid-feedback" id="discounted_price-error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card rounded-lg"
                             data-controller="inventory">
                            <div class="card-header">
                                <h4>موجودی</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group"
                                     data-inventory-target="quantity">
                                    <label class="form-label" for='quantity'>تعداد</label>
                                    <input type="text"
                                           name="quantity"
                                           id='quantity'
                                           class="form-control"
                                           value="{{ old('quantity', $product->quantity) }}">
                                    <span class="invalid-feedback" id="quantity-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>وضعیت محصول</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="status" class="form-select">
                                        <option value="draft"
                                            @selected(old('status', $product->status) == 'draft')>پیش نویس
                                        </option>
                                        <option value="review"
                                            @selected(old('status', $product->status) == 'review')>در حال بررسی
                                        </option>
                                        <option value="active"
                                            @selected(old('status', $product->status) == 'active')>فعال
                                        </option>
                                    </select>
                                    <span class="invalid-feedback" id="status-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>دسته بندی محصول</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label" for='category_id'>دسته بندی</label>
                                    <select name="category_id"
                                            id='category_id'
                                            class="form-select">
                                        @foreach ($categories as $category)
                                            @if ($category->id == old('category_id', $product->category->id) || strtolower($category->name) == 'default')
                                                <option selected
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <span class="invalid-feedback" id="category_id-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group text-right">
                            <button id="submitButton" class="btn btn-primary btn-lg"
                                    onclick="updateProduct()">
                                ذخیره تغییرات
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function updateProduct() {
            const url = '{{ route('admin.products.update', $product) }}';
            const redirectUrl = '{{ route('admin.products.index') }}';

            const imageInput = document.getElementById('image');
            if (imageInput.files.length > 0) {
                const method = 'POST';
                const formData = new FormData();
                formData.append('_method', 'PATCH');
                formData.append('name', document.querySelector('#name').value);
                formData.append('description', document.querySelector('#description').value);
                formData.append('price', document.querySelector('#price').value);
                formData.append('discounted_price', document.querySelector('#discounted_price').value);
                formData.append('quantity', document.querySelector('#quantity').value);
                formData.append('status', document.querySelector('select[name="status"]').value);
                formData.append('category_id', document.querySelector('#category_id').value);
                formData.append('image', imageInput.files[0]);

                submitAjaxFormWithImage(url, method, formData, redirectUrl);
            } else {
                const method = 'PATCH';
                const formData = {
                    name: document.querySelector('#name').value,
                    description: document.querySelector('#description').value,
                    price: document.querySelector('#price').value,
                    discounted_price: document.querySelector('#discounted_price').value,
                    quantity: document.querySelector('#quantity').value,
                    status: document.querySelector('select[name="status"]').value,
                    category_id: document.querySelector('#category_id').value,
                    image: null
                };
                submitAjaxForm(url, method, formData, redirectUrl);
            }
        }

    </script>
@endpush
