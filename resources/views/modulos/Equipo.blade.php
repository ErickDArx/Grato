@extends('plantilla')

@section('titulo','Equipos')

@section('contenido')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="d-flex justify-content-center row align-items-center">
    <div class="col-sm-6">
      <h4 class="font-weight-bold">Equipos</h4>
      <h6>Desglose de recursos</h6>
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
              <form class="form-group" method="POST" action="{{route('AgregarEquipo')}}">
                @csrf
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
                <div class="m-0 mb-2">
                  <label for="">1.Nombre del equipo</label>
                  <input type="text" name="nombre_equipo" class="form-control" value="">
                </div>
                <div class="m-0 mb-2">
                  <label for="">2.Precio</label>
                  <input type="number" name="precio" class="form-control" value="">
                </div>
                <div class="m-0 mb-2">
                  <label for="">3.Vida util</label>
                  <input type="number" name="vida_util" class="form-control" value="">
                </div>
                <div class="m-0 mb-2">
                  <label for="">4.Porcentaje de utilizacion</label>
                  <input type="number" name="porcentaje_utilizacion" class="form-control" value="">
                </div>

                <button type="submit" class="modal__btn modal__btn-primary col-12">Aceptar</button>
                <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                  aria-label="Close this dialog window">Cerrar</button>
              </form>
            </main>
          </div>
        </div>
      </div>
      <a href="#" class="Equipo btn btn-block btn-dark">Ingresar recurso</a>
    </div>
  </div>
</div>
<script>
  MicroModal.init();
  var button = document.querySelector('.Equipo');
  button.addEventListener('click', function () {
    MicroModal.show('modal-1');
    });

</script>
@stop

@section('contenido-2')
@parent
@foreach ($t_equipos as $item)

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">

  <form action="{{route('ActualizarEquipo',$item->id_equipo)}}" method="POST">
    @csrf
    @method('PUT')
    <input type="number" name="dias_laborales_semana" hidden class="form-control" value="{{$dias}}">
    <input type="number" name="horas_laborales_dia" hidden class="form-control" value="{{$horas}}">
    <div class="m-1 d-flex align-items-center row border-bottom">

      <div class="col-sm-6 mb-2">
        <h5 class="m-0 card-title font-weight-bold">Nombre del equipo</h5>
      </div>

      <div class="col-sm-6 mb-2 m-0" id="">
        <input class="form-control" type="text" name="nombre_equipo" readonly value="{{$item->nombre_equipo}}">
      </div>

    </div>

    <button class="mt-4 mb-4 btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
      data-target="#collapseExample{{$item->id_equipo}}" aria-expanded="false" aria-controls="collapseExample">
      Ver mas informacion
    </button>

    <div class="collapse" id="collapseExample{{$item->id_equipo}}">

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
        <div class="col-sm-6 mb-2">
          <h6 class="card-title font-weight-bold mt-1">Precio</h6>
          <input name="precio" class="form-control" type="text" value="{{$item->precio}}">
        </div>
        <div class="col-sm-6 mb-2">
          <div class="">
            <h6 class="card-title font-weight-bold mt-1">Vida util</h6>
            <input name="vida_util" class="form-control" type="number" value="{{$item->vida_util}}">
          </div>
        </div>
      </div>

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
        <div class="col-sm-6 mb-2">
          <h6 class="card-title font-weight-bold mt-1">Depreciacion anual</h6>
          <input name="depreciacion_anual" class="form-control" readonly type="text"
            value="{{$item->depreciacion_anual}}">
        </div>
        <div class="col-sm-6 mb-2">
          <h6 class="card-title font-weight-bold mt-1">Porcentaje utilizacion</h6>
          <input name="porcentaje_utilizacion" class="form-control" type="number"
            value="{{$item->porcentaje_utilizacion}}">
        </div>
      </div>

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
        <div class="col-sm-6 mb-2">
          <h6 class="font-weight-bold">Depreciacion anual real</h6>
          <input name="depreciacion_anual_real" class="form-control" readonly type="text"
            value="{{$item->depreciacion_anual_real}}">
        </div>

        <div class="col-sm-6 mb-2">
          <h6 class="font-weight-bold">Depreciacion mensual</h6>
          <input name="depreciacion_mensual" class="form-control" readonly type="text"
            value="{{$item->depreciacion_mensual}}">
        </div>

      </div>

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
        <div class="col-sm-6 mb-2">
          <h6 class="font-weight-bold">Depreciacion semanal</h6>
          <input name="depreciacion_semanal" class="form-control" readonly type="text"
            value="{{$item->depreciacion_semanal}}">
        </div>

        <div class="col-sm-6 mb-2">
          <h6 class="font-weight-bold">Depreciacion diaria</h6>
          <input name="depreciacion_diaria" class="form-control" readonly type="text"
            value="{{$item->depreciacion_diaria}}">
        </div>

      </div>

      <div class="border-bottom mb-2 mt-2 m-1 row d-flex align-items-center">
        <div class="col-sm-6 mb-2">
          <h6 class="font-weight-bold">Depreciacion en horas</h6>
          <input name="depreciacion_diaria" class="form-control" readonly type="text"
            value="{{$item->depreciacion_hora}}">
        </div>

        <div class="col-sm-6 mb-2">
          <h6 class="font-weight-bold">Depreciacion en minutos</h6>
          <input name="depreciacion_anual_real" class="form-control" readonly type="text"
            value="{{$item->depreciacion_minuto}}">
        </div>

      </div>

    </div>
    <div class="modal micromodal-slide disabled" id="modal-3{{$item->id_equipo}}" aria-hidden="true">
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

      <button type="button" data-micromodal-trigger="modal-3{{$item->id_equipo}}"
        class="Actualizar text-dark bg-white btn btn-block">Actualizar informacion</button>

    </div>
    <div class="col-sm-6">
      <form action="{{route('EliminarEquipo', $item->id_equipo)}}" method="POST">
        @csrf
        @method('DELETE')

        <button type="button" class="Eliminar text-danger btn btn-block bg-white"
          data-micromodal-trigger="modal-2{{$item->id_equipo}}">Eliminar información</button>
        <!-- Modal -->
        <div class="modal micromodal-slide" id="modal-2{{$item->id_equipo}}" aria-hidden="true">
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