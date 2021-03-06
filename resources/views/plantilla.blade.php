<!DOCTYPE html>
<html lang="es">
{{-- CSS / JS / Iconografia / TOKEN / --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('titulo') - GratoCR </title>
    <link rel="icon" type="image/png" href="{{ asset('css/ravioles.svg') }}" />
    {{-- Fuente de iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <!-- Libreria Menú -->
    <link href="{{ asset('css/drawer.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chartist.min.css') }}" rel="stylesheet">
    {{-- Micromodal / Jquery / Bootstrap.JS / iScroll / drawer --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/micromodal.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/chartist.min.js') }}"></script>
    <script src="{{ asset('js/iscroll.min.js') }}"></script>
    <script src="{{ asset('js/drawer.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.min.js"
        integrity="sha512-RGbSeD/jDcZBWNsI1VCvdjcDULuSfWTtIva2ek5FtteXeSjLfXac4kqkDRHVGf1TwsXCAqPTF7/EYITD0/CTqw=="
        crossorigin="anonymous"></script>
</head>

<body class="drawer drawer--left drawer--sidebar blanco" style="background-color:#E6E6E6 ;">
    <div class="loading"></div>
    <div class="loader"></div>

    <main role="main" class="drawer-contents bg-blanco">
        {{-- Informacion del usuario autenticado --}}
        <nav class="row p-0 m-0 border-0 d-flex align-items-center shadow navbar navbar-dark bg-white nav p-4">

            <button type="button" class="drawer-toggle drawer-hamburger bg-white rounded-circle shadow-lg">
                <img class="m-0 img-fluid" src="{{ asset('css/ravioles.svg') }}" alt="">
            </button>
            @extends('layouts/menu')

            <div class="col-sm-7 col-12" style="">

                <div class="text-center text-sm-right font-weight-bolder">
                    <a class="h4 p-2 text-dark font-weight-bold" href="@yield('Ruta')"> <i class="@yield('Icono')"></i>
                        @yield('Vista')</a>
                </div>

            </div>
            <div class="col-sm-5 mt-sm-0 mt-4 col-12 text-sm-right text-center">
                @auth
                <div class="dropdown">
                    <a href="{{route('Perfil')}}" class="rounded text-gray dropdown-toggle" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-circle"></i>
                        {{ auth()->user()->nombre_operario }}
                        {{ auth()->user()->apellido_usuario }}
                    </a>
                    <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('Perfil')}}"><i class="fa fa-user-circle mr-2"></i>Ir al
                            perfil</a>
                        <a class="dropdown-item" href="{{route('Principal')}}"><i class="fa fa-house-user mr-2"></i>ir
                            al men&uacute; principal</a>
                        <a class="dropdown-item text-dark" href="#" style=""
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="fa fa-sign-out-alt mr-2"></i>Cerrar Sesi&oacute;n</a>

                        <form hidden id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @endauth
            </div>


        </nav>

        <div class="row mr-1 ml-1">
            <div class="col-md-8 mb-2">

                <div class="" style="border-radius: 0.5rem;">
                    <div class="">
                        @yield('contenido')
                    </div>
                </div>

                <div class="" style="border-radius: 0.5rem;">
                    <div class="">
                        @yield('contenido-2')
                    </div>

                </div>

                <div class="" style="border-radius: 0.5rem;">
                    <div class="">
                        @yield('contenido-3')
                    </div>

                </div>

                <div class="" style="border-radius: 0.5rem;">
                    <div class="">
                        @yield('contenido-4')
                    </div>
                </div>

                <div class="" style="border-radius: 0.5rem;">
                    <div class="">
                        @yield('contenido-5')
                    </div>
                </div>
            </div>

            <div class="col-md-4 ">

                <div class="card shadow m-2" style="border-radius: 0.5rem;">
                    <div class="card-body text-center">
                        @php
                        setLocale(LC_ALL,'es_ES');
                        Carbon\Carbon::setLocale('es');
                        $date = \Carbon\Carbon::now();
                        $date->diffForHumans();
                        @endphp
                        <h5 class="">{{ date('h:i a')}}</h5>

                        <p class="text-gray m-0">{{ date('d') }} de {{ $date->formatLocalized('%B') }} del
                            {{ date('Y') }}</p>


                    </div>
                </div>

                <div class="card shadow m-2" style="border-radius: 0.5rem;">
                    <div class="card-body text-center">
                        <h6 class="text-center mb-3 text-oscuro">Acciones Rápidas</h6>

                        <div class=" mt-2">
                            <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="{{ 'MateriaPrima' }}">
                                <div class="row">
                                    <p class="m-0 col-8 text-left"><i class="fa fa-clipboard-list mr-2"></i>Ingresar
                                        materia prima
                                    </p>

                                </div>
                            </a>
                        </div>
                        <div class=" mt-2">
                            <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="{{ 'Equipo' }}">
                                <div class="row ">
                                    <p class="m-0 col-8 text-left"><i class="fa fa-cog mr-2"></i>Ingresar nuevo equipo
                                    </p>

                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12 mr-1 ml-1 mb-3">
                <div class="card shadow" style="border-radius: 0.5rem;">
                    <div class="card-body text-center text-oscuro">
                        Copyright © {{ date('Y') }} Grato Pastas Artesanales
                    </div>
                </div>
            </div>

        </div>

        {{-- Detectar errores y avisar al usuario --}}
        @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
            <div style="transition: 0s !important" class="modal fade" id="staticBackdrop" tabindex="-100"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal__container">
                        <header class="modal__header">
                            <div class="">
                                <div class="">
                                    <p class="h4 font-weight-bold mb-2 text-danger" id="">
                                        <i class="fa fa-exclamation-circle mr-2 "></i>Por favor corriga los siguientes campos:
                                    </p>
                                </div>
                            </div>
                            <div class="">
                                <button type="button" class="Close modal__close shadow-sm" aria-label="Close"
                                    data-dismiss="modal">
                                </button>
                            </div>
                        </header>
                        <div class="modal-body">
                            @foreach ($errors->all() as $error)
                            <p><i class="fa fa-exclamation mr-2"></i> {{ $error }}</p>
                            @endforeach
                        </div>
                        <footer class="modal__footer">
                            <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
                                Aceptar
                            </button>
                            <button class="modal__btn col-3" data-micromodal-close
                                aria-label="Close this dialog window ">Cerrar</button>
                        </footer>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <script>
                $('#staticBackdrop').modal('show'); // abrir
                $('#staticBackdrop').modal('hide'); // cerrar
            </script>
            @endforeach
        </div>
        @endif

    </main>
</body>

</html>