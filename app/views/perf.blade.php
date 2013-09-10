@extends('layout.default')

@section('title')
	Performance | FMS .Ke
@stop

@section('content')
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
						<p><a href="#" class="btn btn-large btn-purple"><i class="icon-info-sign"></i> About Find My School</a></p>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
	<section style="background-color: #333; text-align: center; color: #fff;">
		<div class="container" style="padding: 30px 0;">
			<div class="row">
				<div class="span4 offset2">
					<h1 style="font-size: 60px;">22,787</h1>
					<p class="lead">Primary Schools</p>
				</div>
				<div class="span4">
					<h1 style="font-size: 50px;">6,958</h1>
					<p class="lead">Secondary Schools</p>
				</div>
			</div>
			<div class="btn-group">
				<button class="btn btn-large btn-purple dropdown-toggle" data-toggle="dropdown">
					<b>National</b> <span class="caret" style="margin-top: 8px;"></span>
				</button>
				<ul class="dropdown-menu">
					<li></li>
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
@stop