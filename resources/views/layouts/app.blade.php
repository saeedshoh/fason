<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/445a82fc53.js" crossorigin="anonymous"></script>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <title>Fason.tj - @yield('title')</title>

    {{--  <link rel="stylesheet" href="{{ asset('css/dashboard/app.css') }}">  --}}
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/storage/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/storage/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/storage/favicon-16x16.png">
    <link rel="manifest" href="/storage/site.webmanifest">
  </head>
  <body>
    @yield('header')

    @yield('content')

    @yield('footer')

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
      $(function(){
          $('.pic-main').okzoom({
              width: 150,
              height: 150,
              border: "1px solid black",
              shadow: "0 0 5px #000",
              scaleWidth: 600
          });
      });
  </script>
  </body>
</html>
