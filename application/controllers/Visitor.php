<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'third_party/vendor/autoload.php';

class Visitor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
		
		if(null === $this->session->userdata('auth_user')){
			redirect(base_url()."admin");
		}else{
		    $auth_user = $this->session->userdata('auth_user');
		    
		   if($auth_user[0]->role !== 'admin'){
		        redirect(base_url());  
		   }
		    
		}
	}

	
}