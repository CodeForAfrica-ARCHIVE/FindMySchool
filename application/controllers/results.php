<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Results extends CI_Controller {

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
		
		$query = $this->db->query("SELECT * FROM kcpe_2010 WHERE `CODE` = '".$school_find[1]."';");
		$res_2010 = $query->result_array();
		$query = $this->db->query("SELECT * FROM kcpe_2011 WHERE `CODE` = '".$res_2010[0]['CODE']."';");
		$res_2011 = $query->result_array();
		
		$data['school_name'] = ucwords(strtolower($res_2010[0]['SCHOOL NAME']));
		
		$data['title'] = "Results - ".$data['school_name'];
		$data['res_2010'] = $res_2010;
		$data['res_2011'] = $res_2011;
		
		$this->load->view('templates/header', $data);
		$this->load->view('results/school_view', $data);
		$this->load->view('templates/footer', $data);
	}
	
}

/* End of file results.php */
/* Location: ./application/controllers/results.php */