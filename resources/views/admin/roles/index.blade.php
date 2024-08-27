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
                                            <td>
                                                <a class="btn btn-primary"
                                                   href="{{ route('admin.roles.edit', $role) }}">ویرایش</a>

                                                <button data-bs-target="#deleteRoleModal{{ $role->id }}"
                                                        data-bs-toggle="modal"
                                                        type="button"
                                                        class="btn btn-danger">
                                                    حذف
                                                </button>
                                            </td>
                                        </tr>
                                        @push('modals')
                                            <!-- Delete Modal -->
                                            <div class="modal fade"
                                                 tabindex="-1"
                                                 id="deleteRoleModal{{ $role->id }}">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">تایید حذف </h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>
                                                                پس از حذف نقش {{ $role->name }}، برخی از کاربران ممکن است دسترسی به برخی از بخش‌های سایت را از دست بدهند. آیا مطمئن هستید که می خواهید ادامه دهید؟
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">لغو</button>
                                                            <a href="{{ route('admin.roles.destroy', $role) }}"
                                                               data-turbo-method="delete"
                                                               class="btn btn-danger">حذف</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endpush
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
