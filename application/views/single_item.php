<?php 
function getTheDay($date){
		$curr_date=strtotime(date("Y-m-d H:i:s"));
		$the_date=strtotime($date);
		$diff=floor(($curr_date-$the_date)/(60*60*24));
		switch($diff){
			case 0:
				return "Today";
				break;
			case 1:
				return "Yesterday";
				break;
			default:
			
			if($diff>3){
				if($diff>3 && $diff<=7){
					return "This week";
				}elseif($diff>7 && $diff<=14){
					return "1 week ago";
				}elseif($diff>14 && $diff<=21){
					return "2 week ago";
				}elseif($diff>21 && $diff<=30){
					return "3 week ago";
				}elseif($diff>30 && $diff<=60){
					return "1 month ago";
				}elseif($diff>60 && $diff<=90){
					return "2 month ago";
				}elseif($diff>90 && $diff<=120){
					return "3 month ago";
				}elseif($diff>120 && $diff<=150){
					return "4 month ago";
				}elseif($diff>150 && $diff<=180){
					return "5 month ago";
				}elseif($diff>180 && $diff<=360){
					return "5 month ago";
				}elseif($diff>360 ){
					return "1 years ago";
				}
			} 
		}
	}
$this->load->view('includes/front/front_header'); 
$auth_user=$this->session->userdata('auth_user');
foreach($users as $user){
	$usr[$user->id]=$user->first_name." ".$user->last_name;
	$usr_img[$user->id]=$user->user_image;
	$created[$user->id]=$user->created_at;
	$user_name[$user->id]=$user->username;
	$user_address[$user->id]=$user->address;  
	$online_status[$user->id]=$user->online_status;  
	$last_online[$user->id]=$user->last_online_at;
}
?>
<style type="text/css">
.buy{
	background-color: gray !important; 
	color:white !important; 
	border: none !important; 
	padding: 7 10 7 10; 
	cursor: pointer !important; 
	text-decoration:none !important; 
	border-radius: 5px !important;
}
.buy:hover{
	background-color: #d99f6f !important;
}
.chatlinkhover:hover{
	color: #d99f6f !important;
}

.hoverofusername:hover{
	color:#d99f6f !important;	
}

</style>

