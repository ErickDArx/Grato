@extends('plantilla')

@section('titulo','Viaticos')
@section('Ruta','Viaticos')
@section('Vista','Viaticos')
@section('Icono','fa fa-car mr-2')
@section('contenido')
@parent
{{-- Presentacion / Boton / Modal --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="m-2 d-flex justify-content-center row align-items-center">
    <div class="col-sm-6">
      <h4 class="font-weight-bold"><i class="fa fa-car mr-1"></i> Viaticos</h4>
      <h6></h6>
    </div>
    <div class="col-sm-6">
      <div class="modal micromodal-slide" id="modal-4" aria-hidden="true">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
          <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
            <header class="modal__header">
              <div class="">
                <div class="">
                  <p class="h4 font-weight-bold mb-2" id="">
                    Ingreso de Viaticos
                  </p>
                </div>
              </div>
              <div class="">
                <button class="modal__close shadow-sm" aria-label="Close modal" data-micromodal-close></button>
              </div>
            </header>
            <main class="modal__content" id="modal-1-content">
              <form class="form-group" method="POST" action="{{route('AgregarViaticos')}}">
                @csrf

                <div class="m-0 mb-2">
                  <label for="">1.Tipo de Vehículo</label>
                  <select type="text" name="tipo_de_vehiculo" class="form-control" value="">
                    @php
                    $viaticos = array('tipo'=>'Vehículo rural: Gasolina',
                    'Vehículo rural: Diesel','Vehículo liviano: Gasolina',
                    'Vehículo liviano: Gasolina (más de 1600 cc)',
                    'Vehiulo liviano diesel','motocicletas');
                    @endphp
                    @foreach ($viaticos as $item)
                    <option value="{{$array[] = $item}}">{{$array[] = $item}}</option>
                    @endforeach

                  </select>
                </div>

                <div class="m-0 mb-2">
                  <label for="">2.Antiguedad Vehículo (años)</label>
                  <select type="text" name="antiguedad_vehiculo_años" class="form-control" value="">
                    @php
                    $años = array('tipo'=>'0','1','2','4','5','6','7','8','9');
                    @endphp
                    @foreach ($años as $item)
                    <option value="{{$array[] = $item}}">{{$array[] = $item}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="m-0 mb-2">
                  <label for="">3.Tarifa por kilometro recorrido</label>
                  <input type="text" name="tarifa_km_recorrido" class="form-control" value="">
                  @error('tarifa_km_recorrido')
                  <div class="fade show" role="alert">
                    <div class="text-danger">
                      <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('tarifa_km_recorrido')}}</span>
                    </div>
                  </div>
                  @enderror
                </div>
                <div class="m-0 mb-2">
                  <label for="">4.kilometros recorridos</label>
                  <input type="text" name="km_recorridos" class="form-control" value="">
                  @error('km_recorridos')
                  <div class="fade show" role="alert">
                    <div class="text-danger">
                      <span><i class="fa fa-exclamation mr-1"></i> {{  $errors->first('km_recorridos')}}</span>
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

      {{-- Aqui llamamos al modal --}}
      <a href="#" class="Viaticos btn btn-block btn-dark">Ingresar viatico</a>
    </div>
  </div>
</div>

{{-- Detectar errores y avisar al usuario --}}
@if ($errors->any())
<div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="col-sm-12">
    <div class=" fade show" role="alert">
      <div class="text-danger">
        <span><i class="fa fa-exclamation mr-2"></i>Verifique bien los datos en el formulario</span>
      </div>
    </div>
  </div>
</div>
@endif
@stop

@section('contenido-2')
@parent

{{-- Listado de viaticos / Actualizar / Eliminar --}}
@foreach ($t_viaticos as $item)

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('ActualizarViaticos',$item->id_viatico)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="m-1 d-flex align-items-center row border-bottom">
      <div class="col-sm-6 mb-2">
        <h5 class="m-0 card-title font-weight-bold"><i class="fa fa-car"></i> Tipo de Vehículo</h5>
      </div>

      <div class="col-sm-6 mb-2" id="nombre">
        <input class="form-control" readonly type="text" name="tipo_de_vehiculo" value="{{$item->tipo_de_vehiculo}}">
      </div>
    </div>

    <div class="m-3 row">
      <button class="btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
        data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Ver mas información
      </button>
    </div>


    <div class="collapse" id="collapseExample">

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
        <div class="col-sm-12">
          <h6 class="card-title font-weight-bold mt-1">Rubro del vehiculo</h6>
        </div>

        <div class="col-sm-6 mb-2">
          <h6 class="">Antiguedad del vehiculo (años)</h6>
          <input name="ava" class="form-control" type="text"
            value="{{$item->antiguedad_vehiculo_años}}">
        </div>
        <div class="col-sm-6 mb-2">
          <h6 class="">Tarifa por kilometro recorrido</h6>
          <input name="tkr" class="form-control" type="text" value="{{$item->tarifa_km_recorrido}}">
        </div>
      </div>

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
        <div class="col-sm-6 mb-2">
          <div class="">
            <h6 class="">Kilometros recorridos (ida y vuelta)</h6>
            <input name="kr" class="form-control" type="text" value="{{$item->km_recorridos}}">
          </div>
        </div>
        <div class="col-sm-6 mb-2">
          <div class="">
            <h6 class="">Costo total de kilometros</h6>
            <input readonly name="" class="form-control" type="text" value="{{$item->total_km}}">
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal micromodal-slide" id="modal-3{{$item->id_viatico}}" aria-hidden="true">
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
      <a data-micromodal-trigger="modal-3{{$item->id_viatico}}"
        class="Actualizar bg-white btn btn-block text-primary"><i class="fa fa-edit mr-1"></i> Actualizar
        informacion</a>
    </div>

    <div class="col-sm-6">

      <form action="{{route('EliminarViaticos',$item->id_viatico)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="Eliminar text-danger btn m-0 btn-block bg-white"
          data-micromodal-trigger="modal-2{{$item->id_viatico}}"><i class="fa fa-trash mr-2 "></i>Eliminar
          información</button>
        <!-- Modal -->
        <div class="modal micromodal-slide" id="modal-2{{$item->id_viatico}}" aria-hidden="true">
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
<script>
  MicroModal.init({
        onShow: modal => console.info(`${modal.id} is shown`), // [1]
        onClose: modal => console.info(`${modal.id} is hidden`), // [2]
    });
    var button = document.querySelector('.Viaticos');
    button.addEventListener('click', function () {
        MicroModal.show('modal-4');
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