<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Trust One Hospital</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
  <link rel="shortcut icon" href="/favicon.ico">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  <!-- page level plugin styles -->
  <link rel="stylesheet" href="{{ asset('styles/climacons-font.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/rickshaw/rickshaw.min.css') }}">
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
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
        @yield('top_header')
		@yield('content')
		@include('includes.footer')

        <!-- build:js({.tmp,app}) scripts/app.min.js -->
        <script src="{{ asset('scripts/extentions/modernizr.js') }}"></script>
        <script src="{{ asset('vendor/jquery/dist/jquery.js') }}"></script>
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
       {{--<script src="{{ asset('vendor/rickshaw/rickshaw.min.js') }}"></script>--}}
        <script src="{{ asset('vendor/flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.categories.js') }}"></script>
        <script src="{{ asset('vendor/flot/jquery.flot.categories.js') }}"></script>
        <!-- /page level scripts -->

        <!-- initialize page scripts -->
        <script src="{{ asset('scripts/pages/dashboard.js') }}"></script>}
        <!-- /initialize page scripts -->
        <!-- /content panel -->
        @yield('run_custom_js_file')
        @yield('run_custom_jquery')
	</body>
</html>