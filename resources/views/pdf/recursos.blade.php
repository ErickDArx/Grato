<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>
<body>
<div class="row">
<div class="col-12">
<h1>Reporte de precio de venta para </h1>
</div>
</div>

{{$producto}}

    @foreach ($recursos as $item)
        {{$item->producto}}
    @endforeach

</body>
</html>