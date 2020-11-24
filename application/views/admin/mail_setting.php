<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              Mail Setting
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                Mail Setting
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
                  Mail Setting
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
                <form role="form" id="validate_form" method="post">
                  <input type="hidden" name="action" value="mail_setting">
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Registration Form</label>
                        <input type="text" class="form-control" name="registration_subject" placeholder="Registration Subject" value="<?php echo $mail_settings[0]->registration_subject; ?>" required>
                        <textarea name="registration_message" class="form-control" required><?php echo $mail_settings[0]->registration_message; ?></textarea>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Forgot Password Form</label>
                        <input type="text" class="form-control" name="forgot_password_subject" placeholder="Forgot Password Subject" value="<?php echo $mail_settings[0]->forgot_password_subject; ?>" required>
                        <textarea name="forgot_password_message" class="form-control" required><?php echo $mail_settings[0]->forgot_password_message; ?></textarea>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Contact Form</label>
                        <input type="text" class="form-control" name="contact_subject" placeholder="Contact Subject" value="<?php echo $mail_settings[0]->contact_subject; ?>" required>
                        <textarea name="contact_message" class="form-control" required><?php echo $mail_settings[0]->contact_message; ?></textarea>
                      </div>
                    </div>
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