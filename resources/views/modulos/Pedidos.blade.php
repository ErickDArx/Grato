@extends('plantilla')

@section('titulo', 'Costo Unitario')
@section('Ruta','CIF')
@section('Vista','Formulación del pedido')
@section('Icono','fa fa-check mr-2')
@section('contenido')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
          <h4 class="font-weight-bold m-0"><i class="fa fa-check-square mr-1"></i> Seleccione el producto a realizar
          </h4>
        </div>
        <div class="col-sm-6 d-flex align-items-center justify-content-center">
          <a href="{{route('Principal')}}" class="mt-2 btn btn-block text-dark"><i class="fa fa-arrow-left"></i>
            Regresar al
            men&uacute;</a>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('contenido-2')
@parent
@foreach ($t_producto as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="row m-2 d-flex align-items-center">
    <div class="col-sm-6 text-sm-left text-center">
      <h5><i class="text-danger fa fa-angle-double-right mr-2"></i>{{$item->nombre_producto}}</h5>
      <h6><i class="text-primary fa fa-clock mr-1"></i> Creado {{ \Carbon\Carbon::parse($item->fecha)->diffForHumans() }} </h6>
    </div>
    <div class="col-sm-6 mt-sm-0 mt-3">
      <a class="btn btn-block" type="submit" href="{{route('IndexCU' , encrypt($item->id_producto))}}"><i
          class="fa fa-plus mr-1"></i> Agregar informaci&oacute;n</a>
    </div>
  </div>

</div>
@endforeach
<div class="d-flex align-items-center justify-content-center">
  <div class="mt-3">
    {{ $t_producto->render() }}
  </div>
</div>
@stop

@section('contenido-3')
@parent

@stop

@section('contenido-4')
@parent

@stop

@section('contenido-5')
@parent

@stop