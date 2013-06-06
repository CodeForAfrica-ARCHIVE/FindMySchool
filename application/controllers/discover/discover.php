<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Discover extends CI_Controller {

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
	public function index() {
	
		$data['title'] = "Discover";
		
		$this->load->view('templates/header_view', $data);
		$this->load->view('discover/discover_view', $data);
		$this->load->view('templates/footer_view', $data);

	}
	
	public function locate($loc) {
		$data['title'] = "Discover";
		$data['loc'] = $loc;
		
		$disc_loc = explode(":", $loc);
		$disc_lat = $disc_loc[0];
		$disc_long = $disc_loc[1];
		
		$hasError = 0;
		if ($disc_long == NULL || $disc_long=="" || !is_numeric($disc_lat) || !is_numeric($disc_long)){
			$hasError = 1;
		} else {
			$data['disc_lat'] = $disc_lat;
			$data['disc_long'] = $disc_long;
		}
		
		$this->load->view('templates/header_view', $data);
		if($hasError == 1){
			$this->load->view('discover/locate_view_error', $data);
		} else {
			$this->load->view('discover/locate_view', $data);
		}
		$this->load->view('templates/footer_view', $data);
	}
	
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */