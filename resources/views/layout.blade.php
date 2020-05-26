<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>Aprendible | @yield('title')</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    @stack('styles')
  </head>
  <body>
    <div class="d-flex flex-column h-screen justify-content-between">
      <header>
        @include('partials.nav')
        @include('partials.session-status')
      </header>
  
      <main class="py-5">
        @yield('content')
      </main>
  
      <footer class="bg-white text-center text-black-50 py-3 shadow">
        {{ config('app.name') }} | Copyright @ {{ date('Y') }}
      </footer>
    </div>

    @stack('scripts')
  </body>
</html>