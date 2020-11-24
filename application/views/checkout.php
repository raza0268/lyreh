<?php $this->load->view('includes/front/front_header'); ?>
<?php $order_id = uniqid();

// $query = $this->db->get("stripeSettings");
// $ret = $query->row();
// print_r($ret);exit;
?>




<div class="site-section">
  <div class="container" id="checkout1" class="checkou">
    <form id="checkout_form" method="post">
      <input type="hidden" name="order_id" id="orderidunique" value="<?php echo $order_id; ?>">
      <input type="hidden" name="payment_status" value="pending">
      <div class="row">
        <div class=" chech-o col-md-6 mb-3 mb-md-0 border pt-3 pb-3 P-3">
           <div class="">
          <h2 class="h3 mb-3 text-black font-heading-serif ">Billing Details</h2>
         
            <div class="form-group row">
              <div class="print col-md-6">
                <label for="billing_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="billing_fname" name="billing_fname" value="<?php echo $auth_user[0]->first_name; ?>" required>
              </div>
              <div class="print col-md-6">
                <label for="billing_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="billing_lname" name="billing_lname" value="<?php echo $auth_user[0]->last_name; ?>" required>
              </div>
            </div>
            <div class="form-group">			
			<div class="print col-md-12">
			 <label for="billing_email" class="text-black">Email Address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" value="<?php echo $auth_user[0]->email; ?>" id="billing_email" name="billing_email" required>
      </div>
 </div>

  <div class="form-group">      
      <div class="print col-md-12">
       <label for="confrim_email" class="text-black">Confirm Email Address <span class="text-danger">*</span></label>
          <input type="email" class="form-control" id="confrim_email" name="confrim_email" required >
          
      </div>
