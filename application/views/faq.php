<?php $this->load->view('includes/front/front_header'); ?>
<div class="container">
	<div class="row">
		<?php if(empty($faqs)){ ?>
			<div class='empty_result'>
			    <img src='<?php echo base_url(); ?>themes/front/images/packet.png' />
			    <h2>Result is empty!</h2>
			</div>
		<?php } else { ?>
			<div id="accordion">
			  <?php foreach($faqs as $faq){ ?>
				<h3><?php echo $faq->question; ?></h3>
				<div>
				  <p><?php echo $faq->answer; ?></p>
				</div>
			  <?php } ?>
			</div>
		<?php } ?>
	</div>
</div>
<?php $this->load->view('includes/front/front_footer'); ?>
