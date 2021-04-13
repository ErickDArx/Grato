@extends('plantilla')

@section('titulo', 'Asistentes')

@section('contenido')
@parent

@stop

@section('contenido-3')
@parent

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex justify-content-center m-1 row align-items-center">
        <div class="col-sm-6">
            <h5 class="mt-2 font-weight-bold"><i class="fa fa-users mr-2 "></i>Creación de asistentes</h5>
        </div>
        <div class="col-sm-6 text-center">

        </div>

        {{-- Creacion de asistentes --}}
        <form class="" id="asistentes" method="POST" action="{{ route('store') }}">
            @csrf
            <div class=" row m-2 d-flex align-items-center">

                <div class="font-weight-bold col-sm-6 mb-2">
                    Nombre del operario
                </div>
                <div class="col-sm-6 mb-2">
                    <div class="">
                        <input name="nombre_operario" type="text" class="form-control">
                    </div>
                </div>
                @error('nombre_operario')
                <div class="col-sm-12 fade show" role="alert">
                    <div class="text-danger">
                        <span>{{  $errors->first('nombre_operario')}}</span>
                    </div>
                </div>
                @enderror

                <div class="font-weight-bold col-sm-6 mb-2">
                    Apellido del operario
                </div>
                <div class="col-sm-6 mb-2">
                    <div class="">
                        <input name="apellido_usuario" type="text" class="form-control">
                    </div>
                </div>
                @error('apellido_usuario')
                <div class="col-sm-12 fade show" role="alert">
                    <div class="text-danger">
                        <span>{{  $errors->first('apellido_usuario')}}</span>
                    </div>
                </div>
                @enderror
                <div class="font-weight-bold col-sm-6 mt-1">
                    Segundo Apellido
                </div>
                <div class="col-sm-6 mb-2">
                    <div class="">
                        <input name="segundo_apellido_usuario" type="text" class="form-control">
                    </div>
                </div>
                @error('segundo_apellido_usuario')
                <div class="col-sm-12 fade show" role="alert">
                    <div class="text-danger">
                        <span>{{  $errors->first('segundo_apellido_usuario')}}</span>
                    </div>
                </div>
                @enderror
                <div class="font-weight-bold col-sm-6 mb-2">
                    Nombre de usuario

                </div>
                <div class="col-sm-6 mb-2">
                    <div class="">
                        <input name="nombre_usuario" type="text" class="form-control">
                    </div>
                </div>
                @error('nombre_usuario')
                <div class="col-sm-12 fade show" role="alert">
                    <div class="text-danger">
                        <span>{{  $errors->first('nombre_usuario')}}</span>
                    </div>
                </div>
                @enderror
                <div class="font-weight-bold col-sm-6 mb-2">
                    Correo Electronico
                </div>
                <div class="col-sm-6 mb-2">
                    <div class="">
                        <input name="correo" type="email" class="form-control">

                    </div>
                </div>

                <div class="font-weight-bold col-sm-6 mb-2">
                    Contraseña
                </div>
                <div class="col-sm-6 mb-2 input-group">
                    <input type="password" id="txtPassword" class="form-control @error('password') is-invalid @enderror"
                        name="password" id="password" autocomplete="current-password">

                    <div class="input-group-append">
                        <button id="show_password" class="btn btn-dark" type="button" onclick="mostrarPassword()"> <span
                                class="fa fa-eye-slash icon"></span> </button>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>El campo: Contraseña no puede quedar vacio</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-block btn-dark mt-2">Agregar asistente</button>
                </div>
            </div>

        </form>
    </div>
</div>

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex m-1 row align-items-center">
        <div class="col-sm-6">
            <h5 class="mt-2 font-weight-bold">Lista de asistentes</h5>
        </div>
        <div class="col-sm-6">
            <form action="{{route('Asistentes')}}" method="GET" class="">
                @csrf
                <div class="input-group">
                    <input name="busqueda" type="text" value="" class="rounded form-control">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-dark"><span class="fa fa-search icon"></span></button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@stop


@section('contenido-4')
@parent
@foreach ($t_usuario as $item)
@if ($item->rol == 0)
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex m-1 row align-items-center">

        <div class="col-sm-6">
            <h5 class="m-0 font-weight-normal">{{ $item->nombre_operario }} {{ $item->apellido_usuario }}</h5>
        </div>

        <div class="col-sm-6 text-danger d-flex justify-content-center">
            <form action="{{ route('EliminarAsistente', $item->id_usuario) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="bg-white btn btn-block border-0 text-danger">
                    <i class="fa fa-trash mr-2 "></i>Borrar
                </button>
            </form>
        </div>

    </div>
</div>
@endif
@endforeach
<div class="m-2 d-flex justify-content-center text-dark">
    {{ $t_usuario->render() }}
</div>
<script>
    function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}
</script>
@stop