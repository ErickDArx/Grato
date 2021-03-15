<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceso</title>
  {{-- {!! htmlScriptTagJsApi([
  'action' => 'homepage',
  'callback_then' => 'callbackThen',
  'callback_catch' => 'callbackCatch'
  ]) !!} --}}
  {{-- Favicon --}}
  <link rel="icon" type="image/png" href="././css/acceso.jpg" />
  {{-- Meta-SEO --}}
  <meta name="description" content="Acceso al Sistema Informático Grato Pastas Artesanales">
  <meta name="robots" value="Noindex">
  <meta name="keywords" content="Acceso">
  <meta name="theme-color" content="#E23636">

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

  {{-- Estilos --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css"
    integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg=="
    crossorigin="anonymous" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/modal.css') }}" rel="stylesheet">
  <!-- jquery & iScroll -->
  {{-- <script
  src="https://code.jquery.com/jquery-1.12.4.js"
  integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
  crossorigin="anonymous"></script> --}}

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
        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="d-flex justify-content-center row align-items-center">
            <div class="col-sm-6">
              <h4 class="font-weight-bold">Equipos</h4>
              <h6>Desglose de recursos</h6>
            </div>
            <div class="col-sm-6">
              <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
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
                      <form id="Crear" class="form-group" method="POST" action="{{route('AgregarEquipo')}}">
                        @csrf
                        @foreach ($t_labores as $item)
                        @php
                        $dias = $item->dias_laborales_semana;
                        $horas = $item->horas_laborales_dia;
                        @endphp
                        <input type="number" name="dias_laborales_semana" hidden class="form-control"
                          value="{{$item->dias_laborales_semana}}">
                        <input type="number" name="horas_laborales_dia" hidden class="form-control"
                          value="{{$item->horas_laborales_dia}}">
                        @endforeach
                        <div class="m-0 mb-2">
                          <label for="">1.Nombre del equipo</label>
                          <input type="text" name="nombre_equipo" class="form-control" value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">2.Precio</label>
                          <input type="number" name="precio" class="form-control" value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">3.Vida util</label>
                          <input type="number" name="vida_util" class="form-control" value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">4.Porcentaje de utilizacion</label>
                          <input type="number" name="porcentaje_utilizacion" class="form-control" value="">
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
              <a href="#" class="Operario btn btn-block btn-dark">Ingresar recurso</a>
            </div>
          </div>
        </div>

        @foreach ($t_equipos as $item)

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">

          <form action="{{route('ActualizarEquipo',$item->id_equipo)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="dias_laborales_semana" hidden class="form-control" value="{{$dias}}">
            <input type="number" name="horas_laborales_dia" hidden class="form-control" value="{{$horas}}">
            <div class="m-1 d-flex align-items-center row border-bottom">

              <div class="col-sm-6 mb-2">
                <h5 class="m-0 card-title font-weight-bold">Nombre del equipo</h5>
              </div>

              <div class="col-sm-6 mb-2 m-0" id="">
                <input class="form-control" type="text" name="nombre_equipo" readonly value="{{$item->nombre_equipo}}">
              </div>

            </div>

            <button class="mt-4 mb-4 btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
              data-target="#collapseExample{{$item->id_equipo}}" aria-expanded="false" aria-controls="collapseExample">
              Ver mas informacion
            </button>

            <div class="collapse" id="collapseExample{{$item->id_equipo}}">

              <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
                <div class="col-sm-6 mb-2">
                  <h6 class="card-title font-weight-bold mt-1">Precio</h6>
                  <input name="precio" class="form-control" type="text" value="{{$item->precio}}">
                </div>
                <div class="col-sm-6 mb-2">
                  <div class="">
                    <h6 class="card-title font-weight-bold mt-1">Vida util</h6>
                    <input name="vida_util" class="form-control" type="number" value="{{$item->vida_util}}">
                  </div>
                </div>
              </div>

              <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
                <div class="col-sm-6 mb-2">
                  <h6 class="card-title font-weight-bold mt-1">Depreciacion anual</h6>
                  <input name="depreciacion_anual" class="form-control" readonly type="text"
                    value="{{$item->depreciacion_anual}}">
                </div>
                <div class="col-sm-6 mb-2">
                  <h6 class="card-title font-weight-bold mt-1">Porcentaje utilizacion</h6>
                  <input name="porcentaje_utilizacion" class="form-control" type="number"
                    value="{{$item->porcentaje_utilizacion}}">
                </div>
              </div>

              <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
                <div class="col-sm-6 mb-2">
                  <h6 class="font-weight-bold">Depreciacion anual real</h6>
                  <input name="depreciacion_anual_real" class="form-control" readonly type="text"
                    value="{{$item->depreciacion_anual_real}}">
                </div>

                  <div class="col-sm-6 mb-2">
                    <h6 class="font-weight-bold">Depreciacion mensual</h6>
                    <input name="depreciacion_mensual" class="form-control" readonly type="text"
                      value="{{$item->depreciacion_mensual}}">
                  </div>

              </div>

              <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
                <div class="col-sm-6 mb-2">
                  <h6 class="font-weight-bold">Depreciacion semanal</h6>
                  <input name="depreciacion_semanal" class="form-control" readonly type="text"
                    value="{{$item->depreciacion_semanal}}">
                </div>

                  <div class="col-sm-6 mb-2">
                    <h6 class="font-weight-bold">Depreciacion diaria</h6>
                    <input name="depreciacion_diaria" class="form-control" readonly type="text"
                      value="{{$item->depreciacion_diaria}}">
                  </div>

              </div>

              <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
                <div class="col-sm-6 mb-2">
                  <h6 class="font-weight-bold">Depreciacion en horas</h6>
                  <input name="depreciacion_diaria" class="form-control" readonly type="text"
                    value="{{$item->depreciacion_hora}}">
                </div>

                  <div class="col-sm-6 mb-2">
                    <h6 class="font-weight-bold">Depreciacion en minutos</h6>
                    <input name="depreciacion_anual_real" class="form-control" readonly type="text"
                      value="{{$item->depreciacion_minuto}}">
                  </div>

              </div>

            </div>
            <div class="modal micromodal-slide disabled" id="modal-3{{$item->id_equipo}}" aria-hidden="true">
              <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                  <header class="modal__header">
                    <div class="">
                      <div class="">
                        <p class="h4 font-weight-bold mb-2" id="">
                          Editar Recurso
                        </p>
                      </div>
                    </div>
                    <div class="">
                      <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                    </div>
                  </header>
                  <main class="modal__content" id="modal-1-content">
                    <h6 class="mt-2 mb-2">Si usted da aceptar, el recurso se actualizara y no se podran regresar
                      los
                      datos anteriores</h6>
                    <button type="submit" class="btn btn-block">
                      Aceptar
                    </button>
                  </main>
                </div>
              </div>
            </div>
          </form>
          <div class="row d-flex align-items-center">
            <div class="col-sm-6">

              <button type="button" data-micromodal-trigger="modal-3{{$item->id_equipo}}"
                class="Actualizar text-dark bg-white btn btn-block">Actualizar informacion</button>

            </div>
            <div class="col-sm-6">
              <form action="{{route('EliminarEquipo', $item->id_equipo)}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="button" class="Eliminar text-danger btn btn-block bg-white"
                  data-micromodal-trigger="modal-2{{$item->id_equipo}}">Eliminar información</button>
                <!-- Modal -->
                <div class="modal micromodal-slide" id="modal-2{{$item->id_equipo}}" aria-hidden="true">
                  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                      <header class="modal__header">
                        <div class="">
                          <div class="">
                            <p class="h4 font-weight-bold mb-2" id="">
                              Eliminar Recurso
                            </p>
                          </div>
                        </div>
                        <div class="">
                          <button class="modal__close shadow-sm" aria-label="Close modal"
                            data-micromodal-close></button>
                        </div>
                      </header>
                      <main class="modal__content" id="modal-1-content">
                        <h6 class="mt-2 mb-2">Si usted da aceptar, el recurso se elimina permanentemente</h6>
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
        {{-- <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="m-0 d-flex align-items-center row border-bottom">
            <div class="col-sm-6">
              <h5 class="card-title font-weight-bold">Recurso</h5>
            </div>
            <div class="col-sm-6" id="nombre">
              <h6 class="">{{$item->nombre_equipo}}</h6>
      </div>
    </div>

    <div class="mr-0 ml-0 border-bottom mb-2 container mt-2 row d-flex align-items-center">
      <div class="col-sm-6 mb-2">
        <h6 class="card-title mb-4">Tiempo de uso</h6>
        <h6 class="">{{$item->tiempo_uso}} minutos</h6>
      </div>
      <div class="shadow-sm mb-2 col-sm-6 card-footer rounded border-top-0">
        <div class="">
          <h6 class="mb-4">Total</h6>
          <h6>{{$item->total}} colones</h6>
        </div>
      </div>
    </div>

    <div class="justify-content-centerborder m-0 mt-2 row d-flex align-items-center">

      <div class="col-sm-6 mb-1">
        <form action="{{route('ActualizarEquipo',$item->id_equipo)}}" method="POST">
          @csrf
          @method('PUT')
          <button type="submit" class="text-dark btn btn-block">Actualizar informacion</button>
        </form>
      </div>

      <div class="col-sm-6 mt-1">

        <form action="{{route('EliminarEquipo',$item->id_equipo)}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="Eliminar text-danger btn btn-block bg-white" data-toggle="modal"
            data-target="#EliminarEquipo">Eliminar información</button>
          <!-- Modal -->

        </form>


      </div>

    </div>

    </div> --}}

    @endforeach


    </div>

    {{-- <div class="col-md-4">
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body text-center">
            <h4>12:45 p.m.</h4>
            <p class="text-gray">Lunes 1 de Febrero del 2021</p>

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
    });

    var button = document.querySelector('.Operario');
    button.addEventListener('click', function () {
        MicroModal.show('modal-1');
    });

  </script>


</body>

</html>