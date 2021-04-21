@extends('plantilla')

@section('titulo','Costos Indirectos de Fabricación')

@section('contenido')
@parent

{{-- Tarjeta de presentacion / Modal / Boton --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="d-flex justify-content-center row align-items-center">

    {{-- Titulo del CIF --}}
    <div class="col-sm-8 mt-1 mb-1">
      <h4 class="font-weight-bold m-0"><i class="fa fa-coins mr-2 "></i>CIF : {{$cif->nombre_cif}}</h4>
    </div>

    {{-- Modal para ingresar y actualizar los valores porcentuales --}}
    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
          <header class="modal__header">
            <div class="">
              <div class="">
                <p class="h4 font-weight-bold mb-2" id="">
                  Valores porcentuales
                </p>
              </div>
            </div>
            <div class="">
              <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
            </div>
          </header>
          <main class="modal__content" id="modal-1-content">
            <form class="form-group" method="POST" action="{{route('AgregarValores',$cif->id_cif)}}">
              @csrf

              <div class="m-0 mb-2">
                <label for="">1. Porcentaje de utilizacion en la empresa</label>
                <input type="text" name="porcentaje_utilizacion" class="form-control" value="">
              </div>
              <div class="m-0 mb-2">
                <label for="">2.Porcentaje de produccion del producto</label>
                <input type="text" name="porcentaje_produccion" class="form-control" value="">
              </div>
              <div class="m-0 mb-2">
                <label for="">3.Produccion promedio mensual</label>
                <input type="text" name="produccion_mensual" class="form-control" value="">
              </div>
              <button type="submit" class="modal__btn modal__btn-primary col-12">Aceptar</button>
              <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                aria-label="Close this dialog window">Cerrar</button>
            </form>
          </main>
        </div>
      </div>
    </div>

    {{-- Boton para abrir el modal --}}
    <div class="col-sm-4">
      <a href="#" class="Operario btn btn-block btn-dark">valores porcentuales</a>
    </div>

  </div>
</div>

{{-- Formulario para ingresar los recibos --}}
<form class="form-group mt-0 mb-0" action="{{route('AgregarMes',$cif->id_cif)}}" method="POST">
  @csrf
  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex justify-content-center row align-items-center">

      <div class="col-sm-4">
        <div class="m-0 mb-2">
          <label for=""><i class="fa fa-calendar-week mr-2 "></i>1.Fecha</label>
          <input type="date" class="form-control" name="fecha">
        </div>
        @error('fecha')
        <div class="fade show" role="alert">
          <div class="text-danger">
            <span>{{  $errors->first('fecha')}}</span>
          </div>
        </div>
        @enderror
      </div>

      <div class="col-sm-4">
        <div class="m-0 mb-2">
          <label for=""><i class="fa fa-money-bill-wave mr-2 "></i>2. Recibo de pago</label>
          <input type="number" name="recibo_pagar" class="form-control" value="">
        </div>
        @error('recibo_pagar')
        <div class="fade show" role="alert">
          <div class="text-danger">
            <span>{{  $errors->first('recibo_pagar')}}</span>
          </div>
        </div>
        @enderror
      </div>
      @php
      $campo = App\t_valores::where('id_cif', $cif->id_cif)->first();
      @endphp

      @if (!$campo)
      <div class="col-sm-4 d-flex mt-4">
        <button disabled class="disabled btn btn-block btn-outline-dark">Ingresar</button>
      </div>
      <div class="col-sm-12 m-1 text-primary">
        <h6><i class="fa fa-clock mr-2 "></i>Recordatorio</h6>
        <h6 class="text-dark">Primero debes ingresar los valores porcentuales para continuar</h6>
      </div>
      @endif

      @if ($campo)
      <div class="col-sm-4 d-flex mt-4">
        <button class="btn btn-block btn-outline-dark" type="submit">Ingresar</button>
      </div>
      @endif

    </div>
  </div>
</form>

{{-- Titulo para el listado de recibos / Boton volver atras --}}
<div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="col-sm-8 d-flex align-items-center justify-content-center m-0 p-2 border rounded">
    <h6 class="m-0 font-weight-bolder"><i class="fa fa-calendar mr-2 "></i>Listado de recibos del {{ date('Y')}}</h6>
  </div>
  <div class="col-sm-4 d-flex mt-1 justify-content-center align-items-center m-0">
    <a href="{{route('CIF')}}" class="p-2 btn btn-link text-dark"><i class="fa fa-arrow-left mr-2 "></i>Volver
      atras</a>
  </div>
</div>

{{-- LLamada de los modales a utilizar dentro de la vista --}}
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

@section('contenido-2')
@parent

{{-- Lista de recibos --}}
{{-- Buscamos los recibos que pertenezcan al mismo CIF y año --}}
@foreach ($t_mes as $item)
@if ($cif->id_cif == $item->id_cif && $item->fecha > date('Y') )
{{-- Listar los recibos / Botones  --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">

  <form class="row " action="{{route('ActualizarMes', array($cif->id_cif ,$item->id_mes))}}" method="POST">
    @csrf
    @method('PUT')
    <div class="m-2 d-flex row align-items-center">
      <div class="col-sm-6">
        <h6 class="m-0 mt-1 mb-1"><i class="fa fa-calendar-times mr-2 "></i>Fecha</h6>
        <input type="" readonly class="form-control"
          value="{{ \Carbon\Carbon::parse(strtotime($item->fecha))->formatLocalized('%B %Y') }}">
      </div>
      <div class="col-sm-6 mt-1 mb-1">

        <h6 class="m-0 mt-1 mb-1"><i class="fa fa-money-bill mr-2 "></i>Total a pagar (Colones)</h6>
        <input class="form-control" type="number" name="recibo_pagar" value="{{$item->recibo_pagar}}">
        <!-- Modal -->
        <div class="modal micromodal-slide" id="modal-3{{$item->id_mes}}" aria-hidden="true">
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
      </div>

  </form>
  <div class="col-sm-6 d-flex justify-content-center mt-2">
    <a href="#" data-micromodal-trigger="modal-3{{$item->id_mes}}"
      class="Actualizar text-primary bg-white btn btn-block"><i class="fa fa-edit"></i> Editar
      informacion</a>
  </div>
  <div class="col-sm-6 d-flex justify-content-center mt-2">
    <a data-micromodal-trigger="modal-2{{$item->id_mes}}" class="bg-white text-danger btn btn-block border-0 ">
      <i class="fa fa-trash mr-2 "></i>Eliminar informacion
    </a>
  </div>
</div>

<form action="{{route('EliminarMes', array($cif->id_cif ,$item->id_mes))}}" method="POST">
  @csrf
  @method('DELETE')
  <!-- Modal -->
  <div class="modal micromodal-slide" id="modal-2{{$item->id_mes}}" aria-hidden="true">
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
          <button class="modal__btn col-3" data-micromodal-close aria-label="Close this dialog window ">Cerrar</button>
        </footer>

      </div>
    </div>
  </div>
</form>
</div>
@endif

@endforeach

<div class="d-flex justify-content-center align-items-center">

</div>


{{-- Vista del promedio sujeto a los meses del cif seleccionado --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #132c33">
  <div class="m-2 d-flex row align-items-center">
    <div class="col-6">
      <p class="m-0 font-weight-bold">Promedio</p>
    </div>
    <div class="col-6 text-center">
      @foreach ($t_valores as $item)
      @if ($item->id_cif == $cif->id_cif)
      <input class="form-control" readonly type="text" value="₡{{$item->promedio}}">
      @endif
      @endforeach
    </div>
  </div>
</div>

{{-- Titulo y boton tipo acordeon para abrir el formulario
  de calculos --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="d-flex row align-items-center m-0">
    <div class="col-sm-6">
      <h6 class=" font-weight-bolder"><i class="fa fa-calculator mr-2 "></i>Calculos respectivos</h6>
    </div>
    <div class="col-sm-6">
      <a class="btn btn-outline-dark btn-block" data-toggle="collapse" href="#calculos" role="button"
        aria-expanded="false" aria-controls="collapseExample">
        Ver mas informacion
      </a>
    </div>
  </div>
</div>

{{-- Aqui se hace el muestreo de los calculos a partir de las
  formulas que nos respaldo la dueña de la pyme --}}
<div class="collapse" id="calculos">

  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #126e82">
    <div class="m-2 d-flex row align-items-center">
      <div class="col-6">
        <h6 class="m-0">Porcentaje de utilizacion en la empresa</h6>
      </div>
      <div class="col-6 text-center">
        @foreach ($t_valores as $item)
        @if ($item->id_cif == $cif->id_cif)
        <input class="form-control" readonly type="text" value="₡{{$item->porcentaje_utilizacion}}">
        @endif
        @endforeach


      </div>
    </div>
  </div>

  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #28b5b5">
    <div class="m-2 d-flex row align-items-center">
      <div class="col-6">
        <p class="m-0">Consumo de la empresa</p>
      </div>
      <div class="col-6 text-center">
        @foreach ($t_valores as $item)
        @if ($item->id_cif == $cif->id_cif)
        
        <input class="form-control" readonly type="text" value="₡{{$item->consumo_empresa}}">
        @endif
        @endforeach
      </div>
    </div>
  </div>

  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #29bb89">
    <div class="m-2 d-flex row align-items-center">
      <div class="col-6">
        <p class="m-0">Porcentaje de produccion del producto por mes</p>
      </div>
      <div class="col-6 text-center">
        @foreach ($t_valores as $item)
        @if ($item->id_cif == $cif->id_cif)
        
        <input class="form-control" readonly type="text" value="₡{{$item->porcentaje_produccion}}">

        @endif
        @endforeach
      </div>
    </div>
  </div>

  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c">
    <div class="m-2 d-flex row align-items-center">
      <div class="col-6">
        <p class="m-0">Consumo de la produccion</p>
      </div>
      <div class="col-6 text-center">
        @foreach ($t_valores as $item)
        @if ($item->id_cif == $cif->id_cif)
        
        <input class="form-control" readonly type="text" value="₡{{$item->consumo_produccion}}">

        @endif
        @endforeach
      </div>
    </div>
  </div>

  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #387c6d">
    <div class="m-2 d-flex row align-items-center">
      <div class="col-6">
        <p class="m-0">Produccion promedio mensual</p>
      </div>
      <div class="col-6 text-center">
        @foreach ($t_valores as $item)
        @if ($item->id_cif == $cif->id_cif)
        
        <input class="form-control" readonly type="text" value="₡{{$item->produccion_mensual}}">

        @endif
        @endforeach
      </div>
    </div>
  </div>

  <div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #007580">
    <div class="m-2 d-flex row align-items-center">
      <div class="col-6">
        <p class="m-0 font-weight-bold">Total</p>
      </div>
      <div class="col-6 text-center">
        @foreach ($t_valores as $item)
        @if ($item->id_cif == $cif->id_cif)
        
        <input class="form-control" readonly type="text" value="₡{{$item->total}}">

        @endif
        @endforeach
      </div>
    </div>
  </div>

</div>

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