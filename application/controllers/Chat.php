<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->model("Crud_model");
        $this->load->helper('general_helper');
        $this->load->library('user_agent');
        $this->load->helper('smiley');
        $this->load->library('table');
    }
    
    public function testmail(){
        $this->action->send_mail();
    }

	public function chat($slug = "",$toId = ""){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		if ($this->agent->is_mobile()){
			if(!empty($_GET["offer"])){
				redirect("Chat/chatDetail/".$slug."/".$toId."?offer=".$_GET["offer"]);
			}else{
				redirect("Chat/chatDetail/".$slug."/".$toId);
			}
		}
		$fromId = $this->session->userdata('auth_user')[0]->id;
		if(!empty($slug) && $slug != "profile"){
			$data['itemsData'] = $this->Crud_model->get_data("","items",['slug'=>$slug],True);
			$data['conversationData'] = $this->db
		         ->where('productSlug',$slug)
		         ->where('fromId',$fromId)
		         ->where('toId',$toId)
		         ->or_where('productSlug',$slug)
		         ->where('fromId',$toId)
		         ->where('toId',$fromId)
		     ->get('chatstart')
		     ->row();
		     $query1 = "SELECT * FROM chatstart WHERE  productSlug='".$slug."' AND  fromId='".$fromId."' AND toId='".$toId."' OR (productSlug='".$slug."' AND  fromId='".$toId."' AND toId='".$fromId."')";
		     $data['conversationData'] = $this->db->query($query1)->result();
		     if(!empty($data['conversationData'])){
			     $statusData = $this->db->order_by('chatId',"desc")
					->where('chatStartId',$data['conversationData'][0]->chatStartId)
					->limit(1)
					->get('chat')
					->row();
				if($statusData->receiveId == $this->session->userdata('auth_user')[0]->id){
					$this->Crud_model->update_data(['chatStartId'=>$data['conversationData'][0]->chatStartId],['status'=>'read'],"chat");
				}
				$this->Crud_model->update_data(['chatStartId'=>$data['conversationData'][0]->chatStartId],['changeStatus'=>'read'],"chatstart");
			 }	
		     if(!empty($data['conversationData'])){
		     	$data['chatData'] = $this->Crud_model->get_data("","chat",["chatStartId"=>$data['conversationData'][0]->chatStartId],'','','','','',"sequence","asc");
		     }
		     $query = "SELECT * FROM chatstart WHERE fromId='".$fromId."' OR (toId='".$fromId."')  ORDER BY time DESC";
		     $data['allConversation'] = $this->db->query($query)->result();
			$data['slugs'] = $slug;
			$data['fromId'] = $fromId;
			$data['toId'] = $toId;
		}else{

			// $query1 = "SELECT * FROM chatstart WHERE  fromId='".$fromId."' AND toId='".$toId."' AND productSlug ='' OR (fromId='".$toId."' AND toId='".$fromId."' AND productSlug ='')";

			 $query1 = "SELECT * FROM chatstart WHERE  fromId='".$fromId."' AND toId='".$toId."' AND productSlug ='' OR (fromId='".$toId."' AND toId='".$fromId."' AND productSlug ='')";
		     $data['conversationData'] = $this->db->query($query1)->result();
		     // print_r($query1);exit;
		     if(!empty($data['conversationData'])){
			     $statusData = $this->db->order_by('chatId',"desc")
					->where('chatStartId',$data['conversationData'][0]->chatStartId)
					->limit(1)
					->get('chat')
					->row();
				if($statusData->receiveId == $this->session->userdata('auth_user')[0]->id){
					$this->Crud_model->update_data(['chatStartId'=>$data['conversationData'][0]->chatStartId],['status'=>'read'],"chat");
				}
				$this->Crud_model->update_data(['chatStartId'=>$data['conversationData'][0]->chatStartId],['changeStatus'=>'read'],"chatstart");
			}
		     if(!empty($data['conversationData'])){
		     	$data['chatData'] = $this->Crud_model->get_data("","chat",["chatStartId"=>$data['conversationData'][0]->chatStartId],'','','','','',"sequence","asc");

		     }

			 $query = "SELECT * FROM chatstart WHERE fromId='".$fromId."' OR (toId='".$fromId."')  ORDER BY time DESC";
		     $data['allConversation'] = $this->db->query($query)->result();
			$data['slugs'] = $slug;
			$data['fromId'] = $fromId;
			$data['toId'] = $toId;
		}
		// $data['totalCount'] = $this->Crud_model->get_data("count(*) as totalMessages","chat","",True,'','','','',"sequence","asc");
		// echo "<pre>";print_r($data['totalCount']);exit;

		 

        $image_array = get_clickable_smileys(base_url().'smileys/', 'messagebox');
        $col_array = $this->table->make_columns($image_array, 8);

        $data['smiley_table'] = $this->table->generate($col_array);


		$this->load->library('user_agent');
		if ($this->agent->is_mobile())
		{
			$this->load->view('chat/main', $data);
		}
		else
		{
			// $this->load->view('chat/main', $data);
			$this->load->view('chat/desktop_main', $data);
		}
		// $this->load->view('chat/main');
	}

	function offer($offer , $status){
	    $offerData1 = $this->Crud_model->get_data("","offerdata",["offerUniqueId"=>$offer],True);
		if(!empty($offer)){
			if($offerData1->offerStatus == "pending"){
    			$this->Crud_model->update_data(["offerUniqueId"=>$offer],["offerStatus"=>$status],"offerdata");
    			$this->Crud_model->update_data(["message"=>$offer],["sender_read"=> 0,"send_read"=> 0],"notifications_alert");
			}
		}
		if($offerData1->offerStatus == "pending"){
    		$offerData = $this->Crud_model->get_data("","offerdata",["offerUniqueId"=>$offer],True);
    		$productData = $this->Crud_model->get_data("","items",["slug"=>$offerData->productSlug],True);
    		$userData = $this->Crud_model->get_data("","users",["id"=>$offerData->fromId],True);
    		$to = $userData->email;
			$subject = "Offer mail";
			if(!empty(unserialize($productData->item_image)[0])){
				$path = base_url()."uploads/item/".unserialize($productData->item_image)[0];	
			}else{
				$path = base_url()."themes/front/images/no-product.jpg";	
			}
    			if($status == "accepted"){

	    			$message = '<!DOCTYPE html>
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
										Great news! '.$userData->username.', your offer has been accepted.</p>
										
									</td>
								</tr>
								<tr>
									<td align="center">
										<a href="'.base_url("item/").$offerData->productSlug.'" ><img src="'.$path.'" width="75px;"></a>

									</td>
								</tr>
								<tr>
									<td>
										<p style="text-align: center;margin-bottom: 5px;font-size: 20px;">GIANVITO ROSSI</p>
										<p style="text-align: center;margin-bottom: 0px;margin-top: 0px;font-size: 20px;">Sandals</p>
										<p style="text-align: center;margin-top: 5px;margin-bottom: 5px;font-size: 20px;
							    font-weight: 700;
							    color: grey;">The initial selling price was: £'.$productData->price.' </p>
									</td>
								</tr>
								<tr>
									<td>
										<p  style="text-align: center;color: #d99f6f;
							    font-size: 24px;
							    font-weight: 700;margin-bottom: 0px;">Price now: £'.$offerData->offerPrice.'</p>
										

									</td>
								</tr>
								<tr>
									<td>
										<table width="100%" style="
							    padding-top: 30px;
							">
											<tr>
										
										<td align="center">
										
										<a href="http://lyrehtest.lyreh.com/cart"><button style="
										border-radius: 0px;
										font-weight: 700;
										color: #fff;
										border: none;
									    padding: 15px 50px;
									    font-size: 20px;
									    
									    background-color: rgba(0, 0, 0,0.8);">
											PAY NOW</button></a>
													
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
											<li style="color: #000;font-size: 18px;padding-bottom: 20px;">
												 This item is not yours until you complete the sale
											</li>
											<li style="color: #000;font-size: 18px;padding-bottom: 20px;">This offer is only valid for 24 hours so secure it before
							you miss out</li>
											<li style="color: #000;font-size: 18px;padding-bottom: 20px;">If you do nothing, your item will remain available to other
							buyers</li>
										</ul>
									</td>
								</tr>
								<tr>
									<td >
										<p style="color: #000;margin-top: 40px;margin-bottom: 0px;font-size: 18px;">Thank you for shopping with Lyreh</p>
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
													<a href="http://lyrehtest.lyreh.com/">Lyreh.com</a><span style="color:grey;">- 20-22 Wenlock Road, London N1 7GU - Company No. 11960945</span>
												</td>
											</tr>
										</table>
										
									</td>
									</tr>
								
								
							</table>







							</body>
							</html>';
							$this->session->set_flashdata("success","Offer accepted successfully.");
	    
	    		} else {
	    			
	    			$query1 = "SELECT count(offerId) as offerCount FROM offerdata WHERE  productSlug='".$productData->slug."' AND  fromId='".$offerData->fromId."'";
	        	 $offerCount = $this->db->query($query1)->result();
		         if(!empty($offerCount)){
	                $offerCount = $offerCount[0]->offerCount;
	                
	            }
	            if($offerCount == 1){
	            	$buttonText = "MAKE ANOTHER OFFER";
	            }
	            if($offerCount == 2){
	            	$buttonText = "MAKE A FINAL OFFER";
	            }		
				// if(empty($offerCount)){
				//     $offerCount = 0;
				// }
	    			$message = '<!DOCTYPE html>
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
								<a href="'.base_url().'"><img src="https://lyreh.com/themes/front/images/logo.png" width="100px;"></a>
								</td>
						</tr>
						<tr>
							<td align="center">
								<table width="60%">
									
							
						<tr>
							<td>
								<p style="color: #000;text-align: center;font-size: 32px;font-weight: 400;margin-top: 10px;">
								'.$userData->username.', sorry to inform you but your offer has been<br/>
					declined on this occassion.</p>
								
							</td>
						</tr>
						<tr>
							<td align="center">
								<a href="'.base_url("item/").$offerData->productSlug.'" ><img src="'.$path.'" width="75px;"></a>

							</td>
						</tr>
						<tr>
							<td>
								<p style="text-align: center;margin-bottom: 5px;font-size: 20px;">GIANVITO ROSSI</p>
								<p style="text-align: center;margin-bottom: 0px;margin-top: 0px;font-size: 20px;">Sandals</p>
								<p style="text-align: center;margin-top: 5px;margin-bottom: 5px;font-size: 20px;
					    font-weight: 700;
					    color: grey;">The initial selling price was: £ '.$productData->price.'</p>
							</td>
						</tr>
						<tr>
							<td>
								<p  style="text-align: center;color: #d99f6f;
					    font-size: 24px;
					    font-weight: 700;margin-bottom: 0px;">Your Offer: £'.$offerData->offerPrice.'</p>
								

							</td>
						</tr>
						<tr>
							<td>
								<table width="100%" style="
					    padding-top: 100px;
					">
									<tr>
								
								<td align="center">
								<a href="'.base_url("item/").$offerData->productSlug.'" ><button style="
								border-radius: 0px;
								font-weight: 700;
								color: #fff;
								border: none;
							    padding: 15px 30px;
							    font-size: 20px;
							    
							    background-color: rgba(0, 0, 0,0.8);">
									'.$buttonText.'</button></a>
												
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
									<li style="color: #000;font-size: 18px;padding-bottom: 20px;">
										 You can submit up to 3 offers for this item
									</li>
									<li style="color: #000;font-size: 18px;padding-bottom: 20px;">Why not negotiate a deal make contact with the seller by sending a direct message using the
					chat option</li>
									<li style="color: #000;font-size: 18px;padding-bottom: 20px;">If you do nothing, this item will be available to other buyers to purchase</li>
								</ul>
							</td>
						</tr>
						<tr>
							<td >
								<p style="color: #000;margin-top: 40px;margin-bottom: 0px;font-size: 18px;">Thank you for shopping with Lyreh</p>
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
											<a href="http://lyrehtest.lyreh.com/">Lyreh.com</a><span style="color:grey;">- 20-22 Wenlock Road, London N1 7GU - Company No. 11960945</span>
										</td>
									</tr>
								</table>
								
							</td>
							</tr>
						
						
					</table>







					</body>
					</html>';
					$this->session->set_flashdata("success","Offer declined successfully.");
	    			// $message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" ><br/>';
	    
	    			// $message .= "Hey ".$userData->username.", ";
	    			// $message .= "
	    			// <table border='1'>
	    			// <tr>
	    			// <th>Offer Price</th>
	    			// <th>Notes</th>
	    			// </tr>
	    			// <tr>
	    			// <td>".$offerData->offerPrice."</td>
	    			// <td>".$offerData->offerMessage."</td>
	    			
	    			// </tr>
	    			// </table> 
	    			// ";
	    			// $message .= "<p>Your offer has been accepted</p>";
	    			// $message .= "<p>Complete your sale and secure your bag <img width='20px' height='20px' src='".base_url()."uploads/stamp.png'> </p>";
	    			// $message .= "<p>Thanks</p>";
	    		}




    			$this->action->send_mail($to,$message,"Lyreh Offer Status");
    			// Always set content-type when sending HTML email
    // 			$headers = "MIME-Version: 1.0" . "\r\n";
    // 			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    			
    			// More headers
    			//$headers .= 'From: <'.$auth_user_data[0]->email.'>';
    // 			$headers .= 'From: <'.ADMINEMAIL.'>';
    // 			mail($to,$subject,$message,$headers);
		}
		redirect(base_url());
	}

	function offerStatus(){
		$formData = $this->input->post();
		if(!empty($formData['offerUniqueId'])){
			$this->Crud_model->update_data(["offerUniqueId"=>$formData['offerUniqueId']],["offerStatus"=>$formData["offerStatus"]],"offerdata");
			$this->Crud_model->update_data(["message"=>$formData['offerUniqueId']],["sender_read"=> 0,"send_read"=> 0],"notifications_alert");
		}
		$offerData = $this->Crud_model->get_data("","offerdata",["offerUniqueId"=>$formData['offerUniqueId']],True);
		if(!empty($offerData->productSlug)){
			$itemData = $this->Crud_model->get_data("","items",["slug"=>$offerData->productSlug],True);
		}
      if($formData["offerStatus"] == "accepted"){

      	$offerData = $this->Crud_model->get_data("","offerdata",["offerUniqueId"=>$formData['offerUniqueId']],True);
		$userData = $this->Crud_model->get_data("","users",["id"=>$offerData->fromId],True);
		$to = $userData->email;
			$subject = "Offer mail";
			$message = '';
			$message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" ><br/>';

			$message .= "Hey ".$userData->username.", ";
			$message .= "
			<table border='1'>
			<tr>
			<th>Offer Price</th>
			<th>Notes</th>
			</tr>
			<tr>
			<td>".$offerData->offerPrice."</td>
			<td>".$offerData->offerMessage."</td>
			
			</tr>
			</table> 
			";
			$message .= "<p>Your offer has been accepted</p>";
			$message .= "<p>Complete your sale and secure your bag <img width='20px' height='20px' src='".base_url()."uploads/stamp.png'> </p>";
			$message .= "<p>Thanks</p>";
			$this->action->send_mail($to,$message,"Lyreh Offer Status");
			// Always set content-type when sending HTML email
// 			$headers = "MIME-Version: 1.0" . "\r\n";
// 			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			
			// More headers
			//$headers .= 'From: <'.$auth_user_data[0]->email.'>';
// 			$headers .= 'From: <'.ADMINEMAIL.'>';
// 			mail($to,$subject,$message,$headers);
      }

	}



	function chats(){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		if ($this->agent->is_mobile()){
			redirect("Chat/allChat");
		}
		$image_array = get_clickable_smileys(base_url().'smileys/', 'messagebox');
        $col_array = $this->table->make_columns($image_array, 8);

        $data['smiley_table'] = $this->table->generate($col_array);
		$fromId = $this->session->userdata('auth_user')[0]->id;
		if(!empty($_GET['status'])){

			$query = "SELECT chatstart.chatStartId as chatStartId, chatstart.fromId as fromId, chatstart.toId as toId, chatstart.productSlug as productSlug, chatstart.type as type, chatstart.time as time, chatstart.userId as userId, chatstart.changeStatus as changeStatus  FROM chatstart INNER JOIN chat ON chat.chatStartId = chatstart.chatStartId WHERE chatstart.fromId='".$fromId."'  AND changeStatus ='unread' OR (chatstart.toId='".$fromId."'  AND changeStatus ='unread') GROUP BY chatstart.chatStartId ORDER BY chatstart.time DESC";	
			// print_r($query);exit;
		}else{
			$query = "SELECT * FROM chatstart WHERE chatstart.fromId='".$fromId."' OR (chatstart.toId='".$fromId."') ORDER BY chatstart.time DESC";
		}
		
		
		$data['allConversation'] = $this->db->query($query)->result();
		// print_r($data['allConversation']);exit;
		$this->load->view('chat/desktop_main', $data);
		
	}

	function insertChat(){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		$fromData = $this->input->post();
		// print_r($fromData);exit;
		if(empty($fromData['conversationId'])){
			if(!empty($fromData['productSlug']) && $fromData['productSlug'] != "profile"){
			  $dataArray = array(
			  	'fromId' => $fromData['fromId'],
			  	'toId' => $fromData['toId'],
			  	'productSlug' => $fromData['productSlug'],
			  	'type' => 1,
			  	'time'=>date("Y-m-d H:i:s")
			  );
			}else{
				$dataArray = array(
			  	'fromId' => $fromData['fromId'],
			  	'toId' => $fromData['toId'],
			  	'type' => 0,
			  	'time'=> date("Y-m-d H:i:s")
			  );
			  
			}
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
			  	'fromId' => $fromData['fromId'],
			  	'toId' => $fromData['toId'],
			  	'sequence' => $sequence+1,
			  	'message' => $fromData['message'],
			  	'time' => date("Y-m-d H:i:s"),
			  	'chatStartId' => $chatStartId,
			  	'receiveId' => $fromData['toId'],
			  	'status' => "unread"
			  );
				$chatInserted = $this->Crud_model->add_data($chatData,"chat");	
				$this->Crud_model->update_data(['chatStartId'=>$chatStartId],['time'=>date("Y-m-d H:i:s")],"chatstart");
				$notificationMessage = getUserName($fromData['fromId']);
				$dataNotification = array(
			        "receiver_id" => $fromData['toId'],
			        "message" => "<b>".$notificationMessage->username."</b> has sent you a new message.",
			        "notification_type" => "message",
			        "conversation_id" => $chatStartId,
			        "created_at" => date("Y-m-d H:i:s")
			    );			    
		    	$this->Crud_model->add_data($dataNotification,"notifications_alert");
	    		$userData = getUserName($fromData['toId']);
    		    $to = trim($userData->email);
    		    
    			$subject = "New Message";
    			$message = '';
    			$message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" ><br/>';
    
    			$message .= "Hey ".$userData->username.", ";
    			$message .= "<p>Your have received a new message</p>";
    			$message .= "<p>Thanks</p>";
                if($userData->online_status == "offline"){
    			    $this->action->send_mail($to,$message,"Lyreh New Message");
                }
    // 			$to = $userData->email;
    // 			$subject = "New Message";
    // 			$message = '';
    // 			$message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" ><br/>';
    
    // 			$message .= "Hey ".$userData->username.", ";
    // 			$message .= "<p>Your have received a new message</p>";
    // 			$message .= "<p>Thanks</p>";
    // 			// Always set content-type when sending HTML email
    // 			$headers = "MIME-Version: 1.0" . "\r\n";
    // 			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // 			$headers .= 'From: <'.ADMINEMAIL.'>';
    // 			$config['protocol'] = 'sendmail';
    //             $config['mailpath'] = '/usr/sbin/sendmail';
    //             $config['charset'] = 'iso-8859-1';
    //             $config['wordwrap'] = TRUE;
                
    //             $this->email->initialize($config);
    //     		$this->email->from('admin@lyreh.com', 'Admin');
    //             $this->email->to($to);
                
    //             $this->email->subject('New Message');
    //             $this->email->message($message);
    //             $this->email->send();
    // 			mail($to,$subject,$message,$headers);
				print($chatStartId);
				exit;
				
			}
		}else{
				$sequenceData = $this->db->order_by('chatId',"desc")
				->limit(1)
				->get('chat')
				->row();
				$chatData = array(
			  	'fromId' => $fromData['fromId'],
			  	'toId' => $fromData['toId'],
			  	'sequence' => $sequenceData->sequence+1,
			  	'message' => $fromData['message'],
			  	'time' => date("Y-m-d H:i:s"),
			  	'chatStartId' => $fromData['conversationId'],
			  	'receiveId' => $fromData['toId'],
			  	'status' => "unread"
			  	);
				$chatInserted = $this->Crud_model->add_data($chatData,"chat");	
				$this->Crud_model->update_data(['chatStartId'=>$fromData['conversationId']],['time'=>date("Y-m-d H:i:s")],"chatstart");
				$notificationMessage = getUserName($fromData['fromId']);
				
				// $dataNotification = array(
			 //        "receiver_id" => $fromData['toId'],
			 //        "message" => "<b>".$notificationMessage->first_name."</b> has sent you a new message.",
			 //        "notification_type" => "message",
			 //        "conversation_id" => $chatStartId,
			 //        "created_at" => date("Y-m-d H:i:s")
			 //    );			    
		  //   	$this->Crud_model->add_data($dataNotification,"notifications_alert");
		    	$userData = getUserName($fromData['toId']);
    		    $to = trim($userData->email);
    		    
    			$subject = "New Message";
    			$message = '';
    			$message .= '<img src="https://lyreh.com/themes/front/images/logo.png" alt="" widht="50" style="width:100px" ><br/>';
    
    			$message .= "Hey ".$userData->username.", ";
    			$message .= "<p>Your have received a new message</p>";
    			$message .= "<p>Thanks</p>";
    // 			// Always set content-type when sending HTML email
    // 			$headers = "MIME-Version: 1.0" . "\r\n";
    // 			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // 			$headers .= 'From: <'.ADMINEMAIL.'>';
    			if($userData->online_status == "offline"){
                // print_r($userData->online_status);exit;
    			    $this->action->send_mail($to,$message,"Lyreh New Message");
                }
    			
    			
    // 			$this->load->library('email');
                // $config = Array(
                //     'protocol' => 'smtp',
                //     'smtp_host' => 'ssl://smtp.googlemail.com',
                //     'smtp_port' => 587,
                //     'smtp_user' => 'bitsclan123@gmail.com',
                //     'smtp_pass' => 'Bitsclan12345',
                //     'mailtype'  => 'html',
                //     'charset'   => 'iso-8859-1'
                // );
                // $this->load->library('email', $config);
                
                // $config['protocol'] = "smtp";
                // $config['smtp_host'] = "ssl://smtp.googlemail.com";
                // $config['smtp_port'] = "587";
                // $config['smtp_user'] = "bitsclan123@gmail.com";
                // $config['smtp_pass'] = "Bitsclan12345";
                // $config['mailtype'] = 'html';
                // $config['charset'] = 'utf-8';
                // $config['wordwrap'] = TRUE;
                // $config['newline'] = "\r\n";
            
                // $this->email->initialize($config);
        // $this->load->library('Phpmailer');
        //       $mail = new PHPMailer;
        //     $mail->AddAddress("bitsclan123@gmail.com", 'New message');
        //     $mail->CharSet = 'UTF-8';
        //     //$mail->From = "stardesign31@gmail.com";
        //     $mail->From = "admin@lyreh.com";
        //     $mail->FromName = "admin";
        //     $mail->addReplyTo("bitsclan123@gmail.com", "New message");
        //     $mail->Subject = "New message";
        //     $mail->IsSMTP();
        //     $mail->Host = "localhost";
        //     $mail->SMTPAuth = False;
            
        //     $mail->WordWrap = 200;
        //     $mail->IsHTML(true);
        //     $mail->Body = "test message";
        // 	$mail->SMTPDebug = 2 ;
        // 	$mail->Send();
        	
        	
            // if () {
            //     print_r('yes');
            // } else {
            //     return false;
            // }
                // exit;
            
    			
    			
    // 			$config['protocol'] = 'sendmail';
    //             $config['mailpath'] = '/usr/sbin/sendmail';
    //             $config['charset'] = 'iso-8859-1';
    //             $config['wordwrap'] = TRUE;
                
    //             $this->email->initialize($config);
    			
    			
    //     		$this->email->from('admin@lyreh.com', 'Admin');
    //             $this->email->to($to);
                
    //             $this->email->subject('New Message');
    //             $this->email->message($message);
    //             $this->email->send();
    // 			mail($to,$subject,$message,$headers);
				print($fromData['conversationId']);
				exit;
				
		}
			
	}

	function receiveChat(){
		$fromData = $this->input->post();
		if(!empty($fromData['conversationId'])){
			$chatData['chatData'] = $this->Crud_model->get_data("","chat",["chatStartId"=>$fromData['conversationId']],'','','','','',"sequence","asc");
			$totalMessage = count($chatData['chatData']);
			if($fromData["totalMessages"] == $totalMessage){
			     print_r("");
			     exit;
			}else{
			    $completeChat = $this->load->view('chatData',$chatData,True);
    			print_r($completeChat);
    			exit;    
			}
			
		}
	}

	function sideChat(){
		$statusChat = $this->input->post('statusChat');
		if(empty($statusChat)){
			$statusChat = " AND changeStatus ='unread'";	
		}else{
			$statusChat = "";
		}
		// print_r($statusChat);exit;
		$fromId = $this->session->userdata('auth_user')[0]->id;
		$query = "SELECT * FROM chatstart WHERE fromId='".$fromId."' ".$statusChat." OR (toId='".$fromId."'  ".$statusChat." ) ORDER BY time DESC";
		$data['allConversation'] = $this->db->query($query)->result();
		if(!empty($data['allConversation'])){
		$result = $this->load->view("sideChat",$data,True);
    		print_r($result);
    		exit;
		}else{
		    $result = "<b style='color:#808080a6;margin: 75px;'>You have no unread messages.</b>";
    		print_r($result);
    		exit;
		}
	}

	function changeStatus($status = "", $chatId = ""){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		$status = $this->input->post("status");
		$chatId = $this->input->post("chatId");
		$statusChat = $this->input->post('statusChat');
		if(empty($statusChat)){
			$statusChat = " AND changeStatus ='unread'";	
		}else{
			$statusChat = "";
		}
		if(!empty($status) && !empty($chatId)){
			if($status == "Read"){
				$status = "read";
			}else if($status == "Unread"){
				$status = "unread";
			}else{
				redirect(base_url());	
			}
		$userId = $this->session->userdata('auth_user')[0]->id;
		$this->Crud_model->update_data(['chatStartId'=>$chatId],['userId'=>$userId,'changeStatus'=>$status],"chatstart");
		
		$this->Crud_model->update_data(['chatStartId'=>$chatId],['status'=>$status],"chat");
		
		$fromId = $this->session->userdata('auth_user')[0]->id;
		$query = "SELECT * FROM chatstart WHERE fromId='".$fromId."' ".$statusChat."  OR (toId='".$fromId."' ".$statusChat." ) ORDER BY time DESC";
		$data['allConversation'] = $this->db->query($query)->result();
		$result = $this->load->view("sideChat",$data,True);
		print_r($result);
		exit;
		}
	}

	function deleteChat($chatId = ""){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		$statusChat = $this->input->post('statusChat');
		if(empty($statusChat)){
			$statusChat = " AND changeStatus ='unread'";	
		}else{
			$statusChat = "";
		}
		$chatId = $this->input->post("chatId");
		if(!empty($chatId)){
			$this->Crud_model->delete_data("chat",['chatStartId'=>$chatId]);
			$this->Crud_model->delete_data("chatstart",['chatStartId'=>$chatId]);
			$fromId = $this->session->userdata('auth_user')[0]->id;
			$query = "SELECT * FROM chatstart WHERE fromId='".$fromId."' ".$statusChat."  OR (toId='".$fromId."' ".$statusChat." ) ORDER BY time DESC";
			$data['allConversation'] = $this->db->query($query)->result();
			if(!empty($data['allConversation'])){
			$result = $this->load->view("sideChat",$data,True);
			print_r($result);
			exit;
			}else{
				$result = "";
				print_r($result);
				exit;
			}
		}
	}

	function chatDetail($slug = "",$toId = ""){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		$refer = $this->agent->referrer();
		if (strpos($refer, 'chatDetail') == false && strpos($refer, 'allChat') == false) {
		    $this->session->set_userdata("refer",$refer);
		}
		$fromId = $this->session->userdata('auth_user')[0]->id;
		if(!empty($slug) && $slug != "profile"){
			$data['itemsData'] = $this->Crud_model->get_data("","items",['slug'=>$slug],True);
			$data['conversationData'] = $this->db
		         ->where('productSlug',$slug)
		         ->where('fromId',$fromId)
		         ->where('toId',$toId)
		         ->or_where('productSlug',$slug)
		         ->where('fromId',$toId)
		         ->where('toId',$fromId)
		     ->get('chatstart')
		     ->row();
		     $query1 = "SELECT * FROM chatstart WHERE  productSlug='".$slug."' AND  fromId='".$fromId."' AND toId='".$toId."' OR (productSlug='".$slug."' AND  fromId='".$toId."' AND toId='".$fromId."')";
		     $data['conversationData'] = $this->db->query($query1)->result();
		    if(!empty($data['conversationData'])){
		     $statusData = $this->db->order_by('chatId',"desc")
				->where('chatStartId',$data['conversationData'][0]->chatStartId)
				->limit(1)
				->get('chat')
				->row();
    		     if($statusData->receiveId == $this->session->userdata('auth_user')[0]->id){
    				$this->Crud_model->update_data(['chatStartId'=>$data['conversationData'][0]->chatStartId],['status'=>'read'],"chat");
    			}		    
    			$this->Crud_model->update_data(['chatStartId'=>$data['conversationData'][0]->chatStartId],['changeStatus'=>'read'],"chatstart");
    		     if(!empty($data['conversationData'])){
    		     	$data['chatData'] = $this->Crud_model->get_data("","chat",["chatStartId"=>$data['conversationData'][0]->chatStartId],'','','','','',"sequence","asc");
    		     }
		    }
		     $query = "SELECT * FROM chatstart WHERE fromId='".$fromId."' OR (toId='".$fromId."')  ORDER BY time DESC";
		     $data['allConversation'] = $this->db->query($query)->result();
			$data['slugs'] = $slug;
			$data['fromId'] = $fromId;
			$data['toId'] = $toId;
		}else{

			 $query1 = "SELECT * FROM chatstart WHERE  fromId='".$fromId."' AND toId='".$toId."' AND productSlug ='' OR (fromId='".$toId."' AND toId='".$fromId."' AND productSlug ='')";
		     $data['conversationData'] = $this->db->query($query1)->result();
		     if(!empty($data['conversationData'])){
		     $statusData = $this->db->order_by('chatId',"desc")
				->where('chatStartId',$data['conversationData'][0]->chatStartId)
				->limit(1)
				->get('chat')
				->row();
		     if($statusData->receiveId == $this->session->userdata('auth_user')[0]->id){
				$this->Crud_model->update_data(['chatStartId'=>$data['conversationData'][0]->chatStartId],['status'=>'read'],"chat");
			}
			$this->Crud_model->update_data(['chatStartId'=>$data['conversationData'][0]->chatStartId],['changeStatus'=>'read'],"chatstart");
		     if(!empty($data['conversationData'])){
		     	$data['chatData'] = $this->Crud_model->get_data("","chat",["chatStartId"=>$data['conversationData'][0]->chatStartId],'','','','','',"sequence","asc");
		     }
	 		}
			 $query = "SELECT * FROM chatstart WHERE fromId='".$fromId."' OR (toId='".$fromId."')  ORDER BY time DESC";
		     $data['allConversation'] = $this->db->query($query)->result();
			$data['slugs'] = $slug;
			$data['fromId'] = $fromId;
			$data['toId'] = $toId;
		}
		$image_array = get_clickable_smileys(base_url().'smileys/', 'messagebox');
        $col_array = $this->table->make_columns($image_array, 8);

        $data['smiley_table'] = $this->table->generate($col_array);
		// echo "<pre>";print_r($data);exit;
		$this->load->library('user_agent');
		if ($this->agent->is_mobile()){
			$this->load->view('chat/detail_message', $data);
		}
	}

	function changeMobileStatus($status = "", $chatId = ""){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		$status = $this->input->post("status");
		$chatId = $this->input->post("chatId");
		$statusChat = $this->input->post('statusChat');
		if(empty($statusChat)){
			$statusChat = " AND changeStatus ='unread'";	
		}else{
			$statusChat = "";
		}
		if(!empty($status) && !empty($chatId)){
			if($status == "Read"){
				$status = "read";
			}else if($status == "Unread"){
				$status = "unread";
			}else{
				redirect(base_url());	
		}
		$userId = $this->session->userdata('auth_user')[0]->id;
		$this->Crud_model->update_data(['chatStartId'=>$chatId],['userId'=>$userId,'changeStatus'=>$status],"chatstart");
		$this->Crud_model->update_data(['chatStartId'=>$chatId],['status'=>$status],"chat");
		$query = "SELECT * FROM chatstart WHERE fromId='".$userId."' ".$statusChat."  OR (toId='".$userId."' ".$statusChat." ) ORDER BY time DESC";
		$data['allConversation'] = $this->db->query($query)->result();
			if(!empty($data['allConversation'])){
				$result = $this->load->view("mobileSideChat",$data,True);		
				print_r($result);
				exit;
			}else{
				$result = "";
				print_r($result);
				exit;
			}
		}
	}

	function deleteMobileChat($chatId = ""){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		$chatId = $this->input->post("chatId");
		$statusChat = $this->input->post('statusChat');
		if(empty($statusChat)){
			$statusChat = " AND changeStatus ='unread'";	
		}else{
			$statusChat = "";
		}
		if(!empty($chatId)){
			$this->Crud_model->delete_data("chat",['chatStartId'=>$chatId]);
			$this->Crud_model->delete_data("chatstart",['chatStartId'=>$chatId]);
			$userId = $this->session->userdata('auth_user')[0]->id;
			$query = "SELECT * FROM chatstart WHERE fromId='".$userId."' ".$statusChat."  OR (toId='".$userId."' ".$statusChat." ) ORDER BY time DESC";
			$data['allConversation'] = $this->db->query($query)->result();
				if(!empty($data['allConversation'])){
					$result = $this->load->view("mobileSideChat",$data,True);		
					print_r($result);
					exit;
				}else{
					$result = "";
					print_r($result);
					exit;
				}
		}else{
			redirect(base_url());	
		}
	}

	function allChat(){
		if(empty($this->session->userdata('auth_user')[0]->id)){
			redirect(base_url());
		}
		$image_array = get_clickable_smileys(base_url().'smileys/', 'messagebox');
        $col_array = $this->table->make_columns($image_array, 8);

        $data['smiley_table'] = $this->table->generate($col_array);
		$fromId = $this->session->userdata('auth_user')[0]->id;
		if(!empty($_GET['status'])){

			$query = "SELECT chatstart.chatStartId as chatStartId, chatstart.fromId as fromId, chatstart.toId as toId, chatstart.productSlug as productSlug, chatstart.type as type, chatstart.time as time, chatstart.userId as userId, chatstart.changeStatus as changeStatus  FROM chatstart INNER JOIN chat ON chat.chatStartId = chatstart.chatStartId WHERE chatstart.fromId='".$fromId."'  AND chatstart.changeStatus ='unread' OR (chatstart.toId='".$fromId."'  AND changeStatus ='unread') GROUP BY chatstart.chatStartId ORDER BY chatstart.time DESC";	
			// print_r($query);exit;
		}else{
			$query = "SELECT * FROM chatstart WHERE chatstart.fromId='".$fromId."' OR (chatstart.toId='".$fromId."') ORDER BY chatstart.time DESC";
		}
		
		
		$data['allConversation'] = $this->db->query($query)->result();
		// print_r($data['allConversation']);exit;
		$this->load->view('chat/main', $data);
		
	}

	function receiveMobileChat(){
		$image_array = get_clickable_smileys(base_url().'smileys/', 'messagebox');
        $col_array = $this->table->make_columns($image_array, 8);

        $data['smiley_table'] = $this->table->generate($col_array);
		$fromData = $this->input->post();
		$chatData['chatData'] = $this->Crud_model->get_data("","chat",["chatStartId"=>$fromData['conversationId']],'','','','','',"sequence","asc");
		$totalMessage = count($chatData['chatData']);
		if($fromData["totalMessages"] == $totalMessage){
		     print_r("");
		     exit;
		}else{
		    $completeChat = $this->load->view('mobileChat',$chatData,True);
    		print_r($completeChat);
    		exit;    
		}
		
	}


}
