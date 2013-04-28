@layout('templates.main')

@section('title')
FMS Ke | Profile
@endsection

@section('navigation')
    @parent
    <li><a href="#">About</a></li>
@endsection

@section('content')
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript">
	      google.load("visualization", "1", {packages:["corechart"]});
	      google.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          ['Year', 'Mean Grade'],
	          <?php foreach ($school_data as $data) { ?>
	          	['{{$data->year}}', {{$data->mean_grade}}],
	          <?php } ?>
	        ]);
	
	        var options = {
	          title: 'School Performance',
	          vAxis: {maxValue: 12, minValue:0 }
	        };
	
	        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
	        chart.draw(data, options);
	      }
	</script>
	
	
	<div id="chart_div"></div>
	
	<?php foreach ($school_data as $data) { ?>
		['{{$data->year}}', {{$data->mean_grade}}],
	<?php } ?>
	
@endsection