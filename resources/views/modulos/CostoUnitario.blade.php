@extends('plantilla')

@section('titulo', 'Costo Unitario')

@section('contenido')
@parent

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h4 class="font-weight-bold m-0">Producto : {{$producto->nombre_producto}}</h4>
        </div>
    </div>
</div>

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h6 class="font-weight-bold m-0">Materia prima</h6>
        </div>
    </div>
</div>

@foreach ($t_materia_prima as $item)
@if ($item->id_producto == $producto->id_producto)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <form action="" method="POST">
        @csrf
        <div class="d-flex row align-items-center">
            <div class="col-sm-3">
                <label for="">Recurso</label>
                <input readonly type="text" value="{{$item->producto}}" class="form-control">

            </div>

            <div class="col-sm-3">
                <label for="">Cantidad</label>
                <input type="text" class="form-control">
            </div>



            <div class="col-sm-3">
                <label for="">Costo</label>
                <input readonly type="number" class="form-control" value="{{$item->precio_um}}">
            </div>

            <div class="col-sm-3">
                <label for="">Precio</label>
                <input readonly type="text" class="form-control">
            </div>

            <div class="col-sm-12">
                <a href="" class="mt-3 btn btn-block btn-outline-dark">Actualizar</a>
            </div>
    </form>
</div>
</div>
@endif
@endforeach

@stop

@section('contenido-2')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h6 class="font-weight-bold m-0">Mano de obra</h6>
        </div>
    </div>
</div>

@foreach ($t_mano_de_obra as $item)

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="col-sm-6">
        <label for="">Seleccione el operario</label>
    <select class="m-0 form-control" name="" id="">
        <option value="NULO">...</option>
        <option value="{{$item->id_mano_de_obra}}">{{$item->nombre_trabajador}}</option>
    </select>
    </div>

</div>

@endforeach

@stop