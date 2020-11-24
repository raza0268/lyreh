<?php $this->load->view('includes/front/front_header'); ?>
<style>
.pro-name.left_div {
    width: 33%;
    float: left;
}
.right_div {
    width: 66%;
    float: left;
}


.panel .panel-heading .nav-tabs {
  margin-bottom: -11px;
}

.followbtn{
  background-color: black; 
  color:white; 
  border: none; 
  padding: 8 10 8 10; 
  cursor: hand; 
  text-decoration:none; 
  margin-right:10px;
}
.followbtn:hover{
  background-color: #d99f6f; 
  text-decoration:none; 
  color:white;
  border: none; 
}
.chatbtn{
  background-color: gray; 
  color:white !important; 
  border: none; 
  padding: 8 10 8 10; 
  cursor: pointer; 
  text-decoration:none;
}
.chatbtn:hover{
  background-color: #d99f6f; 
  color:white !important; 
  border: none; 
  padding: 8 10 8 10; 
  cursor: pointer; 
  text-decoration:none;
}

 .hoverheart:hover{
  color:#d99f6f !important;
}
.tabbuttonhover:hover{
 background-color:#d99f6f !important; 
}

.hoveroflink:hover{
  color:#d99f6f !important;
  text-decoration: none;
}
@media(min-width: 320px) and (max-width: 575px) {
.jus_center_sm{
justify-content: center!important;
display: flex!important;
} 
#mx40wsm{
  max-width: 100px!important;
  max-height:100px!important;
  min-height:100px!important;
  height:100px!important;
}
.text_center_xs{
  text-align: center;
}

}
   @media(min-width: 576px){
      .ml_50_sm{
        margin-left: -50px;
      }
      
    }
@media (min-width: 320px) and (max-width: 991px){
  .xs_none{
    display: none!important;
  }
}
@media (min-width: 320px) and (max-width: 360px){
  .w100_xs{
    width: 100%!important;
  }
}
</style>
<?php 

// function getTheDay($date){
//     $curr_date=strtotime(date("Y-m-d H:i:s"));
//     $the_date=strtotime($date);
//     $diff=floor(($curr_date-$the_date)/(60*60*24));
//     switch($diff){
//       case 0:
//         return "Today";
//         break;
//       case 1:
//         return "Yesterday";
//         break;
//       default:
      
//       if($diff>3){
//         if($diff>3 && $diff<=7){
//           return "This week";
//         }elseif($diff>7 && $diff<=14){
//           return "1 week ago";
//         }elseif($diff>14 && $diff<=21){
//           return "2 weeks ago";
//         }elseif($diff>21 && $diff<=30){
//           return "3 weeks ago";
//         }elseif($diff>30 && $diff<=60){
//           return "1 month ago";
//         }elseif($diff>60 && $diff<=90){
//           return "2 months ago";
//         }elseif($diff>90 && $diff<=120){
//           return "3 months ago";
//         }elseif($diff>120 && $diff<=150){
//           return "4 months ago";
//         }elseif($diff>150 && $diff<=180){
//           return "5 months ago";
//         }elseif($diff>180 && $diff<=360){
//           return "5 months ago";
//         }elseif($diff>360 ){
//           return "1 years ago";
//         }
//       } 
//     }
//   }
foreach($users as $user){
  $user_name[$user->id]=@$user->first_name." ".@$user->last_name;
  $user_address[$user->id]=$user->address;  
    $user_email[$user->id]=$user->email;  
    $user_username[$user->id]=$user->username;  
    $user_image[$user->id]=$user->user_image;  
    $online_status[$user->id]=$user->online_status;  
    $last_online[$user->id]=$user->last_online_at;
}
$offer_count=@count(unserialize($auth_user_data[0]->offer_data));
?>
<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<style type="text/css">
    .gridviewshow{
        width: 28%;
    }
    .listviewshow{
        width: 100%;
    }

</style>
<div class="container home-page">
    <div >
