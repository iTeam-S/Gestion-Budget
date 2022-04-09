<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('title')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>

    <body>
        </div>
        <div class="container">
            <a href="{{ url('/home') }}">Login</a>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
