<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Loading Bootstrap -->
    <link href="{{ asset('css/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Loading Flat UI -->
    <link href="{{ asset('css/flat-ui.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <!-- Icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Animate -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(), 'user' => Auth::user()
        ]); ?>

    </script>

    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
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
                        <li>
                            <form class="navbar-form navbar-right" action="/blog/search/" method="GET" role="search">
                            <div class="form-group">
                              <div class="input-group">
                                <input class="form-control thin-border" name="search" type="search" placeholder="Search blog..">
                                <span class="input-group-btn">
                                  <button type="submit" class="btn thin-border"><span class="fui-search"></span></button>
                                </span>
                              </div>
                            </div>
                          </form>
                        </li>
                        @if (Auth::guard()->user())
                        <li>
                            <div class="header-avatar">
                                <img src="/uploads/avatars/{{Auth::user()->avatar}}">
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="/profile/{{Auth::user()->id}}"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

     @yield('content')
    </div>
    <footer class="flex-center text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="footer-title"><i class="fa fa-code"></i> with <i class="fa fa-heart alizarin"></i>  by Carl</h1>
          </div>
        </div>
      </div>
    </footer>

    <!-- Vue Js -->
    <script src="{{ asset('bower_resources/vue/dist/vue.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/vendor/video.js') }}"></script>
    <script src="{{ asset('js/flat-ui.min.js') }}"></script>
    <script src="{{ asset('js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('bower_resources/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_resources/moment/min/locales.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/user.js') }}"></script>
    </body>
</html>
