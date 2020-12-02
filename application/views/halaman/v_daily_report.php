<?php
$level_akses = $this->session->userdata('role_id');
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
                            <div class="bungkus mb-2" style="overflow: scroll;">
                                <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr align="center">
                                            <th width="60px">No</th>
                                            <th width="100px">Tanggal</th>
                                            <th width="260px">Aktivitas</th>
                                            <th width="260px">Catatan</th>

                                            <?php
                                            if ($level_akses != 2) : ?>
                                                <th width="260px">Evaluasi</th>
                                                <th width="80px">Status</th>
                                                <th width="80px">Urgensi</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php
                                        foreach ($daily as $dy) : ?>
                                            <tr>
                                                <td><?php echo ++$start; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($dy['tgl'])); ?></td>
                                                <td><?php echo $dy['aktivitas']; ?></td>
                                                <td><?php echo $dy['catatan']; ?></td>

                                                <?php
                                                if ($level_akses != 2) : ?>
                                                    <td><?php
                                                        foreach ($evaluasi as $ev) :
                                                            if ($dy['id'] == $ev['id_daily']) {
                                                                echo $ev['evaluasi'];
                                                        ?>
                                                                <br>
                                                                <p style="font-size:12px; font-weight:bold;" class="mb-0 text-info">Oleh: <?php echo $ev['penulis']; ?></p>
                                                        <?php } else {
                                                            }
                                                        endforeach; ?>
                                                    </td>

                                                    <!-- kolom status -->
                                                    <?php if ($dy['status'] == 'Pending') { ?>
                                                        <td align="center" class="pl-1 pr-1"><span class="badge badge-danger"><?php echo $dy['status']; ?></span></td>
                                                    <?php } else if ($dy['status'] == 'Approve') { ?>
                                                        <td align="center" class="pl-1 pr-1"><span class="badge badge-success"><?php echo $dy['status']; ?></span></td>
                                                    <?php } else { ?>
                                                        <td align="center" class="pl-1 pr-1"><span class="badge badge-danger"></span></td>
                                                    <?php } ?>

                                                    <!-- kolom urgensi -->
                                                    <?php if ($dy['urgensi'] == 'Top') { ?>
                                                        <td align="center" class="pl-1 pr-1"><span class="badge badge-danger"><?php echo $dy['urgensi']; ?></span></td>
                                                    <?php } else if ($dy['urgensi'] == 'Middle') { ?>
                                                        <td align="center" class="pl-1 pr-1"><span class="badge badge-warning"><?php echo $dy['urgensi']; ?></span></td>
                                                    <?php } else if ($dy['urgensi'] == 'Low') { ?>
                                                        <td align="center" class="pl-1 pr-1"><span class="badge badge-info"><?php echo $dy['urgensi']; ?></span></td>
                                                    <?php } else if ($dy['urgensi'] == 'Selesai') { ?>
                                                        <td align="center" class="pl-1 pr-1"><span class="badge badge-success"><?php echo $dy['urgensi']; ?></span></td>
                                                    <?php } else { ?>
                                                        <td align="center"><span class="badge badge-info"></span></td>
                                                    <?php } ?>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                            <?php echo $this->pagination->create_links(); ?>
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