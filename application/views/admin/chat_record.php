<?php $this->load->view('includes/admin/header'); ?>
<?php
foreach($users as $user){
	$usr_name[$user->id]=$user->first_name." ".$user->last_name;
	$usr_img[$user->id]=$user->user_image;
  $chatstatus[$user->id]=$user->chat_status;
}
?>
<style>
    .recent_heading {
    float: left;
    width: 50%!important;
}
</style>
<!-- Content Wrapper. Contains page content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0 text-dark">

              <?php if(!empty($_GET['archive'])){ echo 'All Archived '; } ?> Messages

            </h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>

              <li class="breadcrumb-item active">

              <?php if(!empty($_GET['archive'])){ echo 'All Archived '; } ?>  Messages

              </li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <!-- right column -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form  id="validate_form" method="get"  action="<?php echo base_url("Admincontroller/chat_record") ?>">
              <h4>Filter</h4>
              <div class="row">
                    <div class="col-sm-4">
                          <div class="form-group">
                             <label>Select a Customer</label>      
                                <select class="form-control" name="customerId" required>
                                   <option value="">Select a Customer</option>
                                  <?php foreach ($customer as $key => $value) {?>
                                      <option <?php if(!empty($_GET['customerId'])){ if($_GET['customerId'] == $value->id){ echo "selected='selected'"; } } ?> value="<?= $value->id ?>"><?= $value->first_name ?> <?= $value->last_name ?></option>
                                  <?php } ?>
                                </select>
                           </div>
                    </div>
            </div>
            <div class="row">
               <div class="col-sm-3">
                          <div class="form-group">
                                <button type="submit" class="btn btn-primary">Search</button>
                           </div>
                    </div>
              
            </div>
            <input type="hidden" name="archive" value="<?php if(!empty($_GET['archive'])){ echo '1'; }else{ echo '0'; } ?>">  
          </form>


            </div>
          </div>
        </div>

			<div class="col-md-12">

				<div class="container">
					<h3 class=" text-center"> <?php if(!empty($_GET['archive'])){ echo 'All Archived '; } ?>Messages</h3>
					<div class="messaging">
					  <div class="inbox_msg">
						<div class="inbox_people">
						  <div class="headind_srch">
							<div class="recent_heading">
							  <h4><?php if(!empty($_GET['archive'])){ echo 'All Archived '; } ?> Messages</h4>
                <?php if(!empty($_GET['customerId'])){
                  $customers = "&customerId=".$_GET['customerId'];
                }else{
                  $customers = "";
                } 
                ?>
                <?php if(empty($_GET['archive'])){ ?>  
                <h6><small><a href="<?php echo base_url('Admincontroller/chat_record?archive=1').$customers; ?>">All Archived Messages</a></small></h6>
							 <?php } else{?>
                <h6><small><a href="<?php echo base_url('Admincontroller/chat_record'); ?>">All Messages</a></small></h6>
               <?php } ?>
              </div>
						  </div>
						  <div class="inbox_chat">
							<?php // foreach($channels as $channel){ ?>
								<div class="chat_list active_chat">

									<div>
                    <?php 
                      if(!empty($allConversation)){
                        foreach ($allConversation as $sideBar) {
                            
                            $userNames = getUserName($sideBar->fromId);
                            $secondUserName = getUserName($sideBar->toId);
                            
                                $firstName = "";
                                $lastName = "";
                                $secondFirstName = "";
                                $secondLastName = "";
                                
                                if(!empty($userNames->first_name)){
                                    $firstName = $userNames->first_name;
                                }
                                if(!empty($userNames->last_name)){
                                    $lastName = $userNames->last_name;
                                }
                                if(!empty($secondUserName->first_name)){
                                    $secondFirstName = $secondUserName->first_name;
                                }
                                if(!empty($secondUserName->last_name)){
                                    $secondLastName = $secondUserName->last_name;
                                }
                                
                            
                               $fullName =  $firstName." ".$lastName;
                               $secondFullName = $secondFirstName." ".$secondLastName;
                               $lastMessage = getLastMessage($sideBar->chatStartId);
                               
                               ?>

										<div class="chat_people">
											<div class="chat_img" ><img style="border-radius: 100%;" src="<?php echo base_url()."uploads/".@$usr_img[$channel->sender_id]; ?>" alt=""> </div>
											<div class="chat_ib">
                        <?php if(!empty($_GET['archive'])){
                            $archives = "&archive=".$_GET['archive'];
                          }else{
                            $archives = "";
                          } 
                          ?>
                        <?php if(!empty($_GET['customerId'])){ ?>
                          <a href="<?php echo base_url('Admincontroller/chatRecordDetail/').$sideBar->chatStartId."?customerId=".$_GET['customerId'].$archives; ?>"><h5><?php echo $fullName; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $secondFullName; ?>  
                        
                      </h5></a>
                        <?php }else{ ?>
												<a href="<?php echo base_url('Admincontroller/chatRecordDetail/').$sideBar->chatStartId; ?>"><h5><?php echo $fullName; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $secondFullName; ?>  
                        
                      </h5></a>
                    <?php } ?>

											</div>
										</div>




                    <div style="width: 200px; display: inline; float: left"><hr style="margin-top: 1rem; margin-bottom: 0.5rem;" />
                    </div>
                    <div style=" display: inline; float: right;    margin-top: -22px; ">
                    <?php if(empty($_GET['archive'])){ ?> 
                       <a class="archive" title="Add Archive" href="javascript:;" url="<?php echo base_url("Admincontroller/addArchive/").$sideBar->chatStartId ?>">
                        <small><i style="color:blue" class="fa fa-archive"></i></small></a>
                        <?php }else{?>
                          <a class="unArchive" title="Unarchive" href="javascript:;" url="<?php echo base_url("Admincontroller/unArchive/").$sideBar->chatStartId ?>">
                        <small><i style="color:blue" class="fa fa-archive"></i></small></a>
                        <?php } ?>
                      <a title="Remove Chat" class="removeChat" url="<?php echo base_url("Admincontroller/deleteConversation/").$sideBar->chatStartId; ?>" href="javascript:;">
                        <small><i style="color:red" class="fa fa-trash"></i></small></a>
                    </div>
                    <?php } } ?>
										
									</div>

								</div>
						
						  </div>
						</div>
						<div class="mesgs">
						  <div class="msg_history">
              <div class="row messages" style="">
 <?php if(!empty($chatData)){ 
                        foreach ($chatData as $chat) {
                           if($this->session->userdata('auth_user')[0]->id == $chat->fromId){ 
                     ?> 

  <div class="col-12 mt-2"  >
    <p class="mb-2 text-right" style="">

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
                                          
                                   <?php }else{ 
                                ?>

      <span class="font13 text-white br10 chat_text_pd bg5218fa" style="background: #2A2A2A;"><?php echo parse_smileys($chat->message,base_url().'smileys'); ?></span>
    <?php } ?>
    </p>
    <p class="mb-1 text-right"><span class="font11 font_gray"><?php echo time_elapsed_string($chat->time); ?></span></p>
  </div>
<?php }else{ ?>
    <div class="col-12 mt-2" >
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
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-success accept" disabled="disabled">Accept</button>
<?php  } ?>
  <button type="button" offerUniqueId="<?php echo $offerData->offerUniqueId; ?>" class="btn btn-danger decline" disabled="disabled">Decline</button>
<?php }else if($offerData->offerStatus == "accepted"){ ?>
<button type="button" class="btn btn-success accept" disabled="disabled">Accepted</button>
<?php
}else{ ?>

<button type="button" class="btn btn-danger decline" disabled="disabled">Declined</button>

<?php }

 ?>