</div>
    
        <div class="form-group">      
             <div class="print col-md-12">
  

             
             <label for="confrim_email" class="text-black">Enter Card Detail <span class="text-danger">*</span></label>
        <div class="payment-footer">
        </div>
        <div class="form-row">
          <div id="card-errors" role="alert"></div>
        </div>
        </div>
        </div>
			 
          
            <div class="form-group row">
              <div class="print col-md-12">
                <label for="billing_address" class="text-black">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="billing_address" name="billing_address" placeholder="Street address"  value="<?php echo $auth_user[0]->address; ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="print col-md-6">
                <label for="billing_state" class="text-black">Town <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="billing_state" name="billing_state" required>
              </div>
			  <div class="print col-md-6">
               <label for="billing_country" class="text-black">Country <span class="text-danger">*</span></label>
              <select class="form-control" id="billing_country" name="billing_country" required>
                <option value="">Select a country</option>
                  <option value="australia">Australia</option>
                <option value="denmark">Denmark</option>
                <option value="france">France</option>
                <option value="germany">Germany</option>
                <option value="italy">Italy</option>
                <option value="netherland">Netherlands</option>
                <option value="poland">Poland</option>
                <option value="russia">Russia</option>
                <option value="spain">Spain</option>
                <option value="sweden">Sweden</option>
                <option value="usa">United States</option>
                <option value="uk">UK</option>
                <option value="afghanistan">Afghanistan</option>
                <option value="alandIslands">Aland Islands</option>
                <option value="albania">Albania</option>
                <option value="algeria">Algeria</option>
                <option value="american Samoa">American Samoa</option>
                <option value="andorra">Andorra</option>
                <option value="angola">Angola</option>
                <option value="antarctica">Antarctica</option>
                <option value="argentina">Argentina</option>
                <option value="armenia">Armenia</option>
                <option value="austria">Austria</option>
                <option value="azerbaijan">Azerbaijan</option>
                <option value="behamas">Behamas</option>
                <option value="bahrain">Bahrain</option>
                <option value="bangladesh">Bangladesh</option>
                <option value="barbados">Barbados</option>
                <option value="belarus">Belarus</option>
                <option value="belgium">Belgium</option>
                <option value="belize">Belize</option>
                <option value="benin">Benin</option>
                <option value="bermuda">Bermuda</option>
                <option value="bhutan">Bhutan</option>
                <option value="bolivia,Plurinationalstateof">Bolivia, Plurinational state of</option>
                <option value="bosniaandHerzegovina">Bosnia and Herzegovina</option>
                <option value="botswana">Botswana</option>
                <option value="brazil">Brazil</option>
                <option value="britishIndianOceanTerritory">British Indian Ocean Territory</option>
                <option value="bruneiDarussalam">Brunei Darussalam</option>
                <option value="bulgaria">Bulgaria</option>
                <option value="burkinaFaso">Burkina Faso</option>
                <option value="burundi">Burundi</option>
                <option value="cambodia">Cambodia</option>
                <option value="cameroon">Cameroon</option>
                <option value="canada">Canada</option>
                <option value="capeVerde">Cape Verde</option>
                <option value="centralAfricanRepublic">Central African Republic</option>
                <option value="chad">Chad</option>
                <option value="chile">Chile</option>
                <option value="china">China</option>
                <option value="christmasIsland(Australia)">Christmas Island(Australia)</option>
                <option value="cocos(Keeling)Islands">Cocos (Keeling) Islands</option>
                <option value="colombia">Colombia</option>
                <option value="comoros">Comoros</option>
                <option value="congo,theRepublicof">Congo,the Republic of</option>
                <option value="costaRica">Costa Rica</option>
                <option value="croatia">Croatia</option>
                <option value="curacao">Curacao</option>
                <option value="cyprus">Cyprus</option>
                <option value="czechRepublic">Czech Republic</option>
                <option value="djibouti">Djibouti</option>
                <option value="dominicanRepublic">Dominican Republic</option>
                <option value="ecuador">Ecuador</option>
                <option value="egypt">Egypt</option>
                <option value="elSalvador">El Salvador</option>
                <option value="equatorialGuinea">Equatorial Guinea</option>
                <option value="eritrea">Eritrea</option>
                <option value="estania">Estania</option>
                <option value="eswatini">Eswatini</option>
                <option value="ethiopia">Ethiopia</option>
                <option value="falklandIslands(Malvinas)">Falkland Islands(Malvinas)</option>
                <option value="faroeIslands">Faroe Islands</option>
                <option value="finland">Finland</option>
                <option value="frenchSouthernTerritories">French Southern Territories</option>
                <option value="gabon">Gabon</option>
                <option value="gambia">Gambia</option>
                <option value="georgia">Georgia</option>
                <option value="ghana">Ghana</option>
                <option value="gibraltor">Gibraltor</option>
                <option value="greece">Greece</option>
                <option value="greenland">Greenland</option>
                <option value="guam">Guam</option>
                <option value="guatemala">Guatemala</option>
                <option value="guinea">Guinea</option>
                <option value="haiti">Haiti</option>
                <option value="holySeeVaticanCityState">Holy See(Vatican City State)</option>
                <option value="honduras">Honduras</option>
                <option value="hong Kong">Hong Kong</option>
                <option value="hungary">Hungary</option>
                <option value="iceland">Iceland</option>
                <option value="india">India</option>
                <option value="indonesia">Indonesia</option>
                <option value="irelandRepublicof">Ireland, Republic of</option>
                <option value="israel">Israel</option>
                <option value="jamaica">Jamaica</option>
                <option value="japan">Japan</option>
                <option value="jordan">Jordan</option>
                <option value="kazakhstan">Kazakhstan</option>
                <option value="kenya">Kenya</option>
                <option value="koreaRepublicof(South Korea)">Korea, Republic of (South Korea)</option>
                <option value="kuwait">Kuwait</option>
                <option value="kyrgyzstan">Kyrgyzstan</option>
                <option value="latvia">Latvia</option>
                <option value="lebanon">Lebanon</option>
                <option value="lesotho">Lesotho</option>
                <option value="liberia">Liberia</option>
                <option value="liechtenstein">Liechtenstein</option>
                <option value="lithuania">Lithuania</option>
                <option value="luxembourg">Luxembourg</option>
                <option value="macao">Macao</option>
                <option value="madagascar">Madagascar</option>
                <option value="malawi">Malawi</option>
                <option value="malaysia">Malaysia</option>
                <option value="maldives">Maldives</option>
                <option value="mali">Mali</option>
                <option value="malta">Malta</option>
                <option value="marshallIslands">Marshall Islands</option>
                <option value="mauritania">Mauritania</option>
                <option value="mayotte">Mayotte</option>
                <option value="mexico">Mexico</option>
                <option value="micronesiaFederatedStatesof">Micronesia, Federated States of</option>
                <option value="moldovaRepublicof">Moldova, Republic of</option>
                <option value="monaco">Monaco</option>
                <option value="mongolia">Mongolia</option>
                <option value="montenegro">Montenegro</option>
                <option value="morocco">Morocco</option>
                <option value="mozambique">Mozambique</option>
                <option value="namibia">Namibia</option>
                <option value="nepal">Nepal</option>
                <option value="newCaledonia">New Caledonia</option>
                <option value="newZealand">New Zealand</option>
                <option value="nigeria">Nigeria</option>
                <option value="niue">Niue</option>
                <option value="norfolkIsland">Norfolk Island</option>
                <option value="northMacedonia">North Macedonia</option>
                <option value="northernMarianaIslands">Northern Mariana Islands</option>
                <option value="norway">Norway</option>
                <option value="oman">Oman</option>
                <option value="pakistan">Pakistan</option>
                <option value="palau">Palau</option>
                <option value="palestine">Palestine</option>
                <option value="panama">Panama</option>
                <option value="paraguay">Paraguay</option>
                <option value="peru">Peru</option>
                <option value="philippines">Philippines</option>
                <option value="pitcairn">Pitcairn</option>
                <option value="portugal">Portugal</option>
                <option value="puerto Rico">Puerto Rico</option>
                 <option value="qatar">Qatar</option>
                <option value="romania">Romania</option>
                <option value="rwanda">Rwanda</option>
                <option value="saintBarthelemy">Saint Barthelemy</option>
                <option value="saintHelenaAscensionandTristandaCunha">Saint Helena, Ascension and Tristan da Cunha</option>
                <option value="saintMartinFrench part">Saint Martin (French part)</option>
                <option value="saintPierreandMiquelon">Saint Pierre and Miquelon</option>
                <option value="saintVincentandtheGrenadines">Saint Vincent and the Grenadines</option>
                <option value="saintMarino">Saint Marino</option>
                <option value="saoTomeandPrincipe">Sao Tome and Principe</option>
                <option value="saudiArabiao">Saudi Arabiao</option>
                <option value="senegal">Senegal</option>
                <option value="serbia">Serbia</option>
                <option value="sierraLeone">Sierra Leone</option>
                <option value="singapore">Singapore</option>
                <option value="sintMaartenDutcuh part">Sint Maarten(Dutcuh part)</option>
                <option value="slovakia">Slovakia</option>
                <option value="slovenia">Slovenia</option>
                <option value="southAfrica">South Africa</option>
                <option value="southGeorgiaandtheSouthSandwichIslands">South Georgia and the South Sandwich Islands</option>
                <option value="southSudan">South Sudan</option>
                <option value="sriLanka">Sri Lanka</option>
                <option value="svalbardandJanMayen">Svalbard and Jan Mayen</option>
                <option value="switzerland">Switzerland</option>
                <option value="taiwan">Taiwan</option>
                <option value="tanzaniaUnitedRepublicof">Tanzania, United Republic of</option>
                <option value="thailand">Thailand</option>
                <option value="canada">Timor-Leste</option>
                <option value="togo">Togo</option>
                <option value="tokelau">Tokelau</option>
                <option value="trinidadandTobago">Trinidad and Tobago</option>
                <option value="tunisia">Tunisia</option>
                <option value="turkey">Turkey</option>
                <option value="tuvalu">Tuvalu</option>
                <option value="uganda">Uganda</option>
                <option value="ukraine">Ukraine</option>
                <option value="unitedArabEmirates">United Arab Emirates</option>
                <option value="unitedStatesMinoOutlyingIsland">United States Mino Outlying Islands</option>
                <option value="uruguay">Uruguay</option>
                <option value="uzbekistan">Uzbekistan</option>
				<option value="other">Other</option>
              </select>
			  </div>
            </div>
            <div class="form-group row">
			         <div class="print col-md-6">
                <label for="billing_zip" class="text-black">Postal / Zip <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="billing_zip" name="billing_zip" required>
              </div>
              
              <div class="print col-md-6">
                <label for="billing_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="billing_phone" name="billing_phone" placeholder="Phone Number" required>
              </div>
            </div>
