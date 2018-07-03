@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Resultados encuesta</h2>

  <div id="result"></div>
</div>
@endsection

@section('scripts')
<script>
  const APP_URL = "{{ url('/') }}"; 
  const ID_ENCUESTA = "{{ $id }}";
</script>
<script src="{{ asset('js/app2.js') }}"></script>
@endsection