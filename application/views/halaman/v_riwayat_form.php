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
                    <div class="col-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Riwayat Kepegawaian</h3>                                
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                                
                            <div class="card-body">
                                <div class="row">
                                    <!-- form bagian kiri -->
                                    <div class="col-lg-12 col-6">
                                    <form action="<?php echo base_url('Data_pribadi/status_karyawan_tambah/'. $nip); ?>" method="post">

                                        <div>
                                            <?php 
                                                foreach ($nip_karyawan as $nip):
                                             ?>
                                                <input type="text" name="nip" value="<?php echo $nip['nip']; ?>" hidden>
                                            <?php endforeach; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Status Kepegawaian</label>
                                            <select class="form-control" name="status">
                                                <option>--Pilih--</option>
                                                <?php 
                                                    $status = $this->db->get('tb_status')->result_array();
                                                    foreach ($status as $st):
                                                 ?>
                                                    <option value="<?php echo $st['id']; ?>"><?php echo $st['status']; ?></option>
                                                <?php endforeach; ?>
                                            </select> 
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input type="date" name="tgl_mulai" class="form-control" value=" <?php echo date("d-m-Y") ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Selesai</label>
                                            <input type="date" name="tgl_akhir" class="form-control" value=" <?php echo date("d-m-Y") ?>">
                                        </div>
                                         <div class="card-footer d-flex justify-content-center m-2">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>

                                    </div>
                                    <!-- end form bagian kanan -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- New Card -->
                        
                        <!--  End New Card -->
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper