@extends('layouts.admin.app')

@section('title', 'ایجاد نقش جدید')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.users.index') }}"
                   class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>ایجاد نقش</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.home.index') }}">داشبورد</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">نقش ها</a></div>
                <div class="breadcrumb-item">ایجاد نقش جدید</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">ایجاد نقش جدید</h2>
            <p class="section-lead">
                می‌توانید نقش‌های جدیدی اضافه کنید و به آن‌ها مجوز بدهید.
            </p>

            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-7 ms-auto">
                        <div class="card">
                            <div class="card-header">
                                <h4>نقش</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.roles.store') }}"
                                      method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label for="name"
                                               class="label form-control-label">اسم</label>
                                        <input type="text"
                                               name="name"
                                               id="name"
                                               class="form-control @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="guard"
                                               class="label form-control-label">گارد</label>
                                        <input type="text"
                                               name="guard"
                                               id="guard"
                                               placeholder="web"
                                               class="form-control @error('guard') is-invalid @enderror"
                                               value="{{ old('guard') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn btn-primary">ایجاد نقش</button>
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
