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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('hrd/Hrd') ?>">Home</a></li>
                        <!--               <li class="breadcrumb-item"><a href="leader_monitoring.php">Monitoring</a></li>
              <li class="breadcrumb-item"><a href="leader_monitoring_daily.php">Daily</a></li> -->
                        <li class="breadcrumb-item active">Kinerja</li>
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

                            <h3 class="card-title">Evaluasi Kinerja Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p>Divisi <span class="badge badge-success">MARKETING</span></p>
                            <form role="form">
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <select name="hasil" class="form-control" required>
                                            <option value="">Pilih Bulan</option>
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <select name="hasil" class="form-control" required>
                                            <option value="">Pilih Tahun</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <a href="" class="btn btn-primary">Submit</a>
                                        <a href="<?php echo base_url('hrd/Hrd/kinerja_form') ?>" class="btn btn-success">Evaluasi</a>
                                    </div>
                                </div>
                            </form>
                            <div class="bungkus" style="overflow: scroll;">
                                <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr align="center">
                                            <th width="50px">No</th>
                                            <th width="350px">Nama</th>
                                            <th width="200px">Periode</th>
                                            <th width="100px">Point</th>
                                            <th width="200px">Keterangan</th>
                                            <th width="100px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <tr>
                                            <td>1</td>
                                            <td>Norhadi</td>
                                            <td>Januari 2020</td>
                                            <td>5</td>
                                            <td>Sangat Bagus</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('hrd/Hrd/kinerja_update') ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit" style="color:white;"></i></a>
                                                </div>
                                                <a href="" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->