@extends('plantilla')

@section('titulo', 'Precio de Venta')
@section('Ruta','')
@section('Vista','Precio de Venta')
@section('Icono','fa fa-check mr-2')

@section('contenido')
@parent

{{-- Volver atras --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="font-weight-bold"><i class="fa fa-tag mr-1"></i> Precio de venta para {{$producto->nombre_producto}}</h5>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
            <a class="btn btn-block text-dark" href="{{route('IndexCU' , $producto->id_producto)}}"><i
                    class="fa fa-arrow-left mr-1"></i> Regresar atras</a>
        </div>
    </div>
</div>

{{-- Costo total --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="m-0 font-weight-bold">Costo Unitario Total</h5>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
            @foreach ($t_totales as $item)
            @if ($item->id_producto == $producto->id_producto)
            <input type="text" readonly class="form-control" value="{{$item->total / $item->cantidad_producir}}">
            @endif
            @endforeach
        </div>
    </div>
</div>

{{-- Margen de utilidad --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <form action="{{route('CostoTotalPV',$producto->id_producto)}}" method="POST">
        @csrf
        <div class="m-2 d-flex row align-items-center">
            <div class="col-sm-6 mt-1 mb-1">
                <h5 class="m-0 font-weight-bold">Margen de Utilidad</h5>
            </div>

            <div class="col-sm-6 mt-1 mb-1">
                @foreach ($t_precio_venta as $item)
                @if ($item->id_producto == $producto->id_producto)
                <input required type="number" class="form-control" value="{{$item->margen_utilidad}}"
                    name="margen_utilidad">
                @endif
                @endforeach
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-6 mt-1 mb-1">
                <button type="submit" class="btn btn-block btn-dark">Aceptar</button>
            </div>
        </div>
    </form>

</div>
{{-- Precio de venta --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="m-0 font-weight-bold">Precio de Venta</h5>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
            @foreach ($t_precio_venta as $item)
            @if ($item->id_producto == $producto->id_producto)
            <input type="text" readonly class="form-control" value="{{$item->precio_venta}}" name="margen_utilidad">
            @endif
            @endforeach

        </div>
    </div>
</div>

{{-- Ganancia por unidad --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="m-0 font-weight-bold">Ganancia por Unidad</h5>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
            @foreach ($t_precio_venta as $item)
            @if ($item->id_producto == $producto->id_producto)
            <input type="text" readonly class="form-control" value="{{$item->ganancia_unidad}}" name="margen_utilidad">
            @endif
            @endforeach

        </div>
    </div>
</div>

<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6">
            <a href="{{route('Reportes.pdf',$producto->id_producto)}}" class="btn btn-dark btn-block"><i class="fa fa-file-pdf mr-2"></i> Crear reporte</a>
        </div>
        <div class="col-sm-6">
            <a href="{{route('Principal')}}" class="btn btn-outline-dark btn-block"><i class="fa fa-home mr-2"></i> Ir al menú</a>
        </div>
    </div>
</div>

@stop