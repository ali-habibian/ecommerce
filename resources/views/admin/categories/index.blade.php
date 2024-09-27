@extends('layouts.admin.app')

@section('title','دسته بندی ها')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>دسته بندی ها</h1>
            <div class="section-header-button p-2">
                <a href="{{ route('admin.categories.create') }}"
                   class="btn btn-primary">ایجاد دسته بندی</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/administration">داشبور</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">دسته بندی ها</a></div>
                <div class="breadcrumb-item">دسته بندی ها</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">دسته بندی ها</h2>
            <p class="section-lead">
                شما می توانید همه دسته بندی ها را مدیریت کنید، مانند ویرایش، حذف و موارد دیگر.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>دسته بندی ها</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-end">
                                <form>
                                    <div class="d-flex">
                                        <input type="text"
                                               class="form-control w-full"
                                               placeholder="جستجو"
                                            {{ stimulus_controller('filter', [
                                                'route' => 'admin.categories.index',
                                                'filter' => 'search',
                                            ]) }}
                                            {{ stimulus_action('filter', 'change', 'input') }}>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <turbo-frame class='w-full'
                                             id='categories'
                                             target="_top"
                                    {{ stimulus_controller('reload') }}
                                    {{ stimulus_actions([
                                        [
                                            'reload' => ['filterChange', 'filter:change@document'],
                                        ],
                                        [
                                            'reload' => ['sortChange', 'sort:change@document'],
                                        ],
                                    ]) }}>
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>تصویر</th>
                                            <th>عنوان</th>
                                            <th>توضیحات</th>
                                            <th>دسته بندی والد</th>
                                            <th>تاریخ ایجاد</th>
                                            <th>عملیات</th>
                                        </tr>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/' . $category->image) }}"
                                                         width="60px"
                                                         alt="{{ $category->name }}">
                                                </td>
                                                <td>
                                                    {{ $category->name }}
                                                </td>
                                                <td>
                                                    {!! Str::limit($category->description, 40) !!}
                                                </td>
                                                <td>
                                                    {{ $category?->parent?->name }}
                                                </td>
                                                <td>{{ $category->created_at->diffForHumans() }}</td>
                                                <td {{ stimulus_controller('obliterate', ['url' => route('admin.categories.destroy', $category)]) }}>
                                                    <div>
                                                        <a href="{{ route('admin.categories.edit', $category) }}"
                                                           class='btn btn-primary'>ویرایش</a>
                                                        <button {{ stimulus_action('obliterate', 'handle') }}
                                                                class="btn btn-danger">حذف
                                                        </button>
                                                        <form {{ stimulus_target('obliterate', 'form') }}
                                                              method="POST"
                                                              action="{{ route('admin.categories.destroy', $category) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </turbo-frame>
                            </div>
                            <div class="float-right">
                                <nav>
                                    {{ $categories->links('vendor.pagination.bootstrap-5') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
