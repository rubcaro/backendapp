@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Notificaciones</h2>

  @foreach ($notificaciones as $notificacion)
    <ul>
      <li>{{ $notificacion->titulo }}</li>
      <li>{{ $notificacion->mensaje }}</li>
      <li>{{ $notificacion->message_id }}</li>
      <li>{{ $notificacion->tipoSangre }}</li>
      <li>{{ $notificacion->usuario }}</li>
      <li>{{ $notificacion->created_at }}</li>
    </ul>
  @endforeach
</div>

@endsection