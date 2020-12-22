<?php
$nip = $daily['nip'];
$user =  $user['username'];
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
              <h3 class="card-title">Update Daily Monitoring</h3>
            </div>

            <?php
            if ($daily['urgensi'] == '' || $evaluasi['penulis'] != $user) { ?>
              <!-- /.card-header -->
              <form role="form" action="<?php echo base_url('Monitoring/monitoring_tambah/' . $id); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <textarea class="form-control" name="evaluasi" rows="3" placeholder="Tuliskan evaluasi anda" required></textarea>
                  </div>
                  <?php
                  if ($role_id == 2) { ?>
                    <div class="form-group">
                      <select name="status" class="form-control">
                        <!-- <option>Pilih Status</option> -->
                        <option value="Pending" <?php echo ($daily['status'] == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="Approve" <?php echo ($daily['status'] == 'Approve' ? 'selected' : ''); ?>>Approve</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="urgensi" class="form-control">
                        <option selected>Urgensi</option>
                        <option value="Top" <?php echo ($daily['urgensi'] == 'Top' ? 'selected' : ''); ?>>Top</option>
                        <option value="Middle" <?php echo ($daily['urgensi'] == 'Middle' ? 'selected' : ''); ?>>Middle</option>
                        <option value="Low" <?php echo ($daily['urgensi'] == 'Low' ? 'selected' : ''); ?>>Low</option>
                        <option value="Selesai" <?php echo ($daily['urgensi'] == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                      </select>
                    </div>
                  <?php } else if ($role_id == 4) { ?>
                    <div class="form-group">
                      <select name="status" class="form-control" hidden>
                        <!-- <option>Status</option> -->
                        <option value="Pending" <?php echo ($daily['status'] == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="Approve" <?php echo ($daily['status'] == 'Approve' ? 'selected' : ''); ?>>Approve</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="urgensi" class="form-control" hidden>
                        <option selected>Urgensi</option>
                        <option value="Top" <?php echo ($daily['urgensi'] == 'Top' ? 'selected' : ''); ?>>Top</option>
                        <option value="Middle" <?php echo ($daily['urgensi'] == 'Middle' ? 'selected' : ''); ?>>Middle</option>
                        <option value="Low" <?php echo ($daily['urgensi'] == 'Low' ? 'selected' : ''); ?>>Low</option>
                        <option value="Selesai" <?php echo ($daily['urgensi'] == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                      </select>
                    </div>
                  <?php }
                  ?>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  <?php echo anchor('Monitoring/monitoring_daily/' . $nip . '/' . $link, '<div class="btn btn-secondary">Kembali</div>'); ?>
                </div>
              </form>

            <?php  } else if ($evaluasi['status'] == 1) { ?>
              <!-- /.card-header -->
              <form role="form" action="<?php echo base_url('Monitoring/monitoring_proses_update/' . $id); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <textarea class="form-control" name="evaluasi" rows="3" placeholder="Tuliskan evaluasi anda" required maxlength="1000"><?php echo $evaluasi['evaluasi']; ?></textarea>
                  </div>
                  <?php
                  if ($role_id == 2) { ?>
                    <div class="form-group">
                      <select name="status" class="form-control" required>
                        <!-- <option>Status...</option> -->
                        <option value="Pending" <?php echo ($daily['status'] == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="Approve" <?php echo ($daily['status'] == 'Approve' ? 'selected' : ''); ?>>Approve</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="urgensi" class="form-control" required>
                        <option selected>Urgensi</option>
                        <option value="Top" <?php echo ($daily['urgensi'] == 'Top' ? 'selected' : ''); ?>>Top</option>
                        <option value="Middle" <?php echo ($daily['urgensi'] == 'Middle' ? 'selected' : ''); ?>>Middle</option>
                        <option value="Low" <?php echo ($daily['urgensi'] == 'Low' ? 'selected' : ''); ?>>Low</option>
                        <option value="Selesai" <?php echo ($daily['urgensi'] == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                      </select>
                    </div>
                  <?php } else if ($role_id == 4) { ?>
                    <div class="form-group">
                      <select name="status" class="form-control" required hidden>
                        <option>Status</option>
                        <option value="Pending" <?php echo ($daily['status'] == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="Approve" <?php echo ($daily['status'] == 'Approve' ? 'selected' : ''); ?>>Approve</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="urgensi" class="form-control" required hidden>
                        <option selected>Urgensi...</option>
                        <option value="Top" <?php echo ($daily['urgensi'] == 'Top' ? 'selected' : ''); ?>>Top</option>
                        <option value="Middle" <?php echo ($daily['urgensi'] == 'Middle' ? 'selected' : ''); ?>>Middle</option>
                        <option value="Low" <?php echo ($daily['urgensi'] == 'Low' ? 'selected' : ''); ?>>Low</option>
                        <option value="Selesai" <?php echo ($daily['urgensi'] == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                      </select>
                    </div>
                  <?php }
                  ?>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  <?php echo anchor('Monitoring/monitoring_daily/' . $nip . '/' . $link, '<div class="btn btn-secondary">Kembali</div>'); ?>
                </div>
              </form>
            <?php
            }
            ?>

          </div>
        </div>
        <!-- ./col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->