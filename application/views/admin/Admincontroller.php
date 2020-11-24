<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include APPPATH . 'third_party/vendor/autoload.php';

class Admincontroller extends CI_Controller {
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
	public function dashboard()
	{
		//$auth_user=$this->session->userdata('auth_user');
		//$where['receiver_id'] = $auth_user[0]->id;
		//,$where
		//$data['notifications_alert']=$this->Crud_model->get_data('*',"notifications_alert");
		$user_data=array(
			'1'=>0,
			'2'=>0,
			'3'=>0,
			'4'=>0,
			'5'=>0,
			'6'=>0,
			'7'=>0,
			'8'=>0,
			'9'=>0,
			'10'=>0,
			'11'=>0,
			'12'=>0,
		);
		$order_data=array(
			'1'=>0,
			'2'=>0,
			'3'=>0,
			'4'=>0,
			'5'=>0,
			'6'=>0,
			'7'=>0,
			'8'=>0,
			'9'=>0,
			'10'=>0,
			'11'=>0,
			'12'=>0,
		);
		$select_group_user=$this->action->select_group('users');
		foreach($select_group_user as $group_user){
			$user_data[$group_user->month_at]=$group_user->total;
		}
		$select_group_order=$this->action->select_group('orders');
		foreach($select_group_order as $group_order){
			$order_data[$group_order->month_at]=$group_order->total;
		}
		$data['user_data']=$user_data;
		$data['order_data']=$order_data;
		$data['orders']=$this->action->select_all("orders", "id asc");
		$data['items']=$this->action->select_all("items", "id asc");
		$data['users']=$this->action->select_all("users", "id asc");
		$data['contacts']=$this->action->select_all("contacts", "id asc");
		$this->load->view('admin/dashboard', $data);
	}

	public function changestatus(){
		
		$data['item_status'] = $_POST['status'];
		$where['id'] = $_POST['id'];
		$dataemail = $this->Crud_model->update_data($where,$data,'items');

		$data1['status'] = 'true';
		$this->session->set_flashdata('success', "Status successfully update!");
		echo json_encode($data1);
		die;
	}

