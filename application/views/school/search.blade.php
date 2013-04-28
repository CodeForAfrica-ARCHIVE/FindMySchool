@layout('templates.main')

@section('title')
FMS Ke | Search
@endsection

@section('navigation')
    @parent
    <li><a href="#">About</a></li>
@endsection

@section('content')
	<?php foreach ($schools as $school) {
		$school_name_url = str_replace('+', '-', urlencode( strtolower ( str_replace('-', '[z]', $school->school) ) ) );
	?>
		<a href="/school/profile/{{$school_name_url}}/0">{{$school->school}}</a><br />
	<?php } ?>
@endsection
