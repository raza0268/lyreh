<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Contacts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">All Contacts</li>
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
              <table id="example" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $inc=1;
                  foreach($contacts as $contact){ ?>  
                  <tr>
                    <td><?php echo $inc++; ?></td>
                    <td><?php echo $contact->first_name." ".$contact->last_name; ?></td>
                    <td><?php echo $contact->email_address; ?></td>
                    <td><?php echo $contact->phone_number; ?></td>
                    <td><?php echo $contact->message; ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>admin/contact/delete/<?php echo $contact->id; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
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