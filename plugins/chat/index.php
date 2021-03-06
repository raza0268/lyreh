<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <title>Chat App</title>
  
  <!-- Scripts -->
  <script src="cordova.js"></script>
  <script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.0.11.min.js"></script>
  <script src="js/lib/framework7.min.js"></script>
  <script src="js/lib/vue.min.js"></script>
  <script src="js/lib/framework7-vue.min.js"></script>
  <script src="js/app.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.css">
  
  <!-- End scripts -->
  
  <!-- Styles -->
  <script>
      if (Framework7.prototype.device.android) {
          document.write(
            '<link rel="stylesheet" href="css/framework7.material.min.css">' +
            '<link rel="stylesheet" href="css/framework7.material.colors.min.css">'
          );
      }
      else {
        document.write(
          '<link rel="stylesheet" href="css/framework7.ios.min.css">' +
          '<link rel="stylesheet" href="css/framework7.ios.colors.min.css">'
        );
      }
  </script>
  <link rel="stylesheet" href="css/app.css">
  <!-- End styles -->

</head>

<body>
  <div id="app">
    <!-- Main Views -->
    <f7-views>
      <f7-view id="main-view" navbar-through :dynamic-navbar="true" main>
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
      <f7-messagebar placeholder="Message" class="msg" send-link="Send" v-on:submit="onSend"></f7-messagebar>
    </f7-page>
  </template>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    $('[placeholder="Message"]').emojioneArea();
  });
</script>
</html>