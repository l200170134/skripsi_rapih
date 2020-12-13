<?php
$tgl_awal = $this->session->userdata('tgl_awal');
$tgl_akhir = $this->session->userdata('tgl_akhir');
$role_id = $this->session->userdata('role_id');
$id_divisi = $this->session->userdata('divisi_page');
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
                            <div class="col-12 col-lg-6">
                                <?php 
                                if ($role_id == 2){ ?>
                                    <a href="<?php echo base_url('Monitoring'); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                    
                                <?php }elseif($role_id==4){ ?>
                                    <a href="<?php echo base_url('Monitoring/monitoring_direksi/' .$id_divisi); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                    
                                <?php }else{}; ?>
                                    <h5 style="display:inline;">Monitoring Report Daily</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="<?php base_url('Daily/daily_report'); ?>">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 pb-1">
                                            <label> Tanggal awal</label>
                                            <input type="date" class="form-control" name="tgl_awal" value="<?php echo $tgl_awal ?>" required autofocus>
                                        </div>
                                        <div class="col-md-3 pb-1">
                                            <label>Tanggal akhir</label>
                                            <input type="date" class="form-control" name="tgl_akhir" value="<?php echo $tgl_akhir ?>" required>
                                        </div>
                                        <div class="col-md-4" style="margin-top:33px;">
                                            <input type="submit" class="btn btn-md btn-primary" name="submit" value="Cari">
                                            <input type="submit" class="btn btn-md btn-secondary" name="batal" value="Batal">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex">
                                <span class="badge badge-primary p-2 mr-1"><?php echo  'Hasil : ' . $results; ?></span>
                                <a href="<?php echo base_url('Daily/export_csv/' . $nip); ?>" class="btn btn-sm btn-success ml-auto" style="min-width:120px; max-height:30px;"><i class=" fas fa-download" style="color:white;" title="ekspor semua report menjadi Excel"> Unduh Excel</i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="bungkus m-2" style="overflow: scroll;">
                                <table class="table  table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead class="bg-secondary">
                                        <tr align="center">
                                            <th width="50px">No</th>
                                            <th width="100px">Tanggal</th>
                                            <th width="260px">Aktivitas</th>
                                            <th width="260px">Catatan</th>
                                            <th width="260px">Evaluasi</th>
                                            <th width="80px">Status</th>
                                            <th width="80px">Urgensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $a = 1;
                                        foreach ($daily as $dy) : ?>
                                            <tr>
                                                <td><?php echo ++$start; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($dy['tgl'])); ?></td>

                                                <td><?php echo $dy['aktivitas']; ?></td>
                                                <td><?php echo $dy['catatan']; ?></td>
                                                <td>
                                                    <?php
                                                    foreach ($evaluasi as $ev) :
                                                        if ($dy['id'] == $ev['id_daily']) {
                                                            echo $ev['evaluasi'];
                                                    ?>
                                                            <br>
                                                            <p style="font-size:12px; font-weight:bold;" class="mb-0 text-info">Oleh: <?php echo $ev['penulis']; ?></p>
                                                    <?php
                                                        }
                                                    endforeach; ?>
                                                </td>

                                                <td align="center"><span class="badge badge-success"><?php echo $dy['status']; ?></span></td>
                                                <td align="center"><span class="badge badge-success"><?php echo $dy['urgensi']; ?></span></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo $this->pagination->create_links() ?>
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