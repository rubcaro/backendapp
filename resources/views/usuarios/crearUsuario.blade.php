@extends('layouts.app')

@section('content')

<div class="container">
  <h2>Crear usuario</h2>

  @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
  @endif
  
  <form action="{{ route('storeUser') }}" method="post" class="forms-sample">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" name="name" class="form-control" placeholder="Ingrese su nombre por favor">
    </div>
    <div class="form-group">
      <label for="">Apellido Paterno</label>
      <input type="text" name="apepat" class="form-control" placeholder="Ingrese su apellido por favor">
    </div>
    <div class="form-group">
      <label for="">Apellido Materno</label>
      <input type="text" name="apemat" class="form-control" placeholder="Ingrese su apellido por favor">
    </div>
    <div class="form-group">
      <label for="">Correo electrónico</label>
      <input type="email" name="email" class="form-control" placeholder="Ingrese su correo por favor">
    </div>
    <div class="form-group">
      <label for="">Contraseña</label>
      <input type="password" name="password" class="form-control" placeholder="Ingrese su correo por favor">
    </div>
    <div class="form-group">
      <label for="">Repita Contraseña</label>
      <input type="password" name="password_confirmation" class="form-control" placeholder="Ingrese su correo por favor">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success mr-2">Crear</button>
    </div>
  </form>

</div>

@endsection