@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card w-100">
                <div class="card-body">
                    <h3 class="card-title">@lang('auth.login_label', [], app()->getLocale())</h3>
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">@lang('auth.login_email_label', [], app()->getLocale())</label>

                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">@lang('auth.login_password_label', [], app()->getLocale())</label>

                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> @lang('auth.login_remember_me_label', [], app()->getLocale())
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                @lang('auth.login_label', [], app()->getLocale())
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                @lang('auth.login_forgot_password_label', [], app()->getLocale())
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
