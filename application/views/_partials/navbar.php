<?php
$role_id = $this->session->userdata('role_id');
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <?php if ($role_id == 3) { ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto mr-3">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $this->session->userdata('jumlah') ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <?php
          // Mengambil tanggal akhir dikurangi 10 hari
          $tanggal = $this->db->query('SELECT nip,DATE_ADD(tgl_akhir, INTERVAL -10 DAY) AS TglAkhir,tgl_akhir, aktivasi FROM tb_status_data')->result_array();
          $a = 0;
          foreach ($tanggal as $tg) {
            $tgl_akhir = $tg['TglAkhir'];
            $nip = $tg['nip'];

            if ($tgl_akhir <= date('Y-m-d') && $tg['aktivasi'] == 0) {
              $notifikasi = $this->db->query("SELECT * FROM user WHERE nip = $nip")->result_array();

              foreach ($notifikasi as $n) {
                $div = $this->db->get_where('tb_divisi', ['id_divisi' => $n['id_divisi']])->row_array();
                $a++; ?>
                <a href="<?php echo base_url('Data_pribadi/data_pribadi/' . $n['nip']) ?>" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="<?php echo base_url('assets/dist/img/default.png') ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        <?php echo $n['nama']; ?>
                      </h3>
                      <p class="text-md">Kontrak Sampai <span class="badge badge-danger"><?php echo date('d-m-Y', strtotime($tg['tgl_akhir'])) ?></span></p>
                      <p class="text-sm text-primary">Divisi <?php echo $div['divisi']; ?></p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
          <?php
              }
            }
          }
          $this->session->set_userdata('jumlah', $a);
          ?>
        </div>
      </li>
    </ul>
    <!-- /.navbar -->
  <?php } ?>
</nav>