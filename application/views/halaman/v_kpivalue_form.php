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
                            <h3 class="card-title">Form Riwayat Kepegawaian</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="row">
                                <!-- form bagian kiri -->
                                <div class="col-12">
                                    <form action="<?php echo base_url('Evaluasi/kpivalue_tambah_proses/' . $user['id_divisi']); ?>" method="post">
                                        <!-- Hidden -->
                                        <input type="text" name="nip" value="<?php echo $user['nip']; ?>" class="form-control" hidden>
                                        <input type="text" name="id_divisi" value=" <?php echo $user['id_divisi']; ?>" class="form-control" hidden>
                                        <input type="text" name="tahun" value="<?php echo date("Y") ?>" class="form-control" hidden>
                                        <!-- End Hiden -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="" value="<?php echo $user['nama']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Periode</label>
                                            <select name="bulan" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <?php
                                            $bulan = $this->db->get('tb_bulan')->result_array();
                                            foreach ($bulan as $bln) :
                                            ?>
                                                <option><?php echo $bln['bulan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Key Performance Index Divisi</label>
                                            <?php
                                            $id_divisi = $user['id_divisi'];
                                            $kpi_data = $this->db->get_where('tb_kpi', ['id_divisi' => $id_divisi])->result_array();
                                            foreach ($kpi_data as $kpi) :
                                            ?>
                                                <div class="col-12">
                                                    <div class="row mb-2">
                                                        <div class="col-6">
                                                            <label><?php echo $kpi['pertanyaan']; ?></label>
                                                        </div>
                                                        <div class="col-6">
                                                            <select class="form-control" name=" <?php echo $kpi['id_pertanyaan']; ?>">
                                                                <option>--Pilih--</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-secondary" href="<?php echo base_url('Evaluasi/kpivalue/' . $user['nip']); ?>">Kembali</a></li>
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