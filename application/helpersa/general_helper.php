<?php
function notifications()
{
	$notifications=$this->action->select_all("notifications","id desc");
	return $notifications[0];
}

function productinfo($name)
{
	$ci = &get_instance();
	$where['item_name'] = $name;
	$product = $ci->Crud_model->get_data("*",'items',$where,true);
	return $product;
}

function productinfo_id($id)
{
	$ci = &get_instance();
	$where['item_user_id'] = $id;
	$product = $ci->Crud_model->get_data("*",'items',$where);
	return $product;
}

function productinfo_count($id)
{
	$ci = &get_instance();
	$where['item_user_id'] = $id;
	$product = $ci->Crud_model->get_data("count(*) as totalcount",'items',$where);
	return $product;
}

function orderinfo_count($id)
{
	$ci = &get_instance();
	$where['u_id'] = $id;
	$product = $ci->Crud_model->get_data("count(*) as totalcountorder",'orders',$where);
	return $product;
}

function get_order_info($id)
{
	$ci = &get_instance();
	$where['order_id'] = $id;
	$orders = $ci->Crud_model->get_data("*",'orders',$where,true);
	return $orders;
}

function get_order_info_user($id)
{
	$ci = &get_instance();
	$where['u_id'] = $id;
	$orders = $ci->Crud_model->get_data("*",'orders',$where);
	return $orders;
}

function userinfo($id)
{
	$ci = &get_instance();
	$where['id'] = $id;
	$user = $ci->Crud_model->get_data("*",'users',$where,true);
	return $user;
}

function get_admininfo()
{
	$ci = &get_instance();
	$where['role'] = 'admin';
	$user = $ci->Crud_model->get_data("*",'users',$where);
	return $user;
}

function get_category($id)
{
	$ci = &get_instance();
	$where['id'] = $id;
	$cat = $ci->Crud_model->get_data("*",'categorys',$where,true);
	return $cat;
}

function get_brand($id)
{
	$ci = &get_instance();
	$where['id'] = $id;
	$brand = $ci->Crud_model->get_data("*",'brands',$where,true);
	return $brand;
}

function get_item_rateing($id){
	$ci = &get_instance();
	$where['user_feedbackid'] = $id;
	$rating = $ci->Crud_model->get_data("COUNT(*) AS totalcount,SUM(rating) AS `rating`",
		'users_feedbacks',$where);
	return $rating;
}

function alread_rating_added($id, $item_id){
	$ci = &get_instance();
	$where['user_id'] = $id;
	$where['item_id'] = $item_id;
	$count = $ci->Crud_model->get_data("COUNT(*) AS totalcount",
		'item_feedbacks',$where);
	return $count;
}

function alread_orderd($id,$itemname){
	$ci = &get_instance();
	$where['u_id'] = $id;
	$ordredata = $ci->Crud_model->get_data("*",'orders',$where);
	$true = '';
	foreach ($ordredata as $key => $value) {
	
		foreach (unserialize($value->item_record) as $k => $val) {
			if($k == $itemname){
				$true = 'true';
			}
		}	
	}
	return $true;
}

function totalitemlikes($item_id){
	$ci = &get_instance();
	$where['id'] = $item_id;
	$count = $ci->Crud_model->get_data("like_user",
		'items',$where);
	return $count;
}


function get_channels(){
	$ci = &get_instance();
	$auth_user = $ci->session->userdata('auth_user');
	$where = "sender_id = ".$auth_user[0]->id." or receiver_id = ".$auth_user[0]->id;
	$data = $ci->Crud_model->get_data("*","channels",$where,$single_row = false,$join = array(), $like = array(),$or_where = "",$where_in = "", $order_by = "last_message_at" ,$odr_method="DESC");
	return $data;
}

function get_chatrecord($channel_id, $sender_id){
	$ci = &get_instance();
	$data['sender_data'] = $ci->action->select("users", array("id"=>$sender_id));
	$data['channel_id'] = $channel_id;
	$data1 = $ci->load->view('channel_data', $data, true);
	return $data1;
}
?>