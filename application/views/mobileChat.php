 <?php if(!empty($chatData)){ 
     
     $totalMessage = count($chatData);
                        ?>
                        <input type="hidden" class="totalMessages" value="<?php if(!empty($totalMessage)){ echo $totalMessage; } ?>">
                        <?php
     
                        foreach ($chatData as $chat) {
                           if($this->session->userdata('auth_user')[0]->id == $chat->fromId){ 
                     ?>	

	<div class="col-12 mt-2 text-right" >
		<p class="mb-2 text-right">
			<?php if (strpos($chat->message, 'offer-sent') !== false) { ?>
                                            <?php $offerData = getOfferData($chat->message); ?>
                                            <h5>Offer Price : €<?php if(!empty($offerData->offerPrice)){ echo $offerData->offerPrice; } ?></h5> 
                                            <p><?php  
                                            if(!empty($offerData->offerMessage)){
                                                echo $offerData->offerMessage;
                                            }

                                            ?>
                                            </p>
                                            <p>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <?php if($offerData->offerStatus == "pending"){ ?>

                                                    <?php if($this->session->userdata('auth_user')[0]->id == $offerData->toId && $offerData->offerStatus != "accepted"){ ?>
  <button style="background-color: #DE9252;border-color: #DE9252;margin-right: 7px;" type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-warning accept">Accept</button>
<?php  } ?>
  <button style="background-color: #DE9252;border-color: #DE9252;margin-right: 7px;" type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-warning decline">Decline</button>
<?php }else if($offerData->offerStatus == "accepted"){ ?>
<button style="background-color: #DE9252;border-color: #DE9252;" type="button" class="btn btn-warning accept" disabled="disabled">Accepted</button>
<?php
}else{ ?>

<button style="background-color: #DE9252;border-color: #DE9252;" type="button" class="btn btn-warning decline" disabled="disabled">Declined</button>

<?php }

 ?>
</div>
                                            </p>
                                              
                                   <?php }else{ 
                                ?>

			<p class="font13 text-white br10 chat_text_pd bg5218fa chatwrap" style="background: #4038bd;"><?php echo parse_smileys($chat->message,base_url().'smileys'); ?></p>
		<?php } ?>
		</p>
		<p class="mb-1 text-right"><span class="font11 font_gray"><?php echo time_elapsed_string($chat->time); ?></span></p>
	</div>
<?php }else{ ?>
		<div class="col-12 mt-2 text-left" >
		<p class="mb-2 text-left">
			<?php if (strpos($chat->message, 'offer-sent') !== false) { ?>
                                            <?php $offerData = getOfferData($chat->message); ?>
                                            <h5>Offer Price : €<?php if(!empty($offerData->offerPrice)){ echo $offerData->offerPrice; } ?></h5> 
                                            <p><?php  
                                            if(!empty($offerData->offerMessage)){
                                                echo $offerData->offerMessage;
                                            }

                                            ?>
                                            </p>
                                            <p>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <?php if($offerData->offerStatus == "pending"){ ?>

                                                    <?php if($this->session->userdata('auth_user')[0]->id == $offerData->toId && $offerData->offerStatus != "accepted"){ ?>
  <button style="background-color: #DE9252;border-color: #DE9252;margin-right: 7px;" type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-warning accept">Accept</button>
<?php  } ?>
  <button style="background-color: #DE9252;border-color: #DE9252;margin-right: 7px;" type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-warning decline">Decline</button>
<?php }else if($offerData->offerStatus == "accepted"){ ?>
<button style="background-color: #DE9252;border-color: #DE9252;" type="button" class="btn btn-warning accept" disabled="disabled">Accepted</button>
<?php
}else{ ?>

<button style="background-color: #DE9252;border-color: #DE9252;" type="button" class="btn btn-warning decline" disabled="disabled">Declined</button>

<?php }

 ?>
</div>
                                            </p>
                                              
                                   <?php }else{ 
                                ?>

			<p class="font13 br10 chat_text_pd bg5218fa chatwrap1" style="background: #DDDDDD;color: black;"><?php echo parse_smileys($chat->message,base_url().'smileys'); ?></p>
		<?php } ?>
		</p>
		<p class="mb-1 text-left"><span class="font11 font_gray"><?php echo time_elapsed_string($chat->time); ?></span></p>
	</div>
 <?php
                        }
                       $conversationId = $chat->chatStartId;
                    }                   
                }else{
?>
<input type="hidden" class="totalMessages" value="0">
<?php } ?>