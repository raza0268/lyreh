<?php if(!empty($allConversation)){
                        foreach ($allConversation as $sideBar) {
            
            $userNames = getUserName($this->session->userdata('auth_user')[0]->id);
               $fullName =  $userNames->first_name." ".$userNames->last_name;
     ?>
        <?php if(!empty($sideBar->productSlug)){
           if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                $toIds = $sideBar->toId;
                            }else{
                                $toIds = $sideBar->fromId;
                            }
                            $urls = base_url('Chat/chatDetail/').$sideBar->productSlug.'/'.$toIds; 
         ?>       
                        <a href="<?php echo base_url('Chat/chatDetail/').$sideBar->productSlug.'/'.$toIds; ?>" class="txt-dec-none">
                    <?php }else{
                      if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                $toIds = $sideBar->toId;
                            }else{
                                $toIds = $sideBar->fromId;
                            }
                            $urls = base_url('Chat/chatDetail/profile').'/'.$toIds;
                     ?>
                        <a href="<?php echo base_url('Chat/chatDetail/profile').'/'.$toIds; ?>" class="txt-dec-none">
                    <?php } ?>
    
      <?php $lastMessage = getLastMessage($sideBar->chatStartId);
            if(!empty($_GET['status'])){
               if($this->session->userdata('auth_user')[0]->id == $sideBar->userId && $sideBar->changeStatus == "unread"){ 

                    $style = ""; 
                 
                }else if($lastMessage->receiveId == $this->session->userdata('auth_user')[0]->id && $lastMessage->status == "unread"){ 
                    $style = "";
                
                }else{ 
                    $style = "style='display:none;'"; 
               } 
            }else{
                $style = "";
            } ?>
            
    <div class="row chatRows mt12" <?php echo $style; ?> >
        <div class="col1 wid6">
      <?php 
           // print_r($sideBar);exit; 
           if($this->session->userdata('auth_user')[0]->id == $sideBar->userId && $sideBar->changeStatus == "unread"){  $active = 1; ?>
           <button class="statusButton unread12">Read</button><i class="fa fa-circle pt12circle" style="font-size:14px;"></i>
       <?php }else if($lastMessage->receiveId == $this->session->userdata('auth_user')[0]->id && $lastMessage->status == "unread"){ $active = 1; ?>
        <button class="statusButton unread12">Read</button><i class="fa fa-circle" style="font-size:14px;"></i>
       <?php }else{ $active = 0; ?>
        <button class="statusButton unread12">Unread</button>
       <?php } 

        if($active == 1 ){
        $status = "Read";
    }else{
        $status = "Unread";
    }
    $otherUser = getUserName($toIds);
       ?>
       <input type="hidden" class="urls" value="<?php echo $urls; ?>">
       <input type="hidden" class="status" value="<?php echo $status; ?>">
       <input type="hidden" class="conversationId" value="<?php echo $sideBar->chatStartId; ?>">
       </div>
      <div class="col-3 align-self-center chatRows">
        <img src="<?php echo base_url('uploads/').$otherUser->user_image; ?>" width="100%" class="rounded-circle chatRows" >
      </div>
      <div class="col-5 pl-0 chatRows maxwid43">
        <p class="mb-0 font14 font-weight-bold text-black test chatRows"><?php 
                                if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                    $userId = $sideBar->toId;
                                }else{
                                    $userId = $sideBar->fromId;
                                }
                                $userNames = getUserName($userId);
                                echo $userNames->first_name." ".$userNames->last_name; 
                                 ?></p>
        <p class="mb-0 font13 text-black chatRows sami12">
        <?php 
        if (strpos($lastMessage->message, 'offer-sent') !== false) {
                                        echo "New Offer!!!";
                                    }else{  
                                       
                                    
            $length = strlen($lastMessage->message);
        
        $text = substr($lastMessage->message, 0, 20);
         echo parse_smileys($text,base_url().'smileys')."...";
         }
        // echo parse_smileys($lastMessage->message,base_url().'smileys'); 
        // $length = strlen($lastMessage->message);
    //                 if($length>10){
    //                 $wholeText = parse_smileys($lastMessage->message,base_url().'smileys');
    //                 echo substr($wholeText, 0, 15).'...';
    //                 }else{
    //                 echo parse_smileys($lastMessage->message,base_url().'smileys');
    //                 }
        ?>
        <p class="mb-0 font10 dkgray chatRows"><?php echo time_elapsed_string($lastMessage->time); ?></p>
      </div>
      <div class="col-4 align-self-center chatRows text-center">
         <?php if(!empty($sideBar->productSlug)){
                                     $imageDataSlug = getImageUrl($sideBar->productSlug);  
                                 ?>
                                <img src="<?php echo base_url('uploads/item/').unserialize($imageDataSlug->item_image)[0]; ?>" width="50" height="50" >
                                <?php } ?>
        
      </div>
      <button class="deleteButton">Delete</button>
    </div>
    </a>
    <?php } 
  } ?>
