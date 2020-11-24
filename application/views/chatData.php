<?php if(!empty($chatData)){ 
    $totalMessage = count($chatData);
    ?>
    <input type="hidden" class="totalMessages" value="<?php if(!empty($totalMessage)){ echo $totalMessage; } ?>">
    <?php 
    
    foreach ($chatData as $chat) { if($this->session->userdata('auth_user')[0]->id == $chat->fromId){ 
$userNames = getUserName($chat->fromId);

?>
<div class="message-item outgoing-message" id="<?php echo $chat->message; ?>">
   <div class="message-avatar">
      <figure class="avatar" title="Mirabelle Tow"> <img src="<?php echo base_url('uploads/').$userNames->user_image; ?>" class="rounded-circle" alt="image"> </figure>
   </div>
   <div>
   <?php if (strpos($chat->message, 'offer-sent') !== false) { ?>
                                          <div class="row">
                                        <div class="message-content colorback" >
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
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-success accept">Accept</button>
<?php  } ?>
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-danger decline">Decline</button>
<?php }else if($offerData->offerStatus == "accepted"){ ?>
<button type="button" class="btn btn-success accept" disabled="disabled">Accepted</button>
<?php
}else{ ?>

<button type="button" class="btn btn-danger decline" disabled="disabled">Declined</button>

<?php }

 ?>
</div>
                                            </p>
                                        </div>
                                    </div>          
                                   <?php }else{ 
                                       
                                ?>
      <div class="message-content" > <?php echo parse_smileys($chat->message,base_url().'smileys'); ?></div>
  		<?php } ?>
      <div class="time"><?php echo time_elapsed_string($chat->time); ?></div>
   </div>
</div>
<?php }else{ 
$userNames = getUserName($chat->fromId);

?>
<div class="message-item" id="<?php echo $chat->message; ?>">
   <div class="message-avatar">
      <figure class="avatar" title="Byrom Guittet"> <img src="<?php echo base_url('uploads/').$userNames->user_image; ?>" class="rounded-circle" alt="image"> </figure>
   </div>
   <div>
   	<?php if (strpos($chat->message, 'offer-sent') !== false) { ?>
                                          <div class="row">
                                        <div class="message-content colorback" >
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
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-success accept">Accept</button>
<?php  } ?>
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-danger decline">Decline</button>
<?php }else if($offerData->offerStatus == "accepted"){ ?>
<button type="button" class="btn btn-success accept" disabled="disabled">Accepted</button>
<?php
}else{ ?>

<button type="button" class="btn btn-danger decline" disabled="disabled">Declined</button>

<?php }

 ?>
</div>
                                            </p>
                                        </div>
                                    </div>          
                                   <?php }else{ 
                                ?>
      <div class="message-content" > <?php echo parse_smileys($chat->message,base_url().'smileys'); ?></div>
  <?php } ?>
      <div class="time"><?php echo time_elapsed_string($chat->time); ?></div>
   </div>
</div>
<?php } $conversationId = $chat->chatStartId; } }else{
?>

 <input type="hidden" class="totalMessages" value="0">
<?php
}?>