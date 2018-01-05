<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | Backend</title>

    <!-- Styles -->
    <link href="{{ asset('css/vendor/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('css/auth/backend.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div id="nav-container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
                <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="@lang('app.toggle_navigation', [], app()->getLocale())">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar-toggler">
                    @auth
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> @lang('backend.dashboard_label', [], app()->getLocale())</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fas fa-link"></i> Link</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" href="#"><i class="fas fa-times"></i> Disabled</a>
                            </li>
                        </ul>
                    @endauth
                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">@lang('auth.login_label', [], app()->getLocale())</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">@lang('auth.register_label', [], app()->getLocale())</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        @lang('auth.logout_label', [], app()->getLocale())
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>

        <div id="content">
            @yield('content')
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="{{ asset('js/vendor/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/auth/backend.js') }}"></script>
    @yield('scripts')
</body>
</html>
