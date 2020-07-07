<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ url('/mos_favicon.png') }}">

    @hasSection('title')
    <title>@yield('title') - {{ config('app.name') }}</title>
    @else
    <title>{{ config('app.name') }}</title>
    @endif

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/prism.css') }}">
    @livewireStyles

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script defer src="{{ mix('js/app.js') }}"></script>
</head>

<body>
    @yield('body')
    @livewireScripts
    <script src="{{ asset('js/prism.js') }}"></script>
</body>

</html>