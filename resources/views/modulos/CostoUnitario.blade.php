@extends('plantilla')

@section('titulo', 'Costo Unitario')

@section('contenido')
@parent

{{-- Titulo / Boton regresar atras --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1 text-sm-left text-center">
            <h5 class="font-weight-bold m-0"><i class="fa fa-check-square"></i> Producto :
                {{$producto->nombre_producto}}</h5>
        </div>
        <div class="col-sm-6 mt-2 mb-1 d-flex justify-content-center">
            <a class="btn text-dark btn-block" href="{{route('Pedidos')}}"><i class="fa fa-arrow-left"></i> Regresar
                atras</a>
        </div>
    </div>

</div>

{{-- Materia prima / total --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center justify-content-center">

        <div class=" col-sm-6 mt-1 mb-1 text-sm-left text-center">
            <h5 class="font-weight-bold"><i class="fa fa-calculator mr-1"></i> Total de Materia prima</h5>
            <h6 class="text-gray mt-3"><i class="fa fa-pen mr-1"></i> Desglose de recursos</h6>
        </div>

        <div class="col-sm-6 col-6 mt-1 mb-1 ">
            <h6 class="font-weight-light ">Total (Colones)</h6>

            <div class="border rounded p-2">
                @foreach ($t_totales as $item)
                @if ($item->id_producto == $producto->id_producto)
                {{$item->total_materia_prima}}
                @endif
                @endforeach
            </div>

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
        </div>
    </form>
</div>

@endif
@endforeach

@stop
@section('contenido-2')
@parent
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="font-weight-bold m-0">Mano de obra</h5>
        </div>
        <div class="col-sm-6 col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="font-weight-bold m-0">Total</h5>
                </div>
                <div class="col-sm-6">
                    @php
                    $suma=0.00
                    @endphp
                    @foreach ($t_mano_de_obra as $item)

                    @php
                    $suma = $suma + $item->costo_minuto;
                    @endphp
                    @endforeach
                    {{$suma}}
                </div>
            </div>


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
                <option class="" value="{{$item->id_mano_de_obra}}">{{$item->nombre_trabajador}}</option>
                @endforeach
            </select>

        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn-block btn btn-outline-dark">Agregar</button>
        </div>
        @error('id_mano_de_obra')
        <div class="col-12 fade show" role="alert">
            <div class="text-danger">
                <span>{{  $errors->first('id_mano_de_obra')}}</span>
            </div>
        </div>
        @enderror
    </div>
</form>


@foreach ($t_mano_de_obra as $mo)
@if ($mo->id_mano_de_obra == $unitario->id_mano_de_obra)
<div name="Operario" class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <form action="{{route('ActualizarTotal',$item->id_mano_de_obra)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex row align-items-center">
            <div class="col-sm-6 mt-2 mb-2">
                <label class="" for="">Operario</label>
                <input readonly class="form-control" type="text"
                    value="{{$mo->nombre_trabajador}} {{$mo->apellido_trabajador}}">
            </div>
            <div class="col-sm-6">
                <label class="" for="">Tiempo trabajado</label>
                <input class="form-control" type="number" value="{{$mo->tiempo_trabajado}}" name="tiempo_trabajado">
            </div>
            <div class="col-sm-6">
                <label for="">Costo por minuto</label>
                <input readonly class="form-control" type="text" value="{{$mo->salario_minuto}}">
            </div>
            <div class="col-sm-6">
                <label for="">Total</label>
                <input readonly class="form-control" type="text" value="{{$mo->costo_minuto}}">
            </div>
            <div class="col-sm-12">
                <button id="#Operario" class="mt-3 btn btn-block btn-outline-dark">
                    Actualizar informacion
                </button>
            </div>

        </div>
    </form>

</div>
@endif
@endforeach


@stop

@section('contenido-3')
@parent
<div class="shadow m-2 card-body bg-white borde-lineal" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="m-0 font-weight-bold m-0 p-0">Equipo</h5>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
            @foreach ($t_costo_unitario as $item)
            @foreach ($t_equipos as $eq)
            @if ($eq->id_equipo == $item->id_equipo)
            {{$eq->costo}}
            @endif
            @endforeach
            @endforeach
        </div>
    </div>
</div>

<form action="{{route('IngresarEquipo', $producto->id_producto)}}" method="POST">
    @csrf
    <div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="col-sm-6">

            <select class="m-0 form-control" name="id_equipo" id="">
                <option value="0">Seleccionar</option>
                @foreach ($t_equipos as $item)
                <option class="" value="{{$item->id_equipo}}">{{$item->nombre_equipo}}</option>
                @endforeach
            </select>

        </div>
        <div class="col-sm-6">
            <button type="submit" class="btn-block btn btn-outline-dark">Agregar</button>
        </div>
        @error('id_mano_de_obra')
        <div class="col-12 fade show" role="alert">
            <div class="text-danger">
                <span>{{  $errors->first('id_mano_de_obra')}}</span>
            </div>
        </div>
        @enderror
    </div>
</form>


@foreach ($t_equipos as $mo)
@if ($mo->id_equipo == $item->id_equipo)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <form action="{{route('CostoEquipo',$mo->id_equipo)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex row align-items-center">
            <div class="col-sm-6 mt-1 mb-1">
                <label for="">Nombre del equipo</label>
                <input type="text" class="form-control" readonly value="{{$mo->nombre_equipo}}">
            </div>
            <div class="col-sm-6 mt-1 mb-1">
                <label for="">Tiempo de uso del equipo</label>
                <input type="number" class="form-control" value="{{$mo->tiempo_minutos}}" name="tiempo_minutos">
            </div>
            <div class="col-sm-6 mt-1 mb-1">
                <label for="">Costo por minuto</label>
                <input type="text" class="form-control" readonly value="{{$mo->depreciacion_minuto}}">
            </div>
            <div class="col-sm-6 mt-1 mb-1">
                <label for="">Costo</label>
                <input type="text" class="form-control" readonly value="{{$mo->costo}}">
            </div>
            <div class="mt-3 col-sm-12">
                <button type="submit" class="btn-block btn btn-outline-dark">Actualizar informacion</button>
            </div>
        </div>
    </form>

</div>
@endif
@endforeach


<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="font-weight-bold m-0">Costos indirectos de fabricacion (CIF)</h5>
        </div>
        <div class="col-sm-6 col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="font-weight-bold m-0">Total</h5>
                </div>
                <div class="col-sm-6">
                    @foreach ($t_totales as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    {{$item->total_cif}}
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="font-weight-bold m-0">Viaticos</h5>
        </div>
        <div class="col-sm-6 col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="font-weight-bold m-0">Total</h5>
                </div>
                <div class="col-sm-6">
                    @foreach ($t_totales as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    {{$item->total_viaticos}}
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h6 class="m-0 font-weight-bold">Costo total</h6>
        </div>
    </div>
</div>

<script>
    window.onload=function(){
    var pos=window.name || 0;
    window.scrollTo(0,pos);
    }
    window.onunload=function(){
    window.name=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
    }
</script>
@stop