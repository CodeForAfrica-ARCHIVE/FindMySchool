@extends('layout.default')

@section('title')
	Discover
@stop

@section('content')
	<section class="container">
		
		<div class="page-header">
			<h2>Discover Schools Near You</h2>
		</div>
		<div class="container">
			<ul class="breadcrumb pull-left">
			  <li><a href="/">Home</a> <span class="divider">/</span></li>
			  <li class="active">Discover</li>
			</ul>
		</div>
		
		<p class="lead" style="text-align: center;">Find schools near you using our <b>interactive map</b>. Simply drag the marker on the map below and hit "<b>Discover Schools</b>".
			Also make sure to <b>zoom in and out</b> to get a better sense of location.</p>
		
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
			window.location.href = "/discover/locate/"+disc_lat+":"+disc_long;
		}
		
	</script>
@stop