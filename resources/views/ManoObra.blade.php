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

          <li><a class="drawer-menu-item text-white btn  bg-gray m-1" href="Principal.html"><i
                class="fa fa-home mr-2 "></i>Menú Principal</a></li>
          <li><a class="drawer-menu-item text-white  btn btn-outline-gray m-1" href="Perfil.html"><i
                class="fa fa-user mr-2"></i>Mi perfil</a></li>

          <li style="border-top: 1px solid #707070;margin-left: -100%;background: #707070;" class="mt-1 mb-1"></li>

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
          <li style="border-top: 1px solid #707070;margin-left: -100%;background: #707070;" class="mt-1 mb-1"></li>

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
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body">


            <div class="container">
              <div class="row">
                <h4 class="col-sm-6">Mano de obra</h4>
                <div class="justify-content-end row">
                  <a href="" class="col-sm-12 btn btn-dark">Ingresar operario</a>
                </div>

              </div>
              <h6>Desglose de operarios</h6>
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title">Nombre del colaborador</h5>
                  <h6 class="card-subtitle mb-2 ">Graciela Ortega Vega</h6>
                  <div class="row">
                    <div class="col-sm-5 ">
                      <h5 class="card-title">Tiempo Trabajado</h5>
                      <h6 class="">180 minutos</h6>
                    </div>
                    <div class="col-sm-4">
                      <h5 class="card-title">Costo por minuto</h5>
                      <h6>₡20.56</h6>
                    </div>
                    <div class="col-sm-3">
                      <h5 class="card-title">Total</h5>
                      <h6>₡3706.70</h6>
                    </div>
                  </div>
                  <a href="" class="btn btn-block btn-outline-dark">Actualizar informacion</a>
                </div>
              </div>
              <div class="row mt-5">
                <h4 class="col-sm-6">Horas extras</h4>
                <div class="justify-content-end row">
                  <a href="" class="col-sm-12 btn btn-dark">Ingresar operario</a>
                </div>

              </div>
              <h6>Desglose de operarios</h6>
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h5 class="card-title">Nombre del colaborador</h5>
                  <h6 class="card-subtitle mb-2 ">Graciela Ortega Vega</h6>
                  <div class="row">
                    <div class="col-sm-5 ">
                      <h5 class="card-title">Tiempo Trabajado</h5>
                      <h6 class="">180 minutos</h6>
                    </div>
                    <div class="col-sm-4">
                      <h5 class="card-title">Costo por minuto</h5>
                      <h6>₡20.56</h6>
                    </div>
                    <div class="col-sm-3">
                      <h5 class="card-title">Total</h5>
                      <h6>₡3706.70</h6>
                    </div>
                  </div>
                  <a href="" class="btn btn-block btn-outline-dark">Actualizar informacion</a>
                </div>
              </div>
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

      <div class="col-md-12 mt-2">
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body text-center">
            Grato Pastas Artesanales 2021
          </div>
        </div>
      </div>
    </div>

  </main>
</body>

</html>