<?php $this->load->view('includes/front/front_header'); ?>
<div class="about12">
	<div class="main-back">
		<div class="container">
			<div class="main-about">
				<div class="paragrap">
					<h2><?php echo $content[0]->title; ?></h2>
					<div>
						<p><?php echo $content[0]->content; ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('includes/front/front_footer'); ?>      