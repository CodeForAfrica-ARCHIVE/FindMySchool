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
		
		$county_in_name = urldecode($comp_in_array[0]);
		$county_in_id = urldecode($comp_in_array[1]);
		$marks_in = urldecode($comp_in_array[2]);
				
		$this->load->database();
		$query = $this->db->query("SELECT * FROM kcpe_2010 WHERE  MATCH `SCHOOL NAME` AGAINST ('".$search_term."');");
		
		$json_result = json_encode($query->result_array());
		echo $json_result;

	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */