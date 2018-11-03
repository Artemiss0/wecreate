<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar navbar-inverse" id="navbarSupportedContent">
            <ul class="nav navbar-nav navbar-right">
                {{--Navbar visible for guests--}}
                @if(Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="/"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                    </li>
                    <a class="nav-link" href="{{ route('login') }}">
                        <li class="nav-item sign-in">{{ __('Sign in') }}</li>
                    </a>
                @endif
                {{--Navbar visible for users--}}
                @if(!Auth::guest() && !Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="/"> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('discover')}}"> Discover</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                            Logout </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
                {{--Navbar visible for admins--}}
                @if(Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tags.index')}}">Add Tags</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.projects')}}">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
                            Logout </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endif
            </ul>
        </div>
    </div>
</nav>