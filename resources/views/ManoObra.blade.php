<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio | Sistema Grato Pastas Artesanales</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mano de Obra</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceso</title>
  {{-- Google recatcha --}}
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
        {{-- Mano de obra --}}
        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="d-flex justify-content-center row align-items-center">
            <div class="col-sm-6">
              <h4 class="font-weight-bold">Mano de obra</h4>
              <h6>Desglose de operarios</h6>
            </div>
            <div class="col-sm-6">
              <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                  <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                      <div class="">
                        <div class="">
                          <p class="h4 font-weight-bold mb-2" id="">
                            Ingreso de operario
                          </p>
                        </div>
                      </div>
                      <div class="">
                        <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                      </div>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                      <form id="Crear" class="form-group" method="POST" action="{{route('total')}}">
                        @csrf
                        <label for="">(Opcional) Operario ya existente</label>
                        <select class="form-control">
                          <option class="">Seleccionar</option>
                          @foreach ($t_usuario as $item)
                          <option>{{$item->nombre_usuario}}</option>
                          @endforeach
                        </select>
                        <div class="m-1">
                          <label for="">1.Nombre del operario</label>
                          <input type="text" name="nombre_trabajador" class="form-control" id="nombre_trabajador"
                            value="">
                        </div>
                        <div class="m-1">
                          <label for="">2.Apellido del operario</label>
                          <input type="text" name="apellido_trabajador" class="form-control" id="apellido_trabajador"
                            value="">
                        </div>
                        <div class="m-1">
                          <label for="">3.Tiempo trabajado (minutos)</label>
                          <input type="text" name="minutos_trabajados" class="form-control" id="minutos_trabajados"
                            value="">
                        </div>
                        <button type="submit" class="modal__btn modal__btn-primary col-12"
                          id="EnviarDatos">Aceptar</button>
                        <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                          aria-label="Close this dialog window">Cerrar</button>

                    </main>
                    </form>
                  </div>
                </div>
              </div>
              <a href="#" class="Operario btn btn-block btn-dark">Ingresar operario</a>
            </div>
          </div>
        </div>

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="d-flex justify-content-center row align-items-center">
            <h4 class="col-12 font-weight-bold">Configuración</h4>
            <h6 class="col-12">Costo por minuto</h6>
            <div class="col-sm-6 input-group has-validation">

              <div class="input-group-prepend">
                <span class="input-group-text">₡</span>
              </div>
              <input type="text" class="form-control" name="costo_minuto" id="costo_minuto">

            </div>
            <div class="col-sm-6">
              <a class="btn btn-block btn-outline-gray m-1 border-dark" href="">Cambiar el costo por minuto</a>
            </div>
          </div>
        </div>


        <!-- notificacion de grabado -->
<div id="notificacion" class="alert alert-success alert-dismissable"  role="alert" 
style="">
   <strong>Se ha Agregado un Registro</strong>
</div>

{{--  Historico de Cursos registrados --}}
<div id='historico' style="display: none;">
    <h3>Historico de Creaciones</h3>
    <ul>
    </ul>
