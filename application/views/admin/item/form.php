<?php $this->load->view('includes/admin/header'); ?>
<?php
if($action=="edit"){
  foreach($edit_item[0] as $key=>$item_data){
      $item[$key]=$item_data;
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <?php if($action=="add"){ ?>
                Add Item
              <?php } else { ?>
                Edit Item
              <?php } ?> 
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                <?php if($action=="add"){ ?>
                  Add Item
                <?php } else { ?>
                  Edit Item
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
                    Add Item
                  <?php } else { ?>
                    Edit Item
                  <?php } ?>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" id="validate_form" method="post" enctype="multipart/form-data">
                  <?php if($action=="add"){ ?>
                    <input type="hidden" name="action" value="add_item">
                  <?php } else { ?>
                    <input type="hidden" name="action" value="edit_item">
                  <?php } ?>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Item Name</label>
                        <input type="text" name="item_name" class="form-control" placeholder="Item Name" value="<?php echo @$item['item_name']?>" required>
                      </div>
                    </div>
					<?php if(!empty($categorys)){ ?>
						<div class="col-sm-6">
						  <div class="form-group">
							<label>Category</label>
							<div class="drop_category">
								<select name="category" class="form-control" required>
								  <option value="">--Select--</option>
								  <?php foreach($categorys as $category){ ?>
									<option value="<?php echo $category->id; ?>" <?php if(@$item['category']==$category->id){ echo "selected"; } ?>>
									  <?php echo $category->category_name; ?>
									</option>
								  <?php } ?>
								</select>
							</div>
						  </div>
						</div>
					<?php } ?>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Subcategory</label>
							<div class="subcat_ajax">
								<select name="subcategory" class="form-control" disabled readonly>
									<option value="">--Select--</option>
								</select>
							</div>
						</div>
                    </div>
					<?php if(!empty($products)){ ?>
						<div class="col-sm-6">
						  <div class="form-group">
							<label>Product</label>
							<div class="subproduct_ajax">
								<select name="product" class="form-control" disabled readonly>
								  <option value="">--Select--</option> 
								</select>
							</div>
						  </div>
						</div>
					<?php } ?>
					<div class="col-sm-6">
					  <div class="form-group">
						<label>Size</label>
						<div class="size_ajax">
							<select name="size" class="form-control" disabled readonly>
							  <option value="">--Select--</option> 
							</select>
						</div>
					  </div>
					</div>
					<?php if(!empty($brands)){ ?>
						<div class="col-sm-6">
						  <div class="form-group">
							<label>Brand</label>
							<select name="brand" class="form-control" required>
							  <option value="">--Select--</option>
							  <?php foreach($brands as $brand){ ?>
								<option value="<?php echo $brand->id; ?>" <?php if(@$item['brand']==$brand->id){ echo "selected"; } ?>>
								  <?php echo $brand->brand_name; ?>
								</option>
							  <?php } ?>
							</select>
						  </div>
						</div>
						<div class="col-sm-6 other_brand" style="display: none;">
						  <div class="form-group">
							<label>Other Brand</label>
							<input type="text" name="other_brand" class="form-control" placeholder="Other Brand" value="<?php echo @$item['other_brand']?>">
						  </div>
						</div>
					<?php } ?>	
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" min="0" placeholder="Price" value="<?php echo @$item['price']?>" required>
                      </div>
                    </div>
					<?php if(!empty($materials)){ ?>
						<div class="col-sm-6">
						  <div class="form-group">
							<label>Material</label>
							<select name="material" class="form-control" required>
							  <option value="">--Select--</option>
							  <?php foreach($materials as $material){ ?>
								<option value="<?php echo $material->id; ?>" <?php if(@$item['material']==$material->id){ echo "selected"; } ?>>
								  <?php echo $material->material_name; ?>
								</option>
							  <?php } ?>
							</select>
						  </div>
						</div>
					<?php } ?>
					<?php if(!empty($colors)){ ?>	
						<div class="col-sm-6">
						  <div class="form-group">
							<label>Color</label>
							<select name="color" class="form-control" required>
							  <option value="">--Select--</option>
							  <?php foreach($colors as $color){ ?>
								<option value="<?php echo $color->id; ?>" <?php if(@$item['color']==$color->id){ echo "selected"; } ?>>
								  <?php echo $color->color_name; ?>
								</option>
							  <?php } ?>
							</select>
						  </div>
						</div>
					<?php } ?>	
					<?php if(!empty($conditions)){ ?>
						<div class="col-sm-6">
						  <div class="form-group">
							<label>Condition</label>
							<select name="condition" class="form-control" required>
							  <option value="">--Select--</option>
							  <?php foreach($conditions as $condition){ ?>
								<option value="<?php echo $condition->id; ?>" <?php if(@$item['condition']==$condition->id){ echo "selected"; } ?>>
								  <?php echo $condition->condition_name; ?>
								</option>
							  <?php } ?>
							</select>
						  </div>
						</div>
					<?php } ?>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="customFile">Item Image</label>
                        <div class="custom-file">
                          <input type="file" name="item_image" class="custom-file-input" id="customFile" <?php if(@$action=='add'){ echo "required"; } ?>>
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
					<?php if(!empty($list_items)){ ?>
						<div class="col-sm-6">
						  <div class="form-group">
							<label>How long to list item</label>
							<select name="how_long_to_list_item" class="form-control" required>
							  <option value="">--Select--</option>
							  <?php foreach($list_items as $list){ ?>
								<option value="<?php echo $list->id; ?>" <?php if(@$item['how_long_to_list_item']==$list->id){ echo "selected"; } ?>>
								  <?php echo $list->list_item_name; ?>
								</option>
							  <?php } ?>
							</select>
						  </div>
						</div>
					<?php } ?>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>User</label>
                        <select name="item_user_id" class="form-control" required>
                          <option value="">--Select--</option>
                          <?php foreach($users as $user){ ?>
                            <option value="<?php echo $user->id; ?>" <?php if(@$item['item_user_id']== $user->id){ echo "selected"; } ?>>
                              <?php echo $user->first_name." ".$user->last_name; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>										
					<div class="col-sm-6">                      
						<div class="form-group">                        
							<label>Item Status</label>												
							<select name="item_status" class="form-control" required>							
								<option value="">--Select--</option>							
								<option value="1" <?php if(@$item['item_status']==1){ echo 'selected'; }?>>Publish</option>							
								<option value="2" <?php if(@$item['item_status']==2){ echo 'selected'; }?>>Un-publish</option>							
								<option value="3" <?php if(@$item['item_status']==3){ echo 'selected'; }?>>Draft</option>						
							</select>                      
						</div>                    
					</div>
					<div class="col-sm-12">
						<div class="form-group">
							<label>Description</label>
							<textarea name="description" class="form-control" placeholder="Description" required><?php echo @$item['description']?></textarea>
						</div>
                    </div>
                  </div>
                  <div class="form-group edit_profile">
                    <?php if($action=="edit"){ ?>
                      <img src="<?php echo base_url()."uploads/item/".@unserialize($item['item_image'])[0]; ?>"/>
                    <?php } ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('[name="brand"]').change(function(){
        var value=$(this).val();
        if(value=="298"){
            $(".other_brand").show().find("input").attr("required", true).val("");
        }
        else{
            $(".other_brand").hide().find("input").removeAttr("required").val("");
        }
    });
	$(".drop_category > select").change(function(){
		$.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>admin/ajax_call",
			data: {
				action: "get_subcategory",
				category_id: $(this).val(), 
			}
		})
		.done(function( msg ) {
			$(".subcat_ajax").html(msg);
		});

		$.ajax({
			method: "POST",
			url: "<?php echo base_url(); ?>admin/ajax_call",
			data: {
				action: "get_product",
				category_id: $(this).val(), 
			}
		})
		.done(function( msg ) {
			$(".subproduct_ajax").html(msg);
			getSize(0);
		});
	});
});
function getProduct(subcategory_id){
	$.ajax({
		method: "POST",
		url: "<?php echo base_url(); ?>admin/ajax_call",
		data: {
			action: "get_product",
			subcategory_id: subcategory_id, 
		}
	})
	.done(function( msg ) {
		$(".subproduct_ajax").html(msg);
		getSize(subcategory_id);
	});
}
function getSize(subcategory_id){
    $.ajax({
		method: "POST",
		url: "<?php echo base_url(); ?>admin/ajax_call",
		data: {
			action: "get_size",
			category_id: $('[name="category"]').val(),
			subcategory_id: subcategory_id, 
		}
	})
	.done(function( msg ) {
		$(".size_ajax").html(msg);
	});
}
</script>
<?php $this->load->view('includes/admin/footer'); ?> 