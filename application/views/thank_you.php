<?php $this->load->view('includes/front/front_header'); ?>
<style type="text/css">
	.backtostore{
		cursor: pointer !important; 
		color: white !important;
	}
	.backtostore:hover{
		background-color: #edb78a;
	}
</style>
<div class="tahnk-y">
	<img src="<?php echo base_url(); ?>themes/front/images/success.png" alt=""/>
	<h3>thank you!</h3>
	<p>Your order was successfuly completed.

	</p>
	<div class="back-btn" style="margin-bottom: 47px;">
		<a class="backtostore" onclick="return openSearch()">Back to store</a>
	</div>

<?php $this->load->view('includes/front/front_footer'); ?>  