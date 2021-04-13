@extends('plantilla')

@section('titulo', 'Mano de obra')

@section('contenido')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="d-flex justify-content-center row align-items-center">
    <div class="col-sm-6">
      <h4 class="font-weight-bold m-0">Mano de obra</h4>
      <h6 class="text-gray">Desglose de operarios</h6>
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
                  <input type="text" name="nombre_trabajador" class="form-control" id="nombre_trabajador" value="">
                </div>
                @error('nombre_trabajador')
                <div class="col-sm-12 fade show" role="alert">
                    <div class="text-danger">
                        <span>{{  $errors->first('nombre_trabajador')}}</span>
                    </div>
                </div>
                @enderror
                <div class="m-1">
                  <label for="">2.Apellido del operario</label>
                  <input type="text" name="apellido_trabajador" class="form-control" id="apellido_trabajador" value="">
                </div>

                <div class="m-1">
                  <label for="">3.Salario mensual</label>
                  <input type="number" name="salario_mensual" class="form-control" id="salario_mensual" value="">
                </div>

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
@stop

@section('contenido-2')
@parent
@foreach ($t_labores as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">

  <form action="{{route('ActualizarLabores',$item->id_labor)}}" method="POST">
    @csrf
    @method('PUT')

    <div class="m-1 d-flex align-items-center row mb-2">
      <div class="col-sm-3">
        <h6 class="font-weight-bold m-0">Dias laborales por semana</h6>
      </div>
      <div class="col-sm-3 mt-2">
        <input type="number" name="dias_laborales_semana" class="form-control" value="{{$item->dias_laborales_semana}}">
      </div>
      <div class="col-sm-3 mt-2">
        <h6 class="font-weight-bold m-0">Horas laborales por dia</h6>
      </div>
      <div class="col-sm-3 mt-2">
        <input type="number" name="horas_laborales_dia" class="form-control" value="{{$item->horas_laborales_dia}}">
      </div>
    </div>
    <div class="modal micromodal-slide" id="modal-4" aria-hidden="true">
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
  </form>

  <div class="row d-flex align-items-center">
    <div class="col-sm-12">
      <button class="ActualizarLabores btn btn-outline-gray btn-block" data-micromodal-trigger="modal-4">Actualizar
        los datos</button>
    </div>
  </div>

</div>
@endforeach
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
          <h5 class="m-0 card-title font-weight-bold">Nombre del Colaborador(a)</h5>
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

      <button class="mt-4 mb-4 btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
        data-target="#collapseExample{{$item->id_mano_de_obra}}" aria-expanded="false" aria-controls="collapseExample">
        Ver mas informacion
      </button>

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
      <div class="modal micromodal-slide disabled" id="modal-3{{$item->id_mano_de_obra}}" aria-hidden="true">
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
              <h6 class="mt-2 mb-2">Si usted da aceptar, el recurso se actualizara y no se podran regresar
                los
                datos anteriores</h6>
              <button type="submit" class="btn btn-block">
                Aceptar
              </button>
            </main>
          </div>
        </div>
      </div>
    </form>
    <div class="row d-flex align-items-center">
      <div class="col-sm-6">

        <button type="button" data-micromodal-trigger="modal-3{{$item->id_mano_de_obra}}"
          class="Actualizar text-dark bg-white btn btn-block">Actualizar informacion</button>

      </div>
      <div class="col-sm-6">
        <form action="{{route('EliminarManoDeObra', $item->id_mano_de_obra)}}" method="POST" id="Eliminar">
          @csrf
          @method('DELETE')
          <button type="button" class="Eliminar text-danger btn btn-block bg-white" data-toggle="modal"
            data-target="#exampleModal{{$item->id_mano_de_obra}}">
            Eliminar informacion
          </button>
          <input type="text" hidden name="" id="id_mano_de_obra" value="{{$item->id_mano_de_obra}}">
          <!-- Modal -->
          <div class="modal fade" id="exampleModal{{$item->id_mano_de_obra}}" aria-hidden="true"
            style="transition: 0s all ease;">
            <div class="modal-dialog">
              <div class="modal__container modal-content" role="dialog" aria-modal="true"
                aria-labelledby="modal-1-title">
                <header class="modal__header">
                  <div class="row">
                    <div class="col-sm-12">
                      <p class="h4 font-weight-bold mb-2" id="">
                        Eliminar Colaborador(a)
                      </p>
                    </div>
                    <div class="col-sm-12">
                      <h4>{{$item->nombre_trabajador}} {{$item->apellido_trabajador}}</h4>
                    </div>
                  </div>

                  <div class="">
                    <button class="modal__close shadow-sm" aria-label="Close modal" class="close" data-dismiss="modal"
                      aria-label="Close" data-micromodal-close></button>
                  </div>
                </header>
                <main class="modal__content" id="modal-1-content">
                  <h6 class="mb-4 mt-2">Si usted da aceptar, el colaborador se elimina permanentemente</h6>
                  <button type="submit" class="btn btn-block btn-primary" id="EliminarDatos">
                    Aceptar
                  </button>
                  <button type="button" class="btn btn-block btn-outline-dark" data-dismiss="modal">Cerrar</button>
                </main>
              </div>
            </div>
          </div>
          {{-- <button type="button" class="Eliminar text-danger btn btn-block bg-white"
                    data-micromodal-trigger="modal-2{{$item->id_mano_de_obra}}">Eliminar información</button>

          <div class="modal micromodal-slide" id="modal-2{{$item->id_mano_de_obra}}" aria-hidden="true">
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
          </div> --}}
        </form>
      </div>

    </div>
  </div>
  @endforeach
</div>

<script type="text/javascript">
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#EnviarDatos").click(function (e) {
        e.preventDefault(); //Evitar recargar la pagina
        var dataString = $('#Crear').serialize();
        $.ajax({
            type: "POST",
            url: 'Total',
            data: dataString,
            cache: false,
            processData: false,
            success: function (response) {
                if (response) {
                    $("#Lista").load(" #Lista");
                }
            }
        });
    });
});
</script>
<script>
    MicroModal.init();
  var button = document.querySelector('.Operario');
  button.addEventListener('click', function () {
    MicroModal.show('modal-1');
    });
</script>

@stop