<?php
$this->load->library('session');
$level_akses = $this->session->userdata('role_id');

if ($level_akses == 1) { ?>
    <!-- Dashboard Karyawan -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sistem Kepegawaian</h1>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Umum</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p>Selamat datang <span class="text-primary"><?php echo $user['username']; ?></span> di sistem kepegawaian PT. Sinar Grafindo</p>

                                <?php
                                $nip = $user['nip'];
                                ?>
                                <!-- Kolom 3 -->
                                <div class="col-lg-12 col-md-6">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-2" align="center">
                                            <div class="small-box bg-primary">
                                                <div class="inner">
                                                    <h1 class="font-weight-bold">
                                                        <?php
                                                        if ($select == '') {
                                                            echo '0';
                                                        } else {
                                                            echo $select;
                                                        }
                                                        ?>
                                                    </h1>
                                                    <p>Tugas Hari Ini</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-tasks"></i>
                                                </div>
                                                <a href="Daily" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-2" align="center">
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h1 class="font-weight-bold">
                                                        <?php
                                                        if ($approve == '') {
                                                            echo '0';
                                                        } else {
                                                            echo $approve;
                                                        }
                                                        ?>

                                                    </h1>
                                                    <p>Tugas Pending</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                                <a href="Daily" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-2" align="center">
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h1 class="font-weight-bold">
                                                        <?php
                                                        foreach ($kpi as $kp) :

                                                            if ($kp == '') {
                                                                echo '0';
                                                            } else {
                                                                echo round($kp, 2);
                                                            }
                                                        endforeach;
                                                        ?>

                                                    </h1>
                                                    <p>KPI Kumulatif</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <a href="Evaluasi/index_karyawan" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- End Kolom 3 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php } else if ($level_akses == 2) { ?>
    <!-- Dashboard Leader -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Sistem Kepegawaian</h1>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Informasi Umum</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p>Selamat datang <span class="text-primary"><?php echo $user['username']; ?></span> di sistem kepegawaian PT. Sinar Grafindo</p>

                                <!-- 3 Kolom -->
                                <div class="col-lg-12 col-md-6">
                                    <div class="row">

                                        <div class="col-lg-4 col-md-2" align="center">
                                            <div class="small-box bg-primary">
                                                <div class="inner">
                                                    <h1 class="font-weight-bold">
                                                        <?php
                                                        if ($karyawan == '') {
                                                            echo '0';
                                                        } else {
                                                            echo $karyawan;
                                                        }
                                                        ?>
                                                    </h1>
                                                    <p>Total Karyawan</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                               
                                                <a href="<?php echo base_url('Data_Karyawan/detail_karyawan_leader/' . $user['id_divisi']); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-2" align="center">
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h1 class="font-weight-bold">
                                                        <?php
                                                        if ($belum == '') {
                                                            echo '0';
                                                        } else {
                                                            echo $belum;
                                                        }
                                                        ?>
                                                    </h1>
                                                    <p>Tugas Belum Selesai</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-times"></i>
                                                </div>
                                                <a href="<?php echo base_url('Daily'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-2" align="center">
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h1 class="font-weight-bold">
                                                        <?php
                                                        if ($pending == '') {
                                                            echo '0';
                                                        } else {
                                                            echo $pending;
                                                        }
                                                        ?>
                                                    </h1>
                                                    <p>Koreksi Tugas</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fa fa-bell"></i>
                                                </div>
                                                <a href="<?php echo base_url('Monitoring'); ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- End 3 Kolom -->

                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php } else if ($level_akses == 3 || $level_akses == 4) { ?>
    <!-- Dashboard Hrd & Direksi -->
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
                            <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
                            <!-- <li class="breadcrumb-item active">Dashboard</li> -->
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Selamat datang <span class="text-primary"><?php echo $user['username']; ?></span> di sistem kepegawaian PT. Sinar Grafindo.</h5>
                                <div class="alert alert-sm alert-success alert-dismissible m-1">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Halaman dashboard HRD menampilkan jumlah karyawan, jumlah karyawan tiap divisi dan jumlah karyawan tetap dan karyawan kontrak. Klik <span class="text-indigo"> lihat detail</span> atau klik menu yang ada di <span class="text-indigo"> sidebar</span> untuk mendapatkan informasi lebih detail.
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row d-flex justify-content-between mr-2 ml-2">
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <p>Jumlah Karyawan</p>
                                                <h3>
                                                    <?php 
                                                        echo $user_hrd;
                                                     ?>
                                                </h3>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-person-add"></i>
                                            </div>
                                            <a href="<?php echo base_url('Data_Karyawan') ?>" class="small-box-footer">Lihat Detail<i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <p>Jumlah Karyawan Laki-Laki</p>
                                                <h3>
                                                    <?php echo $user_male; ?>
                                                <sup style="font-size: 20px"></sup></h3>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-male"></i>
                                            </div>
                                            <a href="<?php echo base_url('Data_Karyawan') ?>" class="small-box-footer">Lihat Detail<i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <p>Jumlah Karyawan Perempuan</p>
                                                <h3>
                                                    <?php echo $user_female; ?>
                                                </h3>
                                            </div>
                                            <div class="icon">
                                                <i class="fas fa-female"></i>
                                            </div>
                                            <a href="<?php echo base_url('Data_Karyawan') ?>" class="small-box-footer">Lihat Detail<i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <div>
                                    Pengecekan
                                        <table class="table table-bordered">
                                            <tr class="bg-primary">
                                                <?php foreach ($divisi as $div): ?>    
                                                <td>
                                                    <?php
                                                        echo $div['divisi'];
                                                    ?>
                                                </td> 
                                                <?php endforeach; ?>     
                                            </tr>
                                            <tr>
                                                <?php foreach ($divisi as $div):
                                                    $get = $div['id_divisi'];
                                                    $get_id =$this->db->query("SELECT COUNT(*) as jumlah from user WHERE id_divisi='$get'")->result_array();
                                                    foreach ($get_id as $id): 
                                                ?>
                                                <td>
                                                    <?php echo $id['jumlah']; ?>
                                                </td>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </tr>
                                        </table>
                                    

                                    End Pengecekan
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Bar chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    Jumlah Karyawan Tiap Divisi
                                                </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="bar-chart" style="height: 300px;"></div>
                                            </div>
                                            <!-- /.card-body-->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12">
                                        <!-- Donut chart -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="far fa-chart-bar"></i>
                                                    Status Karyawan
                                                </h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div id="donut-chart" style="height: 300px;"></div>
                                            </div>
                                            <!-- /.card-body-->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php } ?>