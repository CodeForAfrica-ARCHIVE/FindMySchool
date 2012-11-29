<section class="container">
	<div class="page-header">
		<h2>Marks Comparison</h2>
	</div>
	<div class="clearfix">
		<ul class="breadcrumb pull-left">
		  <li><a href="<?php echo base_url(); ?>">Home</a> <span class="divider">/</span></li>
		  <li><a href="<?php echo base_url(); ?>marks">Marks</a> <span class="divider">/</span></li>
		  <li class="active">Compare</li>
		</ul>
	</div>
	
	<p class="lead">Let us help you find the <b>Secondary School</b> you are most likely to end up in. Simply select the County your Primary School is in and your <b>KCPE marks</b> and let us do the rest.</p>
	
	<form class="form-inline" style="text-align: center;">
		<p id="county_ctrl_group" class="lead" style="display: inline-block; "><b>County:</b> 
			<select id="county_select">
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
			</select>
		</p>
		
		<p class="lead" style="display: inline-block; margin-left: 10px; vertical-align: top; margin-bottom: 10px; margin-top: 3px;"><b>Marks: </b></p>
		<div id="marks_ctrl_group" class="input-append" style="display: inline-block;">
			<input class="input-mini" id="appendedInput" size="16" type="text" placeholder="400"><span class="add-on">out of 500</span>
		</div>
		
		<a href="javascript:go_engine();" class="btn btn-large" style="margin-left: 10px;">
			<i class="icon-arrow-right icon-white" style="visibility: hidden;"></i>Find My School <i class="icon-arrow-right"></i>
		</a>
	</form>
	
	<hr />
	
	<p class="lead" style="text-align: center; margin-bottom: 0;">
		<small class="muted">County: <b><?php echo $county_in_name; ?> county</b> | Marks: <b><?php echo $marks_in; ?></b> out of 500</small>
	</p>
	<h3 style="text-align: center; margin-top: 0;">Secondary Schools</h3>
	
	<div style="">
		<table class="table table-hover" style="margin: 0 auto; width: 70%;" >
			<thead>
				<tr>
					<td></td>
				</tr>
			</thead>
			<tbody id="school-results">
				<tr><td colspan="3">
					<p style="text-align: center;"><img src="<?php echo base_url() ?>assets/img/spinner.gif" alt="" /> Finding schools...</p>
				</td></tr>
			</tbody>
		</table>
	</div>
	
</section>

<!-- Update Options Chosen -->
<script type="text/javascript">
	document.getElementById("county_select").selectedIndex = <?php echo $county_in_id; ?> - 1;
	document.getElementById("appendedInput").value = "<?php echo $marks_in; ?>";
</script>

<!-- MARKS COMPARISON -->
<script type="text/javascript">
	var eng_stuff;
	var json_result;
	var eng_res;
	
	var api_url = "<?php echo base_url(); ?>api/v1/fmsengine/marks/";
	
	function run_engine(gender, type, marks) {
		var xmlhttp;
		if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		eng_stuff = gender+":"+type+":"+marks;
				
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				json_result = jQuery.parseJSON(xmlhttp.responseText);
				if (json_result.length === 1 || json_result.length === 0){
					document.getElementById("kcpe_results").innerHTML = "<p>No results</p>";
				} else {
				
					eng_res = "<ol class=\"results\">";
					kcpe_res += "<li><a href=\"<?php echo base_url(); ?>results/school/pri:"+
						json_kcpe[0]['CODE']+"\">"+
						"<p>"+toTitleCase(json_kcpe[0]['SCHOOL NAME'])+"</p>"+
						"</a></li>";
					
					for (var i = 0; i<json_kcpe.length; i++){
						kcpe_res += "<li><a href=\"<?php echo base_url(); ?>results/school/pri:"+
							json_kcpe[i]['CODE']+"\">"+
							"<p>"+toTitleCase(json_kcpe[i]['SCHOOL NAME'])+"</p>"+
							"</a></li>";
					}
					
					document.getElementById("kcpe_results").innerHTML =  kcpe_res;
				}
						
			}
		}
		xmlhttp.open("GET", api_url+eng_stuff, true);
		xmlhttp.send();
	}
			
	function toTitleCase(str) {
	    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
	}
		
	run_search_kcpe("ALLGENDER","ALLTYPE","<?php echo $marks_in ?>");
</script>


<!-- New Marks Comparison -->
<script type="text/javascript">
	var county_id = $('#county_select option:selected').val();
	var county_name = encodeURIComponent($('#county_select option:selected').text());
	var marks_in = $('#appendedInput').val();
	
	function go_engine() {
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


