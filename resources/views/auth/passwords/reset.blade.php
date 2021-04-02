@extends('layouts.app')

@section('content')

<div class="text-center">
    <img src="{{ asset('media/Logo.png') }}" alt="Logo Sistema Informático Grato Pastas Artesanales"
        style="width: 8rem;margin-bottom: 0.5rem;margin-top: 1rem;" class="img-fluid position-relative">
</div>
<div>
    <form class="mb-5 col-md-8 container card-body shadow tarjeta" method="POST" action="{{ route('password.update') }}" style="width: 20rem;margin-bottom:0;border-radius: 20px;">
        @csrf
        <div class="form-group text-center">
            <h4 class="font-weight-bold">Restablecimiento de contraseña</h4>
        </div>
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="m-3">

        </div>
        <div class="form-group">
            <label for="email" class="font-weight-bold col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="">
                <input readonly id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="font-weight-bold col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="password-confirm" class="font-weight-bold col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group mb-0">
            <div class="">
                <button type="submit" class="btn btn-dark btn-block">
                    {{ __('Reset Password') }}
                </button>
                <a href="{{ route('login') }}" class="btn btn-block text-dark bg-transparent">Regresar a Acceso</a>
            </div>
        </div>
    </form>
</div>
@endsection
