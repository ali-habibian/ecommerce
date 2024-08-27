@extends('layouts.app')

@section('title', 'کاربران')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1 class="p-2">کاربران: </h1>
            <div class="section-header-button">
                <a href="{{ route('admin.users.create') }}"
                   class="btn btn-primary">ایجاد کاربر جدید</a>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">کاربران</a></div>
                <div class="breadcrumb-item">همه کاربران</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">کاربران</h2>
            <p class="section-lead">
                شما می توانید همه کاربران را مدیریت کنید، مانند ویرایش، حذف و موارد دیگر.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>همه کاربران</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>نام</th>
                                        <th>ایمیل</th>
                                        <th>نقش</th>
                                        <th>ثبت شده در</th>
                                    </tr>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                <a href="#">
                                                    <img alt="image"
                                                         src="{{ asset('assets/images/user-icon.png') }}"
                                                         class="rounded-circle"
                                                         width="35"
                                                         data-toggle="title"
                                                         title="">
                                                    <div class="d-inline-block p-2">{{ $user->name }}</div>
                                                </a>

                                                <div class="table-links"
                                                     data-controller="obliterate"
                                                     data-obliterate-trash-value="1">
                                                    <a href="{{ route('admin.users.edit', $user) }}">ویرایش</a>
                                                    <div class="bullet"></div>
                                                    @if ($user->id !== auth()->user()->id)
                                                        <a data-action="click->obliterate#handle"
                                                           href="javascrpit:void(0)"
                                                           class="btn btn-link text-danger">حذف</a>
                                                        <form
                                                            method="POST"
                                                            action="{{ route('admin.users.destroy', $user) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>

                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles?->first()?->name ?? 'None' }}</td>
                                            <td>{{ $user->created_at->diffForHumans() }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                            <div class="float-right">
                                {{ $users->links('vendor.pagination.bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
