<!DOCTYPE html>
<html lang="es">

<head>
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
        <img src="../media/Grupo 1.png" alt="" class="img-fluid" style="width: 6rem;">

      </div>

    </nav>

    <div class="row mr-2 ml-2 mt-3">

      <div class="col-md-8 mb-2">

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="d-flex justify-content-center row align-items-center">
            <div class="col-sm-6">
              <h4 class="font-weight-bold">Costos Indirectos de Fabricación</h4>
              <h6></h6>
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
                      <form id="Crear" class="form-group" method="POST" action="">
                        @csrf
                        <div class="m-0 mb-2">
                          <label for="">1.Nombre del equipo</label>
                          <input type="text" name="nombre_equipo" class="form-control" value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">2.Tiempo de uso (minutos)</label>
                          <input type="text" name="tiempo_uso" class="form-control" value="">
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
              <a href="#" class="Operario btn btn-block btn-dark">Ingresar CIF</a>
            </div>
          </div>
        </div>
        <div class="m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="row d-flex align-items-center">
            <div class="col-sm-6">
              <h5 class="m-0">Seleccione el mes y año</h5>
            </div>
            <div class="col-sm-6 row m-0">
              <select name="" id="" class="col-sm-6 form-control">
                <option value="Enero">Marzo</option>
              </select>
              <div class="m-1"></div>
              <select name="" id="" class="col-sm-5 form-control">
                <option value="Enero">2021</option>
              </select>
            </div>
          </div>
        </div>

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="m-0 d-flex align-items-center row border-bottom">
            <div class="col-sm-6">
              <h5 class="card-title font-weight-bold">Titulo del CIF</h5>
            </div>
            <div class="col-sm-6" id="nombre">
              <h5 class="">Internet</h5>
            </div>
          </div>


          <button class="mt-4 mb-4 btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Ver mas informacion
          </button>

          <div class="collapse" id="collapseExample">
            <div class="mr-0 ml-0 border-bottom mb-2 container mt-2 row d-flex align-items-center">
              <div class="col-sm-6 mb-2">
                <h6 class="card-title mb-4">Total a pagar</h6>
                <h6 class=""> colones</h6>
              </div>
              <div class="mb-2 col-sm-6 ">
                <div class="">
                  <h6 class="mb-4">Porcentaje de utilizacion de la empresa</h6>
                  <h6> colones</h6>
                </div>
              </div>
            </div>
            <div class="mr-0 ml-0 border-bottom mb-2 container mt-2 row d-flex align-items-center">
              <div class="col-sm-6 mb-2">
                <h6 class="card-title mb-4">Porcentaje de produccion del producto</h6>
                <h6 class=""> colones</h6>
              </div>
              <div class="mb-2 col-sm-6">
                <div class="">
                  <h6 class="mb-4">Produccion promedio mensual</h6>
                  <h6> colones</h6>
                </div>
              </div>
            </div>
            <div
              class="mr-0 ml-0 border-bottom mb-2 container mt-2 row d-flex align-items-center card-footer rounded border-top-0">
              <div class="col-sm-6 mb-2">
                <h6 class="card-title mb-4">Total</h6>
                <h6 class=""> colones</h6>
              </div>
            </div>
            <div class="justify-content-centerborder m-0 mt-2 row d-flex align-items-center">

              <div class="col-sm-6 mb-1">
                <form action="" method="POST">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="text-dark bg-white btn btn-block">Actualizar informacion</button>
                </form>
              </div>

              <div class="col-sm-6 mt-1">

                <form action="{{}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="Eliminar text-danger btn btn-block bg-white" data-toggle="modal"
                    data-target="#EliminarEquipo">Eliminar información</button>
                  <!-- Modal -->

                </form>


              </div>

            </div>
          </div>









        </div>


      </div>

      <div class="col-md-4">
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
    });

    var button = document.querySelector('.Operario');
    button.addEventListener('click', function () {
        MicroModal.show('modal-1');
    });

  </script>
</body>

</html>