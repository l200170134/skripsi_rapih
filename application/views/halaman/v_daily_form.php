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
            <li class="breadcrumb-item"><a href="<?php echo base_url('Daily') ?>">Daily Activity</a></li>
            <li class="breadcrumb-item active">Form</li>
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
              <h3 class="card-title">Form Daily Activity</h3>
            </div>
            <!-- /.card-header -->
            <form role="form" action="<?php echo base_url('Daily/daily_proses_tambah') ?>" method="POST">
              <div class="card-body">
                <!-- Bagian Hidden -->
                <?php
                $nip = $this->session->userdata('nip');
                ?>
                <input name="nip" type="text" value="<?php echo $nip; ?>" class="form-control" hidden>
                <input name="hasil" type="text" value="Proses" class="form-control" hidden>
                <input name="status" type="text" value="Pending" class="form-control" hidden>
                <input name="catatan" type="text" value="-" class="form-control" hidden>
                <input name="evaluasi" type="text" value="-" class="form-control" hidden>
                <input name="urgensi" type="text" value="Not Graded" class="form-control" hidden>

                <div class="form-group">
                  <input name="tgl" type="text" class="form-control" value=" <?php echo date("d-m-Y") ?> " hidden>
                </div>
                <div class="form-group">
                  <textarea name="aktivitas" class="form-control" rows="3" placeholder="Tuliskan rencana aktivitas" required></textarea>
                </div>
              </div>
              <div class="card-footer">
                <!-- <a href="leader_daily.php" class="btn btn-primary">Submit</a> -->
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?php echo base_url('Daily') ?>" class="btn btn-secondary">Cancel</a>
              </div>
            </form>
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