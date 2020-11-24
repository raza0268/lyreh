<?php $this->load->view('includes/front/front_header'); ?>
<div class="container">
	<div class="row">
		<?php if(empty($faqs)){ ?>
			<div class='empty_result'>
			    <img src='<?php echo base_url(); ?>themes/front/images/packet.png' />
			    <h2>Result is empty!</h2>
			</div>
		<?php } else { ?>
			<!--<div id="accordion" class="faq2">-->
			  <?php foreach($faqs as $faq){ ?>
				<h3><?php //echo $faq->question; ?></h3>
				<div>
				  <p><?php //echo $faq->answer; ?></p>
				</div>
			  <?php } ?>
			<!--</div>-->
			
			
			
			
			
<!--Accordion wrapper-->
<div class="accordion md-accordion faq2" id="accordionEx" role="tablist" aria-multiselectable="false">
<!-- Accordion card -->
 <?php foreach($faqs as $key => $faq){ ?>
  <div class="card">
    <!-- Card header -->
    <div class="card-header" role="tab" id="headingOne1">
        <a data-toggle="collapse" class="custom-card-header collapsed" data-parent="#accordionEx" href="#collapseOne<?=$key?>" aria-expanded="true"
        aria-controls="collapseOne1">
        <h5 class="mb-0 custom-h5-colored">
          <?php echo $faq->question; ?> <i class="fa fa-custom"></i>
        </h5>
      </a>
    </div>

    <!-- Card body -->
    <div id="collapseOne<?=$key?>" class="collapse" role="tabpanel" aria-labelledby="headingOne1"
      data-parent="#accordionEx">
      <div class="card-body">
        <?php echo $faq->answer; ?>
      </div>
      
    </div>

  </div>
  <!-- Accordion card -->
   <?php } ?>

</div>
<!-- Accordion wrapper -->
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		<?php } ?>
	</div>
</div>
<?php $this->load->view('includes/front/front_footer'); ?>
