@php
  $user = \Auth::user();
@endphp

  <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>filter</title>

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body class="@if(!Auth::user()) is-guest @endif">
<div id="app" class="h-100">

  <main class="h-100">
    <div class="container h-100">
      @yield('content')
    </div>
  </main>

</div>
<script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>
