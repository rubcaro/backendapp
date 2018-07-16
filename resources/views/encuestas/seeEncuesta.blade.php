@extends('layouts.app')

@section('content')
<div class="container">
  <h2>{{ $encuesta->nombre }}</h2>
  <a href="{{ route('seeResults', ['id' => $encuesta->id]) }}" class="btn btn-primary">Ver resultado</a>
  <a href="{{route('report', $encuesta->id)}}" class="btn btn-primary">Generar reporte</a>
  <hr>
  <div>
    Estado Encuesta:
  </div>
  <div class="row">
    <div class="col-3">
      <div class="form-check form-check-flat">
        <label class="form-check-label">
          <input type="checkbox" name="activo" id="" class="form-check-input"
            @if ($encuesta->estado == 1)
                checked
            @endif
          >Activo
          <i class="input-helper"></i>
        </label>
      </div>
    </div>
    <div class="col-1">
      <a href="{{ route('changeStatus', $encuesta->id) }}" class="btn btn-primary">Cambiar estado</a>
    </div>
  </div>
  <hr>
  @foreach ($encuesta->preguntas as $pregunta)
      <h3>{{$pregunta->pregunta}}</h3>
      <ol type="a">
        @foreach ($pregunta->alternativas as $alternativa)
        <li>{{$alternativa->alternativa}}</li>
        @endforeach
      </ol>
  @endforeach
</div>
@endsection
