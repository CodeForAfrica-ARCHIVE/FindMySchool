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
	
	<h3><?php echo $school_name; ?></h3>
	<div class="row">
		<div class="span6">
			<div class="well">
				
				<ul id="kcpeTab" class="nav nav-tabs">
					<li><h4 style="margin: 7px 10px 0 0;">KCPE Results </h4></li>
					<li class="active"><a href="#2010" data-toggle="tab">2010</a></li>
					<li><a href="#2011" data-toggle="tab">2011</a></li>
				</ul>
				
				<div id="kcpeTabContent" class="tab-content">
					<div class="tab-pane fade in active" id="2010">
						<p><b>KNEC Code: </b> <?php echo $school_result[0]['CODE'] ?></p>
						<p><b>Students: </b> <?php echo $school_result[0]['ENTRY'] ?></p>
						<p><b>National Rank: </b> <?php echo $school_result[0]['NATIONAL'] ?></p>
						<hr />
						<div class="row">
							<div class="span2">
								<p><b>English: </b> <?php echo $school_result[0]['ENGLISH'] ?></p>
								<p><b>Kiswahili: </b> <?php echo $school_result[0]['KISWAHILI'] ?></p>
							</div>
							<div class="span2">
								<p><b>Maths: </b> <?php echo $school_result[0]['MATHS'] ?></p>
								<p><b>Science: </b> <?php echo $school_result[0]['SCIENCE'] ?></p>
							</div>
							<div class="span1" style="text-align: center;">
								<h5 style="margin-top: 0;">Mean<br /><?php echo $school_result[0]['MEAN']?></h5>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="2011">
						<p>Coming Soon...</p>
					</div>				
				</div>
			</div>
		</div>
		<div class="span6" style="">
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