<?php $this->load->view('includes/front/front_header'); ?>

<?php 

foreach($settings as $setting){

    $meta_key=$setting->meta_key;

     $$meta_key=$setting->meta_value;

}

?>

<div class="container-fluid home-page">

	<div class="sell-an-item-forms">

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

		<form id="validate_form_sell" method="post" enctype="multipart/form-data">

			<?php if($action=="edit"){ ?>

				<input type="hidden" name="action" value="edit_item"/>

			<?php } else { ?>

				<input type="hidden" name="action" value="add_item"/> 

			<?php } ?>

			<input type="hidden" name="item_user_id" value="<?php echo @$auth_user_data[0]->id; ?>"/>

			<?php 

			$disabled = "";



			$userData =  $this->Crud_model->get_data("","users",["id"=>$_SESSION['auth_user'][0]->id],True); 

				if(empty($userData->stripeAccountId)){

					$disabled = "disabled='disabled'";

			?>

			<div class="alert alert-info">In order to sell your items and receive payment, you'll first need to register a Stripe account and connect with Lyreh. <a href="<?php echo base_url('account?stripeSettings=true'); ?>"> Setup stripe account.</a></div>

			<?php }else{ 

				$userData =  $this->Crud_model->get_data("","users",["id"=>$_SESSION['auth_user'][0]->id],True);

				$keys = $this->Crud_model->get_data("","stripesettings","",True);

			    require_once('application/third_party/stripe-php/init.php');

			    \Stripe\Stripe::setVerifySslCerts(false);

			    \Stripe\Stripe::setApiKey(trim($keys->privateKey));

 				$stripeAccountObj = \Stripe\Account::retrieve($userData->stripeAccountId);
 			// 	print_r($stripeAccountObj);exit;
				if(empty($stripeAccountObj->payouts_enabled)){

					$disabled = "disabled='disabled'";

				?>

				

				<div class="alert alert-info">In order to sell your items and receive payment, you'll first need to register a Stripe account and connect with Lyreh. <a href="<?php echo base_url('account?stripeSettings=true'); ?>"> Setup stripe account.</a></div>

			<?php } } ?>

			<h2>Sell an item</h2>

			<!--<label>Tips on how to sell<span class="tips" title="<?php echo $tips_of_sell; ?>"><i class="fa fa-question" aria-hidden="true"></i></span></label>-->

			<label>Tips On How To Sell<span class="tips"><i class="fa fa-question" aria-hidden="true"></i><span class="classic"><?php if(!empty($tips_of_sell)){ echo $tips_of_sell;} ?></span></span></label>

			

			<div class="sell-form-group">  

				<div class="sell-form">  

				   <h3>Item Name</h3>

				   <div class="text-options">

					  <input type="text" name="item_name"  value="<?php if(!empty($edit_item[0]->item_name)) { echo @$edit_item[0]->item_name;}else{ echo $this->session->flashdata('item_name'); } ?>" required>

				   </div>

				</div>

			</div>

			<?php if(!empty($categorys)){ ?>

				<div class="sell-form-group">  

					<div class="sell-form ">  

					   <h3>Category</h3>

					   <div class="drop-options green99 drop_category">

							<select name="category" required>

							    <option value="">--Select--</option>

							    <optgroup label="Categories">

								<?php foreach($categorys as $category){

										if(!empty($edit_item[0]->category)){

											$cat_id = $edit_item[0]->category;

										}else{

											$cat_id = $this->session->flashdata('category');

										}

									?>															

									<option  value="<?php echo $category->id; ?>" <?php if($cat_id==$category->id){ echo "selected"; } ?>>

										<?php echo $category->category_name; ?>																	

									</option>							

								<?php } ?>	

								</optgroup>

							</select>

					   </div>

					</div>

				</div>

			<?php } ?>

			<div class="sell-form-group">  

				<div class="sell-form">  

				   <h3>Subcategory</h3>

				   <div class="drop-options green99 subcat_ajax">

						<select name="subcategory" disabled readonly>						

							<option  value="">--Select--</option>						

						</select>

				   </div>

				</div>

			</div>

			<?php if(!empty($products)){ ?>

				<div class="sell-form-group">  

					<div class="sell-form">  

					   <h3>Product</h3>

					   <div class="drop-options green99 subproduct_ajax">

							<select name="product" disabled readonly>

								<option value="">--Select--</option>

							</select>

					   </div>

					</div>

				</div>

			<?php } ?>

			<div class="sell-form-group">  

				<div class="sell-form">  

				   <h3>Size</h3>

				   <div class="drop-options green99 size_ajax">

						<select name="size" <?php  if(empty($edit_item[0]->size)){ echo "disabled readonly"; } ?>>

							<option value="">--Select--</option>

							<optgroup label="sizes">

							<?php

								if(!empty($edit_item[0]->size)){

									?>

									<option  value="<?php echo $edit_item[0]->size; ?>" selected>

									  <?php if($edit_item[0]->size == "185"){ echo "Other"; }else{ echo $edit_item[0]->size; } ?>

									</option>

									<?php 

								}

							?>

							</optgroup>

						</select>

				   </div>

				</div>

			</div>

			<?php if(!empty($brands)){ ?>

				<div class="sell-form-group">  

					<div class="sell-form">  

					   <h3>Brand</h3>

					   <div class="drop-options green99 ">

							<select name="brand" required>

								<option value="">--Select--</option>

								<optgroup label="Brands">

								<?php 

								if(!empty($edit_item[0]->other_brand)){

									?>

									<option  value="<?php echo $edit_item[0]->other_brand; ?>" selected>

									  <?php echo "Other"; ?>

									</option>



									<?php 



								}else{



								foreach($brands as $brand){ 

										if(!empty($edit_item[0]->brand)){

											$brand_id = $edit_item[0]->brand;

										}else{

											$brand_id = $this->session->flashdata('brand');

										}

								?>

									<option  value="<?php echo $brand->id; ?>" <?php if($brand_id==$brand->id){ echo "selected"; } ?>>

									  <?php echo $brand->brand_name; ?>

									</option>

								<?php } }  if(empty($edit_item[0]->other_brand)){ ?>

								<option value="600">Other</option>

								<?php } ?>

								</optgroup>

							</select>

					   </div>

					</div>

				</div>

				<!--div class="sell-form-group other_brand" style="display: none;">

				    <div class="sell-form">  

					    <h3>Other Brand</h3>

					    <div class="text-options">

    				        <input type="text"   name="other_brand" value="<?php //if(!empty($edit_item[0]->other_brand)){ echo @$edit_item[0]->other_brand;}else{ echo $this->session->flashdata('other_brand'); } ?>">

    				    </div>

				    </div>

				</div-->

			<?php } ?>

			<div class="sell-form-group">  

				<div class="sell-form">  

				   <h3>Price(<?php echo CURRENCY; ?>)</h3>

				   <div class="text-options">

					  <input type="number" class="price" step=".01"  name="price" required  value="<?php if(!empty($edit_item[0]->price)){ echo @$edit_item[0]->price;}else{ echo $this->session->flashdata('price'); } ?>" pattern="^\d*(\.\d{0,2})?$">

				   </div>

				</div>

			</div>

			<div class="sell-form-group">  

				<div class="sell-form">  

				   <h3>Postage Fee(<?php echo CURRENCY; ?>)</h3>

				   <div class="text-options">

					  <input type="number" step=".01" class="postage_fee"  name="postage_fee" value="<?php if(!empty($edit_item[0]->postage_fee)){ echo @$edit_item[0]->postage_fee;}else{ echo $this->session->flashdata('postage_fee'); } ?>" required pattern="^\d*(\.\d{0,2})?$">

				   </div>

				</div>

			</div>

			<?php if(!empty($materials)){ ?>

				<div class="sell-form-group">

					<div class="sell-form"> 									

						<h3>Material</h3>	 

						<div class="drop-options green99">						

							<select name="material" required>							

								<option value="">--Select--</option>

								<optgroup label="Materials">

								<?php 

								if($edit_item[0]->other_material){

								?>



								<option value="<?php echo $edit_item[0]->other_material; ?>" selected>

										<?php echo "Other"; ?>																	

									</option>	



								<?php

								}else{



								foreach($materials as $material){ 

										if(!empty($edit_item[0]->brand)){

											$material_id = $edit_item[0]->material;

										}else{

											$material_id = $this->session->flashdata('material');

										}

								?>															

									<option value="<?php echo $material->id; ?>" <?php if(@$material_id==$material->id){ echo "selected"; } ?>>

										<?php echo $material->material_name; ?>																	

									</option>															

								<?php } }?>		

								</optgroup>

							</select>				   

						</div>

					</div>

				</div>	

				<!--div class="sell-form-group other_material" style="display: none;">

				    <div class="sell-form">  

					    <h3>Other Material</h3>

					    <div class="text-options">

    				        <input type="text"   name="other_material" value="<?php if(!empty($edit_item[0]->other_material)){ echo @$edit_item[0]->other_material;}else{ echo $this->session->flashdata('other_material'); } ?>">

    				    </div>

				    </div>

				</div-->

			<?php } ?>

			<?php if(!empty($colors)){ ?>

				<div class="sell-form-group">

					<div class="sell-form"> 									

						<h3>Colour</h3>	 

						<div class="drop-options green99">						

							<select name="color" required>							

								<option value="">--Select--</option>	

								<optgroup label="Colors">

								<?php 

								if(!empty($edit_item[0]->other_color)){

									?>

									<option value="<?php echo $edit_item[0]->other_color; ?>" selected>

										<?php echo $edit_item[0]->other_color; ?>			

									</option>

								<?php 

								}else{



								foreach($colors as $color){ 

										if(!empty($edit_item[0]->color)){

											$color_id = $edit_item[0]->color;

										}



										else{

											$color_id = $this->session->flashdata('color');

										}

								?>															

									<option value="<?php echo $color->id; ?>" <?php if($color_id==$color->id){ echo "selected"; } ?>>

										<?php echo $color->color_name; ?>																	

									</option>															

								<?php }



								} ?>	

								</optgroup>

							</select>				   

						</div>

					</div>

				</div>	

				<!--div class="sell-form-group other_color" style="display: none;">

				    <div class="sell-form">  

					    <h3>Other Color</h3>

					    <div class="text-options">

    				        <input type="text"   name="other_color" value="<?php if(!empty($edit_item[0]->other_color)){ echo @$edit_item[0]->other_color;}else{ echo $this->session->flashdata('other_color'); } ?>">

    				    </div>

				    </div>

				</div-->

			<?php } ?>	

			<?php if(!empty($conditions)){ ?>			

				<div class="sell-form-group colour-input">  					

					<?php foreach($conditions as $key=>$condition){

							if(!empty($edit_item[0]->condition)){

								$condition_id = $edit_item[0]->condition;

							}else{

								$condition_id = $this->session->flashdata('condition');

							}

						?>					

					<div class="sell-form">  							

						<?php if($key==0){ ?>							

							<h3>Condition</h3>															

						<?php } ?>

						<div class="containered"> 

							<input type="radio"  name="condition" value="<?php echo $condition->id; ?>" <?php if($condition_id==$condition->id){ echo "checked"; } ?> required>																

							<span><?php echo $condition->condition_name; ?></span>

							<span class="checkmark"></span>

						</div>

					</div>										

					<?php } ?>

				</div>							

			<?php } ?>

			<?php 

			$item_image = array();

			if(!empty($edit_item[0]->item_image)){

				$item_image = unserialize($edit_item[0]->item_image);

			}

			

			?>

			<div class="sell-form-group item_img">  

				<div class="sell-form">

					<h3>Item Image 1</h3>

					<input type="file" name="item_image_1" accept="image/*" <?php if($action!="edit"){ echo 'required'; } ?>>

				</div>


            <div class="sell-form1">
				<img id="blah1" class="blah mt25" src="#"/>
            </div>
				<?php if($action=="edit"){

						if (!empty($item_image[0])) {

					?>

					<span><img src="<?php echo base_url()."uploads/item/".@$item_image[0]; ?>"/></span>

				<?php }} ?>

			</div>

			<div class="sell-form-group item_img">  

				<div class="sell-form">

					<h3>Item Image 2</h3>

					<input type="file" name="item_image_2" accept="image/*"/>

				</div>

				<img id="blah2" class="blah mt25" src="#"/>

					<?php if($action=="edit"){

						if (!empty($item_image[1])) {

					?>

					<span><img src="<?php echo base_url()."uploads/item/".@$item_image[1]; ?>"/></span>

				<?php }} ?>

			</div>

			<div class="sell-form-group item_img">  

				<div class="sell-form">

					<h3>Item Image 3</h3>

					<input type="file" name="item_image_3" accept="image/*"/>

				</div>

				<img id="blah3" class="blah mt25" src="#"/>

				<?php if($action=="edit"){

					if (!empty($item_image[2])) {

					?>

					<span><img src="<?php echo base_url()."uploads/item/".@$item_image[2]; ?>"/></span>

				<?php }} ?>

			</div>

			<div class="sell-form-group item_img">  

				<div class="sell-form">

					<h3>Item Image 4</h3>

					<input type="file" name="item_image_4" accept="image/*"/>

				</div>

				<img id="blah4" class="blah mt25" src="#"/>

				<?php if($action=="edit"){

						if (!empty($item_image[3])) {

					?>

					<span><img src="<?php echo base_url()."uploads/item/".@$item_image[3]; ?>"/></span>

				<?php }} ?>

			</div>

			<div class="sell-form-group item_img">  

				<div class="sell-form">

					<h3>Item Image 5</h3>

					<input type="file" name="item_image_5" accept="image/*" />

				</div>

				<img id="blah5" class="blah mt25" src="#"/>

				<?php if($action=="edit"){

						if (!empty($item_image[4])) {

					?>

					<span><img src="<?php echo base_url()."uploads/item/".@$item_image[4]; ?>"/></span>

				<?php }} ?>

			</div>

			<?php // print_r($edit_item[0]);exit; // if(!empty($list_items)){ ?>

				<div class="sell-form-group colour-input">  									
				<div class="sell-form how23">
						<h3>How long to list item</h3>						   							
							<!-- <div class="containered"> -->
								<?php // print_r($edit_item);exit; ?>
							<div class="row_radio">	
							<div class="col_radio1">
								<input type="radio" name="how_long_to_list_item" value="7" <?php if($edit_item[0]->how_long_to_list_item == "7"){ echo "checked"; } ?> required>
								<span>7 Days</span>
								</div>
								<div class="col_radio2">
								<input type="radio" name="how_long_to_list_item" value="10" <?php if($edit_item[0]->how_long_to_list_item == "10"){ echo "checked"; } ?> required>
								<span>10 Days</span>
								</div>
								</div>
								
								<div class="row_radio">	
							<div class="col_radio1">
								<input type="radio" name="how_long_to_list_item" value="14" <?php if($edit_item[0]->how_long_to_list_item == "14"){ echo "checked"; } ?> required>
								<span>14 Days</span>
								</div>
								<div class="col_radio2">
								<input type="radio" name="how_long_to_list_item" value="28" <?php if($edit_item[0]->how_long_to_list_item == "28"){ echo "checked"; } ?> required>
								<span>28 Days</span>
								</div>
								</div>
								
								<!--<input type="radio" name="how_long_to_list_item" value="14" <?php if($edit_item[0]->how_long_to_list_item == "14"){ echo "checked"; } ?> required>-->
								<!--<span>45 Days</span>-->
								
							<!-- </div> -->
					</div>	
					
					<?php 
					// print_r($list_items);exit;

					foreach($list_items as $key=>$list){

							if(!empty($edit_item[0]->how_long_to_list_item)){
								$list_item = $edit_item[0]->how_long_to_list_item;
							}else{
								$list_item = $this->session->flashdata('how_long_to_list_item');
							}

						?>

						<div class="sell-form how23">

							<?php if($key==0){ ?>

								<h3>How long to list item</h3>						   							

							<?php } ?>

							<div class="containered"> 

								<input type="radio" name="how_long_to_list_item" value="<?php echo $list->id; ?>" <?php if($list_item==$list->id){ echo "checked"; } ?> required>							 								

								<span><?php echo $list->list_item_name; ?> Days</span>

								<span class="checkmark"></span>

							</div>

						</div>					

					<?php } ?>

				</div>						

			<?php // } ?>

			<div class="sell-form-group last-feilds">  

				<div class="sell-form">

				 <h3>Description</h3> 

				   <div class="drop-options"> 

					  <textarea name="description" required><?php if(!empty($edit_item[0]->description)){ echo @$edit_item[0]->description; }else{ echo $this->session->flashdata('description'); }?></textarea>

				   </div>
				</div>
				<?php if(!empty($disabled)){ 
					$buttonType = "button";
					?>
					<script>
						$("body").click(function(e){
							if($(e.target).is(".submitButton")){
								$('html,body').animate({
							        scrollTop: $(".alert-info").offset().top-1000
							    }, 'slow');
							}
						});	
					</script>
				<?php }else{ 
					$buttonType = "submit";
				?>

				<?php
				} ?>
				<div class="submit-btns">

					<?php if($action=="edit"){ ?>

						<div class="sell-btn"><input type="<?php echo $buttonType; ?>" class="sell_item_btn submitButton" value="Update" <?php // echo $disabled; ?>></div>

					<?php } else {?>

						<div class="sell-btn"><input type="<?php echo $buttonType; ?>" class="sell_item_btn submitButton" value="Add" <?php // echo $disabled; ?>></div>

					<?php } ?>

					<?php if($draft_button=="show"){ ?>

						<div class="sell-btn">

							<?php if(!empty($auth_user_data)){ ?>

								<input type="button" class="sell_item_btn" value="save in draft" onclick="saveDraft(<?php echo @$edit_item[0]->id; ?>)"/>

							<?php } else { ?>

								<input type="button" class="sell_item_btn" value="save in draft"/>

							<?php } ?>

						</div>

					<?php } ?>

				</div>

			</div>

		</form>

	</div>

