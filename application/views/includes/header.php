<html lang="en">
	<head>
		<title>Lyreh</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?php echo base_url(); ?>themes/front/css/bootstrap.min.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>themes/front/css/style.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>themes/front/css/font-awesome.min.css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>themes/front/css/toastr.css" rel="stylesheet"/>
		<!-- custom CSS -->
		<link href="<?php echo base_url(); ?>themes/front/css/custom.css" rel="stylesheet"/>

		<script src="<?php echo base_url(); ?>themes/front/js/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>themes/front/js/bootstrap.min.js"></script>
	  	

	  	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-164709350-2"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-164709350-2');
        </script>
        
		<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/starrr/dist/starrr.css">
		<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.0.11.min.js"></script>
		<script src="https://js.braintreegateway.com/web/dropin/1.20.4/js/dropin.min.js"></script>
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/front/css/front_custom.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>themes/front/css/auth.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css"/>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css"/>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css"/>
		
		<script type="text/javascript">
// 		(function () {
// 			'use strict';

// 			var pubnub = new PubNub({
// 				publishKey: 'demo',
// 				subscribeKey: 'demo'
// 			});

// 			/**
// 			 * Initializes pubnub service
// 			 */
// 			function initPubNub() {

// 				// Call event listener when new msg comes in
// 				pubnub.addListener({
// 					message: function(data) {
// 						if(data.message.sender_id != '<?php echo @$auth_user_data[0]->id; ?>'){
// 							openMessenger(data.message.sender_id);
// 						}
// 						$.ajax({
// 							method: "POST",
// 							url: "<?php echo base_url(); ?>ajax_call",
// 							data: {
// 								sender_id: data.message.sender_id,
// 								receiver_id: data.message.receiver_id,
// 								channel_id: data.message.channel_id,
// 								text: data.message.text,
// 								action: "add_notification"
// 							}
// 						});
						
// 					}
// 				});
				
// 				// Subscribe to these channels
// 				pubnub.subscribe({
// 				  channels: ['<?php echo @join("','", $channel_data); ?>']
// 				});
// 			}
		  
// 			// Wait until device is ready and then init the app
// 			document.addEventListener('DOMContentLoaded', function () {
// 				initPubNub();
// 			}, false);

// 		})();
        //scroll
		</script>
	</head>
	<body>