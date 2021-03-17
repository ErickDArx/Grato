<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sistema GratoCR" />
    <meta name="theme-color" content="#E23636">
    <meta name="description" content="Plataforma oficial para la pyme GratoCR" />
    <meta property="og:description" content="Plataforma oficial para la pyme GratoCR" />
    <meta name="keywords" content="PYME, gratocr, pastas, sistema, artesanales" />
    <meta property="og:url" content="sistema.gratocr.com" />
    <meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta property="og:image" content="/Grato/resources/media/Logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/Grato/resources/media/Logo.png" />
    <title> @yield('titulo')Acceso - GratoCR </title>
    {!! htmlScriptTagJsApi([
    'action' => 'homepage',
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch'
    ]) !!}
    {{-- Micromodal / Jquery / Bootstrap.JS / iScroll / drawer--}}
    <script src="/Grato/resources/js/jquery.js"></script>
    <script src="/Grato/resources/js/micromodal.js"></script>
    <script src="/Grato/resources/js/ajax.js"></script>
    <script src="/Grato/resources/js/bootstrap.bundle.min.js"></script>
    <script src="/Grato/resources/js/chartist.min.js"></script>
    <script src="/Grato/resources/js/iscroll.min.js"></script>
    <script src="/Grato/resources/js/drawer.min.js"></script>
    {{-- Fuente de iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <!-- Libreria Menú -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="slider-hero">

    <header>
        <section class="">
            <div class="">
                <div class="">

                    <div class="text-center">
                        <img src="/Grato/resources/media/Logo.png"
                            alt="Logo Sistema Informático Grato Pastas Artesanales"
                            style="width: 10rem;margin-bottom: 2rem;margin-top: 2rem;"
                            class="img-fluid position-relative">
                    </div>


                    <div>
                        <form class="col-10 container card-body shadow bg-light"
                            style="width: 26rem;margin-bottom: 3rem;border-radius: 1rem;" method="POST"
                            action="{{ route('login') }}">
                            @csrf
                            <div class="text-center">
                                <div class="form-group text-center">
                                    <h3 class="mt-2 font-weight-bold">Ingreso al sistema</h3>
                                </div>


                                @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="text-danger">
                                        @foreach ($errors->all() as $error)
                                        <span>{{$error}}</span>
                                        @endforeach
                                    </div>
                                </div>

                                @endif
                                <div class="form-group text-left">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="nombre_usuario" value="{{ old('email') }}" id="nombre_usuario"
                                        aria-describedby="emailHelp" autofocus required>
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                    @error('email')
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
                                {{-- <div class="form-group form-check text-left">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Mantener la sesión
                                        activa</label>
                                </div> --}}
                                <button type="submit"
                                    class="btn btn-red shadow btn-block border-0 mb-2">Acceder</button>

                                {{-- <a href="submit" class="btn btn-outline-gray btn-block">Olvide mi contraseña</a> --}}
                            
                            </div>

                        </form>

                    </div>

                </div>
            </div>

        </section>
    </header>


    <script>
        $(window).on("load", function () {
            document.querySelector(".pre-loader");
        });
    </script>

</body>

</html>