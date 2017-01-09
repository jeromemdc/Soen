<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	/**
	 * Index Page Login controller.
	 */

	public function index(){
		$data['title'] = 'Login Content';	
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|callback_login_check');
		
		if ($this->form_validation->run() == TRUE){
			redirect('administrator/dashboard', 'location');
		} else {
			$this->load->view('login', $data);	
		}
	}

	public function login_check(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->login_model->check_users($username,$password );
		
		if($user){
			$this->session->set_userdata(array('logged_in' => TRUE));
			$this->session->set_userdata('user_info', $user);
			return TRUE;
		}else{
			$this->form_validation->set_message('login_check', 'Username and password do not match.');
			return FALSE;
		}
	}
	
	
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */