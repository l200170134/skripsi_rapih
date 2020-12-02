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
                                    <form action="<?php echo base_url('Gaji/gaji_tambah_proses') ?>" method="post">
                                        <div>
                                            <?php 
                                                foreach ($nip_karyawan as $nip):
                                             ?>
                                                <input type="text" name="nip" value="<?php echo $nip['nip']; ?>" hidden>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="tgl_pembayaran" class="form-control" value="<?php echo date("Y-m-d") ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nominal</label>
                                            <input type="text" name="gaji" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <select class="form-control" name="bulan">
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
                                            
                                            <input type="text" class="form-control" name="tahun" value=" <?php echo date('Y'); ?>" hidden>
                                        </div>
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