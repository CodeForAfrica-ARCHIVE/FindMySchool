<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-GB"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en-GB"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en-GB"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en-GB"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
	
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>
	
	<!--[if lt IE 7]>
		<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
	<![endif]-->
	
	<header>
		<div class="navbar navbar-fixed-top">
			<div class="beta">
				<p>Under Construction: We are in <span>BETA</span> <img src="img/noun/construction.png" alt=""></p>
			</div>
			<div class="navbar-inner">
				<div class="container" style="margin-top: 5px;">
					<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					
					<!-- Be sure to leave the brand out there if you want it shown -->
					<a class="brand" href="/">Find My School .Ke</a>
					
					<!-- Everything you want hidden at 940px or less, place within here -->
					<div class="nav-collapse pull-right">
						<ul class="nav">
							@section('navigation')
								<li style="padding-top: 7px;"><a href="/">Home</a></li>
								<li class="divider-vertical"></li>
								<li><a href="#">Discover<br><span>Schools Near You</span></a></li>
								<li class="divider-vertical"></li>
								<li><a href="#">By Score<br><span>See Schools By Scores</span></a></li>
								<li class="divider-vertical"></li>
								<li><a href="#">Performance<br><span>See Examination Results</span></a></li>
							@yield_section
						</ul>
					</div>
				
				</div>
			</div>
		</div>
	</header>
	
	<section class="container" style="margin-top: 85px;">
	
		@yield('content')
		
	</section>
    
    
    <script src="js/vendor/jquery-1.9.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src='//www.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
    
</body>
</html>