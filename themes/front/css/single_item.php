<?php 
$this->load->view('includes/front/front_header'); 
$auth_user=$this->session->userdata('auth_user');
foreach($users as $user){
  $usr[$user->id]=$user->first_name." ".$user->last_name;
}
?>
<div class="single">
	<div class="container">
		<div class="row">
			<div class="double">
				<div class="right-side col-lg-5 col-md-5 col-sm-12 col-xs-12">
					<img src="<?php echo base_url()."uploads/item/".$single_item[0]->item_image; ?>" alt=""/>
				</div>
				<div class="left-side col-lg-7 col-md-7 col-sm-12 col-xs-12">
					<h3 class="title"><?php echo $single_item[0]->item_name; ?></h3>
					<p><?php echo $single_item[0]->description; ?></p>
					<div class="price">$<?php echo $single_item[0]->price; ?></div>
					<div class="stars">
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i>
						<i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i>
					</div>
					<div class="real">
						<input type="hidden" id="item_count"value="1"/>
						<input type="hidden" id="item_id" value="<?php echo $single_item[0]->id; ?>"/>
						<a class="add-to-cart" href="javascript:addCart();"> add to cart</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<hr/>
<div class="col-lg-9 col-md-9 col-sm-8">
  <div class="singlecomleft width100">
    <h5>Feedback</h5>
    <?php foreach($item_feedback as $feedback){ ?>
      <div class="samequesbox width100">
        <div class="topqueshd width100">
          <a href="javascript:void(0);">
            <div class="imgcvrctr dataimg" data-img="https://www.alorair.com/images/profile_images/default_user.jpg"></div>
            <p><?php echo $usr[$feedback->user_id]; ?></p>
          </a>
        </div>
        <div>
          <ul class="rating_output">
            <?php 
            for($i=0; $i<5; $i++){
              if($i<$feedback->rating){
              ?>
                <li><i class="fa fa-star"></i></li>
              <?php
              }
              else{
              ?>
                <li><i class="fa fa-star-o"></i></li>
              <?php  
              } 
            }
            ?>
          </ul>
          <p><?php echo $feedback->feedback_text; ?></p>
        </div>
      </div>
    <?php } ?>

    <?php if(isset($auth_user)){ ?>
      <hr/>
      <form method="post" id="validate_form" class="feedback_form">
        <div>
          <h4>Your Feedback<span class="star">*</span></h4>
          <input type="hidden" name="item_id" value="<?php echo $single_item[0]->id; ?>">
          <input type="hidden" name="user_id" value="<?php echo @$auth_user[0]->id; ?>">
           <input type="hidden" name="rating" class="rating">
          <div class='starrr' id='star1'></div>
          <textarea class="form-control" placeholder="Write here" name="feedback_text" required></textarea>
          <div>
            <div>
              <div>
                <input type="submit" value="Post My Feedback">
              </div>
            </div>
          </div>
        </div>
      </form>
    <?php } ?>
  </div>
</div>
<style>
.width100 {
    width: 100%;
}  
</style>




<?php $this->load->view('includes/front/front_footer'); ?>      