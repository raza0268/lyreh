<?php $this->load->view('includes/header'); ?>
<?php 
    // foreach($settings as $setting){
    //  $meta_key=$setting->meta_key;
    //  $$meta_key=$setting->meta_value;
    // }
?>

<?php echo smiley_js(); ?>
<?php  $userNames = getUserName($toId); ?>
<style type="text/css">
    table{
        display: none;
    }
</style>
<div class="row boxshadow py-1">    
    
    <div class="col-2 align-self-center">
    <a href="<?php echo base_url("Chat/allChat") ?>">   <img src="<?php echo base_url() ?>uploads/left-arrow.png" width="100%"></a>

    </div>
    <div class="col-7 align-self-center">
        <p class="mb-0 font-weight-bold"><?php 
                               
                                echo $userNames->first_name." ".$userNames->last_name; ?></p>
    </div>
    <div class="col-3 text-right align-self-center">
        <a href="<?php echo base_url("userlisting/").$toId; ?>">
        <img src="<?php echo base_url('uploads/').$userNames->user_image; ?>" style="width: 40px;height: 40px;" class="rounded-circle">
</a>
    </div>

</div>
<?php if(!empty($itemsData)){ ?> 
<div class="row mt-3 pb-2" style="border-bottom:1px solid lightgray; ">
    <div class="col-3">
        <img src="<?php echo base_url('uploads/item/').unserialize($itemsData->item_image)[0] ?>" width="50" height="50">
    </div>
    <div class="col-9 pl-0">
        <p class="mb-0 font12 font-black">
            <?php if(strlen($itemsData->description)>1){ echo substr($itemsData->description, 0, 110).'...'; }else{ echo $itemsData->description; } ?>
            
    </div>
</div>
 <?php } ?>

