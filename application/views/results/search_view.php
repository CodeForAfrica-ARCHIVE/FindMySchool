<section class="container">
	<div class="page-header">
		<h2>Search <small>Results for "<?php echo ucwords(strtolower(urldecode($search_term))); ?>"</small></h2>
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
				<h3>Primary Schools</h3>
			</div>
			<div id="pri-schools">
				<p>
					<img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt=""> Finding Schools...
				</p> 
			</div>
		</div>
		<div class="span6">
			<div class="page-header">
				<h3>Secondary Schools</h3>
			</div>
			<div id="sec-schools">
				<p>
					<img src="<?php echo base_url(); ?>assets/img/spinner.gif" alt=""> Finding Schools...
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
	var json_all;
	var json_pri;
	var json_sec;
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
				json_all = jQuery.parseJSON(xmlhttp.responseText);
				json_pri = json_all['pri_result'];
				json_sec = json_all['sec_result'];
				
				// Primary School Results
				
				if (json_pri.length === 0){
					document.getElementById("pri-schools").innerHTML = "<p>No results</p>";
				} else {
					
					/*	DISPLAY RESULTS	 */

					pri_res = "<ol class=\"results\">";
					
					for (var i = 0; i<json_pri.length; i++){
						pri_res += "<li><a href=\"<?php echo base_url(); ?>results/school/pri:"+
							json_pri[i]['CODE']+"\">"+
							"<p style=\"display:inline-block;\">"+toTitleCase(json_pri[i]['SCHOOL NAME'])+"</p></a> "+
							"<span class=\"label label-info\">"+unescape(toTitleCase(escape(json_pri[i]['DISTRICT_NAME'].toLowerCase())))+"</span></li>";
					}
					pri_res += "<ol>";
					document.getElementById("pri-schools").innerHTML =  pri_res;
				}
				
				// Secondary School Results
				
				if (json_sec.length === 0){
					document.getElementById("sec-schools").innerHTML = "<p>No results</p>";
				} else {
					
					/*	DISPLAY RESULTS	 */

					sec_res = "<ol class=\"results\">";
					
					for (var i = 0; i<json_sec.length; i++){
						sec_res += "<li><a href=\"<?php echo base_url(); ?>results/school/sec:"+
							json_sec[i]['School_ID']+"\">"+
							"<p style=\"display:inline-block;\">"+toTitleCase(json_sec[i]['SCHOOL'])+
							"</p></a></li>";
					}
					sec_res += "<ol>";
					document.getElementById("sec-schools").innerHTML =  sec_res;
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