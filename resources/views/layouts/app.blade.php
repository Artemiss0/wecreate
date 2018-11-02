<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div id="app">
    @include('inc.navbar')
    <header class="header">
        @yield('header')
    </header>
@yield('subnav')
    <main>
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </main>
</div>
</body>
@include('inc.footer')
</html>
