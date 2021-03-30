@extends('layouts.app')

@section('content')

<div class="text-center">
    <img src="{{ asset('media/Logo.png') }}" alt="Logo Sistema Informático Grato Pastas Artesanales"
        style="width: 8rem;margin-bottom: 0.5rem;margin-top: 1rem;" class="img-fluid position-relative">
</div>
<div>
    <form class="col-md-8 container card-body shadow tarjeta" method="POST" action="{{ route('password.update') }}" style="width: 30rem;margin-bottom:0;border-radius: 20px;">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-dark btn-block">
                    {{ __('Reset Password') }}
                </button>
                <a href="{{ route('login') }}" class="btn btn-block text-dark bg-transparent">Regresar a Acceso</a>
            </div>
        </div>
    </form>
</div>
@endsection
