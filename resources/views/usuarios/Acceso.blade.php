@extends('layouts.app')

@section('content')
    <div class="text-center">
        <img src="{{ asset('media/Logo.png') }}" alt="Logo Sistema Informático Grato Pastas Artesanales"
            style="width: 8rem;margin-bottom: 0.5rem;margin-top: 1rem;" class="img-fluid position-relative">
    </div>
    <form class="col-md-8 container card-body shadow tarjeta" style="width: 20rem;margin-bottom:0;border-radius: 20px;"
        method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <div class="form-group text-center">
                <h4 class="font-weight-bold">Ingreso al sistema</h4>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="text-danger">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                </div>

            @endif

            <div class="m-3">
                <div class="form-group text-left">
                    <label class="font-weight-bold"> <i class="fa fa-user mr-2 "></i>Nombre de usuario</label>
                    <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror"
                        name="nombre_usuario" value="{{ old('nombre_usuario') }}" id="nombre_usuario"
                        aria-describedby="usuario" autofocus placeholder="">

                </div>

                <div class="form-group text-left">
                    <label class="font-weight-bold"><i class="fa fa-key mr-2 "></i>Contraseña</label>
                    <div class="input-group">
                    <input type="password" id="txtPassword" class="form-control @error('password') is-invalid @enderror"
                        name="password" id="password" autocomplete="current-password">

                    <div class="input-group-append">
                        <button id="show_password" class="btn btn-dark" type="button" onclick="mostrarPassword()"> <span
                                class="fa fa-eye-slash icon"></span> </button>
                    </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-red shadow btn-block border-0" id="EnviarDatos">Acceder</button>
                <a type="button" class="btn btn-block btn-outline-dark border-0"
                    href="{{ route('password.request') }}">Olvide la contraseña</a>

            </div>
        </div>

    </form>

    </div>


@endsection
