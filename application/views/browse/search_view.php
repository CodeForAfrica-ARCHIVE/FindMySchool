<section class="container">
	<div class="page-header">
		<h2>Search <small>Results for "<?php echo $search_term; ?>"</small></h2>
	</div>
	<div class="container">
		<ul class="breadcrumb pull-left">
		  <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		  <li class="active"><a href="<?php echo base_url(); ?>browse">Browse</a> <span class="divider">/</span></li>
		  <li class="active">Search</li>
		</ul>
		<div class="pull-right">
			<div class="input-append">
				<input class="span4" id="appendedInputButtons" size="16" type="text" placeholder="Search..." onkeypress="return runScript(event)" value="<?php echo urldecode($search_term); ?>">
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
	
	<div>
		
	</div>
</section>

<!-- Search Script -->
<script type="text/javascript">
	var search_term = "<?php echo urldecode($search_term); ?>";
	var json_pri;
	var json_sec;
	
	var get_url = "https://www.googleapis.com/fusiontables/v1/query?sql=";
	var sql_1 = encodeURIComponent("SELECT NameofSchool FROM ");
	var sql_2 = encodeURIComponent(" WHERE NameofSchool LIKE '%<?php echo addslashes(strtoupper($search_term)); ?>%' LIMIT 15");
	var api_key = "&key=AIzaSyDl0_EPlseIlbNlYZDOzpua7VqXyH_LfeY";
	
	function run_search_pri(table_id) {
		var xmlhttp;
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				json_pri = jQuery.parseJSON(xmlhttp.responseText);
				if (json_pri.rows === null || json_pri.rows === undefined){
					document.getElementById("pri_results").innerHTML = "No results";
				} else {
			
					var pri_res = json_pri.rows[0][0];
					for (var i = 1; i<json_pri.rows.length; i++){
						pri_res = pri_res+"<br/>"+json_pri.rows[i][0];
					}
					document.getElementById("pri_results").innerHTML =  pri_res;
				}
				
			}
		}
		xmlhttp.open("GET", get_url+sql_1+table_id+sql_2+api_key, true);
		xmlhttp.send();
	}
	
	function run_search_sec(table_id) {
		var xmlhttp;
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				json_sec = jQuery.parseJSON(xmlhttp.responseText);
				if (json_sec.rows === null || json_sec.rows === undefined){
					document.getElementById("sec_results").innerHTML = "No results";
				} else {

					var sec_res = json_sec.rows[0][0];
					for (var i = 0; i<json_sec.rows.length; i++){
						sec_res = sec_res+"<br/>"+json_sec.rows[i][0];
					}
					document.getElementById("sec_results").innerHTML = sec_res;
				}
			}
		}
		xmlhttp.open("GET", get_url+sql_1+table_id+sql_2+api_key, true);
		xmlhttp.send();
	}
	
	run_search_pri("1FICuRpskdIAbgbnhJ8eOnrtKctmdxGn5wSSXK98");
	run_search_sec("1lV0Og2Km6_axy4WanqEfstylMY8XAzBleL42BNo");
	
</script>

<!-- Hit Search Script -->
<script type="text/javascript">

	var search_schools_btn = document.getElementById("search_schools_btn");
	search_schools_btn.onclick = function() {
		search_term = document.getElementById("appendedInputButtons").value;
		window.location.href = "<?php echo base_url() ?>browse/search/"+search_term;
	}
	
	function runScript(e) {
	    if (e.keyCode == 13) {
	        search_term = document.getElementById("appendedInputButtons").value;
	        window.location.href = "<?php echo base_url() ?>browse/search/"+search_term;
	        return false;
	    }
	}
	
</script>