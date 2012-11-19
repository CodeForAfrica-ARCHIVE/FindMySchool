<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
	
		$data['title'] = "Results";
		
		$this->load->view('templates/header', $data);
		$this->load->view('results/browse_view', $data);
		$this->load->view('templates/footer', $data);

	}
	
	public function search($search_term = NULL) {
	
		if ($search_term == NULL){
			redirect('/results', 'refresh');
			return;
		}
		
		$data['title'] = "Search";
		$data['search_term'] = $search_term;
		
		//WHERE City LIKE '%tav%' 
		/*
		$api_key = "&key=AIzaSyDl0_EPlseIlbNlYZDOzpua7VqXyH_LfeY";
		$sql_pri = "SELECT * FROM 1FICuRpskdIAbgbnhJ8eOnrtKctmdxGn5wSSXK98 LIMIT 15";
		$sql_sec = "SELECT * FROM 1lV0Og2Km6_axy4WanqEfstylMY8XAzBleL42BNo LIMIT 15";
		
		$sql_pri = urlencode($sql_pri);
		$sql_sec = urlencode($sql_sec);
		
		$json_pri = file_get_contents ('https://www.googleapis.com/fusiontables/v1/query?sql='.$sql_pri.$api_key);
		$json_sec = file_get_contents ('https://www.googleapis.com/fusiontables/v1/query?sql='.$sql_sec.$api_key); */
		
		$this->load->view('templates/header', $data);
		$this->load->view('results/search_view', $data);
		$this->load->view('templates/footer', $data);
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */