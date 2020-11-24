<?php $this->load->view('includes/front/front_header'); ?>
<?php 

?>
<div class="container concierge">
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
  <form id="validate_form" method="post" novalidate="novalidate" enctype="multipart/form-data">
      <input type="hidden" name="action" value="concierge">
      <input type="hidden" name="id" value="<?php if(!empty($concierge[0]->id)){ echo $concierge[0]->id; } ?>">
      <input type="hidden" name="user_id" value="<?php echo @$auth_user_data[0]->id; ?>">
      <div class="row">
        <div class="shiva col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
            <label for="upload_photo">Upload photo</label>
            <input type="file" id="upload_photo" name="upload_photo" class="form-control form-control-lg" accept="image/*" <?php if(empty($concierge[0]->id)){  ?> required="" <?php } ?>>
            <img style="width:100px" id="blah1" class="blah_concierge" src="#"/>
			<?php if(!empty($concierge[0]->upload_photo)){
					
				?>
				<!--<span><img style="width:100px" src="<?php echo base_url()."uploads/concierge/".@$concierge[0]->upload_photo; ?>"/></span>-->
			<?php } ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="brand">Brand</label>
            <div class="drop-options green99">
        <select name="brand" required>
          <option value="">--Select--</option>
          <optgroup label="Brands">
          <?php foreach($brands as $brand){ ?>
            <option <?php if( !empty($concierge[0]->brand) && $concierge[0]->brand == $brand->id){ echo "selected"; } ?> >
              <?php echo $brand->brand_name; ?>
            </option>
          <?php } ?>
          </optgroup>
        </select>
       </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="last_seen">Store/Website last seen</label>
            <input type="text" id="last_seen" name="last_seen"  class="form-control form-control-lg" required="">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <label for="size">Size</label>
            <input type="text"  name="size"  class="form-control form-control-lg"  required="">
        </div>
      </div>
      <div class="row">
        <div class="further col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <label for="message">What would you like us to know?</label>
          <textarea id="message" name="message" cols="30" rows="10" class="form-control" required=""></textarea>
        </div>
      </div>
      <div class="row">
        <div class=" bottom-btn col-12">
            <?php if(!empty($auth_user_data)){ ?>
                <input type="submit" value="Send Message" class="btn btn-primary">
            <?php } else { ?>    
                <input type="button" class="btn btn-primary" value="Send Message" data-toggle="modal" data-target="#login-signup-modal">
            <?php } ?>
        </div>
      </div>
    </form>
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
$(document).ready(function(){
$("#blah1").hide();
    $('[name="brand"]').select2({
        matcher: matchStart,
    tags: true
    });
 $('[name="upload_photo"]').change(function(){
 $("#blah1").show();
        readURL(this, "blah1");
    });
});

function readURL(input, element) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#'+element).attr('src', e.target.result).show();
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>
<style>
.slack {
    background: #f2f2f2;
}
</style>
<?php $this->load->view('includes/front/front_footer'); ?>

