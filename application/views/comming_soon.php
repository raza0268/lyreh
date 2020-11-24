<?php $this->load->view('includes/header'); ?>
<style type="text/css">
.pull-right-xs {
    float: right;
}
.btn.btn_black:hover{
	    background-color: rgba(201, 180, 189, 1);
    border-color: transparent;
    color: #414141!important;
}

@media (min-width: 768px) {
   .pull-right-xs {
      float: left;
   }
}
	.email_css{
		border-radius: 0;
    font: normal normal normal 14px/1.4em avenir-lt-w01_35-light1475496,sans-serif;
    -webkit-appearance: none;
    -moz-appearance: none;
    border-width: 0 0 1px 0;
    background-color: rgba(255, 255, 255, 1);
    box-sizing: border-box !important;
    color: #000000;
    border-style: solid;
    border-color: rgba(0, 0, 0, 1);
    padding: 3px;
    margin: 0;
    max-width: 100%;
    -webkit-box-flex: 1;
    flex: 1;
    text-overflow: ellipsis;
	}
	.email_css:focus{
		outline: none;
		border-bottom: 2px solid rgba(0, 0, 0, 1);
	}
	.btn_black{
		background-color: rgba(65, 65, 65, 1);
    border: solid rgba(65, 65, 65, 1) 0px;
    cursor: pointer !important;
    border-radius: 0;
	}
	.pl21{
		    padding-left: 21px;
	}
	.mr29{
margin-right: 29px;
	}


	@media(min-width: 320px) and (max-width: 767px){
		.h250sm{
			height: 250px!important;
		}
		.text_sm_center{
			text-align: center!important;
		}
		.w120sm{
			width: 120px!important;
		}
		.sm-none{
			display: none;
		}
		.mh650{
		min-height: 580px;
		}
	
	}
@media(min-width: 767px){
		.dynamic_pd{
		    position: relative;
    width: calc(100% - 124px);
    min-width: 980px;
    display: flex;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    margin: 0 auto;
	}
		.h2_lg{
			margin: 96px 0px 27px calc((100% - 490px) * 0.5);
		}
		.text_lg_mg{
			     margin: 0px 0px 20px calc((100% - 490px) * 0.5);
		}
		.form_mg{
			margin: 0px 0px 0 calc((100% - 490px) * 0.5);
			width: 212px!important;
		}
		.head_mg{
			margin: 0px 0px 10px calc((100% - 361px) * 1);
		}
		.lg-none{
			display: none;
		}
		.mh650{
			 min-height: 650px;
		}
}
.font32{
	font-size: 32px!important;
}

</style>



<div class="container-fluid mt-3">
	
<div class="row">
	<div class="col-md-12 text_sm_center">
		<img src="<?php echo base_url() ?>uploads/smallLogo.jpg" width="100px">
	</div>
</div>
</div>
<div class="dynamic_pd">
<div class="row flex-sm-row-reverse mh650">

	<div class="col-md-6 col-12">
	<img src="<?php echo base_url() ?>uploads/bathtub.jpg" width="100%" height="100%" class="h250sm pt-3"> 	
	</div>
	<div class="col-md-6 col-12">
		<h2 style="font-weight:700;color: #414141;font-size: 44px;" class="h2_lg sm-none">Our new<br /> website is on <br/>its way.</h2>

		<h2 class="font32 lg-none " style="font-weight:700;color: #414141;">Our new website<br/> is on its way.</h2>

		<div class="text_lg_mg" style="left: 25px;">
			<p class="font18" style="line-height: 1.7em;margin: 0;color: #414141;">Sign up to be the first</p>
			<p class="font18" style="line-height: 1.7em;margin: 0;color: #414141;">to know when we launch.</p>
		</div>
		<div class="form_mg w-100" style="  
    left: 19px;">
    <div style="    margin: 14px 0px 9px 0;">
    	
			<input type="email" name="" class="email_css w-100 pl21" placeholder="Enter your email here*">
    </div>
    <div style="    width: 212px;">
			<button class="btn btn_black text-white font14 w-100 w120sm" style="    line-height: 9px;">Notify Me</button>
			</div>

			<div class="mt-4"  style="
    left: 26px;">
    <i class="fa fa-facebook mr29 font17" aria-hidden="true"></i>
<i class="fa fa-pinterest-p mr29 font17" aria-hidden="true"></i>
<i class="fa fa-instagram font17" aria-hidden="true"></i>

	
</div>
		</div>


	</div>

	

</div>






</div>


</div>

<div class="row mt-3 sm-none  mb-4">
	<div class="col-md-6 col-12">
		<div style="display: flex;">
		<div style="width: 103px;margin-right: 10px;"> <p class="text-right font14">Contact</p></div><div style=" width: 27px;   border-top: 1px solid rgba(0, 0, 0, 1);    margin: 9px 0px 10px calc((100% - 490px) * 0);"></div>

<div style="width: 230px;margin-left: 10px;"><p class="font14 mb-0">Telephone. 123-456-7890</p>
<p class="font14">Email. info@mysite.com</p></div>
</div>
	</div>

	<div class="col-md-6 col-12">
		<div style="display: flex;">
		<div style="width: 103px;margin-right: 10px;" class="head_mg"> <p class="text-right font14">Head Office</p></div><div style=" width: 27px;   border-top: 1px solid rgba(0, 0, 0, 1);    margin: 9px 0px 10px calc((100% - 490px) * 0);"></div>

<div style="width: 230px;margin-left: 10px;"><p class="font14 mb-0">500 Terry Francois Street</p>
<p class="font14">San Francisco, CA 94158</p></div>
</div>
	</div>

</div>


<div class="row mt-3 lg-none">
	<div class="col-md-6 col-12">
		<div style="display: flex;">
		<div style="width: 65px;margin-right: 10px;"> <p class="font15 ">Contact</p></div><div style=" width: 27px;   border-top: 1px solid rgba(0, 0, 0, 1);    margin: 9px 0px 10px calc((100% - 490px) * 0);"></div>
	</div>

<div style="width: 230px;"><p class="font15 mb-0">Telephone. 123-456-7890</p>
<p class="font15">Email. info@mysite.com</p></div>

	</div>

	<div class="col-md-6 col-12 mt-4 mb-4">
		<div style="display: flex;">
		<div style="width: 103px;" class="head_mg"> <p class=" font15">Head Office</p></div>
		<div style=" width: 27px;   border-top: 1px solid rgba(0, 0, 0, 1);    margin: 9px 0px 10px calc((100% - 490px) * 0);"></div>
	</div>

<div style="width: 230px;"><p class="font15 mb-0">500 Terry Francois Street</p>
<p class="font15">San Francisco, CA 94158</p></div>

	</div>

</div>
<div class="row" style="background-color: rgba(65, 65, 65, 1);">
	<div class="col-md-12">
		<p class=" mb-0 text-center font14" style="color: #999999;padding: 20px 0px;    letter-spacing: 1px;">© 2023 by Goshoe. Proudly created with Wix.com</p>
	</div>
</div>