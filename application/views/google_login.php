<meta name="google-signin-client_id" content="502794862397-cqern3g5uu6aivs3h6td1ohi05rp3hq3.apps.googleusercontent.com">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
function onSignIn(googleUser) {
	// Useful data for your client-side scripts:
    var profile = googleUser.getBasicProfile();
    var first_name = profile.getGivenName();
    var last_name = profile.getFamilyName();
    var email = profile.getEmail();
    $.ajax({
	  	method: "POST",
	  	url: "<?php echo base_url(); ?>ajax_call",
	  	data: {
	  		first_name: first_name,
	  		last_name: last_name,
	  		email: email,
	  		action: "google_signin"
	  	}
	})
	.done(function( msg ) {
		window.location.href="<?php echo base_url(); ?>account";
	});
}


$(document).ready(function(){
    checkContainer();
});
function checkContainer(){
    if($('.abcRioButtonContentWrapper').length>0){ //if the container is visible on the page
        $('.abcRioButtonContentWrapper').click();  //Adds a grid to 
    } else {
        setTimeout(checkContainer, 50); //wait 50 ms, then try again
    }
}
</script>
<div style="display:none;">
	<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" ></div>
</div>