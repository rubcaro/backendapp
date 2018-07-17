@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Notificaciones</h2>

  <table class="table table-hover">
    <thead>
      <th>Título</th>
      <th>Mensaje</th>
      <th>Fecha de creación</th>
    </thead>
    <tbody>
      @foreach ($notificaciones as $notificacion)
        <tr>
          <td>{{ $notificacion->titulo }}</td>
          <td>{{ $notificacion->mensaje }}</td>
          <td>{{ $notificacion->created_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

</div>

@endsection