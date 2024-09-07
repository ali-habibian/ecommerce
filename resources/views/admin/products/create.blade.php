@extends('layouts.app')

@section('title', 'ایجاد محصول جدید')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.products.index') }}"
                   class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>ایجاد محصول جدید</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">محصولات</a></div>
                <div class="breadcrumb-item">ایجاد محصول جدید</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">ایجاد محصول جدید</h2>

            <p class="section-lead">
                در این صفحه می توانید یک محصول جدید ایجاد کنید.
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>اطلاعات پایه</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.products.partials.basic-info')
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
                                @include('admin.products.partials.pricing')
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
                                    <label class="form-label"
                                           for='quantity'>تعداد</label>

                                    <input type="text"
                                           name="quantity"
                                           id='quantity'
                                           placeholder="تعداد را وارد کنید..."
                                           class="form-control"
                                           value="{{ old('quantity') }}">
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
                                        <option value="draft">پیش نویس</option>
                                        <option value="review">در حال بررسی</option>
                                        <option value="active">فعال</option>
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
                                    <select name="category_id" id='category_id' class="form-select">
                                        @foreach ($categories as $category)
                                            @if ($category->id == old('category_id') || strtolower($category->name) == 'default')
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
                                    onclick="createProduct()">
                                ایجاد محصول
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
        function createProduct() {
            const url = '{{ route('admin.products.store') }}';
            const method = 'POST';

            // Initialize formData
            const formData = new FormData();
            formData.append('name', document.querySelector('#name').value);
            formData.append('description', document.querySelector('#description').value);
            formData.append('price', document.querySelector('#price').value);
            formData.append('discounted_price', document.querySelector('#discounted_price').value);
            formData.append('quantity', document.querySelector('#quantity').value);
            formData.append('status', document.querySelector('select[name="status"]').value);
            formData.append('category_id', document.querySelector('#category_id').value);

            // Append the image file to the formData
            const imageInput = document.getElementById('image');
            if (imageInput.files.length > 0) {
                formData.append('image', imageInput.files[0]);
            }

            const redirectUrl = '{{ route('admin.products.index') }}';

            submitAjaxFormWithImage(url, method, formData, redirectUrl);
        }
    </script>
@endpush

