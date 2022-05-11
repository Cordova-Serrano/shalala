<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://bootswatch.com/5/minty/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/e840fab8b7.js" crossorigin="anonymous"></script>
    <!-- Stylesheet Public -->
    <link rel="stylesheet" href="@yield('stylesheet')">
    <link rel="stylesheet" href="@yield('stylesheet2')">
    <title>Shalala</title>
</head>

<body>
    @yield('contenido')
</body>

</html>