<div class="row ">
            <div class="col-md-12 plr0sm">
                 <div class="form-group ">
              <label for="diff_ship_address" class="text-black " data-toggle="collapse"
                href="#ship_different_address" role="button" aria-expanded="false"
                aria-controls="ship_different_address"><input type="checkbox" value="1" id="diff_ship_address" name="diff_ship_address">
                Ship To A Different Address?</label>
              <div class="collapse" id="ship_different_address">
                <div class="py-2">
                  <div class="form-group row mlr_15_lg">
                    <div class="print col-md-6">
                      <label for="shipping_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="shipping_fname" name="shipping_fname">
                    </div>
                    <div class="print col-md-6">
                      <label for="shipping_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="shipping_lname" name="shipping_lname">
                    </div>
                  </div>
                  <div class="form-group row mlr_15_lg">
                  <div class="col-md-12 plr0sm">
                      <label for="shipping_email" class="text-black">Email Address <span
                          class="text-danger">*</span></label>
                      <input type="email" class="form-control" id="shipping_email" name="shipping_email">
                    </div>
                  </div>
                  <div class="form-group row mlr_15_lg">
                    <div class="print col-md-12">
                      <label for="shipping_address" class="text-black">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="shipping_address" name="shipping_address"
                        placeholder="Street address">
                    </div>
                  </div>
                  <div class="form-group row mlr_15_lg">
                    <div class="print col-md-6">
                      <label for="shipping_state" class="text-black">Town <span
                          class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="shipping_state" name="shipping_state">
                    </div>
					 <div class="print col-md-6">
               <label for="billing_country" class="text-black">Country <span class="text-danger">*</span></label>
              <select class="form-control" id="billing_country" name="billing_country" required>
                <option value="">Select a country</option>
                <option value="australia">Australia</option>
                <option value="india">India</option>
                <option value="usa">USA</option>
                <option value="uk">UK</option>
                <option value="canada">Canada</option>
                <option value="other">Other</option>
              </select>
			  </div>
                    
                  </div>
                  <div class="form-group row mlr_15_lg">
                    
					<div class="print col-md-6">
					
                      <label for="shipping_zip" class="text-black">Postal / Zip <span
                          class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="shipping_zip" name="shipping_zip">
                    </div>
                    <div class="print col-md-6">
                      <label for="shipping_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                      <input type="number" class="form-control" id="shipping_phone" name="shipping_phone"
                        placeholder="Phone Number">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="order_notes" class="text-black">Order Notes</label>
              <textarea name="order_notes" id="order_notes" cols="30" rows="5" class="form-control"
                placeholder="Write your notes here..."></textarea>
            </div>
    </div>
       </div>
</div>
  </div>
  
 
<div class="col-md-6 plr0sm">
  
            <div class="print col-md-12 p-3 border">
              <h2 class="h3 mb-3 text-black font-heading-serif">Promo code or Voucher</h2>
              <div class="">
                <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                <div class="input-group w-75">
                  <input type="text" class="form-control c_code" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code"
                    aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary btn-sm rounded px-4 coupon_btn" type="button" id="button-addon2">Apply</button>
                  </div>
                </div>
              </div>
            </div>
         
         
         
         
         
         
		  <?php  if(!empty($this->cart->contents())){ ?>
          <div class="row mb-5 mt-3">
            <div class="print col-md-12 p-3 border">
              <h2 class="h3 mb-3 text-black font-heading-serif">Your Order</h2>
              <div class="">
                <table class="table site-block-order-table mb-5">
                  <thead>
                    <th>Product</th>
                    <th>Total</th>
                  </thead>
                  <tbody>
                  <?php 
				  
                    $total=0;
                    $p_price=0;
                    
                    foreach ($this->cart->contents() as $item){
                        if(empty($item['postage_fee'])){
                             $item['postage_fee'] = 0;
                     } 
                      $total=$total+$item['subtotal']+$item['postage_fee'];
                    //   if(is_numeric($p_price)){
                         
                        $p_price=$p_price+$item['postage_fee'];
                    //   }
                      ?>
                      <input type="hidden" name="item_record[<?php echo $item['name']; ?>][price]" value="<?php echo $item['price']; ?>">
                      <input type="hidden" name="item_record[<?php echo $item['name']; ?>][qty]" value="<?php echo $item['qty']; ?>">
                      <input type="hidden" name="item_record[<?php echo $item['name']; ?>][subtotal]" value="<?php echo $item['subtotal']; ?>">
                      <tr>
                        <td><?php echo $item['name']; ?> <strong class="mx-2">x</strong> <?php echo $item['qty']; ?></td>
                        <td><?php 
                        $totalPrices = CURRENCY.$item['subtotal'];
                        
                        echo CURRENCY.$item['subtotal']; ?></td>
                      </tr>
                    <?php } ?>
                    <?php 
					 
                      if($coupon_discount!=""){
                        $total=$total-($total*$coupon_discount/100);
                      }
                    ?>
                    <input type="hidden" name="total_price" value="<?php echo $total; ?>">
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                      <td class="text-black"><?php echo CURRENCY.$item['subtotal']; ?></td>
                    </tr>
					<tr>
                      <td class="text-black font-weight-bold"><strong>Cart Postage Fee</strong></td>
                      <td class="text-black"><?php echo CURRENCY.$p_price; ?></td>
                    </tr>
                    <?php if($coupon_discount!=""){ ?>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Coupon Discount</strong></td>
                        <td class="text-black"><?php echo $coupon_discount; ?>%</td>
                      </tr>
                    <?php } ?>
                    <tr>
                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                      <td class="text-black font-weight-bold"><strong><?php echo CURRENCY.$total; ?></strong></td>
                      <input type="hidden" class="totalPrice" value="<?php if(!empty($total)){ echo $total; }else{ echo "0"; } ?>">
                    </tr>
                  </tbody>
                </table>
                <!--
                <div class="border mb-3 p-3 rounded">
                  <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button"
                      aria-expanded="false" aria-controls="collapsebank">Direct Bank Transfer</a></h3>
                  <div class="collapse" id="collapsebank">
                    <div class="py-2 pl-0">
                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                        payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                  </div>
                </div>
                <div class="border mb-3 p-3 rounded">
                  <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button"
                      aria-expanded="false" aria-controls="collapsecheque">Cheque Payment</a></h3>
                  <div class="collapse" id="collapsecheque">
                    <div class="py-2 pl-0">
                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                        payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                  </div>
                </div>
                <div class="border mb-5 p-3">
                  <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsepaypal" role="button"
                      aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>
                  <div class="collapse" id="collapsepaypal">
                    <div class="py-2 pl-0">
                      <p class="mb-0">Make your payment directly into our bank account. Please use your Order ID as the
                        payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                    </div>
                  </div>
                </div>
                -->
                <div class="payment_container">
                  <ul>
                    <li style="display:none;">
                      <input type="radio" id="stripe_pay" name="payment_mode" value="stripe" required checked>
                        Pay using stripe
                    </li>
                    <!--<li>-->
                    <!--  <input type="radio" id="card_pay" name="payment_mode" value="card_pay" required>-->
                    <!--    Pay using card payment-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--  <input type="radio" id="paypal_pay" name="payment_mode" value="paypal" required >-->
                    <!--    pay using paypal-->
                    <!--  </li>-->
                  </ul>
                </div>
                <div id="dropin-container" style="display:none;"></div>
                <div class="form-group">
                  <button class="btn btn-primary btn-lg btn-block place_order_btn">Pay Now (<?php echo CURRENCY.$total; ?>)</button>
                </div>
              </div>
            </div>
          </div>
		  <?php } ?>
     
      </div>
    </form>
  </div>
</div>

<!--<form method="post" id="payment-form">-->
        
        
        <!--<div class="row"  style="text-align: center; margin-top: 20px;">-->
        <!--  <button type="submit" class="btn btn-success">submit</button>-->
        <!--</div>-->
      
      
    <!--</form>-->


<form id="paypal_form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
  <input name="cmd" type="hidden" value="_xclick">
  <input name="currency_code" type="hidden" value="GBP">
  <input name="return" type="hidden" value="<?php echo base_url(); ?>thank-you?order_id=<?php echo $order_id; ?>">
  <input name="cancel_return" type="hidden" value="<?php echo base_url(); ?>cancel?order_id=<?php echo $order_id; ?>">
  <input type="hidden" name="no_shipping" value="1">
  <input name="business" type="hidden" value="kuldeepak@gmail.com">
  <input name="item_name" type="hidden" value="Lyreh Items">
  <input type="hidden" name="amount" value="<?php echo $total; ?>">
  <input name="lc" type="hidden" value="US">
</form>

<script type="text/javascript">

$(document).ready(function () {

var messages = {
    'confirmEmail': "Email does not match."
};

$('#checkout_form').validate({
    rules: {
      // confrim_email: {
      //       required: true,
      //       equalTo: '[name="[billing_email]"]'
      //       // minlength: 3
      //   }

        billing_email: {
                required: true
                
            },
            confrim_email: {
                equalTo: '[name="billing_email"]'
            }

    },
    messages: {
      confrim_email: messages.confirmEmail
    },
    onfocusout: function(element) {
        this.element(element);
    },
    // submitHandler: function(form) {
    //     alert('form is valid');
    //     return false;
    // }
});

});

</script>

<?php $this->load->view('includes/front/front_footer'); ?>      