<?php $record_num = @end($this->uri->segment_array()); ?>
        <div >
            <div class="">
                <div class="row mt-3" style="align-items: center;">

                    <div class="col-sm-4 col-md-2 jus_center_sm" style=""> 
                          <?php 
                                $usersData = "";
                                $usersData = getUserName($record_num); 



                          ?>
                          
                            <img src="<?php echo base_url()."uploads/".$usersData->user_image;?>" alt=""  style="display: block; max-width: 80%; border-radius: 100%;    width: 120px;height: 120px !important;" class="mx40wsm" id="mx40wsm" />
                     
                    </div>
                    <div class="col-sm-8 col-md-6 ml_50_sm text_center_xs" >
                         
                         <div class="row pt123" style="margin-top: -15px;">
                            <div class="col-lg-5">
                        <h4>
                            <b>@<?php print_r(@$user_username[$record_num]);?></b>
                        </h4>
                    </div>
                    </div>
                        <div class="row" >
                            <div class="col-lg-5" >
                         <?php if(!empty($auth_user_data)){ ?>
                            <a  href="javascript:followUser(<?php echo $record_num; ?>);" class="follow_user follow_<?php echo $record_num; ?> followbtn">
                                <?php
                                $follow_user=unserialize($auth_user_data[0]->follow_user);
                                if(@in_array($record_num, $follow_user)){
                                    echo "Followed";
                                }
                                else{
                                    echo "Follow";
                                }
                                ?>
                             </a>
                          <?php } ?>

                         <!-- <a  onclick="openMessenger(<?php echo $record_num; ?>)" class="chatbtn"> -->
                         <a  href="<?php echo base_url('chat/').'profile/'.$record_num; ?>" class="chatbtn">
                            
                            Chat
                         </a>
                     </div>
                     </div>
                         <div class="row">
                            <div class="col-lg-12">
                                <div style="margin-top: 10px;"><small> <?php     
                //if(getTheDay($last_online[$item->item_user_id]) == 'Today'){
                //echo "Online"; 
              //}else{        
                echo "<b>Last Seen: </b>".getTheDay(@$last_online[$record_num]);    
              //}     
              ?></small></div>
                            </div>
                         </div>
                          <div class="row">
                                <div class="col-lg-4">
                                     <?php 
                                      $rating = get_item_rateing($record_num);  
                                     @$avgrating = @$rating[0]->rating / @$rating[0]->totalcount;
                       
                                        for($i=0; $i<5; $i++){
                                          if($i<$avgrating){
                                          ?>
                                            <i class="fa fa-star" style="color: red; margin-top: 5px; font-size: 25px;
                                            <?php if($i == 0){ echo 'padding-left: 0px;'; } ?>"></i>
                                          <?php
                                          }
                                          else{
                                          ?>
                                            <i class="fa fa-star" style="color: black; margin-top: 5px; font-size: 25px;
                                            <?php if($i == 0){ echo 'padding-left: 0px;'; } ?>"></i>
                                          <?php  
                                          } 
                                        }
                                    ?>
                                </div>
                           </div>  
                    </div>


                </div>
            </div>
        </div>
    </div><br/><br/>
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<?php 
$userid = @end($this->uri->segment_array());
        $all_purchase = $this->Crud_model->get_data("*","orders","","","","","","","created_at","DESC");
        $increament = 0;
        foreach ($all_purchase as $k => $val) {
            // print_r(unserialize($val->item_record));
            foreach (unserialize($val->item_record) as $key => $value) {
              $productinfo1 = productinfo($key); 
                
                if(@$productinfo1->item_user_id == $userid){
    $increament++;                
}
}
}

?>



  <div class="w3-bar ">
     <button class="w3-bar-item tabbuttonhover  tablink w3-red" style="background-color: black; color:white" onclick="openCity(event,'Paris')"><b><?php $totalcount = productinfo_count($record_num); echo $totalcount[0]->totalcount;?> </b> <?php if($totalcount[0]->totalcount > 1) {?> Items <?php }else{ echo 'Item';}?> For Sale </button>
    <button class="w3-bar-item tabbuttonhover  tablink " style="margin-left: 14px; background-color: black; color:white" onclick="openCity(event,'London')"><b><?php $totalcountsold = orderinfo_count($record_num); echo $increament;?></b> <?php if($totalcountsold[0]->totalcountorder > 1) { ?> Items <?php }else{ echo 'Item'; }?> Sold </button>
   
  </div> 
  <?php $userid = @end($this->uri->segment_array()); ?>

<center>
  <!-- <div id="Paris" class="w3-container w3-border city " style="padding: 35px; margin-left:13px; "> -->
  <div id="Paris" class="w3-container w3-border city ">
    
    <!-- <div id="btnContainer" class="xs_none">
        <button class="btn " onclick="listViewuserlisting()"><i class="fa fa-bars"></i> </button> 
        <button class="btn active"  onclick="gridViewuserlisting()"><i class="fa fa-th-large"></i></button>
    </div>
     <div class="row mt-3" style="display: flex; justify-content: center;">

     <?php $data1 = productinfo_id($userid); ?>

    <?php foreach ($data1 as $k => $val) {?>
       

        <div class="col-md-12  col-12 col-xs-12 grid_list listviewshow">
          <div style="position: relative;width: 272px;" class="w100_xs" >
                 <?php 
                  if(!empty($auth_user_data)){
                   $like_items=unserialize($auth_user_data[0]->like_item);
                    
                    ?>
                    <a title="<?php if(!empty($like_items)){ echo count($like_items); } ?> Likes" href="javascript:like(<?php echo $val->id; ?>)" class="like_item_<?php echo $val->id; ?> hoverheart" style="position: absolute;top: 0;right: 0px;padding: 15px 20px;color:black">
                      <?php if(@in_array($item->id, $like_items)){ ?>
                        <i class="fa fa-heart" aria-hidden="true" style="font-size: 22px"></i>
                      <?php } else { ?>
                        <i class="fa fa-heart-o" aria-hidden="true" style="font-size: 22px"></i>
                      <?php } ?>
                    </a>
                    <?php 
                  }
                ?>
            <img width="272px" height="280px" style="cursor: pointer;" onclick="location.href='<?php echo base_url()."item/".$val->slug; ?>'" src="<?php echo base_url()."uploads/item/".unserialize($val->item_image)[0];?>" class="w100_xs">

            <p onclick="location.href='<?php echo base_url()."item/".$val->slug; ?>'" style="width:200px; cursor: pointer;" class="mb-0"><b class="hoveroflink"><?php echo $val->item_name; ?></b>
            <p class="wbreakp"><?php echo $val->description; ?></p>
              <b><?php echo CURRENCY.$val->price; ?></b>
            </p>
          </div>
        </div>
    <?php } ?>
    </div> -->
    
    
    
    
    
    
      <div class="container home-page total w100_md">
  <?php if(empty($item_results)){ ?>
      <div class='empty_result'>
        <img src='<?php echo base_url(); ?>themes/front/images/packet.png' />
        <h2>Result is empty!</h2>
    </div>
  <?php } else { ?>
    <div id="btnContainer" class="xs_none">
      <button class="btn active" onclick="listView()"><i class="fa fa-bars"></i> </button> 
      <button class="btn" onclick="gridView()"><i class="fa fa-th-large"></i></button>
    </div>
  <?php } ?>
   


