@extends('plantilla')

@section('titulo', 'Costo Unitario')
@section('Ruta','')
@section('Vista','Costo Unitario')
@section('Icono','fa fa-check mr-2')

@section('contenido')
@parent

{{-- Titulo / Boton regresar atras --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem; border-left: 8px solid #132c33;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1 text-sm-left text-center">
            <h5 class="font-weight-bold m-0"><i class="fa fa-check-square mr-1"></i> Producto :
                {{$producto->nombre_producto}}</h5>
        </div>

        <div class="col-sm-6 mt-2 mb-1 d-flex justify-content-center">
            <a class=" btn text-dark btn-block text-sm-right" href="{{route('Pedidos')}}"><i
                    class="fa fa-arrow-left"></i> Regresar
                atrás</a>
        </div>
    </div>

</div>

{{-- Materia prima / total --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem; border-left: 8px solid #126e82;">
    <div class="m-2 d-flex row align-items-center justify-content-center">

        <div class=" col-sm-6 mt-1 mb-1 text-sm-left text-center">
            <h5 class="font-weight-bold"><i class="fa fa-calculator mr-1"></i> Total de Materia prima</h5>
        </div>

        <div class="col-sm-6 col-12 mt-1 mb-1 d-flex justify-content-center align-items-center">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6 col-12 d-flex justify-content-center align-items-center">
                    <h6 class="font-weight-light"> Total en Colones</h6>
                </div>
                <div class="col-sm-6 col-6">
                    @foreach ($t_totales as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    <input readonly class="form-control" type="text" value="₡{{$item->total_materia_prima}}">
                    @endif
                    @endforeach
                </div>
            </div>


        </div>
    </div>
</div>

{{-- Listado de materia prima / boton / detalles --}}
@foreach ($t_materia_prima as $item)

{{-- Formulario para editar cantidad --}}
@if ($item->id_producto == $producto->id_producto)
<div class="shadow m-2  card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #126e82;">
    <form action="{{ route('EditarMateriaPrima', $item->id_materia_prima) }}" method="POST" class="">
        @method('PUT')
        @csrf
        <div class="m-2 d-flex row align-items-center">
            <div class="col-sm-12 border-bottom mb-3">
                <div class="row">
                    <div class="col-sm-6">
                        <h5><i class="text-primary fa fa-clipboard-list mr-1"></i> {{ucfirst(trans($item->producto))}}
                        </h5>
                    </div>
                    <div class="col-sm-6 mt-1">
                        <h6>Unidad de medida :
                            {{ucfirst(trans($item->unidad_medida))}}
                        </h6>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <label for="">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="{{$item->cantidad}}">
            </div>

            <div class="col-sm-6 ">
                <label for="">Costo</label>
                <input readonly name="costo" type="number" class="form-control" value="{{$item->precio_um}}">
            </div>

            <div class="col-sm-6">
                <label for="">Precio</label>
                <input readonly name="precio_um" type="text" class="form-control" value="{{$item->precio}}">
            </div>

            <div class="col-sm-6 mt-2">
                <label for=""></label>
                <button href="" type="submit" class="btn btn-block btn-outline-dark">Actualizar
                    informacion</button>
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
{{-- Mano de obra / total --}}
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #ff8882;">
    <div class="m-2 d-flex row align-items-center justify-content-center">

        <div class=" col-sm-6 mt-1 mb-1 text-sm-left text-center">
            <h5 class="font-weight-bold"><i class="fa fa-calculator mr-1"></i> Total de Mano de Obra</h5>
        </div>

        <div class="col-sm-6 col-12 mt-1 mb-1 d-flex justify-content-center align-items-center">
            <div class="row d-flex">
                <div class="col-sm-6 col-6 d-flex align-items-center">
                    <h6 class="font-weight-light"> Total en Colones</h6>
                </div>
                <div class="col-sm-6 col-6">
                    @foreach ($t_totales as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    <input readonly class="form-control" type="text" value="₡{{$item->total_mano_de_obra}}">
                    @endif
                    @endforeach
                </div>
            </div>


        </div>
    </div>
</div>
{{-- Formulario para agregar los operarios --}}
<form action="{{route('AgregarOperario', $producto->id_producto)}}" method="POST">
    @csrf
    <div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #ff8882;">
        <div class="col-sm-6">
            <label for=""><i class="fa fa-file-signature mr-1"></i> Seleccion de operarios</label>
            <select class="m-0 form-control" name="id_mano_de_obra" id="">
                <option value="Sin determinar">Seleccionar</option>
                @foreach ($t_costo_unitario as $item)
                {{$campo = $item->id_mano_de_obra}}
                @endforeach
                {{-- $producto->id_producto == $cu->id_producto --}}
                @foreach ($t_mano_de_obra as $item)
                {{-- @foreach ($t_costo_unitario as $cu) --}}
                @if ($item->id_mano_de_obra)
                <option 
                @foreach ($t_costo_unitario as $cu)
                @if ($cu->id_mano_de_obra == $item->id_mano_de_obra && $producto->id_producto == $cu->id_producto)
                    disabled
                @endif
                @endforeach
                class="form-control" value="{{$item->id_mano_de_obra}}">{{$item->nombre_trabajador}}</option>
                @endif
                {{-- @endforeach --}}
                @endforeach

            </select>
        </div>

        <div class="col-sm-6 mt-2">
            <label for=""></label>
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

{{-- Listado de operarios --}}
@foreach ($t_mano_de_obra as $mo)
@foreach ($t_costo_unitario as $cu)
@if ( $cu->id_producto == $producto->id_producto && $mo->id_mano_de_obra == $cu->id_mano_de_obra)
<div name="Operario" class="shadow m-2 card-body bg-white"
    style="border-radius: 0.5rem;border-left: 8px solid #ff8882;">
    <form action="{{route('ActualizarTotal',$mo->id_mano_de_obra)}}" method="POST">
        @csrf
        @method('PUT')
        <input hidden type="text" value="{{$producto->id_producto}}" name="id_producto">
        <div class="m-2 d-flex row align-items-center">
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
            <div class="col-sm-6">
                <button id="#Operario" class="mt-3 bg-white btn btn-block text-danger">
                    <i class="fa fa-trash mr-1"></i> Eliminar del desglose
                </button>
            </div>
            <div class="col-sm-6">
                <button id="#Operario" class="mt-3 btn btn-block bg-white text-primary">
                    <i class="fa fa-edit mr-1"></i> Actualizar informacion
                </button>
            </div>
        </div>
    </form>

</div>
@endif
@endforeach
@endforeach


@stop

@section('contenido-3')
@parent

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #f58634;">
    <div class="m-2 d-flex row align-items-center justify-content-center">

        <div class=" col-sm-6 mt-1 mb-1 text-sm-left text-center">
            <h5 class="font-weight-bold"><i class="fa fa-calculator mr-1"></i> Total de Equipos</h5>
        </div>

        <div class="col-sm-6 col-12 mt-1 mb-1 d-flex justify-content-center align-items-center">
            <div class="row d-flex">
                <div class="col-sm-6 col-6 d-flex align-items-center">
                    <h6 class="font-weight-light"> Total en Colones</h6>
                </div>
                <div class="col-sm-6 col-6">
                    @foreach ($t_totales as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    <input readonly class="form-control" type="text" value="₡{{$item->total_equipos}}">
                    @endif
                    @endforeach
                </div>
            </div>


        </div>
    </div>
</div>

<form action="{{route('IngresarEquipo', $producto->id_producto)}}" method="POST">
    @csrf
    <div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #f58634;">
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
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #f58634;">
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

{{-- CIF --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #464f41;">
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

{{-- Viaticos --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #5f939a;">
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

{{-- Costo total --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h6 class="m-0 font-weight-bold">Costo total</h6>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
            @foreach ($t_totales as $item)
            @if ($item->id_producto == $producto->id_producto)
            <input class="form-control" type="text" value="{{$item->total}}">
            @endif
            @endforeach
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