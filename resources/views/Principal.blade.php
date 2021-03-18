@extends('plantilla')

@section('titulo', 'Página principal')

@section('contenido')
@parent
<div class="card-body m2 shadow bg-white" style="border-radius: 0.5rem;">
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
                      [5,6,8,14,23,9,10,10,20,15,3,14]
                    ]
                  }, );
      </script>
    </div>
</div>

@stop