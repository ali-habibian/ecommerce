@extends('layouts.auth')

@section('content')
    <section class="">
        <div class="d-flex flex-wrap align-items-center">
            <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                <div class="p-4 m-3 mt-md-5 py-md-5">
                    <h4 class="text-dark font-weight-normal">به <span class="fw-bold">دیجی ارومیه</span> خوش آمدید</h4>
                    <p class="text-muted">
                        قبل از شروع، باید وارد شوید، یا اگر قبلاً حساب کاربری ندارید، ثبت نام کنید.
                    </p>

                    <form method="POST"
                          action="{{ route('login') }}"
                          class="needs-validation"
                          novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">ایمیل</label>
                            <input id="email"
                                   type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   tabindex="1"
                                   required
                                   autofocus>
                            @error('email')
                            <div class="invalid-feedback">
                                لطفا ایمیل خود را وارد کنید
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password"
                                       class="control-label">رمز عبور</label>
                            </div>
                            <input id="password"
                                   type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   tabindex="2"
                                   required>
                            @error('password')
                            <div class="invalid-feedback">
                                لطفا رمز عبور خود را وارد کنید
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox"
                                       name="remember"
                                       class="custom-control-input @error('remember') is-invalid @enderror"
                                       tabindex="3"
                                       id="remember-me">
                                <label class="custom-control-label"
                                       for="remember-me">مرا به خاطر بسپار</label>

                            </div>
                        </div>

                        <div class="form-group text-end">
                            <a href="{{ route('password.request') }}"
                               class="float-start mt-3">
                                فراموشی رمز عبور؟
                            </a>
                            <button type="submit"
                                    class="btn btn-primary btn-lg btn-icon icon-right"
                                    tabindex="4">
                                ورود
                            </button>
                        </div>

                        <div class="mt-5 text-center">
                            حساب کاربری ندارید؟ <a href="{{ route('register') }}">ایجاد حساب کاربری جدید</a>
                        </div>
                    </form>


                    <div class="text-center mt-5 text-small">
                        Copyright {{ date('Y') }} Ali Habibian. All rights reserved.
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom"
                 style="background-image: url('{{asset('assets/images/shop-background.jpg')}}'); background-size: cover">
                <div class="absolute-bottom-left index-2">
                    <div class="text-light p-5 pb-2">
                        <div class="mb-5 pb-3">
                            <h1 class="mb-2 display-4 font-weight-bold">وقت بخیر</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
