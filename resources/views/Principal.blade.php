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
        <img src="/Grato/resources/media/Logo.png" alt="" class="img-fluid justify-content-center" style="width: 6rem;">
        <div style="right: 0;top: 1.3rem;" class="d-flex btn btn-red position-absolute shadow"><i
            class="fa fa-sign-out-alt" data-toggle="tooltip" data-placement="left" title="Tooltip on left"></i></div>
      </div>
    </nav>
    <div class="row mr-2 ml-2 mt-3">
      <div class="col-md-8 mb-2">
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body">
            <h4 class="font-weight-bold text-oscuro"><i class="fa fa-chart-line mr-2"></i>Menú Principal</h4>
            <h6 class="text-gray">Gráfico de ventas hechas según el mes</h5>
              <div class="ct-chart ct-golden-section">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/chartist/0.11.4/chartist.min.js"
                integrity="sha512-9rxMbTkN9JcgG5euudGbdIbhFZ7KGyAuVomdQDI9qXfPply9BJh0iqA7E/moLCatH2JD4xBGHwV6ezBkCpnjRQ=="
                crossorigin="anonymous"></script>
                <script>
                  new Chartist.Line('.ct-chart', {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    series: [
                      [5, -4, 3, 7, 20, 10, 3, 4, 8, -10, 6, -8]
                    ]
                  }, );
                </script>
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



      <div class="col-md-12 mt-2 mb-3">
        <div class="card shadow" style="border-radius: 0.5rem;">
          <div class="card-body text-center text-oscuro">
            Grato Pastas Artesanales 2021
          </div>
        </div>
      </div>
    </div>

  </main>

</body>

</html>