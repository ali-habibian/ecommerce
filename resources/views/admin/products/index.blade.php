@extends('layouts.app')

@section('title', 'محصولات')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>محصولات</h1>
            <div class="section-header-button p-2">
                <a href="{{ route('admin.products.create') }}"
                   class="btn btn-primary">ایجاد محصول جدید</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">محصولات</a></div>
                <div class="breadcrumb-item">محصولات</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">محصولات</h2>
            <p class="section-lead">
                در این صفحه شما می توانید تمام محصولات را مدیریت کنید، مانند ویرایش، حذف و موارد دیگر.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>محصولات</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input type="text"
                                               class="form-control"
                                               placeholder="جستجو"
                                            {{ stimulus_controller('filter', [
                                               'route' => 'admin.products.index',
                                               'filter' => 'search',
                                            ]) }}
                                            {{ stimulus_action('filter', 'change', 'input') }}>
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="card-body">
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

                                <div class="table-responsive">
                                    <table class="table table-borderless table-invoice rounded">
                                        <tr>
                                            <th>عنوان</th>
                                            <th>دسته بندی</th>
                                            <th>تعداد</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>

                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    {!! Str::limit($product->name, 40) !!}
                                                </td>
                                                <td>
                                                    {{ $product->category->name }}
                                                </td>
                                                <td>
                                                    {{ $product->quantity ?? 0 }} عدد باقی مانده
                                                </td>
                                                <td>
                                                    @if ($product->status == 'active')
                                                        <div class="badge badge-primary">فعال</div>
                                                    @elseif($product->status == 'review')
                                                        <div class="badge badge-info">در حال بررسی</div>
                                                    @else
                                                        <div class="badge badge-danger">پیشنویس</div>
                                                    @endif
                                                </td>
                                                <td
                                                    {{ stimulus_controller('obliterate', ['url' => route('admin.products.destroy', $product)]) }}>

                                                    <div>
                                                        <a href='{{ route('admin.products.edit', $product) }}'
                                                           class='btn btn-primary'>ویرایش</a>
                                                        <button {{ stimulus_action('obliterate', 'handle') }}
                                                                class="btn btn-danger">حذف</button>
                                                        <form {{ stimulus_target('obliterate', 'form') }}
                                                              method="POST"
                                                              action="{{ route('admin.products.destroy', $product) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </turbo-frame>

                            <div class="float-right">
                                {{ $products->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
