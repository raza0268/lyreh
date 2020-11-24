<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Visitors</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Visitors</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
     <div class="row">
       <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $users; ?></h3>
            <p>Total Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $sessions; ?></h3>
            <p>Total Sessions</p>
          </div>
          <div class="icon">
            <i class="ion ion-calculator"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?php echo $pagesview; ?></h3>
            <p>Total Pages Views</p>
          </div>
          <div class="icon">
            <i class="ion ion-clipboard"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?php echo $newusers; ?></h3>
            <p>New Users</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr/>
</section>




<div class="container-fluid">
    <div class="row">
<section class="col-lg-12 ">
  
     <div class="card">
      <div class="card-body">
        <h4>Total Countries</h4>
        <table id="example" class="table table-bordered table-hover dataTable no-footer" role="grid" >
          <thead>
           <tr>
             <th>Sr.No</th>
             <th>Country Name</th>
             <th>Visitors</th>
           </tr>
         </thead>
         <tbody>
          <?php foreach ($country as $key => $value) {?>
           <tr>
             <td><?php echo $key+1; ?></td>
             <td><?php print_r($value->dimensions[0]) ?></td>
             <td><?php print_r($value->metrics[0]['values'][0]) ?></td>
           </tr>
         <?php } ?>
       </tbody>
     </table>
   </div>
 </div>

</section>

</div>
</div>



<!-- /.content -->
</div>
<?php $this->load->view('includes/admin/footer'); ?> 
