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
{{--                                <form id="storeImage" action="{{ route('admin.products.store') }}"--}}
{{--                                      method="post">--}}
{{--                                    @csrf--}}
                                    <div class="form-group"
                                         data-controller="filepond"
                                         data-filepond-process-value="{{ route('admin.images.store') }}"
                                         data-filepond-restore-value="{{ route('admin.images.show') }}"
                                         data-filepond-revert-value="{{ route('admin.images.destroy') }}"
                                         data-filepond-current-value="{{ json_encode(old('images', [])) }}">

                                        <input type="file" id="image"
                                               data-filepond-target="input">
                                        <span class="invalid-feedback" id="image-error"></span>

                                        @foreach (old('images', []) as $image)
                                            <input data-filepond-target="upload"
                                                   type="hidden"
                                                   name="images[]"
{{--                                                   form="storeProduct"--}}
                                                   value="{{ $image }}">
                                        @endforeach

                                        <template data-filepond-target="template">
                                            <input data-filepond-target="upload"
                                                   type="hidden"
                                                   name="NAME"
{{--                                                   form="storeProduct"--}}
                                                   value="VALUE">
                                        </template>

{{--                                        <input type="submit"--}}
{{--                                               hidden--}}
{{--                                               form="storeImage">--}}
                                    </div>
{{--                                </form>--}}
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
                                {{--         Inventory fields here,  quantity sku and what not                   --}}
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>انواع</h4>
                            </div>
                            <div class="card-body">
                                {{--             Product variation fields here, color and stuff              --}}
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>سئو</h4>
                            </div>
                            <div class="card-body">
                                {{--              SEO Fields here              --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>وضعیت محصول</h4>
                            </div>
                            <div class="card-body">
                                {{--           product status fields here                --}}
                            </div>
                        </div>

                        <div class="card rounded-lg">
                            <div class="card-header">
                                <h4>سازمان محصول</h4>
                            </div>
                            <div class="card-body">
                                {{-- product organization fields here, category, collections, tags, etc --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group text-right">
                            <input type="submit"
                                   class="btn btn-primary btn-lg"
                                   value="Save"
                                   form="storeProduct">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
