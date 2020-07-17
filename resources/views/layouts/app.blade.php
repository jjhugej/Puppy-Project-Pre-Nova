<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Paws') }}</title>

    <!-- Fonts -->

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/b5970854f5.js" crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

        <div id="app">
            @yield('content')
        </div>
    

    <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
