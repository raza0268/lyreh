		<div id="dialog" class="dialog" style="display:none" title="Payment Notification">
          <p>Sorry your transaction has been cancelled!!!
          </p>
        </div>
		<div>
			<?php 

			foreach($settings as $setting){

				$meta_key=$setting->meta_key;

				$$meta_key=$setting->meta_value;

			}

			// if(@$auth_user_data[0]->offer_data!=""){

				// $offer_count=@count(unserialize($auth_user_data[0]->offer_data));

			// }

			// else{

				// $offer_count="0";

			// }

			?>

			<!---------------------------------footer-section-start-------------------------->
			
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  
  <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

			<style type="text/css">
.mt25{
	margin-top: 25px;
}
				.hoverofuserofchat:hover{

						color:#d99f6f !important;	

					}

					.hoverofchattab{

						color: black;

					}

					.hoverofchattab:hover{

				      background-color: #F5F5F5;

				    }

				    .pro-name1{

				    	margin-bottom: 11px;

					    width: 100%;

					    text-align: left;

				    }



				    /* width */

						.newscroll::-webkit-scrollbar{

						  width: 5px;

						}



						/* Track */

						.newscroll::-webkit-scrollbar-track{

						  background: #f1f1f1; 

						}

						 

						/* Handle */

						.newscroll::-webkit-scrollbar-thumb{

						  background: #ABABAB; 

						}



						/* Handle on hover */

						.newscroll::-webkit-scrollbar-thumb:hover{

						  background: #ABABAB; 

						}

				  

			</style>

			

			

			<footer>



	

			

				<div class="container plr0">

					<div class="col-sm-12">

					   <div class="row">

						  <div class="col-sm-5">

							 <div class="footer-inners">

								<img src="<?php echo base_url(); ?>themes/front/images/logo.png" alt="">

								<p><?php echo $footer_content; ?></p>

							 </div>

						  </div>

						  <div class="col-sm-3">

							 <div class="footer-inners">

								<h4>Information</h4>

								<ul>

								   <!--li><a href="<?php echo base_url(); ?>about">About Us<i class="fa fa-angle-right" aria-hidden="true"></i></a></li-->

								   <li><a href="<?php echo base_url(); ?>legal">Legal<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

								   <li><a href="<?php echo base_url(); ?>privacy-policy">Privacy Policy<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

								</ul>

							 </div>

						  </div>

						  <div class="col-sm-4">

							 <div class="footer-inners">

								<h4>support</h4>

								<!-- <ul> -->

                                    <!--<li><a href="tel:<?php echo $phone_number; ?>">Phone:- <?php echo $phone_number; ?></a></li>  -->

                                    <!-- <li><a href="mailto:<?php echo $email; ?>">E-mail:- <?php echo $email; ?></a></li> 

                                    <li><a href="tel:<?php echo $phone_number; ?>">Phone Number:- <?php echo $phone_number; ?></a></li>

                                     <li><a href='#'>Address:- <?php echo $address; ?></a></li> 

                                </ul> -->

							    <div class="icons-f">

                                    <ul>

    							        <li><a href="<?php echo $facebook_link; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

    							        <li><a href="<?php echo $twitter_link; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

    							        <li><a href="<?php echo $trustpilot_link; ?>" target="_blank"><img src="<?php echo base_url(); ?>themes/front/images/star.png" alt=""></a></li>

    							        <li><a href="<?php echo $insta_link; ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

    							    </ul>

                                </div>

							 </div>

						  </div>

					   </div>

					   <div class="footer-bottom">

					        <!--  <img src="<?php echo base_url(); ?>themes/front/images/ft-img.png" alt="">  -->

						    <p><?php echo $footer_text; ?></p>

					   </div>

					</div>

				</div>

			</footer>

		</div>  

		<!-- Modal will be here ... --> 

		<div id="login-signup-modal" class="modal fade" role="dialog">

			<div class="modal-dialog">

			<!-- login modal content -->

				<div class="modal-content" id="login-modal-content">

					<div class="modal-header">

						<h4 class="modal-title">Login Now!</h4>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">

							<span aria-hidden="true">&times;</span>

						</button>

					</div>

					<div class="modal-body">

						<div class="login_msg"></div>

						<form method="post" id="Login-Form" role="form">

							<div class="form-group">

								<label for="email">Email address:</label>

								<input name="email" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required>

							</div>

							<div class="form-group">

								<label for="password">Password:</label>

								<input name="password" id="password" type="password" class="form-control input-lg" placeholder="Enter Password" required>

							</div>

							<button type="submit" class="btn btn-success btn-block btn-lg mt25">LOGIN</button>

						</form>
<!-- 
						<center>-OR-</center>

						<div>

							<a href="<?php// echo base_url(); ?>google_login" class="btn btn-success btn-block btn-lg">

								Login with Google

							</a>

						</div> -->

					</div>

					<div class="modal-footer">

						<p>

							<a id="FPModal" href="javascript:void(0)">Forgot Password?</a> | 

							<a id="signupModal" href="javascript:void(0)">Register Here!</a>

						</p>

					</div>

				</div>

				<!-- login modal content -->

				

				<!-- signup modal content -->

				<div class="modal-content" id="signup-modal-content">

					<div class="modal-header" id="modal_signup">

						<h4 class="modal-title">Signup Now!</h4>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">

							<span aria-hidden="true">&times;</span>

						</button>

					</div>	

					<div class="modal-body">

						<div class="register_msg"></div>

						<form method="post" id="Signin-Form" role="form">

							<div class="form-group">

								<label for="first_name">First Name:</label>

								<input name="first_name" id="first_name" type="text" class="form-control input-lg" placeholder="Enter First Name" required minlength="3">  

							</div>

							<div class="form-group">

								<label for="last_name">Last Name:</label>

								<input name="last_name" id="last_name" type="text" class="form-control input-lg" placeholder="Enter Last Name" required minlength="3">  

							</div>

							<div class="form-group">

								<label for="last_name">Username:</label>

								<input name="username" id="username" type="text" class="form-control input-lg" placeholder="Enter Username" required>  

							</div>

							<div class="form-group">

								<label for="email">Email address:</label>

								<input name="email" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required>  

							</div>

							<div class="form-group">

								<label for="password">Password:</label>

								<input name="password" id="password" type="password" class="form-control input-lg" placeholder="Enter Password" required>                      

							</div>

							<div class="form-group">

								<label for="confirm-passwd">Retype Password:</label>

								<input name="re_password" id="confirm-passwd" type="password" class="form-control input-lg" placeholder="Retype Password" required>

							</div>

							<button type="submit" class="btn btn-success btn-block btn-lg">CREATE ACCOUNT!</button>

						</form>

					</div>

					<div class="modal-footer">

						<p>Already a Member ? <a id="loginModal" href="javascript:void(0)">Login Here!</a></p>

					</div>

				</div>

				<!-- signup modal content -->

				

				<!-- forgot password content -->

				<div class="modal-content" id="forgot-password-modal-content">

					<div class="modal-header">

						<h4 class="modal-title">Recover Password!</h4>

						<button type="button" class="close" data-dismiss="modal" aria-label="Close">

							<span aria-hidden="true">&times;</span>

						</button>

					</div>

					<div class="modal-body">

						<div class="forgot_msg"></div>

						<form method="post" id="Forgot-Password-Form" role="form">

							<div class="form-group">

								<label for="email">Email address:</label>

								<input name="email" id="email" type="email" class="form-control input-lg" placeholder="Enter Email" required>                     

							</div>         

							<button type="submit" class="btn btn-success btn-block btn-lg">SUBMIT</button>

						</form>

					</div>

					<div class="modal-footer">

						<p>Remember Password ? <a id="loginModal1" href="javascript:void(0)">Login Here!</a></p>

					</div>

				</div>        

				<!-- forgot password content -->

			</div>

		</div>

		

		<!-- Messenger -->

		<div id="myMessenger" class="modal fade" role="dialog">

		  <div class="modal-dialog modal-lg">

			<!-- Modal content-->



			<div class="modal-content" >

				<div class="row">

			  <button type="button" style="width: 98%;margin-top: 10px; margin-bottom: 10px;" class="close" data-dismiss="modal">&times;</button>

			</div>

			  <div class="row">

			  <div class="col-lg-5" style="padding-right: 0px;padding-left: 0px;">



			  	<div id="reloaddiv"  class="newscroll" style="height: 550px; overflow-y: scroll;">

			   

			  </div>

			  </div>

			  <div class="col-lg-7" style="border:none; padding-left: 0px;"><iframe style="border-bottom:none; border-top:none; border-left:2px solid #F5F5F5; border-right:2px solid #F5F5F5; z-index: 1;"></iframe></div>

			  </div>

			</div>

		  </div>

		</div>

		

		<!-- Offer -->

		<div id="makeOffer" class="modal fade" role="dialog">

		  <div class="modal-dialog">

			<!-- Modal content-->

			<div class="modal-content">

			  <div class="modal-header">

				<h4 class="modal-title">Negotiation Area</h4>

				<button type="button" class="close" data-dismiss="modal">&times;</button>

			  </div>

			  <div class="modal-body">

				<p class="mb-0" style="margin-bottom: 20!important;">Make an offer to the seller.</p>

				<div class="offer_img ">

					<img src="<?php echo base_url(); ?>themes/front/images/person_3.jpg"/>

				</div>

				<div class="offer_content">

					<form id="validate_form" class="offer_form" method="post">

						<input type="hidden" id="item_id">

						<input type="hidden" id="productSlug" value="">

						<input type="hidden" id="offerTime" value="">

						<input type="hidden" id="toId" value="">

						<input type="hidden" id="offer_count" value="0">

						<p class="item_name">Faux fur coat</p>

						<p class="item_price">Price: <span style="font-weight: 700;"><?php echo CURRENCY; ?>120</span></p>

						<p>

							<span style="font-weight: 700;">Your Offer:</span> 

							<input type="number" id="offer_price" style="padding: 0px 5px 0px 10px;margin-bottom: 8px; width: 100%;" placeholder="Amount" required>

							<textarea id="offer_msg" name="offer_msg" placeholder="Notes to seller" style="width: 100%;padding: 0px 5px 0px 10px;"></textarea>

							<br /><span id="offer_count_span"></span>

						</p>

						<p><input type="submit" class="w100sm" value="Send"/></p>

					</form>

				</div>

			  </div>

			</div>

		  </div>

		</div>	

	

		<!---------------------------------footer-section-end-------------------------->	

		<!--script src="<?php //echo base_url(); ?>plugins/starrr/dist/sweetalert.min.js"></script-->

		<script src="<?php echo base_url(); ?>themes/front/js/toastr.min.js"></script>

		<script src="<?php echo base_url(); ?>themes/front/js/sweetalert.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

		<script src="<?php echo base_url(); ?>plugins/starrr/dist/starrr.js"></script>

		<script src="<?php echo base_url(); ?>themes/front/js/auth.js"></script> 

		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


	
		<style>

		.fixed_ {

			position: fixed;

			top:0; left:0;

			width: 100%; 

		}

		</style>

	






<script src="<?php echo base_url(); ?>themes/front/js/jquery.ihavecookies.js"></script>	

<link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Quicksand:400,500" rel="stylesheet">

<!-- <script src="https://checkout.stripe.com/checkout.js"></script> -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>




	<script>

$(document).on('keydown', 'input[pattern]', function(e){
  var input = $(this);
  var oldVal = input.val();
  var regex = new RegExp(input.attr('pattern'), 'g');

  setTimeout(function(){
    var newVal = input.val();
    if(!regex.test(newVal)){
      input.val(oldVal); 
    }
  }, 0);
});

