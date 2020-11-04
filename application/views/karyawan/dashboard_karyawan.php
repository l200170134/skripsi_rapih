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
            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Informasi Umum</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p>Selamat datang <span class="text-primary"><?php echo $user['username']; ?></span> di sistem kepegawaian PT. Sinar Grafindo</p>
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-12">
          <!-- BAR CHART -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Approve Graphic</h3>
            </div>
            <div class="card-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- ./col -->

        <div class="col-lg-6 col-12">
          <!-- BAR CHART -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Performance Rate</h3>
            </div>
            <div class="card-body">
              <div class="chart">
                <div id="bar-chart2" style="height: 300px;"></div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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