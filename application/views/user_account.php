<?php $this->load->view('includes/front/front_header'); ?>
<div class="site-section account-page mt-5">
  <div class="container" id="account-page123">
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            <div class="text-center">
                <img accept="image/*" class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>uploads/<?php echo $user_data[0]->user_image; ?>" alt="">
            </div>
            <h3 class="profile-username text-center"><?php echo $user_data[0]->first_name." ".$user_data[0]->last_name; ?></h3>
            <p class="text-muted text-center"><?php echo ucfirst($user_data[0]->role); ?></p>
			<?php if(!empty($auth_user_data)){ ?>
				<div class="buttons-both" style="width: 100%;">
					<a href="javascript:followUser(<?php echo $user_data[0]->id; ?>);" class="follow_user follow_<?php echo $user_data[0]->id; ?>">
					<?php
						$follow_user=unserialize($auth_user_data[0]->follow_user);
						if(@in_array($user_data[0]->id, $follow_user)){ 
							echo "Followed";
						}
						else{
							echo "Follow";
						}
					?>
					</a>
				</div>
			<?php } ?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
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
                <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="profile">
                  <form class="form-horizontal" onsubmit="return false;">
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">First Name</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $user_data[0]->first_name; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Last Name</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $user_data[0]->last_name; ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-md-3 col-sm-12 col-xs-12 col-form-label">Email</label>
                      <div class="col-md-9 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="inputName" value="<?php echo $user_data[0]->email; ?>" readonly>
                      </div>
                    </div>
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
<?php $this->load->view('includes/front/front_footer'); ?>