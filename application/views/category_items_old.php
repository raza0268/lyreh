<?php $this->load->view('includes/front/front_header'); 
error_reporting(0);
?>

<?php 
foreach($users as $user){
 if($_SESSION['auth_user'][0]->id == $item->item_user_id){ 
	$user_name[$user->id]=$user->username;
 }else{
	$user_name[$user->id]=$user->username;
 }
  $user_address[$user->id]=$user->address;  
  $online_status[$user->id]=$user->online_status;  
  $last_online[$user->id]=$user->last_online_at;
}
$offer_count=@count(unserialize($auth_user_data[0]->offer_data));
?>

<style>
.product-parts .fa {
    color: #d99f6f;
}
.hovermake{
	padding: 5px 20px 5px 20px !important; 
	text-decoration: none !important;

}
.hovermake:hover{
	background-color: gray;
}

.buy{
	background-color: gray !important; 
	margin-left:10px !important;  padding: 5px 10px 5px 10px !important; text-decoration: none !important;
}
.buy:hover{
	background-color: #d99f6f !important;
}
.hoverheart:hover{
	color:#d99f6f !important;
}
.hoverofusername:hover{
	color:#d99f6f !important;	
}
.widthoftext{
	width: 25%;
}
.imagemainhover{
	display: none;
}

.hoveroflink:hover{
  color:#d99f6f !important;
  text-decoration: none;
}

</style>
<div class="container home-page total">
	<?php if(empty($item_results)){ ?>
	    <div class='empty_result'>
		    <img src='<?php echo base_url(); ?>themes/front/images/packet.png' />
		    <h2>Result is empty!</h2>
		</div>
	<?php } else { ?>
		<div id="btnContainer">
			<button class="btn active" onclick="listView()"><i class="fa fa-bars"></i> </button> 
			<button class="btn" onclick="gridView()"><i class="fa fa-th-large"></i></button>
		</div>
	<?php } ?>
   
    <div class="row list_view_content" id="list_grid" style="justify-content: center;">
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
					return "2 weeks ago";
				}elseif($diff>21 && $diff<=30){
					return "3 weeks ago";
				}elseif($diff>30 && $diff<=60){
					return "1 month ago";
				}elseif($diff>60 && $diff<=90){
					return "2 months ago";
				}elseif($diff>90 && $diff<=120){
					return "3 months ago";
				}elseif($diff>120 && $diff<=150){
					return "4 months ago";
				}elseif($diff>150 && $diff<=180){
					return "5 months ago";
				}elseif($diff>180 && $diff<=360){
					return "5 months ago";
				}elseif($diff>360 ){
					return "1 year ago";
				}
			} 
		}
	}
	echo '<pre>';
	//print_r( unserialize($item_results[2]->like_user));
	echo '</pre>';
	foreach($item_results as $item){
		if($item->item_status==1){
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
		  <div class="column" style="width: 100%;">
		  	<div class="" style="float: left; width: 36%; display: inline">&nbsp;
		  	</div>
			<div class="pro-name" style="display: inline;">
			<?php 
			if($_SESSION['auth_user'][0]->id == $item->item_user_id){
				?>
			<a href="<?php echo base_url()."user/".$item->item_user_id; ?>">
			<?php }else{ ?>
			<a class="right-name" href="<?php echo base_url(); ?>userlisting/<?php echo $item->item_user_id; ?>">
			<?php } ?>
			<?php //if(isset($_SESSION['auth_user'][0]->id) && !empty($payment)){?>
			  <span class="icon-img" >
				<i class="fa fa-user" aria-hidden="true"></i>
			  </span>
			  	<?php 
					if($_SESSION['auth_user'][0]->id == $item->item_user_id){
				?>
				<a class="right-name" href="<?php echo base_url()."user/".$item->item_user_id; ?>">
			  <?php }else{ ?>
				<a class="right-name hoverofusername"  href="<?php echo base_url(); ?>userlisting/<?php echo $item->item_user_id; ?>" >
				<?php } ?>
				
				<?php echo $user_name[$item->item_user_id]; ?>
					<?php if($_SESSION['auth_user'][0]->id == $item->item_user_id){ ?>
				<span><?php echo $user_address[$item->item_user_id]; ?></span>		
					<?php } ?><br />
				<?php 
					
					//if(getTheDay($last_online[$item->item_user_id]) == 'Today'){
						//echo "Online"; 
					//}else{				
					//	echo "Last Seen: ".getTheDay($last_online[$item->item_user_id]);		
					//}	
						
							
				?>
				<?php //} ?>
			  </a>
			</div>
			<center>
			<div class="iamge123" >
			 	
				<?php 
				  if(!empty($auth_user_data)){
					$like_items=unserialize($auth_user_data[0]->like_item);
					
					?>
				
					<a title="<?php echo count($like_items); ?> Likes" href="javascript:like(<?php echo $item->id; ?>)" class="like_item_<?php echo $item->id; ?> hoverheart" style="    width: 26px;display: block;position: absolute;margin-left: 230px;margin-top: 15px;background: none;color: black;float: right;">
					  <?php if(@in_array($item->id , $like_items)){ ?>
						<i class="fa fa-heart" aria-hidden="true" style="font-size: 22px;"></i>
					  <?php } else { ?>
						<i class="fa fa-heart-o" aria-hidden="true" style="font-size: 22px;"></i>
					  <?php } ?>
					</a>
					<?php 
				  }
				?>
			 <?php 
			  if( $this->session->userdata('auth_user')){
				  ?>
				   <a href="<?php echo base_url()."item/".$item->slug; ?>" style="background: none; margin-left: 0px; padding: 0;"> 
				  <?php }else{ ?>
				    <a href="javascript:void(0)" style="background: none;" data-toggle="modal" data-target="#login-signup-modal">
				  <?php } ?>	
				   <?php if(!empty(unserialize($item->item_image)[0])){
						$path = base_url()."uploads/item/".unserialize($item->item_image)[0];	
					}else{
						$path = base_url()."themes/front/images/no-product.jpg";	
					}
					?>

				<?php if(!empty(unserialize($item->item_image)[1])){
						$pathhover = base_url()."uploads/item/".unserialize($item->item_image)[1];	
					}else{
						$pathhover = '';
					
					}
				?>
				<div <?php if(!empty($pathhover)){ ?> onmouseover="showhoverimg(this)" onmouseout="removerhoverimage(this)" <?php }?>>
					<img style="width: 272px; height: 280px;" class="imagemain"  src="<?php echo $path; ?>" alt=""/>
					<?php if(!empty($pathhover)){ ?>
					<img style="width: 272px; height: 280px;"  class="imagemainhover"   src="<?php echo $pathhover; ?>" alt=""/>
					<?php }?>
				</div>
			  </a>


			  </div>
			</center>
			  <center><br/>
			  	<div class="">
					<?php if(null !== $this->session->userdata('auth_user')){ if(!empty($auth_user_data) && $offer_count<100){ ?>
						<a style="margin-left: 0px !important;" href="javascript:makeOffer(<?php echo $item->id; ?>);" class="hovermake" style="">
						  Make an offer
						</a>
					  <?php }} ?>
					  <?php 
					  if(null !== $this->session->userdata('auth_user')){
					  ?>
					  <a href="<?php echo base_url()."item/".$item->slug; ?>" class="buy" > Buy</a>
					  <?php }else{ ?>
					  <a  href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal" class="buy"> Buy</a>
					  <?php } ?>
					  <a  href="javascript:void(0)"  onclick="openMessenger(<?php echo $item->item_user_id; ?>)" class="add-to-cart buy" style="padding: 5px 20px 5px 20px;">
                            Chat
                    </a>
				</div>
				<br/>
				<div  class="changewidth widthoftext">
					 <a  href="<?php echo base_url()."item/".$item->slug; ?>" style="background: none; color:black; text-decoration: none; margin-left: 0px; padding: 0;"> 
					  <b class="hoveroflink"><?php if(strlen($item->item_name)>30){ echo substr($item->item_name, 0, 30).'...'; }else{ echo $item->item_name; } ?></b><br/>
					  	<?php if(strlen($item->description)>300){ echo substr($item->description, 0, 300).'...'; }else{ echo $item->description; } ?><br/>
					  	<?php echo getTheDay($item->created_at); ?>
					  	<br/>
					  </a>
			  	</div>
			  <div class=" <?php echo $offer_status; ?>">
			  	<b>
				  <?php echo CURRENCY.$item->price; ?>
				  <?php if($offer_status=="approve"){ ?>
					<?php echo CURRENCY.$offer['offer_price']; ?>
				 <?php } ?>
				</b>
				</div><br/>
			
				
				</center>

			
			
			

		  </div>
		<?php 
		}
	}
	?>

    </div>
    
</div>

<?php $this->load->view('includes/front/front_footer'); ?>