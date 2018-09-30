<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>WeCreate</title>
</head>
<body>

<nav class="navbar navbar-expand">
    <div class="col-lg-6">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">Disabled</a>
            </li>
        </ul>
    </div>

    @if (Route::has('login'))
      <div class="col-lg-6">
          @auth
              <a href="{{ url('/Home') }}"> Home </a>
          @else
              <a href="{{ route('login') }}">Login</a>
              <a href="{{ route('register') }}">Register</a>
          @endauth
      </div>
    @endif
</nav>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>