<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_search extends CI_Controller {

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
		echo 'We are almost there';
	}
	
	public function by_name($search_term=NULL) {
//		if ($search_term == NULL){
//			redirect('/browse', 'refresh');
//			return;
//		}
				
		$this->load->database();
		$query_pri = $this->db->query("SELECT * FROM kcpe_2010 WHERE  MATCH `SCHOOL NAME` AGAINST ('".$search_term."');");
		$query_sec = $this->db->query("SELECT * FROM KCSE_2006_2011 WHERE YEAR = 2011 AND MATCH `SCHOOL` AGAINST ('".$search_term."') ;");
		
		$array_result = array(
			"pri_result" => $query_pri->result_array(),
			"sec_result" => $query_sec->result_array()
		);
		
		$json_result = json_encode($array_result);
		echo $json_result;

	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */