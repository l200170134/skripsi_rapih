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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h5>Monitoring Report Activity</h5>
              <div class="alert alert-sm alert-success alert-dismissible m-1">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Report Kegiatan activity karyawan yang sudah dilaksanakan.
              </div>
            </div>
            <!-- /.card-header -->
            <form role="form">
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4 pb-1">
                      <label> Tanggal awal</label>
                      <input type="date" class="form-control" required>
                    </div>
                    <div class="col-md-4 pb-1">
                      <label>Tanggal akhir</label>
                      <input type="date" class="form-control" required>
                    </div>
                    <div class="col-md-4" style="margin-top:33px;">
                      <button class="btn btn-md btn-primary">Cari</button>
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
                      <th width="40px">No</th>
                      <th width="90px">Tanggal</th>
                      <th width="260px">Aktivitas</th>
                      <th width="260px">Catatan</th>
                      <th width="260px">Evaluasi</th>
                      <th width="80px">Status</th>
                      <th width="80px">Urgensi</th>
                    </tr>
                  </thead>
                  <tr>
                    <td>1</td>
                    <td>6/10/2020</td>
                    <td>Membuat invoice permintaan produk kertas A4</td>
                    <td>Invoice belum diketahui nominalnya</td>
                    <td>Minta data permintaan</td>
                    <td align="center"><span class="badge badge-danger">Pending</span></td>
                    <td align="center"><span class="badge badge-danger">Top</span></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>7/10/2020</td>
                    <td>Membuat laporan penjualan bulan Oktober</td>
                    <td>Laporan belum dimintakan tanda tangan</td>
                    <td>Segera konfirmasi ke Kepala Gudang</td>
                    <td align="center"><span class="badge badge-primary">Approve</span></td>
                    <td align="center"><span class="badge badge-primary">Finish</span></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>8/10/2020</td>
                    <td>Membuat laporan penjualan bulan Oktober</td>
                    <td>Laporan belum dimintakan tanda tangan</td>
                    <td>Segera konfirmasi ke Kepala Gudang</td>
                    <td align="center"><span class="badge badge-danger">Pending</span></td>
                    <td align="center"><span class="badge badge-warning">Middle</span></td>
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
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->