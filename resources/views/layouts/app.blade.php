<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- owlcarousel -->
    <!-- Bootstrap CSS -->
    
    <title>Fason.tj</title>
    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('css/dashboard/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css') }}">
  </head>
  <body style="font-family: 'Montserrat', sans-serif;" >

    @yield('header')

    @yield('content')

    @yield('footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/owl-carousel.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
  </body>
</html>
