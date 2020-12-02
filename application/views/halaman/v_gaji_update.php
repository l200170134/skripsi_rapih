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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Data_karyawan') ?>">Divisi</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Data_karyawan/detail_karyawan') ?>">Karyawan</a></li>
                        <li class="breadcrumb-item">Form</li>
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
                    <div class="col-12 col-lg-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Riwayat Kepegawaian</h3>                                
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- form bagian kiri -->
                                    <div class="col-12">
                                    <form action="<?php echo base_url('Gaji/gaji_update_proses/') ?>" method="post">
                                        <div>
                                                <input type="text" name="id_gaji" value="<?php echo $update['id_gaji']; ?>" hidden>
                                                <input type="text" name="nip" value="<?php echo $update['nip']; ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="tgl_pembayaran" class="form-control" value="<?php echo date("Y-m-d") ?>" hidden>
                                        </div>

                                        <div class="form-group">
                                            <label for="nama">Nominal</label>
                                            <input type="text" name="gaji" class="form-control" value="<?php echo $update['gaji'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <select class="form-control" name="bulan">
                                                <option value="Januari" <?php echo ($update['bulan'] == 'Januari' ? ' selected' : ''); ?>>Januari</option>
                                                <option value="Februari" <?php echo ($update['bulan'] == 'Februari' ? ' selected' : ''); ?>>Februari</option>
                                                <option value="Maret" <?php echo ($update['bulan'] == 'Maret' ? ' selected' : ''); ?>>Maret</option>
                                                <option value="April" <?php echo ($update['bulan'] == 'April' ? ' selected' : ''); ?>>April</option>
                                                <option value="Mei" <?php echo ($update['bulan'] == 'Mei' ? ' selected' : ''); ?>>Mei</option>
                                                <option value="Juni" <?php echo ($update['bulan'] == 'Juni' ? ' selected' : ''); ?>>Juni</option>
                                                <option value="Juli" <?php echo ($update['bulan'] == 'Juli' ? ' selected' : ''); ?>>Juli</option>
                                                <option value="Agustus" <?php echo ($update['bulan'] == 'Agustus' ? ' selected' : ''); ?>>Agustus</option>
                                                <option value="September" <?php echo ($update['bulan'] == 'September' ? ' selected' : ''); ?>>September</option>
                                                <option value="Oktober" <?php echo ($update['bulan'] == 'Oktober' ? ' selected' : ''); ?>>Oktober</option>
                                                <option value="November" <?php echo ($update['bulan'] == 'November' ? ' selected' : ''); ?>>November</option>
                                                <option value="Desember" <?php echo ($update['bulan'] == 'Desember' ? ' selected' : ''); ?>>Desember</option>
                                            </select>
                                        </div>
                                        <input type="text" name="tahun" value=" <?php echo $update['tahun']; ?>" hidden>
                                    <!-- end form bagian kanan -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                            </form>
                        </div>
                        <!-- /.card -->
                        <!--  End New Card -->
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
</script>