<?php

defined('BASEPATH') OR exit('No direct script access allowed');



// $agent = $this->request->getUserAgent();



class Homecontroller extends CI_Controller {



	public function __construct() {

       parent::__construct();

       $this->load->library("session");

       $this->load->helper('url');

       $this->load->model("Crud_model");

    }

    

   



	public function google_login()

	{



		$this->load->view('google_login');

	}

	public function index()

	{

		$data=$this->constantData();

		$this->load->view('home', $data);

	}

	public function mobileChat()

	{

		$data=$this->constantData();

		$this->load->library('user_agent');

		if ($this->agent->is_mobile())

		{

			$this->load->view('chat/main', $data);

		}

		else

		{

			$this->load->view('chat/desktop_main', $data);

		}

			

	}



	
 public function stripe_payment(){ 
        // print_r($_POST);exit;
        
    	$token  = $_POST['stripeToken'];
    	$email  = $_POST["billing_email"];
    	$total_price  = $_POST["total_price"];
    	$description = $_POST["order_notes"];

        if(empty($description)){
            $description = "Product is purchased";
        }
        require_once('application/third_party/stripe-php/init.php');
        \Stripe\Stripe::setVerifySslCerts(false);
        \Stripe\Stripe::setApiKey("sk_test_51GkSunGyuBOWtKEvgwINg21bwcAdEUtdsJWdmk33zSjcIB2fUZChUzKwOyRdnqgIp1cFu8J2VaxWUJNHmgxvTeLs00JznfRyqn");
        $response = array();
        if($token && $email){ 
            $cust_id = "";


                $changePrice = round(($total_price*100)*0.92);
                // print_r($changePrice);exit;
                
                
                
                $charge = \Stripe\Charge::create([
				  'amount' => $changePrice,
				  'currency' => 'gbp',
				  'source'  => $token,
				  'description' => $description,
				]);

                $paymentIntent = \Stripe\PaymentIntent::create([
					  'amount' => $changePrice,
					  'currency' => 'gbp',
					  // 'payment_method_types' => ['card'],
					  // 'transfer_group' => '{ORDER10}',
					]);
					
                foreach ($this->cart->contents() as $contents) {
                $itemId = preg_replace("/[^0-9]/", "", $contents["id"]);
                $itemData =  $this->Crud_model->get_data("","items",["id"=> $itemId],True);
                $userData =  $this->Crud_model->get_data("","users",["id"=> $itemData->item_user_id],True); 
                $commission = $this->Crud_model->get_data("","commission","",True);
                
                
	              	if(!empty($commission)){
	              		
	              		$percentage = $commission->commission;
						
						$applicationFee = ($percentage / 100) * ($contents["subtotal"]+$contents["postage_fee"]);
						$remainingPrice = $total_price-$applicationFee;
						$remainingPrice = round($remainingPrice);
						$applicationFee = round($applicationFee);
	              	}
	              	$changeRemainingPrice = round(($remainingPrice*100)*0.92);
	              	
	   
					
				  try {
                        $transfer = \Stripe\Transfer::create([
    						  'amount' => $changeRemainingPrice,
    						  'currency' => 'gbp',
    						  'destination' => $userData->stripeAccountId,
    						  // 'transfer_group' => '{ORDER10}',
    					]);
                    }
                    catch (\Stripe\Error\Base $e) {
                        print_r($e->getMessage());
    //                     $response['message'] = $e->getMessage();
				// 		$response['status'] = false;
				// 		echo json_encode($response);
						exit;
                    }
              	}
              	
            



               if($charge->id){
                  
                $response ['message'] = $charge->id;
                $response['status'] = true;
                echo json_encode($response);
               }
                exit;
               
        }
            
        
    }


    public function stripeSettings(){
    	$formData = $this->input->post();
    	$keys = $this->Crud_model->get_data("","stripesettings","",True);
		require_once('application/third_party/stripe-php/init.php');
        \Stripe\Stripe::setVerifySslCerts(false);
        \Stripe\Stripe::setApiKey(trim($keys->privateKey));
        $response = \Stripe\OAuth::token([
			  'grant_type' => 'authorization_code',
			  'code' => $_GET['code'],
			]);
		$stripeAccountId = $response->stripe_user_id;
		// print_r($connected_account_id);exit;
	
		$userData =  $this->Crud_model->get_data("","users",["id"=>$_SESSION['auth_user'][0]->id],True);
		
		if(empty($userData->stripeAccountId)){
		
		$this->Crud_model->update_data(["id"=>$_SESSION['auth_user'][0]->id],["stripeAccountId"=>$stripeAccountId],"users");
		}else{
		    $this->session->set_flashdata("success","Stripe is successfully connected");
		}
		redirect("account?stripeSettings=true");


  //   	if($formData["action"] == "stripeEmail"){
		// 	$stripeAccount = \Stripe\Account::create([
		// 		  'type' => 'custom',
		// 		  'country' => 'GB',
		// 		  'email' => $formData["stripeEmail"],
		// 		  'capabilities' => [
		// 		    'card_payments' => ['requested' => true],
		// 		    'transfers' => ['requested' => true],
		// 		  ],
		// 		]);
		// 	$stripeAccountId = "";
		// 	if(!empty($stripeAccount->id)){
		// 		$stripeAccountId = $stripeAccount->id;
		// 		\Stripe\Account::update(
		//          $stripeAccountId,
		// 	        [
		// 	          'business_type' => "individual"
		// 	        ]
		//     	);
		//     	\Stripe\Account::update(
		//         $stripeAccountId,
		//          [
		//           'individual' => [
		//             'email' => $formData["stripeEmail"],
		            
		//           ],
		//         ]
		//       );
		// 	}
		// 	$this->Crud_model->update_data(["id"=>$formData["user_id"]],["stripeAccountId"=>$stripeAccountId],"users");
		// 	$this->session->set_flashdata("success","Email submitted successfully");
		// 	redirect("account?stripeSettings=true");
		// }else{

		// 	$userData =  $this->Crud_model->get_data("","users",["id"=>$_SESSION['auth_user'][0]->id],True); 

		// 	$dateOfBirth = explode("/",$formData["date_of_birth"]);
		// 	try {
  //           $fp = fopen($_FILES['front']['tmp_name'], 'r');
		// 	$fileCode = \Stripe\File::create([
		// 	  'file' => $fp,
		// 	  'purpose' => 'identity_document',
		// 	]);
		// 	$fp = fopen($_FILES['back']['tmp_name'], 'r');
		// 	$fileCode1 = \Stripe\File::create([
		// 	  'file' => $fp,
		// 	  'purpose' => 'identity_document',
		// 	]);
		// 	$fp = fopen($_FILES['additional']['tmp_name'], 'r');
		// 	$fileCode2 = \Stripe\File::create([
		// 	  'file' => $fp,
		// 	  'purpose' => 'identity_document',
		// 	]);
		// 	\Stripe\Account::update(
		//          $userData->stripeAccountId,
		//         [
		//           'business_type' => "individual"
		//         ]
		//     );

		// 	 \Stripe\Account::update(
		//         $userData->stripeAccountId,
		//          [

		//          	'bank_account' => [
		//          		'id' => $formData['id'],
		//          		'bank_name' => $formData['bank_name'],
		//          		'country' => 'US',
		//          		'routing_number' => $formData['routing_number'],
		//          		'account_holder_name' => $formData['account_holder_name'],
		//          		'account_number' => $formData['account_number']
		//          	],

		//          	'business_profile' => [
		//          		'mcc' => '4812',
		//          		'url' => "http://lyreh.com/"
		//          	],
		//           'individual' => [
		//             'first_name' => $formData['first_name'],
		//             'last_name' => $formData['last_name'],
		//             'phone' =>$formData['phone'],
		//             // 'ssn_last_4' => $formData['ssn_last_4'],
		//             // 'id_number' => $formData['id_number'],
		//             'address' => [
		//             	'line1' =>$formData['line1'],
		//             	'city' => $formData['city'],
		//             	// 'state' => $formData['state'],
		//             	'postal_code' => $formData['postal_code'],
		//             ],
		//             'dob' => [
		//             	'day' => $dateOfBirth[1],
		//             	'month' => $dateOfBirth[0],
		//             	'year' => $dateOfBirth[2],
		//             ],
		//             'verification' => [
		//          		'document' => [
		//          			'front' => $fileCode->id,
		//          			'back' => $fileCode1->id,
		//          		],
		//          		'additional_document' => [
		//          			'front' => $fileCode2->id,
		//          		],
		//          	],
		            
		//           ],
		//         ]
		//       ); 

		// 	   \Stripe\Account::update(
		// 	  	$userData->stripeAccountId,
		// 		  [
		// 		    'tos_acceptance' => [
		// 		      'date' => time(),
		// 		      'ip' => $_SERVER['REMOTE_ADDR'], // Assumes you're not using a proxy
		// 		    ],
		// 		  ]
		// 		);
		// 	   	$this->session->set_flashdata("success","Data saved successfully.");
	 //   			 redirect("account?stripeSettings=true");
  //               }
  //               catch (\Stripe\Error\Base $e) {  
  //                 $this->session->set_flashdata("error",$e->getMessage());
	 //   			 redirect("account?stripeSettings=true");
                
  //               }

			

			   

		// }
    }
    
    public function disconnectStripe(){
    	$this->Crud_model->update_data(["id"=>$_SESSION['auth_user'][0]->id],["stripeAccountId"=>""],"users");
    	$this->session->set_flashdata("success","Stripe account removed successfully.");
		redirect("account?stripeSettings=true");
    }
    
    
// 	public function payment()

//     {

//       require_once('application/libraries/stripe-php/init.php');

//       $stripeData = $this->Crud_model->get_data("","stripeSettings","",True);

//       if(!empty($stripeData)){

//       	$privateKey = $stripeData->privateKey;

//       }else{

//       	$privateKey = "";

//       }

//       $stripeSecret = $privateKey;

 

//       \Stripe\Stripe::setApiKey($stripeSecret);

      

//         $stripe = \Stripe\Charge::create ([

//                 "amount" => $this->input->post('amount'),

//                 "currency" => "eur",

//                 "source" => $this->input->post('tokenId'),

//                 // "description" => "This is from nicesnippets.com"

//         ]);

             

//       // after successfull payment, you can store payment related information into your database

              

//         $data = array('success' => true, 'data'=> $stripe);

 

//         echo json_encode($data);

//     }



    function changePaymentStatus(){

    	$orderId = $this->input->post("orderId");

    	$id = $this->Crud_model->update_data(['order_id'=>$orderId],['payment_status'=>"success"],"orders");

    	print_r($id);

    	exit;

    }



	public function mobileChatDetail()

	{

		$data=$this->constantData();



	

		

		$this->load->view('chat/detail_message', $data);

	

		



	}





	public function activation($param="", $id="")

	{

		$user=$this->action->select("users", array("activation_id"=>$id));

		if(empty($user)){

			$this->session->set_flashdata('error', "Activation id is Wrong!");

			redirect(base_url());

		}

		else{

			$userData["userData"] = $this->Crud_model->get_data("","users",["activation_id" => $id],True);

			$message = $this->load->view("welcomeTemplate" ,$userData , True);

			$this->action->send_mail($userData["userData"]->email, $message, 'Welcome');

			$this->action->update("users", array("activation_id"=>"", "status"=>"1"), array("activation_id"=>$id));

			$this->session->set_flashdata('success', "Your account has been successfully activated.");

			redirect(base_url());

		}

	}

