<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rich data tables using Laravel, Livewire, Alpine JS, and Tailwind CSS">
    <link rel="icon" href="/favicon.ico">

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