<?php $this->load->view('includes/front/front_header'); ?>
<?php 
    foreach($settings as $setting){
        $sett[$setting->meta_key]=$setting->meta_value;
    }
?>
<div class="site-section bg-light main-back">
  <div class="container">
    <div class="row">
        <div class="col-lg-12 contact-head">
            <h4>Get in Touch</h4>
            <p>We’re always here to help. Just drop us a note by completing the form below.</p>
        </div>
      <div class="col-lg-6 left-form">
        <div class="section-title mb-5 paragraphy">
          <h2>Contact Us</h2> 
        </div>
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
        <form id="validate_form" method="post">
          <input type="hidden" name="action" value="contact_us">
          <div class="row">
            <div class="col-md-12 buzz form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" class=" contact-fr form-control form-control-lg" required>
            </div>
            <div class="col-md-12 buzz form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="contact-fr form-control form-control-lg" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 buzz form-group">
                <label for="email_address">Email Address</label>
                <input type="email" id="email_address" name="email_address" class="contact-fr form-control form-control-lg" required>
            </div>
            <div class="col-md-12 buzz form-group">
                <label for="phone_number">Phone Number</label>
                <input type="number" id="phone_number" name="phone_number" min="0" class="contact-fr form-control form-control-lg" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 msgb form-group">
              <label for="message">Message</label>
              <textarea id="message" name="message" cols="30" rows="10" class="contact-fr form-control" required></textarea>
            </div>
          </div>
          <div class="row">
            <div class=" bottom-btn  con-button">
              <input type="submit" value="Send Message" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div>
	  <div class="col-lg-6 con-info">
	      <div class="coninsert">
        	  <h4>contact info</h4>
        	  <p>
        	      Welcome to the online home of Lyreh. The new home of recommerce and your answer to fashion sustainability! or suggestions, you can fill the contact form below and we will come back to you ASAP. Or you can reach us by email on contact@lyreh.com
        	      
        	      <!--<?php echo $sett['help_content']; ?>-->
        	      </p>
        	  <ul>
            	  <!--<li><i class="fa fa-paper-plane"></i> <?php echo $sett['address']; ?></li>-->
                  <!--<li><i class="fa fa-phone"></i> Call: +1800-123-4567</li>-->
                  <li><i class="fa fa-envelope"></i> Email: <?php echo $sett['email']; ?></li>
        	  </ul>
    	  </div>
	  </div>
    </div>
  </div>
</div>
<br/>
<?php $this->load->view('includes/front/front_footer'); ?>
