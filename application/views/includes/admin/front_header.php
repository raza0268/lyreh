<html lang="en">
	<head>
		<title>Lyreh</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url(); ?>themes/front/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>themes/front/css/style.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>themes/front/css/font-awesome.min.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>themes/front/css/toastr.css" rel="stylesheet"/>
		<script src="<?php echo base_url(); ?>themes/front/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>themes/front/js/bootstrap.min.js"></script>
	  	

	  	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164709350-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-164709350-2');
        </script>
        
		<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/starrr/dist/starrr.css">
		<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.0.11.min.js"></script>
		<script src="https://js.braintreegateway.com/web/dropin/1.20.4/js/dropin.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/front/css/front_custom.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/front/css/auth.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css"/>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css"/>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css"/>
		
		<script type="text/javascript">
		(function () {
			'use strict';

			var pubnub = new PubNub({
				publishKey: 'demo',
				subscribeKey: 'demo'
			});

			/**
			 * Initializes pubnub service
			 */
			function initPubNub() {

				// Call event listener when new msg comes in
				pubnub.addListener({
					message: function(data) {
						if(data.message.sender_id!='<?php echo $auth_user_data[0]->id; ?>'){
							openMessenger(data.message.sender_id);
						}
						$.ajax({
							method: "POST",
							url: "<?php echo base_url(); ?>ajax_call",
							data: {
								sender_id: data.message.sender_id,
								receiver_id: data.message.receiver_id,
								channel_id: data.message.channel_id,
								text: data.message.text,
								action: "add_notification"
							}
						})
						.done(function( msg ) {
							//alert(msg);
						});
					}
				});
				
				// Subscribe to these channels
				pubnub.subscribe({
				  channels: ['<?php echo join("','", $channel_data); ?>']
				});
			}
		  
			// Wait until device is ready and then init the app
			document.addEventListener('DOMContentLoaded', function () {
				initPubNub();
			}, false);

		})();
        //scroll
		</script>
	</head>
	<style>
	.Notify a.viewall {
		text-decoration: none;
		font-size: 12px;
		color: #818181;
		display: block;
		float: right;
		margin-right: 10%;
		margin-top: -12%;
	}
	</style>
	<body id="mainstep">
		<?php 
		$notify="";
		$notify_alert = '';	
		if(null !== $this->session->userdata('auth_user')){
			foreach($notifications as $notification){
				if(($auth_user_data[0]->id==$notification->receiver_id) && ($notification->msg_read==0)){
					$notify="notify_msg";
				} 
			}
		}


		if(null !== $this->session->userdata('auth_user')){
			foreach($notifications_alert as $notification1){
				if(($auth_user_data[0]->id==$notification1->receiver_id || $auth_user_data[0]->id==$notification1->sender_id) && ($notification1->msg_read==0)){
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
			<div class="headermenus sticky_" id="myHeader">
				<div class="container-fluid" id="main-header1">
					<div class="top-layer col-md-12 col-sm-12 col-xs-12">
						<!--notify-->
						<div class="mouse">
							<div id="mynotify" class="Notify">
								<h3>Messages</h3>
								<a class="viewall" href="<?php echo base_url(); ?>notification"  >View All</a>&nbsp;<a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>
								<?php 
								if(null !== $this->session->userdata('auth_user')){
									foreach($notifications as $notification){
										if($auth_user_data[0]->id==$notification->receiver_id){
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
								<h3>Notification</h3>
								&nbsp;<a href="javascript:void(0)" class="closebtn" onclick="closeNotification_alert()">&times;</a>
								<?php 
								if(null !== $this->session->userdata('auth_user')){
									//echo '<pre>';print_r($notifications_alert); echo '</pre>';
									foreach($notifications_alert as $notification){

										if($auth_user_data[0]->id==$notification->receiver_id || $auth_user_data[0]->id==$notification->sender_id){
											$sender=$this->action->select("users", array("id"=>$notification->sender_id));	
											if(count($sender)>0){
												if($notification->msg_read=="0" && $notification->only_admin=="0"){
												?>
												<div class="alert alert-success"> 
													<?php echo $notification->message; ?>
												</div>
												<?php 
												}
											}
										}
									}
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
									<div class="menutog">
										<div id="mySidenav" class="sidenav">
											<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
											<a class="text" href="<?php echo base_url(); ?>">
												<i class="fa fa-home" aria-hidden="true"></i>
												Home								
											</a>
											<a class="text" href="<?php echo base_url(); ?>about">
												About us								
											</a>
											<a class="text" href="<?php echo base_url(); ?>faq">
												Faq								
											</a>
											<a class="text" href="<?php echo base_url(); ?>help">
												Help
											</a>
											<?php if(null !== $this->session->userdata('auth_user')){ ?>
												<a class="text" href="<?php echo base_url(); ?>account">
													<i class="fa fa-user" aria-hidden="true"></i>
													Profile
												</a>
												<a class="text" href="<?php echo base_url(); ?>logout" onclick="signOut();">
													<i class="fa fa-sign-out" aria-hidden="true"></i>
													Logout
												</a>
											<?php } else { ?>
												<a class="text" href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal">
													<i class="fa fa-sign-in" aria-hidden="true"></i>
													Login
												</a>
											<?php } ?>
											<div class="sidenav_bar">
												<div class="footer-inners laster">
													<h4>Information</h4>
													<ul>
														<li>
															<a href="<?php echo base_url(); ?>legal-stuff">
																Legal Stuff
																<i class="fa fa-angle-right" aria-hidden="true"></i>
															</a>
														</li>
														<li>
															<a href="<?php echo base_url(); ?>privacy-policy">
																Privacy Policy
																<i class="fa fa-angle-right" aria-hidden="true"></i>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div id="main">
										   <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
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
											<ul class="nav navbar-nav">
												<li class="active">
													<a href="<?php echo base_url(); ?>buy" onclick="return openSearch()">
														<i class="fa fa-search" aria-hidden="true"></i>
														<span>Buy</span>
													</a>
												</li>
												<li class="">
													<?php if(null !== $this->session->userdata('auth_user')){ ?>
													<a href="<?php echo base_url(); ?>sell">
													<?php }else{ ?>
													 <a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal">
													<?php } ?>
														<i class="fa fa-tag" aria-hidden="true"></i>
														<span>Sell</span>
													</a>
												</li>
												<?php if(null !== $this->session->userdata('auth_user')){ ?>
													<li class="">
														<!-- onclick="return openNotification()" -->
														<a href="<?php echo base_url(); ?>chat_mobile" >
															<i class="fa fa-envelope-o" aria-hidden="true"></i><span class="<?php echo $notify; ?>">Messages</span>
														</a>
													</li> 
												<?php } ?>
												<li class="">
													<?php if(null !== $this->session->userdata('auth_user')){ ?>
													<a href="<?php echo base_url(); ?>concierge">
													<?php }else{ ?>
													 <a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal">
													<?php } ?>
													
														<i class="fa fa-eye" aria-hidden="true"></i>
														<span>Concierge</span>
													</a>
												</li>
												<li class="">
													<input type="hidden" id="cart_count" value="<?php echo $cart_item_count; ?>"/>
													<a class="mini_cart_data" href="<?php echo base_url(); ?>cart">
														<i class="fa fa-shopping-basket" aria-hidden="true"></i>
														<span>Basket(<?php echo $cart_item_count; ?>)</span>
													</a>
												</li>

												<?php if(null !== $this->session->userdata('auth_user')){ ?>
													<li class="">
														<a href="<?php echo base_url(); ?>notification" onclick="return openNotification_alert()">
															<i class="fa fa-bell" aria-hidden="true"></i><span class="<?php echo $notify_alert; ?>">Notification</span>
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
		</header>
		<!---------------------------------header-section-end-------------------------->
		<div class="slack">