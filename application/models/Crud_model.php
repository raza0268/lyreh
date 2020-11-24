<?php


class Crud_model extends CI_Model{

	public function __construct() {
		parent::__construct();

	}

	public function login_customer($data){
		extract($data);
		$query = $this->db->get_where('customer', array('email' => $email,'password' => $password));
		if($query->num_rows()>0){
			$response =  $query->row();
			return $response;
		}else{
			return false;
		}
	}


	public function login_user($data){
		extract($data);
		$query = $this->db->get_where('admin', array('email' => $email,'password' => $password));
		if($query->num_rows()>0){
			$response =  $query->row();
			return $response;
		}else{
			return false;
		}
	}


public function get_data($select = "",$table="",$where = array(),$single_row = false,$join = array(), $like = array(),$or_where = "",$where_in = "", $order_by = "" ,$odr_method=""){

		
		$this->db->select($select);
		$this->db->from($table);
		if (!empty($join)) {
			foreach ($join as $key => $value) {
				$this->db->join($key,$value);
			}
		}

		if (!empty($where)) {
			$this->db->where($where);
		}


		if (!empty($or_where)) {
			$this->db->or_where($or_where);
		}		
		
		if (!empty($where_in)) {
			
			foreach ($where_in as $key => $value) {
				$this->db->where_in($key, $value);
			}
			
		}

		if (!empty($like)) {
			$this->db->like($like);
		}

		if ($single_row) {
			
			if (!empty($order_by)) {
				$this->db->order_by($order_by,$odr_method);
			}

			$res = $this->db->get()->row();

		}else{

			if (!empty($order_by)) {
				$this->db->order_by($order_by,$odr_method);
			}

			$res = $this->db->get()->result();

		}

		return $res;

	}


	public function delete_data($table,$where,$bulk = false, $data = array()){

		if ($bulk) {
			$this->db->where_in($where, $data);
		}else{
			$this->db->where($where);
		}
		
		$res = $this->db->delete($table);

		return $res;
	}


	public function add_data($data,$table = ""){

		$res = $this->db->insert($table, $data);
		return $this->db->insert_id();

	}

	public function insert_batch($data,$table){

		$res = $this->db->insert_batch($table, $data);
		return $res;

	}


	public function update_data($where,$data,$table = ""){

		$this->db->where($where);
		$res = $this->db->update($table, $data);
		return $res;
	}



	public function upload_file($file,$input_name,$path){


		$file['name'] = str_replace(" ", "", $file['name']);

		if ($file['error'] != 4 ) {
		$config['upload_path']          = $path;
		$config['allowed_types']        = '*';
		$config['max_size']        = '100000';
		$file_name = rand().$file['name'];
		$config['file_name'] = $file_name;
		
		
		$this->load->library('upload', $config);

		if ( $this->upload->do_upload($input_name))
		{
			return $file_name;
		}else{

			$error = array('error' => $this->upload->display_errors());

		    print_r($error);
		    die;	
		}

		}

		                        

		return false;


		

	}
	








}



?>