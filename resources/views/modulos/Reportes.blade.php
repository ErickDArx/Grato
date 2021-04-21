@extends('plantilla')

@section('titulo','Reportes')

@section('contenido')
@parent

@foreach ($t_precio_venta as $item)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="row d-flex align-items-center">
    <div class="col-sm-6 mt-1 mb-1">
      <a href="{{route('Reportes.pdf',$item->id_producto)}}" class="col-sm-12 btn btn-dark">Ingresar Pedido</a>
    </div>
  </div>
</div>
@endforeach



@stop