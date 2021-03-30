@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img src="{{ asset('media/Logo.png') }}" alt="Logo Sistema Informático Grato Pastas Artesanales"
            style="width: 8rem;margin-bottom: 0.5rem;margin-top: 1rem;" class="img-fluid position-relative">
    </div>
    <div>
        <form class="col-md-8 container card-body shadow tarjeta" style="width: 20rem;margin-bottom:0;border-radius: 20px;"
            method="POST" action="{{ route('password.email') }}">
            @csrf
            <div>
                <div class="form-group text-center">
                    <h4 class="font-weight-bold">Restablecer contraseña</h4>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group m-1">
                    <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="">
                        <div class="mt-2">
                            <button type="submit" class="form-control btn btn-block btn-dark">
                                Enviar enlace al correo
                            </button>
                        </div>

                        <div class="mt-2">
                            <a href="{{ route('acceso') }}" class="btn btn-block btn-outline-dark border-0">
                                Regresar al acceso
                            </a>
                        </div>
                    </div>

                </div>

            </div>



        </form>
    </div>
@endsection
