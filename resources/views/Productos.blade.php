<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    {{-- Micromodal / Jquery / Bootstrap.JS / iScroll / drawer--}}
    <script src="/Grato/resources/js/jquery.js"></script>
    <script src="/Grato/resources/js/micromodal.js"></script>
    <script src="/Grato/resources/js/ajax.js"></script>
    <script src="/Grato/resources/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
    {{-- Fuente de iconos --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <!-- Libreria Menú -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal.css') }}" rel="stylesheet">

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
                    <div class="">
                        <div class="container">
                            <div class="row d-flex align-items-center">
                                <div class="col-sm-6 mt-1 mb-1">
                                    <h4 class="font-weight-bold m-0">Elaboracion de productos</h4>
                                </div>
                                <div class="col-sm-6 mt-1 mb-1">
                                    <button class="Producto btn btn-dark btn-block">Ingresar nuevo producto</button>
                                </div>
                                <div class="modal micromodal-slide" id="modal-5" aria-hidden="true">
                                    <div class="modal__overlay" tabindex="-1" data-micromodal-close>
                                        <div class="modal__container" role="dialog" aria-modal="true"
                                            aria-labelledby="modal-1-title">
                                            <header class="modal__header">
                                                <div class="">
                                                    <div class="">
                                                        <p class="h4 font-weight-bold mb-2" id="">
                                                            Ingreso de producto
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <button class="modal__close shadow-sm" aria-label="Close modal"
                                                        data-micromodal-close></button>
                                                </div>
                                            </header>
                                            <main class="modal__content" id="modal-1-content">
                                                <form class="form-group" method="POST" action="{{route('AgregarProducto')}}">
                                                    @csrf
                                                    <div class="m-1">
                                                        <label for="">1.Nombre del pruducto</label>
                                                        <input type="text" name="nombre_producto" class="form-control" value="">
                                                    </div>
                                                    {{-- <div class="m-1">
                                                        <label for="">2.Descripcion del producto</label>
                                                        <input type="text" name="nombre_trabajador" class="form-control"
                                                            id="nombre_trabajador" value="">
                                                    </div> --}}
                                                    <button type="submit" class="modal__btn modal__btn-primary col-12">Aceptar</button>
                                                    <button class="modal__btn col-12 mt-2 mb-0" data-micromodal-close
                                                        aria-label="Close this dialog window">Cerrar</button>
                                                </form>
                                            </main>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach ($t_producto as $item)
                <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
                    <div class="">
                        <div class="container">
                            <div class="row d-flex align-items-center">
                                <div class="col-sm-6 mt-1 mb-1">
                                    <h5 class="font-weight-bold m-0 ">Nombre del producto</h5>
                                    <h5 class="text-gray m-0 mt-1"></h5>
                                </div>
                                <div class="col-sm-6 mt-2 mb-1">
                                    <input class="form-control" type="text" name="" id=""
                                        value="{{$item->nombre_producto}}">
                                </div>

                                <div class="col-sm-12 m-0 mt-2 mb-1">
                                    <p class="m-0" style="">Pasta ligera para su venta en las ferias del
                                        agricultor</p>
                                </div>
                                <div class="col-sm-6 m-0 mt-2 mb-1 row d-flex align-items-center">
                                    <button class="btn bg-white btn-block">Actualizar</button>
                                </div>
                                <div class="col-sm-6 m-0 mt-2 mb-1 row d-flex align-items-center">
                                    <button class="btn bg-white btn-block text-danger">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

            {{-- <div class="col-md-4">
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
      </div> --}}

            {{-- <div class="col-md-12 mt-2">
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body text-center">
            Grato Pastas Artesanales 2021
          </div>
        </div>
      </div> --}}
        </div>

    </main>
    <script>
        MicroModal.init();
        var button = document.querySelector('.Producto');
        button.addEventListener('click', function () {
            MicroModal.show('modal-5');
        });
    </script>
</body>

</html>