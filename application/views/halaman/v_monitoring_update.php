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
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                <a href="<?php echo base_url('Monitoring/monitoring_daily') ?>" class="btn btn-secondary">Cancel</a>
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