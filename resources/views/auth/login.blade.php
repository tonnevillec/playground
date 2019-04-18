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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label for="email" class="input-group-text"><i class="fas fa-user"></i></label>
                        </div>
                        <input id="email" type="email" class="form-control input_user{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('Adresse mail') }}" required autocomplete="email" autofocus>

                        {{--                                @if ($errors->has('email'))--}}
                        {{--                                    <span class="invalid-feedback" role="alert">--}}
                        {{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
                        {{--                                    </span>--}}
                        {{--                                @endif--}}
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <label for="password" class="input-group-text"><i class="fas fa-key"></i></label>
                        </div>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Mot de passe') }}" required autocomplete="current-password">

                        {{--                                @if ($errors->has('password'))--}}
                        {{--                                    <span class="invalid-feedback" role="alert">--}}
                        {{--                                        <strong>{{ $errors->first('password') }}</strong>--}}
                        {{--                                    </span>--}}
                        {{--                                @endif--}}
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="customControlInline">{{ __('Se rappeler de moi') }}</label>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="submit" name="button" class="btn login_btn">{{ __('Connexion') }}</button>
                    </div>
                </form>
            </div>

            <div class="mt-4">
                @if (Route::has('register'))
                    <div class="d-flex justify-content-center links">
                        Vous n'avez pas de compte? <a href="#" class="ml-2">{{ __('S\'inscrirre') }}</a>
                    </div>
                @endif
                @if (Route::has('password.request'))
                    <div class="d-flex justify-content-center links">
                        <a href="{{ route('password.request') }}">{{ __('Mot de passe oublié?') }}</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
