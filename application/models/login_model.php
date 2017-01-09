<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login_model extends CI_Model {

	    function __construct(){
	        parent::__construct();
	    }
		
		public function check_users($name, $pass ){
			return $this->db
				->where('username', $name)
				->where('password', sha1($pass))
				->get('users')
				->row();

		}
	}
?>