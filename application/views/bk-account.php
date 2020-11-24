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
<style type="text/css">
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
</style>
<div class="site-section account-page mt-5">
  <div class="container" id="account-page123">
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
                <li class="nav-item w-100-sm br-sm-d99f6f"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                <li class="nav-item w-100-sm br-sm-d99f6f"><a class="nav-link" href="#items" data-toggle="tab">Publish Items</a></li>
				<li class="nav-item w-100-sm br-sm-d99f6f"><a class="nav-link" href="#draft_items" data-toggle="tab">Draft Items</a></li>
				<li class="nav-item w-100-sm br-sm-d99f6f"><a class="nav-link" href="#liked_items" data-toggle="tab">Liked Items</a></li>
                <!--<li class="nav-item"><a class="nav-link" href="#bookmark_items" data-toggle="tab">Bookmark Items</a></li>-->
				<li class="nav-item w-100-sm br-sm-d99f6f"><a class="nav-link" href="#follow_users" data-toggle="tab">Followings</a></li>
				<li class="nav-item w-100-sm br-sm-d99f6f"><a class="nav-link" href="#user_order" data-toggle="tab">Purchase</a></li>
				<li class="nav-item w-100-sm br-sm-d99f6f"><a class="nav-link" href="#user_sold" data-toggle="tab">Sold</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="profile">
                  <form class="form-horizontal" onsubmit="return false;">
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Username</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $auth_user[0]->username; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">First Name</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $auth_user[0]->first_name; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Last Name</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $auth_user[0]->last_name; ?>" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Email</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $auth_user[0]->email; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <button class="btn btn-default" data-toggle="modal" data-target="#edit_profile_modal">Edit Profile</button>
                      </div>
                    </div>
                  </form>  
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="items">
                  <div class="row list_view_content" id="list_grid">
				  <?php 
					if(empty($auth_items)){
						echo "<div>Publish item is empty!</div>";
					}		
				  ?>
                  
                    <div class="column account23">
                      
                        <div class="tab-pane  table-responsive">
                          <table class="order12" style="width:100%">
                          <thead>
                            <th>Product Info</th>
                            <th>Price</th>
                            <th>Action</th>
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
                        <a href="<?php echo base_url()."item/".$item->slug; ?>" class="hoveroflink">
                          <?php echo implode(' ', array_slice(explode(' ', $item->item_name), 0, 4))."\n"; ?>
                        </a>
                      </td>
                            <td>  <div class="price"><?php echo CURRENCY.$item->price; ?></div></td>
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
						echo "<div>Like item is empty!</div>";
					}		
				  ?>
                 
                    <div class="column table-responsive">
                        <table class="order12" style="width:100%">
                          <thead>
                            <tr>
                              <th>Product Info</th>
                              <th>Description</th>
                              <th>Price</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php foreach($like_item as $item){ ?>
                            <tr>
                              <td>
                            <div style="overflow: hidden;position: relative;">
                                <a href="<?php echo base_url()."item/".$item->slug; ?>">
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

                            <a title="<?php echo count($like_items); ?> Likes" href="javascript:like(<?php echo $item->id; ?>)" class="like_item_<?php echo $item->id; ?> hoverheart" style="position: absolute;top: 0;left: 96px;padding: 15px 20px;color:black">
                              <?php if(@in_array($item->id, $like_items)){ ?>
                              <i class="fa fa-heart" aria-hidden="true" style="font-size: 22px"></i>
                              <?php } else { ?>
                              <i class="fa fa-heart-o" aria-hidden="true" style="font-size: 22px;"></i>
                              <?php } ?>
                            </a>
                            <?php 
                            }
                          ?>
                          <?php if($item->like_user!="" && !empty(unserialize($item->like_user))){ ?>
                                   
                                      &nbsp;<a class="hoveroflink" href="<?php echo base_url()."item/".$item->slug; ?>">
                                            <?php echo implode(' ', array_slice(explode(' ', $item->item_name), 0, 4))."\n"; ?>
                                        </a>
                                <?php } ?>

                                </div>
                        </td>
                        
                              <td> 
                                <p class="mb-0"><?php echo substr($item->description, 0, 200); ?></p>
                            </td>
                              <td> 
                                  <div class="product-parts">
                                    <div class="price" style="padding-bottom: 3px;"><?php echo CURRENCY.$item->price; ?></div>
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
				<div class="tab-pane pb-3" id="follow_users">
					<div id="followlast">
						<?php 
						if(empty($follow_user)){
							echo "<div>Follow user is empty!</div>";
						}
						else{
						?>
						<div style="overflow-x:auto;">
              
							<div class="tab-pane table-responsive" id="list_grid">
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
				<div class="tab-pane table-responsive pb-3" id="user_order">
					  
						<table class="order12" style="width:100%">
						  <tr>
							<th>Product Info</th>
							<th>Price</th>
							<th>Date</th>
							<th>Status</th>
              <th>Add Rating</th>
						  </tr>
						  <?php 
						  if(!empty($all_orders)){ 
							$i=1;
							foreach($all_orders as $order){

                      $items = unserialize($order->item_record);
                      $useridoffeedback = array();
                      foreach ($items as $key => $value) {
                        $useridoffeedback = productinfo($key)->item_user_id;
                      }
						  ?>
						  <tr>
							<td><?php 
              foreach (unserialize($order->item_record) as $k => $val) {
                  $productinfo = productinfo($k);
                  ?>
                   <a class="hoveroflink" href="<?php echo base_url()."item/".$productinfo->slug; ?>">
                  <img style="width: 150px; height: 150px;" src="<?php echo base_url()."uploads/item/".unserialize($productinfo->item_image)[0]; ?>">&nbsp;&nbsp;
                <?php echo $k;
                }   
               ?></a></td>
							<td><?php echo CURRENCY.$order->total_price; ?></td>
							<td><?php echo date('F j,Y',strtotime($order->created_at)); ?></td>
							<td>
                 <div class="product-parts">
                  <a class="btn btn-default" href="javascript:getstatus(<?php echo $order->id; ?>,'Purchases')"><?php echo ucfirst($order->payment_status); ?></a>
                </div>
              </td>
              <td>
                <div class="product-parts">
                    <a class="btn btn-default" href="javascript:addrating(<?php echo $useridoffeedback; ?>)">Rating</a>
                </div>
              </td>
						  </tr>
						  <?php $i++;}}else{ ?>
						   <tr>
								<td colspan="4">No Recor Found</td>
							</tr>
						  <?php } ?>
						</table>
				</div>


        <div class="tab-pane table-responsive pb-3" id="user_sold">
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
                 foreach (unserialize($order->item_record) as $k => $val) {
                   $productinfo = productinfo($k);

                   if(@$productinfo->item_user_id == $auth_user[0]->id){
                  ?>
                  <tr>
                        <td>
                          
                          <a class="hoveroflink" href="<?php echo base_url()."item/".$productinfo->slug; ?>">
                            <img style="width: 150px; height: 150px;" src="<?php echo base_url()."uploads/item/".unserialize($productinfo->item_image)[0]; ?>">&nbsp;&nbsp;
                          <?php echo $k;?>
                          </a>
                        </td>
                        <td><?php echo CURRENCY.$order->total_price; ?></td>
                        <td><?php echo date('F j,Y',strtotime($order->created_at)); ?></td>
                        <td>
                          <div class="product-parts">
                            <a class="btn btn-default" href="javascript:getstatus(<?php echo $order->id; ?>,'Sold')"><?php echo ucfirst($order->payment_status); ?></a>
                          </div>
                        </td>
                  </tr>
                <?php } }?>

              <?php $i++;}}else{ ?>
               <tr>
                <td colspan="4">No Recor Found</td>
              </tr>
              <?php } ?>
            </table>
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