$("document").ready(function(){ 




// basket

$("#basket-img").mouseenter(function(){ 

$(".basket-img").attr('src','https://lyreh.com/uploads/basket-hover.png');

});

$("#basket-img").mouseleave(function(){ 

$(".basket-img").attr('src','https://lyreh.com/uploads/basket.png');

}); 

// buy btn

$("#buy-img").mouseenter(function(){ 

$(".buy-img").attr('src','https://lyreh.com/uploads/buy-hover.png');

});

$("#buy-img").mouseleave(function(){ 

$(".buy-img").attr('src','https://lyreh.com/uploads/buy.png');

}); 



// sell btn

$("#sell-img").mouseenter(function(){ 

$(".sell-img").attr('src','https://lyreh.com/uploads/sell-hover.png');

});

$("#sell-img").mouseleave(function(){ 

$(".sell-img").attr('src','https://lyreh.com/uploads/sell.png');

});

// message btn

$("#message-img").mouseenter(function(){ 

$(".message-img").attr('src','https://lyreh.com/uploads/message-hover.png');

});

$("#message-img").mouseleave(function(){ 

$(".message-img").attr('src','https://lyreh.com/uploads/message.png');

}); 







// conc btn

$("#conc-img").mouseenter(function(){ 

$(".conc-img").attr('src','https://lyreh.com/uploads/conc-hover.png');

});

$("#conc-img").mouseleave(function(){ 

$(".conc-img").attr('src','https://lyreh.com/uploads/conc.png');

}); 



// notification

$("#notification-img").mouseenter(function(){ 

$(".notification-img").attr('src','https://lyreh.com/uploads/notification-hover.png');

});

$("#notification-img").mouseleave(function(){ 

$(".notification-img").attr('src','https://lyreh.com/uploads/notification.png');

}); 









});



		function deleteItem(id){

	

		swal({

		   title: 'Are you sure?',

		   text: "You won't be able to revert this product!",

		   type: 'warning',

		   showCancelButton: true,

		   confirmButtonColor: '#3085d6',

		   cancelButtonColor: '#d33',

		   confirmButtonText: 'Yes, delete it!',

		   showLoaderOnConfirm: false,

		   preConfirm: function() {

			 return new Promise(function(resolve) {

				   $.ajax({

					  type: 'POST',

					  url: "<?php echo base_url(); ?>ajax_call",

						data: {

							id: id,

							action: "delete_item"

						},

					  success: function (obj) {

						  toastr.success('Deleted successfully.');

						    setInterval('location.reload()', 2000);

					  }

				  });

			 });

		   },

		   allowOutsideClick: false     

		});          

         

	

}



 function readURL(input, element) {

    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function(e) {

            $('#'+element).attr('src', e.target.result).show();

        }

        $(".removeImage").show();

        reader.readAsDataURL(input.files[0]);

    }

}

		$(document).ready(function(){

// $('.input-group.date').datepicker({format: "dd.mm.yyyy"}); 

<?php if(!empty($this->session->flashdata("success"))){ ?>

	swal("Success", "<?php echo $this->session->flashdata("success"); ?>","success");

<?php } ?>

            $(".startShopping").click(function(){

                $(".buy-img").click();

                

            });

            $(".editButton").click(function(){

               src = $("#blah1").attr("src");

            //   alert(src);

                if($(this).hasClass("updates")){

                    $(this).removeClass("updates");

                    $(".submitButton").css("display","none");

                    $(this).text("Edit Profile");

                    $(".uploadPhoto").hide();

                    $(".uploadDiv").css("background","none");

                     $(".username").attr("readonly", true);

                    $(".firstName").attr("readonly", true);

                    $(".lastName").attr("readonly", true);

                    $(".profileImage").attr("disabled", true);

                    $(".removeImage").css("display","none");

                    $(".profileImage").css("cursor","default");

                    

                }else{

                    $(this).addClass("updates");

                    $(this).text("Close");

                    $(".uploadPhoto").show();

                    $(".uploadDiv").css("background","rgb(128 128 128 / 80%)");

                    $(".submitButton").css("display","inline-block");

                    $(".username").attr("readonly", false);

                    $(".firstName").attr("readonly", false);

                    $(".lastName").attr("readonly", false);

                    $(".profileImage").attr("disabled", false);

                    $(".profileImage").css("cursor","pointer");

                    if(src !== "#" && src !== ""){

                        $(".removeImage").css("display","inline-block");

                    }

                }

                // .attr("readonly", false);  

            });

            

			 $('[name="item_image_1"]').change(function(){

			        readURL(this, "blah1");

			        $(".ImageStatus").val(1);

			    });

			     $(".removeImage").click(function(){

			        $("#blah1").attr("src","#");

			        $("#blah1").hide();

			        $(this).hide();

			        $(".item_img").css("background-image","url(https://lyreh.com/themes/front/images/electronics.png)");

			        $(".sell-form").css("display","inline-block");

			        $(".ImageStatus").val(0);

			     });



			<?php if(!empty($_GET["orderId"])){ ?>

				$(".purchase_tab").click();

				var orderId = "<?php echo $_GET["orderId"] ?>";

				// $("body").animate({ scrollTop: $("tr#"+orderId)[0].scrollHeight}, 1000);

				$('html, body').animate({

			        scrollTop: $("tr#"+orderId).offset().top-300

			    }, 2000);

			    $("tr#"+orderId).css("background-color","#f7deca");

				setTimeout(function(){ $("tr#"+orderId).css("background-color","transparent"); }, 3000);



				

			<?php } ?>





			



			$(".notificationRemove").click(function(e){

				e.preventDefault();

				var notifyId = $(this).attr("notificationid");

				var notifyHref = $(this).attr("href");

				// return;

				$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					notifyId: notifyId,

					action: "notification_remove"

				},

				success: function(res)

		            {

		            	window.location.href = notifyHref; 

		              	// $("#notificationremove").removeClass('notify_msg');

		            }

				});



			});

			$( document ).tooltip();

			$("#Login-Form").validate();

			$("#Signin-Form").validate();

			$("#Forgot-Password-Form").validate();

			$("#update_password_form").validate({

				rules: {

					new_password: "required",

					confirm_new_password: {

						equalTo: "#new_password"

					}

				}    

			});



			$("#checkout_form").validate({

				rules: {

					billing_email: "required",

					confrim_email: {

						equalTo: "#billing_email"

					}

				}    

			});



			$("#validate_form").validate();

			//$("#checkout_form").validate();

			$("#accordion").accordion();

			$('#signupModal').click(function(){         

				$('#login-modal-content').fadeOut('fast', function(){

					$('#signup-modal-content').fadeIn('fast');

				});

			});

				   

			$('#loginModal').click(function(){          

				$('#signup-modal-content').fadeOut('fast', function(){

					$('#login-modal-content').fadeIn('fast');

				});

			});

			  

			$('#FPModal').click(function(){         

				$('#login-modal-content').fadeOut('fast', function(){

					$('#forgot-password-modal-content').fadeIn('fast');

				});

			});

			  

			$('#loginModal1').click(function(){          

				$('#forgot-password-modal-content').fadeOut('fast', function(){

					$('#login-modal-content').fadeIn('fast');

				});

			});



			$("#update_cart_btn").click(function(){

				$("#cart_form").submit();

			});

		});

		

		$(document).ready(function(){

			$("#Login-Form").submit(function(){

				if($(this).valid()){

					$.ajax({

						method: "POST",

						url: "<?php echo base_url(); ?>ajax_call",

						data: {

							email: $(this).find("[name='email']").val(),

							password: $(this).find("[name='password']").val(),

							action: "login" 

						}

					})

					.done(function( msg ) {

						if(msg=="invalid"){
                            swal("Error", "Incorrect Credentials!","error");
				// 			$(".login_msg").html("<div class='err_msg'>Invalid Credentials!</div>");

						}

						else if(msg=="inactive"){
                            swal("Error", "Please activate your account and check your inbox.","error");
				// 			$(".login_msg").html("<div class='err_msg'>Please activate your account and check your inbox.</div>");

						}

						else if(msg=="delete"){
                            swal("Error", "Your account has deleted!","error");
				// 			$(".login_msg").html("<div class='err_msg'>Your account has deleted!</div>");

						}

						else{
                            swal("Success", "Login Successful!","success");
				// 			$(".login_msg").html("<div class='success_msg'>Login Successful!</div>");

							setTimeout(function(){

								window.location.href="<?php echo base_url(); ?>account";

							}, 3000);

						}

					});

				}

				return false;

			});

			

// 			$("#Signin-Form").submit(function(){
                
// 				if($(this).valid()){
                    
// 					$.ajax({

// 						method: "POST",

// 						url: "<?php echo base_url(); ?>ajax_call",

// 						data: {

// 							first_name: $(this).find("[name='first_name']").val(),

// 							last_name: $(this).find("[name='last_name']").val(),

// 							username: $(this).find("[name='username']").val(),

// 							email: $(this).find("[name='email']").val(),

// 							password: $(this).find("[name='password']").val(),

// 							re_password: $(this).find("[name='re_password']").val(),

// 							action: "register"
                            
// 						}
                    
// 					})

// 					.done(function( msg ) {
                       
//                      $('html, body').animate({scrollTop:0}, 'slow');
// 						// console.log(msg);

// 						if(msg=="duplicate_email"){

// 							$(".register_msg").html("<div class='err_msg'>Email already exist!</div>");

// 						}

// 						else if(msg=="pass_mistmatch"){

// 							$(".register_msg").html("<div class='err_msg'>Password Mistmatch!</div>");

// 						}

// 						else if(msg=="duplicate_username"){

// 							$(".register_msg").html("<div class='err_msg'>Username already exist!</div>");

// 						}else{

// 							$(".register_msg").html("<div class='success_msg'>Thank you for registering with Lyreh. Please check your email to activate your account.</div>");

// 							setTimeout(function(){

// 								 window.location.href="";

// 							}, 3000);

// 						}

// 					});

// 				}

// 			  return false;

// 			});

			

			$("#Forgot-Password-Form").submit(function(){

				if($(this).valid()){

					$.ajax({

						method: "POST",

						url: "<?php echo base_url(); ?>ajax_call",

						data: {

							email: $(this).find("[name='email']").val(),

							action: "forgot_password"

						}

					})

					.done(function( msg ) {

						if(msg=="invalid"){
                            swal("Error", "Invalid Email Address!","error");
				// 			$(".forgot_msg").html("<div class='err_msg'>Invalid Email Address!</div>");

						}

						else{
                            swal("Success", "Please check your email to reset your password!","success");
				// 			$(".forgot_msg").html("<div class='success_msg'>Please check your email to reset your password!</div>");

							setTimeout(function(){

								window.location.href="";

							}, 3000);

						}

					});

					return false;

				}

			});

			$('[name="payment_mode"]').click(function(){

				if($(this).val()=="card_pay"){

					$('#dropin-container').show();

				}

				else{

					$('#dropin-container').hide();

				}

			});

			$("#checkout_form").submit(function(e){

				if($(this).valid()){

                    e.preventDefault();

                    $.LoadingOverlay("show", {
						
						text        : "Please Wait"
					});

					var checked=$("#diff_ship_address").prop("checked");

					if(checked==false){

						$("#shipping_fname").val($("#billing_fname").val());

						$("#shipping_lname").val($("#billing_lname").val());

						$("#shipping_country").val($("#billing_country").val());

						$("#shipping_address").val($("#billing_address").val());

						$("#shipping_state").val($("#billing_state").val());

						$("#shipping_zip").val($("#billing_zip").val());

						$("#shipping_email").val($("#billing_email").val());

						$("#shipping_phone").val($("#billing_phone").val());

					}

					

					setTimeout(function(){

					    stripeToken = $("input[name=stripeToken]").val();

					    $("<input />").attr("type", "hidden")

                      .attr("name", "stripeToken")

                      .attr("value", stripeToken)

                      .appendTo("#checkout_form");

                      

                      total_price = $("input[name=total_price]").val();

                      

					    $("<input />").attr("type", "hidden")

                      .attr("name", "total_price")

                      .attr("value", total_price)

                      .appendTo("#checkout_form");

                      

					    $.ajax({

                        url: '<?=base_url("Homecontroller/stripe_payment")?>',

                        type: 'POST',

                        data: $("#checkout_form").serialize(),

                        dataType: "json",
    
                        error: function(res) {
                        //   var err = eval("(" + xhr.responseText + ")");
                        console.log(res);
                        //   swal(res.responseText);
                          swal({
                              text: res.responseText,
                            });
                        },
                        success: function(res){
                           console.log(res.status);
                          if(res.status){
    
                            $("input[name=stripeToken]").remove();

                            

                            	$.LoadingOverlay("show");

				// 	return;

					var orderidunique = $("#orderidunique").val();

					$.ajax({

						method: "POST",

						url: "<?php echo base_url(); ?>ajax_call",

						data: {

							rec: $("#checkout_form").serialize(),

							action: "checkout_data"

						}

					})

					.done(function( msg ) {

						 window.location.href="<?php echo base_url(); ?>thank-you?order_id="+orderidunique;

						var card_pay=$("#card_pay").prop("checked");

						var stripe_pay = $("#stripe_pay").prop("checked");

						if(card_pay==false && stripe_pay == false){

							$("#paypal_form").submit();

						}else if(stripe_pay == true){

							totalPrice = $(".totalPrice").val();

                            window.location.href="<?php echo base_url(); ?>thank-you?order_id="+orderidunique;

				// 			pay(totalPrice);

						}

					});
                    
					return false;

                            // $("").html(res.message);

                          }else{

                              

                            $("#card-errors").html(res.message);

                            $("input[name=stripeToken]").remove();

                            $.LoadingOverlay("hide");

                            // setTimeout(function(){ window.location.href = ""; }, 2000);

                            

                            return;

                          }  

                        }
                        


                    });
                    $.LoadingOverlay("hide");
                    // window.confirm("Your Transaction has been cancelled!!!");
                    // $( function() {
                    //     $("#dialog").css("display", "block");
                    //     $( "#dialog" ).dialog();
                    //   } );

                    }, 1000);

                

				// 	$.LoadingOverlay("show");

				// // 	return;

				// 	var orderidunique = $("#orderidunique").val();

				// 	$.ajax({

				// 		method: "POST",

				// 		url: "<?php echo base_url(); ?>ajax_call",

				// 		data: {

				// 			rec: $(this).serialize(),

				// 			action: "checkout_data"

				// 		}

				// 	})

				// 	.done(function( msg ) {

				// 		// window.location.href="<?php echo base_url(); ?>thank-you?order_id="+orderidunique;

				// 		var card_pay=$("#card_pay").prop("checked");

				// 		var stripe_pay = $("#stripe_pay").prop("checked");

				// 		if(card_pay==false && stripe_pay == false){

				// 			$("#paypal_form").submit();

				// 		}else if(stripe_pay == true){

				// 			totalPrice = $(".totalPrice").val();

    //                         window.location.href="<?php echo base_url(); ?>thank-you?order_id="+orderidunique;

				// // 			pay(totalPrice);

				// 		}

				// 	});

				// 	return false;

				};

			});

			$("#diff_ship_address").click(function(){

				$("#ship_different_address").find("input").val("");

				$('#shipping_country').val("");

				var checked=$(this).prop("checked");

				if(checked==true){

					$("#ship_different_address").find("input").attr("required", true);

					$("#ship_different_address").find("select").attr("required", true);

				}

				else{

					$("#ship_different_address").find("input").removeAttr("required");

					$("#ship_different_address").find("select").removeAttr("required");

				}

			});

			$(".place_order_btn, .sell_item_btn").click(function(){

				<?php if(null === $this->session->userdata('auth_user')){ ?>

					$("#login-signup-modal").modal("show");

					return false;

				<?php } ?>

			});

			$(".coupon_btn").click(function(){

				var c_code=$(".c_code").val();

				if(c_code==""){

					swal("Error", "Please enter coupon code!","error");

				}

				else{

					$.ajax({

						method: "POST",

						url: "<?php echo base_url(); ?>ajax_call",

						data: {

							c_code: c_code,

							action: "coupon_data"

						}

					})

					.done(function( msg ) {

						if(msg=="apply"){

							swal("Success", "Coupon has Applied!","success");

							setTimeout(function(){ 

								window.location.href="";

							}, 3000);

						}

						else{

							swal("Error", "Coupon has not Applied!","error");

						}

					});

					return false;

				}

			});

			$(".feedback_form").submit(function(){

				if($(this).valid()){

					$.ajax({

						method: "POST",

						url: "<?php echo base_url(); ?>ajax_call",

						data: {

							rec: $(this).serialize(),

							action: "feedback_data"

						}

					})

					.done(function( msg ) {

						swal("Success", "Feedback has been made!","success");

						setTimeout(function(){ 

							window.location.href="";

						}, 3000);

					});

					return false;

				}

			});

			$('#star1').starrr({

			  change: function(e, value){

				if (value) {

				  $('.rating').val(value);

				}

			  }

			});

			$(".offer_form").submit(function(){

				var count = $("#offer_count").val();

				productSlug = $("#productSlug").val();

				offerTime = $("#offerTime").val();

				

				toId = $("#toId").val();

				if(count>=3){

						 swal("Error","Sorry offer reached maximum limit.","error");

				// 		 setTimeout(function(){

    //     					window.location.href="";

    //     				}, 1000);

						 return false;

					}

				if(offerTime == 0){

				    swal("Error","Offer can be submitted again after 48 hours.","error");

				    // setTimeout(function(){

        // 					window.location.href="";

        // 				}, 1000);

						 return false;

				}

				if($(this).valid()){

					$.ajax({

						method: "POST",

						url: "<?php echo base_url(); ?>ajax_call",

						data: {

							item_id: $(".offer_form").find("#item_id").val(),

							offer_price: $(".offer_form").find("#offer_price").val(),

							offer_msg: $(".offer_form").find("#offer_msg").val(),

							auth_user_id: "<?php echo @$auth_user_data[0]->id; ?>",

							productSlug:productSlug,

							toId:toId,

							action: "offer_submit"

						}

					})

					.done(function( msg ) {

					   // console.log(msg);

					   // return;

						swal("Success","Your offer has been sent. The seller has 48 hours to respond","success");

						// console.log(msg);

						// if(msg == 'exit'){

						// 	 swal("Error","Offer allready submitted! please wait...","error");

						// }else{

							 

						// }

					   

        				setTimeout(function(){

        					window.location.href="";

        				}, 3000);

					});

					return false;

				}

			});

			$('.flexslider').flexslider({

				animation: "slide"

			});

		});

		function addCart(attr){		

			if(attr=="k"){								

				swal("Error", "You have already added this product in cart!","error");							

			}			

			else{

				$(".add-to-cart").attr("href","javascript:addCart('k');");

				$.ajax({

					method: "POST",

					url: "<?php echo base_url(); ?>ajax_call",

					data: {

						item_id: $("#item_id").val(),

						item_count: $("#item_count").val(),

						action: "add_to_cart"

					}

				})

				.done(function( msg ) {

					if(msg=="success"){

						var cart_count=parseInt($("#cart_count").val());

						cart_count=cart_count+parseInt($("#item_count").val());

						$(".mini_cart_data span").html("Basket("+cart_count+")");

						swal("Success", "Item successfully added.","success");

					}

				});						

			}

		}

		function like(item_id){

			$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					item_id: item_id,

					action: "add_like"

				}

			})

			.done(function( msg ) {

				var msg_data = JSON.parse(msg);

				$(".like_item_"+msg_data.id).attr('title', msg_data.likes+' Likes');

				if(msg_data.data=="increase"){

					$(".like_item_"+msg_data.id+" > i").removeAttr("class").addClass("fa fa-heart");

				}

				else{

					$(".like_item_"+msg_data.id+" > i").removeAttr("class").addClass("fa fa-heart-o");

				}

			});

		}

		function bookmark(item_id){

			$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					item_id: item_id,

					action: "add_bookmark"

				}

			})

			.done(function( msg ) {

				var msg_data = JSON.parse(msg);

				if(msg_data.data=="increase"){

					$(".bookmark_item_"+msg_data.id+" > i").removeAttr("class").addClass("fa fa-bookmark");

				}

				else{

					$(".bookmark_item_"+msg_data.id+" > i").removeAttr("class").addClass("fa fa-bookmark-o");

				}

			});

		}

		function openMessenger(item_user_id){

			$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					action: "get_channel", 

					user_id: item_user_id,

					auth_user_id: "<?php echo @$auth_user_data[0]->id; ?>" 

				}

			})

			.done(function( channel_id ) {

				$("#myMessenger").find("iframe").attr("src", "<?php echo base_url(); ?>messenger/"+channel_id+"/"+item_user_id);

				$("#myMessenger").modal("show");

			});

		}

		

		function signOut() {

			var auth2 = gapi.auth2.getAuthInstance();

			auth2.signOut().then(function () {

				console.log('User signed out.');

			});

		}

		function makeOffer(item_id,productSlug,toId){

			$(".offer_form").find("#productSlug").val(productSlug);

			$(".offer_form").find("#toId").val(toId);

			

			$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					item_id: item_id,

					action: "offer_data"

				}

			})

			.done(function( msg ) {

				var data = JSON.parse(msg);

				$(".offer_form").find("#item_id").val(data.id);

				$(".offer_form").find("#offer_count").val(data.c);

				console.log(data.c);

				if(data.c >= 3){

				     swal("Error","Sorry offer reached maximum limit.","error");

				     return;

				}

				$(".offer_form").find("#offerTime").val(data.offerTime);

				// $(".offer_form").find("#offer_count").val(3);

				

				var str='';

				if(data.c=='0'){

					str = "1/3";

				}else if(data.c=='1'){

					str = "2/3";

				}else if(data.c=='2'){

					str = "Final Offer";

				}

				

				$(".offer_form").find("#offer_count_span").html(str);

				$(".offer_img img").attr("src", "<?php echo base_url(); ?>uploads/item/"+data.item_image.split('"')[1]);

				$(".offer_form").find(".item_name").html(data.item_name);

				$(".offer_form").find(".item_price span").html("<?php echo CURRENCY; ?>"+data.price);

				$("#makeOffer").modal("show");

			});

		}

		function followUser(follow_user_id){

			$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					action: "follow_user", 

					follow_user_id: follow_user_id,

					auth_user_id: "<?php echo @$auth_user_data[0]->id; ?>" 

				}

			})

			.done(function( msg ) {

				var msg = JSON.parse(msg);

				if(msg.data=="decrease"){

					$(".follow_"+msg.id).html("Follow");

				}

				else{

					$(".follow_"+msg.id).html("Followed");

				}

			});

		}

		function saveDraft(id){

			if(!id){

				id="";

			}

			$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					action: "save_draft",

					id: id,

					rec: $(".sell-an-item-forms > form").serialize()

				}

			})

			.done(function( msg ) {

				swal("Success","Item has been saved in draft","success");

				setTimeout(function(){

					window.location.href="";

				}, 3000);

			});

		}

		topContent();

		var inc=0;

		function topContent(){

		    inc++;

		    if(inc==1){

		        $(".toprecomerce p").html("Preloved resell is a second revenue stream!");

		    }

		    else if(inc==2){

		        $(".toprecomerce p").html("Give your wardrobe a detox in very easy steps!");

		    }

		    else{

		        $(".toprecomerce p").html("The New Home Of Reccommerce And Your Answer To fashion sustainability!");

		    }

		    if(inc==3){

		        inc=0;

		    }

		    setTimeout(function(){ topContent(); }, 5000);

		}

