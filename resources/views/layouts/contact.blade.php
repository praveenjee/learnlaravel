<!doctype html>
<html lang="{{ app()->getLocale() }}">

<!-- Mirrored from sthemes.co/html/artigo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Aug 2018 06:01:33 GMT -->
<head>
	<meta charset="utf-8">
	<title>{{ (@$pageTitle !="") ? $pageTitle : config('app.name', 'Laravel') }}</title>
	<meta name="keywords" content="HTML5 Template">
	<meta name="description" content="Artigo – Simple And Minimal Blog Template">
	<meta name="author" content="itembridge.com">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Engagement' rel='stylesheet' type='text/css'>
	
	@include('front.include') 
	

	<!--[if lt IE 9]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
	@yield('stylesheets')
</head>

<body>

<!-- *** THEME CONTAINER STARTS *** -->
<div class="artigo-theme-container">	
	
	<!-- *** HEADER STARTS *** -->
	@include('front.header')
	<!-- *** HEADER ENDS *** -->

	<!-- *** CONTENT WRAP STARTS *** -->
	@yield('content')
	<!-- *** CONTENT WRAP ENDS *** -->

	<!-- *** FOOTER STARTS *** -->
	@include('front.footer')	
	<!-- *** FOOTER ENDS *** -->	
	
</div>
<!-- *** THEME CONTAINER ENDS *** -->

<!-- *** FULLSCREEN SEARCH POPUP STARTS *** -->
@include('front.searchpopup')
<!-- *** FULLSCREEN SEARCH POPUP ENDS *** -->

<!-- *** FULLSCREEN AUTHOR POPUP STARTS *** -->
@include('front.authorpopup')
<!-- *** FULLSCREEN AUTHOR POPUP ENDS *** -->

<!-- JQUERY INCLUDES -->
<script src="{{ URL::asset('frontend/js/jquery.js') }}"></script>
<script src="{{ URL::asset('frontend/js/plugins.js') }}"></script>
<script src="{{ URL::asset('frontend/js/functions.js') }}"></script>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyBq7JztrfBK4M8qOmdBql2DOV8PH3coVUE">
</script>
<script src="{{ URL::asset('frontend/js/jquery.gmap.js') }}"></script>

</body>

<!-- Mirrored from sthemes.co/html/artigo/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Aug 2018 06:01:34 GMT -->
</html>