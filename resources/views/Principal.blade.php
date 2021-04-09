@extends('plantilla')

@section('titulo', 'Página principal')

@section('contenido')
@parent

<div class="row card-body m-2 shadow bg-white p-0 bordes">
  <div class="col-2 border-0 m-0 bg-danger p-2 d-flex justify-content-center align-items-center m-0 borde-derecha">
    <i class="fa-2x fa fa-chart-line text-white"></i>
  </div>
  <div class="col-9 p-3">
    <h1 class="h3 font-weight-bold text-oscuro m-0">Menú Principal</h1>
  </div>
</div>

<div class="row m-1 d-flex justify-content-center align-items-center">

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 bg-primary d-flex justify-content-center align-items-center m-0 borde-derecha">
      <div class="p-2">
        <i class="fa-2x fa fa-chart-bar text-white"></i>
      </div>
    </div>
    <div class="p-2 col-7  d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">Cantidad total de ventas</h6>
    </div>
    <div class="col-3 d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">4</h6>
    </div>
  </div>

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 m-0 bg-success p-2 d-flex justify-content-center align-items-center m-0 borde-derecha">
      <div class="">
      <i class="fa-2x fa fa-users text-white"></i>
      </div>
    </div>
    <div class="p-2 col-7 d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">Cantidad de operarios</h6>
    </div>
    <div class="col-3 d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">4</h6>
    </div>
  </div>

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 m-0 bg-dark p-2 d-flex justify-content-center align-items-center m-0 borde-derecha">
      <i class="p-0 fa-2x fa fa-shopping-cart text-white"></i>
    </div>
    <div class="col-7 d-flex align-items-center">
      <h6 class="text-oscuro m-0 p-0 font-weight-bold">Ventas de
        {{ \Carbon\Carbon::parse(strtotime('Y'))->formatLocalized('%B %Y') }}</h6>
    </div>
    <div class="col-3 d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">4</h6>
    </div>
  </div>

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 m-0 bg-gray p-2 d-flex justify-content-center align-items-center m-0 borde-derecha">
      <i class="p-0 fa-2x fa fa-thumbs-up text-white"></i>
    </div>
    <div class="col-5 d-flex align-items-center">
      <h6 class="text-oscuro m-0 p-0 font-weight-bold">Producto mas destacado</h6>
    </div>
    <div class="col-5 d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">Pastas Largas</h6>
    </div>
  </div>

</div>

<div class="card-body m-2 shadow bg-white" style="border-radius: 0.5rem;">
  <div class="col-12 border rounded d-flex align-items-center">
    <h6 class="text-dark"><i class="text-dark p-2 fa-2x fa fa-chart-area text-white"></i>Gráfico de pedidos del año
      {{date('Y')}}</h5>

  </div>
  <div class="ct-chart ct-golden-section">

    <script>
      new Chartist.Line('.ct-chart', {
                    labels: ['Enero-Marzo','Abril-Junio', 'Julio-Septiembre', 'Octubre-Diciembre'],
                    series: [
                      [20,44,32,29]
                    ]
                  }, );

    </script>

  </div>



</div>

@stop