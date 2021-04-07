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
            <h5 class="mt-2 font-weight-bold">Creación de asistentes</h5>
        </div>
        <div class="col-sm-6 text-center">
            <a class="btn btn-outline-dark btn-block" data-toggle="collapse" href="#asistentes" role="button"
                aria-expanded="false" aria-controls="asistentes">
                Abrir formulario
            </a>
        </div>

        {{-- Creacion de asistentes --}}
        <form class="collapse" id="asistentes" method="POST" action="{{ route('store') }}">
            @csrf
            <div>
                <div class="">
                    @if ($errors->any())
                    <div class="row alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-danger">
                            @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>

                    @endif
                    <div class="col-sm-auto row mt-2 d-flex align-items-center">
                        <div class="font-weight-bold col-6 ">
                            Nombre del operario

                        </div>
                        <div class="col-sm-6">
                            <div class="">
                                <input name="nombre_operario" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="font-weight-bold col-6 mt-1">
                            Apellido del operario

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="">
                                <input name="apellido_usuario" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="font-weight-bold col-6 mt-1">
                            Segundo Apellido (Opcional)

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="">
                                <input name="segundo_apellido_usuario" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="font-weight-bold col-6 mt-1">
                            Nombre de usuario

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="">
                                <input name="nombre_usuario" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="font-weight-bold col-6 ">
                            Correo Electronico
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="">
                                <input name="correo" type="email" class="form-control">

                            </div>
                        </div>

                        <div class="font-weight-bold col-6">
                            Contraseña
                        </div>
                        <div class="col-6 mt-3 input-group">
                            <input required type="password" id="txtPassword" class="form-control @error('password') is-invalid @enderror"
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

                    </div>
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
    </div>
</div>
@stop

@foreach ($t_usuario as $item)
@if ($item->rol == 0)
@section('contenido-4')
@parent

<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
    <div class="d-flex m-1 row align-items-center">

        <div class="col-sm-8">
            <h5 class="m-0 font-weight-normal">{{ $item->nombre_operario }} {{ $item->apellido_usuario }}</h5>
        </div>

        <div class="col-sm-4">
            <form action="{{ route('EliminarAsistente', $item->id_usuario) }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="border-dark btn btn-block btn-outline-gray">Eliminar</button>
            </form>
        </div>

    </div>
</div>
@stop
@endif
@endforeach