<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'X-Plan') }}</title>

    <!-- Styles -->
    
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/modified.css') }}">
    
    
</head>
<body>
    <div id="app">
        <header>
            <nav id="nav-head" class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>  
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand">
                            <a href="/"><img src="./images/app_head_logo.png" alt="logo"></a>
                        </div>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <router-link tag="li" to="/" exact >
                                <a>Home</a>
                            </router-link>
                            <router-link tag="li" to="/destination">
                                <a>Destination</a>
                            </router-link>
                            <router-link tag="li" to="/tips">
                                <a>Tips & Tricks</a>
                            </router-link>
                            @if (Auth::check())
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        
        @yield('content')
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <h1>X-Plan (Explore-Planner)</h1>
                        <p>A web that prepare all information about travel destination in Indonesia including attrations. X-Plan can give you estimate cost for your plan schedule.</p>
                    </div>
                    <div class="col-md-3">
                        <h1>Contact Us</h1>
                        <p>Email : xplan.admin@gmail.com<br>
                        Phone : (+62) 852 7804 1699</p>
                    </div>
                    <div id="social-media" class="col-md-3">
                        <h1>Our Social Media</h1>
                        <a href=""><img src="./images/fb.png" alt=""></a>
                        <a href=""><img src="./images/twitter.png" alt=""></a>
                        <a href=""><img src="./images/instagram.png" alt=""></a>
                        <a href=""><img src="./images/youtube.png" alt=""></a>
                    </div>
                    <div id="footer-btn" class="col-md-1">
                        <a href="" class="btn btn-default">About us</a>
                        <a href="" class="btn btn-default">FAQ</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
