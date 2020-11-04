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
              <li class="breadcrumb-item"><a href="<?php echo base_url('leader/Leader') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url('leader/Leader/daily') ?>">Daily Activity</a></li>
              <li class="breadcrumb-item active">Update</li>
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
              <?php foreach($daily as $dy) {?>
              <form role="form" action="<?php echo base_url('leader/Leader/daily_proses_update'); ?>" method="POST">
                <div class="card-body">
                <input type="hidden" name="id" value="<?php echo $dy->id ?>">
                <div class="form-group">
                  <p class="text-sm">Masukkan Catatan</p>
                  <input name="catatan" value="<?php echo $dy->catatan ?>" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <select name="hasil" class="form-control">
                      <option value="Proses">Pilih Progres Pengerjaan</option>
                      <option value="Selesai"<?php echo ($dy->hasil == 'Selesai' ? ' selected' : ''); ?>>Selesai</option>
                      <option value="Belum"<?php echo ($dy->hasil == 'Belum' ? ' selected' : ''); ?>>Belum</option>
                     </select>
                  </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                     <a href="<?php echo base_url('leader/Leader/daily') ?>" class="btn btn-secondary">Cancel</a>
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