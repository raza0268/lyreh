<?php $this->load->view('includes/front/front_header'); ?>
<style>
  #cart_form .input-group.mb-3{
        width: 60px;
  }
  .minusSign{
    margin-top: 16px;
    font-size: 16px !important;
  }
  .plusSign{
    margin-top: 16px; 
    font-size: 16px !important; 
  }
</style>
<div class="site-section   pb-0">
  <div class="container">
    <div class="row mb-5 cart-page justify-content-center">
      <div class="col-7 section-title text-center cart-tit mb-4">
        <h2 class="d-block">Cart</h2>
      </div>
    </div>
    <?php if($this->session->flashdata('success')){ ?>
      <div class="alert alert-success"> 
        <?php  echo $this->session->flashdata('success'); ?>
      </div>
    <?php } ?>
    <div class="cart123 row mb-5">
	 <div class="col-md-8 plr0">
      <form id="cart_form"  method="post">
        <input type="hidden" name="action" value="update_cart">
        <?php if(!empty($this->cart->contents())){ ?>          
        <div style="overflow-x:auto;">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name" style="width: 150px;">Item</th>
                  <th class="product-price">Price</th>
                  <th class="product-price">Postage Fee</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $total=0;
                  $postage_fee=0;
                  // echo "<pre>"; print_r($this->cart->contents());exit;
                  foreach ($this->cart->contents() as $item){
                    if(empty($item['postage_fee'])){
                      $item['postage_fee'] = 0;
                    }
                    $total=$total+$item['subtotal']+$item['postage_fee']; 
                    $postage_fee=$postage_fee+$item['postage_fee']; 
       

                    ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?php echo $item['image']; ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 cart-product-title text-black font15"><?php echo $item['name']; ?></h2>
                    </td>
                    <td><?php echo CURRENCY.$item['price']; ?></td>
                    <td><?php echo CURRENCY.$item['postage_fee']; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <!--<a onclick="minusQuantity('<?php echo $item['rowid']; ?>');" class="btn btn-primary height-auto btn-sm minusSign">-</a>-->
                        <input type="text" name="qty[<?php echo $item['rowid']; ?>]" class="form-control text-center border mr-0 quantityValue" value="<?php echo $item['qty']; ?>" readonly>
                        <!--<a onclick="plusQuantity('<?php echo $item['rowid']; ?>');"  class="btn btn-primary height-auto btn-sm plusSign">+</a>-->
                      </div>
                    </td>
                    <td><?php echo CURRENCY.$item['subtotal']; ?></td>
                    <td><a href="?action=cart_remove&row_id=<?php echo $item['rowid']; ?>" class="btn btn-primary height-auto btn-sm">X</a></td>
                   </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>		  
        </div>
        <?php } else { ?>
          <div class="easily">
		  <img src="<?php echo base_url(); ?>themes/front/images/add-cart.png" alt=""/>
		  <h4>Your cart is currently empty</h4>
      <br>
		  <!-- <p>Before proceed to checkout you must add some products to your shopping cart. You will find a lot of interesting products on our "Shop" page.</p> -->
		<?php if(null !== $this->session->userdata('auth_user')){ ?>		 
		 <a href="javascript:void(0)" class="startShopping" >start shopping</a> 
		<?php }else{ ?>
		 <a href="javascript:void(0)" data-toggle="modal" data-target="#login-signup-modal">start shopping</a> 
		<?php } ?>
		  </center>
		  </div>
        <?php } ?>
      </form>
	      <?php if(!empty($this->cart->contents())){ ?>      
	   <div class="logik ">
        <div class="row justify-content-end">
              <div class="col-md-12 text-right border-bottom">
                <h3 class="text-black h4 text-uppercase">Total to pay</h3>
              </div>
            </div>
            <div class="row cart-subtotly-color">
              <div class="money">
                <span class="text-black">Postage Fee</span>
              </div>
              <div class="money col-md-3 text-right ">
                <strong class="text-black"><?php echo CURRENCY.$postage_fee; ?></strong>
              </div>
            </div>
			<div class="row cart-subtotly-color">
              <div class="money">
                <span class="text-black">Subtotal</span>
              </div>
              <div class="money col-md-3 text-right ">
                <strong class="text-black"><?php echo CURRENCY.$this->cart->format_number($this->cart->total()); ?></strong>
              </div>
            </div>
            <?php if($coupon_discount!=""){ ?>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Coupon Discount</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black"><?php echo $coupon_discount; ?>%</strong>
                </div>
              </div>
            <?php } ?>
            <div class="row mb-3 cart-subtotly-color">
              <div class="money">
                <span class="text-black">Total</span>
              </div>
              <div class="money col-md-3 text-right">
                <strong class="text-black"><?php echo CURRENCY.$total; ?></strong>
              </div>
            </div>
            <div class="row btns">
			    <div class="col-md-6 left-sides">
            <button class="btn btn-outline-primary btn-md btn-block" onclick="window.location='<?php echo base_url(); ?>'">Continue Shopping</button>
          </div>
              <div class="col-md-6">
                <button class="btn btn-primary btn-lg btn-block proc" onclick="window.location='<?php echo base_url(); ?>checkout'">Proceed To Checkout</button>
              </div>
            </div>
        </div>
	      <div class="cupons-parts">
				 <div class="row">
				  <div class="col-md-12">
					<label class="text-black h4" for="coupon">Promo code or Voucher</label>
					<p>Enter your coupon code if you have one.</p>
				  </div>
				  <div class="col-md-8 mb-3 mb-md-0 apply-co">
					<input type="text" class="form-control py-3 c_code" id="coupon" placeholder="Coupon Code">
				  </div>
				  <div class="col-md-4">
					<button class="btn btn-primary btn-md px-4 coupon_btn">Apply Coupon</button>
				  </div>
				</div>  
        </div>
		     <?php } ?>
    </div>
	<div class="col-md-4">
 <div class="box-help" style="display:none"> <!-- hide temporarily -->
 <p>
 <span>Need help?<br>Contact us on</span>
 <strong>
 <span>+44 203 608 9842</span>
 </strong>
 <span>
 <span>24/24 7/7</span>
 </span>
 </p>
 </div>
<!--<div class="boxes-list">-->
<!-- <div class="box-reinsurance steps" id="box-reinsurance-next-steps">-->
<!-- <p class="title gt_bold font700"><span>Next steps:</span></p>-->
<!--<div class="content">Your item will be: -->
<!--  <ol class="list-style-none">-->
<!--<li class="seller"><strong><strong>1.</strong></strong>&nbsp;<span id="docs-internal-guid-2780ef86-7fff-33a1-75dd-552bb8e3546a"><span>Sent by the seller to our control and authentication centre (unless it is already in stock or being sent via Direct Shipping)</span></span></li>-->
<!--<li class="quality"><strong><strong>2.</strong></strong>&nbsp;Controlled and authenticated by our experts (unless it is being sent via Direct Shipping)</li>-->
<!--<li class="delivery"><strong><strong>3.</strong></strong>&nbsp;<span id="docs-internal-guid-c322d7b9-7fff-9660-a465-65777e743077"><span>Sent to you!</span></span></li>-->
<!--</ol>-->
<!--<p><span>If you have chosen the Direct Shipping option, your item will be sent directly to your address by a Trusted or Expert Seller, without being checked by Vestiaire Collective.</span></p>-->
<!--<p><span>If you chose the Express Delivery option, your item is already in stock at Vestiaire Collective and will be delivered in 2 to 5 days.&nbsp;</span></p>-->
<!--</div>-->
<!-- </div>-->
 <!-- <div class="box-reinsurance" id="reinsurance-shipping">
<!-- <p class="title font700">Postage and packaging</p>-->
<!-- <div class="content">-->
<!-- <p>-->
<!-- Delivery by Royal Mail or DHL.<br>-->
<!-- <a href="-->
<!-- https://faq.vestiairecollective.com/hc/en-gb/articles/360001032178-->
<!-- " target="_blank" class="text-black text-underline onhoverchangeunderline">Delivery costs</a>-->
<!-- </p>-->
<!-- </div>-->
<!--	</div> -->
<!-- <div class="box-reinsurance" id="box-reinsurance-duties" style="display:none;">-->
<!-- <p class="title">Import Duties and Taxes</p>-->
<!-- <div class="content">-->
<!-- <p>-->
<!-- One or more of your items is located in a different country. International duties and taxes will be applied to import them.<br>-->
<!-- <a target="_blank" href="-->
<!-- http://faq.vestiairecollective.com/hc/en-gb/articles/208748709-Find-out-the-amount-of-duties-and-taxes-linked-to-importation-->
<!-- ">-->
<!-- Custom fees calculation-->
<!-- </a>-->
<!-- </p>-->
<!-- </div>-->
<!--	</div>-->
<!-- <div class="box-reinsurance" id="box-reinsurance-shipping">-->
<!-- <p class="title font700">Delivery</p>-->
<!-- <div class="content">-->
<!-- <p>-->
<!-- Your seller will be asked to quickly send your item. We’ll make sure delivery times are as short as possible.-->
<!--If you have bought an item from a Trusted or Expert Seller, they have 5 days to send it.<br>-->
<!-- </p>-->
<!-- </div>-->
<!-- </div>-->
<!-- <div class="box-reinsurance" id="box-reinsurance-satisfied">-->
<!-- <p class="title font700">Not satisfied? </p>-->
<!-- <div class="content">-->
<!-- <p>-->
<!-- Changed your mind? Relist your item within 72 hours for free.-->

<!-- </p>-->
<!-- </div>-->
<!--	</div>-->
<!--</div>-->
<div class="box-reinsurance payment pt-4" id="box-reinsurance-secure-payment">
	<p class="title mb-0 text-center text-black">100% SECURED PAYMENT</p>
	<div class="content pt-0">
 <ul class="payment-icons ">
 <li class="fromImage">
 <img class="usual" src="https://vestiairecollective.imgix.net/11VisaMasterCardAmexaa.png" alt="Credit card">
 </li>
 <li class="fromImage">
 <img class="usual" src="https://vestiairecollective.imgix.net/paiement_ico_paypal_small.png" alt="PayPal">
 </li>
 <li class="fromImage">
 <img class="usual" src="https://vestiairecollective.imgix.net/paiement_ico_splitit.png" alt="3 instalments with credit card">
 </li>
 <li class="fromImage">
 <img class="usual" src="https://vestiairecollective.imgix.net/paiement_ico_afforditnow_alpha.png" alt="3 instalments">
 </li>
 </ul>	</div>
</div>    </div>
	</div>
  </div>
</div>
<?php if(!empty($this->cart->contents())){ ?>
<?php 
  if($coupon_discount!=""){
    $total=$total-($total*$coupon_discount/100);
  }
?>
<style>
@media only screen and (max-width: 767px){
.site-section.pb-0 .container {
	padding: 0px;
}
}
</style>
<?php } ?>
<script type="text/javascript">
  function minusQuantity(rowId){
    quantityValue = $(".quantityValue").val();
    if(quantityValue == 1){
      $(".quantityValue").val(1);
    }else{
      $(".quantityValue").val(parseInt(quantityValue)-1);
      $.ajax({
      url:"<?php echo base_url('Homecontroller/updateCart'); ?>",
      type:"post",
      data:{rowId:rowId,quantity:parseInt(quantityValue)-1},
      dataType:"json",
      success:function(res){
          if(res.message == "success"){
           swal("Success", "Cart updated successfully.","success");
           setTimeout(function(){ window.location.href = ""; }, 1000);
           
          }
      }
     });
    }
  }

  function plusQuantity(rowId){
     quantityValue = $(".quantityValue").val();
     $(".quantityValue").val(parseInt(quantityValue)+1);
     $.ajax({
      url:"<?php echo base_url('Homecontroller/updateCart'); ?>",
      type:"post",
      data:{rowId:rowId,quantity:parseInt(quantityValue)+1},
      dataType:"json",
      success:function(res){
         if(res.message == "success"){
           swal("Success", "Cart updated successfully.","success");
           setTimeout(function(){ window.location.href = ""; }, 1000);
          }
      }
     });
  }
</script>
<?php $this->load->view('includes/front/front_footer'); ?>      