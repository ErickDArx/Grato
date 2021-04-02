@extends('plantilla')

@section('titulo', 'Asistentes')

@section('contenido')
    @parent
    <div class="card-body bg-white m-2 shadow" style="border-radius: 0.5rem;">
        <h4 class="font-weight-normal">Asistentes</h4>
        <h6 class="text-gray">Desglose del personal autorizado en el sistema</h6>
        <div class="">
        </div>
    </div>
@stop

@section('contenido-3')
    @parent
    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex justify-content-center m-1 row align-items-center">
            <div class="col-12">
                <h5 class="mt-3 font-weight-bold">Creación de asistentes</h5>
            </div>
            {{-- Creacion de asistentes --}}
            <form method="POST" action="{{ route('store') }}">
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
                            <div class="col-sm-6 mt-3">
                                <div class="">
                                    <input name="password" type="password" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-block btn-dark mt-2">Agregar asistente</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@foreach ($t_usuario as $item)
    @if ($item->rol == 0)
        @section('contenido-4')
            @parent
            <div class="mt-3 mb-3 card-body bg-white m-2 shadow" style="border-radius: 0.5rem;">
                <div class="row">
                    <div class=" d-flex align-items-center col-sm-6">
                        <h5 class="m-0 font-weight-normal">{{ $item->nombre_usuario }} {{ $item->apellido_usuario }}
                        </h5>
                    </div>
                    <div class="col-sm-3">
                        {{-- <button class="border-dark btn btn-block btn-outline-gray">Editar</button> --}}
                    </div>
                    <div class="col-sm-3">
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
