@extends('layout.default')

@section('title')
	<?php echo $school_name." | FMS .Ke"; ?>
@stop

@section('content')

	<section class="container">
		<div class="page-header">
			<h2>Performance <small><?php echo $school_name; ?></small></h2>
		</div>
		<div class="container">
			<ul class="breadcrumb pull-left">
			  <li><a href="/">Home</a> <span class="divider">/</span></li>
			  <li><a href="/performance">Performance</a> <span class="divider">/</span></li>
			  <li class="active">School: <?php echo $school_name; ?></li>
			</ul>
			<div class="pull-right">
				<div class="input-append">
					<input class="span4" id="appendedInputButtons" size="16" type="text" placeholder="School Name..." onkeypress="return runScript(event)">
					<a class="btn" href="#" id="search_schools_btn"><i class="icon-search"></i> Search</a>
				</div>
			</div>
		</div>
		
		<h3><?php echo $school_name; ?>
			<small>
				County: <a href="#"><?php echo $county_name; ?></a> | 
				District: <a href="#"><?php echo $district_name; ?></a>
			</small>
		</h3>
		
		<span class='st_facebook_hcount' displayText='Facebook'></span>
		<span class='st_twitter_hcount' displayText='Tweet'></span>
		<span class='st_googleplus_hcount' displayText='Google +'></span>
		<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
		<span class='st_email_hcount' displayText='Email'></span>
		
		<br /><br />
		
		<?php
			function dig_it($number) {
				return number_format((float)$number, 2, '.', '');
			}
		?>
		
		<div class="row school-results">
			<div class="span6">
				<div class="well">
					<h4>KCPE Results 2010</h4>
					<hr>
					<?php if (count($school_2010) == 0) { ?>
					
						<p style="text-align: center;">No results found.</p>
					
					<?php } else { ?>
					
						<p><b>KNEC Code: </b> <?php echo $school_2010[0]->school_code; ?></p>
						<p><b>Students Enrolled For Examination: </b> <?php echo $school_2010[0]->entry; ?></p>
						<p><b>National Rank: </b> <?php echo $school_2010[0]->national; ?></p>
						<hr />
						<div class="row">
							<div class="span2">
								<p><b>English: </b> <?php echo dig_it($school_2010[0]->english); ?></p>
								<p><b>Kiswahili: </b> <?php echo dig_it($school_2010[0]->kiswahili); ?></p>
							</div>
							<div class="span2">
								<p><b>Maths: </b> <?php echo dig_it($school_2010[0]->maths); ?></p>
								<p><b>Science: </b> <?php echo dig_it($school_2010[0]->science); ?></p>
							</div>
							<div class="span1" style="text-align: center;">
								<h5 style="margin-top: 0;">Mean<br /><?php echo dig_it($school_2010[0]->mean); ?></h5>
							</div>
						</div>
						
					<?php } ?>
				</div>
			</div>
			<div class="span6">
				<div class="well" style="margin-bottom: 5px;">
					<h4>KCPE Results 2011</h4>
					<hr>
					<?php if (count($school_2011) == 0) { ?>
					
						<p style="text-align:center;">No results found.</p>
						
					<?php } elseif (count($school_2010) == 0) { ?>
					
						<p><b>KNEC Code: </b> <?php echo $school_2011[0]->school_code; ?></p>
						<p><b>Students Enrolled For Examination: </b> <?php echo $school_2011[0]->entry; ?></p>
						<p><b>National Rank: </b> <?php echo $school_2011[0]->national; ?></p>
						<hr />
						<div class="row">
							<div class="span2">
								<p><b>English: </b> <?php echo dig_it($school_2011[0]->english); ?></p>
								<p><b>Kiswahili: </b> <?php echo dig_it($school_2011[0]->kiswahili); ?></p>
							</div>
							<div class="span2">
								<p><b>Maths: </b> <?php echo dig_it($school_2011[0]->maths); ?></p>
								<p><b>Science: </b> <?php echo dig_it($school_2011[0]->science); ?></p>
							</div>
							<div class="span1" style="text-align: center;">
								<h5 style="margin-top: 0;">Mean<br /><?php echo dig_it($school_2011[0]->mean); ?></h5>
							</div>
						</div>
						
					<?php } elseif (count($school_2010) != 0 && count($school_2011) != 0) { ?>
						
						<p><b>KNEC Code: </b> <?php echo $school_2011[0]->school_code; ?></p>
						<p><b>Students Enrolled For Examination: </b> <?php echo $school_2011[0]->entry; ?>
							<?php 
								if ($school_2011[0]->entry > $school_2011[0]->entry){
									echo ' <img src="/assets/img/noun/arrow-up.png" alt="" />';
								}
								if ($school_2011[0]->entry == $school_2010[0]->entry){
									echo ' - ';
								}
								if ($school_2011[0]->entry < $school_2010[0]->entry){
									echo ' <img src="/assets/img/noun/arrow-down.png" alt="" />';
								}
							?>
						</p>
						<p><b>National Rank: </b> <?php echo $school_2011[0]->national; ?>
							<?php 
								if ($school_2011[0]->national < $school_2010[0]->national){
									echo ' <img src="/assets/img/noun/arrow-up.png" alt="" />';
								}
								if ($school_2011[0]->national == $school_2010[0]->national){
									echo ' - ';
								}
								if ($school_2011[0]->national > $school_2010[0]->national){
									echo ' <img src="/assets/img/noun/arrow-down.png" alt="" />';
								}
							?>
						</p>
						<hr />
						<div class="row">
							<div class="span2">
								<p><b>English: </b> <?php echo dig_it($school_2011[0]->english); ?> 
									<?php 
										if ($school_2011[0]->english > $school_2010[0]->english){
											echo ' <img src="/assets/img/noun/arrow-up.png" alt="" />';
										}
										if ($school_2011[0]->english == $school_2010[0]->english){
											echo ' - ';
										}
										if ($school_2011[0]->english < $school_2010[0]->english){
											echo ' <img src="/assets/img/noun/arrow-down.png" alt="" />';
										}
									?>
								</p>
								<p><b>Kiswahili: </b> <?php echo dig_it($school_2011[0]->kiswahili); ?>
									<?php 
										if ($school_2011[0]->kiswahili > $school_2010[0]->kiswahili){
											echo ' <img src="/assets/img/noun/arrow-up.png" alt="" />';
										}
										if ($school_2011[0]->kiswahili == $school_2010[0]->kiswahili){
											echo ' - ';
										}
										if ($school_2011[0]->kiswahili < $school_2010[0]->kiswahili){
											echo ' <img src="/assets/img/noun/arrow-down.png" alt="" />';
										}
									?>
								</p>
							</div>
							<div class="span2">
								<p><b>Maths: </b> <?php echo dig_it($school_2011[0]->maths); ?>
									<?php 
										if ($school_2011[0]->maths > $school_2010[0]->maths){
											echo ' <img src="/assets/img/noun/arrow-up.png" alt="" />';
										}
										if ($school_2011[0]->maths == $school_2010[0]->maths){
											echo ' - ';
										}
										if ($school_2011[0]->maths < $school_2010[0]->maths){
											echo ' <img src="/assets/img/noun/arrow-down.png" alt="" />';
										}
									?>
								</p>
								<p><b>Science: </b> <?php echo dig_it($school_2011[0]->science); ?>
									<?php 
										if ($school_2011[0]->science > $school_2010[0]->science){
											echo ' <img src="/assets/img/noun/arrow-up.png" alt="" />';
										}
										if ($school_2011[0]->science == $school_2010[0]->science){
											echo ' - ';
										}
										if ($school_2011[0]->science < $school_2010[0]->science){
											echo ' <img src="/assets/img/noun/arrow-down.png" alt="" />';
										}
									?>
								</p>
							</div>
							<div class="span1" style="text-align: center; width: 80px;">
								<h5 style="margin-top: 0;">Mean<br /><?php echo dig_it($school_2011[0]->mean); ?>
									<?php 
										if ($school_2011[0]->mean > $school_2010[0]->mean){
											echo ' <img src="/assets/img/noun/arrow-up.png" alt="" />';
										}
										if ($school_2011[0]->mean == $school_2010[0]->mean){
											echo ' - ';
										}
										if ($school_2011[0]->mean < $school_2010[0]->mean){
											echo ' <img src="/assets/img/noun/arrow-down.png" alt="" />';
										}
									?>
								</h5>
							</div>
						</div>
					<?php } ?>
				</div> <!-- End .well -->
				<p><small>* The arrows are indicative of school drop or improvement from the previous year.</small></p>
			</div>
		</div>
		
		
	</section>
	
	<!-- SEARCH SCRIPT -->
	<script type="text/javascript">
		var search_term;
		var search_schools_btn = document.getElementById("search_schools_btn");
		search_schools_btn.onclick = function() {
			search_term = document.getElementById("appendedInputButtons").value;
			window.location.href = "/results/search/"+search_term;
		}
		
		function runScript(e) {
		    if (e.keyCode == 13) {
		        search_term = document.getElementById("appendedInputButtons").value;
		        window.location.href = "/results/search/"+search_term;
		        return false;
		    }
		}
		
	</script>
	
	<!-- ShareThis Scripts -->
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "ur-93a6ac82-f0bb-cb55-fda3-da4c51876a0d"});</script>
	
@stop