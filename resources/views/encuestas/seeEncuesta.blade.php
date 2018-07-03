@extends('layouts.app')

@section('content')
<div class="container">
  <h2>{{ $encuesta->nombre }}</h2>
  <a href="{{ route('seeResults', ['id' => $encuesta->id]) }}">Ver resultado</a>
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
