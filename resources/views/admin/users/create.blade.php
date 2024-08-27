@extends('layouts.app')

@section('title', 'ایجاد کاربر جدید')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.users.index') }}"
                   class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>ایجاد کاربر</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">کاربران</a></div>
                <div class="breadcrumb-item">ایجاد کاربر</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">ایجاد کاربر</h2>
            <p class="section-lead">
                می توانید حساب های کاربری جدید را به وب سایت اضافه کنید
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>اطلاعات کاربر</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.users.store') }}"
                                      method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name"
                                               class="label form-control-label">نام</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email"
                                               class="label form-control-label">ایمیل</label>
                                        <input type="email"
                                               name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <label for="">رمز عبور</label>
                                            <input type="password"
                                                   autocomplete="new-password"
                                                   name="password"
                                                   class="form-control @error('password') is-invalid @enderror"">
                                            @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="">تایید رمز عبور</label>
                                            <input type="password"
                                                   autocomplete="new-password"
                                                   name="password_confirmation"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-primary">ایجاد کاربر
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
