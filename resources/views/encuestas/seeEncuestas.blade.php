@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Encuestas</h2>

  <table>
    <tr>
      <td>Nombre encuesta</td>
      <td>Fecha de Creación</td>
      <td>Estado</td>
      <td>Ver encuesta</td>
    </tr>
    @foreach ($encuestas as $encuesta)
        <tr>
          <td>{{$encuesta->nombre}}</td>
          <td>{{$encuesta->created_at}}</td>
          <td></td>
          <td><a href="{{ route('seeEncuesta', ['id' => $encuesta->id]) }}">Ver encuesta</a></td>
        </tr>
    @endforeach
  </table>
</div>
@endsection
