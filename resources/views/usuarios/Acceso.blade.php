<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('titulo')Acceso - GratoCR </title>
    {!! htmlScriptTagJsApi([
    'action' => 'homepage',
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch',
]) !!}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    {{-- Fuente de iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <!-- Libreria Menú -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="slider-hero">
    <div class="text-center">
        <img src="{{ asset('media/Logo.png') }}" alt="Logo Sistema Informático Grato Pastas Artesanales"
            style="width: 8rem;margin-bottom: 0.5rem;margin-top: 1rem;" class="img-fluid position-relative">
    </div>
    <div id="">
        <form id="Crear" class="col-md-8 container card-body shadow tarjeta"
            style="width: 20rem;margin-bottom:0;border-radius: 20px;" method="POST" action="{{ route('login') }}">
            @csrf
            <div id="Lista">
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
                        <label>Usuario</label>
                        <input type="text" class="form-control @error('nombre_usuario') is-invalid @enderror"
                            name="nombre_usuario" value="{{ old('nombre_usuario') }}" id="nombre_usuario"
                            aria-describedby="emailHelp" autofocus required>

                        <div class="valid-feedback">
                            Looks good!
                        </div>
                        <small id="emailHelp" class="form-text text-muted"></small>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group text-left">
                        <label>Contraseña</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-red shadow btn-block border-0"
                        id="EnviarDatos">Acceder</button>
                    <a type="button" class="btn btn-block btn-outline-dark border-0"
                        href="{{ route('password.request') }}">Olvide la contraseña</a>

                </div>
            </div>

        </form>

    </div>

    <script>
        $(window).on("load", function() {
            document.querySelector(".pre-loader");
        });

    </script>

</body>

</html>