</div>

<script>

function matchStart(params, data) {

  // If there are no search terms, return all of the data

  if ($.trim(params.term) === '') {

    return data;

  }



  // Skip if there is no 'children' property

  if (typeof data.children === 'undefined') {

    return null;

  }



  // `data.children` contains the actual options that we are matching against

  var filteredChildren = [];

  $.each(data.children, function (idx, child) {

    if ($.trim(child.text.toUpperCase()).indexOf($.trim(params.term.toUpperCase())) == 0) {

      filteredChildren.push(child);

    }

  });



  // If we matched any of the timezone group's children, then set the matched children on the group

  // and return the group object

  if (filteredChildren.length) {

    var modifiedData = $.extend({}, data, true);

    modifiedData.children = filteredChildren;



    // You can return modified objects from here

    // This includes matching the `children` how you want in nested data sets

    return modifiedData;

  }



  // Return `null` if the term should not be displayed

  return null;

}

function readURL(input, element) {

    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {

            $('#'+element).attr('src', e.target.result).show();

        }

        reader.readAsDataURL(input.files[0]);

    }

}

$(document).ready(function(){

	

	<?php if(!empty($edit_item[0]->subcategory)){ ?>

	getProduct(<?php echo $edit_item[0]->subcategory; ?>);

	<?php } ?>

    $('[name="brand"]').change(function(){

       var value=$(this).val();

       if(value=="298"){

           $(".other_brand").show().find("input").attr("required", true).val("");

       }

       else{

           $(".other_brand").hide().find("input").removeAttr("required").val("");

       }

    });

	

	 $('[name="color"]').change(function(){

       var value=$(this).val();

       if(value=="19"){

           $(".other_color").show().find("input").attr("required", true).val("");

       }

       else{

           $(".other_color").hide().find("input").removeAttr("required").val("");

       }

    });

	

	 $('[name="material"]').change(function(){

       var value=$(this).val();

       if(value=="25"){

           $(".other_material").show().find("input").attr("required", true).val("");

       }

       else{

           $(".other_material").hide().find("input").removeAttr("required").val("");

       }

    });

	  $('[name="price"]').keypress(function (e) {

     //if the letter is not digit then display error and don't type anything

      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {

    event.preventDefault();

  	}

   });

	  $('[name="postage_fee"]').keypress(function (e) {

     //if the letter is not digit then display error and don't type anything

      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {

    event.preventDefault();

  	}

   });

	  

    $('[name="item_image_1"]').change(function(){

        readURL(this, "blah1");

    });

    $('[name="item_image_2"]').change(function(){

        readURL(this, "blah2");

    });

    $('[name="item_image_3"]').change(function(){

        readURL(this, "blah3");

    });

    $('[name="item_image_4"]').change(function(){

        readURL(this, "blah4");

    });

    $('[name="item_image_5"]').change(function(){

        readURL(this, "blah5");

    });

    //$('[name="category"]').select2({

        //matcher: matchStart

    //});

    //$('[name="subcategory"]').select2({

        //matcher: matchStart

    //});

    //$('[name="product"]').select2({

       // matcher: matchStart

    //});

    //$('[name="size"]').select2({

        //matcher: matchStart

    //});

    $('[name="brand"]').select2({

        matcher: matchStart,

		tags: true

    });

    $('[name="material"]').select2({

        matcher: matchStart,

		tags: true

    });

    $('[name="color"]').select2({

        matcher: matchStart,

		tags: true

    });

    $('[name="size"]').select2({

        matcher: matchStart,

		tags: true

    });

    

	$(".drop_category > select").change(function(){

		$.ajax({

			method: "POST",

			url: "<?php echo base_url(); ?>ajax_call",

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

			url: "<?php echo base_url(); ?>ajax_call",

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

		url: "<?php echo base_url(); ?>ajax_call",

		data: {

			action: "get_product",

			kids_category_id: $('[name="category"]').val(),

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

		url: "<?php echo base_url(); ?>ajax_call",

		data: {

			action: "get_size",

			category_id: $('[name="category"]').val(),

			subcategory_id: subcategory_id, 

		}

	})

	.done(function( msg ) {

		$(".size_ajax").html(msg);

		$('[name="size"]').select2({

	        matcher: matchStart,

			tags: true

    	});

	});

}

</script>

<style>

.slack {

    background: #f2f2f2;

}

</style>

<?php $this->load->view('includes/front/front_footer'); ?>