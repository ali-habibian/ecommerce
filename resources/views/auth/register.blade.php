@extends('layouts.auth')

@section('title', 'ورود - دیجی ارومیه')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-8 bg-white card m-3 p-3">
                <div class="login-brand">
                    <img src="{{asset('assets/images/DU-Agb.svg')}}" alt="logo" width="100">
                </div>

                <div class="card card-primary">
                    <div class="card-header"><h4>ایجاد حساب کاربری جدید</h4></div>

                    <div class="card-body">
                        <form method="POST"
                              action="{{ route('register') }}"
                              class="needs-validation"
                              novalidate="">
                            @csrf
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="first_name">نام</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" autofocus>
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name">نام خانوادگی</label>
                                    <input id="last_name" type="text" class="form-control" name="last_name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input id="email" type="email" class="form-control" name="email">
                                <div class="invalid-feedback">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="d-block">رمز عبور</label>
                                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label for="password2" class="d-block">تایید رمز عبور</label>
                                    <input id="password2" type="password" class="form-control" name="password-confirm">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label>آدرس</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group col-6">
                                    <label>موبایل</label>
                                    <input type="tel" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    ثبت نام
                                </button>

                                <a class="btn btn-danger btn-lg btn-block" tabindex="4" href="{{ route('login') }}">
                                    انصراف
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Ali Habibian {{ date('Y') }}
                </div>
            </div>
        </div>
@endsection
