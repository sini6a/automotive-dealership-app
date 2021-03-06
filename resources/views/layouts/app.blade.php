<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('page')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">

    {!! htmlScriptTagJsApi(['lang' => 'sv']) !!}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
            <div class="container">
                <a href="/"><img src="/logofirma.png" class="logo" /></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->route()->getName() == 'home') ? 'active' : '' }}" href="/">Hem</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->route()->getName() == 'polish_index') ? 'active' : '' }}" href="{{ route('polish_index') }}">Rekond</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->route()->getName() == 'service_index') ? 'active' : '' }}" href="{{ route('service_index') }}">Verkstad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->route()->getName() == 'sell_vehicle') ? 'active' : '' }}" href="{{ route('sell_vehicle') }}">S??lj bil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->route()->getName() == 'about_us') ? 'active' : '' }}" href="{{ route('about_us') }}">Om oss</a>
                            </li>
                            <li class="nav-item {{ (request()->route()->getName() == 'contact') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('contact') }}">Kontakt</a>
                            </li>
                        @guest

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ (request()->route()->getName() == 'dashboard.index') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                                        Min instrumentpanel
                                    </a>
                                    <a class="dropdown-item {{ (request()->route()->getName() == 'vehicles.create') ? 'active' : '' }}" href="{{ route('vehicles.create') }}">
                                        L??gg till nytt fordon
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('auth.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>

        <footer class="container-fluid bg-dark text-white text-center ">
            <div class="container mt-3">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-6 col-md-4 mb-3 mt-3">
                    <i class="fas fa-map-marker-alt"></i><br>
                    <small>{{ config('app.name', 'Laravel') }}</small><br>
                    <small>{{ config('company.address') }}</small>
                </div>

                <div class="col-6 col-md-4 mb-3 mt-3">
                    <i class="fas fa-phone-alt"></i><br>
                    <small><a href="tel:{{ config('company.phone') }}">{{ config('company.phone') }}</a></small><br>
                    <small><a href="mailto:{{ config('company.mail') }}">{{ config('company.mail') }}</a></small><br>
                    @guest
                        <small><a class="{{ (request()->route()->getName() == 'login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('auth.Login') }}</a></small><br>
                    @if (Route::has('register'))
                        <small><a class="{{ (request()->route()->getName() == 'register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a></small><br>
                    @endif
                    @endguest
                </div>
            
                <div class="col-12 col-md-4 mb-3 mt-3">
                    <i class="fas fa-building"></i><br>
                    <small>M??n - Fre: {{ config('company.working-hours-mon-fri') }}</small><br>
                    <small>L??rdag: {{ config('company.working-hours-sat') }}</small><br>
                    <small>S??ndag: {{ config('company.working-hours-sun') }}</small><br>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
