@extends('layouts.admin.app')

@section('title', 'ویرایش برند')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>برند ها</h1>
            <div class="section-header-breadcrumb breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.brands.index') }}">برند ها</a></div>
                <div class="breadcrumb-item">ویرایش برند</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">ویرایش برند</h2>
            <p class="section-lead mb-5">در این صفحه می توانید برند ها را ویرایش کنید.</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <p class="section-lead">اطلاعات اولیه درباره برند را اضافه کنید.</p>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>جزئیات برند</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">عنوان</label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="form-control"
                                       value="{{ old('name', $brand->name) }}">

                                <span class="invalid-feedback" id="name-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea name="description"
                                          id="description"
                                          rows="8"
                                          class="form-control">{{ old('description', $brand->description) }}</textarea>

                                <span class="invalid-feedback" id="description-error"></span>
                            </div>

                            <div class="form-group text-right">
                                <button id="submitButton" class="btn btn-primary btn-lg" onclick="updateBrand()">
                                    ذخیره تغییرات
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function updateBrand() {
            const url = '{{ route('admin.brands.update', $brand) }}';
            const method = 'PATCH';
            const formData = {
                name: $('#name').val(),
                description: $('#description').val(),
            };
            const redirectUrl = '{{ route('admin.brands.index') }}';

            submitAjaxForm(url, method, formData, redirectUrl);
        }
    </script>
@endpush
