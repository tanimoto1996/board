<link rel="stylesheet" href="{{ asset('css/articles/nav.css') }}">
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <a href="{{ url('/') }}" class="nav-logo">ArticlePost</a>
        <div class="pull-right h-75">
            @auth
            <div class="ml-5 d-inline">{{ Auth::user()->name}}様</div>
            @else
            <div class="ml-5 d-inline">guest様</div>
            @endauth
            @if (Route::has('login'))
            @auth
            <a href="{{ route('logout') }}" class="logout-btn ml-3">Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @else
            <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 underline">Log in</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
            @endif
            @endauth
        </div>
        @endif
        </div>
    </a>
</nav>