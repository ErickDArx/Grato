@extends('plantilla')

@section('titulo','Reportes')

@section('contenido')
@parent
<div class="card shadow" style="border-radius: 0.5rem;">
  <div class="card-body">
    <div class="container">
      <div class="row">
        <h4 class="col-sm-9">Reportes</h4>
        <div class="justify-content-end row">
          <a href="{{route('Reportes.pdf')}}" class="col-sm-12 btn btn-dark">Ingresar Pedido</a>
        </div>
      </div>
      <h6>Listado de pedidos</h6>
    </div>
  </div>
</div>
@stop