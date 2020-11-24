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

	padding: 5px !important; 

	text-decoration: none !important;



}

.hovermake:hover{

	background-color: gray;

}



.buy{

	background-color: gray; 

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

/*.widthoftext{

	width: 25%;

}*/

.imagemainhover{

	display: none;

}



.hoveroflink:hover{

  color:#d99f6f !important;

  text-decoration: none;

}









.middle {
  /*transition: .5s ease;
  position:relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -252%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
*/
position: absolute!important;
    transition: .5s ease;
    position: relative;
    top: 79%;
    left: 50%;
    transform: translate(-50%, -91%);
    -ms-transform: translate(-50%, -91%);
    text-align: center;
}



.text {

 

  color: orange;

  font-weight: 700;

  font-size: 30px;

  padding: 16px 32px;

}





@media(min-width: 320px) and (max-width: 767px){

	#btnContainer{

		display: none;

	}

	div#list_grid{

		display: flex!important;

	}

}

@media(min-width: 768px) and (max-width: 799px){

.list_view_content .hoverheart{

	right: 33%!important;

}

}

@media(min-width: 800px) and (max-width: 812px){

.list_view_content .hoverheart{

	right: 34.8%!important;

}

}

@media(min-width: 1200px){

 .list_view_content .hoverheart{

	right: 40%!important;

}

}



@media(min-width: 768px) and (max-width: 799px){

 .list_view_content .pro-name{

	right: -26%;

	position: relative;

}

}



@media(min-width: 800px) and (max-width: 812px){

 .list_view_content .pro-name{

	right: -29%;

	position: relative;

}

}



@media(min-width: 813px) and (max-width: 1199px){

 .list_view_content .pro-name{

	right: -32%;

	position: relative;

}

}



@media(min-width: 1200px) {

 .list_view_content .pro-name{

	right: -36%;

	position: relative;

}

}



</style>

<div class="container home-page total w100_md">

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

   

<div class="col-md-12 dis_grid_sm" > 







    <div class="row jus_center just_center list_view_content" id="list_grid">

    

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



	foreach($item_results as $item){

		$sold = "";

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

			if($item->quantity == 0){

				$sold = 'opacity: 0.3;';

			}else{

				$sold = "";

			}

		  ?>

		  <div class="column w272_sm" id="add_colmd4_class" style="width: 100%;">

			<div class="pro-name just_center"   style="display: inline;">

			<?php 

			if($_SESSION['auth_user'][0]->id == $item->item_user_id){

				?>

			<a href="<?php echo base_url()."user/".$item->item_user_id; ?>">

			<?php }else{ ?>

			<a class="right-name" href="<?php echo base_url(); ?>userlisting/<?php echo $item->item_user_id; ?>">

			<?php } ?>

			<?php //if(isset($_SESSION['auth_user'][0]->id) && !empty($payment)){?>

			  <!-- <span class="icon-img" > -->

			  	<?php 

			  	$usersData = "";

			  	$usersData = getUserName($item->item_user_id); 

			  	?>

			  	<img style="width: 45px;height: 45px;border-radius: 50px;border:1px solid #fff;box-shadow:0px 0px 6px 3px rgba(0,0,0,0.4);" src="<?php if(!empty($usersData)){ echo base_url("uploads/").$usersData->user_image; } ?>">

				<!-- <i class="fa fa-user" aria-hidden="true"></i> -->

			  <!-- </span> -->

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

				   <a href="<?php echo base_url()."item/".$item->slug; ?>" style="background: none; margin-left: 0px; padding: 0;margin-top: 5px;"> 

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

					<img style="width: 272px; height: 280px;<?php echo $sold; ?>" class="imagemain w100_img"  src="<?php echo $path; ?>" alt=""/>



					<?php if(!empty($pathhover)){ ?>

					<img style="width: 272px; height: 280px;<?php echo $sold; ?>"  class="imagemainhover w100_img"   src="<?php echo $pathhover; ?>" alt=""/>

					



					<?php }?>

					<?php if(!empty($sold)){ ?>

					<div class="middle">

    <div class="text">Sold</div>

  </div>

<?php } ?>

				</div>

			  </a>





			  </div>

			</center>

			  <center>

			  	<div class="mt-3 mb-3">

					<?php if(null !== $this->session->userdata('auth_user')){ if(!empty($auth_user_data) && $offer_count<100){ ?>

						<?php if(!empty($sold)){ ?>

							<a  toId = "$item->item_user_id" productSlug = "<?php echo $item->slug; ?>" style="margin-left: 0px !important;color: white;" class="hovermake btn_light_orange">

						  Make an offer

						</a>

						<?php

						}else{ ?>

						<a  toId = "$item->item_user_id" productSlug = "<?php echo $item->slug; ?>" style="margin-left: 0px !important;" href="javascript:makeOffer(<?php echo $item->id; ?>,'<?php echo $item->slug; ?>','<?php echo $item->item_user_id; ?>');" class="hovermake btn_light_orange" style="">

						  Make an offer

						</a>

					<?php } ?>



					  <?php }} ?>

					  <?php 

					  if(null !== $this->session->userdata('auth_user')){

					  ?>

					  <a href="<?php echo base_url()."item/".$item->slug; ?>" class="buy btn_gray buybtn" > Buy</a>

					  <?php }else{ ?>

					  <a  href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal" class="buy btn_gray"> Buy</a>

					  <?php } ?>

					  <?php if(empty($sold)){ ?>

					  <a  href="<?php echo base_url('chat/').$item->slug.'/'.$item->item_user_id; ?>"   class="add-to-cart buy btn_gray chatbtn" style="padding: 5px 20px 5px 20px;">

                            Chat

                    </a>

                <?php }else{ ?>

                	<a  href="#"   class="add-to-cart buy btn_gray chatbtn" style="padding: 5px 20px 5px 20px;">

                            Chat

                    </a>

                <?php } ?>

				</div>

		

				<div  class="changewidth widthoftext col-md-12 col-xs-12 widcontent">

					 <a  href="<?php echo base_url()."item/".$item->slug; ?>" style="background: none; color:black; text-decoration: none; margin-left: 0px; padding: 0;" class="widcontent"> 

					  <b class="hoveroflink"><?php if(strlen($item->item_name)>30){ echo substr($item->item_name, 0, 30).'...'; }else{ echo $item->item_name; } ?></b><br/>

					  	<p class="mb-0 wbreakp"><?php if(strlen($item->description)>1){ echo substr($item->description, 0, 40).'...'; }else{ echo $item->description; } ?></p>

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

		?>





<?php	}

	?>



    </div>

    </div>

</div>



<?php $this->load->view('includes/front/front_footer'); ?>



<script type="text/javascript">

	$(document).ready(function(){

		if(($( window ).width() <= 767)){

			$("#list_grid").removeClass("grid_view_content");

			$("#list_grid").addClass("list_view_content");	

		}else{

		

		}

		

	})

</script>