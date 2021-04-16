@extends('plantilla')

@section('titulo', 'Costo Unitario')

@section('contenido')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
          <h4 class="font-weight-bold m-0">Seleccione el producto a realizar</h4>
        </div>
        <div class="col-sm-4 mt-1 mb-1">

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
  <div class="row">
    <div class="col-sm-6">
      {{$item->nombre_producto}}
    </div>
    <div class="col-sm-6">
      <a type="submit" href="{{route('IndexCU' , $item->id_producto)}}" class="text-dark bg-white btn btn-block">Crear pedido</a>
    </div>
  </div>

</div>
@endforeach

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