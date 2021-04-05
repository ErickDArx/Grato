@extends('plantilla')

@section('titulo','Costos Indirectos de Fabricación')

@section('contenido')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex justify-content-center row align-items-center">
        <div class="col-sm-6">
            <h4 class="font-weight-bold">{{$cif->nombre_cif}}</h4>
        </div>
        <div class="col-sm-6">
            <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                        <header class="modal__header">
                            <div class="">
                                <div class="">
                                    <p class="h4 font-weight-bold mb-2" id="">
                                        Nuevo recibo
                                    </p>
                                </div>
                            </div>
                            <div class="">
                                <button class="modal__close shadow-sm" aria-label="Close modal"
                                    data-micromodal-close></button>
                            </div>
                        </header>
                        <main class="modal__content" id="modal-1-content">
                            <form class="form-group" method="POST" action="{{route('AgregarMes',$cif->id_cif)}}">
                                @csrf
                                <input type="hidden" name="id_cif" id="" value="{{$cif->id_cif}}">
                                <div class="m-0 mb-2">
                                    <label for="">1.Mes</label>
                                    <select type="text" name="nombre_mes" class="form-control" value="">
                                        <option value="Enero">Enero</option>
                                        <option value="Febrero">Febrero</option>
                                        <option value="Marzo">Marzo</option>
                                        <option value="Abril">Abril</option>
                                        <option value="Mayo">Mayo</option>
                                        <option value="Junio">Junio</option>
                                        <option value="Julio">Julio</option>
                                        <option value="Agosto">Agosto</option>
                                        <option value="Septiembre">Septiembre</option>
                                        <option value="Octubre">Octubre</option>
                                        <option value="Noviembre">Noviembre</option>
                                        <option value="Diciembre">Diciembre</option>
                                    </select>
                                </div>
                                <div class="m-0 mb-2">
                                    <label for="">2. Recibo a pagar</label>
                                    <input type="text" name="recibo_pagar" class="form-control" value="">
                                </div>
                                <div class="m-0 mb-2">
                                    <label for="">2. Porcentaje de utilizacion en la empresa</label>
                                    <input type="text" name="porcentaje_utilizacion" class="form-control" value="">
                                </div>
                                <div class="m-0 mb-2">
                                    <label for="">3.Porcentaje de produccion del producto</label>
                                    <input type="text" name="porcentaje_produccion" class="form-control" value="">
                                </div>
                                <div class="m-0 mb-2">
                                    <label for="">4.Produccion promedio mensual</label>
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
            <a href="#" class="Operario btn btn-block btn-dark">Ingresar nuevo mes</a>
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
@if ($cif->id_cif == $item->id_cif)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6">
            {{$item->nombre_mes}}
        </div>
        <div class="col-sm-6">

            @if ($item->recibo_pagar >= 0)
            @php
            $cantidad++
            @endphp
            @endif
            {{$item->recibo_pagar}}
            @php
            $suma = ($item->recibo_pagar + $suma);
            $promedio = ($suma)/$cantidad;
            @endphp
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
        <div class="col-sm-6">
            {{$promedio}}
        </div>
    </div>
</div>
@stop