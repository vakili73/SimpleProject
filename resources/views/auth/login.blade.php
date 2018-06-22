@extends('auth.master')

@section('title', 'ورود به سیستم')

@section('body')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Saman</b>RFID</a>
    </div>
    <!-- /.login-logo -->
    
    @include('auth.message')
    
    <div class="login-box-body">
        <p class="login-box-msg">ورود به سامانه مدیریت محلی ناوگان</p>

        <form role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="نام کاربری" required="">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="رمز عبور" required="">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember">مرا به خاطر بسپار
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">ورود</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- <span class="glyphicon glyphicon-globe"></span> -</p>
            <img class="img-responsive" src="{{ url('logo.png') }}" alt="logo"> 
        </div>
        <!-- /.social-auth-links -->
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection
