@extends('plantilla')

@section('titulo','Costos Indirectos de Fabricación')
@section('Ruta','CIF')
@section('Vista','Costos Indirectos de Fabricación')
@section('Icono','fa fa-coins mr-2')

@section('contenido')
@parent

{{-- Boton / Modal / Titulo --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="m-2 d-flex justify-content-center row align-items-center">
    <div class="col-sm-6">
      <h4 class="font-weight-bold mb-2"><i class="fa fa-coins"></i> Costos Indirectos de Fabricación</h4>
    </div>
    <div class="col-sm-6">
      <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
              <div class="">
                <div class="">
                  <p class="h4 font-weight-bold mb-2" id="">
                    Ingreso de CIF
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
                  @error('nombre_cif')
                  <div class="fade show mb-2" role="alert">
                    <div class="text-danger">
                      <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('nombre_cif')}}</span>
                    </div>
                  </div>
                  @enderror
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

{{-- Detectar errores y avisar al usuario --}}
@if ($errors->any())
<div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="col-sm-12">
    <div class=" fade show" role="alert">
      <div class="text-danger">
        <span><i class="fa fa-exclamation mr-1"></i>Verifique bien los datos en el formulario</span>
      </div>
    </div>
  </div>
</div>
@endif

@stop

@section('contenido-2')
@parent
 {{-- Buscador --}}
 <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('ManoObra')}}" method="GET" class="row m-2 d-flex align-items-center">
    @csrf

    <div class="col-sm-6 p-0">
      <h6 class="m-0 font-weight-bold text-center"><i class="fa fa-list-ul"></i> Listado de CIF</h6>
    </div>

    <div class="input-group col-sm-6 mt-2">
      <input placeholder="" name="busqueda" type="text" value="" class="rounded form-control">
      <div class="input-group-append">
        <button type="submit" class="btn btn-dark"><span class="fa fa-search icon"></span></button>
      </div>
    </div>

  </form>
</div>
@stop

@section('contenido-3')
@parent

{{-- Listado de CIF / Ver detalle / Eliminar / Actualizar / Titulo --}}
@foreach ($t_cif as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('ActualizarNombre', $item->id_cif)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="border-bottom m-2 d-flex align-items-center row">
      <div class="col-sm-6 mb-2 d-flex align-items-center">
        <h5 class="m-0 card-title font-weight-bold mt-2"><i class="fa fa-quote-left"></i> Titulo del CIF</h5>
      </div>
      <div class="col-sm-6 mt-2" id="nombre">
        <div class="input-group mb-3">
          <input class="form-control" type="text" name="nombre_cif" value="{{$item->nombre_cif}}">
          <div class="input-group-append">
            <a type="submit" href="{{route('IndexCIF' ,  encrypt($item->id_cif))}}"
              class="btn-dark btn border btn-block">Ver
              detalle</a>
          </div>
        </div>
      </div>
      @error('nombre_cif')
      <div class="fade show mb-2" role="alert">
        <div class="text-danger">
          <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('nombre_cif')}}</span>
        </div>
      </div>
      @enderror
    </div>


    <div class="m-2 justify-content-center row d-flex align-items-center">

      <div class="col-sm-6 mb-1">
        <div class="modal micromodal-slide" id="modal-4{{$item->id_cif}}" aria-hidden="true">
          <div class="modal__overlay" tabindex="-1" data-micromodal-close>
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
              <header class="modal__header">
                <div class="">
                  <div class="">
                    <p class="h4 font-weight-bold mb-2" id="">
                      Actualizacion de datos
                    </p>
                  </div>
                </div>
                <div class="">
                  <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
                </div>
              </header>
              <main class="modal__content m-0" id="modal-1-content">
                <h6 class="mt-3 mb-3">¿Esta seguro de actualizar los datos?</h6>
                <button type="submit" class="btn btn-block btn-dark">
                  Aceptar
                </button>
              </main>
            </div>
          </div>
        </div>

        <a href="#ID{{$item->id_cif}}" data-micromodal-trigger="modal-4{{$item->id_cif}}" class="Actualizar text-primary bg-white btn btn-block"><i class="fa fa-edit"></i> Editar
          informacion</a>
  </form>

</div>

{{-- Eliminar --}}
<div class="col-sm-6 mb-1 ">
  <form action="{{route('EliminarCIF',$item->id_cif)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-danger bg-white btn btn-block"><i class="fa fa-trash"></i> Eliminar
      informacion</button>
  </form>

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

    var button = document.querySelector('.Actualizar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-4');
    });
</script>
@stop