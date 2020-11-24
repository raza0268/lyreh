<?php $this->load->view('includes/header'); ?>
<!-- <script src="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script> -->
<?php 
	// foreach($settings as $setting){
	// 	$meta_key=$setting->meta_key;
	// 	$$meta_key=$setting->meta_value;
	// }
?>
<style type="text/css">
	.statusButton{
		display: none;
	}
	.deleteButton{
		display: none;
	}
</style>
<div class="row boxshadow ptb10">
	<div class="col-9">
	    <a class = "refer" refer="<?php if(!empty($this->session->userdata("refer"))){ echo $this->session->userdata("refer"); } ?>">   <img class = "refer" refer="<?php if(!empty($this->session->userdata("refer"))){ echo $this->session->userdata("refer"); } ?>" src="<?php echo base_url() ?>uploads/left-arrow.png" width="20px"></a>
		<span class="font-weight-bold mb-0 py-2 font18 text-black">Messages</span>
		
	</div>
	
	
	<div class="col-3 text-right ">
		<?php if(!empty($_GET['status'])){ ?>
		<?php if($_GET['status'] == 'unread'){  ?>
		<a class="statusChange" statusChange="<?php echo base_url("Chat/allChat"); ?>" href="javascript:;">
		<img src="<?php echo base_url() ?>uploads/filter.png" width="19px" class="pt13 statusChange">
		</a>
	<?php }
	 }else{ ?>
	 	<a class="statusChange" statusChange = "<?php echo base_url("Chat/allChat?status=unread"); ?>" href="javascript:;">
		<img src="<?php echo base_url() ?>uploads/filter1.png" width="19px" class="pt13 statusChange">
		</a>
	<?php } ?>
	</div>

</div>

<div class="row mt-3">
	<div class="col-12 pl-0 pr-0">
		<div class="innerDiv">
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
		<div class="col-1">
			<?php 
           // print_r($sideBar);exit; 
           if($this->session->userdata('auth_user')[0]->id == $sideBar->userId && $sideBar->changeStatus == "unread"){  $active = 1; ?>
           <button class="statusButton unread12">Read</button><i class="fa fa-circle pt12circle" style="font-size:14px;"></i>
       <?php }else if($lastMessage->receiveId == $this->session->userdata('auth_user')[0]->id && $lastMessage->status == "unread"){ $active = 1; ?>
        <button class="statusButton unread12">Read</button><i class="fa fa-circle pt12circle" style="font-size:14px;"></i>
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
				<img src="<?php echo base_url('uploads/').$otherUser->user_image; ?>" style="width: 55px;height: 55px;" class="rounded-circle chatRows" >
			</div>
			<div class="col-5 pl-0 chatRows maxwid44">
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
				<?php //  echo parse_smileys($lastMessage->message,base_url().'smileys'); 
				if (strpos($lastMessage->message, 'offer-sent') !== false) {
                                        echo "New Offer!!!";
                                    }else{  
                                       
                                    
            $length = strlen($lastMessage->message);
        
        $text = substr($lastMessage->message, 0, 20);
         echo parse_smileys($text,base_url().'smileys')."...";
         }
				// if($length>=15){
				    $wholeText = parse_smileys($lastMessage->message,base_url().'smileys');
				//  echo substr($wholeText, 0, 15).'...';
				// }else{
				    // echo parse_smileys($lastMessage->message,base_url().'smileys');
				// }
				?> </p>
				<p class="mb-0 font10 dkgray chatRows"><?php echo time_elapsed_string($lastMessage->time); ?></p>
			</div>
			<div class="col-4 align-self-center chatRows text-center">
				 <?php if(!empty($sideBar->productSlug)){
                                     $imageDataSlug = getImageUrl($sideBar->productSlug);  
                                 ?>
                                <img src="<?php echo base_url('uploads/item/').unserialize($imageDataSlug->item_image)[0]; ?>" width="50" height="45" >
                                <?php } ?>
				
			</div>
			<button class="deleteButton">Delete</button>
		</div>
		</a>
		
		<?php } 
	}else{ ?>
	<?php if(!empty($_GET['status'])){  ?><b style="color: #808080a6;margin: 48px;">You have no unread messages.</b>
                  <?php } } ?>
 
	<!-- 	<a href="<?php echo base_url() ?>chat_mobile_detail" class="txt-dec-none">
		<div class="row mt-2">
			<div class="col-3 align-self-center">
				<img src="<?php echo base_url() ?>uploads/user.jpg" width="100%" class="rounded-circle" >
			</div>
			<div class="col-6 pl-0">
				<p class="mb-0 font14 font-weight-bold text-black">Lala Lopes</p>
				<p class="mb-0 font13 text-black">Message</p>
				<p class="mb-0 font10 dkgray">2 hours ago</p>
			</div>
			<div class="col-3 align-self-center">
				<img src="<?php echo base_url() ?>uploads/user.jpg" width="100%" >
			</div>
		</div></a> -->




		</div>
	</div>
