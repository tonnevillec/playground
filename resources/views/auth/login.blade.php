@extends('layouts.common')

@section('style')
    <link href="{{ mix('css/auth.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container login" id="app">

    <div class="d-flex justify-content-center h-100">
        <div class="user_card shadow p-2">
            <div class="d-flex justify-content-center">
                <a class="brand_logo_container" href="{{ route('home') }}">
                    <img src="{{ url('images/logo.png') }}" class="brand_logo" alt="Logo">
                </a>
            </div>
            <div class="d-flex justify-content-center form_container">
                <form>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="email" class="input-group-text"><i class="fas fa-user"></i></label>
                        </div>
                        <input type="email" name="email" id="email" class="form-control input_user" value="" placeholder="{{ __('Adresse mail') }}">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <label for="password" class="input-group-text"><i class="fas fa-key"></i></label>
                        </div>
                        <input type="password" name="password" id="password" class="form-control input_pass" value="" placeholder="{{ __('Mot de passe') }}">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                            <label class="custom-control-label" for="customControlInline">{{ __('Se rappeler de moi') }}</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-center mt-3 login_container">
                <button type="button" name="button" class="btn login_btn">{{ __('Connexion') }}</button>
            </div>
            <div class="mt-4">
                <div class="d-flex justify-content-center links">
                    Vous n'avez pas de compte? <a href="#" class="ml-2">{{ __('S\'inscrirre') }}</a>
                </div>
                <div class="d-flex justify-content-center links">
                    <a href="#">{{ __('Mot de passe oublié?') }}</a>
                </div>
            </div>
        </div>
    </div>




{{--    --}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Login') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                @if ($errors->has('email'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password">--}}

{{--                                @if ($errors->has('password'))--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <div class="col-md-6 offset-md-4">--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row mb-0">--}}
{{--                            <div class="col-md-8 offset-md-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    {{ __('Login') }}--}}
{{--                                </button>--}}

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                        {{ __('Forgot Your Password?') }}--}}
{{--                                    </a>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection
