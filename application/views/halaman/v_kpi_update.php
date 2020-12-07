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
                                    <form action="<?php echo base_url('Evaluasi/kpi_update_proses'); ?>" method="post">
                                    <input type="text" name="id_pertanyaan" value=" <?php echo $kpi_update['id_pertanyaan']; ?>" hidden>
                                        <div class="form-group">
                                        </div>
                                        <div class="form-group">
                                           <label>Pertanyaan</label>
                                        <input type="text" class="form-control" name="pertanyaan" value="<?php echo $kpi_update['pertanyaan'] ?>"> 
                                        </div>
                                        <div class="form-group">
                                            <label>Divisi</label>
                                            <select class="form-control" name="id_divisi">
                                                <?php 
                                                    $get_id = $kpi_update['id_divisi'];
                                                    $divisi = $this->db->get_where('tb_divisi', ['id_divisi' => $get_id])->row_array();
                                                 ?>
                                                 <option value="<?php echo $divisi['id_divisi']; ?>"><?php echo $divisi['divisi']; ?></option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input type="text" name="id_kpi" value=" <?php echo $kpi_update['id_kpi'] ?>" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-secondary" href="<?php echo base_url('Evaluasi/kpi/' . $kpi_update['id_divisi']); ?>">Kembali</a></li>
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