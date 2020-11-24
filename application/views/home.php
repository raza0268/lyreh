<?php $this->load->view('includes/front/front_header'); ?>
<?php 
			foreach($settings as $setting){
				$meta_key=$setting->meta_key;
				$$meta_key=$setting->meta_value;
			}
?>
<!---------------------------------meet-section-------------------------->
<!-- Place somewhere in the <body> of your page -->
<!--
<div class="flexslider">
	<ul class="slides">
		<li>
			<img src="<?php echo base_url(); ?>themes/front/images/banner-winter2019 (1).jpg" />
		</li>
		<li>
			<img src="<?php echo base_url(); ?>themes/front/images/banner-winter2019 (1).jpg" />
		</li>
		<li>
			<img src="<?php echo base_url(); ?>themes/front/images/banner-winter2019 (1).jpg" />
		</li>
		<li>
			<img src="<?php echo base_url(); ?>themes/front/images/banner-winter2019 (1).jpg" />
		</li>
	</ul>
</div>
-->
<div class="mainimage">
	<div class="home-banner">

		<img width="1200" height="700" class="h-auto-sm" src="<?php echo base_url(); ?>uploads/homepage/<?php echo $home_banner_image; ?>"/>
	</div>
	<div class="titleline">
	     <span>
	    	<?php if(null !== $this->session->userdata('auth_user')){ ?>
	    	<a href="<?php echo base_url(); ?>concierge"><?php echo $home_banner_text; ?></a>
	    <?php }else{ ?>
	    	<a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal" id="conc-img"><?php echo $home_banner_text; ?></a>
	    <?php } ?>
	    </span>
		<!--<span>the orange - the new home of reccommerce and your answer to fashstainability</span> -->
	</div>
</div>


<section class="meet-sections">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6">
				<div class="img-ssection">
					<div class="text bottom-center">
						<a href="<?php echo base_url(); ?>sell">
							<img width="600" height="700" class="h-auto-sm" src="<?php echo base_url(); ?>uploads/homepage/<?php echo $home_bottom_left_image; ?>"/>
							<span class="banner-button">
								<button  class="btn btn-default btn-promo-banner">Sell</button>
							</span>
						</a>   
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="img-ssection">
					<div class="text bottom-center"> 
						<a  onclick="return openSearch()">
							<img width="600" height="700" class="h-auto-sm" src="<?php echo base_url(); ?>uploads/homepage/<?php echo $home_bottom_right_image; ?>"/>
							<span class="banner-button">
								<button  class="btn btn-default btn-promo-banner">Buy</button>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!---------------------------------meet-section-end-------------------------->
<script>
$(document).ready(function(){
	<?php if($this->session->flashdata('success')){ ?>
		swal("Success", "<?php echo $this->session->flashdata('success'); ?>", "success");
	<?php } ?>
	<?php if($this->session->flashdata('error')){ ?>
		swal("Error", "<?php echo $this->session->flashdata('error'); ?>", "error");
	<?php } ?>
});
</script>


<?php $this->load->view('includes/front/front_footer'); ?>      