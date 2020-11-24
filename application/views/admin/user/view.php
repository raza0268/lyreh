<?php $this->load->view('includes/admin/header'); ?>
<?php
foreach($view_user[0] as $key=>$user_data){
	$user[$key]=$user_data;
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
              Profile
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                Profile
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
      	<div class="col-md-3">
			<!-- Profile Image -->
			<div class="card card-primary card-outline">
			  <div class="card-body box-profile">
				<div class="text-center">
				  	<img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>uploads/<?php echo $user['user_image']; ?>" alt="">
				</div>
				<h3 class="profile-username text-center"><?php echo $user['first_name']; ?> <?php echo $user['last_name']; ?></h3>
				<p class="text-muted text-center"><?php echo ucfirst($user['role']); ?></p>
			  </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
		</div>
		<!-- /.col -->
		<div class="col-md-9">
			<div class="card">
			  <div class="card-header p-2">
				<ul class="nav nav-pills">
				  <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
				</ul>
			  </div><!-- /.card-header -->
			  <div class="card-body">
				<div class="tab-content">
				  <div class="active tab-pane" id="profile">
					<form class="form-horizontal">
					  <div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label">First Name</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputName" value="<?php echo $user['first_name']; ?>" readonly>
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputName" value="<?php echo $user['last_name']; ?>" readonly>
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputName" value="<?php echo $user['email']; ?>" readonly>
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label">Gender</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputName" value="<?php echo ucfirst($user['gender']); ?>" readonly>
						</div>
					  </div>
					  <div class="form-group row">
						<label for="inputName" class="col-sm-2 col-form-label">Address</label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="inputName" value="<?php echo $user['address']; ?>" readonly>
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
    <!-- /.content -->
</div>
<?php $this->load->view('includes/admin/footer'); ?> 