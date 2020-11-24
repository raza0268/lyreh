<?php $this->load->view('includes/admin/header'); ?>
<?php
if($action=="edit"){
  foreach($edit_attr[0] as $key=>$attr_data){
    $att[$key]=$attr_data;
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
                Add <?php echo ucfirst($attr); ?>
              <?php } else { ?>
                Edit <?php echo ucfirst($attr); ?>
              <?php } ?> 
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                <?php if($action=="add"){ ?>
                  Add <?php echo ucfirst($attr); ?>
                <?php } else { ?>
                  Edit <?php echo ucfirst($attr); ?>
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
                    Add <?php echo ucfirst($attr); ?>
                  <?php } else { ?>
                    Edit <?php echo ucfirst($attr); ?>
                  <?php } ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="validate_form" method="post" enctype="multipart/form-data">
                  <?php if($action=="add"){ ?>
                    <input type="hidden" name="action" value="add_<?php echo $attr; ?>">
                  <?php } else { ?>
                    <input type="hidden" name="action" value="edit_<?php echo $attr; ?>">
                  <?php } ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label><?php echo ucfirst($attr); ?> Name</label>						<?php 						if($attr=='list_item'){							$input_type="number";							}						else{							$input_type="text";							}						?>
                        <input type="<?php echo $input_type; ?>" name="<?php echo $attr; ?>_name" class="form-control" placeholder="<?php echo ucfirst($attr); ?> Name" value="<?php echo @$att[$attr.'_name']; ?>" required>
                      </div>
                    </div>
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