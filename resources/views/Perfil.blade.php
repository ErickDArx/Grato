<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Sistema Grato Pastas Artesanales</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso</title>
    {!! htmlScriptTagJsApi([
    'action' => 'homepage',
    'callback_then' => 'callbackThen',
    'callback_catch' => 'callbackCatch'
    ]) !!}
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="././css/acceso.jpg" />
    {{-- Meta-SEO --}}
    <meta name="description" content="Acceso al Sistema Informático Grato Pastas Artesanales">
    <meta name="robots" value="Noindex">
    <meta name="keywords" content="Acceso">
    <meta name="theme-color" content="#E23636">
    {{-- Fuente de iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Libreria Menú -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">

    {{-- Estilos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.css"
        integrity="sha512-V0+DPzYyLzIiMiWCg3nNdY+NyIiK9bED/T1xNBj08CaIUyK3sXRpB26OUCIzujMevxY9TRJFHQIxTwgzb0jVLg=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
    <link rel="stylesheet" href="././css/app.css">
    {{-- Javascript --}}

    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
    <!-- drawer.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lax.js"></script>
    <script>
        $(document).ready(function () {
              $('.drawer').drawer();
              $('.js-tilt').tilt({
                option: value,
                option: value,
              });
            });
    </script>
</head>

<body class="drawer drawer--left drawer--sidebar" style="background-color:#E6E6E6 ;">
    @extends('menu')

    <main role="main" class="drawer-contents" style="background-color:#E6E6E6 ;">
        <nav class="navbar navbar-dark bg-white nav">
            <div class="col-12 text-center">
                <img src="/Grato/resources/media/Logo.png" alt="" class="img-fluid" style="width: 6rem;">
            </div>
        </nav>
        <div class="row mr-2 ml-2 mt-3">
            <div class="col-md-8 mb-2">
                {{-- Datos Personales --}}
                <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                    <h4 class="font-weight-normal">Perfil</h4>
                    <h6 class="text-gray">Mis datos personales</h6>
                    <div class="">
                        <form action="{{route('actualizar',  auth()->user()->id_usuario )}}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="col-sm-auto row rounded mt-2 d-flex align-items-center">
                                <div class="p-3 font-weight-bold col-6">
                                    Nombre del operario(a)
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario"
                                        value="{{ auth()->user()->nombre_usuario }}" />
                                </div>
                                <div class="p-3 font-weight-bold col-6">
                                    Apellido
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="apellido_usuario" id="nombre_usuario"
                                        value="{{auth()->user()->apellido_usuario }}" />
                                </div>
                            </div>

                            <div class="col-sm-auto row rounded  mt-2 d-flex align-items-center">

                                <div class="p-3 font-weight-bold col-6 ">
                                    Puesto
                                </div>
                                <div class="col-6 ">
                                    <div class="form-group m-0">

                                        <input type="text" class="form-control" value="{{auth()->user()->puesto }}" />

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-auto row rounded  mt-2 d-flex align-items-center">

                            </div>
                            <div class="modal micromodal-slide" id="modal-2" aria-hidden="true">
                                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                                    <div class="modal__container" role="dialog" aria-modal="true"
                                        aria-labelledby="modal-1-title">
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
                                            <button type="submit"
                                                class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                                            <button class="modal__btn col-3" data-micromodal-close
                                                aria-label="Close this dialog window ">Cerrar</button>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                            <div>
                                {{-- <a href="{{route('editar', auth()->user()->id_usuario )}}">Actualizar</a> --}}
                                <a class="Personal col-sm-12 btn btn-dark rounded mt-2 text-white">
                                    Editar mis datos
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Correo Electronico --}}
                <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                    <h6 class="text-gray mt-3">Mi correo electronico</h6>
                    <div class="">
                        <form action="{{route('actualizar_correo', auth()->user()->id_usuario)}}" method="POST">

                            @csrf
                            @method('PUT')
                            <div class="mb-2 col-sm-auto row mt-2 d-flex align-items-center">
                                <div class="col-sm-6 font-weight-bold">
                                    Correo
                                </div>
                                <div class="col-sm-6">
                                    <input name="correo" id="correo" type="text" class="form-control m-0"
                                        value="{{auth()->user()->correo}}" />
                                </div>
                            </div>


                            <div class="modal micromodal-slide" id="modal-1" aria-hidden="true">
                                <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                                    <div class="modal__container" role="dialog" aria-modal="true"
                                        aria-labelledby="modal-1-title">
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
                                            <button type="submit"
                                                class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                                            <button class="modal__btn col-3" data-micromodal-close
                                                aria-label="Close this dialog window ">Cerrar</button>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="Correo col-sm-12 btn btn-dark rounded mt-2"
                                data-micromodal-trigger="modal-1">Actualizar mi
                                correo</a>
                    </div>
                </div>
                </form>
                {{-- Contraseña --}}
                {{-- <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                    <h6 class="mt-3 text-gray">Seguridad</h6>
                    <div class="">
                        <div class="col-sm-auto row mt-2 d-flex align-items-center">
                            <div class="font-weight-bold col-6">
                                Contraseña
                            </div>
                            <div class="col-sm-6">
                                <div class="">
                                    <input type="password" id="inputPassword5" class="form-control"
                                        aria-describedby="passwordHelpBlock" value="{{auth()->user()->password}}">
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Tu contraseña debe tener al menos 6 a 12 carateres
                </small>
            </div>
        </div>
        </div>
        <div>
            <a href="#" class="Pass-Modal col-sm-12 btn btn-dark rounded mt-2">Actualizar mi
                contraseña</a>
        </div>
        </div>
        </div> --}}
        {{-- Creacion de asistentes --}}
        <form method="POST" action="{{ route('store') }}">
            @csrf

            <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                <h6 class="mt-3 text-gray ">Creación de asistentes</h6>
                <div class="">
                    @if ($errors->any())
                    <div class="row alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="text-danger">
                            @foreach ($errors->all() as $error)
                            <span>{{$error}}</span>
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
                                <input name="nombre_usuario" id="nombre_usuario" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="font-weight-bold col-6 mt-1">
                            Apellido del operario

                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="">
                                <input name="apellido_usuario" id="apellido_usuario" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="font-weight-bold col-6 ">
                            Correo Electronico
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="">
                                <input name="correo" id="correo" type="email" class="form-control">

                            </div>
                        </div>

                        <div class="font-weight-bold col-6">
                            Contraseña
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="">
                                <input name="password" id="password" type="password" class="form-control" required>
                            </div>
                        </div>

                    </div>
                    <div>
                        <button type="submit" class="Pass-Modal col-sm-12 btn btn-dark rounded mt-2">
                            {{ __('Añadir asistente') }}
                        </button>
                        <a href="{{'Asistentes'}}" class="Pass-Modal col-sm-12 btn btn-outline-gray rounded mt-2">Ver
                            asistentes</a>

                    </div>
                </div>
            </div>
        </form>
        </div>

        {{-- Seccion--}}
        <div class="col-md-4">
            <div class="card shadow" style="border-radius: 0.5rem;">
              <div class="card-body text-center">
    
                <h4>{{date('h:i a')}}</h4>
    
                <p class="text-gray">{{date('d')}} de {{date('M')}} del {{date('Y')}}</p>
    
                <h5 class="text-center mb-3 text-oscuro">Acciones Rápidas</h5>
                <div class=" mt-2">
                  <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Pedidos.html">
                    <div class="row ">
                      <p class="m-0 col-8 text-left"><i class="fa fa-plus mr-2"></i> Alistar pedido</p>
                      <p class="m-0 col-4 text-right text-danger material-icons">
                        navigate_next
                      </p>
                    </div>
                  </a>
                </div>
                <div class=" mt-2">
                  <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Reportes.html">
                    <div class="row ">
                      <p class="m-0 col-8 text-left"><i class="fa fa-eye mr-2"></i>Ver los pedidos hechos</p>
                      <p class="m-0 col-4 text-right text-danger material-icons">
                        navigate_next
                      </p>
                    </div>
                  </a>
                </div>
                <div class=" mt-2">
                  <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="MateriaPrima.html">
                    <div class="row">
                      <p class="m-0 col-8 text-left"><i class="fa fa-clipboard-list mr-2"></i>Ingresar materia prima</p>
                      <p class="m-0 col-4 text-right text-danger material-icons">
                        navigate_next
                      </p>
                    </div>
                  </a>
                </div>
                <div class=" mt-2">
                  <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Equipo.html">
                    <div class="row ">
                      <p class="m-0 col-8 text-left"><i class="fa fa-cog mr-2"></i>Ingresar nuevo equipo</p>
                      <p class="m-0 col-4 text-right text-danger material-icons">
                        navigate_next
                      </p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
    
    
    
          <div class="col-md-12 mt-2 mb-3">
            <div class="card shadow" style="border-radius: 0.5rem;">
              <div class="card-body text-center text-oscuro">
                Copyright © {{ date('Y') }} Grato Pastas Artesanales
              </div>
            </div>
          </div>
        </div>
    </main>
    <script>
        MicroModal.init({
            onShow: modal => console.info(`${modal.id} is shown`), // [1]
            onClose: modal => console.info(`${modal.id} is hidden`), // [2]
            openTrigger: 'data-custom-open', // [3]
            closeTrigger: 'data-custom-close', // [4]
            openClass: 'is-open', // [5]
            disableScroll: true, // [6]
            disableFocus: false, // [7]
            awaitOpenAnimation: false, // [8]
            awaitCloseAnimation: false, // [9]
            debugMode: false // [10]
        });
    
        var button = document.querySelector('.Correo');
        button.addEventListener('click', function () {
            MicroModal.show('modal-1');
        });

        var button = document.querySelector('.Personal');
        button.addEventListener('click', function () {
            MicroModal.show('modal-2');
        });
    </script>
</body>

</html>