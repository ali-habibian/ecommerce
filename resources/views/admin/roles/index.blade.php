@extends('layouts.app')

@section('title', 'مدیریت نقش ها')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>نقش ها</h1>
            <div class="section-header-button p-2">
                <a href="{{ route('admin.roles.create') }}"
                   class="btn btn-primary">ایجاد نقش جدید</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">نقش ها</a></div>
                <div class="breadcrumb-item">نقش ها</div>
            </div>
        </div>

        <div class="section-body">

            <h2 class="section-title">نقش ها</h2>
            <p class="section-lead">
                شما می توانید تمام نقش ها مانند ویرایش، حذف و اختصاص مجوزها را مدیریت کنید.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <h4>تمام نقش ها</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-borderless rounded-md">

                                    <tr class="">
                                        <th>اسم</th>
                                        <th>گارد</th>
                                        <th>ایجاد شده در</th>
                                        <th>عملیات</th>
                                    </tr>

                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>
                                                <a href="{{ route('admin.roles.edit', $role) }}"
                                                   class="btn btn-link text-decoration-none text-bg-dark">
                                                    {{ $role->name }}
                                                </a>
                                            </td>

                                            <td>{{ $role->guard_name }}</td>
                                            <td>{{ $role->created_at->diffForHumans() }}</td>
                                            <td><a class="btn btn-primary"
                                                   href="{{ route('admin.roles.edit', $role) }}">ویرایش</a></td>
                                        </tr>
                                    @endforeach

                                </table>
                            </div>

                            <div class="float-right">
                                {{ $roles->links('vendor.pagination.bootstrap-5') }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
