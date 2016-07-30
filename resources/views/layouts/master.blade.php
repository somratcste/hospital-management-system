<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>urban admin ui kit html</title>
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

</head>
	<body>	
		@yield('content')
		@include('includes.footer')
	</body>
</html>