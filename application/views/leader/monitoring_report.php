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
              <li class="breadcrumb-item"><a href="<?php echo base_url('leader/Leader/monitoring') ?>">Monitoring</a></li>
              <li class="breadcrumb-item active">Report</li>
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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Monitoring Report</h3>
              </div>
              <!-- /.card-header -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4 pb-1">
                      <input type="date" class="form-control" required>
                      </div>
                      <div class="col-md-4 pb-1">
                      <input type="date" class="form-control" required>
                      </div>
                      <div class="col-md-4">
                      <input type="submit" class="btn btn-primary">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="bungkus" style="overflow: scroll;">
                  <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
                    <thead>                  
                      <tr align="center">
                        <th width="50px">No</th>
                        <th width="100px">Tanggal</th>
                        <th width="250px">Aktivitas</th>
                        <th width="250px">Catatan</th>
                        <th width="250px">Evaluasi</th>
                      </tr>
                    </thead>
                      <tr>
                        <td>1</td>
                        <td>6/10/2020</td>
                        <td>Membuat invoice permintaan produk kertas A4</td>
                        <td>Invoice belum diketahui nominalnya</td>
                        <td>Minta data permintaan</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>7/10/2020</td>
                        <td>Membuat laporan penjualan bulan Oktober</td>
                        <td>Laporan belum dimintakan tanda tangan</td>
                        <td>Segera konfirmasi ke Kepala Gudang</td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>8/10/2020</td>
                        <td>Membuat laporan penjualan bulan Oktober</td>
                        <td>Laporan belum dimintakan tanda tangan</td>
                        <td>Segera konfirmasi ke Kepala Gudang</td>
                      </tr>
                    <tbody>
                    </tbody>
                  </table>
                </div>
                <br>
                <a href="#" class="btn btn-primary btn"><i class="fas fa-download" style="color:white;"> Download</i></a>
              </div>
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