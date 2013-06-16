<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		
		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		
		<link rel="stylesheet" href="/assets/css/normalize.css">
		<link rel="stylesheet" href="/assets/css/main.css">
		<script src="/assets/js/vendor/modernizr-2.6.2.min.js"></script>
		
		<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
		<!--[if IE 7]>
			<link rel="stylesheet" href="/assets/css/font-awesome-ie7.min.css">
		<![endif]-->
		<link rel="stylesheet" href="/assets/css/style.css">
		
		<script src="/assets/js/vendor/jquery-1.10.1.min.js"></script>
		
	</head>
	
	<body>
		
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		
		<header>
			<div class="navbar navbar-fixed-top">
				<div class="beta">
					<p>Under Construction: We are in <span>BETA</span> <img src="/assets/img/noun/construction.png" alt=""/></p>
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
						<a class="brand" href="/" style="margin-top: 10px;">
							<img src="/assets/img/icon.png" style="height: 30px; margin-top: -15px; padding-right: 5px;"/>
							Find My School <small>.Ke</small>
						</a>
						
						<!-- Everything you want hidden at 940px or less, place within here -->
						<div class="nav-collapse pull-right">
							<ul class="nav">
								<!--<li style="padding-top: 7px;"><a href="/">Home</a></li>-->
								<li class="divider-vertical"></li>
								<li><a href="/discover">Discover<br/><span>Schools Near You</span></a></li>
								<!--<li class="divider-vertical"></li>
								<li><a href="/marks">Marks Comparison<br/><span>For Secondary School Placement</span></a></li>-->
								<li class="divider-vertical"></li>
								<li><a href="/results">Performance<br/><span>KCPE and KCSE Results</span></a></li>
								<li class="divider-vertical"></li>
								<li><a href="/about">About<br/><span>Find My School</span></a></li>
							</ul>
						</div>
					
					</div>
				</div>
			</div>
		</header>
		        
        <article style="margin-top: 87px;">
        
			@yield('content')
			
		</article>
		
		<!-- Footer stuff -->
		
		<footer>
			
			<section class="container">
				<div class="row">
				
					<div class="span4">
						<h3 class="footer-title">Recent Visualizations</h3>
						<ul class="media-list">
							<?php foreach (array(0,1,2,3) as $visualization) { ?>
								<li class="media">
									<a class="pull-left" href="#">
										<img class="media-object" data-src="/assets/js/vendor/holder.js/64x64">
									</a>
									<div class="media-body">
										<h4 class="media-heading">Media heading</h4>
										<p>...</p>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>
					
					<div class="span4">
						<h3 class="footer-title">Latest Headlines</h3>
						<div id="latest-headlines-stream">
							<!-- Latest Headlines Stream -->
						</div>
					</div>
					
					<div class="span4">
						<div>
							<h3 class="footer-title" >Latest Tweets 
								<a href="https://twitter.com/FindMySchool" class="twitter-follow-button" data-show-count="false">@FindMySchool</a>
							</h3>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
						
						<ul id="latest-tweets-stream">
							
						</ul>
						
					</div>
				</div>
				
			</section>
			
			<section class="container footer-links">
				<hr style="border-top: 0;"/>
				<p>
					<a href="/">Home</a> 
					<a href="#">About</a> 
					<a href="#">Help</a> - 
					<a href="#">Blog</a> 
					<a href="#">Twitter</a> - 
					<a href="#">API</a> 
					<a href="#">Terms</a>
					
					<a href="http://code4kenya.org" target="_blank" class="pull-right c4k-logo" style="border-left: 1px #333 solid;">
						<img src="/assets/img/logos/c4k_2.png" alt="Code4Kenya" style="height: 40px;"/>
					</a>
					<a href="http://twaweza.org" target="_blank" class="pull-right c4k-logo" style="border-left: 1px #333 solid;">
						<img src="/assets/img/logos/twaweza.png" alt="Twaweza" style="height: 68px;">
					</a>
					<a href="http://www.knec.ac.ke" target="_blank" class="pull-right c4k-logo">
						<img src="/assets/img/logos/knec.jpg" alt="KNEC" style="height: 60px;">
					</a>
				</p>
			</section>
			
		</footer>
		
		<!-- SCRIPTS -->
		
		<script src="/assets/js/plugins.js"></script>
		<script src="/assets/js/main.js"></script>
		<script src="/assets/js/bootstrap.min.js"></script>
        <script src="/assets/js/vendor/holder.js"></script>
        
        <script src="/assets/js/vendor/raphael.min.js"></script>
		
		<script src="/assets/js/vendor/jquery.feeds.js"></script>
        <script type="text/javascript">
        
        	// Latest News Feed
			
			$('#latest-headlines-stream').feeds({
				feeds: {
					feed1: 'https://news.google.com/news/feeds?q=kenya%20education&output=rss'
				},
				max: 3
			});
			
			// Latest Twitter Feed
			
			$('#latest-tweets-stream').feeds({
				feeds: {
					feed1: 'https://api.twitter.com/1/statuses/user_timeline/openinstitute.xml?count=5&include_rts=1'
				},
				xml: true,
				max: 5
			});
			
        </script>
		
		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
		
	</body>
</html>