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
                        <li class="breadcrumb-item active">Daily</li>
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
                            <h3 class="card-title">Monitoring Daily</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow: scroll;">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr align="center">
                                    <tr align="center">
                                        <th width="5%">No</th>
                                        <th width="25%">Aktivitas</th>
                                        <th width="5%" align="center">Hasil</th>
                                        <th width="25%">Catatan</th>
                                        <th width="25%">Evaluasi</th>
                                        <th width="5%">Status</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>1</td>
                                    <td>Membuat invoice permintaan produk kertas A4</td>
                                    <td align="center"><span class="badge badge-success">Selesai</span></td>
                                    <td>Invoice belum diketahui nominalnya</td>
                                    <td>Minta data permintaan</td>
                                    <td align="center"><span class="badge badge-danger">Pending</span></td>
                                    <td align="center">
                                        <div class="btn-group">
                                            <a href="<?php echo base_url('Monitoring/monitoring_update') ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit" style="color:white;"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <tbody>
                                </tbody>
                            </table>
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