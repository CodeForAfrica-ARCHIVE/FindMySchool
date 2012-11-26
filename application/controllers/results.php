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
		
		
		$sch_district_name = "";
		
		$sch_disc_code = substr($res_2010[0]['CODE'], 0, 3);
		if ($sch_disc_code==101) {
			$sch_district_name = "Taita";
		} else {
			if ($sch_disc_code==201) {
				$sch_district_name = "Nyandarua North";
			} else {
				if ($sch_disc_code==301) {
					$sch_district_name = "Machakos";
				} else {
					if ($sch_disc_code==351) {
						$sch_district_name = "Nzambani";
					} else {
						if ($sch_disc_code>=401 && $sch_disc_code<=450) {
							$sch_district_name = "Nairobi";
						} else {
							$query = $this->db->query("SELECT * FROM kcpe_2010_disc_codes WHERE `Code` = '".$sch_disc_code."';");
							$sch_district_codes = $query->result_array();
							$sch_district_name = $sch_district_codes[0]['Name'];
						}
					}
				}
			}
		}
		
		
		$data['school_name'] = ucwords(strtolower($res_2010[0]['SCHOOL NAME']));
		$data['sch_district_name'] = ucwords(strtolower($sch_district_name));
		
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