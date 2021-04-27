@extends('plantilla')
@section('Vista','Mano de Obra')

@section('Ruta','ManoObra')

@section('Icono','fa fa-users-cog mr-2')
@section('titulo', 'Mano de obra')

@section('contenido')
@parent
{{-- Ingreso de operarios --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="m-1 d-flex justify-content-center row align-items-center">
    <div class="col-sm-6">
      <h4 class="font-weight-bold m-0"><i class="fa fa-user-cog mr-1"></i> Mano de obra</h4>
      <h6 class="text-gray mt-2">Desglose de operarios.</h6>
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
                <div class="m-1">
                  <label for="">1.Nombre del operario</label>
                  <input type="text" name="nombre_trabajador" class="form-control" id="nombre_trabajador"
                    value="{{old('nombre_trabajador')}}">
                </div>
                @error('nombre_trabajador')
                <div class="fade show" role="alert">
                  <div class="text-danger">
                    <span>{{  $errors->first('nombre_trabajador')}}</span>
                  </div>
                </div>
                @enderror
                <div class="m-1">
                  <label for="">2.Apellido del operario</label>
                  <input type="text" name="apellido_trabajador" class="form-control" id="apellido_trabajador"
                    value="{{old('apellido_trabajador')}}">
                </div>
                @error('apellido_trabajador')
                <div class="fade show" role="alert">
                  <div class="text-danger">
                    <span>{{  $errors->first('apellido_trabajador')}}</span>
                  </div>
                </div>
                @enderror
                <div class="m-1">
                  <label for="">3.Salario mensual</label>
                  <input type="number" name="salario_mensual" class="form-control" id="salario_mensual"
                    value="{{old('salario_mensual')}}">
                </div>
                @error('salario_mensual')
                <div class="fade show mb-2" role="alert">
                  <div class="text-danger">
                    <span>{{  $errors->first('salario_mensual')}}</span>
                  </div>
                </div>
                @enderror
                @foreach ($t_labores as $item)
                @php
                $dias = $item->dias_laborales_semana;
                $horas = $item->horas_laborales_dia;
                @endphp
                <input type="number" name="dias_laborales_semana" hidden class="form-control"
                  value="{{$item->dias_laborales_semana}}">
                <input type="number" name="horas_laborales_dia" hidden class="form-control"
                  value="{{$item->horas_laborales_dia}}">
                @endforeach

                <button type="submit" class="modal__btn modal__btn-primary col-12" id="EnviarDatos">Aceptar</button>
                <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                  aria-label="Close this dialog window">Cerrar</button>
              </form>
            </main>

          </div>
        </div>
      </div>
      <a href="#" class="Operario btn btn-block btn-dark">Ingresar operario</a>

    </div>
  </div>
</div>

{{-- Lista de valores laborales --}}
@foreach ($t_labores as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  {{-- Actualizar valores laborales --}}
  <form action="{{route('ActualizarLabores',$item->id_labor)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="m-2 d-flex align-items-center row mb-2">
      <div class="col-sm-6">
        <h6 class="font-weight-bold m-0"><i class="fa fa-calendar-day mr-1"></i> D&iacute;as laborales por semana</h6>
      </div>
      <div class="col-sm-6 mt-2">
        <input type="number" name="dias_laborales_semana" class="form-control" value="{{$item->dias_laborales_semana}}">
        @error('dias_laborales_semana')
        <div class="fade show mb-2" role="alert">
          <div class="text-danger">
            <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('dias_laborales_semana')}}</span>
          </div>
        </div>
        @enderror
      </div>

      <div class="col-sm-6 mt-2">
        <h6 class="font-weight-bold m-0"><i class="fa fa-hourglass-start mr-1"></i> Horas laborales por d&iacute;a</h6>
      </div>
      <div class="col-sm-6 mt-2">
        <input type="number" name="horas_laborales_dia" class="form-control" value="{{$item->horas_laborales_dia}}">
        @error('horas_laborales_dia')
        <div class="fade show mb-2" role="alert">
          <div class="text-danger">
            <span><i class="fa fa-exclamation mr-1"></i>{{  $errors->first('horas_laborales_dia')}}</span>
          </div>
        </div>
        @enderror
      </div>
    </div>
    <!-- Modal -->
    <div class="modal micromodal-slide" id="modal-3{{$item->id_labor}}" aria-hidden="true">
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

  <div class="m-2 row d-flex align-items-center">
    <div class="col-sm-6">

    </div>
    <div class="col-sm-6">
      <button class="ActualizarLabores btn btn-outline-dark btn-block"
        data-micromodal-trigger="modal-3{{$item->id_labor}}">Actualizar
        los datos</button>
    </div>
  </div>

</div>
@endforeach

{{-- Buscador --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <form action="{{route('ManoObra')}}" method="GET" class="row m-2 d-flex align-items-center">
    @csrf

    <div class="col-sm-6 ">
      <h6 class="font-weight-bold"><i class="fa fa-clipboard-list mr-1"></i> Listado de operarios</h6>
    </div>

    <div class="input-group col-sm-6">
      <input placeholder="" name="busqueda" type="text" value="" class="rounded form-control">
      <div class="input-group-append">
        <button type="submit" class="btn btn-dark"><span class="fa fa-search icon"></span></button>
      </div>
    </div>

  </form>
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


@stop

@section('contenido-3')
@parent
{{-- Listado Operarios --}}
<div id="Lista">
  @foreach ($t_mano_de_obra as $item)
  <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">

    <form action="{{route('ActualizarManoDeObra',$item->id_mano_de_obra)}}" method="POST">
      @csrf
      @method('PUT')
      <input type="number" name="dias_laborales_semana" hidden class="form-control" value="{{$dias}}">
      <input type="number" name="horas_laborales_dia" hidden class="form-control" value="{{$horas}}">
      <div class="m-1 d-flex align-items-center row border-bottom">

        <div class="col-sm-6 mb-2">
          <h5 class="m-0 card-title font-weight-bold"><i class="fa fa-user-check mr-1"></i> Nombre del Colaborador(a)
          </h5>
        </div>

        <div class="col-sm-6 mb-2 m-0" id="">
          <input class="form-control" type="text" name="" readonly
            value="{{$item->nombre_trabajador}} {{$item->apellido_trabajador}}">
        </div>

        <div class="col-sm-6 mb-2 m-0" id="nombre_trabajador" hidden>
          <input class="form-control" type="text" name="nombre_trabajador" readonly
            value="{{$item->nombre_trabajador}}">
        </div>
        <div class="col-sm-3 mb-2" id="apellido_trabajador" hidden>
          <input class="form-control" type="text" name="apellido_trabajador" readonly
            value="{{$item->apellido_trabajador}} ">
        </div>

      </div>
      <div class="row m-3">
        <button class=" btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
          data-target="#collapseExample{{$item->id_mano_de_obra}}" aria-expanded="false"
          aria-controls="collapseExample">
          Ver mas informaci&oacute;n
        </button>
      </div>


      <div class="collapse" id="collapseExample{{$item->id_mano_de_obra}}">

        <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
          <div class="col-sm-6 mb-2">
            <h6 class="card-title font-weight-bold mt-1">Salario mensual</h6>
            <input name="salario_mensual" class="form-control" type="number" value="{{$item->salario_mensual}}">
          </div>
          <div class="col-sm-6 mb-2">
            <div class="">
              <h6 class="card-title font-weight-bold mt-1">Salario semanal</h6>
              <input name="salario_semanal" readonly class="form-control" type="number"
                value="{{$item->salario_semanal}}">
            </div>
          </div>
        </div>

        <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
          <div class="col-sm-6 mb-2">
            <h6 class="card-title font-weight-bold mt-1">Salario diario</h6>
            <input name="salario_diario" class="form-control" readonly type="text" value="{{$item->salario_diario}}">
          </div>
          <div class="col-sm-6 mb-2">
            <h6 class="card-title font-weight-bold mt-1">Salario por hora</h6>
            <input name="salario_hora" class="form-control" readonly type="number" value="{{$item->salario_hora}}">
          </div>
        </div>

        <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
          <div class="col-sm-6 mb-2">
            <h6 class="font-weight-bold">Salario por minuto</h6>
            <input name="salario_minuto" class="form-control" readonly type="text" value="{{$item->salario_minuto}}">
          </div>
        </div>

      </div>
      <!-- Modal -->
      <div class="modal micromodal-slide" id="modal-3{{$item->id_mano_de_obra}}" aria-hidden="true">
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
    <div class="row d-flex align-items-center m-2">
      <div class="col-sm-6">

        <button type="button" data-micromodal-trigger="modal-3{{$item->id_mano_de_obra}}"
          class="Actualizar text-primary bg-white btn btn-block"><i class="fa fa-edit mr-1"></i> Actualizar
          Informaci&oacute;n</button>

      </div>
      <div class="col-sm-6">
        <form action="{{route('EliminarManoDeObra', $item->id_mano_de_obra)}}" method="POST" id="Eliminar">
          @csrf
          @method('DELETE')
          <button type="button" class="Eliminar text-danger btn btn-block bg-white" data-toggle="modal"
            data-micromodal-trigger="modal-2{{$item->id_mano_de_obra}}">
            <i class="fa fa-trash mr-1"></i> Eliminar informaci&oacute;n
          </button>
          <input type="text" hidden name="" id="id_mano_de_obra" value="{{$item->id_mano_de_obra}}">

          <!-- Modal -->
          <div class="modal micromodal-slide" id="modal-2{{$item->id_mano_de_obra}}" aria-hidden="true">
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
</div>
<div class="d-flex align-items-center justify-content-center">
  <div class="mt-3">
    {{ $t_mano_de_obra->render() }}
  </div>
</div>


<script>
  MicroModal.init();
  var button = document.querySelector('.Operario');
  button.addEventListener('click', function () {
    MicroModal.show('modal-1');
    });

    var button = document.querySelector('.Eliminar');
  button.addEventListener('click', function () {
    MicroModal.show('modal-2');
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