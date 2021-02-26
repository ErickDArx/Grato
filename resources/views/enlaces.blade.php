<!DOCTYPE html>
<html lang="es">
<head>
  {!! htmlScriptTagJsApi([
    'action' => 'homepage',
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch'
]) !!}
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="././media/Grupo 1.png" />
    {{-- Meta-SEO --}}
    <meta name="description" content="Acceso al Sistema Informático Grato Pastas Artesanales">
    <meta name="robots" value="Noindex">
    <meta name="keywords" content="Acceso">
    <meta name="theme-color" content="#E23636">
    {{-- Fuente de iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Libreria Menú -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">

    {{-- Estilos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css" integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg==" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
    <link rel="stylesheet" href="././css/app.css">  
    {{-- Javascript --}}

  <!-- jquery & iScroll -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
  <!-- drawer.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/lax.js"></script>
  <script>
    
    $(document).ready(function () {
      $('.drawer').drawer();
      $('.js-tilt').tilt({
        option: value,
        option: value,
      });
    });
  </script>

</head>
<body>
</body>
</html>
