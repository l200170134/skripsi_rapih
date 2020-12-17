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
                                    <form action="<?php echo base_url('Gaji/rinciangaji_tambah_proses'); ?>" method="post">
                                        <!-- bagian hidden -->
                                        <input type="text" name="nip" value="<?php echo $nip; ?>" class="form-control" hidden>
                                        <!-- end bagian hidden -->
                                        <div class="form-group">
                                            <label>Gaji Pokok</label>
                                            <input type="text" class="form-control" name="gaji_pokok">
                                        </div>
                                        <div class="form-group">
                                            <label>Tunjangan Bulanan</label>
                                            <input type="text" name="tun_bulanan" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Makan</label>
                                            <input type="text" name="uang_makan" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Transport</label>
                                            <input type="text" name="uang_transport" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Lembur</label>
                                            <input type="text" name="lembur" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Lain-Lain</label>
                                            <input type="text" name="lain_lain" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Periode Awal</label>
                                            <select class="form-control" name="tanggal_mulai">
                                                <option>--Pilih--</option>
                                                <?php 
                                                    $bulan = $this->db->get('tb_bulan')->result_array();
                                                    foreach($bulan as $bln):
                                                 ?>
                                                 <option value="<?php echo $bln['id_bulan'];  ?>"><?php echo $bln['bulan']; ?></option>
                                                 <?php 
                                                    endforeach;
                                                  ?>
                                            </select>
                                        </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?php echo base_url('Data_pribadi/data_pribadi/' .$nip); ?>" class="btn btn-secondary">Kembali</a>
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