<div class="col-md-12 dis_grid_sm" > 



    <div class="row jus_center just_center list_view_content" id="list_grid" style="display:block;">
    
    <?php
  function getTheDay($date){
    $curr_date=strtotime(date("Y-m-d H:i:s"));
    $the_date=strtotime($date);
    $diff=floor(($curr_date-$the_date)/(60*60*24));
    switch($diff){
      case 0:
        return "Today";
        break;
      case 1:
        return "Yesterday";
        break;
      default:
      
      if($diff>3){
        if($diff>3 && $diff<=7){
          return "This week";
        }elseif($diff>7 && $diff<=14){
          return "1 week ago";
        }elseif($diff>14 && $diff<=21){
          return "2 weeks ago";
        }elseif($diff>21 && $diff<=30){
          return "3 weeks ago";
        }elseif($diff>30 && $diff<=60){
          return "1 month ago";
        }elseif($diff>60 && $diff<=90){
          return "2 months ago";
        }elseif($diff>90 && $diff<=120){
          return "3 months ago";
        }elseif($diff>120 && $diff<=150){
          return "4 months ago";
        }elseif($diff>150 && $diff<=180){
          return "5 months ago";
        }elseif($diff>180 && $diff<=360){
          return "5 months ago";
        }elseif($diff>360 ){
          return "1 year ago";
        }
      } 
    }
  }

  foreach($data1 as $item){
    $sold = "";
    if($item->item_status==1){
      $offer_status="";
      if(!empty($auth_user_data)){
        $offer_data=$auth_user_data[0]->offer_data;
        if($offer_data!=""){
        foreach(unserialize($offer_data) as $offer){
          if($offer['item_id']==$item->id){
          if($offer['status']=="approve"){
            $offer_status="approve";
          }
          }      
        }
        }
      }
      if($item->product == 0){
        $sold = 'opacity: 0.3;';
      }else{
        $sold = "";
      }
      ?>
      <div class="column w272_sm" id="add_colmd4_class" style="width: 100%;">
      
      <center>
      <div class="iamge123" >
        
        <?php 
          if(!empty($auth_user_data)){
          $like_items=unserialize($auth_user_data[0]->like_item);
          
          ?>
        
          <a title="<?php echo count($like_items); ?> Likes" href="javascript:like(<?php echo $item->id; ?>)" class="like_item_<?php echo $item->id; ?> hoverheart" style="    width: 26px;display: block;position: absolute;margin-left: 230px;margin-top: 15px;background: none;color: black;float: right;">
            <?php if(@in_array($item->id , $like_items)){ ?>
            <i class="fa fa-heart" aria-hidden="true" style="font-size: 22px;"></i>
            <?php } else { ?>
            <i class="fa fa-heart-o" aria-hidden="true" style="font-size: 22px;"></i>
            <?php } ?>
          </a>
          <?php 
          }
        ?>
       <?php
       if($this->session->userdata('auth_user')[0]->id == $item->item_user_id){
          $urlQuery = "?productView=true";
       }else{
        $urlQuery = "";
       } 
        if($this->session->userdata('auth_user')){

          ?>
           <a href="<?php echo base_url()."item/".$item->slug.$urlQuery; ?>" style="background: none; margin-left: 0px; padding: 0;margin-top: 5px;"> 
          <?php }else{ ?>
            <a href="javascript:void(0)" style="background: none;" data-toggle="modal" data-target="#login-signup-modal">
          <?php } ?>  
           <?php if(!empty(unserialize($item->item_image)[0])){
            $path = base_url()."uploads/item/".unserialize($item->item_image)[0]; 
          }else{
            $path = base_url()."themes/front/images/no-product.jpg";  
          }
          ?>

        <?php if(!empty(unserialize($item->item_image)[1])){
            $pathhover = base_url()."uploads/item/".unserialize($item->item_image)[1];  
          }else{
            $pathhover = '';
          }
        ?>
        <div <?php if(!empty($pathhover)){ ?> onmouseover="showhoverimg(this)" onmouseout="removerhoverimage(this)" <?php }?>>
          <img style="width: 272px; height: 280px;<?php echo $sold; ?>" class="imagemain w100_img"  src="<?php echo $path; ?>" alt=""/>

          <?php if(!empty($pathhover)){ ?>
          <!--<img style="width: 272px; height: 280px;<?php echo $sold; ?>"  class="imagemainhover w100_img"   src="<?php echo $pathhover; ?>" alt=""/>-->
          

          <?php } ?>
          <?php if(!empty($sold)){ ?>
          <div class="middle">
    <div class="text">Sold</div>
  </div>
<?php } ?>
        </div>
        </a>


        </div>
      </center>
        <center>
          
    
        <div  class="changewidth widthoftext col-md-12 col-xs-12 widcontent">
           <a  href="<?php echo base_url()."item/".$item->slug; ?>" style="background: none; color:black; text-decoration: none; margin-left: 0px; padding: 0;" class="widcontent"> 
            <b class="hoveroflink"><?php if(strlen($item->item_name)>30){ echo substr($item->item_name, 0, 30).'...'; }else{ echo $item->item_name; } ?></b><br/>
              <p class="mb-0 wbreakp"><?php if(strlen($item->description)>1){ echo substr($item->description, 0, 40).'...'; }else{ echo $item->description; } ?></p>
              
              <br/>
            </a>
          </div>
        <div class=" <?php echo $offer_status; ?>">
          <b>
          <?php echo CURRENCY.$item->price; ?>
          <?php if($offer_status=="approve"){ ?>
          <?php echo CURRENCY.$offer['offer_price']; ?>
         <?php } ?>
        </b>
        </div><br/>
      
        
        </center>

      
      
      

      </div>
    <?php 
    }
    ?>


<?php }
  ?>

    </div>
    </div>
