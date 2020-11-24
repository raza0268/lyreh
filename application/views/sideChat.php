<?php if(!empty($allConversation)){
                        foreach ($allConversation as $sideBar) {
                            
                            $userNames = getUserName($this->session->userdata('auth_user')[0]->id);
                               $fullName =  $userNames->first_name." ".$userNames->last_name;
                     ?>
                    <div class="fullName getParentUrl" fullName="<?php echo $fullName ?>">  
                    
                      <?php //if(!empty($toId)){ 
                $lastMessage = getLastMessage($sideBar->chatStartId);
           if($this->session->userdata('auth_user')[0]->id == $sideBar->userId && $sideBar->changeStatus == "unread"){ $active = 1; 
          
        }else if($lastMessage->receiveId == $this->session->userdata('auth_user')[0]->id && $lastMessage->status == "unread"){ $active = 1; 
        
        }else{ $active = 0; 
        }     
                     
                     
                 if($active == 1 ){
    $status = "Read";
}else{
    $status = "Unread";
}
                 
                 ?>
                    <div class="action-toggle" style="">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a status='<?php echo $status; ?>' chatStartedId='<?php echo $sideBar->chatStartId ?>' href="javascript:;" class="dropdown-item changeChat"><?php echo $status; ?></a>
                                            <div class="dropdown-divider"></div>
                                            <a chatStartedId = '<?php echo $sideBar->chatStartId ?>' href="javascript:;" class="dropdown-item text-danger deleteChat">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <?php //} ?>
                    <li class="list-group-item getParentUrl" style="border-bottom: 1px solid rgba(0,0,0,.125) !important;border-top: none !important;">
                        <?php if(!empty($sideBar->productSlug)){
                            if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                $toIds = $sideBar->toId;
                            }else{
                                $toIds = $sideBar->fromId;
                            }
                        ?>
                        <input type="hidden" class="chatUrl" value="<?php echo base_url('chat/').$sideBar->productSlug.'/'.$toIds; ?>">
                    <?php }else{
                        if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                $toIds = $sideBar->toId;
                            }else{
                                $toIds = $sideBar->fromId;
                            }
                    
                    ?>
                        <input type="hidden" class="chatUrl" value="<?php echo base_url('chat/profile').'/'.$toIds; ?>">
                    <?php } ?>
                        <input type="hidden" class="chatProductSlug" value="">
<?php 
           $lastMessage = getLastMessage($sideBar->chatStartId);
           if($this->session->userdata('auth_user')[0]->id == $sideBar->userId && $sideBar->changeStatus == "unread"){ $active = 1; ?>
           <i class="fa fa-circle" style="font-size:14px;"></i>
       <?php }else if($lastMessage->receiveId == $this->session->userdata('auth_user')[0]->id && $lastMessage->status == "unread"){ $active = 1; ?>
        <i class="fa fa-circle" style="font-size:14px;"></i>
       <?php }else{ $active = 0; ?>
       <?php }
     $userNames = getUserName($toIds);
       ?>
         

                            <figure class="avatar getParentUrl">
                                <img src="<?php echo base_url('uploads/').$userNames->user_image; ?>" class="rounded-circle getParentUrl" alt="image">
                            </figure>
                        
                        <div class="users-list-body getParentUrl">
                            <div class="chatDiv getParentUrl">
                                <h5 class="chatName getParentUrl"><?php 
                                if($this->session->userdata('auth_user')[0]->id == $sideBar->fromId){
                                    $userId = $sideBar->toId;
                                }else{
                                    $userId = $sideBar->fromId;
                                }
                                $userNames = getUserName($userId);
                                echo $userNames->first_name." ".$userNames->last_name; 
                                 ?></h5>
                                <p class="getParentUrl"><?php 
                                    if (strpos($lastMessage->message, 'offer-sent') !== false) {
                                        echo "New Offer!!!";
                                    }else{  
                                        echo parse_smileys($lastMessage->message,base_url().'smileys');
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="users-list-action getParentUrl">
                                <?php if(!empty($sideBar->productSlug)){
                                     $imageDataSlug = getImageUrl($sideBar->productSlug);  
                                 ?>
                                 <?php if(!empty($imageDataSlug->item_image)){ ?>
                                <img class="getParentUrl" width="50" height="50" src="<?php echo base_url('uploads/item/').unserialize($imageDataSlug->item_image)[0]; ?>">
                             <?php } ?>
                                <?php } ?>
                                <small class="text-muted"><?php echo time_elapsed_string($lastMessage->time); ?></small>

                                <!-- <div class="action-toggle" style="z-index: 9999999;position: absolute;">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Add to archive</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Delete</a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    
                    
                    </li>
                
<?php if($active == 1 ){
    $status = "Read";
}else{
    $status = "Unread";
}
 ?>
                    <!--<div class="action-toggle" style="">-->
                    <!--                <div class="dropdown">-->
                    <!--                    <a data-toggle="dropdown" href="#">-->
                    <!--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>-->
                    <!--                    </a>-->
                    <!--                    <div class="dropdown-menu dropdown-menu-right">-->
                    <!--                        <a status='<?php echo $status; ?>' chatStartedId='<?php echo $sideBar->chatStartId ?>' href="javascript:;" class="dropdown-item changeChat"><?php echo $status; ?></a>-->
                    <!--                        <div class="dropdown-divider"></div>-->
                    <!--                        <a chatStartedId = '<?php echo $sideBar->chatStartId ?>' href="javascript:;" class="dropdown-item text-danger deleteChat">Delete</a>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                </div>


          <?php } } ?>