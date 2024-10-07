@extends('layouts.auth')

@section('title', 'ثبت نام - دیجی ارومیه')

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
                                <label for="name">نام و نام خانوادگی</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" autofocus>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="email">ایمیل</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-6">
                                <label for="password" class="d-block">رمز عبور</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="password_confirmation" class="d-block">تایید رمز عبور</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                       name="password_confirmation">
                                @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="address" class="d-block">آدرس</label>
                                <input id="address" name="address" type="text"
                                       class="form-control @error('address') is-invalid @enderror"
                                       value="{{ old('address') }}">
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label for="telephone" class="d-block">موبایل</label>
                                <input id="telephone" name="telephone" type="text"
                                       class="form-control @error('telephone') is-invalid @enderror"
                                       value="{{ old('telephone') }}">
                                @error('telephone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
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
