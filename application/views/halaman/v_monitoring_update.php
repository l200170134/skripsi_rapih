<?php
$nip = $daily['nip'];
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
            <li class="breadcrumb-item"><a href="<?php echo base_url('Monitoring/monitoring') ?>">Monitoring</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('Monitoring/monitoring_daily') ?>">Daily</a></li>
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
              <h3 class="card-title">Update Daily Monitoring</h3>
            </div>

            <?php
            if ($evaluasi['status'] == 0) { ?>
              <!-- /.card-header -->
              <form role="form" action="<?php echo base_url('Monitoring/monitoring_tambah/' . $id); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <textarea class="form-control" name="evaluasi" rows="3" placeholder="Tuliskan evaluasi" required></textarea>
                  </div>
                  <div class="form-group">
                    <select name="status" class="form-control" required>
                      <option>Status...</option>
                      <option value="Pending">Pending</option>
                      <option value="Approve">Approve</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="urgensi" class="form-control" required>
                      <option selected>Urgensi...</option>
                      <option value="Top">Top</option>
                      <option value="Middle">Middle</option>
                      <option value="Low">Low</option>
                      <option value="Selesai">Selesai</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  <?php echo anchor('Monitoring/monitoring_daily/' . $nip, '<div class="btn btn-secondary">Cancel</div>'); ?>
                </div>
              </form>

            <?php  } else if ($evaluasi['status'] == 1) { ?>
              <!-- /.card-header -->
              <form role="form" action="<?php echo base_url('Monitoring/monitoring_proses_update/' . $id); ?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <textarea class="form-control" name="evaluasi" rows="3" placeholder="Tuliskan evaluasi" required><?php echo $evaluasi['evaluasi']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <select name="status" class="form-control" required>
                      <option value="Pending" <?php echo ($daily['status'] == 'Pending' ? 'selected' : ''); ?>>Pending</option>
                      <option value="Approve" <?php echo ($daily['status'] == 'Approve' ? 'selected' : ''); ?>>Approve</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="urgensi" class="form-control" required>
                      <option value="Top" <?php echo ($daily['urgensi'] == 'Top' ? 'selected' : ''); ?>>Top</option>
                      <option value="Middle" <?php echo ($daily['urgensi'] == 'Middle' ? 'selected' : ''); ?>>Middle</option>
                      <option value="Low" <?php echo ($daily['urgensi'] == 'Low' ? 'selected' : ''); ?>>Low</option>
                      <option value="Selesai" <?php echo ($daily['urgensi'] == 'Selesai' ? 'selected' : ''); ?>>Selesai</option>
                    </select>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  <?php echo anchor('Monitoring/monitoring_daily/' . $nip, '<div class="btn btn-secondary">Cancel</div>'); ?>
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