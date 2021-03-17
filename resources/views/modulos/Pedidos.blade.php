@extends('plantilla')

@section('titulo', 'Costo Unitario')

@section('contenido')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
          <h4 class="font-weight-bold m-0">Seleccione el producto a realizar</h4>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
          <select name="id_producto" class="form-control m-0" id="">
            @foreach ($t_producto as $item)
            <option value="">{{$item->nombre_producto}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('contenido-2')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-12 mt-1 mb-1">
          <h4 class="font-weight-bold m-0 ">Materia prima</h4>
          <h5 class="text-gray m-0 mt-1">Recursos necesarios para crear el producto</h5>
        </div>
        <div class="col-sm-12 mt-2 mb-1">
          <button class=" btn border-dark btn-outline-dark btn-block" type="button" data-toggle="collapse"
            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Ver lista de recursos
          </button>
          <div class="collapse mt-2" id="collapseExample">
            <div class="row d-flex align-items-center">

              <div class="col-sm-4 mb-2">
                <div class="">
                  <h6 class="card-title font-weight-bold mt-2">Recurso</h6>
                  <input name="" class="form-control" readonly type="text" value="Espinaca">
                </div>
              </div>
              <div class="col-sm-4 mb-2">
                <div class="">
                  <h6 class="card-title font-weight-bold mt-2">Presentacion</h6>
                  <input name="" class="form-control" type="text" readonly value="Gramos">
                </div>
              </div>
              <div class="col-sm-4 mb-2">
                <div class="">
                  <h6 class="card-title font-weight-bold mt-2">Cantidad</h6>
                  <input name="" class="form-control" type="text" value="500">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@stop

@section('contenido-3')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
          <h4 class="font-weight-bold m-0">Mano de obra</h4>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
          <button class="btn btn-block btn-outline-dark">Insertar colaborador</button>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('contenido-4')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
          <h4 class="font-weight-bold m-0">Equipo</h4>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
          <button class="btn btn-block btn-outline-dark">Insertar equipo</button>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('contenido-5')
@parent
<div class="shadow m-2 card-body bg-white" style="border-radius: 0.5rem;">
  <div class="">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-sm-6 mt-1 mb-1">
          <h4 class="font-weight-bold m-0">Costo total</h4>
        </div>
        <div class="col-sm-6 mt-1 mb-1">
          
        </div>
      </div>
    </div>
  </div>
</div>
@stop
