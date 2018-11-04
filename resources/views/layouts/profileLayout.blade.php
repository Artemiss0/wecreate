<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> WeCreate - {{ $title }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    @yield('css')
</head>
<body>
<div id="app">
    @include('inc.navbar')
    <main>
        <div class="container">
            @include('inc.messages')
            <div class="row">
                <div class="col-lg-4 profile">
                    @yield('profile')
                </div>
                <div class="col-lg-8 projects">
                    @yield('projects')
                </div>
            </div>
        </div>
    </main>
    @include('inc.footer')
</div>
<script src="{{asset('js/app.js')}}"></script>
@yield('js')
</body>
</html>
