<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              General Setting
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                General Setting
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
                  General Setting
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
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
                <form role="form" id="validate_form" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="action" value="general_setting">
                  <div class="row">

                    <?php foreach($settings as $setting_data){ ?>
                      <div class="col-sm-12">
                        <!-- text input -->
                        <div class="form-group">
                          <label>
                            <?php echo ucwords(str_replace("_", " ", $setting_data->meta_key)); ?></label>						  						  
                        <?php if($setting_data->input_type=="textarea"){ ?>						  							
                            <textarea class="form-control" name="<?php echo $setting_data->meta_key; ?>" maxlength="<?php echo $setting_data->max_length; ?>" required><?php echo $setting_data->meta_value; ?></textarea>
                        <?php } else { ?>
                          <input type="<?php echo $setting_data->input_type; ?>" name="<?php echo $setting_data->meta_key; ?>" class="form-control" value="<?php echo $setting_data->meta_value; ?>" 
                        <?php if($setting_data->input_type != 'file') {?>maxlength="<?php echo $setting_data->max_length; ?>" <?php } ?> 
                        <?php if($setting_data->input_type == 'file' &&  $setting_data->meta_value != '') {?>
                        <?php }else{ echo 'required';} ?> 
                          >						  						


                        <?php } ?>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                  	<button type="submit" class="btn btn-primary">Update</button>
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