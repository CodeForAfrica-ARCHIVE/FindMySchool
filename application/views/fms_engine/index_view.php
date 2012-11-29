<section class="container">
	<div class="page-header">
		<h2>Marks Comparison</h2>
	</div>
	<p class="lead">Let us help you find the <b>Secondary School</b> you are most likely to end up in. Simply select the County your Primary School is in and your <b>KCPE marks</b> and let us do the rest.</p>
	
	<form class="form-inline" style="text-align: center;">
		<p id="county_ctrl_group" class="lead" style="display: inline-block; "><b>County:</b> 
			<select id="county_select">
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
			</select>
		</p>
		
		<p class="lead" style="display: inline-block; margin-left: 10px; vertical-align: bottom;"><b>Marks: </b></p>
		<div id="marks_ctrl_group" class="input-append" style="display: inline-block;">
			<input class="input-mini" id="appendedInput" size="16" type="text" placeholder="400"><span class="add-on">out of 500</span>
		</div>
		
		<a href="javascript:run_engine();" class="btn btn-large" style="margin-left: 10px;">
			<i class="icon-arrow-right icon-white" style="visibility: hidden;"></i>Find My School <i class="icon-arrow-right"></i>
		</a>
	</form>
</section>


<!-- New Marks Comparison -->
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