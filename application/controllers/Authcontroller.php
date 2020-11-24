<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authcontroller extends CI_Controller {
	public function index()
	{
	    
		
		if(null !== $this->session->userdata('auth_user')){
		   $auth_user = $this->session->userdata('auth_user');
		   if($auth_user[0]->role == 'admin'){
			redirect(base_url()."admin/dashboard");
		   }else{
		     redirect(base_url());  
		   }
		}
		if(null !==  $this->input->post("sign_in")){
			$email=$this->input->post("email");
			$password=md5($this->input->post("password"));
			$data=$this->action->select("users", array("email"=>$email, "password"=>$password, "role"=>"admin"));
			if(empty($data)){
				$this->session->set_flashdata('error', "Invalid Credentials!");
				redirect(base_url()."admin");
			}
			else{
				if($data[0]->status=="2"){
					$this->session->set_flashdata('error', "Account has inactive!");
					redirect(base_url()."admin");
				}
				else if($data[0]->status=="3"){
					$this->session->set_flashdata('error', "Account has deleted!");
					redirect(base_url()."admin");
				}
				$this->session->set_userdata(array("auth_user"=>$data));
				redirect(base_url()."admin/dashboard");
			}
		}
		$this->load->view('admin/login');
	}
}
