@extends('plantilla')

@section('titulo', 'Precio de Venta')
@section('Ruta','')
@section('Vista','Precio de Venta')
@section('Icono','fa fa-check mr-2')

@section('contenido')
@parent

{{-- Costo total --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="m-0 font-weight-bold">Costo Unitario</h5>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
            @foreach ($t_totales as $item)
            @if ($item->id_producto == $producto->id_producto)
            <input type="text" readonly class="form-control" value="{{$item->total}}">
            @endif
            @endforeach
        </div>
    </div>
</div>

{{-- Margen de utilidad --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="m-0 font-weight-bold">Margen de Utilidad</h5>
        </div>
        <div class="col-sm-6 mt-1 mb-1">

            <input type="text" class="form-control" value="" name="margen_utilidad">

        </div>
    </div>
</div>

@stop