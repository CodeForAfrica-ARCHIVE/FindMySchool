<section class="container">
	
	
	<div class="page-header">
		<h2>Discover Schools Near You</h2>
	</div>
	<div class="container">
		<ul class="breadcrumb pull-left">
		  <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		  <li class="active">Discover</li>
		</ul>
	</div>
	
	<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960-up.png') no-repeat center top; padding-top: 4px;">
		<div id="map_canvas" style="height: 200px; width: 100%;">
			<table style="height: 100%; width: 100%; vertical-align: middle; text-align: center;" >
				<tbody><tr><td>
					<p><img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" /> Loading map...</p>
				</td></tr></tbody>
			</table>
		</div>
	</div>
	<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960.png') no-repeat center top; padding-top: 4px;"></div>
</section>

<!-- SCRIPTS -->

<!-- Map Display -->

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?AIzaSyDl0_EPlseIlbNlYZDOzpua7VqXyH_LfeY&sensor=true"></script>
<script type="text/javascript">

var disc_lat = -1.29353;
var disc_long = 36.819889;

var nairobi = new google.maps.LatLng(-1.29353, 36.819889);
var marker;
var map;

var mapOptions = {
	zoom: 13,
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