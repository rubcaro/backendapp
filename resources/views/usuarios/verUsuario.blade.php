@extends('layouts.app')

@section('content')

<div class="container" data-form="deleteForm" id="app">
  <h2>{{ $user->name }} {{ $user->apepat }} {{ $user->apemat }}</h2>

  @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
  @endif

  
  <form action="{{ route('editUser', $user->id) }}" method="post" class="forms-sample">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="">Nombre</label>
      <input value="{{ $user->name }}" type="text" name="name" class="form-control" placeholder="Ingrese su nombre por favor">
    </div>
    <div class="form-group">
      <label for="">Apellido Paterno</label>
      <input value="{{ $user->apepat }}" type="text" name="apepat" class="form-control" placeholder="Ingrese su apellido por favor">
    </div>
    <div class="form-group">
      <label for="">Apellido Materno</label>
      <input value="{{ $user->apemat }}" type="text" name="apemat" class="form-control" placeholder="Ingrese su apellido por favor">
    </div>
    <div class="form-group">
      <label for="">Correo electrónico</label>
      <input value="{{ $user->email }}" type="email" name="email" class="form-control" placeholder="Ingrese su correo por favor">
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
      <button type="submit" class="btn btn-success mr-2 button-edit">Editar</button>
    </div>
  </form>
  <form method="POST" action="{{ route('deleteUser', $user->id) }}" class="form-delete">
		<input type="hidden" name="_method" value="DELETE">
		{{ csrf_field() }}
		<div class="form-group">
			<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				<button class="btn btn-danger" type="submit" data-toggle="confirmation">Eliminar</button>
			</div>
		</div>
	</form>

</div>

@endsection

@section('scripts')
    
@endsection