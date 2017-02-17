@extends('layouts.auth.app')
@section('title', '重置密码')
@section('body', 'login-page')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('/') }}"><b>B</b>log</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Reset Password</p>
            <form action="{{ url('/password/email') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-flat">Send Password Reset Link</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection
