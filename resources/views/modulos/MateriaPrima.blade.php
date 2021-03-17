@extends('plantilla')

@section('titulo', 'Materia Prima')


@section('contenido')
@parent
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
              <form class="form-group" method="POST" action="{{route('AgregarMateriaPrima')}}">
                @csrf
                <div class="m-0 mb-2">
                  <label for="">1.Nombre de la materia prima</label>
                  <input type="text" placeholder="Ejemplo: Harina" name="producto" class="form-control" value="">
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
        <h5 class="m-0 card-title font-weight-bold">Nombre del insumo</h5>
      </div>

      <div class="col-sm-6 mb-2" id="nombre">
        <input class="form-control" type="text" name="producto" value="{{$item->producto}}">
      </div>
    </div>

    <button class="mt-4 mb-4 btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
      data-target="#collapseExample{{$item->id_materia_prima}}" aria-expanded="false" aria-controls="collapseExample">
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
@endforeach

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
@stop


