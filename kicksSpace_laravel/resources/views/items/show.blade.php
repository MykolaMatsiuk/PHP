@extends ('layouts.master')

@section ('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
  <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/easyzoom.css') }}"> -->
  <!-- <script src="{{ asset('js/easyzoom.js') }}" defer></script> -->
  <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
  <script src="{{ asset('js/carousel.js') }}" defer></script>

@endsection

@section ('content')
  <div id="app-two"></div>
@endsection
