
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de precio de venta para el producto </title>
</head>

<body class="">

    <div class="row">
        <div class=" bg-info font-weight-bold">
            <div class="col-12">
                <h1 class="text-dark">Reporte de precio de venta para el producto</h1>
            </div>
            <div class="col-6 bg-primary">
                <img src="{{asset('media/Logo.png')}}" alt="">
            </div>
        </div>
    </div>

    {{$producto}}

    @foreach ($recursos as $item)
    {{$item->producto}}
    @endforeach

</body>

</html>