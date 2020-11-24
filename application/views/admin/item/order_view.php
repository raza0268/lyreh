<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Order Detail
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<div class="row">
	              	<div class="col-md-6">
		                <div class="form-group">
							<label>Order ID:</label>
						    <span><?php echo $single_order[0]->order_id; ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Payment Mode:</label>
						    <span><?php echo ucfirst($single_order[0]->payment_mode); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Payment Status:</label>
						    <span><?php echo ucfirst($single_order[0]->payment_status); ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Total Price:</label>
						    <span><?php echo $single_order[0]->total_price; ?></span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Order Date:</label>
						    <span><?php echo $single_order[0]->created_at; ?></span>
						</div>
					</div>
				</div>
				<?php if($single_order[0]->order_notes!=""){ ?>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label>Order Notes:</label>
							    <div><?php echo $single_order[0]->order_notes; ?></div>
							</div>
						</div>
					</div>
				<?php } ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->		
          <!-- right column -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Billing Detail
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
					<label>First Name:</label>
				    <span><?php echo $single_order[0]->billing_fname; ?></span>
				</div>
				<div class="form-group">
					<label>Last Name:</label>
				    <span><?php echo $single_order[0]->billing_lname; ?></span>
				</div>
				<div class="form-group">
					<label>Email:</label>
				    <span><?php echo $single_order[0]->billing_email; ?></span>
				</div>
				<div class="form-group">
					<label>Phone:</label>
				    <span><?php echo $single_order[0]->billing_phone; ?></span>
				</div>
				<div class="form-group">
					<label>Country:</label>
				    <span><?php echo $single_order[0]->billing_country; ?></span>
				</div>
				<div class="form-group">
					<label>Address:</label>
				    <span><?php echo $single_order[0]->billing_address; ?></span>
				</div>
				<div class="form-group">
					<label>State:</label>
				    <span><?php echo $single_order[0]->billing_state; ?></span>
				</div>
				<div class="form-group">
					<label>Zip:</label>
				    <span><?php echo $single_order[0]->billing_zip; ?></span>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
          <div class="col-md-6">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Shipping Detail
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
					<label>First Name:</label>
				    <span><?php echo $single_order[0]->shipping_fname; ?></span>
				</div>
				<div class="form-group">
					<label>Last Name:</label>
				    <span><?php echo $single_order[0]->shipping_lname; ?></span>
				</div>
				<div class="form-group">
					<label>Email:</label>
				    <span><?php echo $single_order[0]->shipping_email; ?></span>
				</div>
				<div class="form-group">
					<label>Phone:</label>
				    <span><?php echo $single_order[0]->shipping_phone; ?></span>
				</div>
				<div class="form-group">
					<label>Country:</label>
				    <span><?php echo $single_order[0]->shipping_country; ?></span>
				</div>
				<div class="form-group">
					<label>Address:</label>
				    <span><?php echo $single_order[0]->shipping_address; ?></span>
				</div>
				<div class="form-group">
					<label>State:</label>
				    <span><?php echo $single_order[0]->shipping_state; ?></span>
				</div>
				<div class="form-group">
					<label>Zip:</label>
				    <span><?php echo $single_order[0]->shipping_zip; ?></span>
				</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Product Detail
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table">
                	<tr>
                		<th>Sr.No.</th>
                		<th>Item Name</th>
                		<th>Item Price</th>
                		<th>Quantity</th>
                		<th>Subtotal</th>
                	</tr>
                	<?php 
                	$inc=1;
                	$total=0;
                	foreach(unserialize($single_order[0]->item_record) as $item_name=>$order){
                		$total=$total+$order['subtotal'];
                		?>
	                	<tr>
	                		<td><?php echo $inc++; ?></td>
	                		<td><?php echo $item_name; ?></td>
	                		<td><?php echo $order['price']; ?></td>
	                		<td><?php echo $order['qty']; ?></td>
	                		<td><?php echo $order['subtotal']; ?></td>
	                	</tr>
	                <?php } ?>
	                <tr>
                		<th></th>
                		<th></th>
                		<th></th>
                		<th>Total</th>
                		<th><?php echo $total; ?></th>
                	</tr>
                </table>

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