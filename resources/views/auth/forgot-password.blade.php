@extends('layouts.auth')

@section('title', 'بازیابی رمز عبور - دیجی ارومیه')

@section('content')
    <div class="d-flex justify-content-center align-items-center min-vh-100">

        <div class="col-lg-4 col-md-6 col-12 bg-white card m-3">
            <div class="p-4 m-3">
                <div class="login-brand">
                    <img src="{{asset('assets/images/DU-Agb.svg')}}" alt="logo" width="100">
                </div>

                <div class="card shadow-primary">
                    <div class="card-header"><h4>بازیابی رمز عبور</h4></div>

                    <div class="card-body">
                        <p class="text-muted">ما لینکی برای بازیابی رمز عبور شما ارسال خواهیم کرد</p>
                        <form method="POST">
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    بازیابی رمز عبور
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

    </div>
@endsection
