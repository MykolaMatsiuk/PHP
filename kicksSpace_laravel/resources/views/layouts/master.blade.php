<!DOCTYPE html>
<html lang="uk">
<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="магазин оригінального взуття" />
  <meta name="keywords" content="взуття, кроси, adidas, nike, jordan, puma, reebok" />
  <meta name="author" content="Gonzoman" />
  <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}" />

  <title>KicksSpace</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/4-col-portfolio.css') }}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  
  <script src="{{ asset('js/script.js') }}" defer></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('js/functions.js') }}"></script>
  @yield('styles')

</head>
<body>
  @include('layouts.nav')

  @yield('content')

  @include('layouts.footer')
  
  @yield('script')
</body>
</html>
