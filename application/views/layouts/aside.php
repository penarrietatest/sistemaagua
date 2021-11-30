
<!-- ======================================================================================================= -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?php echo base_url();?>/vendors/images/logo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SISTEMA AGUA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>uploads/<?php echo $this->session->userdata("image") ?>" class="img-circle elevation-2" style="width: 35px; height: 35px;">
        </div>
        <div class="info">
          <a href="" class="d-block">
            <?php
              echo $this->session->userdata("names") . ' ' . $this->session->userdata("firstname")
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>" class="nav-link <?php echo ($this->uri->segment(1)=='home') ? 'active' : ''?>">
              <i class="nav-icon fas fa-home"></i>
              <p> Inicio </p>
            </a>  
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>affiliates" class="nav-link <?php echo ($this->uri->segment(1)=='affiliates') ? 'active' : ''?>">
              <i class="nav-icon fab fa-affiliatetheme"></i>
              <p> Afiliados </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>meters" class="nav-link <?php echo ($this->uri->segment(1)=='meters') ? 'active' : ''?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Medidores</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?php echo base_url(); ?>readings" class="nav-link <?php echo ($this->uri->segment(1)=='readings') ? 'active' : ''?>">
            <i class="nav-icon fas fa-glasses"></i>
              <p> Lecturas</p>
            </a>
          </li>

          <li class="nav-item has-treeview <?php echo ($this->uri->segment(1)=='details' || $this->uri->segment(1)=='invoice') ? 'menu-open' : ''?>">
            <a href="" class="nav-link <?php echo ($this->uri->segment(1)=='details' || $this->uri->segment(1)=='invoice') ? 'active' : ''?>">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>
                Facturas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="<?php echo base_url();?>details/invoice" class="nav-link <?php echo ($this->uri->segment(2)=='invoice') ? 'active' : ''?>">
                  <i class="nav-icon far fa-circle"></i>
                  <p>Detalle</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url();?>details/pay" class="nav-link <?php echo ($this->uri->segment(2)=='pay') ? 'active' : ''?>">
                <i class="nav-icon far fa-circle"></i>
                  <p>Pagar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">CONFIGURACION</li>

          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>users" class="nav-link <?php echo ($this->uri->segment(1)=='users') ? 'active' : ''?>">
            <i class="nav-icon fas fa-users"></i>
              <p> Usuarios</p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>price" class="nav-link <?php echo ($this->uri->segment(1)=='price') ? 'active' : ''?>">
              <i class="nav-icon fas fa-money-check-alt"></i>
              <p> Precio M3 </p>
            </a> 
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo base_url();?>backup" class="nav-link <?php echo ($this->uri->segment(1)=='backup') ? 'active' : ''?>">
            <i class="nav-icon fas fa-download"></i>
              <p> Backup Database </p>
            </a> 
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<!-- ======================================================================================================= -->