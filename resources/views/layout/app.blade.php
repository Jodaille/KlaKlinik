<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <link rel="stylesheet" href="{{ mix('/css/main.css') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="theme-color" content="#ffffff">

        @stack('gtmscript')


        @yield('css')
        @stack('css')
    </head>
    <body>
        <header>
        </header>
        <div id="app">
            @yield('content')
        </div>
        <footer>
            @yield('footer')
        </footer>
        <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
        @yield('js')
        @stack('js')
    </body>
</html>
 
