@extends('layouts.auth')
@section('content')
    <style>
        .login-box-body {
            padding: 40px;
            margin: -40px;
            height: 300px;
            margin-top: -10px;
        }

        .row {
            padding-left: 20px;
            padding-top: 20px;
        }

    </style>
</head>

    <div class="login-logo">
        <a>SportsNews</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        <p class="login-box-msg">Sign in to start your session</p>

        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">

                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>





    </div>
    <!-- /.login-box-body -->
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->


@stop