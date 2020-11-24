s<?php $this->load->view('includes/front/front_header'); ?>
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

foreach($users as $user){
	$user_name[$user->id]=$user->first_name." ".$user->last_name;
	$user_address[$user->id]=$user->address;  $online_status[$user->id]=$user->online_status;  $last_online[$user->id]=$user->last_online_at;
}
$offer_count=@count(unserialize($auth_user_data[0]->offer_data));
?>
<div class="container home-page">
    <div id="btnContainer">
		<button class="btn active" onclick="listView()"><i class="fa fa-bars"></i> </button> 
		<button class="btn" onclick="gridView()"><i class="fa fa-th-large"></i></button>
    </div>
    <br>
    <div class="row list_view_content" id="list_grid">
    <?php if(empty($item_results)){ ?>
	    <div class='empty_result'>
		    <img src='<?php echo base_url(); ?>themes/front/images/packet.png' />
		    <h2>Result is empty!</h2>
		</div>
	<?php	
	}
	else{
		foreach($item_results as $item){
		    if(@$auth_user_data[0]->id!=$item->item_user_id){
    			$offer_status="";
    			if(!empty($auth_user_data)){
    			  $offer_data=$auth_user_data[0]->offer_data;
    			  if($offer_data!=""){
    				foreach(unserialize($offer_data) as $offer){
    				  if($offer['item_id']==$item->id){
    					if($offer['status']=="approve"){
    					  $offer_status="approve";
    					}
    				  }      
    				}
    			  }
    			}
    			?>
    			<div class="column">
    				<div class="pro-name asfafsd">
					<?php 
					if($_SESSION['auth_user'][0]->id == $item->item_user_id){
						?>
					<a href="<?php echo base_url()."user/".$item->item_user_id; ?>">
					<?php }else{ ?>
					<a class="right-name" href="<?php echo base_url(); ?>userlisting/<?php echo $item->item_user_id; ?>">
					<?php } ?>
					  <span class="icon-img" style="<?php if($online_status[$item->item_user_id]=='online'){ echo "color: green; border-color: green"; } ?>">
						<i class="fa fa-user" aria-hidden="true"></i>
					  </span>
						<?php 
							if($_SESSION['auth_user'][0]->id == $item->item_user_id){
						?>
						<a class="right-name" href="<?php echo base_url()."user/".$item->item_user_id; ?>">
					  <?php }else{ ?>
						<a class="right-name"  href="<?php echo base_url(); ?>userlisting/<?php echo $item->item_user_id; ?>">
						<?php } ?>
						<?php echo $user_name[$item->item_user_id]; ?>
							<?php if($_SESSION['auth_user'][0]->id == $item->item_user_id){ ?>
						<span><?php echo $user_address[$item->item_user_id]; ?></span>		
							<?php } ?><br />
						<?php 
							
							if(getTheDay($last_online[$item->item_user_id]) == 'Today'){
								//echo "Online"; 
							}else{				
								//echo "Last Seen: ".getTheDay($last_online[$item->item_user_id]);		
							}	
								
									
						?>
					  </a>
					</div>
    				<div class="iamge123">
    				  <?php 
					  if(null !== $this->session->userdata('auth_user')){
					  ?>
					   <a href="<?php echo base_url()."item/".$item->slug; ?>">
					  <?php }else{ ?>
						<a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal">
					  <?php } ?>
						<?php if(!empty(unserialize($item->item_image)[0])){
							$path = base_url()."uploads/item/".unserialize($item->item_image)[0];	
						}else{
							$path = base_url()."themes/front/images/no-product.jpg";	
						}
						?>
    					<img src="<?php echo $path; ?>" alt=""/>
    				  </a>
    				  <?php 
        				if(!empty($auth_user_data)){
        					$like_items=unserialize($auth_user_data[0]->like_item);
        					?>
        					<a href="javascript:like(<?php echo $item->id; ?>)" class="like_item_<?php echo $item->id; ?> grid_heart">
        					  <?php if(@in_array($item->id, $like_items)){ ?>
        						<i class="fa fa-heart" aria-hidden="true"></i>
        					  <?php } else { ?>
        						<i class="fa fa-heart-o" aria-hidden="true"></i>
        					  <?php } ?>
        					</a>
        					<?php 
        				}
        			  ?>
    				</div>
    				<div class="product-content">
    				  <div class="product-parts">
    					<?php 
    					  if(!empty($auth_user_data)){
    						$like_items=unserialize($auth_user_data[0]->like_item);
    						?>
    						<a href="javascript:like(<?php echo $item->id; ?>)" class="like_item_<?php echo $item->id; ?>">
    						  <?php if(@in_array($item->id, $like_items)){ ?>
    							<i class="fa fa-heart" aria-hidden="true"></i>
    						  <?php } else { ?>
    							<i class="fa fa-heart-o" aria-hidden="true"></i>
    						  <?php } ?>
    						</a>
    						<?php 
    					  }
    					?>
    					<?php if(!empty($auth_user_data)){ ?>
    					  <!--a href="javascript:void(0);" onclick="openMessenger(<?php echo $item->item_user_id; ?>)">
    						<i class="fa fa-comment-o" aria-hidden="true"></i>
    					  </a-->
    					<?php } ?>
    					<div class="buttons-both">
    					  <?php if(!empty($auth_user_data)){ ?>
    						<a href="javascript:followUser(<?php echo $item->item_user_id; ?>);" class="follow_user follow_1">
    							<?php
    							$follow_user=unserialize($auth_user_data[0]->follow_user);
    							if(@in_array($item->item_user_id, $follow_user)){
    								echo "Followed";
    							}
    							else{
    								echo "Follow";
    							}
    							?>
    						</a>
    					  <?php } ?>	
    					  <?php if(!empty($auth_user_data) && $offer_count<3){ ?>
    						<a href="javascript:makeOffer(<?php echo $item->id; ?>);" class="make_an_offer">
    						  Make an offer
    						</a>
    					  <?php } ?>
    					  <a class="add-to-cart" href="<?php echo base_url()."item/".$item->slug; ?>"> Buy</a>
    					</div>
    					<div class="price <?php echo $offer_status; ?>">
    					  <p><?php echo CURRENCY.$item->price; ?></p>
    					  <?php if($offer_status=="approve"){ ?>
    						<p><?php echo CURRENCY.$offer['offer_price']; ?></p>
    					  <?php } ?>
    					</div>
    					<?php 
    					  if(!empty($auth_user_data)){
    						$bookmark_items=unserialize($auth_user_data[0]->bookmark_item);
    						?>
    						<!--a href="javascript:bookmark(<?php echo $item->id; ?>)" class="bookmark_item_<?php echo $item->id; ?>">
    						  <?php if(@in_array($item->id, $bookmark_items)){ ?>
    							<i class="fa fa-bookmark" aria-hidden="true"></i>
    						  <?php } else { ?>
    							<i class="fa fa-bookmark-o" aria-hidden="true"></i>
    						  <?php } ?>
    						</a-->
    						<?php 
    					  }
    					?>
    				  </div> 
    				  <?php if($item->like_user!="" && !empty(unserialize($item->like_user))){ ?>
    				    <div class="anoth-name">
    				        <p>
    				            <strong>
    				                <?php 
    				                    $user_id=unserialize($item->like_user)[0];
    				                    $user_data=$this->action->select("users", array("id"=>$user_id));
    				                    echo $user_data[0]->username;
    				                ?>
    				            </strong>
        			            <?php if(count(unserialize($item->like_user))>1){ ?> 
        			                and <strong><?php echo count(unserialize($item->like_user))-1; ?> others</strong>
        			            <?php } ?> like this
        			        </p>
    				    </div>
    				  <?php } ?>
					  <p><b><?php if(strlen($item->item_name)>30){ echo substr($item->item_name, 0, 30).'...'; }else{ echo $item->item_name; } ?></b></p>
					  <p><?php if(strlen($item->description)>300){ echo substr($item->description, 0, 300).'...'; }else{ echo $item->description; } ?></p>
    				  <p><?php echo substr($item->description, 0, 300); ?></p>
    				  <p><?php echo date('F j, Y',strtotime($item->created_at)); ?></p>
    				</div>
    			</div>
    			<?php 
		    }
		}
	} 
	?>
	<p class="pagination" style="display:none;"><center><?php //echo $links; ?></center></p> 
    </div>
</div>


<?php $this->load->view('includes/front/front_footer'); ?>