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
    {{--<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">--}}
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/ion/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/globalstyle.css') }}" rel="stylesheet">
</head>
<body>
<div class="app-app" id="app">

    <app-sidebar :appname="'{{ config('app.name', 'Laravel') }}'"></app-sidebar>
    <div class="app-content">
        <div class="app-content-top">
            @guest
                <auth-navbar></auth-navbar>
            @else
                <ul class="app-content-top-list">
                    <li class="nav-item dropdown" style="display: inline-block">
                        <a style="display: flex; align-items: center; color: #FFF;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div style="margin-right: 8px;">
                                <img src="{{ \Illuminate\Support\Facades\Auth::user()->thumb }}" width="42" style="border-radius: 50%;" alt="..."/>
                            </div>
                            <div>
                                <span style="color: white;">{{ ucfirst(Auth::user()->username) }}</span>
                            </div>
                            <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                Se déconnecter
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li class="app-content-top-list__item">
                        <a style="font-size: 20px; color: #FFF;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            <i class="ion ion-log-out"></i>
                        </a>
                    </li>
                </ul>
            @endguest
        </div>

        <div class="app-content-main">
            <router-view></router-view>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('plugins/jQuery-2.1.4.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui-1.10.4.min.js') }}"></script>
<script src="{{ asset('plugins/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
