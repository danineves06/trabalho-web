<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Main</title>
</head>

<body>
    @foreach($carros as $carro)
    <h1>{{$carro->placa}}</h1>
    <h4>• {{$carro->modelo->name}}</h4>
    <h4>• {{$carro->estado->name}} ({{$carro->estado->abreviatura}})</h4>
    <h4>• {{$carro->cor->name}} </h4>
    <hr>
    @endforeach
</body>

</html>