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
                        <div class="card-body mb-2" style="overflow: scroll;">
                            <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                <thead>
                                    <tr align="center">
                                        <th width="50px">No</th>
                                        <th width="250px">Aktivitas</th>
                                        <th width="70px" align="center">Hasil</th>
                                        <th width="250px">Catatan</th>
                                        <th width="250px">Evaluasi</th>
                                        <th width="70px">Status</th>
                                        <th width="80px">Urgensi</th>
                                        <th width="70px">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $a = 1;
                                    foreach ($daily as $dl) :
                                    ?>
                                        <tr>
                                            <td><?php echo ++$start; ?></td>
                                            <!-- kolom aktifitas -->
                                            <td><?php echo $dl['aktivitas']; ?></td>
                                            <!-- kolom hasil -->
                                            <?php if ($dl['hasil'] == 'Proses') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-primary"><?php echo $dl['hasil']; ?></span></td>
                                            <?php } else if ($dl['hasil'] == 'Selesai') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-success"><?php echo $dl['hasil']; ?></span></td>
                                            <?php } else if ($dl['hasil'] == 'Belum') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-danger"><?php echo $dl['hasil']; ?></span></td>
                                            <?php } else { ?>
                                                <td align="center"><span class="badge badge-danger"></span></td>
                                            <?php } ?>
                                            <!-- kolom catatan -->
                                            <td><?php echo $dl['catatan']; ?></td>

                                            <!-- kolom evaluasi -->
                                            <td class="p-1">
                                                <?php
                                                foreach ($evaluasi as $ev) :
                                                    if ($dl['id'] == $ev['id_daily']) {
                                                        echo $ev['evaluasi'];
                                                ?>
                                                        <br>
                                                        <p style="font-size:12px; font-weight:bold;" class="mb-0 text-info">Oleh: <?php echo $ev['penulis']; ?></p>
                                                <?php } else {
                                                    }
                                                endforeach; ?>
                                            </td>

                                            <!-- kolom status -->
                                            <?php if ($dl['status'] == 'Pending') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-danger"><?php echo $dl['status']; ?></span></td>
                                            <?php } else if ($dl['status'] == 'Approve') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-success"><?php echo $dl['status']; ?></span></td>
                                            <?php } else { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-danger"></span></td>
                                            <?php } ?>
                                            <!-- kolom urgensi -->
                                            <?php if ($dl['urgensi'] == 'Top') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-danger"><?php echo $dl['urgensi']; ?></span></td>
                                            <?php } else if ($dl['urgensi'] == 'Middle') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-warning"><?php echo $dl['urgensi']; ?></span></td>
                                            <?php } else if ($dl['urgensi'] == 'Low') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-info"><?php echo $dl['urgensi']; ?></span></td>
                                            <?php } else if ($dl['urgensi'] == 'Selesai') { ?>
                                                <td align="center" class="pl-1 pr-1"><span class="badge badge-success"><?php echo $dl['urgensi']; ?></span></td>
                                            <?php } else { ?>
                                                <td align="center"><span class="badge badge-info"></span></td>
                                            <?php } ?>
                                            <!-- kolom aksi -->
                                            <td align="center" class="pl-1 pr-1">
                                                <div class="btn-group">
                                                    <?php echo anchor('Monitoring/monitoring_update/' . $dl['id'], '<div class="btn btn-warning btn-sm"><i class="fas fa-edit" style="color:white;"></i></div>'); ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- PAGINATION -->
                        <?php echo $this->pagination->create_links();  ?>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->