<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Center Hospital</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="/favicon.ico">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-u‌​i.css"> -->
  
  <!-- page level plugin styles -->
  <link rel="stylesheet" href="{{ asset('styles/climacons-font.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/rickshaw/rickshaw.min.css') }}">
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/jquery-ui.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/bootstrap/dist/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/perfect-scrollbar/css/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/roboto.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/panel.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/urban.css') }}">
  <link rel="stylesheet" href="{{ asset('styles/urban.skins.css') }}">
  

  <!-- endbuild -->
    @yield('run_custom_css_file')
    @yield('run_custom_css')
</head>
	<body>	
    @include('includes.left_sidebar')
    
    <!-- content panel -->
<div class="main-panel">
  <!-- top header -->
  <header class="header navbar">

    <div class="brand visible-xs">
      <!-- toggle offscreen menu -->
      <div class="toggle-offscreen">
        <a href="#" class="hamburger-icon v2 visible-xs" data-toggle="offscreen" data-move="ltr">
          <span></span>
          <span></span>
          <span></span>
        </a>
      </div>
      <!-- /toggle offscreen menu -->

      <!-- logo -->
      <div class="brand-logo">
        CENTER Hospital
      </div>
      <!-- /logo -->
    </div>

    <ul class="nav navbar-nav hidden-xs">
      <li>
        <p class="navbar-text">
          @yield('top_header')
        </p>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right hidden-xs">

      <li>
        <a href="javascript:;" data-toggle="dropdown">
         <!--  <img src="images/avatar.jpg" class="header-avatar img-circle ml10" alt="user" title="user"> -->
          <span class="pull-left" style="text-transform:uppercase;">{{(Auth::user()->name)}}</span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="{{ route('admin.index') }}">Dashboard</a>
          </li>
          <li>
            <a href="{{ url('/logout') }}">Logout</a>
          </li>
        </ul>

      </li>

    </ul>
  </header>

  <!-- /top header -->
		@yield('content')
		@include('includes.footer')

        <!-- build:js({.tmp,app}) scripts/app.min.js -->
        <!-- <script src="code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script> -->
        <script src="{{ asset('scripts/extentions/modernizr.js') }}"></script>
        <script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>
        <script src="{{ asset('vendor/jquery/dist/jquery-ui.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
        <script src="{{ asset('vendor/jquery.easing/jquery.easing.js') }}"></script>
        <script src="{{ asset('vendor/fastclick/lib/fastclick.js') }}"></script>
        <script src="{{ asset('vendor/onScreen/jquery.onscreen.js') }}"></script>
        <script src="{{ asset('vendor/jquery-countTo/jquery.countTo.js') }}"></script>
        <script src="{{ asset('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
        <script src="{{ asset('scripts/ui/accordion.js') }}"></script>
        <script src="{{ asset('scripts/ui/animate.js') }}"></script>
        <script src="{{ asset('scripts/ui/animate.js') }}"></script>
        <script src="{{ asset('scripts/ui/panel-controls.js') }}"></script>
        <script src="{{ asset('scripts/ui/preloader.js') }}"></script>
        <script src="{{ asset('scripts/ui/toggle.js') }}"></script>
        <script src="{{ asset('scripts/urban-constants.js') }}"></script>
        <script src="{{ asset('scripts/extentions/lib.js') }}"></script>
        <!-- endbuild -->

        <!-- page level scripts -->
        <script src="{{ asset('scripts/extentions/lib.js') }}"></script>
       <!-- <script src="{{ asset('vendor/rickshaw/rickshaw.min.js') }}"></script> -->
        <script src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.categories.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.categories.js') }}"></script>
        <!-- /page level scripts -->

        <!-- initialize page scripts -->
        <script src="{{ asset('scripts/pages/dashboard.js') }}"></script>
        <!-- /initialize page scripts -->
        <!-- /content panel -->
        @yield('run_custom_js_file')
        @yield('run_custom_jquery')
	</body>
</html>