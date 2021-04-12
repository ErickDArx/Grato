@extends('plantilla')

@section('titulo','Costos Indirectos de Fabricación')

@section('contenido')
@parent

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex justify-content-center row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h4 class="font-weight-bold">CIF : {{$cif->nombre_cif}}</h4>
        </div>
        <div class="col-sm-6">
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
                                <button class="modal__close shadow-sm" aria-label="Close modal"
                                    data-micromodal-close></button>
                            </div>
                        </header>
                        <main class="modal__content" id="modal-1-content">
                            <form class="form-group" method="POST" action="{{route('AgregarValores',$cif->id_cif)}}">
                                @csrf
                                <input type="hidden" name="id_cif" id="" value="{{$cif->id_cif}}">
                                @foreach ($t_valores as $item)
                                @if ($item->id_cif == $cif->id_cif)
                                <div class="m-0 mb-2">
                                    <label for="">1. Porcentaje de utilizacion en la empresa</label>
                                    <input type="text" name="porcentaje_utilizacion" class="form-control"
                                        value="{{$item->porcentaje_utilizacion}}">
                                </div>
                                <div class="m-0 mb-2">
                                    <label for="">2.Porcentaje de produccion del producto</label>
                                    <input type="text" name="porcentaje_produccion" class="form-control"
                                        value="{{$item->porcentaje_produccion}}">
                                </div>
                                <div class="m-0 mb-2">
                                    <label for="">3.Produccion promedio mensual</label>
                                    <input type="text" name="produccion_mensual" class="form-control"
                                        value="{{$item->produccion_mensual}}">
                                </div>
                                @endif
                                @endforeach


                                <button type="submit" class="modal__btn modal__btn-primary col-12">Aceptar</button>
                                <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                                    aria-label="Close this dialog window">Cerrar</button>
                            </form>
                        </main>
                    </div>
                </div>
            </div>
            <a href="#" class="Operario btn btn-block btn-dark">Ingresar valores porcentuales</a>
        </div>
    </div>
</div>


<form class="form-group" method="POST" action="{{route('AgregarMes',$cif->id_cif)}}">

    @csrf
    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex justify-content-center row align-items-center">
            <div class="col-sm-4">
                <input type="hidden" name="id_cif" id="" value="{{$cif->id_cif}}">
                <div class="m-0 mb-2">
                    <label for="">1.Fecha</label>
                    <input type="date" class="form-control" name="fecha">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="m-0 mb-2">
                    <label for="">2. Recibo a pagar</label>
                    <input type="text" name="recibo_pagar" class="form-control" value="">
                </div>
            </div>

            <div class="col-sm-4 d-flex mt-sm-4">
                <button class="btn btn-block" type="submit">Enviar</button>
            </div>
        </div>
    </div>
</form>


<div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="col-sm-6 d-flex row align-items-center m-0">
        <h6 class="m-0 font-weight-bolder"><i class="fa fa-calendar mr-2 "></i>Listado de recibos</h6>
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
</script>
@stop

@section('contenido-2')
@parent
@php
$suma=0;
$cantidad=0;
$promedio=0;
@endphp
@foreach ($t_mes as $item)
@if ($cif->id_cif == $item->id_cif && $item->fecha > date('Y') )
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6">
            <h6 class="m-0 mt-1 mb-1"><i class="fa fa-calendar-times mr-2 "></i>Fecha</h6>
            <input type="" readonly class="form-control"
                value="{{ \Carbon\Carbon::parse(strtotime($item->fecha))->formatLocalized('%d %B %Y') }}">

        </div>
        <div class="col-sm-6 mt-1 mb-1">

            <h6 class="m-0 mt-1 mb-1"><i class="fa fa-money-bill mr-2 "></i>Total a pagar (Colones)</h6>
            <input class="form-control" type="text" value="{{$item->recibo_pagar}}">

        </div>

        <div class="col-sm-6 d-flex justify-content-center mt-2">
            <a href="" class="btn btn-block border-0 ">
                <i class="fa fa-edit mr-2 "></i>Editar informacion
            </a>
        </div>


        <div class="col-6 d-flex justify-content-center mt-2">
            <form class="" action="{{route('EliminarMes', array($cif->id_cif ,$item->id_mes))}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-white btn btn-block text-danger">
                    <i class="fa fa-trash mr-2 "></i>Borrar informacion
                </button>
            </form>
        </div>
    </div>
</div>
@endif

@endforeach

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6">
            <p class="m-0">Promedio</p>
        </div>
        <div class="col-sm-6 text-center">
            @foreach ($t_valores as $item)
                @if ($item->id_cif == $cif->id_cif)
                ₡{{$item->promedio}}
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center m-0">
        <div class="col-sm-6">
            <h6 class="m-0 font-weight-bolder"><i class="fa fa-calculator mr-2 "></i>Calculos respectivos</h6>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-outline-dark btn-block" data-toggle="collapse" href="#calculos" role="button"
                aria-expanded="false" aria-controls="collapseExample">
                Ver mas informacion
            </a>
        </div>
    </div>
</div>

<div class="collapse" id="calculos">
    @php

    @endphp
    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex row align-items-center">
            <div class="col-sm-6">
                <h6 class="m-0">Porcentaje de utilizacion en la empresa</h6>
            </div>
            <div class="col-sm-6">
                {{-- {{$valor->porcentaje_utilizacion}} --}}
                {{-- @if ($item->id_cif == $cif->id_cif)
                {{$item->porcentaje_utilizacion}}
                @else

                @endif --}}

            </div>
        </div>
    </div>

    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex row align-items-center">
            <div class="col-sm-6">
                <p class="m-0">Consumo de la empresa</p>
            </div>
            <div class="col-sm-6">
                {{-- @if ($item->id_cif == $cif->id_cif)
                {{$item->consumo_empresa}}
                @else

                @endif --}}
            </div>
        </div>
    </div>

    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex row align-items-center">
            <div class="col-sm-6">
                <p class="m-0">Porcentaje de produccion del producto por mes</p>
            </div>
            <div class="col-sm-6">
                {{-- @if ($item->id_cif == $cif->id_cif)
                {{$item->porcentaje_produccion}}
                @else

                @endif --}}
            </div>
        </div>
    </div>

    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex row align-items-center">
            <div class="col-sm-6">
                <p class="m-0">Consumo de la produccion</p>
            </div>
            <div class="col-sm-6">
                {{-- @if ($item->id_cif == $cif->id_cif)
                {{$item->consumo_produccion}}
                @else

                @endif --}}
            </div>
        </div>
    </div>

    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex row align-items-center">
            <div class="col-sm-6">
                <p class="m-0">Produccion promedio mensual</p>
            </div>
            <div class="col-sm-6">
                {{-- @if ($item->id_cif == $cif->id_cif)
                {{$item->produccion_mensual}}
                @else

                @endif --}}
            </div>
        </div>
    </div>

    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex row align-items-center">
            <div class="col-sm-6">
                <p class="m-0">Total</p>
            </div>
            <div class="col-sm-6">
                {{-- @if ($item->id_cif == $cif->id_cif)
                {{$item->total}}
                @else

                @endif --}}
            </div>
        </div>
    </div>

</div>
@stop