@layout('templates.main')

@section('title')
Find My School .Ke | Home
@endsection

@section('navigation')
    @parent
    <!--<li><a href="#">About</a></li>-->
@endsection

@section('content')
	<?php foreach ($schools as $school) { 
		$school_name_url = str_replace('+', '-', urlencode(strtolower(str_replace('-', '[z]', $school->name))));
	?>
		<a href="/school/profile/{{$school_name_url}}/{{$school->id}}">{{$school->name}}</a><br />
	<?php } ?>
	
	<div class="row" style="margin-top: 30px; margin-bottom: 30px;">
		<div class="span3">
			<p style="text-align: center;"><a href="http://twaweza.org" target="_blank">
				<img src="http://findmyschool.co.ke/assets/img/logos/twaweza.png" alt="Twaweza">
			</a></p>
			<h3 style="line-height: 100%;">Welcome To Find My School .Ke</h3>
			<p><b>Find My School</b> is your platform to easily find the school for you in these three simple ways.</p>
			<!-- AddThis Button BEGIN 
			<div class="addthis_toolbox addthis_default_style " style="bottom: 0px;">
			<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
			<a class="addthis_button_tweet"></a>
			</div>
			 AddThis Button END -->
		</div>
		<div class="span9">
			<dl class="dl-horizontal">
				<dt><p><img src="http://quickimage.it/65/555555/ffffff/&amp;text=1" class="img-circle"><br></p></dt>
				<dd>
					<h4>Location: <small>Discover Schools Near You</small></h4>
					<p>Select a location on our <b>interactive map</b> and discover schools near you.</p>
				</dd>
				<dt><p><img src="http://quickimage.it/65/555555/ffffff/&amp;text=2" class="img-circle"><br></p></dt>
				<dd>
					<h4>Exam Scores: <small>Which school would select you based on a given score</small></h4>
					<p>Using <b>Performance</b> and <b>Placement Data</b> from the <b>Ministry of Education</b> we help find your most probable <b>Secondary School</b> placement.</p>
				</dd>
				<dt><p><img src="http://quickimage.it/65/555555/ffffff/&amp;text=3" class="img-circle"><br></p></dt>
				<dd>
					<h4>Search Results: <small>Enter the School Name and Hit Enter</small></h4>
					<p>Search schools' <b>KCPE</b> and <b>KCSE</b> results.</p>
				</dd>
			</dl>
		</div>
	</div>
	
	<div class="header">
	    
	    <form method="get" action="/school/search/">
	    	<input type="text" name="s" value="" />
	    	<input type="submit" name="" value="Submit" />
	    </form>
	</div>
	
@endsection