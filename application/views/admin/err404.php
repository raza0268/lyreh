 <?php $this->load->view('includes/admin/header'); ?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="error1">
            <h1>404</h1>
            <p>page not found</p>
            <h5>plaese try one of the following page</h5>
            <a href="<?php echo base_url().'admin/dashboard'; ?>"><button type="button">Dashboard Page</button></a>
        </div>
    </div>
</div>
<?php $this->load->view('includes/admin/footer'); ?>      
  