// 		var stickyOffset = $('.sticky_').offset().top;

// 		$(window).scroll(function(){

// 		  var sticky = $('.sticky_'),

// 			  scroll = $(window).scrollTop();

			

// 		  if (scroll >= stickyOffset){

// 			sticky.addClass('fixed_');

// 			$(".royal").addClass("select12");

// 		  }	

// 		  else{ 

// 			sticky.removeClass('fixed_');

// 			$(".royal").removeClass("select12");

// 		  }

// 		});

		</script>







	<script>

			$(".place_order_btn").click(function(){





			var stripePay=$("#stripe_pay").prop("checked");

		if(stripePay == true){

			

		}else{	

			 var submitButton = document.querySelector('.place_order_btn');

			 braintree.dropin.create({

			   authorization: 'sandbox_s94pv22h_fx4wjvxjcjf3g9s6',

			   selector: '#dropin-container'

			 }, function (err, dropinInstance) {

			   if (err) {

				 // Handle any errors that might've occurred when creating Drop-in

				 console.error(err);

				 return;

			   }

			   submitButton.addEventListener('click', function () {

				var card_pay=$("#card_pay").prop("checked");

				

				

				if(card_pay==true && $("#checkout_form").valid()){

				 dropinInstance.requestPaymentMethod(function (err, payload) {

				   if (err) {

					// Handle errors in requesting payment method

				   }

				   else{

				   	var orderidunique = $("#orderidunique").val();

					$.ajax({

						method: "POST",

						url: "<?php echo base_url(); ?>ajax_call",

						data: {

							action: "braintree_success",

							auth_user_id: "<?php echo @$auth_user_data[0]->id; ?>" 

						}

					})

					.done(function( msg ) {

						// window.location.href="<?php echo base_url(); ?>thank-you?order_id="+orderidunique;

					});

					console.log(payload);

					// Send payload.nonce to your server

				   }

				 });

				}else if(stripePay == true){

					// alert();

				} 

			   });

			 });

			}

		});

		</script>

		<script>

		// Get the elements with class="column"

		// $("body").click(function(){

		// 	if($("#checkout_form").valid()){

		// 		var orderidunique = $("#orderidunique").val();

		// 		$.ajax({

		// 			method: "POST",

		// 			url: "<?php echo base_url(); ?>ajax_call",

		// 			data: {

		// 				action: "braintree_success",

		// 				auth_user_id: "<?php echo @$auth_user_data[0]->id; ?>" 

		// 			}

		// 		})

		// 		.done(function( msg ) {

		// 			window.location.href="<?php echo base_url(); ?>thank-you?order_id="+orderidunique;

		// 		});

		// 	}

		// });

		var elements = document.getElementsByClassName("column");



		// Declare a loop variable

		var i;



		// List View

		$(".grid_heart").hide();

		function listView() {

		  $(".grid_heart").hide();  

		  $(".buttonofgrid").show();

		  $(".pro-name").show();   

		  $("#list_grid").removeClass("grid_view_content");

		  $("#list_grid").addClass("list_view_content");  



		   $(".changewidth").addClass("widthoftext");  

		  

		  for (i = 0; i < elements.length; i++) {

			elements[i].style.width = "100%";

		  }

		}



		// Grid View

		function gridView() {

			$(".changewidth").removeClass("widthoftext");

			$(".changewidth").removeClass("widthoftext");

		  $(".grid_heart").show();  

		  $(".buttonofgrid").hide();  

		  $(".pro-name").hide(); 

		  $("#list_grid").removeClass("list_view_content");

		  $("#list_grid").addClass("grid_view_content");

		  document.getElementsByClassName("changewidth").style.width = "50%";

		  for (i = 0; i < elements.length; i++) {

			elements[i].style.width = "25%";

		  }

		}



		/* Optional: Add active class to the current button (highlight it) */

