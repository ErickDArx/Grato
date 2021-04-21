<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de precio de venta para el producto {{$producto->nombre_producto}}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        h5 {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
    </style>
    <header>
    </header>

    <main>
        <div class="col-12 border rounded shadow">
            <div class="font-weight-bold">
                <div class="col-12">
                    <h1 class="text-dark">Reporte de precio de venta para el producto {{$producto->nombre_producto}}
                    </h1>
                </div>
            </div>
        </div>

        <h5 class="font-weight-bold mt-4">Listado de materia prima</h5>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Nombre de la materia prima</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recursos as $item)
                @if($item->id_producto == $producto->id_producto)
                <tr>
                    <td>{{$item->producto}}</td>
                    <td>{{$item->cantidad}}</td>
                    <td>{{$item->precio}}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

        <h5 class="font-weight-bold mt-4">Listado de operarios</h5>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Nombre del operario</th>
                    <th>Tiempo trabajado</th>
                    <th>Costo por minuto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($operarios as $item)
                @foreach ($costo as $cu)
                @if($cu->id_producto == $producto->id_producto && $cu->id_mano_de_obra == $item->id_mano_de_obra)
                <tr>
                    <td>{{$item->nombre_trabajador}}</td>
                    <td>{{$item->tiempo_trabajado}}</td>
                    <td>{{$item->costo_minuto}}</td>
                </tr>
                @endif
                @endforeach
                @endforeach
            </tbody>
        </table>

        <h5 class="font-weight-bold mt-4">Listado de equipo</h5>
        <table class="table table-dark rounded">
            <thead>
                <tr>
                    <th>Nombre del equipo</th>
                    <th>Tiempo de uso</th>
                    <th>Costo por minuto</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($equipos as $item)
                @foreach ($costo as $cu)
                @if($cu->id_producto == $producto->id_producto && $cu->id_equipo == $item->id_equipo)
                <tr>
                    <td>{{$item->nombre_equipo}}</td>
                    <td>{{$item->tiempo_minutos}}</td>
                    <td>{{$item->costo}}</td>
                </tr>
                @endif
                @endforeach

                @endforeach
            </tbody>
        </table>

        <h5 class="font-weight-bold mt-4 col-6">Desglose de costos asociados</h5>
        <table class="table table-dark rounded">
            <thead>
                <tr>
                    <th>Costos Indirectos de fabricación</th>
                    <th>Viáticos</th>

                </tr>
            </thead>
            @php
            $suma = 0;
            $sumaV = 0;
            @endphp
            <tbody class="">
                @foreach($cif as $item)
                @php
                $suma =$suma + $item->total;
                @endphp
                @endforeach

                @foreach ($viaticos as $item)
                @php
                $sumaV =$sumaV + $item->total_km;
                @endphp
                @endforeach
                <tr>
                    <td>{{$suma}}</td>
                    <td>{{$sumaV}}</td>
                <tr>
            </tbody>
        </table>

        <h5 class="font-weight-bold mt-4 col-6">Precio de venta</h5>
        <table class="table table-dark rounded">
            <thead>
                <tr>
                    <th>Costo total</th>
                    <th>Cantidad a producir</th>
                    <th>Costo unitario total</th>
                    <th>Margen de utilidad</th>
                    <th>Precio de venta</th>
                    <th>Ganancia por unidad</th>

                </tr>
            </thead>
            @php
            $suma = 0;
            $sumaV = 0;
            @endphp
            <tbody class="">
                <tr>
                    @foreach($totales as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    <td>{{$item->total}}</td>
                    <td>{{$item->cantidad_producir}}</td>
                    <td>{{$item->total / $item->cantidad_producir}}</td>
                    @endif
                    @endforeach
                    @foreach ($precio as $item)
                    @if ($item->id_producto == $producto->id_producto)
                    <td>{{$item->margen_utilidad}}</td>
                    <td>{{$item->precio_venta}}</td>
                    <td>{{$item->ganancia_unidad}}</td>
                    @endif

                    @endforeach
                <tr>
            </tbody>
        </table>
    </main>

    {{-- <footer class="fixed-bottom col-12 d-flex justify-content-center align-items-center">
        <h6 class="font-weight-light">www.sistema.gratocr.com</h6>
    </footer> --}}

</body>
{{-- <script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 730, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script> --}}

</html>