	public function forgot_password($param="", $id="")

	{

		$data=$this->constantData();

		if($this->input->post("action")=="update_password"){

			$new_password=md5($this->input->post("new_password"));

			$this->action->update("users", array("password"=>$new_password, "activation_id"=>""), array("activation_id"=>$id));

			$this->session->set_flashdata('success', "Password updated successfully!");

			redirect(base_url());

		}

		$user=$this->action->select("users", array("activation_id"=>$id));

		if(empty($user)){

			$this->session->set_flashdata('error', "Activation id is wrong!");

			redirect(base_url()); 

		}

		else{

			$data['menus']=$this->action->select_all("pages", "sort asc");

			$data['settings']=$this->action->select_all("settings", "id asc");

			$this->load->view('forgot', $data);

		}

	}



	public function messenger($channel_id="", $id="")

	{



		$channel_data=array();

		$auth_user=$this->session->userdata('auth_user');

		@$auth_user_id=$auth_user[0]->id;

		$data['auth_user_data']=$this->action->select("users", array("id"=>$auth_user_id));

		$data['user_data']=$this->action->select("users", array("id"=>$id));

		$channel1=$this->action->select("channels", array("sender_id"=>$auth_user_id));

		if(!empty($channel1)){

			foreach($channel1 as $ch1){

				$channel_data[]="lyreh_".$ch1->id;

			}

		}

		$channel2=$this->action->select("channels", array("receiver_id"=>$auth_user_id));

		if(!empty($channel2)){

			foreach($channel2 as $ch2){

				$channel_data[]="lyreh_".$ch2->id;

			}

		}

		



		$data['channel_data'] = $channel_data;

		$data['channel_id'] = $channel_id;



		$data['restricted_items']=$this->action->select("settings", array("meta_key"=>"restricted_text"));

		$this->load->view('messenger', $data);

	}



	public function page($slug="")

	{

		$mail_settings=$this->action->select_all("mail_settings", "id asc");

		$data=$this->constantData();

		if($this->input->post("action")=="contact_us"){

			$setting_email=$this->action->select("settings", array("meta_key"=>"email"));

			$insert_data=$this->input->post();

			unset($insert_data['action']);

			$this->action->insert("contacts", $insert_data);



			// Contact us mail

			$message = '';

			$to = $setting_email[0]->meta_value;

			$subject = $mail_settings[0]->contact_subject;

		

			$message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" >';

			$message .= $mail_settings[0]->contact_message;

			$message .= "

			<table border='1'>

			<tr>

			<th>Name</th>

			<th>Email</th>

			<th>Phone</th>

			<th>Message</th>

			</tr>

			<tr>

			<td>".$this->input->post("first_name")." ".$this->input->post("last_name")."</td>

			<td>".$this->input->post("email_address")."</td>

			<td>".$this->input->post("phone_number")."</td>

			<td>".$this->input->post("message")."</td>

			</tr>

			</table>

			";

			$message .= "<p>Thanks</p>";

			// Always set content-type when sending HTML email

			$headers = "MIME-Version: 1.0" . "\r\n";

			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers

			$headers .= 'From: <'.$this->input->post("email_address").'>';

			mail($to,$subject,$message,$headers);

			// Contact us mail close



			$this->session->set_flashdata('success', "Thanks For Contact With Us!");

			redirect(base_url()."help");

		}

		if($this->input->post("action")=="concierge"){

			$setting_email=$this->action->select("settings", array("meta_key"=>"email"));

			$insert_data=$this->input->post();

			unset($insert_data['action']);

			$config['upload_path'] = './uploads/concierge/';

			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			// if ( ! $this->upload->do_upload('upload_photo')){

				

				// $this->session->set_flashdata('error', "Error in uploading image!");

				 // $data = array(

						// 'size' => $this->input->post("size"),

						// 'brand' => $this->input->post("brand"),

						// 'last_seen' => $this->input->post("last_seen"),

						// 'message' => $this->input->post("message")

					// );



				// $this->session->set_flashdata($data);

			// }

			// else{

				if (  $this->upload->do_upload('upload_photo')){

					$upload_data=$this->upload->data();

					$insert_data['upload_photo']=$upload_data['file_name'];

				}

				$id = $this->input->post('id');

				if($id>0){

					$this->action->update("concierge", $insert_data, array("id"=>$id));

				}else{

					$this->action->insert("concierge", $insert_data);

				}

				

				

				$brand_id=$this->input->post("brand");

    			$brand_data=$this->action->select("brands", array("id"=>$brand_id));

    			// Concierge mail

    			$message = '';

    			$to = $setting_email[0]->meta_value;

    			$subject = $mail_settings[0]->contact_subject;

    			$message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" >';

    			$message = $mail_settings[0]->contact_message;

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

    			<td><img src='".base_url()."uploads/concierge/".$upload_data['file_name']."' style='width: 100px'/></td>

    			<td>".$brand_data[0]->brand_name."</td>

    			<td>".$this->input->post("last_seen")."</td>

    			<td>".$this->input->post("size")."</td>

    			<td>".$this->input->post("message")."</td>

    			</tr>

    			</table>

    			";

    			$message .= "<p>Thanks</p>";

    			// Always set content-type when sending HTML email

    			$headers = "MIME-Version: 1.0" . "\r\n";

    			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    			// More headers

    			$headers .= 'From: Concierge request';

    			mail($to,$subject,$message,$headers);

    			// Concierge mail close

    

    			$this->session->set_flashdata('success', "Your request has been received.  We'll come back to you asap!");

			//}

			redirect(base_url()."concierge");

		}

		$data['content']=$this->action->select("pages",array("slug"=>$slug));

		$data['items']=$this->action->select_all("items", "id asc");

		if($slug=="buy"){    

			if(null === $this->session->userdata('auth_user')){ 

				redirect(base_url());

			}    

			$config = array();

			$config["base_url"] = base_url() . "buy";

			$config["total_rows"] = $this->action->record_count("items");

			$config["per_page"] =10;

			$config["uri_segment"] = 2;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

			$data["item_results"] = $this->action->fetch_items($config["per_page"], $page);

			$data["links"] = $this->pagination->create_links();

			$data['users']=$this->action->select_all("users", "id asc");

			$this->load->view('buy', $data);

		}   

		

		// if($slug=="userlisting"){

			

			

		// }

		

		else if($slug=="faq"){

			$data['faqs']=$this->action->select_all("faqs", "id asc");

			$this->load->view('faq', $data);

		}

		else if($slug=="notification"){

			 if(null === $this->session->userdata('auth_user')){ 

				redirect(base_url());

			}	

			$auth_user=$this->session->userdata('auth_user');

			$where_data = array(

				'receiver_id'=>$auth_user[0]->id	

			);

			$data['notifications']=$this->action->select_all_notification_id("notifications", "id asc",$auth_user[0]->id);



			$data['notifications_alert']=$this->action->select_all_notification_id("notifications_alert", "id asc",$auth_user[0]->id);



			$where = "sender_id = ".$auth_user[0]->id." or receiver_id = ".$auth_user[0]->id;



			$data['channels'] = $this->Crud_model->get_data("*","channels",$where);



			$this->load->view('notifications', $data);

		}

		else if($slug=="help"){

			$this->load->view('help', $data);

		}

		else if($slug=="concierge"){

		    if(null === $this->session->userdata('auth_user')){ 

				redirect(base_url());

			}

			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id=$auth_user[0]->id;

			$data['concierge']=$this->action->select("concierge", array("user_id"=>$auth_user_id));

			$data['brands']=$this->action->select_all("brands", "id asc");

	        $this->load->view('concierge', $data);

		}

		else{

		    $inc=0;

		    $pages=$this->action->select_all("pages", "id desc");

		    foreach($pages as $page){

		        if($page->slug==$slug){

		            $inc++;

		        }

		    }

		    if($inc>0){

		        $this->load->view('page', $data);

		    }else{

		        $this->load->view('err404', $data);

		    }

		}

	}

	

	public function userlisting($u_id=0){

		// if(null === $this->session->userdata('auth_user')){ 

				// redirect(base_url());

			// }

			// $auth_user=$this->session->userdata('auth_user');

		

			$data=$this->constantData();

			$config = array();

			$config["base_url"] = base_url() . "userlisting/".$u_id;

			$config["total_rows"] = $this->action->record_count("items");

			$config["per_page"] = 10;

			$config["uri_segment"] = 3;

			$this->pagination->initialize($config);

			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

			$data["item_results"] = $this->action->fetch_user_items($config["per_page"], $page,$u_id);

		

			$data["links"] = $this->pagination->create_links();

			$data['users']=$this->action->select_all("users", "id asc");

			$this->load->view('buyuser', $data);

	}

	

	public function sell($action="", $id="")

	{

		 $this->load->library('image_lib'); 

		if(null === $this->session->userdata('auth_user')){ 

			redirect(base_url());

		}

		

		$data=$this->constantData();

		$auth_user=$this->session->userdata('auth_user');

		@$auth_user_id=$auth_user[0]->id;

		$draft_item=$this->action->select("items", array("item_user_id"=>@$auth_user_id, "item_status"=>3));

		if(count($draft_item)>=3){

			$data['draft_button']="hide";

		}

		else{

			$data['draft_button']="show";

		}

		if($this->input->post("action")=="add_item"){

			$insert_data=$this->input->post();

			// echo "<pre>";print_r($insert_data);exit;

			if(empty($insert_data["product"])){

				$insert_data["product"] = 200;

			}

			$insert_data['item_status']=1;

			unset($insert_data['action']);

			// unset($insert_data['brand']);

			// unset($insert_data['color']);

			// unset($insert_data['material']);

			$all_brands=$this->action->select_all("brands", "id asc");

			$all_materials=$this->action->select_all("materials", "id asc");

			$all_colors=$this->action->select_all("colors", "id asc");

			

			$brand_arr = array();

			$material_arr = array();

			$color_arr = array();

			

			if(!empty($all_brands)){

				foreach($all_brands as $brand){

					$brand_arr[] = $brand->brand_name;

				}

			}

			$brand = $this->input->post('brand');

			if(in_array($brand,$brand_arr)){

				$insert_data['brand'] = $this->input->post('brand');

			}else{

				$insert_data['other_brand'] = $this->input->post('brand');

			}

			

			if(!empty($all_materials)){

				foreach($all_materials as $material){

					$material_arr[] = $material->material_name;

				}

			}

			$material = $this->input->post('material');

			if(in_array($material,$material_arr)){

				$insert_data['material'] = $this->input->post('material');

			}else{

				$insert_data['other_material'] = $this->input->post('material');

			}

			

			if(!empty($all_colors)){

				foreach($all_colors as $color){

					$color_arr[] = $color->color_name;

				}

			}

			$color = $this->input->post('color');

			if(in_array($color,$color_arr)){

				$insert_data['color'] = $this->input->post('color');

			}else{

				$insert_data['other_color'] = $this->input->post('color');

			}

			$insert_data['how_long_to_list_item'] = $this->input->post('how_long_to_list_item');

			$Date = date('Y-m-d');
			
			$insert_data['expectedDate'] = date('Y-m-d', strtotime($Date. ' + '.$insert_data["how_long_to_list_item"].' days'));
			

			

			$insert_data['slug'] = url_title($this->input->post('item_name'), 'dash', true);

			



			$config['upload_path'] = './uploads/item/';

			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);



			$error=0;

			$array_image=array();

			for($i=1; $i<=5; $i++){

			    if(null!==$_FILES['item_image_'.$i]['name']){

        			if ( ! $this->upload->do_upload('item_image_'.$i)){

        			    $error++;

        			}else{

        				$upload_data=$this->upload->data();

        				$array_image[]=$upload_data['file_name'];

	        				$config['image_library'] = 'gd2';

						    $config['source_image'] = './uploads/item/'.$upload_data['file_name'];

						    $config['create_thumb'] = TRUE;

    						$config['maintain_ratio'] = TRUE;

						    $config['width']     = 500;

						    $config['height']   = 500;

						    $this->load->library('image_lib', $config);

						    $this->image_lib->clear();

						    $this->image_lib->initialize($config);

							$this->image_lib->resize();

							 // handle if there is any problem

							 if ( ! $this->image_lib->resize()){

							  echo $this->image_lib->display_errors();

							 }else{

							 	// echo 'Done';

							 }

        				

        			}

			    }

			}

			// if($error>0){

			    // $this->session->set_flashdata('error', "Error in uploading image!");

				// $this->session->set_flashdata($insert_data);

				

			// }

			// else{

				// $insert_data['item_image']=serialize($array_image);

				// $this->action->insert("items", $insert_data);

				// $this->session->set_flashdata('success', "Item added successfully!");

			// }

			$insert_data['item_image']=serialize($array_image);

		

			// echo "<pre>";

			// print_r($insert_data);

			// exit;

			$this->action->insert("items", $insert_data);

			$this->session->set_flashdata('success', "Item added successfully!");

			redirect(base_url()."sell");

		}