</div>
    
    
    
    
    
    
    
    
    
  </div>
</center>

<center>
      <div id="London" class="w3-container w3-border city" style="display:none; ">
        <div id="btnContainer" class="xs_none">
            <button class="btn " onclick="listViewuserlisting()"><i class="fa fa-bars"></i> </button> 
            <button class="btn active" onclick="gridViewuserlisting()"><i class="fa fa-th-large"></i></button>
        </div>
        <?php 
        
        $data = get_order_info_user($userid); ?>
        <div class="row jus_center just_center list_view_content" id="list_grid" style="display:flex;justify-content:center;text-align:center;">
        <!--<div class="row" style="display: flex; justify-content: center;">-->
        <?php 
        $all_purchase = $this->Crud_model->get_data("*","orders","","","","","","","created_at","DESC");
        foreach ($all_purchase as $k => $val) {
            // print_r(unserialize($val->item_record));
            foreach (unserialize($val->item_record) as $key => $value) {?>
                <?php  $productinfo1 = productinfo($key); 
                
                if(@$productinfo1->item_user_id == $userid){
                ?>
                
                <div class="column w272_sm" id="add_colmd4_class" style="width:100%;justify-content: center;display: flex;text-align:center;" >
                    <div style="" >
                        <?php 
                          if(!empty($auth_user_data)){
                            $like_items=unserialize($auth_user_data[0]->like_item);
                            ?>
                            <a title="<?php if(!empty($like_items)){ echo count($like_items); } ?> Likes" href="javascript:like(<?php echo $val->id; ?>)" class="like_item_<?php echo $val->id; ?> hoverheart" style="position: absolute;top: 0;right: 0px;padding: 15px 20px;color:black">
                              <?php if(@in_array($item->id, $like_items)){ ?>
                                <i class="fa fa-heart" aria-hidden="true" style="font-size: 22px"></i>
                              <?php } else { ?>
                                <i class="fa fa-heart-o" aria-hidden="true" style="font-size: 22px"></i>
                              <?php } ?>
                            </a>
                            <?php 
                          }
                        ?>
                    <img  onclick="location.href='<?php echo base_url()."item/".$productinfo1->slug; ?>'"  style="cursor: pointer;" width="272px" height="280px" src="<?php echo base_url()."uploads/item/".unserialize($productinfo1->item_image)[0]?>" >
                     <p onclick="location.href='<?php echo base_url()."item/".$productinfo1->slug; ?>'" style=" cursor: pointer;text-align:center;width: 272px;padding: 15px;word-wrap: break-word !important;">
                      <b class="hoveroflink"><?php echo $key; ?></b>
                      <br/>
                        <?php  echo substr($productinfo1->description, 0, 50).'...';   ?><br/>
                        <b><?php echo CURRENCY.$productinfo1->price; ?></b>
                     </p>
                </div>
              </div>
                <?php } ?>
            <?php } } ?>
        </div>
        
     
        
        
        
        
        
        
        
        
        
        
        
        
        
      </div>
      
      
      <!-- add new code -->
      
    

      
      <!--  end new code -->
      
      
      
