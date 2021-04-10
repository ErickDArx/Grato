<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('titulo') - GratoCR </title>

    {{-- Micromodal / Jquery / Bootstrap.JS / iScroll / drawer --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/micromodal.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/chartist.min.js') }}"></script>
    <script src="{{ asset('js/iscroll.min.js') }}"></script>
    <script src="{{ asset('js/drawer.min.js') }}"></script>
    {{-- Fuente de iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <!-- Libreria Menú -->
    <link href="{{ asset('css/drawer.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/chartist.min.css') }}" rel="stylesheet">

</head>

<body class="drawer drawer--left drawer--sidebar blanco" style="background-color:#E6E6E6 ;">
    <div class="loading"></div>
    <div class="loader"></div>
    @extends('layouts/menu')
    
    <main role="main" class="drawer-contents bg-blanco">
        <nav class="border-0 shadow navbar navbar-dark bg-white nav p-4">
            <div class="col-12 text-right">
                @unless (Auth::check())
                <p class="alert text-danger">
                    Usted no ha iniciado sesión aun!
                </p>
                @endunless

                @auth
                <a href="{{route('Perfil')}}" class="rounded text-gray">
                    {{ auth()->user()->nombre_operario }}
                    {{ auth()->user()->apellido_usuario }}

                </a>
                @endauth
            </div>
        </nav>
        <div class="row mr-1 ml-1">
            <div class="col-md-8 mb-2">

                <div class="" style="border-radius: 0.5rem;">
                    <div class="mt-4">
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

            <div class="col-md-4 mb-2 mt-3">
                <div class="card shadow m-2" style="border-radius: 0.5rem;">
                    <div class="card-body text-center">

                        <h4>{{ date('h:i a') }}</h4>

                        <p class="text-gray">{{ date('d') }} de {{ date('M') }} del {{ date('Y') }}</p>

                        <h5 class="text-center mb-3 text-oscuro">Acciones Rápidas</h5>
                        {{-- <div class=" mt-2">
                            <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Pedidos.html">
                                <div class="row ">
                                    <p class="m-0 col-8 text-left"><i class="fa fa-plus mr-2"></i> Alistar pedido</p>

                                </div>
                            </a>
                        </div> --}}
                        {{-- <div class=" mt-2">
                            <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Reportes.html">
                                <div class="row ">
                                    <p class="m-0 col-8 text-left"><i class="fa fa-eye mr-2"></i>Ver los pedidos hechos
                                    </p>

                                </div>
                            </a>
                        </div> --}}
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

    </main>
</body>
{{--$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#EnviarDatos").click(function(e) {
            e.preventDefault(); //Evitar recargar la pagina
            var dataString = $('#Crear').serialize();
            $.ajax({
                type: 'POST',
                url: 'Total',
                data: dataString,
                cache: false,
                processData: false,
                success: function(response) {

                    if (response) {
                        $("#Lista").load(" #Lista");

                    }
                }
            });
        }); --}}
</html>