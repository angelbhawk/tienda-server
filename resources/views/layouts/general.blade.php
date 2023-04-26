<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/estilos.css">
    @yield('head')
</head>
<body>
    @section('header')
        @include('layouts.componentes.header')
    @show
    @section('nav')
        @include('layouts.componentes.nav')
    @show
    @section('main')
    @show
    @section('aside')
        @include('layouts.componentes.aside')
    @show
    @section('footer')
        @include('layouts.componentes.footer')
    @show
    @yield('scripts')
</body>
</html>