		if($this->input->post("action")=="edit_item"){ 

			$update_data=$this->input->post();



			if(empty($update_data["product"])){

				$update_data["product"] = 200;

			}

			$update_data['item_status']=1;

			unset($update_data['action']);

			unset($update_data['brand']);

			unset($update_data['color']);

			unset($update_data['material']);

			$all_brands=$this->action->select_all("brands", "id asc");

			$all_materials=$this->action->select_all("materials", "id asc");

			$all_colors=$this->action->select_all("colors", "id asc");

			

			$brand_arr = array();

			$material_arr = array();

			$color_arr = array();

			

			if(!empty($all_brands)){

				foreach($all_brands as $brand){

					$brand_arr[] = $brand->brand_name;

				}

			}

			$brand = $this->input->post('brand');

			if(in_array($brand,$brand_arr)){

				$update_data['brand'] = $this->input->post('brand');

			}else{

				$update_data['other_brand'] = $this->input->post('brand');

			}

			

			if(!empty($all_materials)){

				foreach($all_materials as $material){

					$material_arr[] = $material->material_name;

				}

			}

			$material = $this->input->post('material');

			if(in_array($material,$material_arr)){

				$update_data['material'] = $this->input->post('material');

			}else{

				$update_data['other_material'] = $this->input->post('material');

			}

			

			if(!empty($all_colors)){

				foreach($all_colors as $color){

					$color_arr[] = $color->color_name;

				}

			}

			$color = $this->input->post('color');

			if(in_array($color,$color_arr)){

				$update_data['color'] = $this->input->post('color');

			}else{

				$update_data['other_color'] = $this->input->post('color');

			}

			

			$update_data['how_long_to_list_item'] = $this->input->post('how_long_to_list_item');
			
			$Date = date('Y-m-d');
			
			$update_data['expectedDate'] = date('Y-m-d', strtotime($Date. ' + '.$update_data["how_long_to_list_item"].' days'));

			$update_data['slug'] = url_title($this->input->post('item_name'), 'dash', true);

			if(isset($_FILES['item_image'])){

				$config['upload_path'] = './uploads/item/';

				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$this->load->library('upload', $config);

				$this->upload->do_upload('item_image');

				$upload_data=$this->upload->data();

				$update_data['item_image']=$upload_data['file_name'];

			}



			$this->action->update("items", $update_data, array("id"=>$id));

			$this->session->set_flashdata('success', "Item edited successfully!");	

			redirect(base_url()."sell");

		}

		$data['action']=$action;

		if($action=="edit"){
			$data['edit_item']=$this->action->select("items", array("id"=>$id));
		}

		// echo "<pre>";print_r($data['edit_item']);exit;

		$data['categorys']=$this->action->select_all("categorys", "id asc");

		$data['products']=$this->action->select_all("products", "id asc");

		$data['brands']=$this->action->select_all("brands", "id asc");

		$data['materials']=$this->action->select_all("materials", "id asc");

		$data['colors']=$this->action->select_all("colors", "id asc");

		$data['conditions']=$this->action->select_all( "conditions", "id asc");

		$data['list_items']=$this->action->select_all("list_items", "id asc");

		$data['users']=$this->action->select_all("users", "id asc");

