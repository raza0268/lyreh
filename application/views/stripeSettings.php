<?php $this->load->view('includes/admin/header'); ?>
<div class="content-wrapper">
 <section class="content">
<div class="row " style="    margin-left: 250px;">
<div class="col-md-12">
       <form >  
    <div class="text-center padding"><h2> My Form</h2></div>  
   <div class="form-group row">  
                 
                       <div class="form-row ">  
               <div class="form-group col-md-6">  
                   <label for="firstName" class="form-label col-lg-12">First Name</label>  
                   <input type="text" class="form-control col-lg-12" id="firstName" placeholder="First Name" autocomplete>  
               </div>  
               <div class="form-group col-md-6">  
                   <label for="lastName" class="form-label col-lg-12">Last Name</label>  
                   <input type="text" class="form-control col-lg-12" id="lastName" placeholder="Last Name">  
               </div>  
  <div class="form-group col-md-6">  
                   <label for="email" class="form-label col-lg-12">Email  Id</label>  
                   <input type="password" class="form-control col-lg-12" id="email" placeholder="mail">  
               </div>  
  <div class="form-group col-md-6">  
                   <label for="password" class="form-label col-lg-12">password</label>  
                   <input type="text" class="form-control col-lg-12" id="lastName" placeholder="password">  
               </div>  
    
      <div class="form-group col-lg-12">  
               <label for="comment">Comment:</label>  
               <textarea class="form-control col-lg-12" rows="5" id="comment"></textarea>  
           </div>  
     
            <div class="form-group col-lg-4">  
            <button type="submit" class=" btn btn-primary padding-top">Submit</button>  
            <button type="submit" class=" btn btn-danger padding-top">cancel</button>  
   </div> 
</div>
</div>
</form>	
</div>  

</div>
</section>
</div>
<?php $this->load->view('includes/admin/footer'); ?> 