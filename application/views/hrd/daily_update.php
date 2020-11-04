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
              <li class="breadcrumb-item"><a href="<?php echo base_url('hrd/Hrd/index') ?>">Home</a></li>
              <!-- <li class="breadcrumb-item active">Dashboard</li> -->
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
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="6/10/2020" readonly>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Tulikan rencana aktivitas" required readonly=""></textarea>
                  </div>
                  <div class="form-group">
                    <select name="hasil" class="form-control" required>
                      <option value="Selesai">Selesai</option>
                      <option value="Belum">Belum</option>
                     </select>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Tulikan catatan aktivitas" required></textarea>
                  </div>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Submit</a>
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                     <a href="<?php echo base_url('hrd/Hrd/daily') ?>" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
             </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->