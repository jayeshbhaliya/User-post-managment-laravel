<div class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary py-3">
        <a class="navbar-brand text-center text-white" href="">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item active">
                    <a class="nav-link text-center text-white" href="{{ url('/') }}"> <i
                            class="fas fa-duotone fa-house"> </i> Home </a>
                </li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-center text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-center text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <li class="nav-item">
                    <a class="nav-link text-center text-white" href="{{ url('/mypost') }}">My Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center text-white" href="{{ url('/create-post') }}">Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center text-white" href="{{ url('/profile') }}">{{ Auth::user()->email }}</a>
                </li>

                    <li class="nav-item">
                        <a class="nav-link text-center text-white " href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>
