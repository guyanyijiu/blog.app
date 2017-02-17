@extends('layouts.auth.app')
@section('title', '注册')
@section('body', 'register-page')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url('/') }}"><b>B</b>log</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>

            <form action="{{ url('/register') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}" required autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if($errors->has('name'))
                        <span class="help-block">
                            {{ $errors->first('name') }}
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{--<div class="social-auth-links text-center">--}}
                {{--<p>- OR -</p>--}}
                {{--<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using--}}
                    {{--Facebook</a>--}}
                {{--<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using--}}
                    {{--Google+</a>--}}
            {{--</div>--}}

            <a href="{{ url('/login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->
@endsection