<div class="single" style="background-color: white !important;"> 
	<div class="container">
		<div class="row">
			<div class=" col-lg-5 col-md-5 col-sm-12 col-xs-12 plr0md">
				
				<div>
				    <?php foreach(unserialize($single_item[0]->item_image) as $img){ ?>    
                        <div><img width="100%" class="w_100_h_auto" height="350" src="<?php echo base_url()."uploads/item/".$img; ?>"/></div>
                    <?php } ?>
                </div>
			</div>
			<div class="left-side col-lg-7 col-md-7 col-sm-12 col-xs-12 ">
			
			
				
				<div class="pro-name left_div pointer_none" style="display:block;margin-bottom:2%;"><a class="right-name" style="padding-left: 0px;" href="<?php echo base_url()."userlisting/".$single_item[0]->item_user_id; ?>">
    				  <span class="icon-img border0">
    					<!--<i class="fa fa-user" aria-hidden="true"></i>-->
    					<?php $usersName = getUserName($single_item[0]->item_user_id); ?>
    					<img style="width: 45px;height: 45px;border-radius: 50px;border:1px solid #fff;box-shadow:0px 0px 6px 3px rgba(0,0,0,0.4);" src="<?php echo base_url('uploads/').$usersName->user_image; ?>">
    				  </span>
    				<?php if(!empty($_GET['productView'])){ 
    				    $anchorTag = "#";
    				}else{
    				    $anchorTag = base_url()."userlisting/".$single_item[0]->item_user_id;
    				}
    				
    				?>
    				  <a class="right-name hoverofusername" href="<?php echo $anchorTag; ?>">
    					<?php echo $user_name[$single_item[0]->item_user_id]; ?>
    					<span><?php echo $user_address[$single_item[0]->item_user_id]; ?></span>			
    					<?php 			
    			// 			if(getTheDay($last_online[$single_item[0]->item_user_id]) == 'Today'){
							// 	//echo "Online"; 
							// }else{				
							// 	//echo "Last Seen: ".getTheDay($last_online[$single_item[0]->item_user_id]);		
							// }			
    					?>
    				  </a>
    				</div>
					
					<h3 class="title font22_sm"><?php echo $single_item[0]->item_name; ?></h3>	
				<p class="chatwrap3"><?php echo $single_item[0]->description; ?></p>
				<h3 class="title"><?php echo CURRENCY.$single_item[0]->price; ?></h3>
				

				<div class="real">
					<input type="hidden" id="item_count"value="1"/>
					<input type="hidden" id="item_id" value="<?php echo $single_item[0]->id; ?>"/>
					<?php if($single_item[0]->quantity != 0){ ?>
					<?php if(empty($_GET['productView'])){ ?>
					<a class="add-to-cart" style="margin-right:9px" href="javascript:addCart('<?php echo $item_cart; ?>');"> add to cart</a>
					<a  toId = "<?php echo $single_item[0]->item_user_id; ?>" productSlug = "<?php echo $single_item[0]->slug; ?>" style="margin-left: 0px !important;margin-right: 13px;" href="javascript:makeOffer(<?php echo $single_item[0]->id; ?>,'<?php echo $single_item[0]->slug; ?>','<?php echo $single_item[0]->item_user_id; ?>');" class="add-to-cart buy btn_gray chatbtn">
						  Make an offer
						</a>
					<?php } ?>
					<?php }else{ ?>
						<!-- <a class="add-to-cart" style="margin-right:9px" href="#"> Sold</a> -->
					<?php } ?>
					<!-- && $auth_user_data[0]->chat_status == 1 -->
					<?php if($auth_user_data[0]->chat_status == 0){?>
						 <!--<a  title="Blocked by admin" style="color: red">-->
							<!--	<i class="fa fa-comment-o" aria-hidden="true"></i>-->
						 <!--</a>-->
					<?php } ?>
					<?php if(!empty($auth_user_data) && $auth_user_data[0]->chat_status == 1){ ?>
					  <!-- <a  href="javascript:void(0);" onclick="openMessenger(<?php echo $single_item[0]->item_user_id; ?>)" >
						<i class="fa fa-comment-o" aria-hidden="true"></i>
					  </a> -->
 <?php 
					  $dataUserId = getSecondUserId($single_item[0]->slug, $single_item[0]->item_user_id); 
					  // print_r($single_item[0]->item_user_id);exit; 
					  if(empty($dataUserId)){
					  	?>
					  	<?php if($single_item[0]->quantity != 0){ ?>
					  	<?php if(empty($_GET['productView'])){ ?>
					   <a href="<?php echo base_url('chat/').$single_item[0]->slug.'/'.$single_item[0]->item_user_id; ?>" style="color:black" class="btn_w_100 orange_btn_black_hover" >
                            Chat
                         </a>
                         <?php } ?>
                     <?php }else{ ?>
                     	<!-- <a href="#" style="color:black" class="btn_w_100 orange_btn_black_hover" > -->
                           <!--  Chat
                         </a> -->
                     <?php
                 		}
                 }else{ 

                 	if($this->session->userdata('auth_user')[0]->id == $dataUserId->fromId){
                 	?>
                 	<?php if($single_item[0]->quantity != 0){ ?>
                 	<?php if(empty($_GET['productView'])){ ?>
                 	<a href="<?php echo base_url('chat/').$single_item[0]->slug.'/'.$dataUserId->toId; ?>" style="color:black" class="btn_w_100 orange_btn_black_hover" >
                            Chat
                         </a>
                         <?php } ?>
                         <?php }else{ ?>
                         	<!-- <a href="#" style="color:black" class="btn_w_100 orange_btn_black_hover" > -->
                           <!--  Chat
                         </a> -->
                         <?php } ?>
                 	<?php 
                 	}else{ ?>

                 		<?php if($single_item[0]->quantity != 0){ ?>
                 		<?php if(empty($_GET['productView'])){ ?>
                 	<a href="<?php echo base_url('chat/').$single_item[0]->slug.'/'.$dataUserId->toId; ?>" style="color:black" class="btn_w_100 orange_btn_black_hover" >
                            Chat
                         </a>
                         <?php } ?>
                         <?php }else{ ?>
                         	<!-- <a href="#" style="color:black" class="btn_w_100 orange_btn_black_hover" >
                            Chat
                         </a> -->
                         <?php } ?>
                 <?php 	}
				} ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- <hr/>
<div class="single-feed" style="margin-bottom:0px !important">
	<div class="container">		
		<div class="row">
			<div class="singlecomleft width100">
				<?php if(!empty($item_feedback)){ ?>
				<h5>Feedback</h5>
				<?php } ?>
				<?php foreach($item_feedback as $feedback){ ?>
					<div class="feedback">
						<div class="container">
							<div class="row">
								<div class="right-side1 col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="first12">
									<div class="feedimg">
										<img src="<?php echo base_url()."uploads/".$usr_img[$feedback->user_id]; ?>" alt=""/>
										</div>
										<div class="dates">
											<h6> <?php echo getTheDay($created[$feedback->user_id]); ?></h6>
											<p><?php echo $usr[$feedback->user_id]; ?></p>
										</div>
									</div>
								</div>
								<div class="glass col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<div class="star">
									<?php 
										for($i=0; $i<5; $i++){
										  if($i<$feedback->rating){
										  ?>
											<i class="fa fa-star" style="color: red; 
											<?php if($i == 0){ echo 'padding-left: 0px;'; } ?>"></i>
										  <?php
										  }
										  else{
										  ?>
											<i class="fa fa-star" style="color: gray; 
											<?php if($i == 0){ echo 'padding-left: 0px;'; } ?>"></i>
										  <?php  
										  } 
										}
									?>
									</div>
									<p><?php echo $feedback->feedback_text; ?></p>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<style type="text/css">
					.starrr a{
						color: red !important;
					}
				</style>
				<?php 
				$counttotal = alread_rating_added($auth_user[0]->id, $single_item[0]->id);	
				$alreadordered = alread_orderd($auth_user[0]->id,$single_item[0]->item_name);	
				if(isset($auth_user) && $counttotal[0]->totalcount <= 0 ){ 
					if($alreadordered == 'true'){
					?>
					<hr/>
					<form method="post" id="validate_form" class="feedback_form">
						<div>
							<h4>Your Feedback<span class="star">*</span></h4>
							<input type="hidden" name="item_id" value="<?php echo $single_item[0]->id; ?>">
							<input type="hidden" name="user_id" value="<?php echo @$auth_user[0]->id; ?>">
							<input type="hidden" name="rating" class="rating" style="color:gray">
							<div class='starrr' id='star1' ></div>
							<textarea class="form-control" placeholder="Write here" name="feedback_text" required></textarea>
							<div>
								<div>
									<div>
										<input type="submit" style="cursor: hand" value="Post My Feedback"/>
									</div>
								</div>
							</div>
						</div>
					</form>
				<?php } } ?>
			</div>
		</div>    
	</div>  
</div>
<div>
	<br/>
<center><button class="btn" onclick="return openSearch()" style="background-color: black; color:white">SEE MORE PRODUCTS</button></center>
<br/><br/>
</div> -->
<style type="text/css">
	footer{
		margin-top: 0px !important;
	}
</style>
<?php $this->load->view('includes/front/front_footer'); ?>      
<script>
$('.bxslider').bxSlider({
  auto: true,
  autoControls: true,
  stopAutoOnClick: true,
  pager: true,
  slideWidth: 600
});    
</script>