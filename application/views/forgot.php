<?php $this->load->view('includes/front/front_header'); ?>
   
  <div class="container">
       <br/><br/>
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title mb-5">
          <h2>Forgot Password</h2>
        </div>
        <?php if($this->session->flashdata('error')){ ?>
            <div class="alert alert-danger"> 
              <?php  echo $this->session->flashdata('error'); ?>
            </div>
        <?php } ?>
        <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success">
              <?php  echo $this->session->flashdata(''); ?>
            </div>
        <?php } ?>
        <form id="update_password_form" method="post">
          <input type="hidden" name="action" value="update_password">
          <div class="row">
            <div class="col-md-6 form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control form-control-lg" required>
            </div>
            <div class="col-md-6 form-group">
                <label for="confirm_new_password">Confirm New Password</label>
                <input type="password" id="confirm_new_password" name="confirm_new_password" class="form-control form-control-lg" required>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" value="Update Password" class="btn btn-primary" style='background-color:#17a2b8'>Update Password</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
<br/><br/>
<?php $this->load->view('includes/front/front_footer'); ?>