// 		var container = document.getElementById("btnContainer");

// 		var btns = container.getElementsByClassName("btn");

// 		for (var i = 0; i < btns.length; i++) {

// 		  btns[i].addEventListener("click", function() {

// 			var current = document.getElementsByClassName("active");

// 			current[0].className = current[0].className.replace(" active", "");

// 			this.className += " active";

// 		  });

// 		}





		function listViewuserlisting() {

		  $(".grid_heart").hide();  

		  $(".grid_list").removeClass("gridviewshow");

		  $(".grid_list").addClass("listviewshow");  

		  for (i = 0; i < elements.length; i++) {

			elements[i].style.width = "100%";

		  }

		}



		// Grid View

		function gridViewuserlisting() {

		  $(".grid_heart").show();  

		  $(".grid_list").removeClass("listviewshow");

		  $(".grid_list").addClass("gridviewshow");

		  for (i = 0; i < elements.length; i++) {

			elements[i].style.width = "25%";

		  }

		}

		</script>

		<script>

        function openNav() {

			document.getElementById("mySidenav").style.width = "250px";

			document.getElementById("main").style.marginLeft = "0px";

			document.getElementById("mainstep").style.backgroundColor = "white";

        }

        function closeNav() {

			document.getElementById("mySidenav").style.width = "0";

			document.getElementById("main").style.marginLeft= "0";

			document.body.style.backgroundColor = "white";

        }

		

		function openSearch() {

			document.getElementById("mySideSearch").style.width = "300px";

			return false;

		}

		function closeSearch() {

			document.getElementById("mySideSearch").style.width = "0";

		}

		

		function openNotification() {

			document.getElementById("mynotify").style.width = "300px";

			$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					action: "notification_read"

				}

			});

			return false;

		}





		function openNotification_alert() {

			document.getElementById("mynotify_alert").style.width = "300px";

			$.ajax({

				method: "POST",

				url: "<?php echo base_url(); ?>ajax_call",

				data: {

					action: "notification_read_alert"

				},

				success: function(res)

	            {

	              	$("#notificationremove").removeClass('notify_msg');

	            }

			});



			return false;

		}

		function closeNotification() {

			document.getElementById("mynotify").style.width = "0";

		}



		function closeNotification_alert() {

			document.getElementById("mynotify_alert").style.width = "0";

		}

		</script>



		<script>

