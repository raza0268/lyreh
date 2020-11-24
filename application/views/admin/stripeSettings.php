<?php $this->load->view('includes/admin/header'); ?>
<style type="text/css">
  @media(min-width:992px ){
    .ml300_lg{
      margin-left: 300px;
    }
  }


  @media(max-width: 991px){
    .p_sm{
      padding: 0px 25px;
    }
  }
.main-footer{
  bottom: 0;
    position: fixed;
}
.padding{
  padding-top: 20px;
  padding-bottom: 20px;
}



</style>

<div class="row ml300_lg">
<div class="col-md-12 p_sm">
  


 
       <form action="<?php echo base_url("Admincontroller/saveSettings") ?>" method="post">  
    <div class="text-center padding"><h2> Stripe Settings</h2></div>  
<?php if(!empty($this->session->flashdata("success"))){ ?>
                 <div class="row alert alert-success" style="margin-right: 17px;"><?php echo $this->session->flashdata("success"); ?></div>
               <?php } ?>
   <div class="form-group row">  
      
                       <div class="form-row row" style="width: 99%">  

               <div class="form-group col-lg-6">  
                   <label for="firstName" class="form-label col-lg-12">Public Key </label>  
                   <input type="text" class="form-control col-lg-12" name="publicKey" id="firstName" placeholder="Public Key" value="<?php if(!empty($stripeData)){ echo $stripeData->publicKey; } ?>" required="required">  
               </div>  
               <div class="form-group col-lg-6">  
                   <label for="lastName" class="form-label col-lg-6">Private Key</label>  
                   <input type="text" class="form-control col-lg-12" name="privateKey" id="lastName" placeholder="Private Key" value="<?php if(!empty($stripeData)){
                    echo $stripeData->privateKey; } ?>" required="required">  
                   <input type="hidden" name="stripeId" value="<?php if(!empty($stripeData->stripeId)){
                    echo $stripeData->stripeId;
                   } ?>">
               </div>  
               </div>
                </div>
 <!--  <div class="form-group col-md-6">  
                   <label for="email" class="form-label col-lg-12">Email  Id</label>  
                   <input type="password" class="form-control col-lg-12" id="email" placeholder="mail">  
               </div>  
  <div class="form-group col-md-6">  
                   <label for="password" class="form-label col-lg-12">password</label>  
                   <input type="text" class="form-control col-lg-12" id="lastName" placeholder="password">  
               </div>  --> 
    
   
     <div class="row">
            <div class="form-group col-lg-12 pl-0">  
            <button type="submit" class=" btn btn-primary padding-top">Save Settings</button>  
   
   </div>
  </div>
   </form>
   </div>
</div> 
<?php $this->load->view('includes/admin/footer'); ?> 