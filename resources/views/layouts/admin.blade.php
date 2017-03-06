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
    <!-- Default -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">

    <link href="{{ asset('bower_resources/summernote/dist/summernote.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <!-- Vue Js -->
    <script src="{{ asset('bower_resources/vue/dist/vue.min.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
      <div id="wrapper">

      <!-- Sidebar -->
      <div id="sidebar-wrapper" class="navbar-inverse">
          <div class="admin-header">
              <div class="admin-img">
                  <img src="{{ asset('img/img_avatar2.png') }}">
              </div>
              @if (Auth::guard('admins')->user())
                  <h5>{{ Auth::guard('admins')->user()->name }}</h5>
                  <h6>Admin</h6>
              @endif
          </div>
          <ul class="sidebar-nav">
              <li>
                  <a href="/admin/overview"><i class="fa fa-home" aria-hidden="true"></i>  Overview</a>
              </li>
              <li>
                  <a href="/admin/posts"><i class="fa fa-list" aria-hidden="true"></i>  Posts </a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-file" aria-hidden="true"></i>  Pages </a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-comment" aria-hidden="true"></i>  Comments </a>
              </li>
              <li>
                  <a href="/admin/users"><i class="fa fa-user" aria-hidden="true"></i>  Users </a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>  Events</a>
              </li>
              <li>
                  <a href="#"><i class="fa fa-info" aria-hidden="true"></i>  About</a>
              </li>
          </ul>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
          <nav class="navbar navbar-inverse navbar-embossed no-radius navbar-fixed-top">
                  <div class="container-fluid">
                      <div class="navbar-header">

                          <!-- Collapsed Hamburger -->
                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                              <span class="sr-only">Toggle Navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </button>

                          <!-- Branding Image -->
                          <a class="navbar-brand white-text" href="{{ url('/admin/overview') }}">
                              
                          </a>
                      </div>

                      <div class="collapse navbar-collapse" id="app-navbar-collapse">
                          <!-- Left Side Of Navbar -->
                          <ul class="nav navbar-nav">
                              &nbsp;
                          </ul>

                          <!-- Right Side Of Navbar -->
                          <ul class="nav navbar-nav navbar-right">
                              @if (Auth::guard('admins')->user())
                                  <li class="dropdown hidden-xs hidden-sm">
                                      <a href="#" class="dropdown-toggle white-text" data-toggle="dropdown" role="button" aria-expanded="false">
                                          {{ Auth::guard('admins')->user()->name }} <span class="caret"></span>
                                      </a>

                                      <ul class="dropdown-menu white-text" role="menu">
                                          <li>
                                              <a href="{{ url('admin/logout') }}"
                                                  onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                  <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                                              </a>
                                              <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                                                  {{ csrf_field() }}
                                              </form>
                                          </li>
                                      </ul>
                                  </li>
                              @endif
                              <li class="hidden-md hidden-lg">
                                  <a href="/admin/overview"><i class="fa fa-home" aria-hidden="true"></i>  Overview</a>
                              </li>
                              <li class="hidden-md hidden-lg">
                                  <a href="/admin/posts"><i class="fa fa-list" aria-hidden="true"></i>  Posts </a>
                              </li>
                              <li class="hidden-md hidden-lg">
                                  <a href="#"><i class="fa fa-file" aria-hidden="true"></i>  Pages </a>
                              </li>
                              <li class="hidden-md hidden-lg">
                                  <a href="#"><i class="fa fa-comment" aria-hidden="true"></i>  Comments </a>
                              </li>
                              <li class="hidden-md hidden-lg">
                                  <a href="/admin/users"><i class="fa fa-user" aria-hidden="true"></i>  Users </a>
                              </li>
                              <li class="hidden-md hidden-lg">
                                  <a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>  Events</a>
                              </li>
                              <li class="hidden-md hidden-lg">
                                  <a href="#"><i class="fa fa-info" aria-hidden="true"></i>  About</a>
                              </li>
                              <li class="hidden-md hidden-lg">
                                  <div class="admin-header">
                                      <div class="admin-img">
                                          <img src="{{ asset('img/img_avatar2.png') }}">
                                      </div>
                                      @if (Auth::guard('admins')->user())
                                          <h5>{{ Auth::guard('admins')->user()->name }}</h5>
                                          <h6>Admin</h6>
                                      @endif
                                      <ul class="nav navbar-nav navbar-right">
                                          <li>
                                              <a href="{{ url('admin/logout') }}"
                                                  onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">
                                                  Logout
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </div>
          </nav>
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      @yield('content')
                  </div>
              </div>
          </div>
      </div>
      <!-- /#page-content-wrapper -->
      </div>
    <!-- /#wrapper -->

    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('bower_resources/summernote/dist/summernote.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/vendor/video.js') }}"></script>
    <script src="{{ asset('js/flat-ui.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('bower_resources/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
              height:500,
            });
        });
    </script>
    </body>
</html>
