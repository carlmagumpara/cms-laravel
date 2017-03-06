@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="login-form">
                <h3 class="text-center login-header">ADMIN LOGIN</h3>
                <form role="form" method="POST" action="{{ url('admin/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control login-field" name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your Email">
                        <label class="login-field-icon fui-user" for="login-name"></label>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control login-field" name="password" required placeholder="Enter your Password">
                        <label class="login-field-icon fui-lock" for="login-pass"></label>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

<!--                     <div class="form-group center">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                            </label>
                        </div>
                    </div> -->

                    <div class="form-group center">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Login
                        </button>

                        <a class="btn btn-link login-link" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