function getstatus(id,type){

		$("#idofstatus").val(id);	

        $.ajax({

            type: "POST",

            url: '<?php echo base_url(); ?>ajax_call',

            data:{id:id,

            	action: "getorderstatus"

            },

            dataType:'json',

            success: function(data)

            { 

            $(".trackingInformation").val("");	

             if(type == 'Sold'){

             	$("#onlysoldshow").show();

             }else{

             	$("#onlysoldshow").hide();

             }

             // console.log(data);

              $("#typeofstatus").html(type);	

              
              $("#tracnumber").html(data.orders.trackingNumber);  

               $("#provider").html(data.orders.shippingProvider);	

               $("#phonenumber").html(data.orders.shipping_phone);	

              $("#shipto").html(data.orders.created_at+"<br/><br/>"+data.orders.shipping_fname+" "+data.orders.shipping_lname+"<br/>"+data.orders.shipping_country+"<br/>"+data.orders.shipping_address+"<br/>"+data.orders.shipping_state+"<br/>"+data.orders.shipping_zip);	

              $("#status").html(data.orders.payment_status);

              $('select#statuschange').val(data.orders.payment_status);

              $('.shippingProvider').val(data.orders.shippingProvider);
              $('.trackingNumber').val(data.orders.trackingNumber);

              $(".trackingInformation").val(data.orders.trackingInformation);

              $(".trackingInformations").html(data.orders.trackingInformation);

              $("#change_status").modal("show"); 

            }

        });



   

}    



function showhoverimg(val){

	$(val).find(".imagemain").hide(); 

	$(val).find(".imagemainhover").show(); 	

}



function removerhoverimage(val){

	$(val).find(".imagemain").show(); 

	$(val).find(".imagemainhover").hide(); 	

}



function change_statusofuser(){

   var id = $("#idofstatus").val(); 

   var status = $("#statuschange").val(); 

   var trackingInformation = $(".trackingInformation").val();

 var shippingProvider = $(".shippingProvider").val();

   var trackingNumber = $(".trackingNumber").val();

   if(status !== ""){

   		$.ajax({

            type: "POST",

            url: '<?php echo base_url(); ?>ajax_call',

            data:{id:id,

             status:status,

             trackingInformation: trackingInformation,

             shippingProvider: shippingProvider,

             trackingNumber: trackingNumber,

             action: "updateorderstatus"

            },

            dataType:'json',

            success: function(data)

            { 

              swal("Success","Status successfully changed","success");

              $("#change_status").modal("hide"); 

              setTimeout(function(){

					window.location.href="";

			  }, 1000);

            }

        });

	}

}



function save_feedback(){

		 var user_id = $("#user_id").val(); 

	     var user_feedbackid = $("#user_feedbackid").val(); 

	     var rating = $("#rating123").val(); 

	     var notes = $("#notes").val();

	     var orderId = $("#orderId").val();



	     $.ajax({

	            type: "POST",

	            url: '<?php echo base_url(); ?>ajax_call',

	            data:{user_id:user_id,

	             user_feedbackid:user_feedbackid,

	             rating:rating,

	             notes:notes,

	             orderId:orderId,

	             action: "savefeedback"

	            },

	            dataType:'json',

	            success: function(data)

	            {
	            	swal("Success","Your feedback has been submitted successfully.","success");
	            	setTimeout(function(){ window.location.href = ""; }, 2000);


	              $("#feedbackpopup").modal("hide"); 

	            }

         });

}

