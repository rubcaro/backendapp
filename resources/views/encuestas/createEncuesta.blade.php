@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Encuestas</h2>

  <div id="example"></div>
</div>
@endsection

@section('scripts')
<script>APP_URL = "{{ url('/') }}"; console.log(APP_URL)</script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection