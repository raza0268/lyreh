<html lang="en">

	<head>

		<title>Lyreh</title>

		<meta charset="utf-8">

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url(); ?>themes/front/css/bootstrap.min.css" rel="stylesheet"/>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>themes/front/css/style.css?<?php echo time(); ?>" />

		

		<link href="<?php echo base_url(); ?>themes/front/css/font-awesome.min.css" rel="stylesheet"/>

		<link href="<?php echo base_url(); ?>themes/front/css/toastr.css" rel="stylesheet"/>

		<!-- custom CSS -->

		<link href="<?php echo base_url(); ?>themes/front/css/custom.css?<?php echo time(); ?>" rel="stylesheet"/>



		<script src="<?php echo base_url(); ?>themes/front/js/jquery.min.js"></script>

		<script src="<?php echo base_url(); ?>themes/front/js/bootstrap.min.js"></script>

	  	<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->



	  	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164709350-2"></script>

        <script>

          window.dataLayer = window.dataLayer || [];

          function gtag(){dataLayer.push(arguments);}

          gtag('js', new Date());

        

          gtag('config', 'UA-164709350-2');

        </script>

        

		<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/starrr/dist/starrr.css">

		<!--<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.0.11.min.js"></script>-->

		<script src="https://js.braintreegateway.com/web/dropin/1.20.4/js/dropin.min.js"></script>

		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/front/css/front_custom.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/front/css/auth.css">

		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->

		

		<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css"/>

		

		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css"/>

		

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css"/>

		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">

		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

		<script type="text/javascript">


// 		(function () {

// 			'use strict';



// 			var pubnub = new PubNub({

// 				publishKey: 'demo',

// 				subscribeKey: 'demo'

// 			});



// 			/**

// 			 * Initializes pubnub service

// 			 */

// 			function initPubNub() {



// 				// Call event listener when new msg comes in

// 				pubnub.addListener({

// 					message: function(data) {

// 						if(data.message.sender_id != '<?php echo $auth_user_data[0]->id; ?>'){

// 							openMessenger(data.message.sender_id);

// 						}

// 						$.ajax({

// 							method: "POST",

// 							url: "<?php echo base_url(); ?>ajax_call",

// 							data: {

// 								sender_id: data.message.sender_id,

// 								receiver_id: data.message.receiver_id,

// 								channel_id: data.message.channel_id,

// 								text: data.message.text,

// 								action: "add_notification"

// 							}

// 						});

						

// 					}

// 				});

				

// 				// Subscribe to these channels

// 				pubnub.subscribe({

// 				  channels: ['<?php echo join("','", $channel_data); ?>']

// 				});

// 			}

		  

// 			// Wait until device is ready and then init the app

// 			document.addEventListener('DOMContentLoaded', function () {

// 				initPubNub();

// 			}, false);



// 		})();

        //scroll

		</script>
<script>
    $(document).ready(function(){
        $(".redirectPublish").click(function(){
          $(".publishItems").click();
        });
        //  $("html, body").animate({ scrollTop: 0 }, "slow");
        // $(".price").keypress(function(){
        //      = this.value.match(/^\d+\.?\d{0,2}/);
        // });
        $('.price').on('input', function () {
            this.value = this.value.match(/^\d+\.?\d{0,2}/);
        });
        $('.postage_fee').on('input', function () {
            this.value = this.value.match(/^\d+\.?\d{0,2}/);
        });
        
        		$("#Signin-Form").submit(function(){
                
				if($(this).valid()){
                    
					$.ajax({

						method: "POST",

						url: "<?php echo base_url(); ?>ajax_call",

						data: {

							first_name: $(this).find("[name='first_name']").val(),

							last_name: $(this).find("[name='last_name']").val(),

							username: $(this).find("[name='username']").val(),

							email: $(this).find("[name='email']").val(),

							password: $(this).find("[name='password']").val(),

							re_password: $(this).find("[name='re_password']").val(),

							action: "register"
                            
						}
                    
					})

					.done(function( msg ) {
                       
                //   $('#signup-modal-content').modal('toggle'); 
                    
						// console.log(msg);

						if(msg=="duplicate_email"){
                            swal("Error", "Email already exist!","error");
				// 			$(".register_msg").html("<div class='err_msg'>Email already exist!</div>");

						}

						else if(msg=="pass_mistmatch"){
                            swal("Error", "Password Mistmatch!","error");
				// 			$(".register_msg").html("<div class='err_msg'>Password Mistmatch!</div>");

						}

						else if(msg=="duplicate_username"){
                            swal("Error", "Username already exist!","error");
				// 			swal(".register_msg").html("<div class='err_msg'>Username already exist!</div>");

						}else{

				// 			$(".register_msg").html("<div class='success_msg'>Thank you for registering with Lyreh. Please check your email to activate your account.</div>");
							
								swal("Success", "Thank you for registering with Lyreh. Please check your email to activate your account.","success");

							setTimeout(function(){

								 window.location.href="";

							}, 3000);

						}

					});

				}

			  return false;

			});
        
        
    });
    
</script>
		

		<?php 

$query = $this->db->get("stripesettings");

$ret = $query->row();



$stripe_key =  ''; 

if(!empty($ret->publicKey)){

    $stripe_key = $ret->publicKey;

}

?>

<script src="https://js.stripe.com/v3/"></script>



<script type="text/javascript">

function confirmBox(event){

       	linkValue = event.getAttribute("data-href");

       	var r = confirm("Are you sure you want to disconnect your stripe account?");

    	  if (r == true) {

    	    window.location.href = linkValue;

    	  } 

   }

  $(document).ready(function() {



        // $(".payment-model-title").html("Credit/Debit Form");

        $(".payment-footer").html(`<div class="row">

          <div id="card-element"></div>

          </div>`);

        

        var stripe = Stripe("<?=$stripe_key?>");



        var elements = stripe.elements();

        var style = {

          base: {

            color: '#32325d',

            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',

            fontSmoothing: 'antialiased',

            fontSize: '16px',

            '::placeholder': {

              color: '#aab7c4'

            }

          },

          invalid: {

            color: '#fa755a',

            iconColor: '#fa755a'

          }

        };



        // Create an instance of the card Element.

        var card = elements.create('card', {hidePostalCode: true,style: style});



        // Add an instance of the card Element into the `card-element` <div>.

        card.mount('#card-element');



        // Handle real-time validation errors from the card Element.

        card.addEventListener('change', function(event) {

          var displayError = document.getElementById('card-errors');

            if (event.error) {

              displayError.textContent = event.error.message;

            } else {

              displayError.textContent = '';

            }

        });



      // Handle form submission.

        var form = document.getElementById('checkout_form');

        form.addEventListener('submit', function(event) {

          event.preventDefault();



          stripe.createToken(card).then(function(result) {

            if (result.error) {

              // Inform the user if there was an error.

              var errorElement = document.getElementById('card-errors');

              errorElement.textContent = result.error.message;

            } else {

              // Send the token to your server.

              stripeTokenHandler(result.token);

            }

          });

        });



// Submit the form with the token ID.

function stripeTokenHandler(token) {

  // Insert the token ID into the form so it gets submitted to the server

  var form = document.getElementById('checkout_form');

  var hiddenInput = document.createElement('input');

  hiddenInput.setAttribute('type', 'hidden');

  hiddenInput.setAttribute('name', 'stripeToken');

  hiddenInput.setAttribute('value', token.id);

  form.appendChild(hiddenInput);

  //var form_data = $('#payment-form').serialize();

    

    

    

    //   $.ajax({

    //         url: '<?=base_url("index.php/payment/stripe_payment")?>',

    //         type: 'POST',

    //         data: {stripeToken: token.id},

    //         dataType: "json",

    //         success: function(res){

    //           if(res.status){



    //             $("").html(res.message);

    //           }else{

    //             $("").html(res.message);

    //           }  

    //         }

    //     });

 

}













  })

            <?php if(!empty($_GET["orderId"])){ ?>
				setTimeout(function(){ 
					$(".tab-pane").removeClass("show");
					$(".tab-pane").removeClass("active");
					$(".nav-link").removeClass("active");
					
					$("#user_order").addClass("active");
					$(".purchase_tab").addClass("active");
					$("#user_order").addClass("show");

					var orderId = "<?php echo $_GET["orderId"] ?>";
					// $("body").animate({ scrollTop: $("tr#"+orderId)[0].scrollHeight}, 1000);
					$('html, body').animate({
				        scrollTop: $("tr#"+orderId).offset().top-300
				    }, 2000);
				    $("tr#"+orderId).css("background-color","#f7deca");
					setTimeout(function(){ $("tr#"+orderId).css("background-color","transparent"); }, 3000);
				 }, 1000);
				
			<?php } ?>



</script>



<?php 



if(!empty($this->session->userdata('auth_user')[0]->id)){

	$sessId = $this->session->userdata('auth_user')[0]->id;

$offersData = $this->Crud_model->get_data("","offerdata",["fromId"=>$sessId]);

if(!empty($offersData)){

	foreach ($offersData as $datas) {

	

	if($datas->offerStatus == "accepted" && $datas->cartStatus == "not_added"){

			if(!empty($datas->productSlug)){

				$itemData = $this->Crud_model->get_data("","items",["slug"=>$datas->productSlug],True);

			}

			$offerUniqueId = uniqid();

			$item_id=$itemData->id;

			// $item_count=$this->input->post("item_count");

			$item=$this->action->select("items",array("id"=>$item_id));

			$postage_fee=$item[0]->postage_fee;

			$price = $datas->offerPrice;

			// foreach ($this->cart->contents() as $itms){

			// 	if($itemData->slug == $offerData->productSlug){

			// 		// $price += $itms['price'];



			// 	}

			// }



			$insert_data = array(

			        'id'      => 'sku_'.$offerUniqueId,

			        'qty'     => 1,

			        'price'   => $price,

			        'postage_fee'   => $postage_fee,

			        'name'    => $item[0]->item_name,

			        'image'   => base_url()."uploads/item/".unserialize($item[0]->item_image)[0]

			        //'options' => array('Size' => 'L', 'Color' => 'Red')

			);

			

			$this->cart->insert($insert_data);

			$this->Crud_model->update_data(["offerId"=>$datas->offerId],["cartStatus"=>"added"],"offerdata");

		}

	  }



	}

}



?>



	<style>

#card-errors{

    color: #ac0000 !important;

    font-style: italic;

    width: auto !important;

    margin-left: 6px;

}	

 .onoffswitch {

    position: relative;

    width: 50px;

    -webkit-user-select: none;

    -moz-user-select: none;

    -ms-user-select: none

  }



  .onoffswitch-checkbox {

    display: none

  }



  .onoffswitch-label {

    display: block;

    overflow: hidden;

    cursor: pointer;

    height: 20px;

    padding: 0;

    line-height: 22px;

    border: 1px solid #bfcbd9;

    border-radius: 22px;

    background-color: #bfcbd9;

    -webkit-transition: background-color .3s ease-in;

    transition: background-color .3s ease-in

  }



  .onoffswitch-label:before {

    content: "";

    display: block;

    width: 20px;

    margin: 0;

    background: #fff;

    position: absolute;

    top: 0;

    bottom: 0;

    right: 30px;

    border: 1px solid #bfcbd9;

    border-radius: 20px;

    -webkit-transition: all .3s ease-in 0s;

    transition: all .3s ease-in 0s

  }



  .onoffswitch-checkbox:checked+.onoffswitch-label {

    background-color: #84c529

  }



  .onoffswitch-checkbox:checked+.onoffswitch-label, .onoffswitch-checkbox:checked+.onoffswitch-label:before {

    border-color: #84c529

  }



  .onoffswitch-checkbox:checked+.onoffswitch-label:before {

    right: 0

  }



  .onoffswitch-checkbox:disabled+.onoffswitch-label {

    opacity: .5

  }



  .itemdiv{

    margin-top: 65px;

  }



  .abc{

    margin-left: 42px;

  }



  .custombold{

    text-align: left; 

    color: black;    

  }

  .algnLeft{

    text-align: left;

  }

  .StripeElement {

      width:100%;

    box-sizing: border-box;



    height: 40px;



    padding: 10px 12px;



    border: 1px solid #bfcbd9;;

    border-radius: 4px;

    background-color: white;



    box-shadow: 0 1px 3px 0 #e6ebf1;

    -webkit-transition: box-shadow 150ms ease;

    transition: box-shadow 150ms ease;

    

  }



  .StripeElement--focus {

    box-shadow: 0 1px 3px 0 #cfd7df;

  }



  .StripeElement--invalid {

    border-color: #fa755a;

  }



  .StripeElement--webkit-autofill {

    background-color: #fefde5 !important;

  }

   .pac-container {

        z-index: 10000 !important;

    }

 

	

	.TestModeInfo{

        display:none !important;

    }

	.ui-loader-header{

	    display:none!important;

	}

	.Notify a.viewall {

		text-decoration: none;

		font-size: 12px;

		color: #818181;

		display: block;

		float: right;

		margin-right: 10%;

		margin-top: -12%;

	}

	.list-group-item{

        border-bottom: 1px solid rgba(0,0,0,.125) !important;

        border-top: none !important;

	}
	.middle{
		top: 6% !important;
	}
	</style>
<style>

			.togg li {

				margin: 8px 0px 0px 35px;

				display: block;

			}

			.togg li a i {

                margin: 0px 0px 0px 4px;

            }

			.board {

			  height: 100%;

			  width: 0;

			  position: fixed;

			  z-index: 1;

			  top: 0;

			  left: 0;

			  background-color: #f9f9f9;

			  overflow-x: hidden;

			  transition: 0.5s;

			  padding-top: 26px;

			}

			.board a {

			  text-decoration: none;

			  font-size: 16px;

			  color: #818181;

			  display: block;

			  transition: 0.3s;

			}

			.board a:hover {

			  color: #000;

			}



			.board .closebtn {

				position: absolute;

				top: 8%;

				right: 4px;

				font-size: 31px;

				margin-left: 50px;

			}

			.topnav input[type="text"] {

				width: 196px;

				height: 40px;

				margin-top: 0px;

				background: #eee;

				border: none;

				padding-left: 5px;

			}

			.topnav {

				text-align: center;

			}

			.topnav img {

				   width: 60px;

				display: block;

				margin: auto;

			}

			.ui-icon {

				float: right;

			}

			.bs-example{

				margin: 20px;

			}

			@media screen and (max-height: 450px) {

			  .sidenav {padding-top: 15px;}

			  .sidenav a {font-size: 18px;}

			}

			</style>





	</head>



	<body id="mainstep">

		<?php 

		$notify="";

		$notify_alert = '';	

		if(null !== $this->session->userdata('auth_user')){

			foreach($notifications as $notification){

				if(($auth_user_data[0]->id==$notification->receiver_id) && ($notification->msg_read ==0) ){

					$notify="notify_msg";

				} 

			}

		}





		if(null !== $this->session->userdata('auth_user')){

			foreach($notifications_alert as $notification1){

				// if(($auth_user_data[0]->id==$notification1->receiver_id || $auth_user_data[0]->id==$notification1->sender_id) && ($notification1->receiver_read==0) || ($notification1->sender_read==0)){

				// 	$notify_alert="notify_msg";

				// } 



				if($auth_user_data[0]->id == $notification1->receiver_id  && $notification1->receiver_read==0){

					$notify_alert="notify_msg";

				} else if($auth_user_data[0]->id == $notification1->sender_id  && $notification1->sender_read==0){

					$notify_alert="notify_msg";

				} 

			}

		}

		?>

		<!---------------------------------header-section-------------------------->

		<header class="royal">

		    <div class="toprecomerce">

                <p></p>

            </div>

			<div class="logo-sections">



									

				<!--

				<div id="mySidenav" class="sidenav">

					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

					<?php foreach($menus as $menu){ ?>

						<a class="text" href="<?php echo base_url().$menu->slug; ?>">

							<i class="fa <?php echo $menu->icon; ?>" aria-hidden="true"></i>

							<?php echo $menu->title; ?>

						</a>

					<?php } ?>

				</div>

				-->

				<a href="<?php echo base_url(); ?>">

					<img src="<?php echo base_url(); ?>themes/front/images/logo.png" alt=""/>

				</a>

			</div>

			<div class="headermenus" id="myHeader">

				<div class="container-fluid" id="main-header1">

					<div class="top-layer col-md-12 col-sm-12 col-xs-12">

						<!--notify-->

						<?php

						if(!empty($this->session->userdata('auth_user')[0]->id)){

							$fromId = $this->session->userdata('auth_user')[0]->id;



				// 			$query = "SELECT chatstart.chatStartId as chatStartId, chatstart.fromId as fromId, chatstart.toId as toId, chatstart.productSlug as productSlug, chatstart.type as type, chatstart.time as time FROM chatstart INNER JOIN chat ON chat.chatStartId = chatstart.chatStartId WHERE chatstart.fromId='".$fromId."' AND chat.status = 'unread' OR (chatstart.toId='".$fromId."' AND chat.status = 'unread') GROUP BY chatstart.chatStartId ORDER BY chatstart.time DESC";

							$query = "SELECT chatstart.chatStartId as chatStartId, chatstart.fromId as fromId, chatstart.toId as toId, chatstart.productSlug as productSlug, chatstart.type as type, chatstart.time as time FROM chatstart INNER JOIN chat ON chat.chatStartId = chatstart.chatStartId WHERE chat.receiveId='".$fromId."' AND chat.status = 'unread' GROUP BY chatstart.chatStartId ORDER BY chatstart.time DESC";

							$allConversation = $this->db->query($query)->result();



							 ?>



							 <?php if(!empty($allConversation[0])){ if(!empty($allConversation[0]->productSlug)){

								$url = base_url('chat/').$allConversation[0]->productSlug.'/'.$allConversation[0]->toId;

							}else{ 

								$url = base_url('chat/profile').'/'.$allConversation[0]->toId;

							}

							}else{

								$url = "#";	

							}

						}

							?>

						<div class="mouse">

							<div id="mynotify" class="Notify">

								<h3>Messages</h3>

								

								<a class="viewall" href="<?php echo base_url('Chat/chats/'); ?>"  >View All</a>&nbsp;

								<a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>





<?php if(!empty($fromId)){


 foreach ($allConversation as $convo) { ?>

<div class="first notifirst">

													<img src="<?php echo base_url(); ?>themes/front/images/download.png" alt=""/>

													<div class="text-area">

														<?php if(!empty($convo->productSlug)){

															if($this->session->userdata('auth_user')[0]->id == $convo->fromId){

																$toId = $convo->toId;

															}else{

																$toId = $convo->fromId;

															}



															$url = base_url('chat/').$convo->productSlug.'/'.$toId;

														}else{ 

															if($this->session->userdata('auth_user')[0]->id == $convo->fromId){

																$toId = $convo->toId;

															}else{

																$toId = $convo->fromId;

															}

															$url = base_url('chat/profile').'/'.$toId;

														}

															?>

														<a href="<?php echo $url; ?>" class="lh20">

															<?php 

                                $userNames = getUserName($toId);

                                echo $userNames->username; ?> has sent you message.

															<p><?php $lastMessage = getLastMessage($convo->chatStartId); ?></p>

															<?php if (strpos($lastMessage->message, 'offer-sent') !== false) {

															    echo "New offer!!!";

															}else{

															?>

															  <?php if(strlen($lastMessage->message)>1){ echo substr($lastMessage->message, 0, 15).'...'; }else{ echo $lastMessage->message; } ?>

															  <?php } ?>

														</a>

														<p><?php echo time_elapsed_string($convo->time); ?></p>

													</div>

												</div>

<?php



	 } 
	 if(empty($allConversation)){
	 	echo "<br><br><b style='color:#818191;'>No messages.</b>";
	 }

} 

?>





								<?php 

								if(null !== $this->session->userdata('auth_user')){

									foreach($notifications as $notification){

										if($auth_user_data[0]->id==$notification->receiver_id ){

											$sender=$this->action->select("users", array("id"=>$notification->sender_id));	

											if(count($sender)>0){

												if($notification->msg_read=="0"){

												?>

												<div class="first">

													<img src="<?php echo base_url(); ?>themes/front/images/download.png" alt=""/>

													<div class="text-area">

														<a href="javascript:openMessenger(<?php echo $notification->sender_id; ?>)">

															<?php echo @$sender[0]->first_name; ?> has sent you message.

															<p><?php echo $notification->message; ?></p>

														</a>

														<p><?php echo date('F d,Y',strtotime($notification->created_at)); ?></p>

													</div>

												</div>

												<?php 

												}

											}

										}

									}

								}

								?>

							</div>



							<div id="mynotify_alert" class="Notify">

								<h3>Notifications</h3>

								&nbsp;<a href="javascript:void(0)" class="closebtn" onclick="closeNotification_alert()">&times;</a>

								<?php 

							if(null !== $this->session->userdata('auth_user')){
									$noNotification = false;
									$counts = 1;
									foreach($notifications_alert as $notification){
										$link ="#";
										if($auth_user_data[0]->id==$notification->receiver_id || $auth_user_data[0]->id==$notification->sender_id){
												if($auth_user_data[0]->id == $notification->sender_id){
													if($notification->send_read == 0){
														$noNotification = true;
														if(!empty($notification->notification_type)){
															if ($notification->notification_type == "offer") {
																if(!empty($notification->conversation_id)){
																	$getOfferData = getChatLink($notification->conversation_id);	
																	if(!empty($getOfferData)){
																		if($getOfferData->fromId == $auth_user_data[0]->id){
																			$toIds = $getOfferData->toId;
																		}else{
																			$toIds = $getOfferData->fromId;
																		}
																		$link = base_url("chat/").$getOfferData->productSlug."/".$toIds."?offer=".$notification->message;		
																	}
																}
															}else if($notification->notification_type == "message"){
																if(!empty($notification->conversation_id)){
																	$getOfferData = getChatLink($notification->conversation_id);	
																	if(!empty($getOfferData)){
																		if($getOfferData->fromId == $auth_user_data[0]->id){
																			$toIds = $getOfferData->toId;
																		}else{
																			$toIds = $getOfferData->fromId;
																		}
																		if(!empty($getOfferData->productSlug)){
																			$link = base_url("chat/").$getOfferData->productSlug."/".$toIds;		
																		}else{
																			$link = base_url("chat/profile")."/".$toIds;		
																		}
																		
																	}
																}
															}else if($notification->notification_type == "order"){
																if(!empty($notification->order_id)){
																	$orderData = getOrderData($notification->order_id);
																	$link = base_url("account")."?orderId=".$orderData->order_id;
																}
															}
														}

														?>

														<a class="notificationRemove" notificationId="<?php echo $notification->id;  ?>" href="<?php echo $link; ?>" style="font-size: 1rem;">
										<div class="alert alert-success"> 
													
											<?php if (strpos($notification->message, 'offer-sent') !== false) { ?>
                                            <?php $offerData = getOfferData($notification->message);
                                            if($offerData->fromId == $auth_user_data[0]->id){
                                            	$userDataa = getUserName($offerData->toId);
	                                            if($offerData->offerStatus == "pending"){
	                                            	echo "You have sent an offer to <b>".$userDataa->username."</b>";
	                                            }else if($offerData->offerStatus == "accepted"){
	                                            	echo "Your offer is accepted by <b>".$userDataa->username."</b>";
	                                            }else if($offerData->offerStatus == "declined"){
	                                            	echo "Your offer is declined by <b>".$userDataa->username."</b>";
	                                            }
                                        	}else{
                                        		$userData = getUserName($offerData->fromId);
                                        		echo "You have received an offer from <b>".$userData->username."</b>";
                                        	}

                                            }else{ ?>
                                            	<?php echo $notification->message; ?>
                                            <?php } ?>
                                        	
										</div>
										</a>

														<?php

													}
												}else{
													// exit;
													if(!empty($notification->notification_type)){
														if($notification->receive_read == 0){
															$noNotification = true;
														if ($notification->notification_type == "offer") {
															if(!empty($notification->conversation_id)){
																$getOfferData = getChatLink($notification->conversation_id);	
																if(!empty($getOfferData)){
																	if($getOfferData->fromId == $auth_user_data[0]->id){
																		$toIds = $getOfferData->toId;
																	}else{
																		$toIds = $getOfferData->fromId;
																	}
																	$link = base_url("chat/").$getOfferData->productSlug."/".$toIds."?offer=".$notification->message;		
																}
															}
														}else if($notification->notification_type == "message"){
															if(!empty($notification->conversation_id)){
																$getOfferData = getChatLink($notification->conversation_id);	
																if(!empty($getOfferData)){
																	if($getOfferData->fromId == $auth_user_data[0]->id){
																		$toIds = $getOfferData->toId;
																	}else{
																		$toIds = $getOfferData->fromId;
																	}
																	if(!empty($getOfferData->productSlug)){
																		$link = base_url("chat/").$getOfferData->productSlug."/".$toIds;		
																	}else{
																		$link = base_url("chat/profile")."/".$toIds;		
																	}
																	
																}
															}
														}else if($notification->notification_type == "order"){
															if(!empty($notification->order_id)){
																$orderData = getOrderData($notification->order_id);
																$link = base_url("account")."?orderId=".$orderData->order_id;
															}
														}
														?>

																<a class="notificationRemove" notificationId="<?php echo $notification->id;  ?>" href="<?php echo $link; ?>" style="font-size: 1rem;">
												<div class="alert alert-success"> 
															
													<?php if (strpos($notification->message, 'offer-sent') !== false) { ?>
		                                            <?php $offerData = getOfferData($notification->message);
		                                            if($offerData->fromId == $auth_user_data[0]->id){
		                                            	$userDataa = getUserName($offerData->toId);
			                                            if($offerData->offerStatus == "pending"){
				                                            	echo "You have sent an offer to <b>".$userDataa->username."</b>";
				                                            }else if($offerData->offerStatus == "accepted"){
				                                            	echo "Your offer is accepted by <b>".$userDataa->username."</b>";
				                                            }else if($offerData->offerStatus == "declined"){
				                                            	echo "Your offer is declined by <b>".$userDataa->username."</b>";
				                                            }
			                                        	}else{
			                                        		$userData = getUserName($offerData->fromId);
			                                        		echo "You have received an offer from <b>".$userData->username."</b>";
			                                        	}

		                                            }else{ ?>
		                                            	<?php echo $notification->message; ?>
		                                            <?php } ?>
		                                        	
												</div>
												</a>

														<?php
														}
													}

												}
												
												?>
										<!-- <a class="notificationRemove" notificationId="<?php echo $notification->id;  ?>" href="<?php echo $link; ?>" style="font-size: 1rem;">
										<div class="alert alert-success"> 
													
											<?php if (strpos($notification->message, 'offer-sent') !== false) { ?>
                                            <?php $offerData = getOfferData($notification->message);
                                            if($offerData->fromId == $auth_user_data[0]->id){
                                            	$userDataa = getUserName($offerData->toId);
	                                            if($offerData->offerStatus == "pending"){
	                                            	echo "You have sent an offer to ".$userDataa->username;
	                                            }else if($offerData->offerStatus == "accepted"){
	                                            	echo "Your offer is accepted by ".$userDataa->username;
	                                            }else if($offerData->offerStatus == "declined"){
	                                            	echo "Your offer is declined by ".$userDataa->username;
	                                            }
                                        	}else{
                                        		$userData = getUserName($offerData->fromId);
                                        		echo "You have received an offer from ".$userData->username;
                                        	}

                                            }else{ ?>
                                            	<?php echo $notification->message; ?>
                                            <?php } ?>
                                        	
										</div>
										</a> -->
												<?php 
											
										}
										$counts++;
										if($counts >= 20){
										    break;
										}
									}
								}
								if($noNotification == false){
									echo "<br><br><b style='color:#818191;'>No notifications.</b>";
								}
								?>

							</div>



							<!--<span style="font-size:20px;cursor:pointer" onclick="openNotification()">&#9776; </span>-->

						</div>

						<!--notify-->





						

						<div class="container-fluid home-page12">

							<div class="homeslide12 col-sm-12">

							   <div class="row">

								  <div class="col-lg-12 col-xs-12 megamenu-content12">



									<div class="menutog custom_m">

										<div id="mySidenav" class="sidenav " style="box-shadow: rgba(0, 0, 0, 0.2) 8px 0px 48px;background-color: #fff;transition: all 0.6s ease 0s;">

											<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

											<a class="text" href="<?php echo base_url(); ?>">

												<!-- <i class="fa fa-home" aria-hidden="true"></i> -->

												Home								

											</a>

											<a class="text" href="<?php echo base_url(); ?>about">

												<!-- <i class="fas fa-building"></i> -->

												About us								

											</a>

											<a class="text" href="<?php echo base_url(); ?>faq">

												<!-- <i class="fa fa-question-circle-o" aria-hidden="true"></i> -->

												Faq								

											</a>

											<a class="text" href="<?php echo base_url(); ?>help">

												<!-- <i class="fa fa-info-circle" aria-hidden="true"></i> -->

												Help

											</a>

											<?php if(null !== $this->session->userdata('auth_user')){ ?>

												<a class="text" href="<?php echo base_url(); ?>account">

													<!-- <i class="fa fa-user" aria-hidden="true"></i> -->

													Profile

												</a>

												<a class="text logcolor" href="<?php echo base_url(); ?>logout" onclick="signOut();">

													<!-- <i class="fa fa-sign-out" aria-hidden="true"></i> -->

													Logout

												</a>

											<?php } else { ?>

												<a class="text logcolor" href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal">

													<!-- <i class="fa fa-sign-in" aria-hidden="true"></i> -->

													Login

												</a>

											<?php } ?>

											<div class="sidenav_bar">

												<div class="footer-inners laster">

													<h4>Information</h4>

													<ul>

														<li>

															<a href="<?php echo base_url(); ?>legal">

																<!-- <i class="fa fa-users" aria-hidden="true"></i> -->

																Legal

																<!-- <i class="fa fa-angle-right" aria-hidden="true"></i> -->

															</a>

														</li>

														<li>

															<a href="<?php echo base_url(); ?>privacy-policy">

																	<!-- <i class="fa fa-lock" aria-hidden="true"></i> -->

																Privacy Policy

																<!-- <i class="fa fa-angle-right" aria-hidden="true"></i> -->

															</a>

														</li>

													</ul>

												</div>

											</div>

										</div>

										<div id="main">

										   <span style="font-size:30px;cursor:pointer" onclick="openNav()"><img src="<?php echo base_url(); ?>uploads/menu.png" width="38px" class="custom-image-w"></span>

										</div>

									</div>

									

									 <nav class="navoptions">

										<div class="collapse navbar-collapse" id="myNavbar">

											<!--

											<ul class="nav navbar-nav">

												<?php 

												$inc=0;

												foreach($menus as $menu){

													$inc++;

													?>

													<li class="<?php if($inc==1){ echo 'active'; } ?>">

														<a href="<?php echo base_url().$menu->slug; ?>">

															<i class="fa <?php echo $menu->icon; ?>" aria-hidden="true"></i>

															<span><?php echo $menu->title; ?></span>

														</a>

													</li>

												<?php } ?>

											</ul>

											-->

											<?php 

											$cart_item_count=0;

											foreach ($this->cart->contents() as $item){

												$cart_item_count=$cart_item_count+$item['qty'];

											}

											?>

											<ul class="nav navbar-nav <?php if($this->session->userdata('auth_user')== null){echo "login_check";}?>">

												<li class="active">

													<a href="<?php echo base_url(); ?>buy" onclick="return openSearch()" id="buy-img">

														<img src="<?php echo base_url(); ?>uploads/buy.png"  class="buy-img" >

														<!-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> -->

														<!-- <i class="fas fa-shopping-cart" style="font-size: 25px;margin-right: 7px;"></i> -->

														<span class="after_line">Buy</span>

													</a>

												</li>

												<li class="">

													<?php if(null !== $this->session->userdata('auth_user')){ ?>

													<a href="<?php echo base_url(); ?>sell"  id="sell-img">

													<?php }else{ ?>

													 <a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal" id="sell-img">

													<?php } ?>

													<img src="<?php echo base_url(); ?>uploads/sell.png"  class="sell-img" >

														<!-- <i class="fa fa-tag" aria-hidden="true"></i> -->

														

														<!-- <i class="fas fa-shopping-bag" style="font-size: 25px;margin-right: 7px;"></i> -->

														<span class="after_line">Sell</span>

													</a>

												</li>

												<?php 

												$counter=0;

												if(!empty($allConversation)){

												foreach ($allConversation as $convo) { 

												    $lastmessage = getLastMessage($convo->chatStartId);

												     if($lastmessage->status == "unread"){

												        $counter++;

												     }

												    

												} } ?>

												<?php if(null !== $this->session->userdata('auth_user')){ ?>

													<li class="">

														<!--  onclick="return openNotification()" -->

														<a href="<?php echo base_url(); ?>chat_mobile" onclick="return openNotification()" id="message-img">

															<i class="fa fa-envelope-o" aria-hidden="true"></i>

															<?php if(!empty($counter)){ ?>

															<i class="fa fa-circle circlemob" style="font-size:10px;color:#D99F6F;"></i>

															<?php } ?>

															<!-- <img src="<?php echo base_url(); ?>uploads/message.png" width="30px" class="message-img" > -->

															<!-- <i class="fab fa-telegram-plane" style="font-size: 30px;" ></i> -->

															<!-- <i class="far fa-paper-plane" style="font-size: 25px;margin-right: 7px;"></i> -->

															<span class="<?php echo $notify; ?>">

																<?php if(!empty($notify)){

																	// echo 'New';

																} ?>

															Messages</span>

															

														</a>

													</li> 

												<?php } ?>

												<li class="" style="margin-left: -7px;">

													<?php if(null !== $this->session->userdata('auth_user')){ ?>

													<a href="<?php echo base_url(); ?>concierge" id="conc-img">

													<?php }else{ ?>

													 <a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal" id="conc-img">

													<?php } ?>

													

													<!-- <i class="fas fa-concierge-bell" style="font-size: 25px;"></i> -->

													<!-- <img src="<?php echo base_url(); ?>uploads/conc.png" width="30px" class="conc-img" > -->

														<!--<i class="fa fa-info-circle" aria-hidden="true" style="font-size: 25px;"></i>-->

														 <i class="fa fa-eye" aria-hidden="true" style="font-size: 25px;"></i> 

														<span class="after_line">Concierge</span>

													</a>

												</li>

												<?php if(null !== $this->session->userdata('auth_user')){ ?>

													<li class="">

														<a href="<?php echo base_url(); ?>notification" onclick="return openNotification_alert()" id="notification-img">





															<!-- <i class="fa fa-bell" aria-hidden="true"></i> -->

															<img src="<?php echo base_url(); ?>uploads/notification.png" class="notification-img" >

														<!-- <i class="far fa-bell" style="font-size: 25px;margin-right: 7px;"></i> -->



															<span id='notificationremove' class="<?php echo $notify_alert; ?> after_line">

																Notifications

															</span>



														</a>

													</li> 

												<?php }

												    if(!empty($this->session->userdata('auth_user'))){

												?>

												<li class="" style="margin-top: -7px;">

													<input type="hidden" id="cart_count" value="<?php echo $cart_item_count; ?>"  />

													<a class="mini_cart_data" href="<?php echo base_url(); ?>cart" id="basket-img">

														<!-- <i class="fa fa-shopping-basket" aria-hidden="true"></i> -->

														<!-- <i class="fas fa-shopping-basket" style="font-size: 25px;margin-right: 7px;"></i> -->

														<!-- <spanbasket-img class="lnr lnr-cart"></span> -->

														<img src="<?php echo base_url(); ?>uploads/basket.png"  class="basket-img" style="margin-bottom: -8px;" >



														<span class="after_line">Basket(<?php echo $cart_item_count; ?>)</span>

													</a>

												</li>

                                                <?php } ?>

												

											</ul>

										</div>

									 </nav>

								  </div>

							   </div>

							</div>

						</div>

					</div>

				</div>

			</div>











<!-- ****************************************************************************** -->

			<div class="searcb-bar">

				<div id="mySideSearch" class="board">

					<div class="topnav">

						<img src="<?php echo base_url(); ?>themes/front/images/logo.png" alt=""/>

						<form method="get" class="search_form" action="<?php echo base_url(); ?>search">

							<input type="text" class="form-control" name="q" placeholder="Search" value="<?php echo @$this->input->get("q"); ?>"/>

							<!--<button type="submit" class="btn btn-default">Search</button>-->

						</form>

					</div>

					<ul class="togg">

						<?php foreach($item_cat as $cat){ ?>

							<li>

								<?php if(null !== $this->session->userdata('auth_user')){ ?>

								<a href="<?php echo base_url()."category/".$cat->id; ?>">

								<?php }else{ ?>

								 <a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal">

								<?php } ?>

									<?php echo $cat->category_name; ?><i class="fa fa-angle-right" aria-hidden="true"></i>

								</a>

							</li>

						<?php } ?>

					</ul>

					<!--

					<ul class="togg">

						<?php foreach($searches as $search){ ?>

							<li><a href="<?php echo base_url()."search?q=".$search->search_name; ?>"><?php echo $search->search_name; ?></a></li>

						<?php } ?>

					</ul>

					-->

					<a href="javascript:void(0)" class="closebtn" onclick="closeSearch()">&times;</a>

				</div>

			</div>

			

		</header>

		<!---------------------------------header-section-end-------------------------->

		<div class="slack">