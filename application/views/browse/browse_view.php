<section class="container">
	<div class="page-header">
		<h2>Browse Schools</h2>
	</div>
	<div class="container">
		<ul class="breadcrumb pull-left">
		  <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		  <li class="active">Browse</li>
		</ul>
		<div class="pull-right">
			<div class="input-append">
				<input class="span4" id="appendedInputButtons" size="16" type="text" placeholder="Search..." onkeypress="return runScript(event)">
				<a class="btn" href="#" id="search_schools_btn"><i class="icon-search"></i> Search</a>
			</div>
		</div>
	</div>
	
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

<!-- SEARCH SCRIPT -->
<script type="text/javascript">
	var search_term;
	var search_schools_btn = document.getElementById("search_schools_btn");
	search_schools_btn.onclick = function() {
		search_term = document.getElementById("appendedInputButtons").value;
		window.location.href = "<?php echo base_url() ?>browse/search/"+search_term;
	}
	
	function runScript(e) {
	    if (e.keyCode == 13) {
	        search_term = document.getElementById("search_term").value;
	        window.location.href = "<?php echo base_url() ?>browse/search/"+search_term;
	        return false;
	    }
	}
	
</script>