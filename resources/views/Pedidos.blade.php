<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mano de Obra</title>
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
                  <h4 class="font-weight-bold m-0">Seleccione el producto a realizar</h4>
                </div>
                <div class="col-sm-6 mt-1 mb-1">
                  <select name="id_producto" class="form-control m-0" id="">
                  @foreach ($t_producto as $item)
                    <option value="">{{$item->nombre_producto}}</option>
                  @endforeach
                </select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-sm-12 mt-1 mb-1">
                  <h4 class="font-weight-bold m-0 ">Materia prima</h4>
                  <h5 class="text-gray m-0 mt-1">Recursos necesarios para crear el producto</h5>
                </div>
                <div class="col-sm-12 mt-2 mb-1">
                  <button class=" btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Ver lista de recursos
                  </button>
                  <div class="collapse mt-2" id="collapseExample">
                    <div class="row d-flex align-items-center">

                      <div class="col-sm-4 mb-2">
                        <div class="">
                          <h6 class="card-title font-weight-bold mt-2">Recurso</h6>
                          <input name="" class="form-control" readonly type="text" value="Espinaca">
                        </div>
                      </div>
                      <div class="col-sm-4 mb-2">
                        <div class="">
                          <h6 class="card-title font-weight-bold mt-2">Presentacion</h6>
                          <input name="" class="form-control" type="text" readonly value="Gramos">
                        </div>
                      </div>
                      <div class="col-sm-4 mb-2">
                        <div class="">
                          <h6 class="card-title font-weight-bold mt-2">Cantidad</h6>
                          <input name="" class="form-control" type="text" value="500">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-sm-6 mt-1 mb-1">
                  <h4 class="font-weight-bold m-0">Mano de obra</h4>
                </div>
                <div class="col-sm-6 mt-1 mb-1">
                  <button class="btn btn-block btn-outline-dark">Insertar colaborador</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-sm-6 mt-1 mb-1">
                  <h4 class="font-weight-bold m-0">Equipo</h4>
                </div>
                <div class="col-sm-6 mt-1 mb-1">
                  <button class="btn btn-block btn-outline-dark">Insertar equipo</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
          <div class="">
            <div class="container">
              <div class="row d-flex align-items-center">
                <div class="col-sm-6 mt-1 mb-1">
                  <h4 class="font-weight-bold m-0">Costo total</h4>
                </div>
                <div class="col-sm-6 mt-1 mb-1">
                  <button class="btn btn-block btn-outline-dark">Insertar equipo</button>
                </div>
              </div>
            </div>
          </div>
        </div>

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
</body>

</html>