<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Styles -->
	<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
	<link rel="stylesheet" href="{{ asset('/css/dashboard/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/dashboard/vendor.bundle.base.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/dashboard/vendor.bundle.addons.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/dashboard/style.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/my-style.css') }}">
</head>
<body>
	
	<!-- <img src="./../../public/img/fondo.jpg" alt="" > -->
	<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <form method="POST" action="{{ route('login') }}">
								{{ csrf_field() }}
                <div class="form-group">
                  <label class="label">Correo electrónico</label>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Correo electrónico" name="email" autofocus required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Contraseña</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="Ingrese contraseña" name="password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
								@if ($errors->has('password') || $errors->has('email'))
                  <div class="text-danger mensaje-validacion">Usuario y/o contraseña incorrecta</div>
                @endif
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block">Ingresar</button>
                </div>
              </form>
            </div>
            <p class="footer-text text-center text-white">Hospital Clínico Magallanes © 2018 .</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/dashboard/vendor.bundle.addons.js') }}"></script>
	<script src="{{ asset('js/dashboard/vendor.bundle.base.js') }}"></script>
	<script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
	<script src="{{ asset('js/dashboard/misc.js') }}"></script>
	<script src="{{ asset('js/dashboard/off-canvas.js') }}"></script>
</body>
</html>