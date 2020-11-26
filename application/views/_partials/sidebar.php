  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link mb-0">
      <img src="<?php echo base_url('assets/dist/img/logo_pt_icon.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PT. Sinar Grafindo</span>
    </p>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assets/dist/img/') . $user['image'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span class="brand-text font-weight-light" style="color: white;"><?php echo $this->session->userdata('username'); ?></span>
          <!-- <a href="#" class="d-block">Nama Karyawan</a> -->
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <!-- QUERY MENU -->

          <?php

          $role_id = $this->session->userdata('role_id');
          // Ambil data dari user_access_sidebar
          $this->db->select('*');
          $this->db->from('user_access_sidebar');
          $this->db->where('role_id', $role_id);
          $this->db->order_by('urutan', 'asc');
          $query = $this->db->get();
          $sidebar = $query->result_array();

          foreach ($sidebar as $sb) :
            $id_sidebar = $sb['sidebar_id'];
            // mengambil data user_sidebar yang memiliki id_sidebar = ID sidebar di tabel user access sidebar dan is active = 0,
            $menu = $this->db->get_where('user_sidebar', ['id_sidebar' => $id_sidebar, 'is_active' => 1])->result_array();

            foreach ($menu as $m) :
          ?>
              <li class="nav-item">
                <?php if ($judul == $m['judul']) : ?>
                  <a href="<?php echo base_url($m['url']); ?>" class="nav-link active">
                  <?php else : ?>
                    <a href="<?php echo base_url($m['url']); ?>" class="nav-link">
                    <?php endif; ?>

                    <i class="<?php echo $m['icon']; ?>"></i>
                    <p><?php echo $m['judul']; ?></p>
                    </a>
              </li>

          <?php
            endforeach;
          endforeach;
          ?>
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