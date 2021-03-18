@extends('plantilla')

@section('titulo','Productos')

@section('contenido')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
          <h4 class="font-weight-bold m-0">Elaboracion de productos</h4>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
          <button class="Producto btn btn-dark btn-block">Ingresar nuevo producto</button>
        </div>
        <div class="modal micromodal-slide" id="modal-5" aria-hidden="true">
          <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
              <header class="modal__header">
                <div class="">
                  <div class="">
                    <p class="h4 font-weight-bold mb-2" id="">
                      Ingreso de producto
                    </p>
                  </div>
                </div>
                <div class="">
                  <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                </div>
              </header>
              <main class="modal__content" id="modal-1-content">
                <form class="form-group" method="POST" action="{{route('AgregarProducto')}}">
                  @csrf
                  <div class="m-1">
                    <label for="">1.Nombre del pruducto</label>
                    <input type="text" name="nombre_producto" class="form-control" value="">
                  </div>
                  {{-- <div class="m-1">
                                                        <label for="">2.Descripcion del producto</label>
                                                        <input type="text" name="nombre_trabajador" class="form-control"
                                                            id="nombre_trabajador" value="">
                                                    </div> --}}
                  <button type="submit" class="modal__btn modal__btn-primary col-12">Aceptar</button>
                  <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                    aria-label="Close this dialog window">Cerrar</button>
                </form>
              </main>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function () {$('.drawer').drawer();});
</script>
<script>
  MicroModal.init();
        var button = document.querySelector('.Producto');
        button.addEventListener('click', function () {
            MicroModal.show('modal-5');
        });
</script>
@stop

@section('contenido-2')
@parent
@foreach ($t_producto as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">

        <div class="col-sm-6 mt-1 mb-1">
          <h5 class="font-weight-bold m-0 ">Nombre del producto</h5>
          <h5 class="text-gray m-0 mt-1"></h5>
        </div>

        <form action="{{route('ActualizarProducto', $item->id_producto)}}" method="POST">
          @csrf
          @method('PUT')
          <div class="col-sm-12 mt-2 mb-1">
            <input class="form-control" type="text" name="nombre_producto" id="" value="{{$item->nombre_producto}}">
          </div>
          <div class="modal micromodal-slide disabled" id="modal-3{{$item->id_producto}}" aria-hidden="true">
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
        </form>

        <div class="col-sm-6 m-0 mt-2 mb-1 row d-flex align-items-center">
          <button type="button" class="Actualizar btn m-0 btn-block bg-white"
              data-micromodal-trigger="modal-3{{$item->id_producto}}">Actualizar información</button>
        </div>

        <div class="col-sm-6 m-0 mt-2 mb-1 row d-flex align-items-center">
          <form action="{{route('EliminarProducto',$item->id_producto)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="button" class="Eliminar text-danger btn m-0 btn-block bg-white"
              data-micromodal-trigger="modal-2{{$item->id_producto}}">Eliminar información</button>
            <!-- Modal -->
            <div class="modal micromodal-slide" id="modal-2{{$item->id_producto}}" aria-hidden="true">
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
                      <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
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
  </div>
</div>
@endforeach

<script>
  MicroModal.init();
  var button = document.querySelector('.Eliminar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-2');
    });
    var button = document.querySelector('.Actualizar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-3');
    });
</script>
@stop