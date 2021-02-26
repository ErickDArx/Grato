<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Sistema Grato Pastas Artesanales</title>
    @extends('enlaces')
</head>

<body class="drawer drawer--left drawer--sidebar" style="background-color:#E6E6E6 ;">
    @extends('menu')

    <main role="main" class="drawer-contents" style="background-color:#E6E6E6 ;">
        <nav class="navbar navbar-dark bg-white nav">
            <div class="col-12 text-center">
                <img src="../media/Grupo 1.png" alt="" class="img-fluid" style="width: 6rem;">
            </div>
        </nav>
        <div class="row mr-2 ml-2 mt-3">
            <div class="col-md-8 mb-2">

                <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                    <h4 class="font-weight-normal">Perfil</h4>
                    <h6 class="text-gray">Mis datos personales</h6>
                    <div class="">
                        <div class="disabled col-sm-auto row rounded mt-2 d-flex align-items-center">
                            <div class="p-3 font-weight-bold col-6">
                                Nombre del operario(a)
                            </div>
                            <div class="col-6">



                                <fieldset>
                                    <p type="text" class="form-control" value="">

                                    </p>
                                </fieldset>

                            </div>

                        </div>

                        <div class="col-sm-auto row rounded  mt-2 d-flex align-items-center">

                            <div class="p-3 font-weight-bold col-6 ">
                                Puesto
                            </div>
                            <div class="col-6 ">
                                <div class="form-group m-0">

                                    <fieldset disabled>
                                        <p class="form-control">Administrador(a)</p>
                                    </fieldset>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto row rounded  mt-2 d-flex align-items-center">
                            <div class="p-3 font-weight-bold col-6">
                                Nombre de usuario
                            </div>
                            <div class=" col-6 ">
                                <div class="form-group m-0">
                                    <fieldset>
                                        <input type="text" class="form-control" id="" value="gratocr">

                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div>
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
                                            <button class="modal__btn modal__btn-primary col-3 mr-1">Aceptar</button>
                                            <button class="modal__btn col-3" data-micromodal-close
                                                aria-label="Close this dialog window ">Cerrar</button>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                            <a href="#" class="myButton col-sm-12 btn btn-dark rounded mt-2"
                                data-micromodal-trigger="modal-2">Editar mis datos</a>
                        </div>

                    </div>
                </div>

                <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                    <h6 class="text-gray mt-3">Mi correo electronico</h6>
                    <div class="">
                        <div class="mb-2 col-sm-auto row mt-2 d-flex align-items-center">
                            <div class="col-sm-6 font-weight-bold">
                                Correo
                            </div>
                            <div class="col-sm-6">
                                <div class="form-control m-0">
                                    gratocr@gmail.com
                                </div>
                            </div>
                        </div>

                        <a href="#" class="Correo col-sm-12 btn btn-dark rounded mt-2"
                            data-micromodal-trigger="modal-2">Actualizar mi correo</a>
                    </div>
                </div>

                <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                    <h6 class="mt-3 text-gray">Seguridad</h6>
                    <div class="">
                        <div class="col-sm-auto row mt-2 d-flex align-items-center">
                            <div class="font-weight-bold col-6">
                                Contraseña
                            </div>
                            <div class="col-sm-6">
                                <div class="">
                                    <input type="password" id="inputPassword5" class="form-control"
                                        aria-describedby="passwordHelpBlock">
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
                </div>
                <form method="POST" action="{{ route('store') }}">
                    @csrf

                    <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                        <h6 class="mt-3 text-gray ">Creación de asistentes</h6>
                        <div class="">
                            <div class="col-sm-auto row mt-2 d-flex align-items-center">
                                <div class="font-weight-bold col-6 ">
                                    Nombre del operario

                                </div>
                                <div class="col-sm-6">
                                    <div class="">
                                        <input name="nombre_usuario" id="nombre_usuario" type="text" class="form-control">
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
                                        <input name="contrasena" id="contraseña" type="password" class="form-control">

                                    </div>
                                </div>
                                <div class="font-weight-bold col-6">
                                    Confirmar contraseña
                                </div>
                                <div class="col-sm-6 mt-3">
                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control"
                                            aria-describedby="passwordHelpBlock">

                                    </div>
                                </div>

                            </div>
                            <div>
                                <button type="submit" class="Pass-Modal col-sm-12 btn btn-dark rounded mt-2">
                                    {{ __('Añadir asistente') }}
                                </button>
                                <a href="{{'Asistentes'}}"
                                    class="Pass-Modal col-sm-12 btn btn-outline-gray rounded mt-2">Ver
                                    asistentes</a>

                            </div>
                        </div>
                    </div>
                </form>


            </div>

            <div class="col-md-4">
                <div class="card shadow" style="border-radius: 0.5rem;">
                    <div class="card-body text-center">
                        <h4>12:45 p.m.</h4>
                        <p class="text-gray">Lunes 1 de Febrero del 2021</p>

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
                                    <p class="m-0 col-8 text-left"><i class="fa fa-eye mr-2"></i>Ver los pedidos hechos
                                    </p>
                                    <p class="m-0 col-4 text-right text-danger material-icons">
                                        navigate_next
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class=" mt-2">
                            <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="MateriaPrima.html">
                                <div class="row">
                                    <p class="m-0 col-8 text-left"><i class="fa fa-clipboard-list mr-2"></i>Ingresar
                                        materia
                                        prima</p>
                                    <p class="m-0 col-4 text-right text-danger material-icons">
                                        navigate_next
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class=" mt-2">
                            <a class="shadow-sm btn btn-block btn-outline-dark border-0" href="Equipo.html">
                                <div class="row ">
                                    <p class="m-0 col-8 text-left"><i class="fa fa-cog mr-2"></i>Ingresar nuevo equipo
                                    </p>
                                    <p class="m-0 col-4 text-right text-danger material-icons">
                                        navigate_next
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-2">
                <div class="card shadow" style="border-radius: 0.5rem;">
                    <div class="card-body text-center">
                        Grato Pastas Artesanales 2021
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

        var button = document.querySelector('.myButton');
        button.addEventListener('click', function () {
            MicroModal.show('modal-1');
        });

        var button = document.querySelector('.Correo');
        button.addEventListener('click', function () {
            MicroModal.show('modal-1');
        });

        var button = document.querySelector('.Asistente');
        button.addEventListener('click', function () {
            MicroModal.show('modal-1');
        });

        var button = document.querySelector('.Pass-Modal');
        button.addEventListener('click', function () {
            MicroModal.show('modal-1');
        });
    </script>

</body>

</html>