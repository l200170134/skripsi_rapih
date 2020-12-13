<?php
$link = $this->session->userdata('link');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Sistem Kepegawaian</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Daily Activity</h3>
            </div>
            <!-- /.card-header -->
            <?php foreach ($daily as $dy) { ?>
              <form role="form" action="<?php echo base_url('Daily/daily_proses_update'); ?>" method="POST">
                <div class="card-body">
                  <input type="hidden" name="id" value="<?php echo $dy->id ?>">
                  <div class="form-group">
                    <!--                     <p class="text-sm">Catatan</p> -->
                    <textarea name="catatan" class="form-control" rows="3" required maxlength="1000" placeholder="Tulisan catatan tugas anda"><?php echo $dy->catatan ?></textarea>
                  </div>
                  <div class="form-group">
                    <select name="hasil" class="form-control">
                      <option value="Proses">Pilih Progres Pengerjaan</option>
                      <option value="Selesai" <?php echo ($dy->hasil == 'Selesai' ? ' selected' : ''); ?>>Selesai</option>
                      <option value="Belum" <?php echo ($dy->hasil == 'Belum' ? ' selected' : ''); ?>>Belum</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="<?php echo base_url('Daily/index/' . $link) ?>" class="btn btn-secondary">Kembali</a>
                </div>
              </form>
            <?php } ?>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->