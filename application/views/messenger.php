<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title>Chat App</title>
  
  <!-- Scripts -->
  <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.0.11.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/chat/js/lib/framework7.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/chat/js/lib/vue.min.js"></script>
  <script src="<?php echo base_url(); ?>plugins/chat/js/lib/framework7-vue.min.js"></script>
  <!--<script src="<?php echo base_url(); ?>plugins/chat/js/app.js"></script>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css"/>
  
  <!-- End scripts -->
  
  <!-- Styles -->

  <script>
      if (Framework7.prototype.device.android) {
          document.write(
            '<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/chat/css/framework7.material.min.css">' +
            '<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/chat/css/framework7.material.colors.min.css">'
          );
      }
      else {
        document.write(
          '<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/chat/css/framework7.ios.min.css">' +
          '<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/chat/css/framework7.ios.colors.min.css">'
        );
      }
  </script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/chat/css/app.css" />
  <!-- End styles -->
  <style type="text/css">
    .link{
      color:white;
      background-color: black;
      padding-left: 20px;
      padding-right: 20px;
      border-radius: 5px;
    }
    .link:hover{
      background-color: #d99f6f !important;
    }
    .navbar-inner{
      text-transform: uppercase;
      background-color: #d99f6f !important;
      color: white !important;
    }
    .hoverofchattab:hover{
      background-color: gray;
    }
    .toolbar, .messagebar, .msg{
      background-color: #F0F0F0;
      margin-bottom: 3px;
    }
    .pages{
      background: none;
    }
    .message-last{
      margin-bottom: 16px !important;
    }
  

   /* width */
            .messages-content::-webkit-scrollbar{
              width: 5px;
            }
            

            /* Track */
            .messages-content::-webkit-scrollbar-track{
              background: #f1f1f1; 
            }
             
            /* Handle */
            .messages-content::-webkit-scrollbar-thumb{
              background: #ABABAB; 
            }

            /* Handle on hover */
            .messages-content::-webkit-scrollbar-thumb:hover{
              background: #ABABAB; 
            }

          
  
  </style>

  <?php //include 'includes/front/front_footer.php';?>
</head>

<body>
  <div id="reloaddiv112"></div>

  <div id="app">
    <!-- Main Views -->
    <f7-views>
      <f7-view id="main-view" navbar-through :dynamic-navbar="true" main>
        <!-- Navbar -->
        <f7-navbar>
          <f7-nav-center sliding>			
            <?php echo $user_data[0]->first_name." ".$user_data[0]->last_name; ?> (<?php echo ucfirst($user_data[0]->online_status); ?>)		  
          </f7-nav-center>
        </f7-navbar>
        <!-- Pages -->
        <f7-pages>
          <f7-page>
          </f7-page>
        </f7-pages>
      </f7-view>
    </f7-views>
  </div>
  
  <!-- Chat Page Template -->
  <template id="page-chat">
    <f7-page>
      <f7-messages>
        <f7-message v-for="msg in msgs" :name="msg.name" :text="msg.text" :type="msg.type"></f7-message>
      </f7-messages>
      <f7-messagebar placeholder="Message" class="msg" style="width:100%;" send-link="Send" v-on:submit="onSend"></f7-messagebar>

    </f7-page>
  </template>

</body>
<script type="text/javascript">
(function () {
    'use strict';
    var pubnub = new PubNub({
        publishKey: 'demo',
        subscribeKey: 'demo'
    });
    
    var states = {
        name: '<?php echo @$auth_user_data[0]->first_name; ?>',
        msgs: []
    };

    /**
     * Initializes pubnub service
     */
    function initPubNub() {

        // Call event listener when new msg comes in
        pubnub.addListener({
            message: function(data) {
                console.log(data);
                var type = data.message.name == states.name ? 'sent' : 'received';
                var name = type == 'send' ? states.name : data.message.name;
                states.msgs.push({name:name, text:data.message.text, type:type});
            }
        });
        
        // Subscribe to these channels
        pubnub.subscribe({
          channels: ['<?php echo join("','", $channel_data); ?>']
        });

        // Load chat history
        pubnub.history(
            {
                channel : 'lyreh_<?php echo @$channel_id; ?>',
                count : 20
            },
            function (status, response) {
                var history = response.messages;
                for (var i=0; i<history.length; i++) {
                    var type = history[i].entry.name == states.name ? 'sent' : 'received';
                    states.msgs.push({
                        name:history[i].entry.name,
                        text:history[i].entry.text,
                        type:type
                    });
                }
            }
        );
    }
    
    /**
     * Initializes all Vue templates
     */
    function initVue () {

        // Tell Vue that we want to use Framework7-Vue plugin
        Vue.use(Framework7Vue);
        
        // Init chat template
        Vue.component('page-chat', {
            template: '#page-chat',
            data: function() {
                return states;
            },
            methods: {
                onSend: function(text, clear) {
                  
                    $.ajax({
                        method: "POST",
                        url: "<?php echo base_url(); ?>ajax_call",
                        dataType: 'json',
                        data: {
                          channel_id: '<?php echo @$channel_id; ?>',
                          action: "load_chat_view"
                        },
                        success: function (obj) {
                          $("#reloaddiv", parent.document).html(obj.chatview);
                        }
                    });
                    

                    var restr_items="<?php echo $restricted_items[0]->meta_value; ?>";
                    var obj=restr_items.split("|");
                    if (text.trim().length === 0) return;
                    var inc=0;
                    $.each( obj, function( key, value ) {
                      if (text.indexOf(value)!="-1") inc++;
                    });
                    if(inc>0){
                      return;
                    }
                    pubnub.publish({
                        channel: 'lyreh_<?php echo @$channel_id; ?>',
                        message: {
                            text:text,
                            name:this.name,
                            sender_id:"<?php echo @$auth_user_data[0]->id; ?>",
                            receiver_id:"<?php echo $this->uri->segment(3); ?>",
                            channel_id:"<?php echo $this->uri->segment(2); ?>"
                        }
                    });
                    if (typeof clear == 'function') clear();
                }
            }
        });

        // Init Vue
        new Vue({
            el: '#app',
            data: function() {
                return states;
            },
            mounted() {
              this.enterChat();
            },
            methods: {
                /**
                 * Gets called when user name was entered and user enters chat
                 */
                enterChat: function () {
                    this.msgs.length = 0;
                    this.$f7.mainView.router.load({url: '/chat/'});
                    //initPubNub();
                }
            },
            framework7: {
                root: '#app',
                // material: true, // Remember to change css paths to ios/material theme!
                material: Framework7.prototype.device.android ? true : false,
                // Mapping of routes -> templates
                routes: [{
                    path: '/chat/',
                    component: 'page-chat'
                }]
            }
        });
    }

    // Wait until device is ready and then init the app
    document.addEventListener('DOMContentLoaded', function () {
        if (Framework7.prototype.device.android) {
            Dom7('.view.navbar-through').removeClass('navbar-through').addClass('navbar-fixed');
            Dom7('.view .navbar').prependTo('.view .page');
        }
        initVue();
        initPubNub();
    }, false);

})();  
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('[placeholder="Message"]').emojioneArea({
            events: {
                ready: function() {
                    this.setFocus();
                }
            }
        });
    });
</script>
</html>