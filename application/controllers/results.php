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
		
		$this->load->database();
		$query = $this->db->query("SELECT * FROM kcpe_2010_disc_codes;");
		
		$district_result = $query->result_array();
		
		$data['title'] = "Search";
		$data['search_term'] = $search_term;
		$data['district_result'] = json_encode($district_result);
		
		$this->load->view('templates/header', $data);
		$this->load->view('results/search_view', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function school($school_in = NULL) {
		if ($school_in == NULL){
			redirect('/results', 'refresh');
			return;
		}
		
		//$school_resutls = array("");
		
		$school_find = explode(":", $school_in);
		
		$this->load->database();
		$query = $this->db->query("SELECT * FROM kcpe_2010 WHERE `Id_No` = '".$school_find[1]."';");
		
		$school_result = $query->result_array();
		
		$data['school_name'] = ucwords(strtolower($school_result[0]['SCHOOL NAME']));
		
		$data['title'] = "Results - ".$data['school_name'];
		$data['school_result'] = $school_result;
		
		
		$this->load->view('templates/header', $data);
		$this->load->view('results/school_view', $data);
		$this->load->view('templates/footer', $data);
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */