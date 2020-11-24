<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <form action="<?php echo base_url("Admincontroller/saveEditOrder"); ?>" method="post">
        <input type="hidden" name="orderId" value="<?php echo $single_order[0]->order_id; ?>">
      <div class="row">
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Status and tracking information
                </h3>
              </div>
              <?php if(!empty($this->session->flashdata("error"))){ ?>
              <div class="alert alert-danger">
                <?php echo $this->session->flashdata("error"); ?>
              </div>
            <?php } ?>
              <!-- /.card-header -->
              <div class="card-body">

              	<div class="row">
	              	<div class="col-md-6">
		                <div class="form-group row">
                      <label>Change Status:</label>
                <select class="form-control"  name="statuschange">
                  <option value="">Select Status</option>
                  <option <?php if($single_order[0]->payment_status == "pending"){ echo "selected='selected'"; } ?> value="pending">Pending</option>
                  <option <?php if($single_order[0]->payment_status == "success"){ echo "selected='selected'"; } ?> value="success">Success</option>
                 </select>
              
            </div>
					</div>
        </div>
        <div class="row">
					<div class="col-md-12">
						<div class="form-group row">
							<label>Tracking information:</label>
                <textarea class="form-control trackingInformation" name="trackingInformation" style="height: 124px;" placeholder="Enter tracking information"><?php if(!empty($single_order[0]->trackingInformation)){ echo $single_order[0]->trackingInformation; } ?></textarea>
            </div>
						</div>
					</div>
          <div class="form-group row">
            <button type="submit" class="btn btn-primary">Submit</button>
					</div>


              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->	
        </div>	
          <!-- right column -->
          </form>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('includes/admin/footer'); ?> 