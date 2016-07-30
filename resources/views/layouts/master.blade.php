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
  <link rel="stylesheet" href="styles/climacons-font.css">
  <link rel="stylesheet" href="vendor/rickshaw/rickshaw.min.css">
  <!-- /page level plugin styles -->

  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="vendor/perfect-scrollbar/css/perfect-scrollbar.css">
  <link rel="stylesheet" href="styles/roboto.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="styles/panel.css">
  <link rel="stylesheet" href="styles/feather.css">
  <link rel="stylesheet" href="styles/animate.css">
  <link rel="stylesheet" href="styles/urban.css">
  <link rel="stylesheet" href="styles/urban.skins.css">
  <!-- endbuild -->

</head>
	<body>	
		@yield('content')
		@include('includes.footer')
	</body>
</html>