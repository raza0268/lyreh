<?php $this->load->view('includes/admin/header'); ?>
<?php
if($action=="edit"){
  foreach($edit_page[0] as $key=>$page_data){
      $page[$key]=$page_data;
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
                Add Page
              <?php } else { ?>
                Edit Page
              <?php } ?> 
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                <?php if($action=="add"){ ?>
                  Add Page
                <?php } else { ?>
                  Edit Page
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
                    Add Page
                  <?php } else { ?>
                    Edit Page
                  <?php } ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="validate_form" method="post" enctype="multipart/form-data">
                  <?php if($action=="add"){ ?>
                    <input type="hidden" name="action" value="add_page">
                  <?php } else { ?>
                    <input type="hidden" name="action" value="edit_page">
                  <?php } ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <!-- text input -->
                      <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Title" value="<?php echo @$page['title']?>" required>
                      </div>
                    </div>		
					<?php if(@$page['page_type']=="dynamic"){ ?>
						<div class="col-sm-12">
						  <div class="form-group">
							<label>Content</label>
							<textarea name="content" class="form-control" placeholder="Content" required><?php echo @$page['content']?></textarea>
						  </div>
						</div>					
					<?php } ?>						
					<div class="col-sm-12">                      
						<div class="form-group">                        
							<label>Fontawesome Icon</label>                        
							<input type="text" name="icon" class="form-control" placeholder="Fontawesome Icon" value="<?php echo @$page['icon']?>" required>                      
						</div>                    
					</div>
					<div class="col-sm-12">                      
						<div class="form-group">                        
							<label>Show in menu</label>                        
							<select name="show_in_menu" class="form-control" required>  
								<option value="">--Select--</option>
								<option value="1" <?php if(@$page['show_in_menu']==1){ echo "selected"; }?>>True</option>
								<option value="0" <?php if(@$page['show_in_menu']==0){ echo "selected"; }?>>False</option>
							</select>	
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