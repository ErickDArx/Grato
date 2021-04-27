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
                atr&aacute;s</a>
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
                    Informaci&oacute;n</button>
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
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6 col-12 d-flex justify-content-center align-items-center">
                    <h6 class="font-weight-light"> Total en Colones</h6>
                </div>
                <div class="col-sm-6 col-6">
                    @php
                        $totalMO= 0;
                    @endphp
                    @foreach ($t_totales as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    @php
                        $totalMO = $item->total_mano_de_obra;
                    @endphp
                    @endif
                    @endforeach
                    <input readonly class="form-control" type="text" value="₡{{$totalMO}}">
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
            <label for=""><i class="fa fa-file-signature mr-1"></i> Selecci&oacute;n de operarios</label>
            <select class="m-0 form-control" name="id_mano_de_obra" id="">
                <option value="Sin determinar">Seleccionar</option>

                @foreach ($t_mano_de_obra as $item)
                @if ($item->id_mano_de_obra)
                <option @foreach ($t_costo_unitario as $cu) @if ($cu->id_mano_de_obra == $item->id_mano_de_obra &&
                    $producto->id_producto == $cu->id_producto)
                    disabled
                    @endif
                    @endforeach
                    class="form-control" value="{{$item->id_mano_de_obra}}">{{$item->nombre_trabajador}}</option>
                @endif
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
<div name="Operario" class="shadow m-2 card-body bg-white d-flex align-items-center"
    style="border-radius: 0.5rem;border-left: 8px solid #ff8882;">
    <form action="{{route('ActualizarTotal',$mo->id_mano_de_obra)}}" method="POST">
        @csrf
        @method('PUT')
        <input hidden type="text" value="{{$producto->id_producto}}" name="id_producto">
        <div class="m-2 d-flex row align-items-center">
            <div class="col-sm-12 mt-2 mb-2 border-bottom">
                <h5><i class="fa fa-user-cog mr-1 text-dark"></i> {{$mo->nombre_trabajador}}
                    {{$mo->apellido_trabajador}}</h5>
            </div>
            <div class="col-sm-6">
                <label class="" for="">Tiempo trabajado (minutos)</label>
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
            <!-- Modal -->
            <div class="modal micromodal-slide" id="modal-3{{$item->id_mano_de_obra}}" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                        <header class="modal__header">
                            <div class="">
                                <div class="">
                                    <p class="h4 font-weight-bold mb-2 text-primary" id="">
                                        <i class="fa fa-edit mr-2 "></i>Actualizar
                                    </p>
                                </div>
                            </div>
                            <div class="">
                                <button class="modal__close shadow-sm" aria-label="Close modal"
                                    data-micromodal-close></button>
                            </div>
                        </header>
                        <main class="modal__content" id="modal-1-content">
                            <h6 class="col-12 mt-3">Si usted da aceptar, los cambios se van a aplicar</h6>
                        </main>
                        <footer class="modal__footer">
                            <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
                                Aceptar
                            </button>
                            <button class="modal__btn col-3" data-micromodal-close
                                aria-label="Close this dialog window ">Cerrar</button>
                        </footer>

                    </div>
                </div>
            </div>
    </form>

    <div class="col-sm-3 mt-3 d-flex align-items-center">
        <a data-micromodal-trigger="modal-3{{$item->id_mano_de_obra}}"
            class=" Actualizar text-primary bg-white btn btn-block"><i class="fa fa-edit mr-1"></i> Editar</a>
    </div>

    <div class="col-sm-3 mt-3 d-flex align-items-center">
        <a data-micromodal-trigger="modal-2{{$item->id_mano_de_obra}}" class="text-danger bg-white btn btn-block"><i
                class="fa fa-trash mr-1"></i> Eliminar</a>
    </div>


    <form action="{{route('EOperario',$cu->id_costo_unitario)}}" method="POST">
        {{ csrf_field() }}
        @method('PUT')
        <input hidden type="" name="id_mano_de_obra" value="">
        <!-- Modal -->
        <div class="modal micromodal-slide" id="modal-2{{$item->id_mano_de_obra}}" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                        <div class="">
                            <div class="">
                                <p class="h4 font-weight-bold mb-2 text-danger" id="">
                                    <i class="fa fa-trash mr-2 "></i>Eliminar
                                </p>
                            </div>
                        </div>
                        <div class="">
                            <button class="modal__close shadow-sm" aria-label="Close modal"
                                data-micromodal-close></button>
                        </div>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                        <h6 class="col-12 mt-3">Si usted da aceptar, los cambios se van a aplicar</h6>
                    </main>
                    <footer class="modal__footer">
                        <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
                            Aceptar
                        </button>
                        <button class="modal__btn col-3" data-micromodal-close
                            aria-label="Close this dialog window ">Cerrar</button>
                    </footer>

                </div>
            </div>
        </div>
    </form>


</div>


</div>
@endif
@endforeach
@endforeach

@stop

@section('contenido-3')
@parent
{{-- Titulo / Total / Equipos --}}
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

{{-- Formulario Agregar Equipos / Select --}}
<form action="{{route('IngresarEquipo', $producto->id_producto)}}" method="POST">
    @csrf
    <div class="row shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #f58634;">
        <div class="col-sm-6">
            <select class="m-0 form-control" name="id_equipo" id="">
                <option value="0">Seleccionar</option>

                @foreach ($t_equipos as $item)
                <option @foreach ($t_costo_unitario as $cu) @if ($cu->id_equipo == $item->id_equipo &&
                    $producto->id_producto == $cu->id_producto)
                    disabled
                    @endif
                    @endforeach
                    class="form-control" value="{{$item->id_equipo}}">{{$item->nombre_equipo}}</option>
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

{{-- Listado de Equipos --}}
@foreach ($t_equipos as $mo)
@foreach ($t_costo_unitario as $item)
@if ($mo->id_equipo == $item->id_equipo && $producto->id_producto == $item->id_producto)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #f58634;">
    <form action="{{route('CostoEquipo',$mo->id_equipo)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" hidden name="id_producto" value="{{$producto->id_producto}}">
        <div class="m-2 d-flex row align-items-center">
            <div class="col-sm-12 mt-1 mb-1 border-bottom">
                <h5><i class="fa fa-cogs mr-1 text-dark"></i> {{$mo->nombre_equipo}}</h5>
            </div>

            <div class="col-sm-6 mt-1 mb-1">
                <label for="">Tiempo de uso del equipo</label>
                <input type="number" class="form-control" value="{{$mo->tiempo_minutos}}" name="tiempo_minutos">
            </div>

            <div class="col-sm-6 mt-1">
                <label for="">Costo por minuto</label>
                <input type="text" class="form-control" readonly value="{{$mo->depreciacion_minuto}}">
            </div>

            <div class="col-sm-6 mt-1">
                <label for="">Costo</label>
                <input type="text" class="form-control" readonly value="{{$mo->costo}}">
            </div>
                <!-- Modal -->
                <div class="modal micromodal-slide" id="modal-3{{$item->id_equipo}}" aria-hidden="true">
                    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                            <header class="modal__header">
                                <div class="">
                                    <div class="">
                                        <p class="h4 font-weight-bold mb-2 text-primary" id="">
                                            <i class="fa fa-edit mr-2 "></i>Actualizar
                                        </p>
                                    </div>
                                </div>
                                <div class="">
                                    <button class="modal__close shadow-sm" aria-label="Close modal"
                                        data-micromodal-close></button>
                                </div>
                            </header>
                            <main class="modal__content" id="modal-1-content">
                                <h6 class="col-12 mt-3">Si usted da aceptar, los cambios se van a aplicar</h6>
                            </main>
                            <footer class="modal__footer">
                                <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
                                    Aceptar
                                </button>
                                <button class="modal__btn col-3" data-micromodal-close
                                    aria-label="Close this dialog window ">Cerrar</button>
                            </footer>
    
                        </div>
                    </div>
                </div>
    </form>
    <div class="col-sm-3 mt-3 d-flex align-items-center">
        <a data-micromodal-trigger="modal-3{{$item->id_equipo}}"
            class=" Actualizar text-primary bg-white btn btn-block"><i class="fa fa-edit mr-1"></i> Editar</a>
    </div>

    <div class="col-sm-3 mt-3 d-flex align-items-center">
        <a data-micromodal-trigger="modal-2{{$item->id_equipo}}" class="text-danger bg-white btn btn-block"><i
                class="fa fa-trash mr-1"></i> Eliminar</a>
    </div>

    <form action="{{route('EEquipo',$item->id_costo_unitario)}}" method="POST">
        {{ csrf_field() }}
        @method('PUT')
        <input hidden type="" name="id_mano_de_obra" value="">
        <!-- Modal -->
        <div class="modal micromodal-slide" id="modal-2{{$item->id_equipo}}" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                    <header class="modal__header">
                        <div class="">
                            <div class="">
                                <p class="h4 font-weight-bold mb-2 text-danger" id="">
                                    <i class="fa fa-trash mr-2 "></i>Eliminar
                                </p>
                            </div>
                        </div>
                        <div class="">
                            <button class="modal__close shadow-sm" aria-label="Close modal"
                                data-micromodal-close></button>
                        </div>
                    </header>
                    <main class="modal__content" id="modal-1-content">
                        <h6 class="col-12 mt-3">Si usted da aceptar, los cambios se van a aplicar</h6>
                    </main>
                    <footer class="modal__footer">
                        <button type="submit" class="col-3 modal__btn modal__btn-primary col-3 mr-1">
                            Aceptar
                        </button>
                        <button class="modal__btn col-3" data-micromodal-close
                            aria-label="Close this dialog window ">Cerrar</button>
                    </footer>

                </div>
            </div>
        </div>
    
    </form>
</div>


</div>
@endif
@endforeach
@endforeach

{{-- CIF --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #464f41;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="font-weight-bold m-0">Costos indirectos de fabricacion (CIF)</h5>
        </div>
        <div class="col-sm-6 col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="font-weight-bold m-0">Total</h5>
                </div>
                <div class="col-sm-6">
                    @php
                    $sumaCIF = 0.00;
                    foreach($t_valores as $item){
                    $sumaCIF = $sumaCIF + $item->total;
                    }
                    @endphp
                    <input readonly class="form-control" type="text" value="{{$sumaCIF}}">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Viaticos --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #5f939a;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="font-weight-bold m-0">Viaticos</h5>
        </div>
        <div class="col-sm-6 col-12 mt-1 mb-1">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="font-weight-bold m-0">Total</h5>
                </div>
                <div class="col-sm-6">
                    @php
                    $sumaVI = 0.00;
                    foreach($t_viaticos as $item){
                    $sumaVI = $sumaVI + $item->total_km;
                    }
                    @endphp
                    <input readonly class="form-control" type="text" value="{{$sumaVI}}">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Costo total --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #1e6f5c;">
    <div class="m-2 d-flex row align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
            <h5 class="m-0 font-weight-bold">Costo total</h5>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="font-weight-bold m-0">Total</h5>
                </div>
                <div class="col-sm-6">
                    @foreach ($t_totales as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    <input readonly class="form-control" type="text" value="{{$item->total}}">
                    @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Cantidad por fabricar --}}
<div class="borde-lineal shadow m-2 card-body bg-white" style="border-radius: 0.5rem;border-left: 8px solid #006d36;">
    <form action="{{route('AgregarCantidad', $producto->id_producto)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="m-2 d-flex row align-items-center">
            <div class="col-sm-12 mt-1 mb-1 border-bottom">
                <h5 class="font-weight-bold">Costo Unitario Total</h5>
            </div>
            <div class="col-sm-12 mt-1">
                <label for="">Cantidad a producir</label>
            </div>

            <div class="col-sm-6 mt-1 mb-1">
                <input type="number" name="cantidad" class="form-control">
            </div>
            <div class="col-sm-6 mt-1 mb-1">
                <button type="submit" class="btn btn-block btn-dark">Aceptar</button>
            </div>
        </div>
    </form>



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

    var button = document.querySelector('.Actualizar');
    button.addEventListener('click', function () {
        MicroModal.show('modal-4');
    });
</script>

@stop