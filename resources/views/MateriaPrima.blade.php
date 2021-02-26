<!DOCTYPE html>
<html lang="es">

<head>
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
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body">


            <div class="container">
              <div class="row">
                <h4 class="col-sm-8">Materia Prima</h4>
                <div class="justify-content-end row">
                  <a href="" class="col-sm-12 btn btn-dark">Ingresar Materia Prima</a>
                </div>

              </div>
              <h6>Desglose de recursos</h6>
              <div class="card shadow-sm border-0">
                <div class="card-body">
                  <h4 class="font-weight-bold">Producto</h4>
                  <h6>Harina</h6>
                  <div class="row">
                    <div class="col-sm-6">
                      <h5 class="card-title font-weight-bold">Presentacion</h5>
                      <h6 class="card-subtitle mb-2 ">gramos</h6>
                    </div>
                    <div class="col-sm-6">
                      <h5 class="card-title font-weight-bold">Cantidad</h5>
                      <h6 class="">3</h6>
                    </div>
                    <div class="col-sm-6">
                      <h5 class="card-title font-weight-bold">Costo</h5>
                      <h6 class="">100</h6>
                    </div>
                    <div class="col-sm-6 ">
                      <h5 class="card-title font-weight-bold">Precio</h5>
                      <h6 class="">30.000</h6>
                    </div>

                  </div>

                </div>
              </div>

              <a href="" class="border-0 shadow-sm btn btn-block btn-outline-dark">Actualizar informacion</a>
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