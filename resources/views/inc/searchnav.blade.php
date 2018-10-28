<nav class="navbar navbar-expand-lg">
    <div class="container">
        <div class="navbar navbar-inverse" id="navbarSupportedContent">
            <ul class="nav navbar-nav">
                @guest
                    <li class="nav-item">
                        please log in first
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Filter 1 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Filter 2 </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Filter 3 </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>