@extends('layouts.admin.app')

@section('title', 'ویرایش دسته بندی')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>دسته بندی ها</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="#">دسته بندی ها</a></div>
                <div class="breadcrumb-item">ویرایش دسته بندی</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">ویرایش دسته بندی</h2>
            <p class="section-lead mb-5">در این صفحه می‌توانید دسته‌ها بندی ها را ویرایش کنید</p>

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
                                <label for="parent_id">دسته بندی والد (اختیاری)</label>
                                <select id="parent_id"
                                        class="form-select custom-control custom-select"
                                        name="parent_id">
                                    <option value=''>انتخاب کنید ...</option>
                                    @foreach ($categories as $parent)
                                        <option value="{{ $parent->id }}"
                                            {{ $parent->id === old('parent_id', $category->parent_id) ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="invalid-feedback" id="parent_id-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="name">عنوان</label>
                                <input type="text"
                                       id="name"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name', $category->name) }}">
                                <span class="invalid-feedback" id="name-error"></span>
                            </div>

                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea name="description"
                                          id="description"
                                          class="form-control">{{ old('description', $category->description) }}</textarea>
                                <span class="invalid-feedback" id="description-error"></span>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="image">تصویر</label>
                                <input class="form-control" type="file" name="image" id="image">
                                <span class="invalid-feedback" id="image-error"></span>
                            </div>

                            <div class="form-group text-right">
                                <button id="submitButton" class="btn btn-primary btn-lg"
                                        onclick="updateCategory()">
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
        function updateCategory() {
            const url = '{{ route('admin.categories.update', $category) }}';
            const redirectUrl = '{{ route('admin.categories.index') }}';

            const imageInput = document.getElementById('image');
            if (imageInput.files.length > 0) {
                const method = 'POST';
                const formData = new FormData();
                formData.append('_method', 'PATCH');
                formData.append('name', document.querySelector('#name').value);
                formData.append('description', document.querySelector('#description').value);
                formData.append('parent_id', document.querySelector('#parent_id').value);
                formData.append('image', imageInput.files[0]);

                submitAjaxFormWithImage(url, method, formData, redirectUrl);
            } else {
                const method = 'PATCH';
                const formData = {
                    name: document.querySelector('#name').value,
                    description: document.querySelector('#description').value,
                    parent_id: document.querySelector('#parent_id').value,
                    image: null
                };
                submitAjaxForm(url, method, formData, redirectUrl);
            }
        }

    </script>
@endpush
