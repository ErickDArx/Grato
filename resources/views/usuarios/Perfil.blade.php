{{-- Se llama a la plantilla creada --}}
@extends('plantilla')
{{-- Se llama a la variable titulo para otorgarle un valor --}}
@section('titulo', 'Pefil')
    {{-- Iniciamos agregando contenido dentro de la plantilla --}}
@section('contenido')
    @parent
    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="d-flex justify-content-center m-1 row align-items-center">
            <div class="col-12">
                <h4 class="font-weight-bold"><i class="fa fa-user mr-2 "></i>Perfil</h4>
                <h6 class="text-gray">Mis datos personales</h6>
            </div>
            <div class="">
                <form action="{{ route('actualizar', auth()->user()->id_usuario) }}" method="post">
                    @csrf
                    @method('PUT')
                    @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      {{Session::get('message')}}
                    </div>
                    @endif
                    <div class="row rounded mt-2 m-0 d-flex align-items-center">
                        <div class="p-3 font-weight-bold col-6">
                            Nombre del operario(a)
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="nombre_operario"
                                value="{{ auth()->user()->nombre_operario }}" />
                        </div>
                        @error('nombre_operario')
                        <div class="col-12 fade show" role="alert">
                            <div class="text-danger">
                                <span>{{  $errors->first('nombre_operario')}}</span>
                            </div>
                        </div>
                        @enderror
                        
                        <div class="p-3 font-weight-bold col-6">
                            Primer apellido
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="apellido_usuario"
                                value="{{ auth()->user()->apellido_usuario }}" />
                        </div>
                        @error('apellido_usuario')
                        <div class="col-12 fade show" role="alert">
                            <div class="text-danger">
                                <span>{{  $errors->first('apellido_usuario')}}</span>
                            </div>
                        </div>
                        @enderror

                        <div class="p-3 font-weight-bold col-6">
                            Segundo apellido (opcional)
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="segundo_apellido_usuario"
                                value="{{ auth()->user()->segundo_apellido_usuario }}" />
                        </div>
                        @error('segundo_apellido_usuario')
                        <div class="col-12 fade show" role="alert">
                            <div class="text-danger">
                                <span>{{  $errors->first('segundo_apellido_usuario')}}</span>
                            </div>
                        </div>
                        @enderror
                        <div class="p-3 font-weight-bold col-6">
                            Nombre de usuario
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="nombre_usuario"
                                value="{{ auth()->user()->nombre_usuario }}" />
                        </div>
                        @error('nombre_usuario')
                        <div class="col-12 fade show" role="alert">
                            <div class="text-danger">
                                <span>{{  $errors->first('nombre_usuario')}}</span>
                            </div>
                        </div>
                        @enderror
                        <div class="p-3 font-weight-bold col-6">
                            Modo acceso
                        </div>
                        <div class="col-6">
                            <input readonly type="text" class="form-control" name="" id="nombre_usuario" @if (auth()->user()->rol == 1) value="Administrador" @endif />
                        </div>
                        <div class="col-sm-12">
                            <a class="Personal mt-2 btn btn-dark btn-block rounded text-white">
                                Editar mis datos
                            </a>
                        </div>
                    </div>

                    <div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
                        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                                <header class="modal__header">
                                    <div class="">
                                        <div class="">
                                            <p class="h4 font-weight-normal mb-2" id="modal-1-title">
                                                ¿Desea guardar estos cambios?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="modal__close shadow-sm" aria-label="Close modal"
                                            data-micromodal-close></button>
                                    </div>
                                </header>
                                <main class="modal__content" id="modal-1-content">
                                    <p>
                                        Todos lo cambios realizados seran guardados si selecciona aceptar
                                    </p>
                                </main>
                                <footer class="modal__footer">
                                    <button type="submit" class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                                    <button class="modal__btn col-3" data-micromodal-close
                                        aria-label="Close this dialog window ">Cerrar</button>
                                </footer>
                            </div>
                        </div>
                    </div>

                    <div class="row rounded mt-2 m-0 d-flex align-items-center">
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('contenido-2')
    @parent
    {{-- Correo Electronico --}}
    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
        <div class="">
            <div class="col-12">
            <h5 class="font-weight-bold"><i class="fa fa-envelope mr-2"></i>Mi correo electronico</h5>
            </div>
            <div class="">
                <form action="{{ route('actualizar_correo', auth()->user()->id_usuario) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row rounded mt-2 m-0 d-flex align-items-center">
                        <div class="col-4 font-weight-bold">
                            Correo
                        </div>
                        <div class="col-8">
                            <input name="correo" id="correo" type="text" class="form-control m-0"
                                value="{{ auth()->user()->email }}" />
                        </div>
                        <div class="col-12 mt-2">
                            <a href="#" class="Correo col-sm-12 btn btn-dark rounded mt-2"
                            data-micromodal-trigger="modal-1">Actualizar
                            mi
                            correo</a>
                        </div>
                    </div>

                    <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                        <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                                <header class="modal__header">
                                    <div class="">
                                        <div class="">
                                            <p class="h4 font-weight-normal mb-2" id="modal-1-title">
                                                ¿Desea guardar estos cambios?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="modal__close shadow-sm" aria-label="Close modal"
                                            data-micromodal-close></button>
                                    </div>
                                </header>
                                <main class="modal__content" id="modal-1-content">
                                    <p>
                                        Todos lo cambios realizados seran guardados si selecciona aceptar
                                    </p>
                                </main>
                                <footer class="modal__footer">
                                    <button type="submit" class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                                    <button class="modal__btn col-3" data-micromodal-close
                                        aria-label="Close this dialog window ">Cerrar</button>
                                </footer>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('contenido-3')
    @parent

    <script>
        MicroModal.init();

        var button = document.querySelector('.Correo');
        button.addEventListener('click', function() {
            MicroModal.show('modal-1');
        });

        var button = document.querySelector('.Personal');
        button.addEventListener('click', function() {
            MicroModal.show('modal-2');
        });

    </script>
@stop
