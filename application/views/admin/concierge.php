<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Concierges</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Concierges</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12">
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
              
               <?php if($this->session->flashdata('successemail')){ ?>
                  <div class="alert alert-success"> 
                    <?php  echo $this->session->flashdata('successemail'); ?>
                </div>
              <?php } ?>
              <table id="example" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Photo</th>
                    <th>Brand</th>
                    <th>Last Seen</th>
                    <th>Size</th>
                    <th>Message</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $inc=1;
                    foreach($concierges as $concierge){ 
                        $brand=$this->action->select("brands", array("id"=>$concierge->brand));
                        ?>  
                        <tr>
                            <td><?php echo $inc++; ?></td>
                            <td><img src="<?php echo base_url()."uploads/concierge/".$concierge->upload_photo; ?>" style="height: 100px"/></td>
                            <td><?php echo @$brand[0]->brand_name; ?></td>
                            <td><?php echo @$concierge->last_seen; ?></td>
                            <td><?php echo @$concierge->size; ?></td>
                            <td><?php echo @$concierge->message; ?></td>
                            <td> <a href="javascript:sendemail(<?php echo @$concierge->user_id; ?>)">
                                    Send Email
                                </a></td>
                            <td>
                                <a href="javascript:sendInvoice(<?php echo $concierge->id; ?>)">
                                    Send Invoice
                                </a>
                                | <a href="<?php echo base_url(); ?>admin/concierge/delete/<?php echo $concierge->id; ?>" onclick="return confirm('Are you sure you want to delete this record?');">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        <?php 
                    } 
                    ?>
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

<!-- Modal -->
<div id="sendInvoice" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form method="post">
            <input type="hidden" name="action" value="send_invoice">
            <input type="hidden" name="concierge_id">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modal Header</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="admin_message">Message:</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="admin_message" id="admin_message" placeholder="Enter Message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div id="sendemail" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action="<?php echo base_url(); ?>Admincontroller/send_email" method="post">
            
            <input type="hidden" name="concierge_id">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Email Send</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="admin_message">Email:</label>
                        <div class="col-sm-12">
                            <input type="text" name="email" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="admin_message">Message:</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="admin_message" id="admin_message" placeholder="Enter Message" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
function sendInvoice(id){
    $('[name="concierge_id"]').val(id);
    $("#sendInvoice").modal("show");
}    

function sendemail(id){
      $('[name="concierge_id"]').val(id);
      $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>Admincontroller/getemailaddress',
            data:{id:id},
            dataType:'json',
            success: function(data)
            {
              $('[name="email"]').val(data.data.email);
              $("#sendemail").modal("show"); 
            }
          });
}    
</script>