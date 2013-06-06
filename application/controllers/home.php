<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
	public function index()
	{
		$data['title'] = "Find My School .Ke";
		
		$this->load->database();
		
		$query = $this->db->query("SELECT * FROM kcpe_2011 ORDER BY `NATIONAL` LIMIT 10;");
		$top_kcpe = $query->result_array();
		
		$data['top_kcpe'] = $top_kcpe;
		
		$this->load->view('templates/header_view', $data);
		$this->load->view('home/home_view', $data);
		$this->load->view('templates/footer_view', $data);
		//$this->load->view('home/home_view');
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */