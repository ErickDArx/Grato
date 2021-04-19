@extends('plantilla')

@section('titulo','Reportes')

@section('contenido')
@parent
<div class="justify-content-end row">
    <a href="{{route('Reportes.pdf')}}" class="col-sm-12 btn btn-dark">Ingresar Pedido</a>
  </div>
@stop