</div>
        {{-- Listado Operarios --}}
        @foreach ($t_mano_de_obra as $item)
        <div class="shadow m-2 card-body bg-white" id="Lista" style="border-radius: 0.5rem;">
          <div class="">
            <div class="m-0 d-flex align-items-center row">
              <div class="col-sm-6">
                <h5 class="card-title m-0 font-weight-bold">Colaborador(a)</h5>
              </div>
              <div class="col-sm-6">
                <h6 class="mt-1">{{$item->nombre_trabajador}} {{$item->apellido_trabajador}}</h6>
              </div>
            </div>

            <div class=" m-0 mt-2 row d-flex align-items-center">
              <div class="col-sm-6">
                <h6 class="card-title">Tiempo Trabajado</h6>
                <h6 class="">{{$item->minutos_trabajados}}</h6>
              </div>
              <div class="col-sm-6 border mt-1 rounded">
                <div class="mt-1">
                  <h6 class="m-0">Total</h6>
                  <h6 class="m-1">₡ {{$item->total_mano_obra}}</h6>
                </div>
              </div>
            </div>
            <div class=" justify-content-centerborder m-0 mt-2 row d-flex align-items-center">

              <div class="col-sm-6">
                <a href="" class="text-dark btn btn-block">Actualizar informacion</a>
              </div>

              {{-- <div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                  <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                      <div class="">
                        <div class="">
                          <p class="h4 font-weight-bold mb-2" id="">
                            Ingreso de operario
                          </p>
                        </div>
                      </div>
                      <div class="">
                        <button class="modal__close shadow-sm" aria-label="Close modal"
                          data-micromodal-close></button>
                      </div>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                      <form class="form-group" method="POST"
                        action="{{route('eliminar_operario', $item->id_mano_de_obra)}}">
              @method('DELETE')
              @csrf

              <button type="submit" class="modal__btn modal__btn-primary col-12">Aceptar</button>
              <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                aria-label="Close this dialog window">Cerrar</button>

              </form>
  </main>
  </form>
  </div>
  </div>
  </div> --}}

  <div class="col-sm-6">
    <form action="{{route('eliminar_operario',$item->id_mano_de_obra)}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="Eliminar text-danger btn btn-block bg-white">
        Eliminar información
      </button>
    </form>

  </div>

  </div>

  </div>
  </div>
  @endforeach

  {{-- Horas extras --}}
  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex justify-content-center row align-items-center">
      <div class="col-sm-6">
        <h4 class="m-1 font-weight-bold">Horas extras</h4>
      </div>
      <div class="col-sm-6">
        <a href="" class="m-1 btn btn-block btn-dark">Ingresar operario</a>
      </div>
    </div>
  </div>

  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex justify-content-center row align-items-center">
      <h4 class="col-12 font-weight-bold">Configuración</h4>
      <h6 class="col-12">Costo por horas extras</h6>
      <div class="col-sm-6">
        <input class="form-control m-1" name="" id="" value="₡20.59">
      </div>
      <div class="col-sm-6">
        <a class="btn btn-block btn-outline-gray m-1 border-dark" href="">Cambiar el costo por horas extras</a>
      </div>
    </div>
  </div>

  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="">
      <div class="m-0 d-flex align-items-center row">
        <div class="col-sm-6">
          <h5 class="card-title m-0">Colaborador(a)</h5>
        </div>
        <div class="col-sm-6">
          <h6 class="mt-1">Graciela Ortega Vega</h6>
        </div>
      </div>

      <div class=" m-0 mt-2 row d-flex align-items-center">
        <div class="col-sm-6">
          <h6 class="card-title">Horas extras trabajadas</h6>
          <h6 class="">180 minutos</h6>
        </div>
        <div class="col-sm-6 card-footer border-0 rounded-pill">
          <div class="m-1">
            <h6 class="">Total</h6>
            <h6 class="">₡3706.70</h6>
          </div>
        </div>
      </div>
      <a href="" class="btn btn-block btn-outline-dark mt-1">Actualizar informacion</a>
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
        openTrigger: 'data-custom-open', // [3]
        closeTrigger: 'data-custom-close', // [4]
        openClass: 'is-open', // [5]
        disableScroll: true, // [6]
        disableFocus: false, // [7]
        awaitOpenAnimation: false, // [8]
        awaitCloseAnimation: false, // [9]
        debugMode: false // [10]
    });

    var button = document.querySelector('.Operario');
    button.addEventListener('click', function () {
        MicroModal.show('modal-1');
    });

    var button = document.querySelector('.Eliminar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-2');
    });

    
  </script>

  <script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $("#EnviarDatos").click(function(e){
      e.preventDefault(); //Evitar recargar la pagina
      // var nombre_trabajador = $("input[name=nombre_trabajador]").val();
      // var apellido_trabajador = $("input[name=apellido_trabajador]").val();
      // var minutos_trabajados = $("input[name=minutos_trabajados]").val();
      var dataString = $('#Crear').serialize();
      $.ajax({
        type:"POST",
        url:'{{url('/Total')}}',
        data: dataString,
        success:function(data){
          $('#Lista').fadeIn(); // mostrar historico
          $('#notificacion').fadeIn(); // mostrar notificacion
          setTimeout(function(){ $('#notificacion').fadeOut(); }, 1000); // ocultar mensaje 1s
          $('#formulario')[0].reset(); // limpiar form
          $(data).each(function(key,value) {
          $("ul").append("<li>  "+ value.nombre_trabajador + " fecha: "+ value.apellido_trabajador + " ID:" + value.minutos_trabajados + " </li>");
          });
        }
      });
    });
    // {nombre_trabajador:nombre_trabajador,
    //       apellido_trabajador:apellido_trabajador,
    //       minutos_trabajados:minutos_trabajados},
    // $(document).ready(function(){
    //   $.ajax({
    //     url: 'ManoObra/',
    //     method: 'POST',
    //     data:$("#eliminar").serialize()
    //   }).done(function(res){
    //     alert(res);
    //   });
    // });
  </script>
</body>

</html>