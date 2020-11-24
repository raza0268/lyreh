<?php $this->load->view('includes/admin/header'); ?>
<?php
if($action=="edit"){
  foreach($edit_faq[0] as $key=>$faq_data){
      $faq[$key]=$faq_data;
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
                Add Faq
              <?php } else { ?>
                Edit Faq
              <?php } ?> 
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                <?php if($action=="add"){ ?>
                  Add Faq
                <?php } else { ?>
                  Edit Faq
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
                    Add Faq
                  <?php } else { ?>
                    Edit Faq
                  <?php } ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="validate_form" method="post" enctype="multipart/form-data">
                  <?php if($action=="add"){ ?>
                    <input type="hidden" name="action" value="add_faq">
                  <?php } else { ?>
                    <input type="hidden" name="action" value="edit_faq">
                  <?php } ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Question</label>
                        <input type="text" name="question" class="form-control" placeholder="Question" value="<?php echo @$faq['question']?>" required>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Answer</label>
                        <textarea name="answer" class="form-control" placeholder="Answer" required><?php echo @$faq['answer']?></textarea>
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