</div>
                                            </p>
                                              
                                   <?php }else{ 
                                ?>
      <span class="font13 br10 chat_text_pd bg5218fa" style="background: #DDDDDD;color: black;"><?php echo parse_smileys($chat->message,base_url().'smileys'); ?></span>
    <?php } ?>
    </p>
    <p class="mb-1 text-left"><span class="font11 font_gray"><?php echo time_elapsed_string($chat->time); ?></span></p>
  </div>
 <?php
                        }
                       $conversationId = $chat->chatStartId;
                    }                   
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
						  </div>
						</div>
					  </div>
					</div>
				</div>

			</div>

          <!--/.col (right) -->

      </div>

      <!-- /.row -->

    </section>

    <!-- /.content -->

</div>
<script>
    $(document).ready(function(){
        $(".removeChat").click(function(){
            url = $(this).attr("url");
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this chat.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Chat has been deleted successfully.", {
                  icon: "success",
                });
                window.location.href = url;
              } else {
                // swal("Your imaginary file is safe!");
              }
            });
        });
        $(".archive").click(function(){
            url = $(this).attr("url");
            swal({
              title: "Are you sure?",
              text: "You want to archive this chat.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Chat has been archived successfully.", {
                  icon: "success",
                });
                window.location.href = url;
              } else {
                // swal("Your imaginary file is safe!");
              }
            });
        });
        $(".unArchive").click(function(){
             url = $(this).attr("url");
            swal({
              title: "Are you sure?",
              text: "You want to unarchived this chat.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                swal("Chat has been unarchived successfully.", {
                  icon: "success",
                });
                window.location.href = url;
              } else {
                // swal("Your imaginary file is safe!");
              }
            });
        });
    });
