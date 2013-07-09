<?php

class APIv1Controller extends BaseController {

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
		//return View::make('discover');
		return Response::view('errors.404', array(), 404);
	}
	
	public function getSearch() {
		
//		$query_pri = $this->db->query("SELECT * FROM kcpe_2011 WHERE  MATCH `SCHOOL NAME` AGAINST ('".$search_term."');");
//		$query_sec = $this->db->query("SELECT * FROM KCSE_2006_2011 WHERE YEAR = 2011 AND MATCH `SCHOOL` AGAINST ('".$search_term."') ;");
		
		$search_term = urldecode(Input::get('q','0'));
		$filters = Input::get('f','0');
		
		$query_pri = DB::select('select * from kcpe_results_2011 where match (school_name, county_name, district_name) against ( ? ) limit 10', array($search_term));
		$query_sec = array();

		$array_result = array(
			"pri_result" => $query_pri,
			"sec_result" => $query_sec
		);

		$json_result = json_encode($array_result);
		echo $json_result;
	}

}