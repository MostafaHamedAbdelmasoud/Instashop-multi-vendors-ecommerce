<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@lang('adminlte.auth.confirm.title') | {{ config('app.name', 'Laravel') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset(mix('/css/auth.css')) }}">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="{{ url('/') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    @if($errors->has('password'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ $errors->first('password') }}</strong>
        </div>
    @endif
<!-- User name -->
    <div class="lockscreen-name">{{ auth()->user()->name }}</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <img src="https://www.gravatar.com/avatar/{{ auth()->user()->email }}?d=mm"
                 alt="{{ auth()->user()->name }}">
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" method="POST" action="{{ route('password.confirm') }}">
            @csrf
            <div class="input-group">
                <input type="password"
                       class="form-control"
                       required
                       name="password"
                       autocomplete="current-password"
                       placeholder="@lang('adminlte.auth.confirm.password')">

                <div class="input-group-append">
                    <button type="submit" class="btn">
                        <i class="fas fa-arrow-right text-muted"></i>
                    </button>
                </div>
            </div>
        </form>
        <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        @lang('adminlte.auth.confirm.info')
    </div>
</div>
<!-- /.center -->

<script src="{{ asset(mix('/js/auth.js')) }}"></script>
</body>
</html>
