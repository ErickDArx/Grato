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
    <form action="{{ route('EditarMateriaPrima', $item->id_materia_prima) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="d-flex row align-items-center">
            <div class="col-sm-3">
                <label for="">Recurso</label>
                <input readonly type="text" name="producto" value="{{$item->producto}}" class="form-control">
            </div>

            <div class="col-sm-3">
                <label for="">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="{{$item->cantidad}}">
            </div>

            <div class="col-sm-3">
                <label for="">Costo</label>
                <input readonly name="costo" type="number" class="form-control" value="{{$item->precio_um}}">
            </div>

            <div class="col-sm-3">
                <label for="">Precio</label>
                <input readonly name="precio_um" type="text" class="form-control" value="{{$item->precio}}">
            </div>

            <div class="col-sm-12">
                <button href="" type="submit" class="mt-3 btn btn-block btn-outline-dark">Actualizar</button>
            </div>

            <input type="hidden" value="{{$item->unidad_medida}}" name="unidad_medida">
            <input type="hidden" value="{{$item->presentacion}}" name="presentacion">

    </form>
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
<form action="{{route('AgregarOperario', $producto->id_producto)}}" method="POST">
    @csrf
    <div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="col-sm-6">

            <select class="m-0 form-control" name="id_mano_de_obra" id="">
                <option value="0">Seleccionar</option>
                @foreach ($t_mano_de_obra as $item)
                <option value="{{$item->id_mano_de_obra}}">{{$item->nombre_trabajador}}</option>
                @endforeach
            </select>

        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn-block btn btn-outline-dark">Agregar</button>
        </div>
</form>

</div>

@foreach ($t_costo_unitario as $item)
@foreach ($t_mano_de_obra as $mo)
@if ($item->id_producto == $producto->id_producto && $mo->id_mano_de_obra == $item->id_mano_de_obra)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            {{$mo->nombre_trabajador}}
        </div>
    </div>
</div>
@endif
@endforeach
@endforeach


@stop