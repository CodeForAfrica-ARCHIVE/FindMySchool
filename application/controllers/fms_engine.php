<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fms_engine extends CI_Controller {

	public function index(){
	
		$data['title'] = "Marks Comparison";
		
		$this->load->view('templates/header', $data);
		$this->load->view('fms_engine/index_view', $data);
		$this->load->view('templates/footer', $data);

	}
	
	public function comparison($comp_in = NULL) {
	
		if ($comp_in == NULL){
			redirect('/marks', 'refresh');
			return;
		}
		
		$comp_in_array = explode(":", $comp_in);
		
		$county_in_name = urldecode($comp_in_array[0]);
		
		$district_result = $query->result_array();
		
		$data['title'] = "Marks Comparison";
		$data['county_in_name'] = $county_in_name;
		
		$this->load->view('templates/header', $data);
		$this->load->view('fms_engine/compare_view', $data);
		$this->load->view('templates/footer', $data);
	}
	
	
}

/* End of file results.php */
/* Location: ./application/controllers/results.php */