<!doctype html>





<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-transparent bg-transparent">
    <!-- Left Side Of Navbar -->
    <div class="d-flex flex-grow-1">
        <nav class="navbar navbar-dark transparent-dark">
            <a class="navbar-brand navbar-dark transparent-dark" href="{{ url("/") }}">
                <img src="https://www.flaticon.com/premium-icon/icons/svg/2920/2920665.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            </a>
        </nav>

        <div class="w-100 text-right">
            <button class="navbar-toggler navbar-dark bg-dark" type="button" data-toggle="collapse" data-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

    </div>




<!-- Right Side Of Navbar -->
    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
        <ul class="navbar-nav ml-auto flex-nowrap">
            <li class="nav-item">
                @auth
                    <a class="nav-link m-2 menu-item" href="{{ route('user.index') }}"> {{ __('Users') }}</a>
                @endauth
            </li>
            <li class="nav-item">
                <a href="?c=home&a=contact" class="nav-link m-2 menu-item">Kontaktujte nás</a>
            </li>
            <li class="nav-item">
                <a href="{{ url("/gallery") }}" class="nav-link m-2 menu-item">Gallery</a>
            </li>
            <li class="nav-item">
                <a href="?c=pricelist" class="nav-link m-2 menu-item">Cenník</a>
            </li>

            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link m-2 menu-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    </ul>
                @endif

                @if (Route::has('register'))
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link m-2 menu-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    </ul>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link m-2 menu-item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest


        </ul>
    </div>





</nav>


@yield('content')





</body>
</html>
