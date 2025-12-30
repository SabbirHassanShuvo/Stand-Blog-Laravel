<header class="">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <h2>Stand Blog<em>.</em></h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutpage') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('allblogPost') }}">All Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contactpage') }}">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        @if (auth()->check())
                            @if (auth()->user()->hasRole('user'))
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            @elseif (auth()->user()->hasRole('moderator'))
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            @elseif (auth()->user()->hasRole('admin'))
                                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                            @endif
                        @endif
                    </li>

                    @if (!auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                    @endif

                    @if (auth()->check())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @endif
                </ul>
            </div>

        </div>
    </nav>
</header>
