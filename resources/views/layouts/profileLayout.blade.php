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
    <main>
        <div class="container">
            <div class="row">
                @include('inc.messages')
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
</body>
</html>
