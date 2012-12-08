<section class="container">
	
	
	<div class="page-header">
		<h2>Discover Schools Near You</h2>
	</div>
	<div class="container">
		<ul class="breadcrumb pull-left">
		  <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		  <li><a href="<?php echo base_url(); ?>discover">Discover</a> <span class="divider">/</span></li>
		  <li class="active">Location: <?php echo $loc ?></li>
		</ul>
	</div>
	
	<p class="lead" style="text-align: center;">Find schools near you using our <b>interactive map</b>. Simply drag the marker on the map below and hit "<b>Discover Schools</b>".
		Also make sure to <b>zoom in and out</b> to get a better sense of loaction.</p>
	
	<!-- MAP -->
	<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960-up.png') no-repeat center top; padding-top: 4px;">
		<div id="map_canvas" style="height: 250px; width: 100%;">
			<table style="height: 100%; width: 100%; vertical-align: middle; text-align: center;" >
				<tbody><tr><td>
					<p><img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" /> Loading map...</p>
				</td></tr></tbody>
			</table>
		</div>
	</div>
	<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960.png') no-repeat center top; padding-top: 4px; margin-bottom: 15px;"></div>
	
	<p style="text-align: center; margin-top: 20px;">
		<a href="javascript:setDiscLocation();" class="btn btn-large btn-primary">
			<i class="icon-globe" style="visibility: hidden;"></i>Discover Schools <i class="icon-globe icon-white"></i>
	</a></p>
	
	<!-- Results Listed -->
	<div class="row">
		<div class="span6">
			<div class="page-header">
				<h3>Primary Schools</h3>
			</div>
			<div id="pri_results">
				<p style="text-align: center;">
					<img src="<?php echo base_url(); ?>assets/img/spinner_big.gif" alt="Spinner" />
				</p> 
			</div>
		</div>
		<div class="span6">
			<div class="page-header">
				<h3>Secondary Schools</h3>
			</div>
			<div id="sec_results">
				<p style="text-align: center;">
					<img src="<?php echo base_url(); ?>assets/img/spinner_big.gif" alt="Spinner" />
				</p> 
			</div>
		</div>
	</div>
</section>

<!-- SCRIPTS -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?AIzaSyDl0_EPlseIlbNlYZDOzpua7VqXyH_LfeY&sensor=true"></script>

