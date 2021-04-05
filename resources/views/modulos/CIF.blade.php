@extends('plantilla')

@section('titulo','Costos Indirectos de Fabricación')

@section('contenido')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="d-flex justify-content-center row align-items-center">
    <div class="col-sm-6">
      <h4 class="font-weight-bold">Costos Indirectos de Fabricación</h4>
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
              <form class="form-group" method="POST" action="{{route('AgregarCIF')}}">
                @csrf
                <div class="m-0 mb-2">
                  <label for="">1.Titulo del CIF</label>
                  <input type="text" name="nombre_cif" class="form-control" value="">
                </div>
                <button type="submit" class="modal__btn modal__btn-primary col-12">Aceptar</button>
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
@stop

@section('contenido-2')
@parent

@stop

@section('contenido-3')
@parent
@foreach ($t_cif as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('ActualizarNombre', $item->id_cif)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="m0 d-flex align-items-center row">
      <div class="col-sm-6 mb-2">
        <h5 class="m-0 card-title font-weight-bold">Titulo del CIF</h5>
      </div>
      <div class="col-sm-6 mb-2" id="nombre">
        <input class="form-control" type="text" name="nombre_cif" value="{{$item->nombre_cif}}">
      </div>
    </div>
  </form>
  <div class="justify-content-center m-0 mt-2 row d-flex align-items-center">
    <div class="col-sm-6 mb-1">
        <a type="submit" href="{{route('ActualizarCIF',Crypt::encrypt($item->id_cif))}}" class="text-dark bg-white btn btn-block">Agregar informacion</a>
    </div>
  </div>
</div>
@endforeach
<script>
  MicroModal.init({
        onShow: modal => console.info(`${modal.id} is shown`), // [1]
        onClose: modal => console.info(`${modal.id} is hidden`), // [2]
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
@stop