		$this->load->view('sell', $data);

	}

	public function search()

	{

		if(null === $this->session->userdata('auth_user')){ 

			redirect(base_url());

		}

		$q=$this->input->get("q");

		if($q!=""){

			$this->action->insert("searches", array("search_name"=>$q));

		}

		$get_data=$this->action->select_all("searches", "id asc");

		$count_data=count($get_data);

		$limit=$count_data-10;

		if($limit>0){

			$where_data=array();

			foreach($get_data as $key=>$val){

				if($key<=$limit){

					$where_data[]=$val->id;

				}

			}

			$this->action->delete_wherein("searches", "id", $where_data);

		}

		$data=$this->constantData();

		$data['users']=$this->action->select_all("users", "id asc");

		$data["item_results"] = $this->action->select_orlike_order_limit("items", array("item_name"=>$q, "description"=>$q), 'id asc', 10);

	

		$this->load->view("search", $data);

	}

	public function category($cat_id="")

	{

		if(null === $this->session->userdata('auth_user')){ 

				redirect(base_url());

			}

		$data=$this->constantData();

		$data['users']=$this->action->select_all("users", "id asc");

		if($this->session->userdata('auth_user')){

			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id=$auth_user[0]->id;

			$data["item_results"] = $this->action->select("items", array("category"=>$cat_id, "item_status"=>1,"item_user_id !="=>$auth_user_id,"quantity !="=>0));

			$where['u_id'] = $auth_user[0]->id;

			$data["payment"] = $this->Crud_model->get_data("*",'orders',$where,true);

		}else{

			$data["item_results"] = $this->action->select("items", array("category"=>$cat_id, "item_status"=>1,"quantity !="=>0));

			$data["payment"] = '';

		}

		

		$this->load->view("category_items", $data);

	}

	public function updateCart(){
		$formData = $this->input->post();
		$data=array(
	        'rowid'=>$formData["rowId"],
	        'qty'=> $formData["quantity"]
	    );
		$this->cart->update($data);
		$message["message"] = "success";
		echo json_encode($message);
		exit;

	}

	public function cart()

	{

		$data=$this->constantData();

		if($this->input->get("action")=="cart_remove"){

			$row_id=$this->input->get("row_id");

			$data=array(

		        'rowid'=>$row_id,

		        'qty'=> "0"

		    );

		    $this->cart->update($data);

			$this->session->set_flashdata('success', "Data deleted successfully!");

			redirect(base_url()."cart");

		}

		$action=$this->input->post("action");

		if($action=="update_cart"){

			foreach($this->input->post("qty") as $key=>$val){

				$data=array(

			        'rowid'=>$key,

			        'qty'=> $val

			    );

			    $this->cart->update($data);

			}

			$this->session->set_flashdata('success', "Cart updated successfully!");

			redirect(base_url()."cart");

		}

		$coupon_discount = $this->session->userdata('coupon_discount');

		if(isset($coupon_discount)){

			$data['coupon_discount'] = $coupon_discount;

		}

		else{

			$data['coupon_discount'] = "";

		}

		$this->load->view('cart', $data);

	}

	public function checkout()

	{

		if(null === $this->session->userdata('auth_user')){ 

			redirect(base_url());

		}

		$data=$this->constantData();

		$coupon_discount = $this->session->userdata('coupon_discount');

		if(isset($coupon_discount)){

			$data['coupon_discount'] = $coupon_discount;

		}

		else{

			$data['coupon_discount'] = "";

		}

		$auth_user=$this->session->userdata('auth_user');

		$auth_user_id=$auth_user[0]->id;

		$data['auth_user']=$this->action->select("users", array("id"=>$auth_user_id));

		$this->load->view('checkout', $data);

	}

	public function thank_you()

	{

		$data=$this->constantData();

		$order_id=$this->input->get("order_id");

		$order_data1= $this->action->select("orders", array("order_id"=>$order_id));

		$items = unserialize($order_data1[0]->item_record);



		$useridoffeedback = array();

		foreach ($items as $key => $value) {

			$useridoffeedback = productinfo($key)->item_user_id;

		}

		$data['feedback_user'] = $useridoffeedback;

		

		if(isset($order_id)){

			$this->action->update("orders", array("payment_status"=>"success"), array("order_id"=>$order_id));

			$order_data=$this->action->select("orders", array("order_id"=>$order_id));



			$items=unserialize($order_data[0]->item_record);





			

			// Payment success mail

			$message = '';

			$to = $order_data[0]->billing_email;

			$subject = "Thank you for purchase item with us";

			$message = '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" >';

			$message = "Thanks for purchase item with us. Here is item details";

			$message .= "

			<table>

			<tr>

			<th>Name</th>

			<th>Price</th>

			<th>Quantity</th>

			<th>Subtotal</th>

			</tr>";

			foreach($items as $key=>$val){

				$message .= "<tr>	

				

				</tr>";

			}



			// <td>".@$items[$key]."</td>

			// 	<td>".@$items[$key]['price']."</td>

			// 	<td>".@$items[$key]['qty']."</td>

			// 	<td>".@$items[$key]['subtotal']."</td>

			//  $message .= "</table>";

			//  $message .= "<p>Thanks</p>";

			// // // Always set content-type when sending HTML email

			// $headers = "MIME-Version: 1.0" . "\r\n";

			// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// // More headers

			// $headers .= 'From: <'.ADMINEMAIL.'>';

			// mail($to,$subject,$message,$headers);

			// Payment success mail close

		}

		if(!empty($this->cart->contents())){

			foreach ($this->cart->contents() as $item){

				$deleteItem = array(

				    'rowid' => $item['rowid'],

				    'qty'   => 0

				);

				$this->cart->update($deleteItem);

			}

			//redirect(base_url()."thank-you");

			//$this->load->view('thank_you', $data);

		}

		$this->session->unset_userdata('coupon_discount');

		$this->load->view('thank_you', $data);

	}

	public function item($slug="")

	{

		$data=$this->constantData();

		$item=$this->action->select("items", array("slug"=>$slug));

		$item_id=$item[0]->id;

		$item_views=$item[0]->item_views;

		$this->action->update("items", array("item_views"=>$item_views+1), array("slug"=>$slug));

		$attr="";

		foreach($this->cart->contents() as $content){

			if($item[0]->item_name==$content['name']){

				$attr="k";

			}

			else{

				$attr="dk";

			}

		}

		$data['item_cart']=$attr;

		$data['item_feedback']=$this->action->select("item_feedbacks", array("item_id"=>$item_id));

		$data['users']=$this->action->select_all("users", "id asc");

		$data['single_item']=$this->action->select("items", array("slug"=>$slug));

		$this->load->view('single_item', $data);

	}

	public function account()

	{

		

		if(null === $this->session->userdata('auth_user')){

			redirect(base_url());

		}

		// print_r($this->input->post());

		// exit;

		$data=$this->constantData();

		$auth_user=$this->session->userdata('auth_user');

		$auth_user_id=$auth_user[0]->id;

		$auth_user_data=$this->action->select("users", array("id"=>$auth_user_id));

		if($this->input->post("action")=="edit_user"){

			$update_data=$this->input->post();

			$password=$this->input->post('password');

			unset($update_data['action']);

			unset($update_data['password']);



			$config['upload_path'] = './uploads/';

			$config['allowed_types'] = 'gif|jpg|png|jpeg';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('user_image')){

				$upload_data=$this->upload->data();

				

				$update_data['user_image']=$upload_data['file_name'];

			}

			if(!empty($password)){

					$update_data['password']=md5($password);

				}

			$this->action->update("users", $update_data, array("id"=>$auth_user_id));

			$this->session->set_flashdata('success', "Profile updated successfully!");

			redirect(base_url()."account");

		}

		$data['auth_items']=$this->action->select("items", array("item_user_id"=>$auth_user_id, "item_status"=>1));

		$data['auth_draft_items']=$this->action->select("items", array("item_user_id"=>$auth_user_id, "item_status"=>3));

		if(unserialize($auth_user_data[0]->like_item)){

			$data['like_item']=$this->action->select_in("items", "id", unserialize($auth_user_data[0]->like_item));

		}else{

			$data['like_item']=array();

		}

		if(unserialize($auth_user_data[0]->bookmark_item)){

			$data['bookmark_item']=$this->action->select_in("items", "id", unserialize($auth_user_data[0]->bookmark_item));

		}

		else{

			$data['bookmark_item']=array();

		}

		if(unserialize($auth_user_data[0]->follow_user)){

			$data['follow_user']=$this->action->select_in("users", "id", unserialize($auth_user_data[0]->follow_user));

		}

		else{

			$data['follow_user']=array();

		}

		$data['auth_user']=$this->action->select("users", array("id"=>$auth_user_id));

		$data['all_orders']=$this->action->select("orders", array("u_id"=>$auth_user_id));

		$data['all_purchase']=$this->Crud_model->get_data("*","orders","","","","","","","created_at","DESC");

		$this->load->view('account', $data);

	}



	public function updateProfile(){

		$auth_user=$this->session->userdata('auth_user');

		$auth_user_id=$auth_user[0]->id;

		$formData = $this->input->post();



		// print_r($formData);exit;

		if(!empty($auth_user_id)){

			if(!empty($_FILES["item_image_1"]["name"])){

				$ImageStatus = $this->input->post("ImageStatus");

				if($ImageStatus == 0){

					$this->Crud_model->update_data(["id"=>$auth_user_id],["user_image"=>"sample_user.jpg","first_name"=>$_POST["firstName"],"last_name"=>$_POST["lastName"],"username"=>$_POST["userName"]],"users");		

					redirect("Homecontroller/account");	

				}

				// print_r($_FILES["item_image_1"]);exit;

				$config['upload_path'] = './uploads/';

				$config['allowed_types'] = 'gif|jpg|png|jpeg';

				$config['max_size'] = 0; 

				$this->load->library('upload', $config);

				$this->upload->do_upload('item_image_1');

				$upload_data=$this->upload->data();

				$update_data['item_image']=$upload_data['file_name'];

				// print_r($update_data['item_image']);exit;

				$this->Crud_model->update_data(["id"=>$auth_user_id],["user_image"=>$update_data['item_image'],"first_name"=>$_POST["firstName"],"last_name"=>$_POST["lastName"],"username"=>$_POST["userName"]],"users");		

				redirect("Homecontroller/account");

			}else{

				$ImageStatus = $this->input->post("ImageStatus");

				if($ImageStatus == 0){

					$this->Crud_model->update_data(["id"=>$auth_user_id],["user_image"=>"sample_user.jpg","first_name"=>$_POST["firstName"],"last_name"=>$_POST["lastName"],"username"=>$_POST["userName"]],"users");		

					redirect("Homecontroller/account");	

				}else{

				    $this->Crud_model->update_data(["id"=>$auth_user_id],["first_name"=>$_POST["firstName"],"last_name"=>$_POST["lastName"],"username"=>$_POST["userName"]],"users");

					redirect("Homecontroller/account");	

				}

			}

		}else{

			redirect("Homecontroller");

		}

	}



	public function ajax_call()

	{

		$mail_settings=$this->action->select_all("mail_settings", "id asc");

		$action=$this->input->post("action");

		if($action=="google_signin"){

			$first_name=$this->input->post("first_name");

			$last_name=$this->input->post("last_name");

			$email=$this->input->post("email");

			$user_data=$this->action->select("users", array("email"=>$email));

			if(empty($user_data)){

				$insert_data=array(

					"first_name"=>$first_name,

					"last_name"=>$last_name,

					"role"=>"customer",

					"username"=>$email,

					"email"=>$email,

					"user_image"=>"sample_user.jpg",

					"status"=>"1",										

					"online_status"=>"online",

					"month_at"=>date('m')

				);

				$this->action->insert("users", $insert_data);

			}

			$this->session->set_userdata(array("auth_user"=>$user_data));

		}

		if($action == 'load_chat_view'){

			$where['id'] = $email=$this->input->post("channel_id");

			$updatedata['last_message_at'] = date('Y-m-d H:i:s');

			$data['date22'] = $this->Crud_model->update_data($where,$updatedata,"channels");

			$loadview['chatview'] = $this->load->view('chatview','',TRUE);

			echo json_encode($loadview);

		}

		if($action=="login"){

			$email=$this->input->post("email");

			$password=md5($this->input->post("password"));

			$user_data=$this->action->select("users", array("email"=>$email, "password"=>$password));

			

			if(empty($user_data)){

				echo "invalid";

			}

			else{

				if($user_data[0]->status=="2"){

					echo "inactive";

				}

				else if($user_data[0]->status=="3"){

					echo "delete";

				}

				else{

					$this->session->set_userdata(array("auth_user"=>$user_data));					

					$this->action->update("users", array("online_status"=>"online"), array("email"=>$email));

					echo "valid";

				}

			}

		}

		if($action=="register"){

			$activation_id=uniqid();

			$first_name=$this->input->post("first_name");

			$last_name=$this->input->post("last_name");

			$username=$this->input->post("username");

			$email=$this->input->post("email");

			$password=md5($this->input->post("password"));

			$re_password=md5($this->input->post("re_password"));

			$user_data=$this->action->select("users", array("email"=>$email));

			$userNameCheck=$this->action->select("users", array("username"=>$username));

			

			if(!empty($user_data)){

				echo "duplicate_email";

			}

			else if($password!=$re_password){

				echo "pass_mistmatch";

			}else if(!empty($userNameCheck)){

				echo "duplicate_username";

				// print_r("duplicate_username");

				// print_r($userNameCheck);exit;

			}

			else{

				$insert_data=array(

					"first_name"=>$first_name,

					"last_name"=>$last_name,

					"role"=>"customer",

					"username"=>$username,

					"email"=>$email,

					"password"=>$password,

					"user_image"=>"sample_user.jpg",

					"activation_id"=>$activation_id,

					"status"=>"2",										

					"online_status"=>"offline",

					"month_at"=>date('m')

				);

				$id_newuser = $this->action->insert("users", $insert_data);

				

				// $admininfo = get_admininfo();

				// foreach ($admininfo as $key => $value) {

					$channel_id = 1;

					$message= ''.$username.', welcome to Lyreh!';



					$insert_data=array(

						"sender_id"=>$id_newuser,

						"receiver_id"=>0,

						"message"=>$message,

						"admin_read"=>1,	

					);

					$this->action->insert("notifications_alert", $insert_data);	

				//}

				// Registration mail

				$to = $email;

				// $subject = $mail_settings[0]->registration_subject;

				$message = $this->shortcode_generator($mail_settings[0]->registration_message, $email);

				$this->action->send_mail($to,$message,"Lyreh New account");

				// Always set content-type when sending HTML email

				// $headers = "MIME-Version: 1.0" . "\r\n";

				// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers

				// $headers .= 'From: <admin@lyreh.com>';

				//mail($to,$subject,$message,$headers);

				// Registration mail close



				echo "success";

			}

		}

		if($action=="forgot_password"){

			$activation_id=uniqid();

			$email=$this->input->post("email");

			$user_data=$this->action->select("users", array("email"=>$email));

			if(empty($user_data)){

				echo "invalid";

			}

			else{

				$this->action->update("users", array("activation_id"=>$activation_id), array("email"=>$email));



				// Forgot password mail

				$to = $email;

				$subject = $mail_settings[0]->forgot_password_subject;

				$message = $this->shortcode_generator($mail_settings[0]->forgot_password_message, $email);

				// Always set content-type when sending HTML email

				$headers = "MIME-Version: 1.0" . "\r\n";

				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers

				$headers .= 'From: <admin@lyreh.com>';

				mail($to,$subject,$message,$headers);

				// Forgot password mail close



				echo "success";

			}

		}

		if($action=="add_to_cart"){

			$item_id=$this->input->post("item_id");

			$item_count=$this->input->post("item_count");

			$item=$this->action->select("items",array("id"=>$item_id));



			$auth_user=$this->session->userdata('auth_user');

			@$auth_user_id=$auth_user[0]->id;

			$auth_user_data=$this->action->select("users", array("id"=>$auth_user_id));

			$offer_status="";

	        if(!empty($auth_user_data)){

	          $offer_data=$auth_user_data[0]->offer_data;

	          if($offer_data!=""){

	            foreach(unserialize($offer_data) as $offer){

	              if($offer['item_id']==$item[0]->id){

	                if($offer['status']=="approve"){

	                  $offer_status="approve";

	                }

	              }

	            }

	          }

	        }

	        if($offer_status=="approve"){

	        	$price=$offer['offer_price'];

	        }

	        else{

	        	$price=$item[0]->price;

	        	

	        }

			$postage_fee=$item[0]->postage_fee;

			$insert_data = array(

			        'id'      => 'sku_'.$item[0]->id,

			        'qty'     => $item_count,

			        'price'   => $price,

			        'postage_fee'   => $postage_fee,

			        'name'    => $item[0]->item_name,

			        'image'   => base_url()."uploads/item/".unserialize($item[0]->item_image)[0]

			        //'options' => array('Size' => 'L', 'Color' => 'Red')

			);

			

			$this->cart->insert($insert_data);

			echo "success";

		}

		if($action=="coupon_data"){

			$coupon=$this->input->post("c_code");;

			$coupon_data=$this->action->select("coupons",array("coupon_code"=>$coupon));

			if(empty($coupon_data)){

				echo "error";

			}

			else{

				$this->session->set_userdata('coupon_discount', $coupon_data[0]->discount);

				echo "apply";

			}

		}

		if($action=="checkout_data"){

			$auth_user=$this->session->userdata('auth_user');

			$rec=$this->input->post("rec");

			parse_str($rec, $data);

			// print_r($data);exit;

    unset($data["confrim_email"]);
			$insert_dat=array();

			foreach($data as $key=>$val){

				if(is_array($val)){

					$val=serialize($val);

				}

				$insert_dat[$key]=$val;

			}



			$orderId = $insert_dat["order_id"];

// 			print_r($data['item_record']);exit;

			foreach ($data['item_record'] as $key => $value) {

			    

				$nameofseller = productinfo($key);

				$userinfo = userinfo($nameofseller->item_user_id);

				$postageFee = 0;

				if(!empty($nameofseller->postage_fee)){

				    $postageFee = $nameofseller->postage_fee;

				}



				$auth_user_name = $auth_user[0]->username;

				$sender_id = $auth_user[0]->id;

				$receiver_id = $userinfo->id;

				$channel_id = 1;

				$message= $auth_user_name.' purchased <b>'.$key.'</b> product';





				$insert_data=array(

					"sender_id"=>$sender_id,

					"receiver_id"=>$receiver_id,

					"message"=>$message,

					"notification_type" => "order",

					"order_id" => $orderId



				);

				$res = $this->action->insert("notifications_alert", $insert_data);

				

				if(!empty($nameofseller->brand)){

					$offerBrandName = $this->Crud_model->get_data("","brands",["id",$nameofseller->brand],True);

				}else{

					$offerBrandName = $this->Crud_model->get_data("","brands",["id",$nameofseller->other_brand],True);

					if(empty($offerBrandName)){

						$offerBrandName = $nameofseller->other_brand;

					}

					

				}

				if(empty($offerBrandName->brand_name)){

				    $offerBrand = "";

				}else{

				    $offerBrand = $offerBrandName->brand_name;

				}

				// print_r($offerBrandName);exit;

	// Offer mail

				$to = $auth_user[0]->email;

				

				if(!empty(unserialize($nameofseller->item_image)[0])){

					$path = base_url()."uploads/item/".unserialize($nameofseller->item_image)[0];	

				}else{

					$path = base_url()."themes/front/images/no-product.jpg";	

				}

				$commission = $this->Crud_model->get_data("","commission","",True);

				

				

				$totalPrice = $value["price"]+$postageFee;

				$totalPrice = $totalPrice;

				$percentage = 0;

				if(!empty($commission->commission)){

				    $percentage = $commission->commission;

				}

				

                $commissionPrice = ($percentage / 100) * $totalPrice;

				$commissionPrice = number_format($commissionPrice,2, '.', '');

				$remainingPrice = $totalPrice-$commissionPrice;

				$subject = "Lyreh Order Detail";
				$message = '<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style type="text/css" media="screen">
			p{
				text-align: left;
			}
	@media only screen and (max-width: 576px){
							table{width: 100%!important;}
							p{text-align: center!important;}
						}
	</style>
<table width="100%" cellpadding="0"> 
	
	<tr>
		<td align="center" style="border-bottom: 1px solid #d99f6f;margin: 0px 50px;padding: 10px 0px;">
			<a href="'.base_url().'"><img src="https://lyreh.com/themes/front/images/logo.png" width="110px;"></a>
			</td>
	</tr>
	<tr>
		<td align="center">
			<table width="60%">
				
		
	<tr>
		<td>
			<p style="color: #000;font-size: 22px;font-weight: 400;margin-top: 10px; margin-top: 50px;">
			Hi '.$auth_user[0]->first_name.'</p>
			
		</td>
	</tr>
		<tr>
		<td>
			<p style="color: #000;font-size: 22px;">
			Thank you for shopping with Lyreh,
			</p>
			
		</td>
	</tr>
	<tr>
		<td align="center">
			<img src="'.$path.'" width="200" height="300">
		</td>
	</tr>
	<tr>
		<td align="center">
			<table width="50%">
				<tbody>
					<tr>
						<td>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">ITEM NAME: '.$nameofseller->item_name.'</p>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">BRAND: '.$offerBrand.'</p>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">PRICE: £'.$value["price"].'</p>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">SHIPPING FEE: £'.$postageFee.' </p>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">TOTAL: £'.$totalPrice.'</p>

						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
		<tr>
				<td>
					<p style="font-weight: 700;font-size: 20px;">WHAT NEXT?</p>
				</td>
			</tr>
<tr>
	<td>

		<table>
		
			<tr style="vertical-align: top;">
			<td ><span style="font-size:25px;">&#8226;</span></td>
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">We`ve notified '.$userinfo->first_name.' about your purchase and shared your delivery information</p></td>
		</tr>
		<tr style="vertical-align: top;">
			<td ><span style="font-size:25px;">&#8226;</span></td>
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">The seller should ship your item within the next few days but you can message them directly if you have any questions</p></td>
		</tr>
		<tr style="vertical-align: top;">
			<td ><span style="font-size:25px;">&#8226;</span></td>
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">Track your shipping information via your profile > purchases</p></td>
		</tr>
		<tr style="vertical-align: top;">
			<td ><span style="font-size:25px;">&#8226;</span></td>
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">When you receive your item, leave feedback. Be honest, open and fair</p></td>
		</tr>
		
		</table>

	</td>
</tr>
<tr>
	<td>
		<p style="font-weight: 700; text-align: center; font-size: 22px;">We`re also <a href="'.base_url("help").'" style="text-decoration: underline;color: #000;">here</a> to help</p>
	</td>
</tr>

	<tr>
		<td >
			<p style="color: #000;margin-top: 0px;margin-bottom: 0px;font-size: 22px;padding-left: 50px;">Thank you for choosing us!</p>
		</td>
	</tr>
	<tr>
		<td >
			<p><b style="color: #000;font-size: 22px;padding-left: 50px;">The Lyreh Team</b></p>
		</td>
	</tr>
	
	
	
	
	</table>
		</td>
	</tr>
	<tr>
			<td align="center" style="border-bottom: 1px solid #d99f6f;padding:20px 0px;">
			</td>
	</tr>
	
	<tr>
		<td align="center">
			<table width="60%">
				<tr>
					<td align="center" style="padding-top: 10px;">
						<a href="'.base_url().'">Lyreh.com</a><span style="color:grey;">- 20-22 Wenlock Road, London N1 7GU - Company No. 11960945</span>
					</td>
				</tr>
			</table>
			
		</td>
		</tr>
	
	
</table>







</body>
</html>';
// print_r($message);exit;
		
		$this->action->send_mail($to,$message,"Lyreh Order Detail");	
		
		
		if(!empty($nameofseller->brand)){
					$offerBrandName = $this->Crud_model->get_data("","brands",["id",$nameofseller->brand],True);
				}else{
					$offerBrandName = $this->Crud_model->get_data("","brands",["id",$nameofseller->other_brand],True);
					if(empty($offerBrandName)){
						$offerBrandName = $nameofseller->other_brand;
					}
					
				}
				if(empty($offerBrandName->brand_name)){
				    $offerBrand = "";
				}else{
				    $offerBrand = $offerBrandName->brand_name;
				}
	// Offer mail
				$to = $userinfo->email;
				// if(!empty(unserialize($nameofseller->item_image)[0])){
				// 	$path = base_url()."uploads/item/".unserialize($nameofseller->item_image)[0];	
				// }else{
				// 	$path = base_url()."themes/front/images/no-product.jpg";	
				// }
				$subject = "Lyreh Order Detail";
				$message = '<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<style type="text/css" media="screen">
			p{
				text-align: left;
			}
	@media only screen and (max-width: 576px){
							table{width: 100%!important;}
							p{text-align: center!important;}
						}
	</style>
<table width="100%" cellpadding="0"> 
	
	<tr>
		<td align="center" style="border-bottom: 1px solid #d99f6f;margin: 0px 50px;padding: 10px 0px;">
			<a href="#"><img src="https://lyreh.com/themes/front/images/logo.png" width="110px;"></a>
			</td>
	</tr>
	<tr>
		<td align="center">
			<table width="60%">
				
		
	<tr>
		<td>
			<p style="color: #000;font-size: 22px;font-weight: 400;margin-top: 10px;padding-left: 50px; margin-top: 50px;">
			Hi '.$userinfo->first_name.'</p>
			
		</td>
	</tr>
		<tr>
		<td>
			<p style="color: #000;font-size: 22px;">
			You`ve just sold an item and it`s time to ship
			</p>
			
		</td>
	</tr>
	<tr>
		<td align="center">
			<img src="'.$path.'" width="200" height="300">
		</td>
	</tr>
	<tr>
		<td align="center">
			<table width="50%">
				<tbody>
					<tr>
						<td>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">ITEM NAME: '.$nameofseller->item_name.'</p>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">BRAND: '.$offerBrand.'</p>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">PURCHASE PRICE: £'.$value["price"].'</p>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">SHIPPING FEE: £'.$postageFee.' </p>
							<p style="font-size: 20px;font-weight: 700;margin: 0px;">LYREH FEE: £'.$commissionPrice.' </p>

							<p style="font-size: 20px;font-weight: 700;margin: 0px;">TOTAL PAID TO YOU: £'.$remainingPrice.'</p>

						</td>
					</tr>
				</tbody>
			</table>
		</td>
	</tr>
<tr>
	<td>
		<table>
			<tr>
				<td>
					<p style="font-weight: 700;font-size: 20px;">YOUR ITEM WAS PURCHASED BY</p>
				</td>
			</tr>
			<tr>
			
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">Cheryl Brown</p></td>
		</tr>
		<tr>
			
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">123 Acrorn road</p></td>
		</tr>
		<tr>
		
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">Bromley</p></td>
		</tr>
		<tr>
		
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">Kent</p></td>
			</tr>
		<tr>
		
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">BR2 9RE</p></td>
			</tr>
		<tr>
		
		<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">Notes from buyer - '.$data["order_notes"].'</p></td>

			

		</tr>
		
		</table>

	</td>
</tr>
<tr>
				<td>
					<p style="font-weight: 700;font-size: 20px;">WHAT NEXT?</p>
				</td>
			</tr>
<tr>
	<td>

		<table>
		
			<tr style="vertical-align: top;">
			<td><span style="font-size:25px;">&#8226;</span></td>
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">Please prepare and ship your item</p></td>
		</tr>
		<tr style="vertical-align: top;">
			<td><span style="font-size:25px;">&#8226;</span></td>
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">We`ve notified your buyer that you should ship your item within the next few days</p></td>
		</tr>
		<tr style="vertical-align: top;">
			<td><span style="font-size:25px;">&#8226;</span></td>
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;"> Include the shipping information via your profile > items sold.</p></td>
		</tr>
		<tr style="vertical-align: top;">
			<td><span style="font-size:25px;">&#8226;</span></td>
			<td><p style="font-size: 20px;font-weight: 500;color: #000;margin: 0px;">Dont forget to leave feedback. Be honest, open and fair</p></td>
		</tr>
		
		</table>

	</td>
</tr>
<tr>
	<td>
		<p style="font-weight: 700; text-align: center; font-size: 22px;">We`re also <a href="'.base_url("help").'" style="text-decoration: underline;color: #000;">here</a> to help</p>
	</td>
</tr>

	<tr>
		<td >
			<p style="color: #000;margin-top: 0px;margin-bottom: 0px;font-size: 22px;padding-left: 50px;">Thank you for choosing us!</p>
		</td>
	</tr>
	<tr>
		<td >
			<p><b style="color: #000;font-size: 22px;padding-left: 50px;">The Lyreh Team</b></p>
		</td>
	</tr>
	
	
	
	
	</table>
		</td>
	</tr>
	<tr>
			<td align="center" style="border-bottom: 1px solid #d99f6f;padding:20px 0px;">
			</td>
	</tr>
	
	<tr>
		<td align="center">
			<table width="60%">
				<tr>
					<td align="center" style="padding-top: 10px;">
						<a href="'.base_url().'">Lyreh.com</a><span style="color:grey;">- 20-22 Wenlock Road, London N1 7GU - Company No. 11960945</span>
					</td>
				</tr>
			</table>
			
		</td>
		</tr>
	
	
</table>







</body>
</html>';
		$this->action->send_mail($to,$message,"Lyreh Order Detail");

		

		

				

			}

			//$nameofseller = productinfo($rec);

			//die;

			$insert_data=array();

			foreach($data as $key=>$val){
				// print_r($val);exit;
				if(is_array($val)){

					$val=serialize($val);

				}
				$insert_data[$key]=$val;
			}
			$newData = unserialize($insert_data["item_record"]);
			foreach ($newData as $newDataKey => $newDatavalue) {
				$smallLetters = strtolower($newDataKey);
				$smallLetters = str_replace(" ", "-", $smallLetters);
				$this->Crud_model->update_data(["slug"=>$smallLetters],["quantity"=>0],"items");
				
			}

			// ;exit;
			$insert_data['month_at'] = date('m');
			$check_duplicate_order=$this->action->select("orders",array("order_id"=>$insert_data["order_id"]));
			if(empty($check_duplicate_order)){
				$auth_user=$this->session->userdata('auth_user');

				$auth_user_id = $auth_user[0]->id;

				$insert_data['u_id'] = $auth_user_id;

				$this->action->insert("orders", $insert_data);

			}



		} 

		if($action=="feedback_data"){

			$rec=$this->input->post("rec");

			parse_str($rec, $data);

			$this->action->insert("item_feedbacks", $data);

		}

		if($action=="get_channel"){

			$user_id=$this->input->post("user_id");

			$auth_user_id=$this->input->post("auth_user_id");

			$get_channel=$this->action->select("channels", array("sender_id"=>$user_id, "receiver_id"=>$auth_user_id));

			if(empty($get_channel)){

				$get_channel=$this->action->select("channels", array("sender_id"=>$auth_user_id, "receiver_id"=>$user_id));

			}

			if(empty($get_channel)){

				$this->action->insert("channels",array("sender_id"=>$auth_user_id, "receiver_id"=>$user_id));

				

				$get_channel=$this->action->select("channels", array("sender_id"=>$auth_user_id, "receiver_id"=>$user_id));

			}

			echo $get_channel[0]->id;

		}

		if($action=="add_like"){

			$data=array();

			$user_like=array();

			$item_id=$this->input->post("item_id");

			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id=$auth_user[0]->id;

			

			$item_data=$this->action->select("items", array("id"=>$item_id));

			if($item_data[0]->like_user==""){

			    $user_like[]=$auth_user_id;

			}

			else{

			    $unserialize=unserialize($item_data[0]->like_user);

			    $inc=0;

				if(!empty($unserialize)){

					foreach($unserialize as $uns){

						if($uns!=$auth_user_id){

							$user_like[]=$uns;

						}

					}

				}

				else{

				    $user_like[]=$auth_user_id;

				}

			}

			$this->action->update("items", array("like_user"=>serialize($user_like)), array("id"=>$item_id));

			

			$user_data=$this->action->select("users", array("id"=>$auth_user_id));

			if($user_data[0]->like_item==""){

				$data[]=$item_id;

			}

			else{

				$unserialize=unserialize($user_data[0]->like_item);

				$inc=0;

				if(!empty($unserialize)){

					foreach($unserialize as $uns){

						if($uns!=$item_id){

							$data[]=$uns;

						}

						else{

							$inc++;

						}

					}

				}

				if($inc==0){

					$data[]=$item_id;

					$return_data['data']="increase";

				}

				else{

					$return_data['data']="decrease";

				}

			}

				

			$return_data['id']=$item_id;

			$this->action->update("users", array("like_item"=>serialize($data)), array("id"=>$auth_user_id));



			$return_data['likes'] = count(unserialize(serialize($data)));

			echo json_encode($return_data);

		}

		if($action=="add_bookmark"){

			$data=array();

			$item_id=$this->input->post("item_id");

			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id=$auth_user[0]->id;

			$user_data=$this->action->select("users", array("id"=>$auth_user_id));

			if($user_data[0]->bookmark_item==""){

				$data[]=$item_id;

			}

			else{

				$unserialize=unserialize($user_data[0]->bookmark_item);

				$inc=0;

				if(!empty($unserialize)){

					foreach($unserialize as $uns){

						if($uns!=$item_id){

							$data[]=$uns;

						}

						else{

							$inc++;

						}

					}

				}

				if($inc==0){

					$data[]=$item_id;

					$return_data['data']="increase";

				}

				else{

					$return_data['data']="decrease";

				}

			}

			$return_data['id']=$item_id;

			$this->action->update("users", array("bookmark_item"=>serialize($data)), array("id"=>$auth_user_id));

			echo json_encode($return_data);

		}

		if($action=="follow_user"){

			$data=array();

			$follow_user_id=$this->input->post("follow_user_id");

			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id=$auth_user[0]->id;

			$user_data=$this->action->select("users", array("id"=>$auth_user_id));

			if($user_data[0]->follow_user==""){

				$data[]=$follow_user_id;

			}

			else{

				$unserialize=unserialize($user_data[0]->follow_user);

				$inc=0;

				if(!empty($unserialize)){

					foreach($unserialize as $uns){

						if($uns!=$follow_user_id){

							$data[]=$uns;

						}

						else{

							$inc++;

						}

					}

				}

				if($inc==0){

					$data[]=$follow_user_id;

					$return_data['data']="increase";

				}

				else{

					$return_data['data']="decrease";

				}

			}

			$return_data['id']=$follow_user_id;

			$this->action->update("users", array("follow_user"=>serialize($data)), array("id"=>$auth_user_id));

			echo json_encode($return_data);

		}



		if($action == "getorderstatus"){

			$where['id'] = $this->input->post("id");

			$data['orders'] = $this->Crud_model->get_data("*","orders",$where,true);

			echo json_encode($data);

		}



		if($action == "updateorderstatus"){

			$where['id'] = $this->input->post("id");

			$data['shippingStatus'] = $this->input->post("status");
            // print_r($data['shippingStatus']);exit;    
			$data['trackingInformation'] = $this->input->post("trackingInformation");

			$data['shippingProvider'] = $this->input->post("shippingProvider");

			$data['trackingNumber'] = $this->input->post("trackingNumber");

			$data = $this->Crud_model->update_data($where,$data,"orders");

			echo json_encode($data);

		}



		if($action == "savefeedback"){

			$data['user_id'] = $this->input->post("user_id");

			$data['user_feedbackid'] = $this->input->post("user_feedbackid");

			$data['rating'] = $this->input->post("rating");

			$data['notes'] = $this->input->post("notes");

			$data["status"] = 1;

			$data["orderId"] = $this->input->post("orderId");

			$data = $this->Crud_model->add_data($data,"users_feedbacks");

			echo json_encode($data);

		}

		if($action=="add_notification"){

			$sender_id=$this->input->post("sender_id");

			$receiver_id=$this->input->post("receiver_id");

			$channel_id=$this->input->post("channel_id");

			$message1=$this->input->post("text");

			$this->action->delete("notifications", array("sender_id"=>$sender_id, "receiver_id"=>$receiver_id));

			$insert_data=array(

				"sender_id"=>$sender_id,

				"receiver_id"=>$receiver_id,

				"channel_id"=>$channel_id,

				"message"=>$message1,

				"msg_read"=>"0"	

			);

			

			$reciver_data=$this->action->select("users", array("id"=>$receiver_id));

			$sender_data=$this->action->select("users", array("id"=>$sender_id));

			

			

			// reciver

			$message = ''; 

			$to = $reciver_data[0]->email;

			$subject = "Notification";

			$message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" >';

			$message .= "Hey ".$reciver_data[0]->first_name." you've receieved a message from ".$sender_data[0]->first_name.', please check bellow.';

			$message .= "<p>Thanks</p>";

			$message .= "<p>".$message1."</p>";

			// Always set content-type when sending HTML email

			$headers = "MIME-Version: 1.0" . "\r\n";

			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers

			//$headers .= 'From: <'.$auth_user_data[0]->email.'>';

			$headers .= 'From: <'.ADMINEMAIL.'>';

			//mail($to,$subject,$message,$headers);

			$this->action->insert("notifications", $insert_data);

			echo "success";

		}

		if($action=="braintree_success"){

			$auth_user_id=$this->input->post("auth_user_id");

			$this->action->update("orders", array("payment_status"=>"success"), array("payment_mode"=>"card_pay"));

		}

		

		if($action=='offer_data'){

			if(null === $this->session->userdata('auth_user')){

				redirect(base_url());

			}

			$data=$this->constantData();

			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id=$auth_user[0]->id;

			$auth_user_data=$this->action->select("users", array("id"=>$auth_user_id));

			$item_id=$this->input->post("item_id");

			 $c=0;

			 if(@$auth_user_data[0]->offer_data!=""){

				 $offer_count=unserialize($auth_user_data[0]->offer_data);

				 $c=0;

				

				 foreach($offer_count as $count){

					 if($item_id==$count['item_id']){

						 $c++;

					 }

				 }

			 }

		

			

			$item_data=$this->action->select("items", array("id"=>$item_id));

			$arr = $item_data[0];

			$fromId = $this->session->userdata('auth_user')[0]->id;

			 $query1 = "SELECT count(offerId) as offerCount FROM offerdata WHERE  productSlug='".$item_data[0]->slug."' AND  fromId='".$fromId."'";

	         $offerCount = $this->db->query($query1)->result();

	       //  print_r($offerCount[0]->offerCount);exit;

	        $this->db->select("*");

            $this->db->from("offerdata");

            $this->db->where("fromId",$fromId);

            $this->db->where("productSlug",$item_data[0]->slug);

            $this->db->limit(1);

            $this->db->order_by('offerId',"DESC");

            $queryy = $this->db->get();

            $offerData = $queryy->result();

            // print_r($offerData);exit;

            $offerTime = 1;

            if(!empty($offerData)){

                $offerTime = strtotime(date("Y-m-d H:i:s", strtotime($offerData[0]->offerTime . " + 2 day")));

    	    	$currentDate = strtotime(date("Y-m-d H:i:s"));

    	    	if($offerData[0]->offerStatus == "declined"){

    			   $offerTime = 1;

    	    		}else{

	    	    	if($currentDate >= $offerTime){

	    	    	    $offerTime = 1;

	    	    	}else{

	    	    	    $offerTime = 0;

	    	    	}

    	    	}

            }

            if(!empty($offerCount)){

                $offerCount = $offerCount[0]->offerCount;

                

            }		

			if(empty($offerCount)){

			    $offerCount = 0;

			}

			$arr->c=$offerCount;

			$arr->offerTime=$offerTime;

			echo json_encode($arr);

		}

		if($action=="save_draft"){

			$rec=$this->input->post("rec");

			$id=$this->input->post("id");

			parse_str($rec, $data);

			$data['item_image']=serialize(array("sample.png"));

			$data['item_status']=3;

			unset($data['action']);

			$get_data=array();

			foreach($data as $key=>$val){

				if(is_array($val)){

					$val=serialize($val);

				}

				$get_data[$key]=$val;

			}

			if($id==""){

				$this->action->insert("items", $get_data);

			}

			else{

				$this->action->update("items", $get_data, array("id"=>$id));

			}

		}

		if($action=="notification_read"){

			$auth_user = $this->session->userdata('auth_user');

			$auth_user_id = $auth_user[0]->id;

			$this->action->update("notifications", array("msg_read"=>1), array("receiver_id"=>$auth_user_id));

		}

		if($action=="notification_read_alert"){

			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id = $auth_user[0]->id;

			$this->action->update("notifications_alert", array("receiver_read"=>1), array("receiver_id"=>$auth_user_id));



			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id = $auth_user[0]->id;

			$this->action->update("notifications_alert", array("sender_read"=>1), array("sender_id"=>$auth_user_id));



			// $auth_user = $this->session->userdata('auth_user');

			// $auth_user_id = $auth_user[0]->id;

			// $where['receiver_id'] = $auth_user_id;

			// $where['sender_id'] = $auth_user_id;

			// $where = "receiver_id = ".$auth_user_id. ' or sender_id = '.$auth_user_id;

			// $data['msg_read'] = 1;

			// $this->Crud_model->update_data($where,$data,"notifications_alert");

			//$this->action->update("notifications_alert", array("msg_read"=>1), array("receiver_id"=>$auth_user_id, "sender_id"=>$auth_user_id));

		}

		if($action=="notification_remove"){

			$formData = $this->input->post();

			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id = $auth_user[0]->id;

			$this->Crud_model->update_data(["id"=>$formData['notifyId'],"receiver_id"=>$auth_user_id],array("receive_read"=>1),"notifications_alert");

			// $this->action->update("notifications_alert", array("receive_read"=>1), array("receiver_id"=>$auth_user_id));



			$auth_user=$this->session->userdata('auth_user');

			$auth_user_id = $auth_user[0]->id;

			$this->Crud_model->update_data(["id"=>$formData['notifyId'],"sender_id"=>$auth_user_id],array("send_read"=>1),"notifications_alert");

			

		}

		if($action=="get_subcategory"){

		    $data['action']=$action;

			$data['category_id']=$this->input->post("category_id");

			$data['get_subcat']=$this->action->select_all("subcategories", "id asc");

			$subCateCheck = 0;

			foreach ($data['get_subcat'] as $checkSubCat) {

				if(in_array($data['category_id'], unserialize($checkSubCat->category_id))){

	    				$subCateCheck = 1;

    			}

			}

			$data["subCateCheck"] = $subCateCheck;

			$this->load->view("sell_ajax", $data);

		}

		if($action=="get_product"){

		    $data['action']=$action;

			$category_id=$this->input->post("category_id");

			$subcategory_id=$this->input->post("subcategory_id");

			if(isset($category_id)){

				$data['get_product']=$this->action->select("products", array("category_id"=>$category_id));

			}

			else{

			    $data['kids_category_id']=$this->input->post("kids_category_id");

				$data['get_product']=$this->action->select("products", array("subcategory_id"=>$subcategory_id));

			}

			$this->load->view("sell_ajax", $data);

		}

		if($action=="get_size"){

		    $data['action']=$action;

			$category_id=$this->input->post("category_id");

			$subcategory_id=$this->input->post("subcategory_id");

			$data['get_size']=$this->action->select("sizes", array("category_id"=>$category_id, "subcategory_id"=>$subcategory_id));

			$this->load->view("sell_ajax", $data);

		}

		

		if($action=="delete_item"){

			$id=$this->input->post("id");

			$this->action->delete("items", array("id"=>$id));

			echo 1;

			return;

		}

		

		if($action=='offer_submit'){

			$slug = $this->input->post("productSlug");

			$toId = $this->input->post("toId");

			$item_id=$this->input->post("item_id");

			$item_data=$this->action->select("items", array("id"=>$item_id));

			$offer_price=$this->input->post("offer_price");

			$offer_msg=$this->input->post("offer_msg");

			$auth_user_id=$this->input->post("auth_user_id");

			$item_user_id=$item_data[0]->item_user_id;

			$item_user_data=$this->action->select("users", array("id"=>$item_user_id));

			$auth_user_data=$this->action->select("users", array("id"=>$auth_user_id));

			$update_data=array();

			$new_update_data=array(

				"item_id"=>$item_id,

				"item_price"=>$item_data[0]->price,

				"offer_price"=>$offer_price,

				"offer_msg"=>$offer_msg,

				"auth_user_id"=>$auth_user_id,

				"status"=>"pending"

			);

			array_push($update_data, $new_update_data);

			$offer_exit=false;

			if($auth_user_data[0]->offer_data!=""){

				$offer_data=unserialize($auth_user_data[0]->offer_data);

				

				foreach($offer_data as $data){

					if((isset($data['item_id']) && $data['item_id'] === $item_id) && (isset($data['auth_user_id']) && $data['auth_user_id'] === $auth_user_id) && (isset($data['status']) && $data['status'] === 'pending')){

						$offer_exit = true;

					}

					array_push($update_data, $data);

				}

			}



// Add to chat



$fromId = $this->session->userdata('auth_user')[0]->id;

// $fromData = $this->input->post();

// print_r($fromId." ".$slug." ".$toId);exit;



    //      $query1 = "SELECT count(offerId) as offerCount FROM offerdata WHERE  productSlug='".$slug."' AND  fromId='".$fromId."'";

	   //  $offerCount = $this->db->query($query1)->result();

    //      print_r($offerCount->offerCount);exit;

         

         $query1 = "SELECT * FROM chatstart WHERE  productSlug='".$slug."' AND  fromId='".$fromId."' AND toId='".$toId."' OR (productSlug='".$slug."' AND  fromId='".$toId."' AND toId='".$fromId."')";

	     $conversationData = $this->db->query($query1)->result();

	     // print_r($conversationData);exit;

	     $offerId = uniqid();

	     $offerDataArray = array(

	     	"productSlug" => $slug,

	     	"fromId" => $fromId,

	     	"toId" => $toId,

	     	"offerPrice" => $offer_price,

	     	"offerMessage" => $offer_msg,

	     	"offerStatus" => "pending",

	     	"offerTime" => date("Y-m-d H:i:s"),

	     	"offerUniqueId" => "offer-sent-".$offerId



	     );

	     $this->Crud_model->add_data($offerDataArray,"offerdata");

		if(!empty($conversationData)){

		  //  print_r($conversationData);exit;

		$sequenceData = $this->db->order_by('chatId',"desc")

				->limit(1)

				->get('chat')

				->row();

				$chatData = array(

			  	'fromId' => $fromId,

			  	'toId' => $toId,

			  	'sequence' => $sequenceData->sequence+1,

			  	'message' => "offer-sent-".$offerId,

			  	'time' => date("Y-m-d H:i:s"),

			  	'chatStartId' => $conversationData[0]->chatStartId,

			  	'receiveId' => $toId,

			  	'status' => "unread"

			  	);

				$chatInserted = $this->Crud_model->add_data($chatData,"chat");	

				$this->Crud_model->update_data(['chatStartId'=>$conversationData[0]->chatStartId],['time'=>date("Y-m-d H:i:s")],"chatstart");

				$notificationData = array(

					"sender_id" => $fromId,

					"receiver_id" => $toId,

					"message" => "offer-sent-".$offerId,

					"receiver_read" => 0,

					"sender_read" => 0,

					"admin_read" => 0,

					"created_at" => date("Y-m-d H:i:s"),

					"notification_type" => "offer",

					"conversation_id" => $conversationData[0]->chatStartId

				);

				$this->Crud_model->add_data($notificationData,"notifications_alert");



}else{

	$dataArray = array(

			  	'fromId' => $fromId,

			  	'toId' => $toId,

			  	'productSlug' => $slug,

			  	'type' => 1,

			  	'time'=>date("Y-m-d H:i:s")

			  );

	$chatStartId = $this->Crud_model->add_data($dataArray,"chatstart");

			if(!empty($chatStartId)){

				$sequenceData = $this->db->order_by('chatId',"desc")

				->limit(1)

				->get('chat')

				->row();

				if(empty($sequenceData->sequence)){

					$sequence = 1;

				}else{

					$sequence = $sequenceData->sequence;

				}

				$chatData = array(

			  	'fromId' => $fromId,

			  	'toId' => $toId,

			  	'sequence' => $sequence+1,

			  	'message' => "offer-sent-".$offerId,

			  	'time' => date("Y-m-d H:i:s"),

			  	'chatStartId' => $chatStartId,

			  	'receiveId' => $toId,

			  	'status' => "unread"

			  );

				$chatInserted = $this->Crud_model->add_data($chatData,"chat");	

				$this->Crud_model->update_data(['chatStartId'=>$chatStartId],['time'=>date("Y-m-d H:i:s")],"chatstart");

				$notificationData = array(

					"sender_id" => $fromId,

					"receiver_id" => $toId,

					"message" => "offer-sent-".$offerId,

					"receiver_read" => 0,

					"sender_read" => 0,

					"admin_read" => 0,

					"created_at" => date("Y-m-d H:i:s"),

					"notification_type" => "offer",

					"conversation_id" => $chatStartId

				);

				$this->Crud_model->add_data($notificationData,"notifications_alert");

				

			}

}

if(empty($chatStartId)){

    $chatStartId = 1;

}

if(!empty($item_data[0]->brand)){

	$offerBrandName = $this->Crud_model->get_data("","brands",["id",$item_data[0]->brand],True);

}else{

	$offerBrandName = $this->Crud_model->get_data("","brands",["id",$item_data[0]->other_brand],True);

	if(empty($offerBrandName)){

		$offerBrandName = $item_data[0]->other_brand;

	}

}



// Offer mail

			$to = $item_user_data[0]->email;

			$subject = "Offer mail";

			$message = '';

 			if(!empty(unserialize($item_data[0]->item_image)[0])){

				$path = base_url()."uploads/item/".unserialize($item_data[0]->item_image)[0];	

			}else{

				$path = base_url()."themes/front/images/no-product.jpg";	

			}

			$message .= '<!DOCTYPE html>

<html>

<head>

	<title></title>
<style type="text/css" media="screen">
			p{
				text-align: left;
			}
	@media only screen and (max-width: 576px){
							table{width: 100%!important;}
							p{text-align: center!important;}
						}
	</style>
</head>

<body>



<table width="100%" cellpadding="0"> 

	

	<tr>

		<td align="center" style="border-bottom: 1px solid #d99f6f;margin: 0px 50px;">

			<a href="'.base_url().'"><img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" ></a>

			</td>

	</tr>

	<tr>

		<td align="center">

			<table width="60%">

				

		

	<tr>

		<td>

			<p style="color: #000;text-align: center;font-size: 32px;font-weight: 400;margin-top: 10px;">

			'.$item_user_data[0]->username.', you have received an offer from a buyer!</p>

			

		</td>

	</tr>

	<tr>

		<td align="center">

			<a href="'.base_url("item/").$item_data[0]->slug.'" ><img src="'.$path.'" width="75px;"></a>



		</td>

	</tr>

	<tr>

		<td>

			<p style="text-align: center;margin-bottom: 5px;font-size: 20px;">'.$offerBrandName.'</p>

			<p style="text-align: center;margin-bottom: 0px;margin-top: 0px;font-size: 20px;">'.$item_data[0]->item_name.'</p>

			<p style="text-align: center;margin-top: 5px;margin-bottom: 5px;font-size: 20px;

    font-weight: 700;

    color: grey;">The initial selling price was: £'.$item_data[0]->price.' </p>

		</td>

	</tr>

	<tr>

		<td>

			<p  style="text-align: center;color: #d99f6f;

    font-size: 24px;

    font-weight: 700;margin-bottom: 0px;">Buyers Offer: £'.$offer_price.'</p>

			<p  style="text-align: center;    margin-top: 5px;margin-bottom: 5px;color: #d99f6f;

    font-size: 24px;

    font-weight: 700;">Note From Buyer</p>

			<p  style="text-align: center;font-weight: 700;font-size: 24px;margin-top: 0px;">'.$offer_msg.'

</p> 



		</td>

	</tr>

	<tr>

		<td>

			<table width="100%" style="

    padding-top: 20px;

">

				<tr>

				<td align="right">	

					<a href="'.base_url().'Chat/offer/'.'offer-sent-'.$offerId.'/accepted"><button style="

					border-radius: 0px;

					font-weight: 700;

				    color: #fff;

				    border: none;

				    padding: 10px 60px;

				    font-size: 20px;

				    width: 230px;

				    margin-right: 15px;

				    background-color: rgba(0, 0, 0,0.8);">

					ACCEPT</button></a>

					

				</td>

			<td>

			<a href="'.base_url().'Chat/offer/'.'offer-sent-'.$offerId.'/declined">

			<button style="

			border-radius: 0px;

			font-weight: 700;

			color: #fff;

			border: none;

		    padding: 10px 60px;

		    font-size: 20px;

		    width: 230px;

		    background-color: rgba(0, 0, 0,0.8);">

				DECLINE</button>

				</a>

		</td></tr>

			</table>

			

		</td>

		

	</tr>

	<tr>

		<td>

			<p style="color: #000;font-size: 20px;">

				Don`t forget ....

			</p>

			<ul>

				<li style="color: #000;font-size: 18px;">

					You have 48 hours to either accept or decline this offer

				</li>

				<li style="color: #000;font-size: 18px;">The buyer can make up to 3 offers on this item</li>

				<li style="color: #000;font-size: 18px;">If you do nothing, your item will remain available to other

potential buyers</li>

			</ul>

		</td>

	</tr>

	<tr>

		<td >

			<p style="color: #000;margin-top: 40px;margin-bottom: 0px;font-size: 18px;">Thank you for choosing us</p>

		</td>

	</tr>

	<tr>

		<td >

			<p><b style="color: #000;font-size: 18px;">The Lyreh Team</b></p>

		</td>

	</tr>

	

	

	

	

	</table>

		</td>

	</tr>

	<tr>

			<td align="center" style="border-bottom: 1px solid #d99f6f;padding:20px 0px;">

			</td>

	</tr>

		<tr>

			<td>

				<table width="100%" style="background: lightgray;    margin-top: -2px;">

					<tr>

						<td align="center" style="padding:20px; ">

						<img src="https://lyreh.com/themes/front/images/logo.png" width="100px;">

						</td>

					</tr>

				</table>

			</td>

		</tr>

	<tr>

		<td align="center">

			<table width="60%">

				<tr>

					<td align="center">

						<a href="https://lyreh.com/">Lyreh.com</a><span style="color:grey;">- 20-22 Wenlock Road, London N1 7GU - Company No. 11960945</span>

					</td>

				</tr>

			</table>

			

		</td>

		</tr>

	

	

</table>















</body>

</html>';





			// $message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" ><br/>';



			// $message .= "Hey ".$item_user_data[0]->first_name." you've receieved an offer from ".$auth_user_data[0]->first_name.'.';

			// $message .= "

			// <table border='1'>

			// <tr>

			// <th>Offer Price</th>

			// <th>Notes</th>

			// </tr>

			// <tr>

			// <td>".$offer_price."</td>

			// <td>".$offer_msg."</td>

			

			// </tr>

			// </table> 

			// ";

			// $message .= "<p><a style='color: #fff; padding: 7px 25px;border-radius: 4px;font-weight: normal;margin-left: 14px; font-size: 13px;text-transform: uppercase; background: #d99f6f; margin-right: 14px;'  href='".base_url()."Chat/offer/"."offer-sent-".$offerId."/accepted'> Accept</a>&nbsp;<a style='color: #fff; padding: 7px 25px;border-radius: 4px;font-weight: normal;margin-left: 14px; font-size: 13px;text-transform: uppercase; background: #d99f6f; margin-right: 14px;' href='".base_url()."Chat/offer/"."offer-sent-".$offerId."/declined'>Decline</a></p>";

			// $message .= "<p>Complete your sale and secure your bag <img width='20px' height='20px' src='".base_url()."uploads/stamp.png'> </p>";

			// $message .= "<p>Thanks</p>";

			// Always set content-type when sending HTML email

			$headers = "MIME-Version: 1.0" . "\r\n";

			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			

			// More headers

			//$headers .= 'From: <'.$auth_user_data[0]->email.'>';

			$headers .= 'From: <'.ADMINEMAIL.'>';

			mail($to,$subject,$message,$headers);



print($chatStartId);

				exit;



// End add to chat			





			// print_r($item_user_data[0]->first_name);exit;

			if($offer_exit==true){

				echo 'exit';

				return ;

			}



			

			// Offer mail close



			$this->action->update("users", array("offer_data"=>serialize($update_data)), array("id"=>$auth_user_id));

		}

	}

	public function offer_status($user_id="", $item_id="", $status=""){

		$update_offer=array();

		$user_data=$this->action->select("users", array("id"=>$user_id));

		$item_data=$this->action->select("items", array("id"=>$user_id));

		$offer_data=unserialize($user_data[0]->offer_data);

		foreach($offer_data as $offer){

			if($offer['item_id']==$item_id){

				$offer['status']=$status;

			}

			array_push($update_offer, $offer);

		}



		// Offer status mail

		$to = $user_data[0]->email;

		$subject = "Offer status mail";

		$message = '';

		$message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" >';

		$message .= "Hello ".$user_data[0]->first_name;

		$message .= "Your offer for item '".$item_data[0]->item_name."' has ".$status;

		$message .= "<p>Thanks</p>";

		// Always set content-type when sending HTML email

		$headers = "MIME-Version: 1.0" . "\r\n";

		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

		// More headers

		$headers .= 'From: <'.$this->input->post("email_address").'>';

		mail($to,$subject,$message,$headers);

		// Offer status mail close



		$this->action->update("users", array("offer_data"=>serialize($update_offer)), array("id"=>$user_id));

		if($status=="approve"){

			$postage_fee=$item[0]->postage_fee;

			$price=$offer['offer_price'];

			$insert_data = array(

			        'id'      => 'sku_'.$item_data[0]->id,

			        'qty'     => '1',

			        'price'   => $price,

			        'postage_fee'   => $postage_fee,

			        'name'    => $item_data[0]->item_name,

			        'image'   => base_url()."uploads/item/".unserialize($item_data[0]->item_image)[0]

			        //'options' => array('Size' => 'L', 'Color' => 'Red')

			);

			

			$this->cart->insert($insert_data);

			

			$this->session->set_flashdata('success', "Your have successfully accepted the offer");

			redirect(base_url().'/cart');

		}else{

			$this->session->set_flashdata('success', "Your have rejected the offer.");

		}

		redirect(base_url());

	}

	public function user($user_id=""){

		$data=$this->constantData();

		$data['user_data']=$this->action->select("users", array("id"=>$user_id));

		$this->load->view('user_account', $data);

	}

	public function logout()

	{

		$auth_user=$this->session->userdata('auth_user');		

		@$auth_user_email=$auth_user[0]->email;		

		$this->action->update("users", array("online_status"=>"offline", "last_online_at"=>date('Y-m-d H:i:s', time())), array("email"=>$auth_user_email));

		$this->session->unset_userdata('auth_user');

		session_destroy();

		redirect(base_url());

	}

	private function shortcode_generator($message="", $email="")

	{

		$user=$this->action->select("users", array("email"=>$email));

		foreach($user[0] as $key=>$val){

			$message=str_replace("{".$key."}", $val, $message);

		}

		return $message;

	}

	private function constantData(){



		$list_items=$this->action->select("items", array("item_status"=>1));

		foreach($list_items as $item){

			$diff=date_diff(date_create(date("Y-m-d h:i:s")), date_create($item->created_at));

			if($diff->format("%a")>=$item->how_long_to_list_item){

				$this->action->update("items", array("item_status"=>1), array("id"=>$item->id));

			}

		}

		$auth_user=$this->session->userdata('auth_user');

		@$auth_user_id=$auth_user[0]->id;

		$data['auth_user_data']=$this->action->select("users", array("id"=>$auth_user_id));

		if(isset($auth_user)){

			$auth_user_id=$auth_user[0]->id;

			$channel_data=array();

			$channel1=$this->action->select("channels", array("sender_id"=>$auth_user_id));

			if(!empty($channel1)){

				foreach($channel1 as $ch1){

					$channel_data[]="lyreh_".$ch1->id;

				}

			}

			$channel2=$this->action->select("channels", array("receiver_id"=>$auth_user_id));

			if(!empty($channel2)){

				foreach($channel2 as $ch2){

					$channel_data[]="lyreh_".$ch2->id;

				}

			}

			$data['channel_data']=$channel_data;

		}



		$data['menus']=$this->action->select_where_order("pages", array("show_in_menu"=>1), 'sort asc');

		$data['settings']=$this->action->select_all("settings", "id asc");

		$data['item_cat']=$this->action->select_all("categorys", "id asc");

		$data['searches']=$this->action->select_all("searches", "id desc");

		$data['notifications']=$this->action->select_all("notifications", "id desc");

		$data['notifications_alert']=$this->action->select_all("notifications_alert", "id desc");

		return $data;

	}

	

	public function deleteitem(){

		print_r($_POST);

	}



	















}

