<?php
$auth_user_data=$this->session->userdata("auth_user");
$auth_user_id=$auth_user_data[0]->id;
$auth_user=$this->action->select("users", array("id"=>$auth_user_id));
$auth_user_name=$auth_user[0]->first_name." ".$auth_user[0]->last_name;
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>admin/dashboard" class="brand-link">
      <img src="<?php echo base_url(); ?>themes/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Lyreh</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>uploads/<?php echo $auth_user[0]->user_image; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="javascript:void(0);" class="d-block">
            <?php echo $auth_user_name; ?>
          </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Dashboard
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/dashboard" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Basket spend</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admincontroller/visitor" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Visitors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admincontroller/transcation" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaction Details</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Managements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/user" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/user/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Content Managements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/page" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Pages</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/page/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/menu_management" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>Menu Management</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Item Managements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/item" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/coupon" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coupons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/order" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Item Attributes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/attribute/category" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/attribute/subcategory" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subcategories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/attribute/product" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/attribute/brand" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/attribute/material" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Materials</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/attribute/color" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Colors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/attribute/condition" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Conditions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/attribute/list_item" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List items</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-question"></i>
              <p>
                Faq Managements
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/faq" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Faqs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/faq/add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/mail_setting" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mail Settings</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/contact" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Contact Records</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/concierge" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>Concierge</p>
            </a>
          </li>
		  <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/chat_record" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>Chat Records</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/stripeSettings" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Stripe Settings</p>
            </a>
          </li>
          
           <li class="nav-item">
            <a href="<?php echo base_url(); ?>admin/commissionsettings" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>Commission Settings</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>