<!-- Results Listed GET -->
<script type="text/javascript">
	var json_pri;
	var json_sec;
	
	var get_url = "https://www.googleapis.com/fusiontables/v1/query?sql=";
	var sql_1 = encodeURIComponent("SELECT * FROM ");
	var sql_2 = encodeURIComponent(" ORDER BY ST_DISTANCE(Location1, LATLNG(<?php echo $disc_lat ?>,<?php echo $disc_long ?>)) LIMIT 10");
	var api_key = "&key=AIzaSyDl0_EPlseIlbNlYZDOzpua7VqXyH_LfeY";
	
	function run_search_pri(table_id) {
		var xmlhttp;
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				json_pri = jQuery.parseJSON(xmlhttp.responseText);
				if (json_pri.rows === null || json_pri.rows === undefined){
					document.getElementById("pri_results").innerHTML = "No results";
				} else {
					var pri_res = "<ol>";
					
					for (var i = 0; i<json_pri.rows.length; i++){
						var school_name = toTitleCase(json_pri.rows[i][1].toLowerCase());
						pri_res += "<li><p>"+school_name;
						pri_res += " <a id=\"primore"+i+"\" href=\"javascript:$('#pri"+i+"').slideDown('slow');\">More..</a></p>";
//						pri_res += " <a id=\"priless"+i+"\" href=\"javascript:$('#pri"+i+"').slideUp('slow');\">Less..</a></p>";
						pri_res += "<div id=\"pri"+i+"\" class=\"well\" style=\"display:none;\">";
						pri_res += "<p><b>School Type:</b> "+toTitleCase(json_pri.rows[i][3].toLowerCase())+"</p>";
						pri_res += "<p><b>Sponsor:</b> "+toTitleCase(json_pri.rows[i][4].toLowerCase())+"</p>";
						pri_res += "<p><b>Girls\\Boys\\Mixed:</b> "+toTitleCase(json_pri.rows[i][5].toLowerCase())+"</p>";
						pri_res += "<p><b>Boarding\\Day:</b> "+toTitleCase(json_pri.rows[i][6].toLowerCase())+"</p>";
						pri_res += "</div></li>";
					}
					
					pri_res += "</ol>";
					document.getElementById("pri_results").innerHTML =  pri_res;
				}
				
			}
		}
		xmlhttp.open("GET", get_url+sql_1+table_id+sql_2+api_key, true);
		xmlhttp.send();
	}
	
	function run_search_sec(table_id) {
		var xmlhttp;
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				json_sec = jQuery.parseJSON(xmlhttp.responseText);
				if (json_sec.rows === null || json_sec.rows === undefined){
					document.getElementById("sec_results").innerHTML = "No results";
				} else {
					var sec_res = "<ol>";
					for (var i = 0; i<json_sec.rows.length; i++){
						var school_name = toTitleCase(json_sec.rows[i][2].toLowerCase());
						sec_res += "<li><p>"+school_name;
						sec_res += " <a id=\"secmore"+i+"\" href=\"javascript:$('#sec"+i+"').slideDown('slow');\">More..</a></p>";
						sec_res += "<div id=\"sec"+i+"\" class=\"well\" style=\"display:none;\">";
						sec_res += "<p><b>School Type:</b> "+toTitleCase(json_sec.rows[i][4].toLowerCase())+"</p>";
						sec_res += "<p><b>Sponsor:</b> "+toTitleCase(json_sec.rows[i][5].toLowerCase())+"</p>";
						sec_res += "<p><b>Girls\\Boys\\Mixed:</b> "+toTitleCase(json_sec.rows[i][6].toLowerCase())+"</p>";
						sec_res += "<p><b>Boarding\\Day:</b> "+toTitleCase(json_sec.rows[i][7].toLowerCase())+"</p>";
						sec_res += "</div></li>";
					}
					sec_res += "</ol>";
					document.getElementById("sec_results").innerHTML = sec_res;
				}
			}
		}
		xmlhttp.open("GET", get_url+sql_1+table_id+sql_2+api_key, true);
		xmlhttp.send();
	}
	run_search_pri("1ZKdH9KCa_CD5qP2zWSsh0JG4xV2ctL3UGn_h22o");
	run_search_sec("18A1E240QpWbRU5ftsIu3biFvNk7DzhLz_5MJmGU");
	
	function toTitleCase(str) {
	    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	}
</script>


<!-- MAP DISPLAY -->
<script type="text/javascript">

	var disc_lat = <?php echo $disc_lat ?>;
	var disc_long = <?php echo $disc_long ?>;;
	
	var disc_loc = new google.maps.LatLng(disc_lat, disc_long);
	var marker;
	var map;
	
	var mapOptions = {
		zoom: 13,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		center: disc_loc
	};
	
	window.onload = function() {	
		
		map = new google.maps.Map(document.getElementById("map_canvas"),
			mapOptions);
		
		marker = new google.maps.Marker({
			map:map,
			draggable:true,
			animation: google.maps.Animation.DROP,
			position: disc_loc
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
		
		var layer_pri = new google.maps.FusionTablesLayer({
			query: {
				select: 'Location1',
				from: '1ZKdH9KCa_CD5qP2zWSsh0JG4xV2ctL3UGn_h22o',
				orderBy: 'ST_DISTANCE(Location1, LATLNG(<?php echo $disc_lat ?>,<?php echo $disc_long ?>))',
				limit: 15
			},
			map: map
		});
		
		var layer_sec = new google.maps.FusionTablesLayer({
			query: {
				select: 'Location1',
				from: '18A1E240QpWbRU5ftsIu3biFvNk7DzhLz_5MJmGU',
				orderBy: 'ST_DISTANCE(Location1, LATLNG(<?php echo $disc_lat ?>,<?php echo $disc_long ?>))',
				limit: 15
			},
			map: map
		});
		
	}
	
	function setDiscLocation() {
		var point = marker.getPosition();
		disc_lat = point.lat();
		disc_long = point.lng();
		window.location.href = "<?php echo base_url() ?>discover/locate/"+disc_lat+":"+disc_long;
	}
</script>
