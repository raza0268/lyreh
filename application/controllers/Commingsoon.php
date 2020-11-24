<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Commingsoon extends CI_Controller {

	public function index()
	{
		$this->load->view('comming_soon');
	}

}