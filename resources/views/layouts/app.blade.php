<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>

	@component('layouts.inc.header')
			
	@endcomponent

	<div class="container-fluid page-body-wrapper">

		@component('layouts.inc.sidebar')
				
		@endcomponent

		<div class="main-panel">
			@yield('content')
		</div>

	</div>

	
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/dashboard/vendor.bundle.addons.js') }}"></script>
	<script src="{{ asset('js/dashboard/vendor.bundle.base.js') }}"></script>
	<script src="{{ asset('js/dashboard/dashboard.js') }}"></script>
	<script src="{{ asset('js/dashboard/misc.js') }}"></script>
	<script src="{{ asset('js/dashboard/off-canvas.js') }}"></script>
	
	@yield('scripts')
</body>
</html>
