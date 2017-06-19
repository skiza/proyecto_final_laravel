@extends('www.layouts.default')

@section('title','User Login')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-lg-8 offset-lg-2">
            <div class="panel panel-default">
                <div class="col-12 main__title">
                    <h1>Login</div>
                </div>
                <div class="panel-body bg_white box_shadow padding-horizontal-20 padding-vertical-30">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-12 col-lg-4 control-label">{{ trans('web.email') }}</label>

                            <div class="col-12 col-lg-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-12 col-lg-4 control-label">{{ trans('web.password') }}</label>

                            <div class="col-12 col-lg-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 col-lg-6 offset-lg-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ trans('web.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12 col-lg-8 offset-lg-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ trans('web.forgot_password') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
