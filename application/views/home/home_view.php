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
	
	<div class="row-fluid" style="text-align: center;">
		<ul class="thumbnails">
		
			<!-- BY LOCATION -->
			<li class="span4">
				<div class="thumbnail" style="background: #fff url('<?php echo base_url(); ?>assets/img/bg/nearme.png') no-repeat center top;">
					<div class="caption">
						<h3>Location</h3>
						<p>Find schools near you using our <b>interactive map</b>. Simply drag the marker on the map below and hit "<b>Discover</b>".</p>
						<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960-up.png') no-repeat center top; padding-top: 4px;">
							<div id="map_canvas" style="height: 200px; width: 100%;">
								<table style="height: 100%; width: 100%; vertical-align: middle; text-align: center;" >
									<tbody><tr><td>
										<p><img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" /> Loading map...</p>
									</td></tr></tbody>
								</table>
							</div>
						</div>
						<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960.png') no-repeat center top; padding-top: 4px; margin-bottom: 12px;"></div>
						<p style="margin-bottom: 5px;">
							<a href="#enlargeMap" role="button" class="btn" data-toggle="modal"><i class="icon-fullscreen"></i> Enlarge Map</a>
							<a href="#" onclick="setDiscLocation()" class="btn btn-primary"><i class="icon-globe icon-white"></i> Discover</a>
						</p>
					</div>
				</div>
				
				<!-- Enlarge Map MODAL-->
				<div id="enlargeMap" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3>Location <small>Enlarged Map</small></h3>
					</div>
					<div class="modal-body">
						<p>Find schools near you using our <b>interactive map</b>. Simply drag the marker on the map below and hit "<b>Discover</b>".</p>
						<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960-up.png') no-repeat center top; padding-top: 4px;">
							<div id="map_canvas_large" style="height: 300px; width: 100%;">
								<table style="height: 100%; width: 100%; vertical-align: middle; text-align: center;" >
									<tbody><tr><td>
										<p><img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt="" /> Loading map...</p>
									</td></tr></tbody>
								</table>
							</div>
						</div>
						<div style="background: #fff url('<?php  echo base_url(); ?>assets/img/bg/shadow-960.png') no-repeat center top; padding-top: 4px; margin-bottom: 12px;"></div>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
						<a href="#" onclick="setDiscLocation()" class="btn btn-primary"><i class="icon-globe icon-white"></i> Discover</a>
					</div>
				</div>
				
			</li>
			
			<!-- BY MARKS -->
			<li class="span4">
				<div class="thumbnail" style="">				
					<div class="caption">
						<h3>Marks Comparison</h3>
						<p>Let us help you find the <b>Secondary School</b> you are most likely to end up in. Simply select the <b>County</b> your <b>Primary School</b> is in and your <b>KCPE marks</b> and let us do the rest.</p>
						
						<hr />
						
						<div id="fms_engine" class="well" style="margin-top: 28px;">
						<div id="county_ctrl_group"><select id="county_select">
							<option value="0">Select Your County</option>
							<option value="1">Baringo</option>
							<option value="2">Bomet</option>
							<option value="3">Bungoma</option>
							<option value="4">Busia</option>
							<option value="5">Elgeyo Marakwet</option>
							<option value="6">Embu</option>
							<option value="7">Garissa</option>
							<option value="8">Homa Bay</option>
							<option value="9">Isiolo</option>
							<option value="10">Kajiado</option>
							<option value="11">Kakamega</option>
							<option value="12">Kericho</option>
							<option value="13">Kiambu</option>
							<option value="14">Kilifi</option>
							<option value="15">Kirinyaga</option>
							<option value="16">Kisii</option>
							<option value="17">Kisumu</option>
							<option value="18">Kitui</option>
							<option value="19">Kwale</option>
							<option value="20">Laikipia</option>
							<option value="21">Lamu</option>
							<option value="22">Machakos</option>
							<option value="23">Makueni</option>
							<option value="24">Mandera</option>
							<option value="25">Marsabit</option>
							<option value="26">Meru</option>
							<option value="27">Migori</option>
							<option value="28">Mombasa</option>
							<option value="29">Murang’a</option>
							<option value="30">Nairobi</option>
							<option value="31">Nakuru</option>
							<option value="32">Nandi</option>
							<option value="33">Narok</option>
							<option value="34">Nyamira</option>
							<option value="35">Nyandarua</option>
							<option value="36">Nyeri</option>
							<option value="37">Samburu</option>
							<option value="38">Siaya</option>
							<option value="39">Taita Taveta</option>
							<option value="40">Tana River</option>
							<option value="41">Tharaka Nithi</option>
							<option value="42">Trans Nzoia</option>
							<option value="43">Turkana</option>
							<option value="44">Uasin Gishu</option>
							<option value="45">Vihiga</option>
							<option value="46">Wajir</option>
							<option value="47">West Pokot</option>
						</select></div>
						<div id="marks_ctrl_group" class="input-append">
							<input class="input-mini" id="appendedInput" size="16" type="text" placeholder="400"><span class="add-on">out of 500</span>
						</div>
						
						<p style="margin: 15px 0 0;">
							<a href="javascript:run_engine();" class="btn btn-primary">
								<i class="icon-list-alt icon-white" style="visibility: hidden;"></i>Find My School 
								<i class="icon-arrow-right icon-white"></i>
							</a>
						</p>
						
						</div>
					</div>
				</div>
			</li>
			
			
			<!-- BY SEARCH -->
			<li class="span4">
				<div class="thumbnail">
					<div class="caption">
						<h3>Search Results</h3>
						<p>Find a school's <b>result</b> by entering the name and hitting 'Search'.</p>
						<hr/>
						<div style="margin-bottom: 15px;">
							<input type="text" class="search-query" id="search_term" placeholder="Search Schools..." onkeypress="return runScript(event)" style="width: 80%;">
						</div>
						<p>
							<a href="#" class="btn btn-primary" id="search_results_btn"><i class="icon-search icon-white"></i> Search</a>
						</p>
					</div>
				</div>
				<div class="home-social">
					<h3 style="color: #555;">Share FMS.Ke</h3>
					<p>
						<a href="javascript:void(0);" name="Share_TW" title="Share on Twitter | FMS Ke" onclick="javascript:window.open('http://twitter.com/home?status=Find%20My%20School%20Ke%20-%20http://findmyschool.co.ke%20%23FMSke','FMS.Ke','width=550,height=270');">
							<img src="<?php echo base_url(); ?>assets/img/social/twitter.png" alt="Share on Twitter"></a>
						<a href="javascript:void(0);" name="Share_FB" title="Share on FB | FMS Ke" onclick="javascript:window.open('http://www.facebook.com/sharer.php?u=http%3A%2F%2Ffindmyschool.co.ke','FMS.Ke','width=550,height=270');">
							<img src="<?php echo base_url(); ?>assets/img/social/facebook.png" alt="Share on Facebook"></a>
						<a href="https://plus.google.com/share?url=findmyschool.co.ke" onclick="javascript:window.open(this.href,
						  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						  <img src="<?php echo base_url(); ?>assets/img/social/googleplus.png" alt="Share on Google Plus"></a>
					</p>
				</div>
			</li>
		</ul>
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

<!-- AddThis Script -->
<script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-508d41213e72f77b"></script>

