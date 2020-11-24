<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Items</li>
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
					<button class="btn btn-default" onclick="window.location='<?php echo base_url(); ?>admin/item/add'">Add Item</button>
					<hr/>
                </div>
              </div>
              <table id="example" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Image</th>
                    <th>Item Name</th>
                    <th>Item Price</th>
                    <th>Material</th>
                    <th>Color</th>										
					<th>Item Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $inc=1;
                  foreach($items as $item){ ?>  
                  <tr>
                    <td><?php echo $inc++; ?></td>
                    <td><img src="<?php echo base_url()."uploads/item/".@unserialize($item->item_image)[0]; ?>" width="100px"></td>
                    <td><?php echo $item->item_name; ?></td>
                    <td>$<?php echo $item->price; ?></td>
                    <td><?php echo ucfirst($item->material); ?></td>
                    <td><?php echo ucfirst($item->color); ?></td>										
                    <td>						
                        <select class="form-control" onchange="changestatus(this.value,'<?php echo $item->id; ?>')">							
                            <option value=""></option>							
                            <option value="1" <?php if($item->item_status==1){ echo 'selected'; }?>>Publish</option>							
                            <option value="2" <?php if($item->item_status==2){ echo 'selected'; }?>>Un-publish</option>							
                            <option value="3" <?php if($item->item_status==3){ echo 'selected'; }?>>Draft</option>						
                        </select>					
                    </td>
                    <td>
                      <a class="btn btn-info btn-block"  href="<?php echo base_url(); ?>admin/item/edit/<?php echo $item->id; ?>">Edit</a>
                      <!--  <a href="<?php echo base_url(); ?>admin/item/delete/<?php echo $item->id; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a> -->
                      <button type="button" class="btn btn-danger btn-block" onclick="calltodelete('<?php echo $item->id; ?>')">Delete</button>
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
    <script type="text/javascript">
      function calltodelete(id){
           $.confirm({
            title: 'Delete',
            content: 'Are you sure to want to delete ?',
            icon: 'fa fa-trash',
            theme: 'supervan',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            buttons: {
            Delete: function () {
              location.href = '<?php echo base_url(); ?>admin/item/delete/'+id;
          },
          Cancel: function () {}
        }
      });

      }

      function changestatus(status,id){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Admincontroller/changestatus",
            data: {
                status: status, 
                id: id, 
            },
            dataType:'json',
            success: function(data)
            {
              location.reload();
            }
          });
      
      }
    </script>
</div>
<?php $this->load->view('includes/admin/footer'); ?> 