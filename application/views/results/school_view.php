<section class="container">
	<div class="page-header">
		<h2>Results <small><?php echo $school_name; ?></small></h2>
	</div>
	<div class="container">
		<ul class="breadcrumb pull-left">
		  <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		  <li><a href="<?php echo base_url(); ?>results">Results</a> <span class="divider">/</span></li>
		  <li class="active">School: <?php echo $school_name; ?></li>
		</ul>
		<div class="pull-right">
			<div class="input-append">
				<input class="span4" id="appendedInputButtons" size="16" type="text" placeholder="School Name..." onkeypress="return runScript(event)">
				<a class="btn" href="#" id="search_schools_btn"><i class="icon-search"></i> Search</a>
			</div>
		</div>
	</div>
	
	<h3><?php echo $school_name; ?> <small>District: <a href="#"><?php echo $sch_district_name ?></a></small></h3>
	
	<br />
	
	<div class="row school-results">
		<div class="span6">
			<div class="well">
				<h4>KCPE Results 2010</h4>
				<hr>
				<p><b>KNEC Code: </b> <?php echo $res_2010[0]['CODE'] ?></p>
				<p><b>Students: </b> <?php echo $res_2010[0]['ENTRY'] ?></p>
				<p><b>National Rank: </b> <?php echo $res_2010[0]['NATIONAL'] ?></p>
				<hr />
				<div class="row">
					<div class="span2">
						<p><b>English: </b> <?php echo $res_2010[0]['ENGLISH'] ?></p>
						<p><b>Kiswahili: </b> <?php echo $res_2010[0]['KISWAHILI'] ?></p>
					</div>
					<div class="span2">
						<p><b>Maths: </b> <?php echo $res_2010[0]['MATHS'] ?></p>
						<p><b>Science: </b> <?php echo $res_2010[0]['SCIENCE'] ?></p>
					</div>
					<div class="span1" style="text-align: center;">
						<h5 style="margin-top: 0;">Mean<br /><?php echo $res_2010[0]['MEAN']?></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="well">
				<h4>KCPE Results 2011</h4>
				<hr>
				<p><b>KNEC Code: </b> <?php echo $res_2011[0]['CODE'] ?></p>
				<p><b>Students: </b> <?php echo $res_2011[0]['ENTRY'] ?>
					<?php 
						if ($res_2011[0]['ENTRY']>$res_2010[0]['ENTRY']){
							echo ' <img src="'.base_url().'assets/img/noun/arrow-up.png" alt="" />';
						}
						if ($res_2011[0]['ENTRY']==$res_2010[0]['ENTRY']){
							echo ' - ';
						}
						if ($res_2011[0]['ENTRY']<$res_2010[0]['ENTRY']){
							echo ' <img src="'.base_url().'assets/img/noun/arrow-down.png" alt="" />';
						}
					?>
				</p>
				<p><b>National Rank: </b> <?php echo $res_2011[0]['NATIONAL'] ?>
					<?php 
						if ($res_2011[0]['NATIONAL']<$res_2010[0]['NATIONAL']){
							echo ' <img src="'.base_url().'assets/img/noun/arrow-up.png" alt="" />';
						}
						if ($res_2011[0]['NATIONAL']==$res_2010[0]['NATIONAL']){
							echo ' - ';
						}
						if ($res_2011[0]['NATIONAL']>$res_2010[0]['NATIONAL']){
							echo ' <img src="'.base_url().'assets/img/noun/arrow-down.png" alt="" />';
						}
					?>
				</p>
				<hr />
				<div class="row">
					<div class="span2">
						<p><b>English: </b> <?php echo $res_2011[0]['ENGLISH'] ?> 
							<?php 
								if ($res_2011[0]['ENGLISH']>$res_2010[0]['ENGLISH']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-up.png" alt="" />';
								}
								if ($res_2011[0]['ENGLISH']==$res_2010[0]['ENGLISH']){
									echo ' - ';
								}
								if ($res_2011[0]['ENGLISH']<$res_2010[0]['ENGLISH']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-down.png" alt="" />';
								}
							?>
						</p>
						<p><b>Kiswahili: </b> <?php echo $res_2011[0]['KISWAHILI'] ?>
							<?php 
								if ($res_2011[0]['KISWAHILI']>$res_2010[0]['KISWAHILI']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-up.png" alt="" />';
								}
								if ($res_2011[0]['KISWAHILI']==$res_2010[0]['KISWAHILI']){
									echo ' - ';
								}
								if ($res_2011[0]['KISWAHILI']<$res_2010[0]['KISWAHILI']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-down.png" alt="" />';
								}
							?>
						</p>
					</div>
					<div class="span2">
						<p><b>Maths: </b> <?php echo $res_2011[0]['MATHS'] ?>
							<?php 
								if ($res_2011[0]['MATHS']>$res_2010[0]['MATHS']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-up.png" alt="" />';
								}
								if ($res_2011[0]['MATHS']==$res_2010[0]['MATHS']){
									echo ' - ';
								}
								if ($res_2011[0]['MATHS']<$res_2010[0]['MATHS']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-down.png" alt="" />';
								}
							?>
						</p>
						<p><b>Science: </b> <?php echo $res_2011[0]['SCIENCE'] ?>
							<?php 
								if ($res_2011[0]['SCIENCE']>$res_2010[0]['SCIENCE']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-up.png" alt="" />';
								}
								if ($res_2011[0]['SCIENCE']==$res_2010[0]['SCIENCE']){
									echo ' - ';
								}
								if ($res_2011[0]['SCIENCE']<$res_2010[0]['SCIENCE']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-down.png" alt="" />';
								}
							?>
						</p>
					</div>
					<div class="span1" style="text-align: center; width: 80px;">
						<h5 style="margin-top: 0;">Mean<br /><?php echo $res_2011[0]['MEAN']?>
							<?php 
								if ($res_2011[0]['MEAN']>$res_2010[0]['MEAN']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-up.png" alt="" />';
								}
								if ($res_2011[0]['MEAN']==$res_2010[0]['MEAN']){
									echo ' - ';
								}
								if ($res_2011[0]['MEAN']<$res_2010[0]['MEAN']){
									echo ' <img src="'.base_url().'assets/img/noun/arrow-down.png" alt="" />';
								}
							?>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</section>

<!-- SEARCH SCRIPT -->
<script type="text/javascript">
	var search_term;
	var search_schools_btn = document.getElementById("search_schools_btn");
	search_schools_btn.onclick = function() {
		search_term = document.getElementById("appendedInputButtons").value;
		window.location.href = "<?php echo base_url() ?>results/search/"+search_term;
	}
	
	function runScript(e) {
	    if (e.keyCode == 13) {
	        search_term = document.getElementById("appendedInputButtons").value;
	        window.location.href = "<?php echo base_url() ?>results/search/"+search_term;
	        return false;
	    }
	}
	
</script>