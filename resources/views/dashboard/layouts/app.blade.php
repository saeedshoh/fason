<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Doston Adilov" />
    <meta name="keywords" content="fason, shop, market, tj,">
    <meta name="author" content="Doston Adilov">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/feather/feather.css') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Title -->
    <title>Панель управления - @yield('title')</title>

  </head>
  <body>

    @yield('aside')

    <!-- MAIN CONTENT
    ================================================== -->
    <div class="main-content">
        @yield('content')
    </div>
    <!-- / .main-content -->


    <!-- JAVASCRIPT
    ================================================== -->

    <script src="{{ asset('js/dashboard/app.js') }}"></script>
    @yield('script')

  </body>
</html>
