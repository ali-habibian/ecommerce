@extends('layouts.app')

@section('title')
    ویرایش {{ $user->name }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.users.index') }}"
                   class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $user->name }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">کاربران</a></div>
                <div class="breadcrumb-item">ویرایش کاربر</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">ویرایش کاربر</h2>
            <p class="section-lead">
                شما می توانید اطلاعات حساب کاربری مانند رمز عبور، نام و ایمیل را ویرایش کنید
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>پروفایل</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.users.update', $user) }}"
                                      method="POST">
                                    @method('PATCH')
                                    @csrf

                                    <div class="form-group">
                                        <label for="name"
                                               class="label form-control-label">نام</label>
                                        <input type="text"
                                               name="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name', $user->name) }}">
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
                                               value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-primary">ویرایش
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
