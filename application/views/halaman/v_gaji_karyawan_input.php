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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('hrd/Hrd/index') ?>">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('hrd/Hrd/data_karyawan') ?>">Divisi</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('hrd/Hrd/detail_karyawan') ?>">Karyawan</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('hrd/Hrd/gaji_karyawan') ?>">Gaji</a></li>
                        <li class="breadcrumb-item">Tambah</li>
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
                <div class="col-lg-6 col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">From Input Gaji Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="row">
                                    <!-- form bagian kiri -->
                                    <div class="col-12 pl-3 pr-3">
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <select class="form-control">
                                                <option value="">Januari</option>
                                                <option value="">Februari</option>
                                                <option value="">Maret</option>
                                                <option value="">April</option>
                                                <option value="">Mei</option>
                                                <option value="">Juni</option>
                                                <option value="">Juli</option>
                                                <option value="">Agustus</option>
                                                <option value="">September</option>
                                                <option value="">Oktober</option>
                                                <option value="">November</option>
                                                <option value="">Desember</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pokok">Gaji Pokok</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" value="" placeholder="Masukkan gaji pokok">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pokok">Bonus Gaji</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" value="" placeholder="Masukkan Bonus Gaji">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pokok">Denda Telat</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" value="" placeholder="Masukkan Denda Telat">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="pokok">Denda Lain-lain</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="text" class="form-control" value="" placeholder="Masukkan Denda Lain">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Pembayaran</label>
                                            <select class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="">Terbayar</option>
                                                <option value="">Belum Terbayar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End form bagian kiri -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer d-flex justify-content-center mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="submit" class="btn btn-secondary ml-2">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->