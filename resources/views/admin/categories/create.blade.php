@extends('layouts.admin.app')

@section('title','ایجاد دسته بندی')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>دسته بندی ها</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="#">دسته بندی ها</a></div>
                <div class="breadcrumb-item">ایجاد دسته بندی جدید</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">ایجاد دسته بندی جدید</h2>
            <p class="section-lead mb-5">در این صفحه می توانید برای محصولات خود دسته بندی ایجاد کنید</p>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <p class="section-lead">اطلاعات اولیه در مورد دسته بندی را اضافه کنید</p>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">

                        <div class="card-header">
                            <h4>جزئیات دسته بندی</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label" for="parent_id">دسته بندی والد (اختیاری)</label>
                                <select id="parent_id"
                                        class="form-select custom-control custom-select"
                                        name="parent_id">
                                    <option selected
                                            value=''>انتخاب کنید ...
                                    </option>
                                    @foreach ($categories as $category)
                                        @if ($category->id === 0)
                                            <option selected
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" id="parent_id-error"></span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="name">عنوان</label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="form-control"
                                       value="{{ old('name') }}">
                                <span class="invalid-feedback" id="name-error"></span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="description">توضیحات</label>
                                <textarea name="description"
                                          id="description"
                                          rows="8"
                                          class="form-control">{{ old('description') }}</textarea>
                                <span class="invalid-feedback" id="description-error"></span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="image">تصویر</label>
                                <input class="form-control" type="file" name="image" id="image">
                                <span class="invalid-feedback" id="image-error"></span>
                            </div>

                            <div class="form-group text-right">
                                <button id="submitButton" class="btn btn-primary btn-lg"
                                        onclick="createCategory()">
                                    ایجاد دسته بندی
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
        function createCategory() {
            const url = "{{ route('admin.categories.store') }}";
            const method = 'POST';

            // Initialize formData
            const formData = new FormData();
            formData.append('name', document.querySelector('#name').value);
            formData.append('description', document.querySelector('#description').value);
            formData.append('parent_id', document.querySelector('#parent_id').value);

            // Append the image file to the formData
            const imageInput = document.getElementById('image');
            if (imageInput.files.length > 0) {
                formData.append('image', imageInput.files[0]);
            }

            const redirectUrl = '{{ route('admin.categories.index') }}';

            submitAjaxFormWithImage(url, method, formData, redirectUrl);
        }
    </script>
@endpush