<div class="row messages chatmobile1" style="position: absolute;left: 0; bottom:69px; top:126px;right: 0; overflow-y: scroll;height: auto;border-bottom: 1px solid lightgray;">
 <?php if(!empty($chatData)){ 
     $totalMessage = count($chatData);
                        ?>
                        <input type="hidden" class="totalMessages" value="<?php if(!empty($totalMessage)){ echo $totalMessage; } ?>">
                        <?php
                        foreach ($chatData as $chat) {
                           if($this->session->userdata('auth_user')[0]->id == $chat->fromId){ 
                     ?> 

    <div class="col-12 mt-2 text-right" id="<?php echo $chat->message; ?>" >
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
  <button style="background-color: #DE9252;border-color: #DE9252; margin-right: 7px;" type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-warning accept">Accept</button>
<?php  } ?>
  <button style="background-color: #DE9252;border-color: #DE9252; margin-right: 7px;" type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-warning decline">Decline</button>
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
        <div class="col-12 mt-2 text-left" id="<?php echo $chat->message; ?>" >
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

            <p class="font13 br10 chat_text_pd bg5218fa chatwrap1 " style="background: #DDDDDD;color: black;"><?php echo parse_smileys($chat->message,base_url().'smileys'); ?></p>
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
                <?php    
                }

                 if(empty($fromId)){
                  $fromId = "";      
                }
                if(empty($toId)){
                  $toId = "";      
                }
                if(empty($slugs)){
                  $slugs = "";      
                }
                if(!empty($slugs)){
                    $type = 1;
                }else{
                    $type = 0;
                }
                if(empty($conversationId)){
                    $conversationId = "";
                }

                ?> 
</div>
<div class="row smiletable" style="position: absolute;bottom: 10;left: 0;right: 0;">
<div class="col-12 plr0">
    <div class="row">
        
<?php  echo $smiley_table; ?>
                    
                        
    <div class="col-10 pr-0 disinhe" >
        <i class="fa fa-smile-o smileysButton" aria-hidden="true"></i>
         <input type="hidden" class="fromId" value="<?php echo $fromId; ?>">
                    <input type="hidden" class="toId" value="<?php echo $toId; ?>">
                    <input type="hidden" class="productSlug" value="<?php echo $slugs; ?>">
                    <input type="hidden" class="type" value="<?php echo $type; ?>">
                    <input type="hidden" class="conversationId" value="<?php echo $conversationId; ?>">
                    
        <textarea class="w-100 border-none resize-none h53 messagebox" id="messagebox" rows="2" placeholder="Write your message " id="hell" style="    padding: 15px 0px 0px;"></textarea>
    </div>
    <div class="col-2 text-right pl-0 align-self-center">
        <!-- <a href=""> -->
            <img src="<?php echo base_url(); ?>uploads/chevron-right.png" class="btn_before_text sendMsgButton" id="check_btn_txt">

        <!-- </a> -->
    </div>
        </div>
</div>
</div>




<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
         <?php if(!empty($_GET["offer"])){ ?>
                var offer = "<?php echo $_GET["offer"] ?>";
                setTimeout(function(){ 
                    $(".chat-body").animate({ scrollTop: $("#"+offer)[0].scrollHeight-100}, 400);
                }, 400);
            <?php } ?>  
        $(".chatmobile1").animate({ scrollTop: $(".chatmobile1")[0].scrollHeight}, 1000);
        $('#hell').on('keyup',function() {
       if($("#check_btn_txt").hasClass("btn_before_text")){
        $("#check_btn_txt").removeClass("btn_before_text");
        $("#check_btn_txt").addClass("btn_after_text");
       }
       
        else if($('#hell').val() == ''){
        $("#check_btn_txt").addClass("btn_before_text");
        $("#check_btn_txt").removeClass("btn_after_text");
   }
   else{
       
       }
    });
    
         $("body").click(function (e){
            if($(e.target).is(".sendMsgButton")){
              // alert("");
              // return;
                var fromId = $(".fromId").val();
                var toId = $(".toId").val();
                var productSlug = $(".productSlug").val();
                var type = $(".type").val();
                var conversationId = $(".conversationId").val();
                var message = $(".messagebox").val();
                $("table").hide();
                $(".messagebox").val(""); 
                if(message !== ""){ 
                    var sendMessage = '<div class="col-12 mt-2 text-right" ><p class="mb-2 text-right"> <p class="font13 text-white br10 chat_text_pd bg5218fa chatwrap" style="background: #4038bd;">'+message+'</p></p><p class="mb-1 text-right"><span class="font11 font_gray"><?php echo time_elapsed_string(date("Y-m-d H:i:s")); ?></span></p></div>';

                    $(".messages").append(sendMessage);
                    $(".chatmobile1").animate({ scrollTop: $(".chatmobile1")[0].scrollHeight}, 1000);
                    var totalMessages = $(".totalMessages").val();
                     totalMessages = parseInt(totalMessages);
                     $(".totalMessages").val(totalMessages+1);
                 $.ajax({
                    url: '<?php echo base_url('Chat/insertChat'); ?>',
                    type: 'POST',
                    data: {
                        fromId : fromId,
                        toId : toId,
                        productSlug : productSlug,
                        type : type,
                        conversationId : conversationId,
                        message : message
                    },
                    
                    success: function(data) {
                       $(".conversationId").val(data);
                        // console.log(data);
                    }
                });
             }
            }

            if($(e.target).is(".accept")){
                offerUniqueId = $(e.target).attr("offerUniqueId");
            if(offerUniqueId !== ""){
                $.LoadingOverlay("show");
            $.ajax({
                    url: '<?php echo base_url('Chat/offerStatus'); ?>',
                    type: 'POST',
                    data: {
                        offerUniqueId : offerUniqueId,
                        offerStatus : "accepted"
                    },
                    
                    success: function(data) {
                        $.LoadingOverlay("hide");
                         // window.location.href = "http://localhost/lyreh/cart";
                    }
                });
            }
            }
            if($(e.target).is(".decline")){
                 offerUniqueId = $(e.target).attr("offerUniqueId");
            if(offerUniqueId !== ""){
                $.LoadingOverlay("show");
            $.ajax({
                    url: '<?php echo base_url('Chat/offerStatus'); ?>',
                    type: 'POST',
                    data: {
                        offerUniqueId : offerUniqueId,
                        offerStatus : "declined"
                    },
                    
                    success: function(data) {
                        $.LoadingOverlay("hide");
                    }
                });
            }
            }

        });
        
        setInterval(function(){ 
            var fromId = $(".fromId").val();
            var toId = $(".toId").val();
            var productSlug = $(".productSlug").val();
            var type = $(".type").val();
            var conversationId = $(".conversationId").val();
            var totalMessages = $(".totalMessages").val();
            
            $.ajax({
                    url: '<?php echo base_url('Chat/receiveMobileChat'); ?>',
                    type: 'POST',
                    data: {
                        fromId : fromId,
                        toId : toId,
                        productSlug : productSlug,
                        type : type,
                        conversationId : conversationId,
                        totalMessages: totalMessages
                    },
                    success: function(data) {
                        // data = JSON.parse(data);
                        // datas = data.replace(/\r?\n|\r/g, '');
                        // console.log("test");
                        if(data !== ""){
                            $(".messages").html(data);
                            $(".chatmobile1").animate({ scrollTop: $(".chatmobile1")[0].scrollHeight}, 1000);
                        }
                    }
                });
         }, 3000);
        $(".list-group-item").click(function(){
           var chatUrl = $(this).children(".chatUrl").val();
           window.location.href = chatUrl;
        });
    //     setInterval(function(){ 
    //         $.ajax({
    //                 url: '<?php echo base_url('Chat/sideChat'); ?>',
    //                 success: function(data) {
    //                     $(".sideChat").html(data);
    //                 }
    //             });
    //      }, 3000);

 $(".smileysButton").click(function(){
        $("table").toggle();
        // if($("table").hasClass("tableHIde")){
        //     $("table").removeClass("tableHide");
        //     $("table").show();
        //     alert("if");
        // }else{
        //     alert("else");
        //     $("table").addClass("tableHide");
        //     $("table").hide();
        // }
    });

        });


</script>
    




























<?php $this->load->view('includes/footer'); ?>     