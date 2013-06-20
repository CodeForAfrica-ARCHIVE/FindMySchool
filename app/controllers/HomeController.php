<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		
		$top_primary_schools = DB::table('kcpe_results_2011')->orderBy('national', 'asc')->take(10)->get();
		
		$data = array('top_primary_schools' => $top_primary_schools);
		return View::make('home', $data);
	}

}