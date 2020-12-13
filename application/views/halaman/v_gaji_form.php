<?php
$id_divisi = $this->session->userdata('divisi_page');
?>
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
                            <h3 class="card-title">Form Masukan Gaji</h3>
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
                                            foreach ($nip_karyawan as $nip) :
                                            ?>
                                                <input type="text" name="nip" value="<?php echo $nip['nip']; ?>" hidden>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="tgl_pembayaran" class="form-control" value="<?php echo date("Y-m-d") ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <?php foreach($nip_karyawan as $nip_k): ?>
                                            <input type="text" class="form-control" value="<?php echo $nip_k['nama']; ?>" readonly>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="form-group">
                                            <label>Periode</label>
                                            <select class="form-control" name="bulan">
                                                <option>--Pilih--</option>
                                                <?php
                                                    $bulan_gaji = $this->db->get('tb_bulan')->result_array();
                                                    foreach ($bulan_gaji as $bulan) :
                                                ?>
                                                <option value="<?php echo $bulan['id_bulan']; ?>"><?php echo $bulan['bulan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <input type="text" class="form-control" name="tahun" value=" <?php echo date('Y'); ?>" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nominal</label>
                                            <input type="text" name="gaji" class="form-control">
                                        </div>
                                        <!-- end form bagian kanan -->
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $id_divisi) ?>" class="btn btn-secondary">Kembali</a>
                            </div>

                            </form>
                        
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