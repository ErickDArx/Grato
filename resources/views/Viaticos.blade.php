<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Materia Prima</title>

  {!! htmlScriptTagJsApi([
  'action' => 'homepage',
  'callback_then' => 'callbackThen',
  'callback_catch' => 'callbackCatch'
  ]) !!}

  {{-- Micromodal / Jquery / Bootstrap.JS --}}
  <script src="/Grato/resources/js/micromodal.js"></script>
  <script src="/Grato/resources/js/jquery.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  {{-- Fuente de iconos --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Libreria Menú -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
  {{-- hoja de estilos para el menu / bootstrap / modal --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/modal.css') }}" rel="stylesheet">

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
        <img src="/Grato/resources/media/Logo.png" alt="" class="img-fluid" style="width: 6rem;">
      </div>

    </nav>

    <div class="row mr-2 ml-2 mt-3">

      <div class="col-md-8 mb-2">

        {{-- Presentacion / Boton / Modal --}}
        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="d-flex justify-content-center row align-items-center">
            <div class="col-sm-6">
              <h4 class="font-weight-bold">Viaticos</h4>
              <h6></h6>
            </div>
            <div class="col-sm-6">
              <div class="modal micromodal-slide" id="modal-4" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                  <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                      <div class="">
                        <div class="">
                          <p class="h4 font-weight-bold mb-2" id="">
                            Ingreso de Viaticos
                          </p>
                        </div>
                      </div>
                      <div class="">
                        <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                      </div>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                      <form id="Crear" class="form-group" method="POST" action="{{route('AgregarViaticos')}}">
                        @csrf
                        <div class="m-0 mb-2">
                          <label for="">1.Tipo de Vehículo</label>
                          <input type="text" name="tipo_de_vehiculo" class="form-control" value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">2.Antiguedad Vehículo (años)</label>
                          <input type="text" name="antiguedad_vehiculo_años" class="form-control" value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">3.Tarifa por kilometro recorrido</label>
                          <input type="text" name="tarifa_km_recorrido" class="form-control" value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">4.kilometros recorridos</label>
                          <input type="text" name="km_recorridos" class="form-control" value="">
                        </div>


                        <button type="submit" class="modal__btn modal__btn-primary col-12"
                          id="EnviarDatos">Aceptar</button>
                        <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                          aria-label="Close this dialog window">Cerrar</button>
                      </form>
                    </main>
                  </div>
                </div>
              </div>

              {{-- Aqui llamamos al modal --}}
              <a href="#" class="Viaticos btn btn-block btn-dark">Ingresar viatico</a>
            </div>
          </div>
        </div>

        {{-- Listado de viaticos / Actualizar / Eliminar --}}
        @foreach ($t_viaticos as $item)

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <form action="" method="POST">
            @csrf
            @method('PUT')
            <div class="m-1 d-flex align-items-center row border-bottom">
              <div class="col-sm-6 mb-2">
                <h5 class="m-0 card-title font-weight-bold">Tipo de Vehículo</h5>
              </div>

              <div class="col-sm-6 mb-2" id="nombre">
                <input class="form-control" readonly type="text" name="tipo_de_vehiculo"
                  value="{{$item->tipo_de_vehiculo}}">
              </div>
            </div>

            <button class="mt-4 mb-4 btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
              data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              Ver mas informacion
            </button>

            <div class="collapse" id="collapseExample">

            <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
              <div class="col-sm-12">
                <h6 class="card-title font-weight-bold mt-1">Rubro del vehiculo</h6>
              </div>

              <div class="col-sm-6 mb-2">
                <h6 class="">Antiguedad del vehiculo (años)</h6>
                <input name="antiguedad_vehiculo_años" class="form-control" type="text"
                  value="{{$item->antiguedad_vehiculo_años}}">
              </div>
              <div class="col-sm-6 mb-2">
                <h6 class="">Tarifa por kilometro recorrido</h6>
                <input name="tarifa_km_recorrido" class="form-control" type="text"
                  value="{{$item->tarifa_km_recorrido}}">
              </div>
            </div>

            <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">


              <div class="col-sm-6 mb-2">
                <div class="">
                  <h6 class="">Kilometros recorridos (ida y vuelta)</h6>
                  <input name="km_recorridos" class="form-control" type="text" value="{{$item->km_recorridos}}">
                </div>
              </div>
              <div class="col-sm-6 mb-2">
                <div class="">
                  <h6 class="">Costo total de kilometros</h6>
                  <input readonly name="total_km" class="form-control" type="text" value="{{$item->total_km}}">
                </div>
              </div>
            </div>


            <div class="justify-content-centerborder m-0 mt-2 row d-flex align-items-center">

              <div class="col-sm-6 mb-1">

                @csrf
                @method('PUT')
                <button type="submit" class="text-dark bg-white btn btn-block">Actualizar informacion</button>
          </form>
        </div>
        @endforeach



        {{-- </div> --}}

        <div class="col-sm-6 mt-1">

          <form action="" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="Eliminar text-danger btn btn-block bg-white"
              data-micromodal-trigger="modal-2">Eliminar información</button>
            <!-- Modal -->
            <div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
              <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                  <header class="modal__header">
                    <div class="">
                      <div class="">
                        <p class="h4 font-weight-bold mb-2" id="">
                          Ingreso de equipo
                        </p>
                      </div>
                    </div>
                    <div class="">
                      <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                    </div>
                  </header>
                  <main class="modal__content" id="modal-1-content">
                    <button type="submit" class="btn btn-block">
                      Aceptar
                    </button>
                  </main>
                </div>
              </div>
            </div>
          </form>
        </div>

      </div>

    </div>

    </div>


    <div class="col-md-12 mt-2">
      <div class="card shadow" style="border-radius: 0.5rem;">
        <div class="card-body text-center">
          Grato Pastas Artesanales 2021
        </div>
      </div>
    </div>
    </div>

  </main>
  <script>
    MicroModal.init({
        onShow: modal => console.info(`${modal.id} is shown`), // [1]
        onClose: modal => console.info(`${modal.id} is hidden`), // [2]
        openTrigger: 'data-custom-open', // [3]
        closeTrigger: 'data-custom-close', // [4]
        openClass: 'is-open', // [5]
        disableScroll: true, // [6]
        disableFocus: false, // [7]
        awaitOpenAnimation: false, // [8]
        awaitCloseAnimation: false, // [9]
        debugMode: false // [10]
    });

    var button = document.querySelector('.Viaticos');
    button.addEventListener('click', function () {
        MicroModal.show('modal-4');
    });

    var button = document.querySelector('.Personal');
    button.addEventListener('click', function () {
        MicroModal.show('modal-2');
    });
  </script>
</body>

</html>