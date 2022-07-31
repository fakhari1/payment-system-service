<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container justify-content-between">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h2>آکادمی</h2>
        </a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item mr-2 ">
                    <a class="btn btn-info text-white"
                       href="{{ route('login.form') }}"
                       style="margin-left: 10px">{{ __('auth.login') }}
                    </a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item mr-2 ">
                    <a class="btn btn-info text-white"
                       href="{{ route('register.form') }}">
                        {{ __('auth.register') }}
                    </a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown mr-2 ">
                    <a id="navbarDropdown"
                       class="nav-link dropdown-toggle text-black-50"
                       href="#" role="button"
                       data-bs-toggle="dropdown"
                       aria-haspopup="true"
                       aria-expanded="false"
                       v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end"
                         aria-labelledby="navbarDropdown">
                        <a class="dropdown-item"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            {{ __('auth.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
