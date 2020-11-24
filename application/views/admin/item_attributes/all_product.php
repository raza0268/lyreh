<?php $this->load->view('includes/admin/header'); ?>
<?php
foreach($get_category as $category){
	$cat_name[$category->id]=$category->category_name;
}
foreach($get_subcategory as $subcategory){
	$subcat_name[$subcategory->id]=$subcategory->subcategory_name;
}
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0 text-dark">All Products</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">All Products</li>

            </ol>

          </div><!-- /.col -->

        </div><!-- /.row -->

      </div><!-- /.container-fluid -->

    </div>

    <!-- /.content-header -->



    <!-- Main content -->

    <section class="content">

      <div class="row">

        <div class="col-12">

          <div class="card">

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

              <div class="row">

                <div class="col-12 text-right">

                  <button class="btn btn-default" onclick="window.location='<?php echo base_url(); ?>admin/attribute/product/add'">

                    Add Product

                  </button>

                  <hr/>

                </div>

              </div>

              <table id="example" class="table table-bordered table-hover">

                <thead>

                  <tr>

                    <th>Sr.No.</th>

					<th>Category Name</th>
					
                    <th>Subcategory Name</th>
					
					<th>Product Name</th>

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                <?php 

                  $inc=1;

                  foreach($all_products as $product){

                  ?>  

                  <tr>

                    <td><?php echo $inc++; ?></td>

					<td><?php echo @$cat_name[$product->category_id]; ?></td>
					
                    <td><?php echo @$subcat_name[$product->subcategory_id]; ?></td>
					
					<td><?php echo $product->product_name; ?></td>

                    <td>

                      <a href="<?php echo base_url(); ?>admin/attribute/product/edit/<?php echo $product->id; ?>">Edit</a>

                      | <a href="<?php echo base_url(); ?>admin/attribute/product/delete/<?php echo $product->id; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>

                    </td>

                  </tr>

                <?php } ?>

                </tbody>

              </table>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->

        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

    </section>

    <!-- /.content -->

</div>

<?php $this->load->view('includes/admin/footer'); ?> 