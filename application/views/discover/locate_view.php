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
	
	<!-- MAP -->
	<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960-up.png') no-repeat center top; padding-top: 4px;">
		<div id="map_canvas" style="height: 200px; width: 100%;">
			<table style="height: 100%; width: 100%; vertical-align: middle; text-align: center;" >
				<tbody><tr><td>
					<p><img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" /> Loading map...</p>
				</td></tr></tbody>
			</table>
		</div>
	</div>
	<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960.png') no-repeat center top; padding-top: 4px; margin-bottom: 15px;"></div>
	
	<!-- Results Listed -->
	<div class="row">
		<div class="span6">
		</div>
		<div class="span6">
		</div>
	</div>
</section>

<!-- SCRIPTS -->

<!-- Results Listed GET -->


<!-- Map Display -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?AIzaSyDl0_EPlseIlbNlYZDOzpua7VqXyH_LfeY&sensor=true"></script>
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
				from: '1vql47h1gFTkOU2vd19gqMyKQZZD1JVcnEG3hIMw',
				orderBy: 'ST_DISTANCE(Location1, LATLNG(<?php echo $disc_lat ?>,<?php echo $disc_long ?>))',
				limit: 15
			},
			map: map
		});
		
		var layer_sec = new google.maps.FusionTablesLayer({
			query: {
				select: 'Location1',
				from: '1lV0Og2Km6_axy4WanqEfstylMY8XAzBleL42BNo',
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
