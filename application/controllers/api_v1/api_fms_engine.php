<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_fms_engine extends CI_Controller {

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

	}
	
	public function by_marks($comp_in=NULL) {
		if ($comp_in == NULL){
//			redirect('/browse', 'refresh');
			return;
		}
		
		$comp_in_array = explode(":", $comp_in);
		
		$gender = $comp_in_array[0];
		$category = $comp_in_array[1];
		$marks = $comp_in_array[2];
		
		$this->load->database();
		
		if ($category == "ALLTYPE") {
			if ($gender == "ALLGENDER"){
				$query = $this->db->query("SELECT * FROM f1_sel_2012_gen WHERE Mean_Total<=".$marks." ORDER BY Mean_Total DESC LIMIT 15;");
			} else {
				$query = $this->db->query("SELECT * FROM f1_sel_2012_gen WHERE Mean_Total<=".$marks." AND Gender='".$gender."' ORDER BY Mean_Total DESC LIMIT 15;");
			}
			
		} else {
			
			if ($gender == "ALLGENDER"){
				$query = $this->db->query("SELECT * FROM f1_sel_2012_gen WHERE Mean_Total<=".$marks." AND Category='".$category."' ORDER BY Mean_Total DESC LIMIT 15;");
			} else {
				$query = $this->db->query("SELECT * FROM f1_sel_2012_gen WHERE Mean_Total<=".$marks." AND Category='".$category."' AND Gender='".$gender."' ORDER BY Mean_Total DESC LIMIT 15;");
			}
			
		}
		
		$json_result = json_encode($query->result_array());
		echo $json_result;

	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */