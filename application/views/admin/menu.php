<?php $this->load->view('includes/admin/header'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              Menu Management
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">
                Menu Management
              </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
          <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">
                  Menu Management
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <div class="cf nestable-lists">
                  <div class="dd" id="nestable">
                      <ol class="dd-list">
                        <?php 
                        foreach($pages as $page){
                          if($page->children==0){
                          ?>  
                          <li class="dd-item" data-id="<?php echo $page->id; ?>">
                              <div class="dd-handle"><?php echo $page->title; ?></div>
                              <?php
                              foreach($pages as $page1){
                                if($page->id==$page1->children){
                                ?>
                                <ol class="dd-list">
                                  <?php
                                  foreach($pages as $page2){
                                    if($page->id==$page2->children){
                                    ?>
                                    <li class="dd-item" data-id="<?php echo $page2->id; ?>">
                                      <div class="dd-handle"><?php echo $page2->title; ?></div>
                                    </li>
                                    <?php 
                                    }
                                  }
                                  ?>
                                </ol>  
                                <?php
                                break;
                                }
                              }
                          ?>
                          </li>
                          <?php 
                          }
                        }
                        ?>
                          <!--
                          <li class="dd-item" data-id="2">
                              <div class="dd-handle">Item 2</div>
                              <ol class="dd-list">
                                  <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                                  <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                                  <li class="dd-item" data-id="5">
                                      <div class="dd-handle">Item 5</div>
                                      <ol class="dd-list">
                                          <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                          <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                          <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                                      </ol>
                                  </li>
                                  <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                                  <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
                              </ol>
                          </li>
                          <li class="dd-item" data-id="11">
                              <div class="dd-handle">Item 11</div>
                          </li>
                          <li class="dd-item" data-id="12">
                              <div class="dd-handle">Item 12</div>
                          </li>
                          -->
                      </ol>
                  </div>
                </div>
                <textarea id="nestable-output"></textarea>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php $this->load->view('includes/admin/footer'); ?> 