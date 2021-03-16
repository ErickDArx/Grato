<!DOCTYPE html>
{{-- Idioma --}}
<html lang="es">

{{-- Cabecera --}}

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mano de Obra</title>
  {{-- Micromodal / Jquery / Bootstrap.JS / iScroll / drawer--}}
  <script src="/Grato/resources/js/jquery.js"></script>
  <script src="/Grato/resources/js/micromodal.js"></script>
  <script src="/Grato/resources/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
  {{-- Fuente de iconos --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
    crossorigin="anonymous" />
  <!-- Libreria Menú -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/modal.css') }}" rel="stylesheet">

</head>
{{-- Cuerpo del HTML --}}

<body class="drawer drawer--left drawer--sidebar" style="background-color:#E6E6E6 ;">
  {{-- Llamamos al menu hamburguesa --}}
  @extends('menu')

  <main role="main" class="drawer-contents" style="background-color:#E6E6E6 ;">
    {{-- Llamar al nav con la imagen --}}
    <nav class="navbar navbar-dark bg-white nav">
      <div class="col-12 text-center">
        <img src="/Grato/resources/media/Logo.png" alt="" class="img-fluid" style="width: 6rem;">
      </div>
    </nav>

    <div class="row mr-2 ml-2 mt-3">

      <div class="col-md-8 mb-2">

        {{-- Agregar la materia prima --}}
        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="d-flex justify-content-center m-1 row align-items-center">
            {{-- Presentacion  --}}
            <div class="col-sm-6">
              <h4 class="font-weight-bold">Materia Prima</h4>
              <h6 class="text-gray">Desglose de insumos necesarios para la elaboracion de una receta</h6>
            </div>

            <div class="col-sm-6">

              {{-- Modal MateriaPrima--}}
              <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                  <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                      <div class="">
                        <div class="">
                          <p class="h4 font-weight-bold mb-2" id="">
                            Ingreso de materia prima
                          </p>
                        </div>
                      </div>
                      <div class="">
                        <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                      </div>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                      <form id="Crear" class="form-group" method="POST" action="{{route('AgregarMateriaPrima')}}">
                        @csrf
                        <div class="m-0 mb-2">
                          <label for="">1.Nombre de la materia prima</label>
                          <input type="text" placeholder="Ejemplo: Harina" name="producto" class="form-control"
                            value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">2.Unidad de medida</label>
                          {{-- <input type="text" name="unidad_medida" class="form-control" value=""> --}}
                          <select name="unidad_medida" id="" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="Tonelada">Tonelada</option>
                            <option value="Kilogramo">Kilogramo</option>
                            <option value="Kilo">Kilo</option>
                            <option value="Gramo">Gramo</option>
                            <option value="Unidad">Unidad</option>
                          </select>
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">3.Costo de la materia prima (Colones)</label>
                          <input type="text" name="costo" class="form-control" value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">4.Presentacion</label>
                          <input type="text" placeholder="Ejemplo: 12 unidades" name="presentacion" class="form-control"
                            value="">
                        </div>
                        <div class="m-0 mb-2">
                          <label for="">5.Producto</label>
                          <select name="id_producto" id="" class="form-control">

                            @foreach ($t_producto as $item)
                            <option value="{{$item->id_producto}}"> {{$item->nombre_producto}} </option>
                            @endforeach
                          </select>
                        </div>
                        {{-- <div class="m-0 mb-2">
                          <label for="">5.Cantidad</label>
                          <input type="text" name="cantidad" class="form-control" value="">
                        </div> --}}


                        <button type="submit" class="modal__btn modal__btn-primary col-12"
                          id="EnviarDatos">Aceptar</button>
                        <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                          aria-label="Close this dialog window">Cerrar</button>

                      </form>
                    </main>
                  </div>
                </div>
              </div>
              {{-- Boton que abre el modal --}}
              <a href="#" class="MateriaPrima btn btn-block btn-dark">Ingresar materia prima</a>

            </div>

            <div class="col-sm-6 mt-2">
              <h6 class="m-0 font-weight-bold">Total en colones</h6>
            </div>
            <div class="col-sm-6">
              @php
              $total=0;
              @endphp

              @foreach ($t_materia_prima as $item)
              @php
              $total=$item->precio_um + $total
              @endphp

              @endforeach
              <input name type="text" value="{{$total}}" class="form-control" readonly>
            </div>
          </div>
        </div>

        {{-- Listado de materia prima --}}
        @foreach ($t_materia_prima as $item)
        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <form action="{{route('ActualizarMateriaPrima',$item->id_materia_prima)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="m-1 d-flex align-items-center row border-bottom">

              <div class="col-sm-6 mb-2">
                <h5 class="m-0 card-title font-weight-bold">Nombre del insumo</h5>
              </div>

              <div class="col-sm-6 mb-2" id="nombre">
                <input class="form-control" type="text" name="producto" value="{{$item->producto}}">
              </div>
            </div>

            <button class="mt-4 mb-4 btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
              data-target="#collapseExample{{$item->id_materia_prima}}" aria-expanded="false"
              aria-controls="collapseExample">
              Ver mas informacion
            </button>

            <div class="collapse" id="collapseExample{{$item->id_materia_prima}}">

              <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
                <div class="col-sm-6 mb-2">
                  <h6 class="card-title font-weight-bold mt-1">Unidad de medida</h6>
                  <input name="unidad_medida" class="form-control" type="text" value="{{$item->unidad_medida}}">
                </div>
                <div class="col-sm-6 mb-2">
                  <div class="">
                    <h6 class="card-title font-weight-bold mt-1">Cantidad</h6>
                    <input name="cantidad" class="form-control" type="number" value="{{$item->cantidad}}">
                  </div>
                </div>
              </div>

              <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
                <div class="col-sm-6 mb-2">
                  <h6 class="card-title font-weight-bold mt-1">Costo de materia prima</h6>
                  <input name="costo" class="form-control" type="text" value="{{$item->costo}}">
                </div>
                <div class="col-sm-6 mb-2">
                  <h6 class="card-title font-weight-bold mt-1">Presentacion</h6>
                  <input name="presentacion" class="form-control" type="number" value="{{$item->presentacion}}">
                </div>
              </div>

              <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
                <div class="col-sm-6 mb-2">
                  <h6 class="font-weight-bold">Precio por unidad de medida</h6>
                  <input name="precio_um" class="form-control" type="text" value="{{$item->precio_um}}">
                </div>
              </div>

              <div class="modal micromodal-slide disabled" id="modal-3{{$item->id_materia_prima}}" aria-hidden="true">
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
                      <h6 class="mt-2 mb-2">Si usted da aceptar, el recurso se actualizara y no se podran regresar los
                        datos anteriores</h6>
                      <button type="submit" class="btn btn-block">
                        Aceptar
                      </button>
                    </main>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <div class="row d-flex align-items-center">
            <div class="col-sm-6">
              <button type="button" data-micromodal-trigger="modal-3{{$item->id_materia_prima}}"
                class="Actualizar text-dark bg-white btn btn-block">Actualizar informacion</button>
            </div>

            <div class="col-sm-6">
              <form action="{{route('EliminarMateriaPrima', $item->id_materia_prima)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="button" class="Eliminar text-danger btn btn-block bg-white"
                  data-micromodal-trigger="modal-2{{$item->id_materia_prima}}">Eliminar información</button>
                <!-- Modal -->
                <div class="modal micromodal-slide" id="modal-2{{$item->id_materia_prima}}" aria-hidden="true">
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
    $(document).ready(function () {$('.drawer').drawer();});
    MicroModal.init({
        onShow: modal => console.info(`${modal.id} is shown`), // [1]
        onClose: modal => console.info(`${modal.id} is hidden`), // [2]
    });

    var button = document.querySelector('.MateriaPrima');
    button.addEventListener('click', function () {
        MicroModal.show('modal-1');
    });

    var button = document.querySelector('.Eliminar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-2');
    });

    var button = document.querySelector('.Actualizar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-3');
    });
  </script>
</body>

</html>