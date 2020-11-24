<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transaction Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaction Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <div class="container-fluid">
        <div class="row">
        <hr/>
  <section class="col-lg-12 connectedSortable">
    <form method="POST" id="validate_form" method="post"  action="search_orders">
     
    <div class="card">
            <div class="card-body">
              <h4>Filter</h4>
              <div class="row">
                    <div class="col-sm-4">
                          <div class="form-group">
                             <label>Select a Customer</label>      
                                <select class="form-control" name="customer_id" required>
                                     <option value="">Select a Customer</option>
                                  <?php foreach ($customer as $key => $value) {?>
                                      <option value="<?= $value->id ?>"><?= $value->first_name ?> <?= $value->last_name ?></option>
                                  <?php } ?>
                                </select>
                           </div>
                    </div>
                    <div class="col-sm-4">
                          <div class="form-group">
                             <label>Date To</label>      
                                <input type="date" name="date_to" class="form-control"> 
                           </div>
                    </div>
                    <div class="col-sm-4">
                          <div class="form-group">
                             <label>Date From</label>      
                                <input type="date" name="date_from" class="form-control"> 
                           </div>
                    </div>
            </div>
            <div class="row">
               <div class="col-sm-3">
                          <div class="form-group">
                             
                                <button type="submit" class="btn btn-primary">Search</button>
                           </div>
                    </div>
              
            </div>
            </div>
    </div>
    </form>
    <div class="card">
      <div class="card-body">
        <h4>Total Orders</h4>
            <table id="example" class="table table-bordered table-hover dataTable no-footer" role="grid" >
                <thead>
                     <tr>
                         <th>Date Time</th>
                         <th>Order Id</th>
                         <th>Buyer Name</th>
                         <th>Products Name</th>
                         <th>Total Qty</th>
                         <th>Total Price</th>
                         <th>Payment Method</th>
                         <th>Payment Status</th>
                     </tr>
                </thead>
                <tbody>
                      <?php if(isset($orders)){ ?>
                     <?php foreach ($orders as $key => $value):?>
                        <tr>
                            <td><?php   
                              $date1 = explode(' ',$value->created_at);
                              echo $date1[0].'<br/>'.$date1[1];
                              ?>
                            </td>
                            <td><?= $value->order_id; ?></td>
                            <td><?= $value->billing_fname.' '.$value->billing_lname; ?></td>
                            <td>
                            <?php 
                            foreach(unserialize($value->item_record) as $rec => $val){
                              echo $rec.'<br/>';
                            } 
                            ?>  
                            </td>
                          <td>
                            <?php 
                            $qty = 0;
                            foreach(unserialize($value->item_record) as $rec => $val){
                              $qty = $qty + $val['qty']; 
                            } 
                            echo $qty;
                            ?> 
                          </td>
                          <td><?= $value->total_price; ?></td>
                          <td><?= $value->payment_mode; ?></td>
                          <td><?= $value->payment_status; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php  }?>
                </tbody>
          </table>
        </div>
    </div>

    <div class="card">
            <div class="card-body">
        <h4>Products List</h4>
    <table id="example2" class="table table-bordered table-hover dataTable no-footer" role="grid" >
        <thead>
             <tr>
                 <th>Item Image</th>
                 <th>Product id</th>
                 <th>Product Name</th>
                 <th>Slug</th>
                 <th>Category</th>
                 <th>Brand</th>
                 <th>Price</th>
                 <th>Description</th>
             </tr>
        </thead>
        <tbody>
          <?php if(isset($products)){ ?>
          <?php foreach ($products as $key => $prod) {?>
               <tr>
                   <td><img src="<?php echo base_url()."uploads/item/".@unserialize($prod->item_image)[0]; ?>" width="100px"></td>
                   <td><?= $prod->id?></td>
                   <td><?= $prod->item_name?></td>
                   <td><?= $prod->slug?></td>
                   <td>
                     <?php @$namecat =  get_category($prod->category);
                     echo @$namecat->category_name;
                      ?>

                   </td>
                   <td><?php @$namebrand =  get_brand($prod->brand);
                     echo @$namebrand->brand_name;
                      ?></td>
                   <td><?= $prod->price?></td>
                   <td><?= $prod->description?></td>
                   
               </tr>
          <?php } }?>
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
