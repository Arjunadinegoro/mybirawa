<style>
 /* Style the buttons */
 .active{
  color: red;
}
</style>
 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img class="rounded-circle" src="<?= base_url();?>asset/images/logo.jpg" alt="" height='45' width='45'>
        </div>
        <div class="sidebar-brand-text mx-3">MyBirawa</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <?php
        $uri = $this->uri->segment(2);
      ?>
      
      <!-- <li class="nav-item <?php if($uri==''){?>active<?php }?>">
        <a class="nav-link" href="<?php echo base_url();?>admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a> -->
			<li class="nav-item <?php if($uri=='user'){?>active<?php }?>">
        <a class="nav-link" href="<?php echo base_url();?>admin/user">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>User</span></a>
      </li>
      <li class="nav-item <?php if($uri=='city'){?>active<?php }?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Master:</h6>
            <a class="collapse-item" href="<?php echo base_url();?>admin/city">City</a>
            <a class="collapse-item" href="<?php echo base_url();?>admin/gedung">Gedung</a>
            <a class="collapse-item" href="<?php echo base_url();?>admin/fmbm">FM/BM</a>
          </div>
        </div>
      </li>
			<!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">
			
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>        

            <!-- Nav Item - Messages -->
        
        
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
<!-- 
        <script>
        $('li').click(function(){
  $('li.active').each(function(){
    $(this).removeClass('active');
  });
  $(this).addClass('active');
});
        </script> -->