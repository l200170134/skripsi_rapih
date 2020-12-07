<?php
$link = $this->session->userdata('link');
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
                        <div class="card-body">
                            <div class="bungkus p-0 mb-2" style="overflow: scroll;">
                                <table class="table table-hover table-md col-6" style="table-layout: fixed; word-wrap: break-word;">
                                <thead class="bg-secondary">
                                    <tr align="center">
                                        <th width="50px">No</th>
                                        <th width="250px">Nama</th>
                                        <th colspan="2" width="150px">Monitoring</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $a = 1;
                                    foreach ($list_user as $ls) :
                                    ?>
                                        <tr>
                                            <td class="p-2"><?php echo ++$start; ?></td>
                                            <td class="p-2"><?php echo $ls['nama']; ?></td>

                                            <td align="center" class="p-2">
                                                <?php echo anchor('Monitoring/monitoring_daily/' . $ls['nip'], '<div class="btn btn-success btn-sm">Today</div>'); ?>
                                            </td>
                                            <td align="center">
                                                <a href="<?php echo base_url('Monitoring/monitoring_report/' . $ls['nip']) ?>" class="btn btn-primary btn-sm">Report</a>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>

                        </div>

                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->