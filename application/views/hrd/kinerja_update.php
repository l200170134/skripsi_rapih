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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('leader/Leader') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('leader/Leader/kinerja') ?>">Kinerja</a></li>
                        <li class="breadcrumb-item active">Update</li>
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
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Update Evaluasi Kinerja Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <p class="text-sm">Nama Karyawan</p>
                                            <input type="text" readonly class="form-control" placeholder="Norhadi">
                                        </div>
                                        <div class="form-group">
                                            <p class="text-sm">Bulan</p>
                                            <input type="text" readonly class="form-control" placeholder="Januari">
                                        </div>
                                        <div class="form-group">
                                            <p class="text-sm">Tahun</p>
                                            <input type="text" readonly class="form-control" placeholder="2020">
                                        </div>
                                        <div class="form-group">
                                            <p class="text-sm">Point Akhir</p>
                                            <input type="text" readonly class="form-control" placeholder="5">
                                        </div>
                                        <div class="form-group">
                                            <p class="text-sm">Keterangan</p>
                                            <input type="text" readonly class="form-control" placeholder="Sangat Bagus">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <p class="text-sm">MA(01): Kenaikan total sales </p>
                                            <select name="hasil" class="form-control" required>
                                                <option>Point</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-sm">MA(02): Jumlah pelanggan baru</p>
                                            <select name="hasil" class="form-control" required>
                                                <option>Point</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-sm">MA(03): Kenaikan jumlah pelanggan baru</p>
                                            <select name="hasil" class="form-control" required>
                                                <option>Point</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-sm">MA(04): Project marketing</p>
                                            <select name="hasil" class="form-control" required>
                                                <option>Point</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <p class="text-sm">MA(05): Total Sales</p>
                                            <select name="hasil" class="form-control" required>
                                                <option>Point</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn btn-primary">Submit</a>
                                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                <a href="<?php echo base_url('hrd/Hrd/kinerja') ?>" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->