</script>
<style>
.container{max-width:1170px; margin:auto;}
img{ max-width:100%;}
.inbox_people {
  background: #f8f8f8 none repeat scroll 0 0;
  float: left;
  overflow: hidden;
  width: 40%; border-right:1px solid #c4c4c4;
}
.inbox_msg {
  border: 1px solid #c4c4c4;
  clear: both;
  overflow: hidden;
}
.top_spac{ margin: 20px 0 0;}


.recent_heading {float: left; width:40%;}
.srch_bar {
  display: inline-block;
  text-align: right;
  width: 60%; padding:
}
.headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

.recent_heading h4 {
  color: #05728f;
  font-size: 21px;
  margin: auto;
}
.srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
.srch_bar .input-group-addon button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  padding: 0;
  color: #707070;
  font-size: 18px;
}
.srch_bar .input-group-addon { margin: 0 0 0 -27px;}

.chat_ib h5{ font-size:15px; color:#464646; margin:10px 0 0px 0;}
.chat_ib h5 span{ font-size:13px; float:right;}
.chat_ib p{ font-size:14px; color:#989898; margin:auto}
.chat_img {
  float: left;
  width: 10%;
}
.chat_ib {
  float: left;
  padding: 0 0 0 15px;
  width: 88%;
}

.chat_people{ overflow:hidden; clear:both;}
.chat_list {
  border-bottom: 1px solid #c4c4c4;
  margin: 0;
  padding: 0px 16px 10px;
}
.inbox_chat { height: 550px; overflow-y: scroll;}

.active_chat{ background:#ebebeb;}

.incoming_msg_img {

  display: inline-block;
  width: 6%;
}
.received_msg {
  display: inline-block;
  padding: 0 0 0 10px;
  vertical-align: top;
  width: 92%;
 }
 .received_withd_msg p {
  background: #ebebeb none repeat scroll 0 0;
  border-radius: 3px;
  color: #646464;
  font-size: 14px;
  margin: 0;
  padding: 5px 10px 5px 12px;
  width: 100%;
}
.time_date {
  color: #747474;
  display: block;
  font-size: 12px;
  margin: 8px 0 0;
}
.received_withd_msg { width: 57%;}
.mesgs {
  float: left;
  padding: 30px 15px 0 25px;
  width: 60%;
}

 .sent_msg p {
  background: #05728f none repeat scroll 0 0;
  border-radius: 3px;
  font-size: 14px;
  margin: 0; color:#fff;
  padding: 5px 10px 5px 12px;
  width:100%;
}
.outgoing_msg{  margin:26px 290px 26px;}
.sent_msg {
  float: right;
  width: 46%;
}
.input_msg_write input {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
  color: #4c4c4c;
  font-size: 15px;
  min-height: 48px;
  width: 100%;
}

.type_msg {border-top: 1px solid #c4c4c4;position: relative;}
.msg_send_btn {
  background: #05728f none repeat scroll 0 0;
  border: medium none;
  border-radius: 50%;
  color: #fff;
  cursor: pointer;
  font-size: 17px;
  height: 33px;
  position: absolute;
  right: 0;
  top: 11px;
  width: 33px;
}
.messaging { padding: 0 0 50px 0;}
.msg_history {
  height: 516px;
  overflow-y: auto;
}
</style>
<?php $this->load->view('includes/admin/footer'); ?> 