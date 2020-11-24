<?php $this->load->view('includes/admin/header'); ?>
<?php
if($action=="edit"){
  foreach($edit_user[0] as $key=>$user_data){
      $user[$key]=$user_data;
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <?php if($action=="add"){ ?>
                Add User
              <?php } else { ?>
                Edit User
              <?php } ?> 
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                <?php if($action=="add"){ ?>
                  Add User
                <?php } else { ?>
                  Edit User
                <?php } ?>
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
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  <?php if($action=="add"){ ?>
                    Add User
                  <?php } else { ?>
                    Edit User
                  <?php } ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="validate_form" method="post" enctype="multipart/form-data">
                  <?php if($action=="add"){ ?>
                    <input type="hidden" name="action" value="add_user">
                  <?php } else { ?>
                    <input type="hidden" name="action" value="edit_user">
                  <?php } ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo @$user['first_name']?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo @$user['last_name']?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo @$user['email']?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required <?php if(@$action=='edit'){ echo "readonly disabled"; } ?>>
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
                        <label>Role</label>
                        <select class="form-control" name="role" required>
                        	<option value="">--Select--</option>
                        	<option value="admin" <?php if(@$user['role']=='admin'){ echo "selected"; } ?>>Admin</option>
                        	<option value="customer" <?php if(@$user['role']=='customer'){ echo "selected"; } ?>>Customer</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group edit_profile">
                    <?php if($action=="edit"){ ?>
                      <img src="<?php echo base_url()."uploads/".@$user['user_image']; ?>"/>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                  	<button type="submit" class="btn btn-primary">
                    <?php if($action=="add"){ ?>
                      Add
                    <?php } else { ?>
                      Update
                    <?php } ?> 
                    </button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('includes/admin/footer'); ?> 