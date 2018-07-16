<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!-- CSRF Token -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  {{-- <link rel="stylesheet" href="/css/chart.css"> --}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  <div class="container" style="margin-top: 1em;">
    <h1>Resultados {{$resultados["nombre"]}}</h1>
    <h2>Respuestas totales: {{$resultados["resultados_totales"]}}</h2>

    @foreach ($resultados["preguntas"] as $pregunta)
      <h2>{{$pregunta["pregunta"]}}</h2>
      <ol type="1">
        @foreach ($pregunta["alternativas"] as $index => $alternativa)
          <li>{{$alternativa["alternativa"]}} - Cantidad: {{$alternativa["cantidad"]}} - Porcentaje: {{$alternativa["porcentaje"]}}%</li>
          
        @endforeach
      </ol>
    @endforeach
  </div>
  
</body>
</html>