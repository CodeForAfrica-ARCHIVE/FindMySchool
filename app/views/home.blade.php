@extends('layout.default')

@section('title')
	Find My School .Ke
@stop

@section('content')
    
    <?php
    
    	/* HOME VIEW
    	   =========
    	   /app/views/home.blade.php  */
    	
    ?>
    
    <!-- LATEST HEADLINE SECTION -->
    
    <section style="background: #fff url('/assets/img/bg/home-header.jpg') no-repeat center top; background-size: cover; padding-top: 13px;">
    	<div class="container" >
    		<!-- Latest News Headlines Bite -->
    		<div class="alert alert-info">
    			<button type="button" class="close" data-dismiss="alert">×</button>
    			<span style="font-weight: bold;">Latest Headlines: </span>
    				
				<span id="news-bite">
					<a href="#" target="_blank">Loading <i class="icon-spinner icon-spin"></i></a>
				</span>
				<span id="news-bite-hidden" style="display: none;"></span>
    				
    			<span style="font-weight: bold;">
    				<a href="#" id="news-bite-prev"><i class="icon-chevron-left" style="padding: 3px;"></i></a>
    				<a href="#" id="news-bite-next"><i class="icon-chevron-right"></i></a>
    			</span>
    		</div>
    		
    		<div style="text-align: center;">
    			<div class="home-learn-more">
    				<img src="/assets/img/air-home.png" id="" />
    			</div>
    		</div>
    	</div>
    </section>
    
    
    <!-- SCHOOL RESULTS SECTION -->
    
    <section style="text-align: center; border-top: 1px solid #d4d4d4;">
    
    	<div class="container" style="padding: 30px 0 40px;">
    		
    		<h1 style="margin-bottom: 0;">School Results</h1>
    		<h2 style="margin-top: 0; line-height: 15px;"><small>Primary &amp; Secondary</small></h2>
    		
    		
    		<div class="row">
    			<div class="span6" style="text-align: left;">
    				<div class="page-header" style="margin-bottom: 15px;">
    					<h3 style="margin-bottom: 0;">Top Primary Schools 2011</h3>
    				</div>
    				<div class="top-schools" id="pri_results">
    					<ol>
    						<?php
    							foreach ($top_primary_schools as $school) {
    								echo '<li><a href="/performance/school/pri:2011:'.$school->school_code.'">'.
    									ucwords(strtolower($school->school_name)).'</a></li>';
    							}
    						?>
    					</ol>
    				</div>
    			</div>
    			<div class="span6" style="text-align: right;">
    				<div>
    					<h3>Search Schools Database</h3>
    					<div class="input-append" style="margin: 10px auto; display: inline-block;">
    						<input type="text" class="span3" id="search_term" placeholder="School Name" onkeypress="return runScript(event)"  style="font-size: 18px; line-height: 25px; height: 22px; padding: 10px 10px 10px 15px;">
    						<button class="btn btn-large btn-purple" id="search_results_btn" type="button"><i class="icon-search"></i> Search</button>
    					</div>
    					<p>example: <a href="#" class="search-example">Alliance Secondary School</a></p>
    				</div>
    				<div class="clearfix"></div>
    				
    				<hr style="border-top: none;" />
    				
    				<div class="home-school-results-btns">
    					<p><a href="#" class="btn btn-large btn-purple"><i class="icon-list-alt"></i> Browse Secondary Schools</a></p>
    					<p><a href="#discover" class="btn btn-large btn-purple"><i class="icon-map-marker"></i> Discover Schools Near You</a></p>
    					<p><a href="#about" class="btn btn-large btn-purple"><i class="icon-info-sign"></i> About Find My School</a></p>
    				</div>
    				
    			</div>
    		</div>
    	</div>
    </section>
    
    <section style="background-color: #333; text-align: center; color: #fff;">
    	<div class="container" style="padding: 30px 0;">
    		<div class="row">
    			<div class="span4 offset2">
    				<h1 style="font-size: 60px;" id="pri_sum">22,787</h1>
    				<p class="lead">Primary Schools</p>
    			</div>
    			<div class="span4">
    				<h1 style="font-size: 50px;" id="sec_sum">6,958</h1>
    				<p class="lead">Secondary Schools</p>
    			</div>
    		</div>
			<div class="btn-group">
				<button class="btn btn-large btn-purple dropdown-toggle" data-toggle="dropdown">
					<b id="county_selected">National</b>
					<span class="caret" style="margin-top: 8px;"></span>
				</button>
				<ul class="dropdown-menu" id="county-list" style="color: #333; text-align: left; height: 200px; overflow-y: scroll;">
					<li><a onclick="javascript:county_numbers(0)">National</a></li>
					<li class="divider"></li>
					<?php
						$county_id = 1;
						foreach ($county_level_data as $county) {
							echo '<li><a style="cursor: pointer;"'.
								'onclick="javascript:county_numbers('.$county_id.')">'.
								ucwords(strtolower($county->county_name)).'</a></li>';
							$county_id = $county_id + 1;	
						}
					?>
				</ul>
			</div>
    	</div>
    </section>
    
    
    <!-- DISCOVER SECTION -->
    <a name="discover"></a>
    <section style="background: #fff url('/assets/img/bg/nearme.png') repeat-x center top; padding-bottom: 30px;">
    
    	<div class="container">
    		<div class="page-header" style="border-bottom: 0; padding-bottom: 0px; padding-top: 9px; margin: 20px 0 30px; border-top: 1px solid #eee; text-align: center;">
    			<h2>Discover Schools Near You</h2>
    		</div>
    		
    		<p class="lead" style="text-align: center;">Find schools near you using our <b>interactive map</b>. Simply drag the marker on the map below and hit "<b>Discover Schools</b>".
    			Also make sure to <b>zoom in and out</b> to get a better sense of loaction.</p>
    		
    		<div style="background: #fff url('/assets/img/bg/shadow-960-up.png') no-repeat center top; padding-top: 4px;">
    			<div id="map_canvas" style="height: 300px; width: 100%;">
    				<table style="height: 100%; width: 100%; vertical-align: middle; text-align: center;" >
    					<tbody><tr><td>
    						<p><img src="/assets/img/spinner.gif" alt="" /> Loading map...</p>
    					</td></tr></tbody>
    				</table>
    			</div>
    		</div>
    		<div style="background: #fff url('/assets/img/bg/shadow-960.png') no-repeat center top; padding-top: 4px;"></div>
    		
    		<p style="text-align: center; margin-top: 20px;">
    			<a href="javascript:setDiscLocation();" class="btn btn-large btn-purple">
    				<i class="icon-globe" style="visibility: hidden;"></i>Discover Schools <i class="icon-globe icon-white"></i>
    		</a></p>
    	</div>
    	
    </section>
    
    <hr class="container"/>
    
    
    <!-- VISUALISATIONS SECTION -->
    
    <a name="visualisations"></a>
    <section class="container">
    	<h2 style="text-align: center; margin-bottom: 15px;">Visualisations</h2>
    	<ul class="thumbnails">
			<li class="span4">
				<div class="thumbnail">
					<img data-src="/assets/js/vendor/holder.js/300x200" alt="">
					<h4>Thumbnail label</h4>
					<p>Thumbnail caption...</p>
				</div>
			</li>
			<li class="span4">
				<div class="thumbnail">
					<img data-src="/assets/js/vendor/holder.js/300x200" alt="">
					<h4>Thumbnail label</h4>
					<p>Thumbnail caption...</p>
				</div>
			</li>
			<li class="span4">
				<div class="thumbnail">
					<img data-src="/assets/js/vendor/holder.js/300x200" alt="">
					<h4>Thumbnail label</h4>
					<p>Thumbnail caption...</p>
				</div>
			</li>
    	</ul>
    	<p style="text-align: right; padding-right: 5px;"><a href="/visualisations">
    		View all visualisations <i class="icon-double-angle-right"></i>
    	</a></p>
    </section>
    
    <hr class="container"/>
    
    
    <!-- ABOUT SECTION -->
    <a name="about"></a>
    <section class="container">
    	<div class="row">
    		<div class="span7">
    			<div class="page-header">
    				<h3>About Find My School <span style="font-size: 20px;">.Ke</span></h3>
    			</div>
    			<p style="text-indent: 40px;">Ut mattis risus in elit fermentum nec lobortis nisl ultricies. Aliquam ligula ante, eleifend vitae euismod et, sodales et ligula. In accumsan ipsum a orci fermentum quis luctus libero sagittis. In imperdiet sem vel turpis varius in congue lectus iaculis. Duis quis venenatis leo. Suspendisse potenti. Integer tristique odio vel nisi lobortis pulvinar. Pellentesque commodo blandit nisi, a eleifend felis convallis sit amet. Etiam justo nunc, facilisis eget fringilla a, scelerisque ultricies risus.</p>
    			<br />
    			<p class="about-logos" style="">
    				<a href="http://www.knec.ac.ke" target="_blank" style="padding: 0 10px; border-right: 1px solid #777;">
    					<img src="/assets/img/logos/knec.jpg" alt="KNEC" style="height: 70px;" />
    				</a>
    				<a href="http://twaweza.org" target="_blank" style="padding: 0 10px; border-right: 1px solid #777;">
    					<img src="/assets/img/logos/twaweza.png" alt="Twaweza" style="height: 80px;" />
    				</a>
    				<a href="http://code4kenya.org" target="_blank" style="padding: 0 10px;">
    					<img src="/assets/img/logos/c4k_2.png" alt="Code4Kenya" style="height: 50px;" />
    				</a>
    			</p>
    		</div> <!-- /.span7 -->
    		<div class="span5">
    			<div class="page-header">
    				<h3>From Our Blog 
    					<small><a href="#"><i class="icon-link"></i> - blog.findmyschool.co.ke</a></small>
    				</h3>
    			</div>
    			<ul class="media-list">
    				<?php foreach (array(0,1,2) as $visualization) { ?>
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
    		</div> <!-- /.span5 -->
    	</div> <!-- /.row -->
    </section>
    
    
@stop

@section('scripts')

<!-- News Bite -->

<script type="text/javascript">

	// Latest News Headlines Feed
	var news_bites = new Array();
	var news_bite_pos = 0;
	
	$('#news-bite-hidden').feeds({
		feeds: {
			feed1: 'https://news.google.com/news/feeds?q=kenya%20education&output=rss'
		},
		max: 4,
		onComplete: function (entries) {
			news_bites = entries;
			$('#news-bite').html('<a href="'+news_bites[0].link+'" target="_blank">'+news_bites[0].title+'</a>');
		},
	});
	
	$('#news-bite-next').click( function() {
		if (news_bite_pos == 3) {
			$('#news-bite').html('<a href="'+news_bites[0].link+'" target="_blank">'+news_bites[0].title+'</a>');
			news_bite_pos = 0;
		} else {
			news_bite_pos = news_bite_pos + 1;
			$('#news-bite').html('<a href="'+news_bites[news_bite_pos].link+'" target="_blank">'+news_bites[news_bite_pos].title+'</a>');
		}
	});
	$('#news-bite-prev').click( function() {
		if (news_bite_pos == 0) {
			$('#news-bite').html('<a href="'+news_bites[3].link+'" target="_blank">'+news_bites[3].title+'</a>');
			news_bite_pos = 3;
		} else {
			news_bite_pos = news_bite_pos - 1;
			$('#news-bite').html('<a href="'+news_bites[news_bite_pos].link+'" target="_blank">'+news_bites[news_bite_pos].title+'</a>');
		}
	});
	
</script>


<!-- Search Schools -->

<script type="text/javascript">
	
	// Actual Search
	var search_term;
	var search_schools_btn = document.getElementById("search_results_btn");
	search_schools_btn.onclick = function() {
		search_schools_btn.innerHTML="<i class=\"icon-search icon-white\"></i> Please wait...";
		search_term = "q=" + document.getElementById("search_term").value;
		window.location.href = "/search?"+search_term;
	}
	
	function runScript(e) {
	    if (e.keyCode == 13) {
	    	search_schools_btn.innerHTML="<i class=\"icon-search icon-white\"></i> Please wait...";
	        search_term = "q=" + document.getElementById("search_term").value;
	        window.location.href = "/search?"+search_term;
	        return false;
	    }
	}
	
</script>

<!-- BY MARKS -->
<script type="text/javascript">
	var county_id = $('#county_select option:selected').val();
	var county_name = encodeURIComponent($('#county_select option:selected').text());
	var marks_in = $('#appendedInput').val();
	
	function run_engine() {
		county_id = $('#county_select option:selected').val();
		county_name = encodeURIComponent($('#county_select option:selected').text());
		marks_in = $('#appendedInput').val();
		
		if (county_id == 0) {
			$('#county_ctrl_group').addClass('control-group error');
		} else {
			$('#county_ctrl_group').removeClass('control-group error');
		}
		if (marks_in == "" || !$.isNumeric(marks_in)) {
			$('#marks_ctrl_group').addClass('control-group error');
		} else {
			$('#marks_ctrl_group').removeClass('control-group error');
		}
		
		if (county_id != 0 && $.isNumeric(marks_in)){
			if (marks_in>0 && marks_in<500) {
				window.location.href = "/marks/compare/"+county_name+":"+county_id+":"+marks_in;
			} else {
				$('#marks_ctrl_group').addClass('control-group error');
			}
		}
		
	}
</script>


<!-- County Numbers -->

<script type="text/javascript">
	var pri_sum = new Array();
	var sec_sum = new Array();
	var county_selected = new Array();
	<?php foreach ($county_level_data as $county) { ?>
		pri_sum.push(<?php echo $county->pri_sum; ?>);
		sec_sum.push(<?php echo $county->sec_sum; ?>);
		county_selected.push("<?php echo ucwords(strtolower($county->county_name)) ?>");
	<?php } ?>
	
	function county_numbers(id) {
		if (id==0) {
			$('#pri_sum').html(commaSeparateNumber(22787));
			$('#sec_sum').html(commaSeparateNumber(6958));
			$('#county_selected').html('National');
			return;
		}
		$('#pri_sum').html(commaSeparateNumber(pri_sum[id-1]));
		$('#sec_sum').html(commaSeparateNumber(sec_sum[id-1]));
		$('#county_selected').html(county_selected[id-1]);
	}
	function commaSeparateNumber(val){
		while (/(\d+)(\d{3})/.test(val.toString())){
			val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
		}
		return val;
	}
</script>


<!-- Discover Schools -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?AIzaSyDl0_EPlseIlbNlYZDOzpua7VqXyH_LfeY&sensor=true"></script>
<script type="text/javascript">

	var disc_lat = -1.29353;
	var disc_long = 36.819889;
	
	var nairobi = new google.maps.LatLng(-1.29353, 36.819889);
	var marker;
	var map;
	
	var mapOptions = {
		zoom: 11,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: nairobi,
		scrollwheel: false,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.LARGE,
		}
	};
	
	window.onload = function(){	
		
		map = new google.maps.Map(document.getElementById("map_canvas"),
			mapOptions);
		
		marker = new google.maps.Marker({
			map:map,
			draggable:true,
			animation: google.maps.Animation.DROP,
			position: nairobi
		});
		
		google.maps.event.addListener(marker, 'click', toggleBounce);
		//google.maps.event.addListener(marker, 'dragend', setDiscLocation);
		
		function toggleBounce() {
			if (marker.getAnimation() != null) {
				marker.setAnimation(null);
			} else {
				marker.setAnimation(google.maps.Animation.BOUNCE);
			}
		}
		
	}
	
	function setDiscLocation() {
		var point = marker.getPosition();
		disc_lat = point.lat();
		disc_long = point.lng();
		window.location.href = "/discover/locate/"+disc_lat+":"+disc_long;
	}
	
</script>


<!-- AddThis Script -->
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508d41213e72f77b"></script>

@stop