<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/style.css') }}" rel="stylesheet">
    <title>WeCreate</title>
</head>
<body>

<nav class="navbar navbar-expand">
    <div class="col-lg-1 offset-8">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Discover <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>

    @if (Route::has('login'))
        <div class="col-lg-2">
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item">
                        <a href="{{ url('/Home') }}"> Home </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}">Sign in </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}">Sign up</a>
                    </li>
                @endauth
            </ul>
        </div>
    @endif
</nav>



</body>
</html>