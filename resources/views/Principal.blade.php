@extends('plantilla')

@section('titulo', 'Página principal')

@section('contenido')
@parent

<div class="row card-body m-2 shadow bg-white p-0 bordes">
  <div class="col-2 border-0 m-0 bg-danger p-2 d-flex justify-content-center align-items-center m-0 borde-derecha">
    <i class="fa-2x fa fa-chart-line text-white"></i>
  </div>
  <div class="col-9 p-3">
    <h4 class="font-weight-bold text-oscuro m-0">Menú Principal</h4>
  </div>
</div>

<div class="row m-1 d-flex justify-content-center align-items-center">

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 m-0 bg-primary p-2 d-flex justify-content-center align-items-center m-0 borde-derecha">
      <i class="fa-2x fa fa-chart-bar text-white"></i>
    </div>
    <div class="p-2 col-7 p-7 d-flex justify-content-center align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">Cantidad total de ventas</h6>
    </div>
    <div class="col-3 d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">4</h6>
    </div>
  </div>

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 m-0 bg-success p-2 d-flex justify-content-center align-items-center m-0 borde-derecha">
      <i class="fa-2x fa fa-users text-white"></i>
    </div>
    <div class="p-2 col-7 p-7 d-flex justify-content-center align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">Cantidad de operarios</h6>
    </div>
    <div class="col-3 d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">4</h6>
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
  <div class="row d-flex justify-content-center align-items-center m-1 card-body shadow bg-white"
    style="border-radius: 0.5rem;">
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