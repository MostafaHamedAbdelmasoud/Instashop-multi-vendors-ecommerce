<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('adminlte.auth.login.title') | {{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ url(asset('/css/auth.css')) }}">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">@lang('adminlte.auth.login.info')</p>

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-4">
                    <input type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email"
                           value="{{ old('email') }}"
                           autofocus
                           placeholder="@lang('adminlte.auth.login.email')">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @if($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="input-group mb-4">
                    <input type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           required
                           name="password"
                           autocomplete="current-password"
                           placeholder="@lang('adminlte.auth.login.password')">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="icheck-primary">
                            <input type="checkbox"
                                   name="remember"
                                   {{ old('remember') ? 'checked' : '' }}
                                   id="remember">
                            <label for="remember">
                                @lang('adminlte.auth.login.remember')
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('adminlte.auth.login.submit')
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-1 mt-2">
                <a href="{{ route('password.request') }}">@lang('adminlte.auth.login.forget')</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<script src="{{ url(asset('/js/auth.js')) }}"></script>
</body>
</html>