function already(){
  swal("error","You cannot rate this product again.","error");
}

<?php $query = $this->db->get("stripeSettings");

$ret = $query->row();



?>



</script>




 <style type="text/css">

 

   

    /* Cookie Dialog */

    #gdpr-cookie-message {

        position: fixed;

        right: 30px;

        bottom: 30px;

        max-width: 375px;

        background-color: var(--purple);

        padding: 20px;

        border-radius: 5px;

        box-shadow: 0 6px 6px rgba(0,0,0,0.25);

        margin-left: 30px;

		background:#de9252

    }

    #gdpr-cookie-message h4 {

        color: #000;

        font-family: 'Quicksand', sans-serif;

        font-size: 18px;

        font-weight: 500;

        margin-bottom: 10px;

    }

    #gdpr-cookie-message h5 {

        color: #000;

        font-family: 'Quicksand', sans-serif;

        font-size: 15px;

        font-weight: 500;

        margin-bottom: 10px;

    }

    #gdpr-cookie-message p, #gdpr-cookie-message ul {

        color: white;

        font-size: 15px;

        line-height: 1.5em;

    }

    #gdpr-cookie-message p:last-child {

        margin-bottom: 0;

        text-align: right;

    }

    #gdpr-cookie-message li {

        width: 49%;

        display: inline-block;

    }

    #gdpr-cookie-message a {

        color: #000;

        text-decoration: none;

        font-size: 15px;

        padding-bottom: 2px;

        border-bottom: 1px dotted rgba(255,255,255,0.75);

        transition: all 0.3s ease-in;

    }

    #gdpr-cookie-message a:hover {

        color: white;

        border-bottom-color: var(--red);

        transition: all 0.3s ease-in;

    }

    #gdpr-cookie-message button {

        border: none;

        background: var(--red);

        color: white;

        font-family: 'Quicksand', sans-serif;

        font-size: 15px;

        padding: 7px;

        border-radius: 3px;

        margin-left: 15px;

        cursor: pointer;

        transition: all 0.3s ease-in;

    }

    #gdpr-cookie-message button:hover {

        background: white;

        color: var(--red);

        transition: all 0.3s ease-in;

    }

    button#gdpr-cookie-advanced {

        background: white;

        color: var(--red);

    }

    #gdpr-cookie-message button:disabled {

        opacity: 0.3;

    }

    #gdpr-cookie-message input[type="checkbox"] {

        float: none;

        margin-top: 0;

        margin-right: 5px;

    }

    </style>

<script type="text/javascript">

    



    $(document).ready(function() {


        $('body').ihavecookies(options);



        if ($.fn.ihavecookies.preference('marketing') === true) {

            console.log('This should run because marketing is accepted.');

        }



        $('#ihavecookiesBtn').on('click', function(){

            $('body').ihavecookies(options, 'reinit');

        });

       

    });
    
   



    </script>		



	</body>

</html>