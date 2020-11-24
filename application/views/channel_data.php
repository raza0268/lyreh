 <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.0.11.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>

<!-- <div id="app">
	<div v-for="msg in msgs" :class="msg.type">
		<div class="nameofuser">{{ msg.name }}</div>
				{{ msg.text }}
		
	</div>
</div>
 -->
 <div style="display: inline;" class="datarecord<?php echo @$channel_id; ?>"></div>
<script type="text/javascript">
(function () {
    'use strict';
	
	var pubnub = new PubNub({
        publishKey: 'demo',
        subscribeKey: 'demo'
    });
    
    var states = {
        name: '<?php echo $sender_data[0]->first_name; ?>',
        msgs: []
    };
	
	/**
     * Initializes pubnub service
     */
    function initPubNub() {
		// Load chat history
		pubnub.history(
			{
				channel : 'lyreh_<?php echo @$channel_id; ?>',
				count : 20
			},
			function (status, response) {
				var history = response.messages;
				//alert(history);
				//for (var i=0; i<history.length; i++) {
					// var type = history[i].entry.name == states.name ? 'outgoing_msg' : 'incoming_msg';
					// states.msgs.push({
					// 	text:history[i].entry.text,
					// 	name:history[i].entry.name,
					// 	type:type
					// });
				//	console.log(history[history.length-1].entry.text);
				$(".datarecord<?php echo @$channel_id; ?>").html(history[history.length-1].entry.text);	
				//}
				
			}
		);


	}
	/**
     * Initializes all Vue templates
     */
	var vm = new Vue({
		el: '#app',
		data: function() {
			return states;
		},
	});
	initPubNub();
})();  
</script>
<style type="text/css">
	.incoming_msg{
		font-size: 14px;
		padding: 2px;
		background-color: #ebebeb;
		width:60%;
		height: 100%;
		padding: 4px;
		margin:26px 0px 26px;
	}

	.outgoing_msg{
		font-size: 14px;
		padding: 2px;
		background-color: #c4c4c4;
		width:50%;
		height: 100%;
		padding: 4px;
		
	}
	.nameofuser{
		font-size: 12px;
		float: right;
		margin-top: -24px;
	}
</style>