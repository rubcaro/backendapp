@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Usuarios</h2>

  @if (Session::has('message-success'))
		<div class="alert alert-success" role="alert">{{ session('message-success') }}</div>
	@endif

  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <th>Nombre</th>
        <th>Apellido paterno</th>
        <th>Apellido Materno</th>
        <th>Correo</th> 
        <th>Modificar</th>
      </thead>
      <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
              <td>{{ $usuario->name }}</td>
              <td>{{ $usuario->apepat }}</td>
              <td>{{ $usuario->apemat }}</td>
              <td>{{ $usuario->email }}</td>
              <td><a href="{{ route('seeUser', $usuario->id) }}">Editar</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection