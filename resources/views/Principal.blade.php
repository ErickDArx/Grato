@extends('plantilla')

@section('titulo', 'Página principal')

@section('contenido')
@parent

<div class="card-body m-2 shadow bg-white" style="border-radius: 0.5rem;">
  <h4 class="font-weight-bold text-oscuro m-0"><i class="fa fa-chart-line mr-2"></i>Menú Principal</h4>
</div>
<div class="row m-1">
  <div class="row d-flex justify-content-center align-items-center m-1 card-body shadow bg-white"
    style="border-radius: 0.5rem;">
    <div class="col-10 p-0">
      <h6 class="text-oscuro m-0"><i class="fa fa-chart-pie mr-2"></i>Cantidad de materia prima</h6>
    </div>
    <div class="col-2 p-0 text-center">
      <h6 class="m-0">6</h6>
    </div>

  </div>
  <div class="row d-flex justify-content-center align-items-center m-1 card-body shadow bg-white"
    style="border-radius: 0.5rem;">
    <div class="col-10 p-0">
      <h6 class="font-weight-bold text-oscuro m-0"><i class="fa fa-user-cog mr-2"></i>Cantidad de operarios</h6>
    </div>
    <div class="col-2 p-0 text-center">
      <h6 class="m-0">6</h6>
    </div>
  </div>
  <div class="row d-flex justify-content-center align-items-center m-1 card-body shadow bg-white"
    style="border-radius: 0.5rem;">
    <div class="col-10 p-0">
      <h6 class="font-weight-bold text-oscuro m-0"><i class="fa fa-shopping-cart mr-2"></i>Encargos de abril</h6>
    </div>
    <div class="col-2 p-0 text-center">
      <h6 class="m-0">6</h6>
    </div>
  </div>
  <div class="row d-flex justify-content-center align-items-center m-1 card-body shadow bg-white" style="border-radius: 0.5rem;">
    <div class="col-10 p-0">
    <h6 class="font-weight-bold text-oscuro m-0"><i class="fa fa-thumbs-up mr-2"></i>Producto mas destacado</h6>
    </div>
    <div class="col-2 p-0 text-center">
      <h6 class="m-0">6</h6>
    </div>

  </div>
</div>

<div class="card-body m-2 shadow bg-white" style="border-radius: 0.5rem;">

  <h6 class="text-gray">Gráfico de pedidos hechas según el mes</h5>

    <div class="ct-chart ct-golden-section">

      <script>
        new Chartist.Line('.ct-chart', {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    series: [
                      []
                    ]
                  }, );

      </script>

    </div>

</div>

@stop