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
                        <li class="breadcrumb-item active">Monitoring</li>
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
                            <h3 class="card-title">Monitoring</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow: scroll;">
                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr align="center">
                                        <th width="5%">No</th>
                                        <th width="55%">Nama</th>
                                        <th width="20%">Daily Activity</th>
                                        <th width="20%">Report</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-2">1</td>
                                        <td class="p-2">Hafidz Al Afaf</td>
                                        <td align="center" class="p-2"><a href="<?php echo base_url('leader/Leader/monitoring_daily') ?>" class="btn btn-success btn-sm">Today</a></td>
                                        <td align="center" class="p-2"><a href="<?php echo base_url('leader/Leader/monitoring_report') ?>" class="btn btn-primary btn-sm">Report</a></td>
                                    </tr>
                                    <tr>
                                        <td class="p-2">2</td>
                                        <td class="p-2">Bintang Citra Kusumaatmaja</td>
                                        <td align="center" class="p-2"><a href="<?php echo base_url('leader/Leader/monitoring_daily') ?>" class="btn btn-success btn-sm">Today</a></td>
                                        <td align="center" class="p-2"><a href="<?php echo base_url('leader/Leader/monitoring_report') ?>" class="btn btn-primary btn-sm">Report</a></td>
                                    </tr>

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