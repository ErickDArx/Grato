@extends('plantilla')

@section('Vista','Materia Prima')

@section('Ruta','MateriaPrima')

@section('Icono','fa fa-clipboard mr-2')

@section('titulo', 'Materia Prima')

@section('contenido')
@parent
{{-- Agregar la materia prima --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="d-flex justify-content-center m-1 row align-items-center">
    {{-- Presentacion  --}}
    <div class="col-sm-6">
      <h4 class="font-weight-bold"><i class="fa fa-clipboard"></i> Materia Prima</h4>
      <h6 class="text-gray">Desglose de insumos necesarios para la elaboracion de un producto</h6>
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
              <form class="form-group" method="POST" action="{{route('AgregarMateriaPrima')}}">
                @csrf
                <div class="m-0 mb-2">
                  <label for="">1.Nombre de la materia prima</label>
                  <input type="text" placeholder="" name="producto" class="form-control" value="{{old('producto')}}">
                </div>
                @error('producto')
                <div class="fade show mb-2" role="alert">
                  <div class="text-danger">
                    <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('producto')}}</span>
                  </div>
                </div>
                @enderror
                <div class="m-0 mb-2">
                  <label for="">2.Unidad de medida (Seleccionar)</label>
                  {{-- <input type="text" name="unidad_medida" class="form-control" value=""> --}}
                  <select name="unidad_medida" id="" class="form-control">
                    <option value="Sin determinar">Sin determinar</option>
                    <option value="Tonelada">Tonelada</option>
                    <option value="Kilogramo">Kilogramo</option>
                    <option value="Mililitros">Mililitros</option>
                    <option value="Gramo">Gramo</option>
                    <option value="Unidad">Unidad</option>
                  </select>
                </div>
                @error('unidad_medida')
                <div class="fade show mb-2" role="alert">
                  <div class="text-danger">
                    <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('unidad_medida')}}</span>
                  </div>
                </div>
                @enderror
                <div class="m-0 mb-2">
                  <label for="">3.Costo de la materia prima (Colones)</label>
                  <input type="number" name="costo" class="form-control" value="{{old('costo')}}">
                </div>
                @error('costo')
                <div class="fade show mb-2" role="alert">
                  <div class="text-danger">
                    <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('costo')}}</span>
                  </div>
                </div>
                @enderror
                <div class="m-0 mb-2">
                  <label for="">4.Presentacion (Cantidad)</label>
                  <input type="number" placeholder="" name="presentacion" class="form-control" value="{{old('presentacion')}}">
                </div>
                @error('presentacion')
                <div class="fade show mb-2" role="alert">
                  <div class="text-danger">
                    <span><i class="fa fa-exclamation mr-1"></i> {{$errors->first('presentacion')}}</span>
                  </div>
                </div>
                @enderror
                <div class="m-0 mb-2">
                  <label for="">5.Producto (Seleccionar)</label>
                  <select name="id_producto" id="" class="form-control">
                    @foreach ($t_producto as $item)
                    <option value="{{$item->id_producto}}"> {{$item->nombre_producto}} </option>
                    @endforeach

                  </select>
                </div>

                <button type="submit" class="modal__btn modal__btn-primary col-12">Aceptar</button>
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

  </div>
</div>

{{-- Buscador --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('materia')}}" method="GET" class="row m-2 d-flex align-items-center">
    @csrf

    <div class="col-sm-6 p-0">
      <h6 class="m-0 font-weight-bold">Listado de materia prima</h6>
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
{{-- Listado de materia prima --}}
@foreach ($t_materia_prima as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('ActualizarMateriaPrima',$item->id_materia_prima)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="m-1 d-flex align-items-center row border-bottom">

      <div class="col-sm-6 mb-2">
        <h5 class="m-0 card-title font-weight-bold"><i class="fa fa-clipboard-check mr-1"></i> Nombre del insumo</h5>
      </div>

      <div class="col-sm-6 mb-2" id="nombre">
        <input class="form-control" type="text" name="producto" value="{{$item->producto}}">

      </div>

      <div class="col-sm-6 mb-2">
        <h5 class="m-0 card-title font-weight-bold"><i class="fa fa-arrow-right"></i> Para el producto</h5>
      </div>

      <div class="col-sm-6 mb-2" id="nombre">
        @foreach ($t_producto as $producto)
        @if ($item->id_producto == $producto->id_producto)
        <input readonly class="form-control" type="text" name="" value="{{$producto->nombre_producto}}">
        @endif

        @endforeach

      </div>
    </div>
    <div class="row m-3">
      
      <button class="col-sm-12 btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
        data-target="#collapseExample{{$item->id_materia_prima}}" aria-expanded="false" aria-controls="collapseExample">
        Ver mas informacion
      </button>
    </div>
      <!-- Modal -->
      <div class="modal micromodal-slide" id="modal-3{{$item->id_materia_prima}}" aria-hidden="true">
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

    <div class="collapse" id="collapseExample{{$item->id_materia_prima}}">

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
        <div class="col-sm-6 mb-2">
          <h6 class="card-title font-weight-bold mt-1">Presentacion</h6>
          <input name="presentacion" class="form-control" type="number" value="{{$item->presentacion}}">
        </div>
        

        <div class="col-sm-6 mb-2">
          <h6 class="card-title font-weight-bold mt-1">Costo de materia prima</h6>
          <input name="costo" class="form-control" type="number" value="{{$item->costo}}">
        </div>

      </div>

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">

        <div class="col-sm-6 mb-2">
          <h6 class="card-title font-weight-bold mt-1">Unidad de medida</h6>
          <input readonly name="unidad_medida" class="form-control" type="text" value="{{$item->unidad_medida}}">
        </div>

        <div class="col-sm-6 mb-2">
          <h6 class="font-weight-bold">Precio por unidad de medida</h6>
          <input readonly name="precio_um" class="form-control" type="text" value="{{$item->precio_um}}">
        </div>

      </div>

  </form>
</div>

<div class="row d-flex align-items-center">

  <div class="col-sm-6">
    <a  data-micromodal-trigger="modal-3{{$item->id_materia_prima}}"
      class="Actualizar bg-white btn btn-block text-primary"><i class="fa fa-edit mr-1"></i> Actualizar
      informacion</a>
  </div>

  <div class="col-sm-6">
    <form action="{{route('EliminarMateriaPrima', $item->id_materia_prima)}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="button" class="Eliminar text-danger btn btn-block bg-white"
        data-micromodal-trigger="modal-2{{$item->id_materia_prima}}"><i class="fa fa-trash mr-1"></i> Eliminar
        información</button>
      <!-- Modal -->
      <div class="modal micromodal-slide" id="modal-2{{$item->id_materia_prima}}" aria-hidden="true">
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

<div class="d-flex align-items-center justify-content-center">
  <div class="mt-3">
    {{ $t_materia_prima->render() }}
  </div>
</div>

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