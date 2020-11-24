<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Action extends CI_Model {
	function select_all($table_name, $order_by){
		$this->db->select('*');
		$this->db->from($table_name);
		if(isset($order_by)){
			$this->db->order_by($order_by);
		}
		$query = $this->db->get();
		return $query->result();
  	}
	function select_all_id($table_name, $order_by,$where_data){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($where_data);
		if(isset($order_by)){
			$this->db->order_by($order_by);
		}
		$query = $this->db->get();
		return $query->result();
  	}
  	function select($table_name, $where_data){
   	 	$this->db->select('*');
  		$this->db->from($table_name);
  		$this->db->where($where_data);
		$this->db->order_by('id','DESC');
  		$query = $this->db->get();
		// echo $str = $this->db->last_query();
  		return $query->result();
  	}
	function select_where_order($table_name, $where_data, $order_by){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($where_data);
		if(isset($order_by)){
			$this->db->order_by($order_by);
		}
		$query = $this->db->get();
		return $query->result();
  	}
	function select_orlike_order_limit($table_name, $like_data, $order_data, $limit_data){
   	 	$this->db->select('*');
  		$this->db->from($table_name);
		$this->db->or_like($like_data);
		$this->db->order_by($order_data);
		$this->db->limit($limit_data);
  		$query = $this->db->get();
//echo $str = $this->db->last_query();
  		return $query->result();
  	}
    function select_in($table_name, $field_name, $where_data){
      $this->db->select('*');
      $this->db->from($table_name);
      $this->db->where_in($field_name, $where_data);
      $query = $this->db->get();
	 
      return $query->result();
    }
	
	function select_group($table){
		$this->db->select('month_at, COUNT(month_at) as total');
		$this->db->from($table);
		$this->db->group_by('month_at');
		$query = $this->db->get();
		return $query->result();
	}
	
  	function insert($table_name, $data){
  		$this->db->insert($table_name, $data);
		return $this->db->insert_id();
  	}
  	function delete($table_name, $where_data){
  		$this->db->where($where_data);
  		$this->db->delete($table_name);
  	}
	function delete_wherein($table_name, $field_name, $where_data){
		$this->db->where_in($field_name, $where_data);
  		$this->db->delete($table_name);
  	}
    function update_all($table_name, $data){
      $this->db->update($table_name, $data);
    }
    function update($table_name, $data, $where_data){
      $this->db->where($where_data);
      $this->db->update($table_name, $data);
    }		
	public function record_count($table) {
		//return $this->db->count_all($table);
		$this->db->where('item_status', 1);
		$num_rows = $this->db->count_all_results($table);
		return $num_rows;
	}
	public function fetch_items($limit, $start) {
		$this->db->where('item_status', 1);
		$this->db->limit($limit, $start);  
		$query = $this->db->get("items"); 
		if ($query->num_rows() > 0) {  
			foreach ($query->result() as $row) {          
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	
	
	public function fetch_user_items($limit, $start,$id) {
		$this->db->where(array('item_status'=>1,'item_user_id'=>$id));
		$this->db->limit($limit, $start);  
		$query = $this->db->get("items"); 
		if ($query->num_rows() > 0) {  
			foreach ($query->result() as $row) {          
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	
	function select_all_notification_id($table_name, $order_by,$id){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('receiver_id',$id);
		$this->db->or_where('sender_id',$id);
		$this->db->group_by("channel_id");
		if(isset($order_by)){
			$this->db->order_by($order_by);
		}
		$query = $this->db->get();
		return $query->result();
  	}
	
	function select_all_notification($table_name, $c_id){
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('channel_id',$c_id);
		if(isset($order_by)){
			$this->db->order_by($order_by);
		}
		$query = $this->db->get();
		return $query->result();
  	}
  	
  	function send_mail($to = '',$message = '', $subjects = ''){
  	    	$to = $to;
// 			$subject = "Lyreh Message";
			$message = $message;
			// Always set content-type when sending HTML email
			$headers = 'From: <'.ADMINEMAIL.'>'. "\r\n";
// 			$headers  .= 'MIME-Version: 1.0' . "\r\n";
            // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// 			$headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html\r\n";
			
			mail($to,$subjects,$message,$headers);
  	}
}