<?php $this->load->view('includes/front/front_footer'); ?>
<!-- Modal -->
<script type="text/javascript">
  function addrating(id){
    $("#user_feedbackid").val(id); 
    $("#feedbackpopup").modal("show"); 
  }
</script>

<div id="feedbackpopup" class="modal fade" role="dialog">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px">
                  <h4 class="modal-title" style="margin-left: 10px;"> Your Feedback</h4>
                  <button type="button" style="padding: 7px 14px 0px 0px;" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <form method="post" id="validate_form" class="feedback_form">
                <div>
                  <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['auth_user'][0]->id; ?>">
                  <input type="hidden" id="user_feedbackid" name="user_feedbackid" value="">
                  <input type="hidden" name="rating" id="rating123" class="rating" style="color:gray">
                  <div class='starrr' id='star1' style="margin-left: -5px;"></div>
                  <div>
                    <div>
                      <div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

                
                  <div class="modal-footer" style="padding: 20px 10px 0px 10px">
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
          <h4 class="modal-title w-100 text-center font700" id="typeofstatus"></h4>
          <button type="button" style="padding: 7px 14px 0px 0px;" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <center><h5 class="mb-0 font700">Status</h5>
            <p style="text-transform: capitalize;" id="status"></p>
          </center>
          <div style="border-top:1px solid ;" /></div><br/>

          <center>
            <div class="fa fa-truck mb-3" style="font-size: 40;"></div>
            <h5 class="mb-0 font700">Shipping Provider:</h5>
            <p id="provider"></p>
          </center>

          <center><h5 class="mb-0 font700">Tracking Number:</h5>
            <p id="tracnumber" style="color: red;"></p>
          </center>
          <div style="border-top:1px solid #D3D3D3" /></div><br/>

          <center>
            <div class="fa fa-check-circle mb-3" style="font-size: 40px;"></div>
            <h5 class="mb-0 font700">Item will be shipped to</h5>
            <p id="shipto" class="mb-0"></p>
            Phone Number: <div style="display: inline" id="phonenumber"></div>
          </center>
          

        <div id="onlysoldshow">
          <div style="border-top:1px solid #D3D3D3" /></div><br/>
          <center>
            <h5 class="mb-0 font700">Change Status</h5>
            <select class="form-control"  id="statuschange">
              <option value="">Select Status</option>
              <option value="pending">Pending</option>
              <option value="success">Success</option>
            </select>

          </center>
          <div class="modal-footer" style="padding: 15px 15px 0px 15px;">
            <button onclick="change_statusofuser()" type="submit" class="btn btn-default">Update Status</button>
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
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

