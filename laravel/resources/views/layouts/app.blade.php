<!DOCTYPE html>
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
<body class="bg-secondary">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm text-light ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    AntonioGram
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-flex align-items-center">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li>
                            <a class="nav-link text-light" href="{{route('users.index')}}">Inicio</a>
                        </li>
                        <li>
                        <a class="nav-link text-light" href="{{ route('Image.create') }}">Subir Imagen</a>
                        </li>
                        @if(Auth::user()->image != "")
                        <li>
                            <img src="/storage/{{Auth::user()->image}}" height="75px" width="75px" class="avatar rounded-circle" alt="imagen-avatar">
                        </li>

                        <!--  Avatar por defecto en la ruta public/  -->
                        @else
                            <img src="{{asset("/avatar/avatar-default.gif")}}" height="75px" width="75px" class="avatar rounded-circle" alt="imagen-avatar">
                        @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nick }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right bg-dark text-light" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item text-light" href="{{ route('configuracion') }}">Configuración</a>
                                    <a class="dropdown-item bg-danger text-light" href="{{ action('Auth\LoginController@logout') }}">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ action('Auth\LoginController@logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
