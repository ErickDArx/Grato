@extends('plantilla')

@section('titulo', 'Página principal')
@section('Vista','Menu Principal')

@section('Ruta','Principal')

@section('Icono','fa fa-chart-line mr-2')

@section('contenido')
@parent

<div class="row m-1 d-flex justify-content-center align-items-center">

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 d-flex justify-content-center align-items-center m-0">
      <div class="p-2">
        <i class="fa-2x fa fa-chart-bar text-dark"></i>
      </div>
    </div>
    <div class="col-7  d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">Cantidad total de productos</h6>

    </div>
    <div class="col-3 d-flex align-items-center">
      {{-- <h6 class="text-oscuro m-0 font-weight-bold">{{$producto}}</h6> --}}
    </div>
  </div>

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 m-0 p-2 d-flex justify-content-center align-items-center m-0">
      <div class="">
        <i class="ml-2 fa-2x fa fa-users text-dark"></i>
      </div>
    </div>
    <div class="p-2 col-7 d-flex align-items-center">
      <h6 class="text-oscuro m-0 font-weight-bold">Cantidad de operarios</h6>
    </div>
    <div class="col-3 d-flex align-items-center">
      {{-- <h6 class="text-oscuro m-0 font-weight-bold">{{$operarios}}</h6> --}}
    </div>
  </div>

  <div class="row card-body m-2 shadow bg-white p-0 bordes">
    <div class="col-2 border-0 m-0 p-2 d-flex justify-content-center align-items-center m-0">
      <i class="p-0 fa-2x fa fa-shopping-cart text-dark"></i>
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
    <div class="col-2 border-0 m-0 p-2 d-flex justify-content-center align-items-center m-0">
      <i class="p-0 fa-2x fa fa-thumbs-up text-dark"></i>
    </div>
    <div class="col-5 d-flex align-items-center">
      <h6 class="text-oscuro m-0 p-0 font-weight-bold">Producto mas destacado</h6>
    </div>
    <div class="col-5 d-flex align-items-center text-center justify-content-center">
      <h6 class="text-oscuro m-0 font-weight-bold">Pastas Largas</h6>
    </div>
  </div>

</div>

<div class="card-body m-2 shadow bg-white" style="border-radius: 0.5rem;">
  <div class="col-12 border rounded d-flex align-items-center">
    <h6 class="text-dark"><i class="text-dark p-2 fa-2x fa fa-chart-area text-white"></i>Gráfico de pedidos del año
      {{date('Y')}}</h5>

  </div>
  {{-- <script type="text/javascript">
    const user = @json($cif);
    // alert(user[0]["total"])
    console.log(user);
  </script> --}}
  <div class="ct-chart ct-golden-section">

    <script>
      new Chartist.Line('.ct-chart', {
        
                    labels: ['Enero-Marzo','Abril-Junio', 'Julio-Septiembre', 'Octubre-Diciembre'],
                    series: [
                      [user[0]["total"]]
                    ]
                  }, );

    </script>

  </div>



</div>

@stop