</div>
 <input type="hidden" class="statusChat" value="<?php if(!empty($_GET['status'])){ echo "0"; }else{ echo "1"; } ?>">
<script type="text/javascript">
	$(document).ready(function(){
		$('body').on('tap', function(e){
			if($(e.target).is(".chatRows")){
				var urls = $(e.target).closest(".row").find(".urls").val();
				window.location.href = urls;
			}
			if($(e.target).is(".statusChange")){
				statusChange = $(e.target).closest("a").attr("statusChange");
				window.location.href = statusChange;
			}
			if($(e.target).is(".refer")){
			    var refer = $(e.target).attr("refer");
			    if(refer == ""){
			        window.location.href = "<?php echo base_url(); ?>";
			    }else{
			        window.location.href = refer;
			    }
			}
		});
		$("body").swiperight(function(e) {
		   if($(e.target).is(".chatRows")){
		   	$(e.target).closest(".row").find(".statusButton").show();
		   	setTimeout(function(){ 
		   		var status = $(e.target).closest(".row").find(".status").val();
		   		var chatId = $(e.target).closest(".row").find(".conversationId").val();
		   		var statusChat = $(".statusChat").val(); 

	                
	                $.ajax({
	                    url: '<?php echo base_url('Chat/changeMobileStatus'); ?>',
	                    type:'post',
	                    data:{
	                        status:status,
	                        chatId:chatId,
	                        statusChat:statusChat
	                    },
	                    success: function(data) {
	                    	// console.log(data);
	                        $(".innerDiv").html(data);
	                    }
	                });
                }, 300);
		   }
		});
		$("body").swipeleft(function(e) {
		   if($(e.target).is(".chatRows")){
		   		var status = $(e.target).closest(".row").find(".status").val();
		   		var chatId = $(e.target).closest(".row").find(".conversationId").val();
		   		var statusChat = $(".statusChat").val(); 
		   		console.log($(e.target).closest(".row").find(".deleteButton").show());
		   		// return;
	              	setTimeout(function(){   
	                $.ajax({
	                    url: '<?php echo base_url('Chat/deleteMobileChat'); ?>',
	                    type:'post',
	                    data:{
	                        status:status,
	                        chatId:chatId,
	                        statusChat:statusChat
	                    },
	                    success: function(data) {
	                    	// console.log(data);
	                        $(".innerDiv").html(data);
	                    }
	                });
		   		}, 300);
		   		// chatUrl = "<?php echo base_url('Chat/deleteMobileChat/'); ?>"+chatId; 
		   		//  window.location.href = chatUrl;
		   }
		});
	});


</script>
	
<script src="//code.jquery.com/mobile/1.5.0-alpha.1/jquery.mobile-1.5.0-alpha.1.min.js"></script> 
<?php $this->load->view('includes/footer'); ?>      