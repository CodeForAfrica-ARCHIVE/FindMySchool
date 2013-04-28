<?php

class School_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public function action_index()
	{
		$school_name = strtoupper(urldecode($school_name));
		$school_data = DB::table('kcse_2006_2011')->where('SCHOOL', '=', $school_name)->get();
		
		return View::make('home.index')
			->with('schools', $school_data);
	}
	
	public function action_browse($page_no)
	{
		$limit_start = 0;
		if ($page_no != 1) {
			$limit_start = ($page_no - 1) * 10;
		}
		
		$schools = DB::table('kcse_2006_2011_school_distinct')
			->take($limit_start.',10')
			->get();
		
		return View::make('school.browse')
			->with('schools', $schools);
	}
	
	public function action_profile($school_name, $school_id)
	{
		$school_name = str_replace('[z]', '-', strtoupper(urldecode(str_replace('-', '+', $school_name))));
		$school_data = DB::table('kcse_2006_2011')->where('SCHOOL', '=', $school_name)->take(6)->get();
		
		return View::make('school.profile')
			->with('school_data', $school_data);
	}
	
	public function action_search()
	{
		$search_term = Input::get('s');
		$search_term = trim(strtoupper(urldecode($search_term)));
		$schools = DB::table('kcse_2006_2011')
			->where('SCHOOL', 'LIKE', '%'.$search_term.'%')
			->distinct()
			->take(10)->get();
		
		return View::make('school.search')
			->with('schools', $schools);
	}

}