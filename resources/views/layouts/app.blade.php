<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Devstagram: @yield('titulo')</title>        
        @vite('resources/css/app.css')
    </head>
    <body>
        <nav>
            <a href="/">Principal</a>
            <a href="/nosotros">Nosotros</a>
        </nav>
        <h1 class="text-4xl">@yield('titulo')</h1>
        <hr>
        @yield('contenido')
    </body>
</html>