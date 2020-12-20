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
                            <h3 class="card-title">Form Perubahan Rincian Gaji</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="row">
                                <!-- form bagian kiri -->
                                <div class="col-12">
                                    <form action="<?php echo base_url('Gaji/rinciangaji_update_proses/' . $rincian_gaji['id_strukturGaji']); ?>" method="post">
                                        <!-- bagian hidden -->
                                        <input type="text" name="nip" value="<?php echo $rincian_gaji['nip']; ?>" hidden>
                                        <!-- end bagian hidden -->
                                        <div class="form-group">
                                            <label>Gaji Pokok</label>
                                            <input type="text" class="form-control" name="gaji_pokok" value="<?php echo $rincian_gaji['gaji_pokok'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tunjangan Kehadiran</label>
                                            <input type="text" name="tun_kehadiran" class="form-control" value="<?php echo $rincian_gaji['tun_kehadiran'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Makan</label>
                                            <input type="text" name="uang_makan" class="form-control" value="<?php echo $rincian_gaji['uang_makan'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Transport</label>
                                            <input type="text" name="uang_transport" class="form-control" value="<?php echo $rincian_gaji['uang_transport'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Lembur</label>
                                            <input type="text" name="lembur" class="form-control" value="<?php echo $rincian_gaji['lembur'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Lain-Lain</label>
                                            <input type="text" name="lain_lain" class="form-control" value="<?php echo $rincian_gaji['lain_lain'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Berlaku Mulai</label>
                                            <select class="form-control" name="bulan_mulai">
                                                <option>--Pilih--</option>
                                                <?php
                                                $bulan = $this->db->get('tb_bulan')->result_array();
                                                foreach ($bulan as $bln):
                                                    if ($bln['id_bulan'] == $rincian_gaji['bulan_mulai']) { ?>
                                                        <option value="<?php echo $bln['id_bulan'];  ?>" selected><?php echo $bln['bulan']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $bln['id_bulan'];  ?>"><?php echo $bln['bulan']; ?></option>
                                                    <?php }
                                                    ?>
                                                <?php
                                                endforeach;
                                                ?>
                                            </select>
                                            <div class="form-control" value="<?php echo $rincian_gaji['tahun_awal']; ?>" hidden><?php echo $rincian_gaji['tahun_awal']; ?></div>
                                        </div>
                                        
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('Data_pribadi/data_pribadi/' . $nip); ?>" class="btn btn-secondary">Kembali</a>
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
<!-- /.content-wrapper