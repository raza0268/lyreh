<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <?php if($action=="add"){ ?>
                Add Product
              <?php } else { ?>
                Edit Product
              <?php } ?> 
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                <?php if($action=="add"){ ?>
                  Add Product
                <?php } else { ?>
                  Edit Product
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
                    Add Product
                  <?php } else { ?>
                    Edit Product
                  <?php } ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="validate_form" method="post" enctype="multipart/form-data">
                  <?php if($action=="add"){ ?>
                    <input type="hidden" name="action" value="add_product">
                  <?php } else { ?>
                    <input type="hidden" name="action" value="edit_product">
                  <?php } ?>
                  <div class="row">
					<div class="col-sm-12">
                      <div class="form-group">
                        <label>Category Name</label>
                        <select name="category_id" class="form-control">
							<option value="">--Select--</option>
							<?php foreach($get_category as $category){ ?>
								<option value="<?php echo $category->id; ?>" <?php if(@$category->id==@$edit_product[0]->category_id){ echo "selected"; }?>>
									<?php echo $category->category_name; ?>
								</option>
							<?php } ?>
						</select>
                      </div>
                    </div>
					<div class="col-sm-12">
                      <div class="form-group">
                        <label>Subcategory Name</label>
                        <select name="subcategory_id" class="form-control">
							<option value="">--Select--</option>
							<?php foreach($get_subcategory as $subcategory){ ?>
								<option value="<?php echo $subcategory->id; ?>" <?php if(@$subcategory->id==@$edit_product[0]->subcategory_id){ echo "selected"; }?>>
									<?php echo $subcategory->subcategory_name; ?>
								</option>
							<?php } ?>
						</select>
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" class="form-control" placeholder="Product Name" value="<?php echo @$edit_product[0]->product_name; ?>" required/>
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