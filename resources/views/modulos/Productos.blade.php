@extends('plantilla')

@section('Vista','Productos')

@section('Ruta','Productos')

@section('Icono','fa fa-check-square mr-2')

@section('titulo','Productos')

@section('contenido')
@parent

{{-- Titulo / Boton / Formulario --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
          <h4 class="font-weight-bold m-0"><i class="fa fa-check-square mr-1"></i>Elaboraci&oacute;n de productos</h4>
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
                  <div class="m-0">
                    <label for="">1.Nombre del producto a fabricar</label>
                    <input type="text" name="nombre_producto" class="form-control mb-2 mt-2" value="">
                  </div>
                  @error('nombre_producto')
                  <div class=" fade show m-2" role="alert">
                    <div class="text-danger">
                      <span><i class="fa fa-exclamation mr-1"></i> {{  $errors->first('nombre_producto')}}</span>
                    </div>
                  </div>
                  @enderror
                  <button type="submit" class="col-3 modal__btn modal__btn-primary col-12">Aceptar</button>
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
  MicroModal.init();
        var button = document.querySelector('.Producto');
        button.addEventListener('click', function () {
            MicroModal.show('modal-5');
        });
</script>

{{-- Detectar errores y avisar al usuario --}}
@if ($errors->any())
<div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="col-sm-12">
    <div class=" fade show" role="alert">
      <div class="text-danger">
        <span><i class="fa fa-exclamation mr-1"></i>Verifiqu&eacute; bien los datos en el formulario</span>
      </div>
    </div>
  </div>
</div>
@endif

{{-- Buscador / Titulo --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('Productos')}}" method="GET" class="row m-2 d-flex align-items-center">
    @csrf

    <div class="col-sm-6 p-0">
      <h6 class="m-0 font-weight-bold">Listado de productos</h6>
    </div>

    <div class="input-group col-sm-6">
      <input placeholder="" name="busqueda" type="text" value="" class="rounded form-control">
      <div class="input-group-append">
        <button type="submit" class="btn btn-dark"><span class="fa fa-search icon"></span></button>
      </div>
    </div>

  </form>
</div>


@stop

@section('contenido-2')
@parent
@foreach ($t_producto as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('ActualizarProducto', $item->id_producto)}}" method="POST" class="">
    @csrf
    @method('PUT')
    <div class="m-1 d-flex align-items-center row ">
      <div class="col-sm-6">
        <h5 class="font-weight-bold mt-2 mb-2"><i class="fa fa-clipboard-check mr-1"></i> Producto a fabricar
          <h6 class="mt-2">
            <i class="text-primary fa fa-clock mr-1"></i> Creado {{ \Carbon\Carbon::parse($item->fecha)->diffForHumans() }} 
          </h6>
        </h5>
      </div>
      <div class="col-sm-6 mt-1 mb-1">
        <input class="form-control" type="text" name="nombre" id="" value="{{$item->nombre_producto}}">

      </div>
    </div>

    <!-- Modal -->
    <div class="modal micromodal-slide" id="modal-3{{$item->id_producto}}" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
          <header class="modal__header">
            <div class="">
              <div class="">
                <p class="h4 font-weight-bold mb-2 text-primary" id="">
                  <i class="fa fa-edit mr-2 "></i>Actualizar
                </p>
              </div>
            </div>
            <div class="">
              <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
            </div>
          </header>
          <main class="modal__content" id="modal-1-content">
            <h6 class="col-12 mt-3">Si usted da aceptar, los cambios se van a aplicar</h6>
          </main>
          <footer class="modal__footer">
            <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
              Aceptar
            </button>
            <button class="modal__btn col-3" data-micromodal-close
              aria-label="Close this dialog window ">Cerrar</button>
          </footer>

        </div>
      </div>
    </div>

  </form>

  <div class="d-flex align-items-center justify-content-center row m-2 rounded">
    <div class="col-sm-6 mt-2">
      <button type="button" class="Actualizar text-primary btn m-0 btn-block bg-white"
        data-micromodal-trigger="modal-3{{$item->id_producto}}"><i class="fa fa-edit mr-2 "></i>Actualizar
        Informaci&oacute;n</button>
    </div>
    <div class="col-sm-6 mt-2">
      <form action="{{route('EliminarProducto',$item->id_producto)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="Eliminar text-danger btn m-0 btn-block bg-white"
          data-micromodal-trigger="modal-2{{$item->id_producto}}"><i class="fa fa-trash mr-2 "></i>Eliminar
          Informaci&oacute;n</button>
        <!-- Modal -->
        <div class="modal micromodal-slide" id="modal-2{{$item->id_producto}}" aria-hidden="true">
          <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
              <header class="modal__header">
                <div class="">
                  <div class="">
                    <p class="h4 font-weight-bold mb-2 text-danger" id="">
                      <i class="fa fa-trash mr-2 "></i>Eliminar
                    </p>
                  </div>
                </div>
                <div class="">
                  <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                </div>
              </header>
              <main class="modal__content" id="modal-1-content">
                <h6 class="col-12 mt-3">Si usted da aceptar, los cambios se van a aplicar</h6>
              </main>
              <footer class="modal__footer">
                <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
                  Aceptar
                </button>
                <button class="modal__btn col-3" data-micromodal-close
                  aria-label="Close this dialog window ">Cerrar</button>
              </footer>

            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<div class="d-flex justify-content-center">
  {{$t_producto->render()}}
</div>

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

<script>
  window.onload=function(){
  var pos=window.name || 0;
  window.scrollTo(0,pos);
  }
  window.onunload=function(){
  window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
  }
</script>
@stop