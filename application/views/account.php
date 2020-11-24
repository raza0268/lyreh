<?php $this->load->view('includes/front/front_header'); 

function getTheDay($date){
    $curr_date=strtotime(date("Y-m-d H:i:s"));
    $the_date=strtotime($date);
    $diff=floor(($curr_date-$the_date)/(60*60*24));
    switch($diff){
      case 0:
        return "Today";
        break;
      case 1:
        return "Yesterday";
        break;
      default:
      
      if($diff>3){
        if($diff>3 && $diff<=7){
          return "This week";
        }elseif($diff>7 && $diff<=14){
          return "1 week ago";
        }elseif($diff>14 && $diff<=21){
          return "2 week ago";
        }elseif($diff>21 && $diff<=30){
          return "3 week ago";
        }elseif($diff>30 && $diff<=60){
          return "1 month ago";
        }elseif($diff>60 && $diff<=90){
          return "2 month ago";
        }elseif($diff>90 && $diff<=120){
          return "3 month ago";
        }elseif($diff>120 && $diff<=150){
          return "4 month ago";
        }elseif($diff>150 && $diff<=180){
          return "5 month ago";
        }elseif($diff>180 && $diff<=360){
          return "5 month ago";
        }elseif($diff>360 ){
          return "1 years ago";
        }
      } 
    }
  }
?>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="<?php echo base_url(); ?>themes/front/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
  $(document).ready(function(){
    $('#datepicker').datepicker({
      uiLibrary: 'bootstrap'
    });
  });

</script>


<style type="text/css">
  .ui-datepicker-calendar th,.ui-datepicker-calendar > tbody > tr > td{
    width: 0%!important;
  }
  .hoverheart:hover{
  color:#d99f6f !important;
}
.hoveroflink{
  color:black;
}
.hoveroflink:hover{
  color:#d99f6f !important;
  text-decoration: none;
}
.order12 th{
text-transform: capitalize !important;
}
.starrr a{
  justify-content: center;
  color:red !important;
  font-size: 23px !important;
  padding: 0 8px !important;
}
.feedback_form div#star1{
  padding-bottom: 0px;
}
textarea.form-control {
    height: 108px;
    margin-top: 11px;
}
.sell-form-group.item_img{
  background-position: 0px 0px;
  height: 97px;
  margin-bottom: 0px;
  background-image: none!important;
}
.mt25{
      margin-top: 6px;
}
.removeImage{
  display: none;
}
.nav-link{
      padding: 0.5rem 0.7rem;
}
.stripeButton{
    background-color: black;
    color: #ffffff;
    border-radius: 4px;
    text-decoration: none;
    transition: .4s;
}
.stripeButton:hover{
background-color: #D99F6F;
text-decoration: none;
color: white;
}
footer{
    display:none!important;
}
</style>
<div class="site-section account-page mt-5">
  <div class="container accountpage" id="account-page123">
    <section class="content account-top">
      <div class="row">
        <div class="profileul col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
        <div class="text-center">
          <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>uploads/<?php echo $auth_user[0]->user_image; ?>" alt="">
        </div>
        <h3 class="profile-username text-center"><?php echo $auth_user[0]->first_name." ".$auth_user[0]->last_name; ?></h3>
        <p class="text-muted text-center"><a href="<?php echo base_url(); ?>userlisting/<?php echo $auth_user[0]->id; ?>"><?php echo ucfirst($auth_user[0]->role); ?></a><br/>
        <small><?php //echo 'Last Seen: '.getTheDay($auth_user[0]->last_online_at); ?></small>
        </p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="profileul col-md-9">
          <?php if($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger"> 
              <?php  echo $this->session->flashdata('error'); ?>
            </div>
          <?php } ?>
          <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success"> 
              <?php  echo $this->session->flashdata('success'); ?>
            </div>
          <?php } ?>
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link <?php if(empty($_GET['stripeSettings'])){ echo 'active'; } ?>" href="#profile" data-toggle="tab">Profile</a></li>
                <li class="nav-item"><a class="nav-link publishItems" href="#items" data-toggle="tab">Published items</a></li>
        <li class="nav-item"><a class="nav-link" href="#draft_items" data-toggle="tab">Draft Items</a></li>
        <li class="nav-item"><a class="nav-link" href="#liked_items" data-toggle="tab">Liked Items</a></li>
                <!--<li class="nav-item"><a class="nav-link" href="#bookmark_items" data-toggle="tab">Bookmark Items</a></li>-->
        <li class="nav-item"><a class="nav-link" href="#follow_users" data-toggle="tab">Following</a></li>
        <li class="nav-item purchase_tab" id="purchase_tab"><a class="nav-link purchase_tab" href="#user_order" data-toggle="tab">Purchases</a></li>
        <li class="nav-item"><a class="nav-link" href="#user_sold" data-toggle="tab">Sold</a></li>
        <li class="nav-item"><a class="nav-link <?php if(!empty($_GET['stripeSettings'])){ echo 'active'; } ?>" href="#user_stripe" data-toggle="tab">Stripe Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="<?php if(empty($_GET['stripeSettings'])){ echo 'active'; } ?> tab-pane" id="profile">
                  <form class="form-horizontal" action="<?php echo base_url("Homecontroller/updateProfile"); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Username</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control username" name="userName" id="inputName" value="<?php echo $auth_user[0]->username; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">First Name</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control firstName" name="firstName" id="inputName" value="<?php echo $auth_user[0]->first_name; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Last Name</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control lastName" name="lastName" id="inputName" value="<?php echo $auth_user[0]->last_name; ?>" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Email</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $auth_user[0]->email; ?>" readonly>
                      </div>
                    </div>
                    <!-- <i class="fa fa-times removeImage" aria-hidden="true" style="/*position: absolute;z-index: 99999999999999;*/color: red;cursor: pointer;<?php if (!empty($auth_user[0]->user_image)) { if($auth_user[0]->user_image != 'sample_user.jpg'){ /* echo 'display: none'; */ } }?>"></i>  -->
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Profile picture</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                          <div class="sell-form-group item_img" style="<?php if (!empty($auth_user[0]->user_image)) { if($auth_user[0]->user_image != 'sample_user.jpg'){ echo 'background-image:none'; } }else{ echo 'background-image:none';  }?>">  
                              <div class="sell-form uploadDiv" style="width: 94px;margin-right: 60px;position: absolute;height: 57%;margin-top: 25px;<?php if (!empty($auth_user[0]->user_image)) { if($auth_user[0]->user_image != 'sample_user.jpg'){ echo 'background: none;'; } }?>">
                                <span class="uploadPhoto" style="position:absolute;z-index: 0;padding-top: 18px;padding-left: 5px;font-weight: bold;color: white;<?php if (!empty($auth_user[0]->user_image)) { if($auth_user[0]->user_image != 'sample_user.jpg'){ echo 'display: none;'; } }?>">upload photo</span>
                                <input type="file" name="item_image_1" style="width: 95%;" class="profileImage" accept="image/*" disabled>
                              </div>
                              
                              <img id="blah1" class="blah mt25" style="/* z-index: 99999999;position: absolute; */width: 94px;height: 55px;<?php if (!empty($auth_user[0]->user_image)) { if($auth_user[0]->user_image != 'sample_user.jpg'){ echo 'display: inline-block'; } }?>" src="<?php if (!empty($auth_user[0]->user_image)) { if($auth_user[0]->user_image != 'sample_user.jpg'){  echo base_url()."uploads/".$auth_user[0]->user_image; } } ?>"/>

                               <input type="hidden" name="ImageStatus" class="ImageStatus" value="1">
                            </div>
                      </div>
                    </div>
                    <!-- background: #80808085; -->
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <!-- <button class="btn btn-default" data-toggle="modal" data-target="#edit_profile_modal">Update</button> -->
                        <button class="btn btn-default submitButton" type="submit" style="display:none; margin-right:5px;">Update</button><button class="btn btn-default editButton" type="button">Edit Profile</button>
                      </div>
                    </div>


                  </form>  
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="items">
                  <div class="row list_view_content" id="list_grid">
          <?php 
          if(empty($auth_items)){
            echo "<div>Published items list is empty!</div>";
          }   
          ?>
                  
                    <div class="column account23">
                      
                        <div class="tab-pane">
                          <table class="order12" style="width:100%">
                          <thead>
                            <th class="pl10p pb10p">Product Info</th>
                            <th class="pl10p">Price</th>
                            <th class="textaction">Action</th>
                          </thead>
                          <tbody>
                      <?php foreach($auth_items as $item){ ?>
                      <tr>
                      <td> 
                        <a href="<?php echo base_url()."item/".$item->slug; ?>">
                           <?php if(!empty($item->item_image)){ 
                              $img_path = base_url()."uploads/item/".@unserialize($item->item_image)[0];
                            }else{
                              $img_path = base_url()."themes/front/images/no-product.jpg";
                            }
                          ?>  
                          <img style="width: 150px; height: 150px; text-decoration: none;"  src="<?php echo $img_path; ?>" alt=""/>
                        </a>&nbsp;&nbsp;
                        <a href="<?php echo base_url()."item/".$item->slug; ?>?productView=true" class="hoveroflink">
                          <?php echo implode(' ', array_slice(explode(' ', $item->item_name), 0, 4))."\n"; ?>
                        </a>
                      </td>
                            <td>  <div class="price pbprice0"><?php echo CURRENCY.$item->price; ?></div></td>
                            <td>
                              <div class="product-parts">
                              <a class="btn btn-default" title="Edit Product" href="<?php echo base_url()."sell/edit/".$item->id; ?>" >Edit
                              </a>&nbsp;
                              <a href="javascript:void(0);" onclick="return deleteItem('<?php echo $item->id; ?>');" class="btn btn-default" title="Delete Product">Delete</a>
                            </div>
                            </td>
                          </tbody>
                          </tr>
                            <?php } ?>
                        </table>
                      </div>

      

                      </div>
                      
                    
                
                  </div>
                </div>
                <!-- /.tab-pane -->
        <div class="tab-pane" id="draft_items">
                  <div class="row list_view_content" id="list_grid">
          <?php 
          if(empty($auth_draft_items)){
            echo "<div>Draft item is empty!</div>";
          }   
          ?>
                  <?php foreach($auth_draft_items as $item){ ?>
                    <div class="column">
                      <div class="iamge123">
                        <a href="<?php echo base_url()."item/".$item->slug; ?>">
               <?php if(!empty($item->item_image)){ 
                  $img_path = base_url()."uploads/item/".@unserialize($item->item_image)[0];
                }else{
                  $img_path = base_url()."themes/front/images/no-product.jpg";
                }
              ?>  
                          <img  src="<?php echo $img_path; ?>" alt=""/>
                        </a>
                      </div>
                      <div class="product-content">
                        <?php if($item->like_user!="" && !empty(unserialize($item->like_user))){ ?>
                    <div class="anoth-name">
                        <p>
                            <strong>
                                <?php 
                                    $user_id=unserialize($item->like_user)[0];
                                    $user_data=$this->action->select("users", array("id"=>$user_id));
                                    echo $user_data[0]->first_name." ".$user_data[0]->last_name;
                                ?>
                            </strong>
                          <?php if(count(unserialize($item->like_user))>1){ ?> 
                              and <strong><?php echo count(unserialize($item->like_user))-1; ?> others</strong>
                          <?php } ?> like this</p>
                    </div>
                <?php } ?>
                        <p><?php echo substr($item->description, 0, 200); ?></p>
                        <div class="product-parts">
                          <div class="price"><?php echo CURRENCY.$item->price; ?></div>
               <div><a class="btn btn-default" title="Edit Product" href="<?php echo base_url()."sell/edit/".$item->id; ?>">Edit</a>&nbsp;<a href="javascript:void(0);" onclick="return deleteItem('<?php echo $item->id; ?>');" class="btn btn-default" title="Delete Product">Delete</a></div>
                          <?php 
                            if(!empty($auth_user)){
                              $bookmark_items=unserialize($auth_user[0]->bookmark_item);
                              ?>
                              <!--a href="javascript:bookmark(<?php echo $item->id; ?>)" class="bookmark_item_<?php echo $item->id; ?>">
                                <?php if(@in_array($item->id, $bookmark_items)){ ?>
                                  <i class="fa fa-bookmark" aria-hidden="true"></i>
                                <?php } else { ?>
                                  <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                                <?php } ?>
                              </a-->
                              <?php 
                            }
                          ?>
                        </div> 
                      </div>
                    </div>
                  <?php } ?>
                  </div>
                </div>
                <!-- /.tab-pane -->
        <div class="tab-pane" id="liked_items">
                  <div class="row list_view_content" id="list_grid">
          <?php 
          if(empty($like_item)){
            echo "<div>Liked items list is empty!</div>";
          }   
          ?>
                 
                    <div class="column">
                        <table class="order12 liked" style="width:100%">
                          <thead>
                            <tr>
                              <th colspan="2">Product Info</th>
                              <th>Description</th>
                              <th>Price</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php foreach($like_item as $item){ ?>
                            <tr>
                              <td><a href="<?php echo base_url()."item/".$item->slug; ?>">
                               <?php if(!empty($item->item_image)){ 
                                      $img_path = base_url()."uploads/item/".@unserialize($item->item_image)[0];
                                    }else{
                                      $img_path = base_url()."themes/front/images/no-product.jpg";
                                    }
                                  ?>  
                                <img style="width: 150px; height: 150px;" src="<?php echo $img_path; ?>" alt=""/>
                              </a>

                        <?php 
                            if(!empty($auth_user_data)){
                            $like_items=unserialize($auth_user_data[0]->like_item);

                            ?>
                            <a title="<?php echo count($like_items); ?> Likes" href="javascript:like(<?php echo $item->id; ?>)" class="like_item_<?php echo $item->id; ?> hoverheart" style="display:block; position: absolute;margin-left: 118px;margin-top: -140px; background: none; color:black">
                              <?php if(@in_array($item->id, $like_items)){ ?>
                              <i class="fa fa-heart" aria-hidden="true" style="font-size: 22px"></i>
                              <?php } else { ?>
                              <i class="fa fa-heart-o" aria-hidden="true" style="font-size: 22px;"></i>
                              <?php } ?>
                            </a>
                            <?php 
                            }
                          ?>
                          </td>
                          <td>
                          <?php if($item->like_user!="" && !empty(unserialize($item->like_user))){ ?>
                                   
                                      &nbsp;<a class="hoveroflink p00 whitespace0" href="<?php echo base_url()."item/".$item->slug; ?>">
                                            <?php echo implode(' ', array_slice(explode(' ', $item->item_name), 0, 4))."\n"; ?>
                                        </a>
                                <?php } ?>
                        </td>
                        
                              <td> 
                                <p class="mbprice0 whitespace0"><?php echo substr($item->description, 0, 200); ?></p>
                            </td>
                              <td> 
                                  <div class="product-parts">
                                    <div class="price pbprice0"><?php echo CURRENCY.$item->price; ?></div>
                                  </div> 
                              </td>
                            </tr>
                             <?php } ?>
                          </tbody>
                        </table>
                        
                    </div>
                 
                  </div>
                </div>
                <!-- /.tab-pane --
                <div class="tab-pane" id="bookmark_items">
                  <div class="row list_view_content" id="list_grid">
          <?php 
          if(empty($bookmark_item)){
            echo "<div>Bookmark item is empty!</div>";
          }   
          ?>
                  <?php foreach($bookmark_item as $item){ ?>
                    <div class="column">
                      <div class="iamge123">
                        <a href="<?php echo base_url()."item/".$item->slug; ?>">
                          <img src="<?php echo base_url()."uploads/item/".@unserialize($item->item_image)[0]; ?>" alt=""/>
                        </a>
                      </div>
                      <div class="product-content">
                        <?php if($item->like_user!="" && !empty(unserialize($item->like_user))){ ?>
                    <div class="anoth-name">
                        <p>
                            <strong>
                                <?php 
                                    $user_id=unserialize($item->like_user)[0];
                                    $user_data=$this->action->select("users", array("id"=>$user_id));
                                    echo $user_data[0]->first_name." ".$user_data[0]->last_name;
                                ?>
                            </strong>
                          <?php if(count(unserialize($item->like_user))>1){ ?> 
                              and <strong><?php echo count(unserialize($item->like_user))-1; ?> others</strong>
                          <?php } ?> like this</p>
                    </div>
                <?php } ?>
                        <p><?php echo substr($item->description, 0, 200); ?></p>
                        <div class="product-parts">
                          <div class="price">$<?php echo $item->price; ?></div>
                        </div> 
                      </div>
                    </div>
                  <?php } ?>
                  </div>
                </div>
                 /.tab-pane -->
        <div class="tab-pane" id="follow_users">
          <div id="followlast">
            <?php 
            if(empty($follow_user)){
              echo "<center><div>Followers List is empty!</div></center>";
            }
            else{
            ?>
            <div style="overflow-x:auto;">
              
              <div class="tab-pane" id="list_grid">
                <table class="order12" style="width:100%">
                  <tr>
                    <th>User Info</th>
                    <th>Name</th>
                    <th>Email</th>
                  </tr>
                  <?php foreach($follow_user as $user){ ?>
                  <tr>
                    <td><a class="hoveroflink" href="<?php echo base_url(); ?>userlisting/<?php echo $user->id; ?>">
                      <img style="width: 150px; height: 150px;" src="<?php echo base_url()."uploads/".$user->user_image; ?>"/>&nbsp;&nbsp;
                      <?php echo $user->username; ?></a>
                    </td>
                    <td><?php echo $user->first_name." ".$user->last_name; ?></td>
                    <td><?php echo $user->email; ?></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
                <!-- /.tab-pane -->
        
         <!-- /.tab-pane -->
        <div class="tab-pane" id="user_order">
            
            <table class="order12" style="width:100%">
              <tr>
              <th>Product Info</th>
              <th>Price</th>
              <th>Date</th>
              <th>Status</th>
              <th>Add Feedback</th>
              </tr>
              <?php 
              if(!empty($all_orders)){ 
              $i=1;
              // echo "<pre>";print_r($all_orders);exit;
              foreach($all_orders as $order){
                
$ratingData = $this->Crud_model->get_data("","users_feedbacks
",["orderId"=>$order->order_id],True); 

             
                
                      $items = unserialize($order->item_record);
                      $useridoffeedback = array();
                      foreach ($items as $key => $value) {
                        $useridoffeedback = productinfo($key)->item_user_id;
                      }

                         

                 // echo $ratingData->orderId;
                      // print_r($ratingData);exit;
                if(!empty($ratingData)){
                  if($ratingData->orderId == $order->order_id){
                      $rating = "javascript:already();";
                }else{
                  $rating = "javascript:addrating(".$useridoffeedback.",'".$order->order_id."') "; 
                  
                }
              }else{
                $rating = "javascript:addrating(".$useridoffeedback.",'".$order->order_id."') ";
              }
              ?>
              <tr id="<?php echo $order->order_id; ?>">
              <td><?php 
              foreach (unserialize($order->item_record) as $k => $val) {
                  $productinfo = productinfo($k);
                  ?>
                   <a class="hoveroflink" href="<?php echo base_url()."item/".$productinfo->slug; ?>">
                  <img style="width: 150px; height: 150px;" src="<?php echo base_url()."uploads/item/".unserialize($productinfo->item_image)[0]; ?>">
                  
                <?php 
                    if(strlen($k) > 5){
                        echo substr($k, 0, 5)."...";
                    }else{
                        echo $k;
                    }
                
                
                //<?php //echo "<span>".$k."</span>";
                }   
               ?></a></td>
              <td><?php echo CURRENCY.$order->total_price; ?></td>
              <td><?php echo date('F j,Y',strtotime($order->created_at)); ?></td>
              <td>
                 <div class="product-parts">
                  <?php

                    if(!empty($order->shippingStatus)){
                      if($order->shippingStatus == "awaiting_shipping"){
                          $payment_status = "Awaiting Shipping";
                      }else{ 
                        $payment_status = "Shipped";
                      }
                    }else{
                       $payment_status = "Awaiting Shipping";
                    }


                   ?>
                  <a class="btn btn-default" href="javascript:getstatus(<?php echo $order->id; ?>,'Purchase');"><?php echo ucfirst($payment_status); ?></a>
                </div>
              </td>
              <td>
                <div class="product-parts">
                    <a   class="btn btn-default" href="<?php echo $rating; ?>" >Feedback</a>
                </div>
              </td>
              </tr>
              <?php $i++;}}else{ 
                echo "<center><div>Purchased items list is empty!</div></center><br>";
              ?>
               <tr>
                <td colspan="4">No Records Found!</td>
              </tr>
              <?php } ?>
            </table>
        </div>


        <div class="tab-pane" id="user_sold">
            <input type="hidden" id="idofstatus" >
            <table class="order12" style="width:100%; text-transform: capitalize;">
              <tr>
              <th>Product Info</th>
              <th>Price</th>
              <th>Date</th>
              <th>status</th>
              </tr>
              <?php 
              if(!empty($all_purchase)){ 
              $i=1;
              foreach($all_purchase as $order){
                //   print_r(unserialize($order->item_record));
                //   exit;
                 foreach (unserialize($order->item_record) as $k => $val) {
                   $productinfo = productinfo($k);

                   if(@$productinfo->item_user_id == $auth_user[0]->id){
                  ?>
                  <tr>
                        <td>
                          <?php // base_url()."item/".$productinfo->slug; ?>
                          <a class="hoveroflink redirectPublish" href="javascript:;">
                            <img style="width: 150px; height: 150px;" src="<?php echo base_url()."uploads/item/".unserialize($productinfo->item_image)[0]; ?>">&nbsp;&nbsp;
                          <?php echo $k;?>
                          </a>
                        </td>
                        <td><?php echo CURRENCY.$order->total_price; ?></td>
                        <td><?php echo date('F j,Y',strtotime($order->created_at)); ?></td>
                        <td>
                          <div class="product-parts">
                            <?php 

                            if(!empty($order->shippingStatus)){
                                if($order->shippingStatus == "awaiting_shipping"){
                                    $payment_status = "Awaiting Shipping";
                                }else if($order->shippingStatus == "shipped"){
                                  $payment_status = "Shipped";
                                }else{
                                  $payment_status = "Awaiting Shipping";
                                }
                              }


                            ?>
                            <a class="btn btn-default" href="javascript:getstatus(<?php echo $order->id; ?>,'Sold');"><?php echo ucfirst($payment_status); ?></a>
                          </div>
                        </td>
                  </tr>
                <?php } }?>

              <?php $i++;}}else{ 
              echo "<center><div>No Sold items!</div></center><br>";
              ?>
               <tr>
                <td colspan="4">No Records Found!</td>
              </tr>
              <?php } ?>
            </table>
        </div>

        <div class="tab-pane <?php if(!empty($_GET['stripeSettings'])){ echo 'active'; } ?>" id="user_stripe">

           <form style="margin-top: 15px;" class="form-horizontal" enctype="multipart/form-data" action="<?php echo base_url("Homecontroller/stripeSettings"); ?>" method="post" enctype="multipart/form-data">                   
<?php $userData =  $this->Crud_model->get_data("","users",["id"=>$_SESSION['auth_user'][0]->id],True); 
    $keys = $this->Crud_model->get_data("","stripesettings","",True);
    require_once('application/third_party/stripe-php/init.php');
    \Stripe\Stripe::setVerifySslCerts(false);
    \Stripe\Stripe::setApiKey(trim($keys->privateKey));


   if(empty($userData->stripeAccountId)){



$AUTHORIZE_URI = 'https://connect.stripe.com/express/oauth/authorize';
$TOKEN_URI = 'https://connect.stripe.com/oauth/token';
$authorize_request_body = array(
 'response_type' => 'code',
 'scope' => 'read_write',
 'client_id' => 'ca_HwpPK8ZC5U453VURlexKeEIljKUOVjQu'
   );
 
   $url = $AUTHORIZE_URI . '?' . http_build_query($authorize_request_body);
   echo "<a class='button stripeButton' href='$url'>Connect my existing Stripe account</a> <a class='button stripeButton' href='$url'>I'm new to Stripe</a><br><br>";
   echo "<p style='margin-top: 22px;color:red;margin-bottom: 2px;'><b>When you <a style='text-decoration: underline;color: red;margin: -7px;' href='".base_url("faq")."'>connect with Stripe</a>, please remember to fill the folllowing fields with these values:</b></p> <b>Business website: </b> <span>https://lyreh.com/</span>";




 ?>             




<?php }else{

$userData =  $this->Crud_model->get_data("","users",["id"=>$_SESSION['auth_user'][0]->id],True);

  $keys = $this->Crud_model->get_data("","stripesettings","",True);

    require_once('application/third_party/stripe-php/init.php');

    \Stripe\Stripe::setVerifySslCerts(false);

    \Stripe\Stripe::setApiKey(trim($keys->privateKey));

  $stripeAccountObj = \Stripe\Account::retrieve($userData->stripeAccountId);

if(empty($stripeAccountObj->payouts_enabled)){
    
    $AUTHORIZE_URI = 'https://connect.stripe.com/express/oauth/authorize';
    $TOKEN_URI = 'https://connect.stripe.com/oauth/token';
    $authorize_request_body = array(
     'response_type' => 'code',
     'scope' => 'read_write',
     'client_id' => 'ca_HwpPK8ZC5U453VURlexKeEIljKUOVjQu'
       );
     
       $url = $AUTHORIZE_URI . '?' . http_build_query($authorize_request_body);
       echo "<a class='button stripeButton' href='$url'>complete your Stripe connection</a><br><br>";
       echo "<p style='margin-top: 10px;color:red;'><b>You're nearly there!<br>
Stripe will require you to verify your identification shortly after you’ve connected your account with us. 
Log back into your account, using the link below and follow the steps so you can start earning money with us today.</b></p>";
    
}else{
echo "<div class='pl4'><b>Your stripe is successfully connected.</b><a style='color:red;' onclick='confirmBox(this);' href='javascript:;' data-href='".base_url('Homecontroller/disconnectStripe')."'>Disconnect Stripe</a></div>";
}
  
?>


<?php } ?>
                  </form>


        </div>
                <!-- /.tab-pane -->
        
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
</div>
<script>
//     function getstatus(id,type){

//     $("#idofstatus").val(id); 

//         $.ajax({

//             type: "POST",

//             url: '<?php echo base_url(); ?>ajax_call',

//             data:{id:id,

//               action: "getorderstatus"

//             },

//             dataType:'json',

//             success: function(data)

//             { 

//             $(".trackingInformation").val("");  

//              if(type == 'Sold'){

//               $("#onlysoldshow").show();

//              }else{

//               $("#onlysoldshow").hide();

//              }

//             //  console.log(data);

//               $("#typeofstatus").html(type);  

//               $("#tracnumber").html(data.orders.trackingNumber);  

//               $("#provider").html(data.orders.shippingProvider);

//               $("#phonenumber").html(data.orders.trackingNumber);  

//               $("#shipto").html(data.orders.created_at+"<br/><br/>"+data.orders.shipping_fname+" "+data.orders.shipping_lname+"<br/>"+data.orders.shipping_country+"<br/>"+data.orders.shipping_address+"<br/>"+data.orders.shipping_state+"<br/>"+data.orders.shipping_zip); 


//               $("#status").html(data.orders.payment_status);

//               $('select#statuschange').val(data.orders.payment_status);

//               $(".trackingInformation").val(data.orders.trackingInformation);

//               $(".trackingInformations").html(data.orders.trackingInformation);

//               $("#change_status").modal("show"); 

//             }

//         });



   

// }    


function getstatus(id,type){

		$("#idofstatus").val(id);	

        $.ajax({

            type: "POST",

            url: '<?php echo base_url(); ?>ajax_call',

            data:{id:id,

            	action: "getorderstatus"

            },

            dataType:'json',

            success: function(data)

            { 

            $(".trackingInformation").val("");	

             if(type == 'Sold'){

             	$("#onlysoldshow").show();

             }else{

             	$("#onlysoldshow").hide();

             }

             // console.log(data);

              $("#typeofstatus").html(type);	

              
              $("#tracnumber").html(data.orders.trackingNumber);  

               $("#provider").html(data.orders.shippingProvider);	

               $("#phonenumber").html(data.orders.shipping_phone);	

              $("#shipto").html(data.orders.created_at+"<br/><br/>"+data.orders.shipping_fname+" "+data.orders.shipping_lname+"<br/>"+data.orders.shipping_country+"<br/>"+data.orders.shipping_address+"<br/>"+data.orders.shipping_state+"<br/>"+data.orders.shipping_zip);	
            if(data.orders.shippingStatus == "awaiting_shipping"){
              $("#status").html("Awaiting Shipping");  
            }else{
                $("#status").html("Shipped");
            }    

              //shippingStatus

              $('select#statuschange').val(data.orders.shippingStatus);

              $('.shippingProvider').val(data.orders.shippingProvider);
              $('.trackingNumber').val(data.orders.trackingNumber);

              $(".trackingInformation").val(data.orders.trackingInformation);

              $(".trackingInformations").html(data.orders.trackingInformation);

              $("#change_status").modal("show"); 

            }

        });



   

} 


function change_statusofuser(){

   var id = $("#idofstatus").val(); 

   var status = $("#statuschange").val(); 

   var trackingInformation = $(".trackingInformation").val();

   var shippingProvider = $(".shippingProvider").val();

   var trackingNumber = $(".trackingNumber").val();

   if(status !== ""){

      $.ajax({

            type: "POST",

            url: '<?php echo base_url(); ?>ajax_call',

            data:{id:id,

             status:status,

             trackingInformation: trackingInformation,

             shippingProvider: shippingProvider,

             trackingNumber: trackingNumber,


             action: "updateorderstatus"

            },

            dataType:'json',

            success: function(data)

            { 

              swal("Success","Status successfully changed","success");

              $("#change_status").modal("hide"); 

              setTimeout(function(){

          window.location.href="";

        }, 1000);

            }

        });

  }

}

function already(){
  swal("error","You cannot rate this product again.","error");
}


function save_feedback(){

     var user_id = $("#user_id").val(); 

       var user_feedbackid = $("#user_feedbackid").val(); 

       var rating = $("#rating123").val(); 

       var notes = $("#notes").val();

       var orderId = $("#orderId").val();



       $.ajax({

              type: "POST",

              url: '<?php echo base_url(); ?>ajax_call',

              data:{user_id:user_id,

               user_feedbackid:user_feedbackid,

               rating:rating,

               notes:notes,

               orderId:orderId,

               action: "savefeedback"

              },

              dataType:'json',

              success: function(data)

              {
                swal("Success","Your feedback has been submitted successfully.","success");

                window.location.href = "<?php echo base_url('account?orderId=true'); ?>";

                $("#feedbackpopup").modal("hide"); 

              }

         });

}


</script>

<script type="text/javascript">
  function addrating(id,orderId){
    $("#user_feedbackid").val(id);
    $("#orderId").val(orderId); 
    $("#feedbackpopup").modal("show"); 
  }
</script>



<div id="feedbackpopup" class="modal fade" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="padding: 0px;background-color: #DE9252;">
                  <h4 class="modal-title" style="margin-left: 10px;color: white;    margin-top: 13px;"> Your Feedback</h4>
                  <button type="button" class="close closesign" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <form method="post" id="validate_form" class="feedback_form">
                <div>
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['auth_user'][0]->id; ?>">
                  <input type="hidden" id="user_feedbackid" name="user_feedbackid" value="">
                  <input type="hidden" id ="orderId" value="" name="orderId">
                  <input type="hidden" name="rating" id="rating123" class="rating" style="color:gray">
                  <div class='starrr' id='star1' style="margin-left: -5px;"></div>

                  <div>
                    <div>
                      <div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <br>
                <b>Feedback:</b>
                <textarea id="notes" style="width: 100%;margin-top: 0px;height: 96px;"></textarea>
              </form>

                
                  <div class="modal-footer pr-0" style="padding: 20px 10px 0px 10px">
                      <button onclick="save_feedback()" type="submit" class="btn btn-default">Submit</button>
                    </div>
                  </div>
          </div>
         </div>
        </div>

<div id="change_status" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header" style="padding: 15px;">
          <h4 class="modal-title font600" id="typeofstatus"></h4>
          <button type="button" class="close mt47 closesign" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <center><h5 class="font600 mb-0">Status</h5>
            <p style="text-transform: capitalize;" id="status" class="font500"></p>
          </center>
          <div style="border-top:1px solid gray;" /></div><br/>

          <center>
            <div class="fa fa-truck" style="font-size: 40;"></div>
            <h5 class="font600 mb-0 pt-3">Shipping Provider</h5>
            <p id="provider" class="font500"></p>
          </center>

          <center><h5 class="font600">Tracking Number</h5>
            <p id="tracnumber" class="font500"></p>
          </center>

          <center><h5 class="font600">Tracking Information</h5>
            <p class ="trackingInformations" class="font500"></p>
          </center>
          <div style="border-top:1px solid gray" /></div><br/>

          <center>
            <div class="fa fa-check-circle" style="font-size: 40px;"></div>
            <h5 class="font600 mb-0 pt-3">Item Will Be Shipped To</h5>
            <p id="shipto" class="font500"></p>
            <!-- Phone Number: <div style="display: inline" id="phonenumber"></div> -->
          </center>
          

        <div id="onlysoldshow">
          <div style="border-top:1px solid gray" /></div><br/>
          <center>
          <!--   <lable class="font600">Change Status</h5>
            <select class="form-control"  id="statuschange">
              <option value="">Select Status</option>
              <option value="pending">Pending</option>
              <option value="success">Success</option>
            </select> -->
            

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label" style="padding-right:0px; padding-left:0px;font-weight: 600;">Change Status</label>
              <div class="col-sm-8" style="padding-right: 0px;">
                <select class="form-control"  id="statuschange">
                  <option value="">Select Status</option>
                  <option value="awaiting_shipping">Awaiting Shipping</option>
                  <option value="shipped">Shipped</option>
                 </select>
              </div>
              
            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label" style="padding-right:0px; padding-left:0px;font-weight: 600;">Shipping Provider</label>
              <div class="col-sm-8" style="padding-right: 0px;">
                <input type="text" class="form-control shippingProvider" placeholder="Shipping Provider" value="">
              </div>
              
            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label" style="padding-right:0px; padding-left:0px;font-weight: 600;">Tracking Number</label>
              <div class="col-sm-8" style="padding-right: 0px;">
                <input type="text" class="form-control trackingNumber" placeholder="Tracking Number" value="">
              </div>
              
            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-4 col-form-label" style="padding-right:0px; padding-left:0px;font-weight: 600;">Tracking Information</label>
              <div class="col-sm-8" style="padding-right: 0px;">
                <textarea class="form-control trackingInformation" placeholder="Enter Tracking Information"></textarea>
              </div>
            </div>

          </center>
          <div class="modal-footer pr-0" style="padding: 15px 15px 0px 15px;">
            <button onclick="change_statusofuser()" type="submit" class="btn btn-default">Update</button>
          </div>
        </div>

        </div>
  </div>
</div>



<div id="edit_profile_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <form role="form" id="validate_form" method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="edit_user">       
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Profile</h4>
          <button type="button" class="close closesign" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $auth_user[0]->first_name; ?>" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $auth_user[0]->last_name; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Email" value="<?php echo $auth_user[0]->email; ?>" readonly disabled>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password"  >
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="customFile">User Image</label>
                    <div class="custom-file">
                        <input type="file" name="user_image" class="custom-file-input" id="customFile" <?php if(@$action=='add'){ echo "required"; } ?>>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
       <div class="col-sm-6">
                <div class="form-group">
                    <label for="customFile">Address</label>
                    <div class="custom-file">
                        <textarea name='address' class="form-control" id='address'><?php echo $auth_user[0]->address; ?></textarea>
                    </div>
                </div>
            </div>
            <!--div class="col-sm-6">
                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role" required>
                        <option value="<?php echo $auth_user[0]->role; ?>"><?php echo ucfirst($auth_user[0]->role); ?></option>
                    </select>
                </div>
            </div-->
          </div>
          <div class="form-group edit_profile">
            <div class="col-sm-12">
              <img src="<?php echo base_url()."uploads/".$auth_user[0]->user_image; ?>"/>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>





<?php $this->load->view('includes/front/front_footer'); ?>




<!-- Modal -->



<script type="text/javascript">
  $(document).ready(function(){
     $(".redirectPublish").click(function(){
          $(".publishItems").click();
        });
   // $('[name="item_image_1"]').change(function(){
   //      readURL(this, "blah1");
   //  });
   //   $(".removeImage").click(function(){
   //      $("#blah1").attr("src","#");
   //      $("#blah1").hide();
   //      $(this).hide();
   //      $(".ImageStatus").val(0);
   //   });
   });
//   function readURL(input, element) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function(e) {
//             $('#'+element).attr('src', e.target.result).show();
//         }
//         $(".removeImage").show();
//         reader.readAsDataURL(input.files[0]);
//     }
// }
</script>