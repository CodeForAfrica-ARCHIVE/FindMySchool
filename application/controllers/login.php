<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
		
		$data['title'] = "Login";
		$data['action'] = "Login";
		
		$data['intro'] = "Login with your GitHub, Twitter, or LinkedIn account below for easy access to your profile. (We never post without your permission.)";
		$data['end'] = "Need an account? <a href=\"./login/signup\">Join Here.</a>";
		
		$this->load->view('templates/header', $data);
		$this->load->view('user/login_view', $data);
		$this->load->view('templates/footer', $data);
		//$this->load->view('home/home_view');
	}
	
	public function signup(){
	
		$data['title'] = "Sign Up";
		$data['action'] = "Sign up";
		
		$data['intro'] = "It's free and easy to start. Just link to one of your accounts to create your Code Store profile.";
		$data['end'] = "We never tweet from your account. By linking an account, you agree to our <a href='#TOSPrvcyModal' role='button' data-toggle='modal'>Terms of Service & Privacy Policy</a>.";
		
		$this->load->view('templates/header', $data);
		$this->load->view('user/login_view', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function github(){
		echo '<meta http-equiv="refresh" content="0;url=https://github.com/login/oauth/authorize">';
	}
	
	public function github_success() {
		
	}
	
	public function twitter(){
		$data['title'] = "Loading...";
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/redirecting_view', $data);
		$this->load->view('templates/footer', $data);
		require 'login/twitter/tmhOAuth.php';
		require 'login/twitter/tmhUtilities.php';
		require 'login/twitter/tmhKeys.php';
		require 'login/twitter/tmhAuth.php';
	}
	
	public function twitter_success(){
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */