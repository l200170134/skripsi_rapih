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
                        <?php foreach ($kinerja as $kj) { ?>
                            <form role="form" method="post" action="<?php echo base_url('leader/Leader/kinerja_proses_update'); ?>">
                                <input type="hidden" name="id" value="<?php echo $kj->id ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <p class="text-sm">Nama Karyawan</p>
                                                <input type="text" readonly class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-sm">Bulan</p>
                                                <input type="text" name="bulan" readonly class="form-control" value="<?php echo $kj->bulan ?>">
                                            </div>
                                            <div class="form-group">
                                                <p class="text-sm">Tahun</p>
                                                <input type="text" name="bulan" readonly class="form-control" value="<?php echo $kj->tahun ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                            <div class="form-group">
                                                <p class="text-sm">MA(01): Kenaikan total sales </p>
                                                <select name="hrd_1" class="form-control">
                                                    <option value="Proses">Point</option>
                                                    <option value="1" <?php echo ($kj->hrd_1 == '1' ? ' selected' : ''); ?>>1</option>
                                                    <option value="2" <?php echo ($kj->hrd_1 == '2' ? ' selected' : ''); ?>>2</option>
                                                    <option value="3" <?php echo ($kj->hrd_1 == '3' ? ' selected' : ''); ?>>3</option>
                                                    <option value="4" <?php echo ($kj->hrd_1 == '4' ? ' selected' : ''); ?>>4</option>
                                                    <option value="5" <?php echo ($kj->hrd_1 == '5' ? ' selected' : ''); ?>>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-sm">MA(02): Jumlah pelanggan baru</p>
                                                <select name="hrd_2" class="form-control">
                                                    <option value="Proses">Point</option>
                                                    <option value="1" <?php echo ($kj->hrd_2 == '1' ? ' selected' : ''); ?>>1</option>
                                                    <option value="2" <?php echo ($kj->hrd_2 == '2' ? ' selected' : ''); ?>>2</option>
                                                    <option value="3" <?php echo ($kj->hrd_2 == '3' ? ' selected' : ''); ?>>3</option>
                                                    <option value="4" <?php echo ($kj->hrd_2 == '4' ? ' selected' : ''); ?>>4</option>
                                                    <option value="5" <?php echo ($kj->hrd_2 == '5' ? ' selected' : ''); ?>>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-sm">MA(03): Kenaikan jumlah pelanggan baru</p>
                                                <select name="ma_1" class="form-control">
                                                    <option value="Proses">Point</option>
                                                    <option value="1" <?php echo ($kj->ma_1 == '1' ? ' selected' : ''); ?>>1</option>
                                                    <option value="2" <?php echo ($kj->ma_1 == '2' ? ' selected' : ''); ?>>2</option>
                                                    <option value="3" <?php echo ($kj->ma_1 == '3' ? ' selected' : ''); ?>>3</option>
                                                    <option value="4" <?php echo ($kj->ma_1 == '4' ? ' selected' : ''); ?>>4</option>
                                                    <option value="5" <?php echo ($kj->ma_1 == '5' ? ' selected' : ''); ?>>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-sm">MA(04): Project marketing</p>
                                                <select name="ma_2" class="form-control">
                                                    <option value="Proses">Point</option>
                                                    <option value="1" <?php echo ($kj->ma_2 == '1' ? ' selected' : ''); ?>>1</option>
                                                    <option value="2" <?php echo ($kj->ma_2 == '2' ? ' selected' : ''); ?>>2</option>
                                                    <option value="3" <?php echo ($kj->ma_2 == '3' ? ' selected' : ''); ?>>3</option>
                                                    <option value="4" <?php echo ($kj->ma_2 == '4' ? ' selected' : ''); ?>>4</option>
                                                    <option value="5" <?php echo ($kj->ma_2 == '5' ? ' selected' : ''); ?>>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <p class="text-sm">MA(05): Total Sales</p>
                                                <select name="ma_3" class="form-control">
                                                    <option value="Proses">Point</option>
                                                    <option value="1" <?php echo ($kj->ma_3 == '1' ? ' selected' : ''); ?>>1</option>
                                                    <option value="2" <?php echo ($kj->ma_3 == '2' ? ' selected' : ''); ?>>2</option>
                                                    <option value="3" <?php echo ($kj->ma_3 == '3' ? ' selected' : ''); ?>>3</option>
                                                    <option value="4" <?php echo ($kj->ma_3 == '4' ? ' selected' : ''); ?>>4</option>
                                                    <option value="5" <?php echo ($kj->ma_3 == '5' ? ' selected' : ''); ?>>5</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo base_url('leader/Leader/kinerja') ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->