	public function user($action="", $id="")
	{
		if($this->input->post("action")=="add_user"){
			$insert_data=$this->input->post();
			unset($insert_data['action']);

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('user_image')){
				$this->session->set_flashdata('error', "Error in uploading image!");
			}
			else{
				$upload_data=$this->upload->data();
				$insert_data['user_image']=$upload_data['file_name'];
				$this->action->insert("users", $insert_data);
				$this->session->set_flashdata('success', "User added successfully!");
			}
			redirect(base_url()."admin/user");
		}
		if($this->input->post("action")=="edit_user"){
			$update_data=$this->input->post();
			unset($update_data['action']);

			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('user_image')){
				$upload_data=$this->upload->data();
				$update_data['user_image']=$upload_data['file_name'];
			}
			$this->action->update("users", $update_data, array("id"=>$id));
			$this->session->set_flashdata('success', "User updated successfully!");
			redirect(base_url()."admin/user");
		}
		if($action=="add"){
			$data['action']=$action;
			$this->load->view('admin/user/form', $data);
		}
		else if($action=="view"){
			$data['view_user']=$this->action->select("users", array("id"=>$id));
			$this->load->view('admin/user/view', $data);
		}
		else if($action=="edit"){
			$data['action']=$action;
			$data['edit_user']=$this->action->select("users", array("id"=>$id));
			$this->load->view('admin/user/form', $data);
		}
		else if($action=="delete"){
			$this->action->delete('users', array("id"=>$id));
			$this->session->set_flashdata('success', "User deleted successfully!");
			redirect(base_url()."admin/user");
		}
		else{
			$data['users']=$this->action->select_all("users", "id asc");
			$this->load->view('admin/user/all', $data);
		}
	}
	public function page($action="", $id="")
	{
		if($this->input->post("action")=="add_page"){
			$insert_data=$this->input->post();
			unset($insert_data['action']);
			$insert_data['slug'] = url_title($this->input->post('title'), 'dash', true);
			$this->action->insert("pages", $insert_data);
			$this->session->set_flashdata('success', "Page added successfully!");
			redirect(base_url()."admin/page");
		}
		if($this->input->post("action")=="edit_page"){
			$update_data=$this->input->post();
			unset($update_data['action']);
			$update_data['slug'] = url_title($this->input->post('title'), 'dash', true);
			$this->action->update("pages", $update_data, array("id"=>$id));
			$this->session->set_flashdata('success', "Page updated successfully!");
			redirect(base_url()."admin/page");
		}
		if($action=="add"){
			$data['action']=$action;
			$this->load->view('admin/page/form', $data);
		}
		else if($action=="edit"){
			$data['action']=$action;
			$data['edit_page']=$this->action->select("pages", array("id"=>$id));
			$this->load->view('admin/page/form', $data);
		}
		else if($action=="delete"){
			$this->action->delete('pages', array("id"=>$id));
			$this->session->set_flashdata('success', "Page deleted successfully!");
			redirect(base_url()."admin/page");
		}
		else{
			$data['pages']=$this->action->select_all("pages", "id asc");
			$this->load->view('admin/page/all', $data);
		}
	}
	public function menu_management()
	{
		$data['pages']=$this->action->select_where_order("pages", array("show_in_menu"=>1), "sort asc");
		$this->load->view('admin/menu', $data);
	}
	public function item($action="", $id="")
	{
		$data['categorys']=$this->action->select_all("categorys", "id asc");
		$data['products']=$this->action->select_all("products", "id asc");
		$data['brands']=$this->action->select_all("brands", "id asc");
		$data['materials']=$this->action->select_all("materials", "id asc");
		$data['colors']=$this->action->select_all("colors", "id asc");
		$data['conditions']=$this->action->select_all("conditions", "id asc");
		$data['list_items']=$this->action->select_all("list_items", "id asc");
		$data['users']=$this->action->select_all("users", "id asc");
		
		if($this->input->post("action")=="add_item"){
			$insert_data=$this->input->post();
			unset($insert_data['action']);
			$insert_data['slug'] = url_title($this->input->post('item_name'), 'dash', true);
			$config['upload_path'] = './uploads/item/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('item_image')){
				$this->session->set_flashdata('error', "Error in uploading image!");
			}
			else{
				$upload_data=$this->upload->data();
				$insert_data['item_image']=$upload_data['file_name'];
				$this->action->insert("items", $insert_data);
				$this->session->set_flashdata('success', "item added successfully!");
			}
			redirect(base_url()."admin/item");
		}
		if($this->input->post("action")=="edit_item"){
			$update_data=$this->input->post();
			unset($update_data['action']);
			$update_data['slug'] = url_title($this->input->post('item_name'), 'dash', true);
			$config['upload_path'] = './uploads/item/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('item_image')){
				$upload_data=$this->upload->data();
				$update_data['item_image']=$upload_data['file_name'];
			}
			$this->action->update("items", $update_data, array("id"=>$id));
			$this->session->set_flashdata('success', "item updated successfully!");
			redirect(base_url()."admin/item");
		}
		if($action=="add"){
			$data['action']=$action;
			$this->load->view('admin/item/form', $data);
		}
		else if($action=="edit"){
			$data['action']=$action;
			$data['edit_item']=$this->action->select("items", array("id"=>$id));
			$this->load->view('admin/item/form', $data);
		}
		else if($action=="delete"){
			$this->action->delete('items', array("id"=>$id));
			$this->session->set_flashdata('success', "Item deleted successfully!");
			redirect(base_url()."admin/item");
		}
		else{
			$data['items']=$this->action->select_all("items", "id asc");
			$this->load->view('admin/item/all', $data);
		}
	}
	public function order($action="", $id="")
	{
		if($action=="view"){
			$data['single_order']=$this->action->select("orders", array("id"=>$id));
			$this->load->view('admin/item/order_view', $data);
		}
		else if($action=="delete"){
			$this->action->delete('orders', array("id"=>$id));
			$this->session->set_flashdata('success', "Order deleted successfully!");
			redirect(base_url()."admin/order");
		}
		else{
			$data['orders']=$this->action->select_all("orders", "id asc");
			$this->load->view('admin/item/order', $data);
		}
	}
	public function attr_subcategory($action="", $id="")
	{
		if($this->input->post("action")=="add_subcategory"){
			$insert_data=$this->input->post();
			if(empty($insert_data['category_id'])){
				$insert_data['category_id']=0;
			}
			else{
				$insert_data['category_id']=serialize($insert_data['category_id']);
			}
			unset($insert_data['action']);
			$this->action->insert("subcategories", $insert_data);
			$this->session->set_flashdata('success', "Subcategory added successfully!");
			redirect(base_url()."admin/attribute/subcategory");
		}
		if($this->input->post("action")=="edit_subcategory"){
			$update_data=$this->input->post();
			if(empty($update_data['category_id'])){
				$update_data['category_id']=0;
			}
			else{
				$update_data['category_id']=serialize($update_data['category_id']);
			}
			unset($update_data['action']);
			$this->action->update("subcategories", $update_data, array("id"=>$id));
			$this->session->set_flashdata('success', "Subcategory updated successfully!");
			redirect(base_url()."admin/attribute/subcategory");
		}
		if($action=="add"){
			$data['action']=$action;
			$data['get_category']=$this->action->select_all("categorys", "id asc");
			$this->load->view('admin/item_attributes/form_subcategory', $data);
		}
		else if($action=="edit"){
			$data['action']=$action;
			$data['get_category']=$this->action->select_all("categorys", "id asc");
			$data['edit_subcat']=$this->action->select("subcategories", array("id"=>$id));
			$this->load->view('admin/item_attributes/form_subcategory', $data);
		}
		else if($action=="delete"){
			$this->action->delete('subcategories', array("id"=>$id));
			$this->session->set_flashdata('success', "Subcategory deleted successfully!");
			redirect(base_url()."admin/attribute/subcategory");
		}
		else{
			$data['get_category']=$this->action->select_all("categorys", "id asc");
			$data['get_subcategory']=$this->action->select_all("subcategories", "id asc");
			$data['action']=$action;
			$this->load->view('admin/item_attributes/all_subcategory', $data);
		}
	}
	public function attr_product($action="", $id="")
	{
		if($this->input->post("action")=="add_product"){
			$insert_data=$this->input->post();
			unset($insert_data['action']);
			$this->action->insert("products", $insert_data);
			$this->session->set_flashdata('success', "Product added successfully!");
			redirect(base_url()."admin/attribute/product");
		}
		if($this->input->post("action")=="edit_product"){
			$update_data=$this->input->post();
			unset($update_data['action']);
			$this->action->update("products", $update_data, array("id"=>$id));
			$this->session->set_flashdata('success', "Product updated successfully!");
			redirect(base_url()."admin/attribute/product");
		}
		if($action=="add"){
			$data['action']=$action;
			$data['get_category']=$this->action->select_all("categorys", "id asc");
			$data['get_subcategory']=$this->action->select_all("subcategories", "id asc");
			$this->load->view('admin/item_attributes/form_product', $data);
		}
		else if($action=="edit"){
			$data['action']=$action;
			$data['get_category']=$this->action->select_all("categorys", "id asc");
			$data['get_subcategory']=$this->action->select_all("subcategories", "id asc");
			$data['edit_product']=$this->action->select("products", array("id"=>$id));
			$this->load->view('admin/item_attributes/form_product', $data);
		}
		else if($action=="delete"){
			$this->action->delete('products', array("id"=>$id));
			$this->session->set_flashdata('success', "Product deleted successfully!");
			redirect(base_url()."admin/attribute/product");
		}
		else{
			$data['get_category']=$this->action->select_all("categorys", "id asc");
			$data['get_subcategory']=$this->action->select_all("subcategories", "id asc");
			$data['all_products']=$this->action->select_all("products", "id asc");
			$this->load->view('admin/item_attributes/all_product', $data);
		}
	}
	public function attribute($attr="", $action="", $id="")
	{
		if($this->input->post("action")=="add_".$attr){
			$insert_data=$this->input->post();
			unset($insert_data['action']);
			$this->action->insert($attr."s", $insert_data);
			$this->session->set_flashdata('success', ucfirst($attr)." added successfully!");
			redirect(base_url()."admin/attribute/".$attr);
		}
		if($this->input->post("action")=="edit_".$attr){
			$update_data=$this->input->post();
			unset($update_data['action']);
			$this->action->update($attr."s", $update_data, array("id"=>$id));
			$this->session->set_flashdata('success', ucfirst($attr)." updated successfully!");
			redirect(base_url()."admin/attribute/".$attr);
		}
		if($action=="add"){
			$data['attr']=$attr;
			$data['action']=$action;
			$this->load->view('admin/item_attributes/form', $data);
		}
		else if($action=="edit"){
			$data['attr']=$attr;
			$data['action']=$action;
			$data['edit_attr']=$this->action->select($attr."s", array("id"=>$id));
			$this->load->view('admin/item_attributes/form', $data);
		}
		else if($action=="delete"){
			$this->action->delete($attr.'s', array("id"=>$id));
			$this->session->set_flashdata('success', ucfirst($attr)." deleted successfully!");
			redirect(base_url()."admin/attribute/".$attr);
		}
		else{
			$data['attr']=$attr;
			$data['get_attr']=$this->action->select_all($attr."s", "id asc");
			$this->load->view('admin/item_attributes/all', $data);
		}
	}
	public function contact($action="", $id="")
	{
		if($action=="delete"){
			$this->action->delete('contacts', array("id"=>$id));
			$this->session->set_flashdata('success', "Contact deleted successfully!");
			redirect(base_url()."admin/contact");
		}
		else{
			$data['contacts']=$this->action->select_all("contacts", "id asc");
			$this->load->view('admin/contact', $data);
		}
	}
	public function coupon($action="", $id="")
	{
		if($this->input->post("action")=="add_coupon"){
			$insert_data=$this->input->post();
			unset($insert_data['action']);
			$this->action->insert("coupons", $insert_data);
			$this->session->set_flashdata('success', "Coupon added successfully!");
			redirect(base_url()."admin/coupon");
		}
		if($this->input->post("action")=="edit_coupon"){
			$update_data=$this->input->post();
			unset($update_data['action']);
			$this->action->update("coupons", $update_data, array("id"=>$id));
			$this->session->set_flashdata('success', "Coupon updated successfully!");
			redirect(base_url()."admin/coupon");
		}
		if($action=="add"){
			$data['action']=$action;
			$this->load->view('admin/coupon/form', $data);
		}
		else if($action=="edit"){
			$data['action']=$action;
			$data['edit_coupon']=$this->action->select("coupons", array("id"=>$id));
			$this->load->view('admin/coupon/form', $data);
		}
		else if($action=="delete"){
			$this->action->delete('coupons', array("id"=>$id));
			$this->session->set_flashdata('success', "Coupon deleted successfully!");
			redirect(base_url()."admin/coupon");
		}
		else{
			$data['coupons']=$this->action->select_all("coupons", "id asc");
			$this->load->view('admin/coupon/all', $data);
		}
	}
	public function faq($action="", $id="")
	{
		if($this->input->post("action")=="add_faq"){
			$insert_data=$this->input->post();
			unset($insert_data['action']);
			$this->action->insert("faqs", $insert_data);
			$this->session->set_flashdata('success', "Faq added successfully!");
			redirect(base_url()."admin/faq");
		}
		if($this->input->post("action")=="edit_faq"){
			$update_data=$this->input->post();
			unset($update_data['action']);
			$this->action->update("faqs", $update_data, array("id"=>$id));
			$this->session->set_flashdata('success', "Faq updated successfully!");
			redirect(base_url()."admin/faq");
		}
		if($action=="add"){
			$data['action']=$action;
			$this->load->view('admin/faq/form', $data);
		}
		else if($action=="edit"){
			$data['action']=$action;
			$data['edit_faq']=$this->action->select("faqs", array("id"=>$id));
			$this->load->view('admin/faq/form', $data);
		}
		else if($action=="delete"){
			$this->action->delete('faqs', array("id"=>$id));
			$this->session->set_flashdata('success', "Faq deleted successfully!");
			redirect(base_url()."admin/faq");
		}
		else{
			$data['faqs']=$this->action->select_all("faqs", "id asc");
			$this->load->view('admin/faq/all', $data);
		}
	}
	public function setting()
	{
			
		if($this->input->post("action")=="general_setting"){
			
			$update_data = $this->input->post();
			unset($update_data['action']);
			
			if(!empty($_FILES)){
				// echo '<pre>';
				// print_r($_FILES);
				// die;

				foreach ($_FILES as $key => $value) {
					$config['upload_path'] = './uploads/homepage';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$this->load->library('upload', $config);
					if ( ! $this->upload->do_upload($key)){
						//$this->session->set_flashdata('error', "Error in uploading image!");
					}
					else{
						$updatedata=  $this->upload->data();
						$update_data[$key] = $updatedata['file_name'];
					}
				}

			}





			foreach($update_data as $key=>$val){
			$this->action->update("settings", array("meta_value"=>$val), array("meta_key"=>$key));
			}
			$this->session->set_flashdata('success', "Settings has changed successfully!");
			redirect(base_url()."admin/setting");
		}
		$data['settings']=$this->action->select_all("settings","id asc");
		$this->load->view('admin/setting', $data);
	}
	public function mail_setting()
	{
		if($this->input->post("action")=="mail_setting"){
			$update_data=$this->input->post();
			unset($update_data['action']);
			$this->action->update_all("mail_settings", $update_data);
			$this->session->set_flashdata('success', "Mail settings has changed successfully!");
			redirect(base_url()."admin/mail_setting");
		}
		$data['mail_settings']=$this->action->select_all("mail_settings","id asc");
		$this->load->view('admin/mail_setting', $data);
	}
	public function concierge($action="", $id="")
	{
	    if($this->input->post("action")=="send_invoice"){
	        $admin_message=$this->input->post("admin_message");
	        $concierge_id=$this->input->post("concierge_id");
	        $concierge_data=$this->action->select("concierge", array("id"=>$concierge_id));
	        $user_id=$concierge_data[0]->user_id;
	        $user_data=$this->action->select("users", array("id"=>$user_id));
	        $brand_id=$concierge_data[0]->brand;
			$brand_data=$this->action->select("brands", array("id"=>$brand_id));
	        
	        // Concierge mail
			$to = $user_data[0]->email;
			$subject = "Invoice mail";
			$message = "<h2>Here is invoice detail</h2>";
			$message .= "
			<table border='1'>
			<tr>
			<th>Image</th>
			<th>Brand</th>
			<th>Store/Website last seen</th>
			<th>Size</th>
			<th>Further information</th>
			</tr>
			<tr>
			<td><img src='".base_url()."uploads/concierge/".$concierge_data[0]->upload_photo."' style='width: 100px'/></td>
			<td>".$brand_data[0]->brand_name."</td>
			<td>".$concierge_data[0]->last_seen."</td>
			<td>".$concierge_data[0]->size."</td>
			<td>".$concierge_data[0]->message."</td>
			</tr>
			</table>
			";
			$message .= "<h3>Admin Message</h3>";
			$message .= $admin_message;
			$message .= "<p>Thanks</p>";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From: <'.ADMINEMAIL.'>';
			mail($to,$subject,$message,$headers);
			// Concierge mail close
	    }
	    if($action=="delete"){
			$this->action->delete('concierge', array("id"=>$id));
			$this->session->set_flashdata('success', "Concierge deleted successfully!");
			redirect(base_url()."admin/concierge");
		}
	    $data['concierges'] = $this->action->select_all("concierge","id desc");
	    $this->load->view('admin/concierge', $data);
	}
	public function send_email()
	{			
			
			$message = '';
			$to = $_POST['email'];
			$subject = "Concierge Important email";
			$message .= "<h3>Admin Message</h3>";
			$message .= $_POST['admin_message'];;
			$message .= "<p>Thanks</p>";
			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// More headers
			$headers .= 'From: <'.ADMINEMAIL.'>';
			mail($to,$subject,$message,$headers);
			$emaildata['sender_id'] = $_SESSION['auth_user'][0]->id;
			$emaildata['receiver_id'] = $_POST['concierge_id'];
			$emaildata['message'] = 'Please check your email';
			

			
			$message= 'Admin has sent an email to you. Please check your email.';
			$insert_data=array(
				"sender_id"=> 0,
				"receiver_id"=>$_POST['concierge_id'],
				"message"=>$message,
			);
			$this->action->insert("notifications_alert", $insert_data);	
			$data['concierges'] = $this->action->select_all("concierge","id desc");
			$this->session->set_flashdata('success', "Email successfully sent.");
	 	    $this->load->view('admin/concierge', $data);
	}

	public function getemailaddress(){
		$where['id'] = $_POST['id'];
		$data1['data'] = $this->Crud_model->get_data('*','users',$where,true);
		$data1['status'] = 'true';
		echo json_encode($data1);
		die;
	}



	public function chat_record()
	{
		$data['users']=$this->action->select_all("users","id asc");
		$data['channels']=$this->action->select_all("channels","id asc");
		$this->load->view('admin/chat_record', $data);
	}
	public function ajax_call()
	{
		$action=$this->input->post("action");
		if($action=="menu_management"){
			$inc=0;
			foreach(json_decode($_POST["rec"]) as $key=>$val){
				$parent_id=$val->id;
				$this->action->update("pages", array("children"=>"0", "sort"=>$inc++), array("id"=>$parent_id));
				if(isset($val->children)){
					foreach($val->children as $key1=>$val1){
						$children_id=$val1->id;
						$this->action->update("pages", array("children"=>$parent_id, "sort"=>$inc++), array("id"=>$children_id));
					}
				}
			}
		}
		if($action=="get_channel_data"){
			$sender_id=$this->input->post("sender_id");
			$data['sender_data']=$this->action->select("users", array("id"=>$sender_id));
			$data['channel_id']=$this->input->post("channel_id");
			$this->load->view('admin/channel_data', $data);
		}

		if($action=="get_subcategory"){
			$category_id=$this->input->post("category_id");
			$get_subcat=$this->action->select_all("subcategories", "id asc");
			echo '<select name="subcategory" class="form-control" onchange="getProduct($(this).val())">';
				echo '<option value="">--Select--</option>';
				foreach($get_subcat as $subcat){
					if(in_array($category_id, unserialize($subcat->category_id))){
						echo '<option value="'.$subcat->id.'">'.$subcat->subcategory_name.'</option>';
					}
				}
			echo '</select>';
		}
		if($action=="get_product"){
			$category_id=$this->input->post("category_id");
			$subcategory_id=$this->input->post("subcategory_id");
			if(isset($category_id)){
				$get_product=$this->action->select("products", array("category_id"=>$category_id));
			}
			else{
				$get_product=$this->action->select("products", array("subcategory_id"=>$subcategory_id));
			}
			echo '<select name="product" class="form-control" required>';
				echo '<option value="">--Select--</option>';
				foreach($get_product as $product){
					echo '<option value="'.$product->id.'">'.$product->product_name.'</option>';
				}
			echo '</select>';
		}
		if($action=="get_size"){
			$category_id=$this->input->post("category_id");
			$subcategory_id=$this->input->post("subcategory_id");
			$get_size=$this->action->select("sizes", array("category_id"=>$category_id, "subcategory_id"=>$subcategory_id));
			echo '<select name="size" class="form-control">';
				echo '<option value="">--Select--</option>';
				foreach($get_size as $size){
					echo '<option value="'.$size->id.'">'.$size->size.'</option>';
				}
			echo '</select>';
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('auth_user');
		$this->session->set_flashdata('success', "You are logout successfully!");
		redirect(base_url()."admin");
	}


	public function notification_read_alert_admin(){
			$id=$this->input->post("id");
			$where['id'] = $id;
			$data['admin_read'] = 1;
			$this->Crud_model->update_data($where,$data,"notifications_alert");
			$res['status'] = 'true';
		   	echo json_decode($res);
		   	die;
	}



	public function visitor(){
		$analytics = $this->initializeAnalytics();
		$profile = $this->getFirstProfileId($analytics);

		$visitor = $this->gettotalvisitors($analytics, $profile);
		$visitor = $visitor->getRows();

		$sessions = $this->gettotalsessions($analytics, $profile);
		$sessions = $sessions->getRows();

		$pagesview = $this->gettotalpageviews($analytics, $profile);
		$pagesview = $pagesview->getRows();

		$newusers = $this->gettotalnewusers($analytics, $profile);
		$newusers = $newusers->getRows();


		$data['users'] =  $visitor[0][0];
		$data['sessions'] =  $sessions[0][0];
		$data['pagesview'] =  $pagesview[0][0];
		$data['newusers'] =  $newusers[0][0];
		$this->load->view('admin/visitor', $data);
	}

	public function gettotalvisitors($analytics, $profileId) {
	  // Calls the Core Reporting API and queries for the number of sessions
	  // for the last seven days.
	   return $analytics->data_ga->get(
	       'ga:' . $profileId,
	       '200daysAgo',
	       'today',
	       'ga:Visitors');
	}

	public function gettotalsessions($analytics, $profileId) {
	  // Calls the Core Reporting API and queries for the number of sessions
	  // for the last seven days.
	   return $analytics->data_ga->get(
	       'ga:' . $profileId,
	       '200daysAgo',
	       'today',
	       'ga:sessions');
	}

	public function gettotalpageviews($analytics, $profileId) {
	  // Calls the Core Reporting API and queries for the number of sessions
	  // for the last seven days.
	   return $analytics->data_ga->get(
	       'ga:' . $profileId,
	       '200daysAgo',
	       'today',
	       'ga:pageviews');
	}

	public function gettotalnewusers($analytics, $profileId) {
	  // Calls the Core Reporting API and queries for the number of sessions
	  // for the last seven days.
	   return $analytics->data_ga->get(
	       'ga:' . $profileId,
	       '200daysAgo',
	       'today',
	       'ga:newUsers');
	}



	public function initializeAnalytics()
	{

	  $KEY_FILE_LOCATION = APPPATH . 'third_party/lyreh-275619-07bef178d910.json';

	  // Create and configure a new client object.
	  $client = new Google_Client();
	  $client->setApplicationName("Hello Analytics Reporting");
	  $client->setAuthConfig($KEY_FILE_LOCATION);
	  $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
	  $analytics = new Google_Service_Analytics($client);

	  return $analytics;
	}


	public function getFirstProfileId($analytics) {
		// Get the user's first view (profile) ID.

		// Get the list of accounts for the authorized user.
		$accounts = $analytics->management_accounts->listManagementAccounts();

		if (count($accounts->getItems()) > 0) {
		$items = $accounts->getItems();
		$firstAccountId = $items[0]->getId();

		// Get the list of properties for the authorized user.
		$properties = $analytics->management_webproperties
		    ->listManagementWebproperties($firstAccountId);

		if (count($properties->getItems()) > 0) {
		  $items = $properties->getItems();
		  $firstPropertyId = $items[0]->getId();

		  // Get the list of views (profiles) for the authorized user.
		  $profiles = $analytics->management_profiles
		      ->listManagementProfiles($firstAccountId, $firstPropertyId);

		  if (count($profiles->getItems()) > 0) {
		    $items = $profiles->getItems();

		    // Return the first view (profile) ID.
		    return $items[0]->getId();

		  } else {
		    throw new Exception('No views (profiles) found for this user.');
		  }
		} else {
		  throw new Exception('No properties found for this user.');
		}
		} else {
		throw new Exception('No accounts found for this user.');
		}
	}
}
