<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Sistema Grato Pastas Artesanales</title>
    @extends('enlaces')
</head>

<body class="drawer drawer--left drawer--sidebar" style="background-color:#E6E6E6 ;">
    <header role="banner">
        <button type="button" style="opacity: 0.8;"
            class="drawer-toggle drawer-hamburger rounded-circle shadow-sm bg-white ml-3 mt-3">
            <span class="sr-only">toggle navigation</span>
            <span class="drawer-hamburger-icon"></span>
        </button>
        <nav class="drawer-nav " role="navigation" style="background-color:#343838;">
            <ul class="drawer-menu ">
                <li class="card bg-white border-0 rounded-0"></li>
                <div class=" mt-3 mb-0 mr-3">
                    <li><img src="../media/Logo-negativo.png" class="img-fluid" alt=""></li>
                </div>
                <div class="ml-4" style="padding-top: 2.5rem;">

                    <li><a class="drawer-menu-item text-white btn  btn-outline-gray m-1" href="Principal.html"><i
                                class="fa fa-home mr-2 "></i>Menú Principal</a></li>
                    <li><a class="drawer-menu-item text-white  btn bg-gray m-1" href="Perfil.html"><i
                                class="fa fa-user mr-2"></i>Mi perfil</a></li>

                    <li style="border-top: 1px solid #707070;margin-left: -100%;background: #707070;" class="mt-1 mb-1">
                    </li>

                    <li><a class="drawer-menu-item text-white  btn-outline-gray btn m-1" href="ManoObra.html"><i
                                class="fa fa-users mr-2"></i>Mano de obra</a></li>
                    <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="Equipo.html"><i
                                class="fa fa-cogs mr-2"></i>Equipo</a></li>
                    <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="CIF.html"><i
                                class="fas fa-coins mr-2"></i>Costos Indirectos (CIF)</a></li>
                    <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="Viaticos.html"><i
                                class="fa fa-suitcase mr-2"></i>Viaticos</a></li>
                    <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="MateriaPrima.html"><i
                                class="fa fa-clipboard mr-2"></i>Materia Prima</a></li>
                    <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="Recetario.html"><i
                                class="fa fa-utensil-spoon mr-2"></i>Recetario</a></li>
                    <li style="border-top: 1px solid #707070;margin-left: -100%;background: #707070;" class="mt-1 mb-1">
                    </li>

                    <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="Pedidos.html"><i
                                class="fa fa-pencil-alt mr-2"></i>Pedidos</a></li>
                    <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="Reportes.html"><i
                                class="fa fa-copy mr-2"></i>Reportes</a></li>
                    <li><a class="drawer-menu-item text-white btn btn-danger m-1 mb-5" href="Acceso.html"><i
                                class="fa fa-sign-out-alt mr-2 "></i>Cerrar Sesion</a></li>


                </div>
            </ul>
        </nav>
    </header>

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
                        <div class="col-sm-auto row rounded mt-2 d-flex align-items-center">
                            <div class="p-3 font-weight-bold col-6">
                                Nombre del operario(a)
                            </div>
                            <div class="col-6">

                                <input type="text" class="form-control" value="Graciela Ortega Vega">

                            </div>

                        </div>

                        <div class="col-sm-auto row rounded  mt-2 d-flex align-items-center">
                            <div class="p-3 font-weight-bold col-6 ">
                                Puesto
                            </div>
                            <div class="col-6 ">
                                <div class="form-group m-0">
                                    <select id="inputState" class="form-control">
                                        <option selected>Administrador(a)</option>
                                        <option>Asistente</option>
                                        <option>Mensajero(a)</option>
                                        <option>Cocinero(a)</option>
                                        <option>Otro</option>


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-auto row rounded  mt-2 d-flex align-items-center">
                            <div class="p-3 font-weight-bold col-6">
                                Nombre de usuario
                            </div>
                            <div class=" col-6 ">
                                <div class="form-group m-0">
                                    <input type="text" class="form-control" id="" value="gratocr">
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

                <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                    <h6 class="mt-3 text-gray ">Creación de asistentes</h6>
                    <div class="">
                        <div class="col-sm-auto row mt-2 d-flex align-items-center">
                            <div></div>
                            <div class="font-weight-bold col-6 ">
                                Nombre de usuario

                            </div>
                            <div class="col-sm-6">
                                <div class="">
                                    <input type="text" id="inputPassword5" class="form-control"
                                        aria-describedby="passwordHelpBlock">

                                </div>
                            </div>
                            <div class="font-weight-bold col-6">
                                Contraseña
                            </div>
                            <div class="col-sm-6 mt-3">
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
                            <a href="#" class="Pass-Modal col-sm-12 btn btn-dark rounded mt-2">Añadir asistente</a>
                            <a href="#" class="Pass-Modal col-sm-12 btn btn-outline-gray rounded mt-2">Ver asistentes</a>

                        </div>
                    </div>
                </div>

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