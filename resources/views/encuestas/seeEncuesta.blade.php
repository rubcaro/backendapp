@extends('layouts.app')

@section('content')
<div class="container">
  <h2>{{ $encuesta->nombre }}</h2>
  <a href="{{ route('seeResults', ['id' => $encuesta->id]) }}">Ver resultado</a>
  <div>
    Estado Encuesta:
  </div>
  <div class="form-group">
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
    <a href="{{ route('changeStatus', $encuesta->id) }}" class="btn btn-default">Cambiar estado</a>
  </div>
  
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
