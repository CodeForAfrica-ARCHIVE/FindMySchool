<section class="container" >
	<div class="row" style="margin-top: 30px; margin-bottom: 30px;">
		<div class="span3">
			<p style="text-align: center;"><a href="http://twaweza.org" target="_blank">
				<img src="<?php echo base_url(); ?>assets/img/logos/twaweza.png" alt="Twaweza" />
			</a></p>
			<h3 style="line-height: 100%;">Welcome To Find My School .Ke</h3>
			<p><b>Find My School</b> is your platform to easily find the school for you in these three simple ways.</p>
			<!-- AddThis Button BEGIN 
			<div class="addthis_toolbox addthis_default_style " style="bottom: 0px;">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			</div>
			 AddThis Button END -->
		</div>
		<div class="span9">
			<dl class="dl-horizontal">
				<dt><p><img src="http://quickimage.it/65/555555/ffffff/&text=1" class="img-circle"><br/></p></dt>
				<dd>
					<h4>Location: <small>Discover Schools Near You</small></h4>
					<p>Select a location on our <b>interactive map</b> and discover schools near you.</p>
				</dd>
				<dt><p><img src="http://quickimage.it/65/555555/ffffff/&text=2" class="img-circle"><br/></p></dt>
				<dd>
					<h4>Marks Comparison: <small>What School Would Pick You Against Your Marks</small></h4>
					<p>Using <b>Performance</b> and <b>Placement Data</b> from the <b>Ministry of Education</b> we help find your most probable <b>Secondary School</b> placement.</p>
				</dd>
				<dt><p><img src="http://quickimage.it/65/555555/ffffff/&text=3" class="img-circle"><br/></p></dt>
				<dd>
					<h4>Search Results: <small>Enter the School Name and Hit Enter</small></h4>
					<p>Search schools' <b>KCPE</b> and <b>KCSE</b> results.</p>
				</dd>
			</dl>
		</div>
	</div>
	
</section>


<!-- SEARCH SECTION -->

<section style="background-color: #333; text-align: center; color: #fff;">
	<div class="container" style="padding: 30px 0 40px;">
		<h2 style="margin-bottom: 0;">View School Results</h2>
		<h2 style="margin-top: 0; line-height: 15px;"><small>Primary &amp; Secondary</small></h2>
		<div class="input-append" style="margin: 10px auto; display: inline-block;">
			<input type="text" class="span4" id="search_term" placeholder="School Name" onkeypress="return runScript(event)"  style="font-size: 18px; line-height: 25px; height: 23px; padding: 10px 10px 10px 15px;">
			<button class="btn btn-large" id="search_results_btn" type="button"><i class="icon-search"></i> Search</button>
		</div>
		<p>example: <a href="#" class="search-example">Alliance Secondary School</a></p>
	</div>
</section>


<!-- DISCOVER SECTION -->

<section style="background: #fff url('<?php echo base_url(); ?>assets/img/bg/nearme.png') repeat-x center top; padding-bottom: 30px;">

	<div class="container">
		<div class="page-header" style="border-bottom: 0; padding-bottom: 0px; padding-top: 9px; margin: 20px 0 30px; border-top: 1px solid #eee; text-align: center;">
			<h2>Discover Schools Near You</h2>
		</div>
		
		<p class="lead" style="text-align: center;">Find schools near you using our <b>interactive map</b>. Simply drag the marker on the map below and hit "<b>Discover Schools</b>".
			Also make sure to <b>zoom in and out</b> to get a better sense of loaction.</p>
		
		<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960-up.png') no-repeat center top; padding-top: 4px;">
			<div id="map_canvas" style="height: 300px; width: 100%;">
				<table style="height: 100%; width: 100%; vertical-align: middle; text-align: center;" >
					<tbody><tr><td>
						<p><img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" /> Loading map...</p>
					</td></tr></tbody>
				</table>
			</div>
		</div>
		<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960.png') no-repeat center top; padding-top: 4px;"></div>
		
		<p style="text-align: center; margin-top: 20px;">
			<a href="javascript:setDiscLocation();" class="btn btn-large btn-primary">
				<i class="icon-globe" style="visibility: hidden;"></i>Discover Schools <i class="icon-globe icon-white"></i>
		</a></p>
	</div>
	
</section>


<!-- JS Scripts for this Page -->

<!-- BY SEARCH -->

<script type="text/javascript">
	
	// Actual Search
	var search_term;
	var search_schools_btn = document.getElementById("search_results_btn");
	search_schools_btn.onclick = function() {
		search_schools_btn.innerHTML="<i class=\"icon-search icon-white\"></i> Please wait...";
		search_term = document.getElementById("search_term").value;
		window.location.href = "<?php echo base_url() ?>results/search/"+search_term;
	}
	
	function runScript(e) {
	    if (e.keyCode == 13) {
	    	search_schools_btn.innerHTML="<i class=\"icon-search icon-white\"></i> Please wait...";
	        search_term = document.getElementById("search_term").value;
	        window.location.href = "<?php echo base_url() ?>results/search/"+search_term;
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
				window.location.href = "<?php echo base_url() ?>marks/compare/"+county_name+":"+county_id+":"+marks_in;
			} else {
				$('#marks_ctrl_group').addClass('control-group error');
			}
		}
		
	}
</script>


<!-- BY LOCATION -->

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
	center: nairobi
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
	window.location.href = "<?php echo base_url() ?>discover/locate/"+disc_lat+":"+disc_long;
}
	
</script>


<!-- AddThis Script -->
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508d41213e72f77b"></script>

