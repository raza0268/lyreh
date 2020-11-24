<?php $this->load->view('includes/front/front_header'); ?>

<div class="container">

	<div class="row">
		<?php 
			if(!empty($channels)){
				
			foreach($channels as $channels){ ?>
							<div class="first">
						
					       <div class="chat-boxes">
							<div class="text-area" style="text-transform: uppercase;">
								<a <?php if($auth_user_data[0]->chat_status == 1){?> href="javascript:openMessenger(<?php echo $channels->receiver_id; ?>)" <?php }?> >
									
									<?php 
									$userdata1 = userinfo($channels->sender_id); 
									echo $userdata1->first_name.' '.$userdata1->last_name;
									echo '<br/><p>Send a messages to </p>';
									$userdata = userinfo($channels->receiver_id); 
									echo $userdata->first_name.' '.$userdata->last_name; 
									?>



									<?php  ?>
									<!-- <p><?php echo $userdata->email; ?></p> -->
									
									
								</a>
							</div></div>
						</div>
					<?php
				}
		}else{
		?>
		<div class="first">
					No notification found.
				</div>
		<?php } ?>
		

	</div>

</div>
</div>
<?php $this->load->view('includes/front/front_footer'); ?>

