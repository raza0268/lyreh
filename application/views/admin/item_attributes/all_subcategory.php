<?php $this->load->view('includes/admin/header'); ?>
<?php
foreach($get_category as $category){
	$cat_name[$category->id]=$category->category_name;
}
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">

    <!-- Content Header (Page header) -->

    <div class="content-header">

      <div class="container-fluid">

        <div class="row mb-2">

          <div class="col-sm-6">

            <h1 class="m-0 text-dark">All Subcategories</h1>

          </div><!-- /.col -->

          <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">All Subcategories</li>

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

                  <button class="btn btn-default" onclick="window.location='<?php echo base_url(); ?>admin/attribute/subcategory/add'">

                    Add Subcategory

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

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                <?php 

                  $inc=1;

                  foreach($get_subcategory as $subcategory){

                  ?>  

                  <tr>

                    <td><?php echo $inc++; ?></td>

					<td>
						<?php 
							foreach(unserialize($subcategory->category_id) as $category_id){
								echo $cat_name[$category_id].", ";
							}
						?>
					</td>
					
                    <td><?php echo $subcategory->subcategory_name; ?></td>

                    <td>

                      <a href="<?php echo base_url(); ?>admin/attribute/subcategory/edit/<?php echo $subcategory->id; ?>">Edit</a>

                      | <a href="<?php echo base_url(); ?>admin/attribute/subcategory/delete/<?php echo $subcategory->id; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>

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