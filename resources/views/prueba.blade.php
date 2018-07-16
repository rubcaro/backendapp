@extends('layouts.app')

@section('content')
<div id="asdf"></div>
@endsection


@section('scripts')
  <script>
    const APP_URL = "{{ url('/') }}"; 
  </script>
  <script src="{{ asset('js/app3.js') }}"></script>
@endsection

