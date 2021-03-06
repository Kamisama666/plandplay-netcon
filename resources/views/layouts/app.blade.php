<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/netcon.css') }}" rel="stylesheet">

    <?php /*<link rel="stylesheet" href="/libraries/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/libraries/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />*/ ?>

    @yield('style')
</head>
<body>
    <div id="app">
        @include('cookieConsent::index')
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    Menu <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('game_list')}}">Lista de Partidas </a>
                                    </li>
                                    <li>
                                        <a href="https://netconplay.com/calendario-de-partidas-2019/">Calendario de Partidas </a>
                                    </li>
                                    <li>
                                        <a href="http://netconplay.com/contacto" title="Ponte en contacto con nosotros" target="_blank">Contacto</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/login') }}">
                                            Login
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{route('home')}}">Mi perfil </a>
                                    </li>
                                    <li>
                                        <a href="{{route('game_list')}}">Lista de Partidas </a>
                                    </li>
                                    <li>
                                        <a href="https://netconplay.com/calendario-de-partidas-2019/">Calendario de Partidas </a>
                                    </li>

                                    @if (env('GAME_REGISTRATION_ENABLED', false))
                                    <li>
                                        <a href="{{route('game_post')}}">Nueva partida </a>
                                    </li>
                                    @endif

                                    <li>
                                        <a href="http://netconplay.com/contacto" title="Ponte en contacto con nosotros" target="_blank">Contacto</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer>
            <a href="http://netconplay.com/politica-de-privacidad-de-datos/" target="_blank">Política de privacidad</a>
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Scripts -->
    <?php /*<script src="{{ asset('js/app.js') }}"></script
    <script type="text/javascript" src="/libraries/jquery/jquery.min.js"></script>*/ ?>
    <script type="text/javascript" src="/libraries/moment/min/moment.min.js"></script>
    <?php /*<script type="text/javascript" src="/libraries/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/libraries/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>*/ ?>

    @yield('scripts')
</body>
</html>
