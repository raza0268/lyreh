<?php if($action=="get_subcategory"){
  $subCat = 0;
  foreach($get_subcat as $subcat){
    if(!in_array($category_id, unserialize($subcat->category_id))){
      $subCat = 1;
    }
  }
 ?>
    <select name="subcategory" <?php if(empty($subCateCheck)){ echo "disabled   readonly"; } ?> onchange="getProduct($(this).val())">
    	<?php if(!empty($subCateCheck)){ ?> 
      <option value="" >--Select--</option>
    
    	<optgroup label="Subcategories">
    	<?php 
    	    foreach($get_subcat as $subcat){
    			if(in_array($category_id, unserialize($subcat->category_id))){
    				echo '<option value="'.$subcat->id.'">'.$subcat->subcategory_name.'</option>';
    			}
    		}
      }
    	?>	
     
    	</optgroup>
    </select>
<?php } ?>
<?php if($action=="get_product"){ ?>
    <select name="product" <?php if(empty($get_product)){ echo "disabled readonly"; } ?>>
		<option value="">--Select--</option>
		<optgroup label="Products">
		<?php
		    foreach($get_product as $product){
		        if($kids_category_id=="4"){
		            if($product->id!="15" && $product->id!="10" && $product->id!="18"){
		                echo '<option value="'.$product->id.'">'.$product->product_name.'</option>';
		            }
		        }else{
			        echo '<option value="'.$product->id.'">'.$product->product_name.'</option>';
		        }
			}
		?>	
		</optgroup>
	</select>
<?php } ?>
<?php if($action=="get_size"){ ?>
    <select name="size">
		<option value="">--Select--</option>
		<optgroup label="sizes">
		<?php
			foreach($get_size as $size){
			    echo '<option value="'.$size->id.'">'.$size->size.'</option>';
			}
			echo '<option value="185">Other</option>';
		?>
		</optgroup>
	</select>
<?php } ?>
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
$(document).ready(function(){
    //$('[name="subcategory"]').select2({ 
        //matcher: matchStart
    //});
    //$('[name="product"]').select2({ 
        //matcher: matchStart
    //});
    //$('[name="size"]').select2({ 
        //matcher: matchStart
    //});
});    
</script>