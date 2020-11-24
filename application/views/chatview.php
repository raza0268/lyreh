<?php 
      $channels = get_channels();
      if(!empty($channels)){
        $auth_user_data = $_SESSION['auth_user'];
      foreach($channels as $channels){
        $chatdata = get_chatrecord($channels->id, $channels->receiver_id);
       ?>
      	<a  style="text-transform: uppercase; text-decoration: none;" <?php if($auth_user_data[0]->chat_status == 1){?> href="javascript:openMessenger(<?php echo $channels->receiver_id; ?>)" <?php }?> >
              <div class="hoverofchattab" style=" padding: 10px; border-bottom: 1px solid #dbc8c8" >
                
                	 <img src="<?php echo base_url()."uploads/user.jpg"; ?>" alt=""  style="display: block;  height: auto;max-width: 16%; display: inline; border-radius: 100%;" />&nbsp;&nbsp;
                 <?php 
                            // $userdata1 = userinfo($channels->sender_id); 
                            // echo $userdata1->first_name.' '.$userdata1->last_name;
                            $userdata = userinfo($channels->receiver_id); 
                            echo '<div style="display:inline; margin-top:-20px">';
                              echo @$userdata->first_name.' '.@$userdata->last_name;
                              echo '<div style="margin-top: -41px;">&nbsp;</div>';
                                echo '<small style="margin-left: 60px; color:#CCCCCC">';
                                  echo @$chatdata; 
                                echo '</small>';
                            echo '</div>';
                         
                            echo '<small style="float:right; color:#CCCCCC; margin-top
                            :-17px">';
                               @$exdata = explode(' ', @$channels->last_message_at);
                              @$exdate = explode(':', @$exdata[1]);
                              //echo $exdate[0].":".$exdate[1];
                              @$time_in_12_hour_format  = date("g:i a", strtotime(@$exdate[0].":".@$exdate[1]));
                              echo  @$time_in_12_hour_format;
                            echo '</small>';
                            echo '<br/>';

                            ?>
              </div>
              </a>
              
          <?php
        }
    }
    ?>