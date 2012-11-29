<section class="container">
	<div class="page-header">
		<h2>Search <small>Results for "<?php echo $search_term; ?>"</small></h2>
	</div>
	<div class="container">
		<ul class="breadcrumb pull-left">
		  <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		  <li class="active"><a href="<?php echo base_url(); ?>results">Results</a> <span class="divider">/</span></li>
		  <li class="active">Search</li>
		</ul>
		<div class="pull-right">
			<div class="input-append">
				<input class="span4" id="appendedInputButtons" size="16" type="text" placeholder="Search..." onkeypress="return runScript(event)" value="<?php echo urldecode($search_term); ?>">
				<a class="btn" href="#" id="search_results_btn"><i class="icon-search"></i> Search</a>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="span6">
			<div class="page-header">
				<h3>KCPE Results</h3>
			</div>
			<div id="kcpe_results">
				<p>
					<img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt=""> Finding Schools...
				</p> 
			</div>
		</div>
		<div class="span6">
			<div class="page-header">
				<h3>KCSE Results</h3>
			</div>
			<div id="kcse_results">
				<p style="text-align: center;">
					<!--<img src="<?php echo base_url(); ?>assets/img/spinner_big.gif" alt="Spinner" />-->
					Coming Soon...
				</p> 
			</div>
		</div>
	</div>
	
	<div>
		
	</div>
</section>

<!-- Search Script -->
<script type="text/javascript">
	var search_term = "<?php echo urldecode($search_term); ?>".toUpperCase();
	var json_kcpe;
	var json_kcse;
	var json_dis;
	
	var api_url = "<?php echo base_url(); ?>api/v1/search/name/";
	
	function run_search_kcpe() {
		var xmlhttp;
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				json_kcpe = jQuery.parseJSON(xmlhttp.responseText);
				if (json_kcpe.length === 1 || json_kcpe.length === 0){
					document.getElementById("kcpe_results").innerHTML = "<p>No results</p>";
				} else {
					/*  Link District  */
					json_dis = jQuery.parseJSON(<?php echo $district_result ?>);
					for (var i = 0; i<json_kcpe.length; i++){
						for (var i = 0; i<json_kcpe.length; i++){
							
						}
					}
					
					/*
						DISPLAY RESULTS	 */

					kcpe_res = "<ol class=\"results\">";
					kcpe_res += "<li><a href=\"<?php echo base_url(); ?>results/school/pri:"+
						json_kcpe[0]['CODE']+"\">"+
						"<p>"+toTitleCase(json_kcpe[0]['SCHOOL NAME'])+"</p>"+
						"</a></li>";
					
					for (var i = 1; i<json_kcpe.length; i++){
						kcpe_res += "<li><a href=\"<?php echo base_url(); ?>results/school/pri:"+
							json_kcpe[i]['CODE']+"\">"+
							"<p>"+toTitleCase(json_kcpe[i]['SCHOOL NAME'])+"</p>"+
							"</a></li>";
					}
					kcpe_res += "<ol>";
					document.getElementById("kcpe_results").innerHTML =  kcpe_res;
				}
				
			}
		}
		xmlhttp.open("GET", api_url+search_term, true);
		xmlhttp.send();
	}
	
	function toTitleCase(str) {
	    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	}
	
	run_search_kcpe();
	
</script>

<!-- Hit Search Script -->
<script type="text/javascript">

	var search_schools_btn = document.getElementById("search_results_btn");
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