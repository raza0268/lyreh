  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://kaswebtech.com/" target="_blank">Kaswebtech Solutions</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>themes/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>themes/admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/jquery.vmap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqvmap/1.5.1/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.9.1/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>themes/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>themes/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>themes/admin/dist/js/demo.js"></script>

<link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.js"></script>

<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>











<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

<script>
$(document).ready( function () {
  CKEDITOR.replace( 'tips_of_sell' );
  CKEDITOR.replace( 'registration_message' );
  CKEDITOR.replace( 'forgot_password_message' );
  CKEDITOR.replace( 'contact_message' );
  CKEDITOR.replace( 'content' );
  $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ordering": false
    } );

  $('#example2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ordering": false
    } );
  $( "#validate_form" ).validate();
  $("ul.nav-sidebar>li.nav-item").each(function(){
    $(this).find(".nav-link").each(function(){
      var nav_link=$(this).attr("href");
      if(nav_link==window.location.href){
        $(this).parent().parent().show().prev().addClass("active").parent().addClass("menu-open");
        $(this).addClass("active");
      }
    });
  });
}); 
</script>
<script>
$(document).ready(function(){

    var updateOutput = function(e){
        var list   = e.length ? e : $(e.target),
        output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            $.ajax({
              method: "POST",
              url: "ajax_call",
              data: { 
                rec: window.JSON.stringify(list.nestable('serialize')), 
                action: "menu_management" 
              }
            })
            .done(function( msg ) {
              //alert( "Data Saved: " + msg );
            });
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };
    // activate Nestable for list 1
    $('#nestable').nestable({
        group: 1
    }).on('change', updateOutput);
    // output initial serialised data
    updateOutput($('#nestable').data('output', $('#nestable-output')));
});

function getChat(channel_id, sender_id){
	$.ajax({
		method: "POST",
		url: "ajax_call",
		data: {
			channel_id: channel_id,	
			sender_id: sender_id,
			action: "get_channel_data"
		}
	})
	.done(function( msg ) {
		$(".msg_history").html( msg );
	});
}

function chatremove(channel_id){
  $.ajax({
    method: "POST",
    url: "ajax_call",
    data: {
      channel_id: channel_id, 
      action: "remove_channel_data"
    }
  })
  .done(function( msg ) {
    location.reload();
  });

}


function removechat(id){
           $.confirm({
            title: 'Delete',
            content: 'Are you sure to want to delete ?',
            icon: 'fa fa-trash',
            theme: 'supervan',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            buttons: {
            Delete: function () {
              chatremove(id);
          },
          Cancel: function () {}
        }
      });

}

function blockchat(id){
           $.confirm({
            title: 'Block',
            content: 'Are you sure to want to block this user ?',
            icon: 'fa fa-ban',
            theme: 'supervan',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            buttons: {
            Block: function () {
                $.ajax({
                  method: "POST",
                  url: "ajax_call",
                  data: {
                    user_id: id, 
                    action: "block_channel"
                  }
                })
                .done(function( msg ) {
                  location.reload();
                });
          },
          Cancel: function () {}
        }
      });
}


function unblockchat(id){
           $.confirm({
            title: 'Unblock',
            content: 'Are you sure to want to unblock this user ?',
            icon: 'fa fa-trash',
            theme: 'supervan',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            buttons: {
            Unblock: function () {
                $.ajax({
                  method: "POST",
                  url: "ajax_call",
                  data: {
                    user_id: id, 
                    action: "unblock_channel"
                  }
                })
                .done(function( msg ) {
                  location.reload();
                });
          },
          Cancel: function () {}
        }
      });
}


function morearchive(id){
           $.confirm({
            title: 'Archive',
            content: 'Are you sure to want to add archive this user ?',
            icon: 'fa fa-archive',
            theme: 'supervan',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            buttons: {
            Archive: function () {
                $.ajax({
                  method: "POST",
                  url: "ajax_call",
                  data: {
                    channel_id: id, 
                    action: "archive"
                  }
                })
                .done(function( msg ) {
                  location.reload();
                });
          },
          Cancel: function () {}
        }
      });
}


function removearchive(id){
           $.confirm({
            title: 'Remove Archive',
            content: 'Are you sure to want to remove archive this user ?',
            icon: 'fa fa-archive',
            theme: 'supervan',
            closeIcon: true,
            animation: 'scale',
            type: 'orange',
            buttons: {
            Archive: function () {
                $.ajax({
                  method: "POST",
                  url: "ajax_call",
                  data: {
                    channel_id: id, 
                    action: "removearchive"
                  }
                })
                .done(function( msg ) {
                  location.reload();
                });
          },
          Cancel: function () {}
        }
      });
}



function openNotification_alert_admin(id) {

      $.ajax({
        method: "POST",
        url: "<?php echo base_url(); ?>Admincontroller/notification_read_alert_admin",
        data: {
          id: id
        }
      });
}
</script>
</body>
</html> 