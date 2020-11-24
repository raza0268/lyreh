<?php $this->load->view('includes/admin/header'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Basket Spend</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Basket Spend</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo count($orders); ?></h3>
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo base_url(); ?>admin/order" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo count($items); ?></h3>
                <p>New Items</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo base_url(); ?>admin/item" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo count($users); ?></h3>
                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo base_url(); ?>admin/user" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo count($contacts); ?></h3>
                <p>Contact Records</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="<?php echo base_url(); ?>admin/contact" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <hr/>
        <div class="row">

          <section class="col-lg-12 connectedSortable">
            <pre><?php //print_r($orders) ?></pre>
          <div class="card">
            <div class="card-body">
                <table id="example" class="table table-bordered table-hover dataTable no-footer" role="grid" >
                  <thead>
                    <tr>
                      <th>Product id</th>
                      <th>Product Name</th>
                      <th>Seller Name</th>
                      <th>Buyer Name</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Admin Cut</th>
                      <th>Seller Earning</th>
                      <th>Total of each column</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($orders as $key => $value):?>
                        <tr>
                            <td>
                            <?php 
                            foreach(unserialize($value->item_record) as $rec => $val){
                              $nameofseller = productinfo($rec);
                              if(!empty($nameofseller->id)){
                              echo $nameofseller->id;
                              }
                            } 
                            ?>  
                            </td>
                          <td>
                            <?php 
                            $nameofseller = '';
                            $qty = 0;
                            // echo '<pre>';
                            // print_r(unserialize($value->item_record));
                            // echo '</pre>';
                            foreach(unserialize($value->item_record) as $rec => $val){
                              echo $rec;
                              $nameofseller = productinfo($rec);
                              $qty = $qty + $val['qty'];
                            } 
                            ?> 
                          </td>
                          
                          
                          <td><?php 
                          if(!empty($nameofseller->item_user_id)){
                            $userinfo = userinfo($nameofseller->item_user_id);
                            if(!empty($userinfo->first_name)){
                              echo $userinfo->first_name.' '.$userinfo->last_name;
                            }
                          }
                           ?></td>
                          <td><?= $value->billing_fname.' '.$value->billing_lname; ?></td>
                          <td><?=$qty;?></td>
                          <td><?= $value->total_price; ?></td>
                          <td><?php
                           $totalpricemul = $value->total_price * 5;
                           $total = $totalpricemul / 100;
                           echo $total;
                          ?></td>
                          <td><?= $value->total_price - $total; ?></td>
                          <td><?= $value->total_price; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
          </section>
        </div>
        <hr/>

        
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Sales
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>                         
                   </div> 
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>

         
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">
      
      <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Map card -->
            <div class="card bg-gradient-primary" style="display: none;">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button"
                          class="btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button"
                          class="btn btn-primary btn-sm"
                          data-card-widget="collapse"
                          data-toggle="tooltip"
                          title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('includes/admin/footer'); ?> 
  <script>
    /* Chart.js Charts */
    // Sales chart
    var salesChartCanvas = document.getElementById('revenue-chart-canvas').getContext('2d');
    //$('#revenue-chart').get(0).getContext('2d');

    var salesChartData = {
    labels  : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    datasets: [
      {
      label               : 'Users',
      backgroundColor     : 'rgba(60,141,188,0.9)',
      borderColor         : 'rgba(60,141,188,0.8)',
      pointRadius          : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : [<?php echo join(",", $user_data); ?>]
      },
      {
      label               : 'Orders',
      backgroundColor     : 'rgba(210, 214, 222, 1)',
      borderColor         : 'rgba(210, 214, 222, 1)',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : [<?php echo join(",", $order_data); ?>]
      },
    ]
    }

    var salesChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
      gridLines : {
        display : false,
      }
      }],
      yAxes: [{
      gridLines : {
        display : false,
      }
      }]
    }
    }

    // This will get the first returned node in the jQuery collection.
    var salesChart = new Chart(salesChartCanvas, {
      type: 'line', 
      data: salesChartData, 
      options: salesChartOptions
    }
    )
  </script>