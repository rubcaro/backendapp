@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Encuestas</h2>

  <table class="table table-hover">
    <thead>
      <th>Nombre encuesta</th>
      <th>Fecha de Creación</th>
      <th>Estado</th>
      <th>Ver encuesta</th>
    </thead>
    <tbody>
      @foreach ($encuestas as $encuesta)
        <tr>
          <td>{{$encuesta->nombre}}</td>
          <td>{{$encuesta->created_at}}</td>
          <td>
            @if ($encuesta->estado == 1)
                Activa
            @else
                Inactiva
            @endif
          </td>
          <td><a href="{{ route('seeEncuesta', ['id' => $encuesta->id]) }}">Ver encuesta</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
