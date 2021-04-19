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
      <h6 class="text-oscuro m-0 font-weight-bold">{{$producto}}</h6>
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
      <h6 class="text-oscuro m-0 font-weight-bold">{{$operarios}}</h6>
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

<div class="card-body m-2 shadow bg-white bordes">
  <div class="row m-2">
    <div class="col-12 d-flex align-items-center border-bottom">
      <h5 class="font-weight-bold"><i class="fa fa-car mr-1"></i> Kilometraje de viaticos </h5>
    </div>
    <div class="col-sm-12">
      <div class="card-body">
        <a class="btn btn-block btn-outline-dark" target="_blank" href="https://www.cgr.go.cr/02-consultas/consulta-zon-kilo-via.html">Ver Kilometraje</a>
      </div>
    </div>
  </div>

</div>

@stop