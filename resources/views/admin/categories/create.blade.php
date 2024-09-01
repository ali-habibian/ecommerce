@extends('layouts.app')

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

            <form method="post"
                  action="{{ route('admin.categories.store') }}">
                @csrf
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
                                            class="form-select custom-control custom-select @error('parent_id') is-invalid @enderror"
                                            name="parent_id">
                                        <option selected
                                                value=''>انتخاب کنید ...</option>
                                        @foreach ($categories as $category)
                                            @if ($category->id === 0)
                                                <option selected
                                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('parent_id')
                                    <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="name">عنوان</label>
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}">

                                    @error('name')
                                    <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">توضیحات</label>
                                    <textarea name="description"
                                              id="description"
                                              rows="8"
                                              class="form-control @error('description') is-invalid @enderror ">{{ old('description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit"
                                            class="btn btn-dark btn-lg">ایجاد دسته بندی
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
@endsection
