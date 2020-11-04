<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('leader/Leader') ?>" class="brand-link">
    <img src="<?php echo base_url('assets/dist/img/logo_pt_icon.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">PT. Sinar Grafindo</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url('assets/dist/img/') . $user['image'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <span class="brand-text font-weight-light" style="color: white;">Nama Leader</span>
        <!-- <a href="#" class="d-block">Nama Karyawan</a> -->
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?php echo base_url('leader/Leader/data') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Data Pribadi
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('leader/Leader/daily') ?>" class="nav-link">
            <i class="nav-icon fas fa-archive"></i>
            <p>
              Daily Activity
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('leader/Leader/jurnal') ?>" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Jurnal
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('leader/Leader/evaluasi') ?>" class="nav-link">
            <i class="nav-icon fas fa-star"></i>
            <p>
              Evaluasi
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('leader/Leader/monitoring') ?>" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
              Monitoring
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('leader/Leader/kinerja') ?>" class="nav-link">
            <i class="nav-icon fas fa-user-check"></i>
            <p>
              Kinerja
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('leader/Leader/gaji') ?>" class="nav-link">
            <i class="nav-icon fas fa-credit-card"></i>
            <p>
              Gaji
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('home/Login/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Log Out
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>