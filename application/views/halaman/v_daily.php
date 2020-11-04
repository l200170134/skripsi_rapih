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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item">Daily Activity</li>
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
                            <h5>Daily Activity</h5>
                            <div class="alert alert-sm alert-success alert-dismissible m-1">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Kegiatan karyawan setiap hari serta keterangannya.Klik <span class="text-indigo">Report</span> untuk mendapatkan informasi rekap activity karyawan.
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table>
                                <tr>
                                    <td class="pr-2"><a href="<?php echo base_url('Daily/daily_form') ?>" class="btn btn-block btn-sm btn-success" style="width: 100px;">New Task</a></td>
                                    <td><a href="<?php echo base_url('Daily/daily_report') ?>" class="btn btn-block btn-sm btn-primary" style="width: 100px;">Report</a></td>
                                </tr>
                            </table>
                            <br>
                            <div class="bungkus" style="overflow: scroll;">
                                <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr align="center">
                                            <th width="50px">No</th>
                                            <th width="250px">Aktivitas</th>
                                            <th width="70px" align="center">Hasil</th>
                                            <th width="250px">Catatan</th>
                                            <th width="250px">Evaluasi</th>
                                            <th width="80px">Status</th>
                                            <th width="80px">Urgensi</th>
                                            <th width="80px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>1</td>
                                        <td>Membuat invoice permintaan produk kertas A4</td>
                                        <td align="center"><span class="badge badge-primary">Proses</span></td>
                                        <td>Invoice belum diketahui nominalnya</td>
                                        <td>
                                            Minta data permintaan
                                            <br>
                                            <p class="text-sm text-muted">Hafidz AA.</p>
                                            Tugas yang anda lakukan sudah sesuai
                                            <br>
                                            <p class="text-sm text-muted">Norhadi.</p>
                                        </td>
                                        <td align="center"><span class="badge badge-danger">Pending</span></td>
                                        <td align="center"><span class="badge badge-danger">Top</span></td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <a href="<?php echo base_url('Daily/daily_update') ?>" class="btn btn-warning btn-sm" title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                                                <a href="#" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Membuat laporan penjualan bulan Oktober</td>
                                        <td align="center"><span class="badge badge-success">Selesai</span></td>
                                        <td>Laporan belum dimintakan tanda tangan</td>
                                        <td>Segera konfirmasi ke Kepala Gudang</td>
                                        <td align="center"><span class="badge badge-primary">Approve</span></td>
                                        <td align="center"><span class="badge badge-primary">Finish</span></td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <a href="<?php echo base_url('Daily/daily_update') ?>" class="btn btn-warning btn-sm" title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                                                <a href="#" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Membuat laporan penjualan bulan Oktober</td>
                                        <td align="center"><span class="badge badge-danger">Belum</span></td>
                                        <td>Laporan belum dimintakan tanda tangan</td>
                                        <td>Segera konfirmasi ke Kepala Gudang</td>
                                        <td align="center"><span class="badge badge-danger">Pending</span></td>
                                        <td align="center"><span class="badge badge-danger">Top</span></td>
                                        <td align="center">
                                            <div class="btn-group">
                                                <a href="<?php echo base_url('Daily/daily_update') ?>" class="btn btn-warning btn-sm" title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                                                <a href="#" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
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