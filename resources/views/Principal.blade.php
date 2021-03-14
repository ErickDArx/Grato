<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio | Sistema Grato Pastas Artesanales</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceso</title>
  {!! htmlScriptTagJsApi([
  'action' => 'homepage',
  'callback_then' => 'callbackThen',
  'callback_catch' => 'callbackCatch'
  ]) !!}
  {{-- Favicon --}}
  <link rel="icon" type="image/png" href="././css/acceso.jpg" />
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css"
    integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg=="
    crossorigin="anonymous" />

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

<body class="drawer drawer--left drawer--sidebar" style="background-color:#E6E6E6 ;">
  @extends('menu')
  <main role="main" class="drawer-contents" style="background-color:#E6E6E6 ;">
    <nav class="navbar navbar-dark bg-white nav">
      <div class="col-12 text-center">
        <img src="/Grato/resources/media/Logo.png" alt="" class="img-fluid justify-content-center" style="width: 6rem;">
        <div style="right: 0;top: 1.3rem;" class="d-flex btn position-absolute shadow-">
          {{-- <a href="{{route('Perfil')}}" class="text-dark">{{ auth()->user()->nombre_usuario }} <span
            class="badge badge-dark">1</span></a> --}}
        </div>
      </div>
    </nav>
    <div class="row mr-2 ml-2 mt-3">
      <div class="col-md-8 mb-2">
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body">
            <h4 class="font-weight-bold text-oscuro"><i class="fa fa-chart-line mr-2"></i>Menú Principal</h4>
            <h6 class="text-gray">Gráfico de ventas hechas según el mes</h5>

              <div class="ct-chart ct-golden-section">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js"
                  integrity="sha512-9rxMbTkN9JcgG5euudGbdIbhFZ7KGyAuVomdQDI9qXfPply9BJh0iqA7E/moLCatH2JD4xBGHwV6ezBkCpnjRQ=="
                  crossorigin="anonymous"></script>
                <script>
                  new Chartist.Line('.ct-chart', {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    series: [
                      [5,6,8,14,23,9,0,10,20,15,3,14]
                    ]
                  }, );
                </script>
              </div>
          </div>
        </div>

      </div>

      {{-- <div class="col-md-4">
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body text-center">

            <h4>{{date('h:i a')}}</h4>

      <p class="text-gray">{{date('d')}} de {{date('M')}} del {{date('Y')}}</p>

      <h5 class="text-center mb-3 text-oscuro">Acciones Rápidas</h5>
      <div class=" mt-2">
        <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Pedidos.html">
          <div class="row ">
            <p class="m-0 col-8 text-left"><i class="fa fa-plus mr-2"></i> Alistar pedido</p>
            <p class="m-0 col-4 text-right text-danger material-icons">
              navigate_next
            </p>
          </div>
        </a>
      </div>
      <div class=" mt-2">
        <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Reportes.html">
          <div class="row ">
            <p class="m-0 col-8 text-left"><i class="fa fa-eye mr-2"></i>Ver los pedidos hechos</p>
            <p class="m-0 col-4 text-right text-danger material-icons">
              navigate_next
            </p>
          </div>
        </a>
      </div>
      <div class=" mt-2">
        <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="MateriaPrima.html">
          <div class="row">
            <p class="m-0 col-8 text-left"><i class="fa fa-clipboard-list mr-2"></i>Ingresar materia prima</p>
            <p class="m-0 col-4 text-right text-danger material-icons">
              navigate_next
            </p>
          </div>
        </a>
      </div>
      <div class=" mt-2">
        <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Equipo.html">
          <div class="row ">
            <p class="m-0 col-8 text-left"><i class="fa fa-cog mr-2"></i>Ingresar nuevo equipo</p>
            <p class="m-0 col-4 text-right text-danger material-icons">
              navigate_next
            </p>
          </div>
        </a>
      </div>
    </div>
    </div>
    </div> --}}

    <div class="col-md-12 mt-2 mb-3">
      <div class="card shadow" style="border-radius: 0.5rem;">
        <div class="card-body text-center text-oscuro">
          Copyright © {{ date('Y') }} Grato Pastas Artesanales
        </div>
      </div>
    </div>

    </div>

  </main>

</body>

</html>