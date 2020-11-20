<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Doston Adilov" />
    <meta name="keywords" content="fason, shop, market, tj,">
    <meta name="author" content="Doston Adilov">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/dashboard/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('fonts/feather/feather.css') }}" />
  
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
    <script src="{{ asset('js/app.js') }}"></script>
  
  </body>
</html>