</center>


 <!--    <div id="btnContainer">
    <button class="btn active" onclick="listView()"><i class="fa fa-bars"></i> </button> 
    <button class="btn" onclick="gridView()"><i class="fa fa-th-large"></i></button>
    </div>
    <br>
    <div class="row list_view_content" id="list_grid" >
    <?php if(empty($item_results)){ ?>
      <div class='empty_result'>
        <img src='<?php echo base_url(); ?>themes/front/images/packet.png' />
        <h2>Result is empty!</h2>
    </div>
  <?php 
  }
  else{
    foreach($item_results as $item){
          $offer_status="";
          if(!empty($auth_user_data)){
            $offer_data=$auth_user_data[0]->offer_data;
            if($offer_data!=""){
            foreach(unserialize($offer_data) as $offer){
              if($offer['item_id']==$item->id){
              if($offer['status']=="approve"){
                $offer_status="approve";
              }
              }      
            }
            }
          }
          ?>
              
          <div  class="right_div">
                        <center>
                    <div class="iamge123">
                      <?php 
                    if(null !== $this->session->userdata('auth_user')){
                    ?>
                     <div style="cursor: hand" onclick="location.href='<?php echo base_url()."item/".$item->slug; ?>'" >
                    <?php }else{ ?>
                    <div data-toggle="modal" data-target="#login-signup-modal">
                    <?php } ?>
                    <?php if(!empty(unserialize($item->item_image)[0])){
                      $path = base_url()."uploads/item/".unserialize($item->item_image)[0]; 
                    }else{
                      $path = base_url()."themes/front/images/no-product.jpg";  
                    }
                    ?>
                      <img src="<?php echo $path; ?>" alt=""/>
                      </div>
                      <?php 
                        if(!empty($auth_user_data)){
                          $like_items=unserialize($auth_user_data[0]->like_item);
                          ?>
                          <a href="javascript:like(<?php echo $item->id; ?>)" class="like_item_<?php echo $item->id; ?> grid_heart">
                            <?php if(@in_array($item->id, $like_items)){ ?>
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <?php } else { ?>
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <?php } ?>
                          </a>
                          <?php 
                        }
                        ?>

                    </div>
                        </div>
                        </center>


            <div class="product-content" style="width:100%">
                <center>
            <p><b><?php if(strlen($item->item_name)>30){ echo substr($item->item_name, 0, 30).'...'; }else{ echo $item->item_name; } ?></b></p>
            <p><?php if(strlen($item->description)>300){ echo substr($item->description, 0, 300).'...'; }else{ echo $item->description; } ?></p>
              <p><?php echo substr($item->description, 0, 300); ?></p>
              
                      <?php $rating = get_item_rateing($item->id);  
                        @$avgrating = @$rating[0]->rating / @$rating[0]->totalcount;
                        ?>

                        <div class="product-parts">
                         <?php 
                          if(!empty($auth_user_data)){
                            $like_items=unserialize($auth_user_data[0]->like_item);
                            ?>
                            <a href="javascript:like(<?php echo $item->id; ?>)" class="like_item_<?php echo $item->id; ?>">
                              <?php if(@in_array($item->id, $like_items)){ ?>
                                <i class="fa fa-heart" aria-hidden="true"></i>
                              <?php } else { ?>
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                              <?php } ?>
                            </a>
                            <?php 
                          }
                        ?> -->
                        
                          <!--a href="<?php echo base_url()."item/".$item->slug; ?>" title="Product Detail" >
                            <i class="fa fa-info" aria-hidden="true"></i>
                          </a
                       
                        <div class="price <?php echo $offer_status; ?>">
                          <p><?php echo CURRENCY.$item->price; ?></p>
                          <?php if($offer_status=="approve"){ ?>
                            <p><?php echo CURRENCY.$offer['offer_price']; ?></p>
                          <?php } ?>
                        </div>
                        <?php 
                          if(!empty($auth_user_data)){
                            $bookmark_items=unserialize($auth_user_data[0]->bookmark_item);
                            ?>
                            <a href="javascript:bookmark(<?php echo $item->id; ?>)" class="bookmark_item_<?php echo $item->id; ?>">
                              <?php if(@in_array($item->id, $bookmark_items)){ ?>
                                <i class="fa fa-bookmark" aria-hidden="true"></i>
                              <?php } else { ?>
                                <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                              <?php } ?>
                            </a
                            <?php 
                          }
                        ?>
                      </div> 
                       </center>
                         
            </div>
                    
            </div>

          </div>
          <?php 
        
    }
  } 
  ?>
  <p style="display:none;" class="pagination"><center><?php //echo $links; ?></center></p> 
    </div> -->


</div>
<br>


<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>

<?php $this->load->view('includes/front/front_footer'); ?>