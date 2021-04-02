<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('titulo')Acceso - GratoCR </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! htmlScriptTagJsApi([
        'action' => 'homepage',
        'custom_validation' => 'myCustomValidation'
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
    <div class="loading"></div>
    <div class="loader"></div>

        <main class="">
            @yield('content')
        </main>

    <script>
        $(window).on("load", function() {
            $('.loader').delay(15).fadeOut('slow');
            $('.loading').delay(15).fadeOut('slow');

        });

        function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}
    </script>
</body>

</html>
