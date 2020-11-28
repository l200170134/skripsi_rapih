<?php
$this->load->library('session');
$level_akses = $this->session->userdata('role_id');
?>

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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item">Profil</li>
                        <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
<?php foreach ($karyawan as $kar): ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Pribadi</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2 d-flex justify-content-center">
                                    <img class="profile-img img-fluid img-circle img-lg" src="<?php echo base_url('assets/dist/img/user4-128x128.jpg') ?>" alt="User profile picture">
                                </div>
                                <div class="col-lg-6">
                                    <h5 class="profile-username mb-0 mt-3"><?php echo $kar['nama']; ?></h5>
                                    <p class="text-muted mb-0">
                                        <?php
                                            echo $kar['jabatan'];
                                            echo " - ";
                                            $get_id = $kar['id_divisi'];
                                            $divisi = $this->db->get_where('tb_divisi', ['id_divisi' => $get_id])->row_array();
                                            echo $divisi['divisi'];
                                        ?>
                                    </p>
                                    <p class="text-muted">Office Solo</p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="mb-0"><i class="fas fa-phone-alt mr-3" style="color:#007bff;"></i>082324898695<br></p>
                                    <p class="mb-0"><i class="fas fa-envelope mr-3" style="color:#007bff;"></i>norhadi@gmail.com<br></p>
                                </div>
                                <div class="col-lg-2">
                                    <p class="mb-0"><i class="fas fa-phone-alt mr-3" style="color:#dc3545;"></i>082324898695<br></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- kiri utama -->
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="mb-0">Jenis Kelamin</label>
                                            <p class="text-muted">Laki-Laki</p>
                                            <label class="mb-0">Status Pernikahan</label>
                                            <p class="text-muted">Belum Kawin</p>
                                            <label class="mb-0">Alamat Tinggal</label>
                                            <p class="text-muted">Ds. Sriwedari RT. 2 RW.1 Kecamatan Jaken, Kabupaten Pati, Jawa Tengah, Indonesi</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="mb-0">Tempat, Tanggal Lahir</label>
                                            <p class="text-muted">Pati, 21 Februari 1999</p>
                                            <label class="mb-0">NIK</label>
                                            <p class="text-muted">3338564320001</p>
                                            <label class="mb-0">Alamat KTP</label>
                                            <p class="text-muted">Ds. Sriwedari RT. 2 RW.1 Kecamatan Jaken, Kabupaten Pati, Jawa Tengah, Indonesi</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- kanan utama -->
                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="mb-0">NIP</label>
                                            <p class="text-muted">MKT-001-2020</p>
                                            <label class="mb-0">NPWP</label>
                                            <p class="text-muted">9984503445</p>
                                            <label class="mb-0">Status</label>
                                            <p class="text-muted">PKWT</p>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="mb-0">No. Rekening</label>
                                            <p class="text-muted">BNI/44567534</p>
                                            <label class="mb-0">Divisi</label>
                                            <p class="text-muted">Marketing</p>
                                            <label class="mb-0">Perusahaan</label>
                                            <p class="text-muted">PT. Sinar Grafindo</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endforeach; ?>

    <?php if ($level_akses == 3) { ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <label class="mb-0">Username</label>
                                        <p class="mb-0">Norhadi</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="mb-0">Password</label>
                                        <p class="mb-0">8HA9C0A</p>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="mb-0">Level</label>
                                        <p class="mb-0">Leader HRD</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Riwayat Kepegawaian</div>
                            </div>
                            <div class="card-body">
                                <div class="col-12" style="overflow: scroll;">
                                    <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                        <thead>
                                            <tr>
                                                <th width="50px">No</th>
                                                <th width="120px">Status</th>
                                                <th width="150px">Tgl Mulai</th>
                                                <th width="150px">Tgl Akhir</th>
                                                <th width="90px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>PKWT</td>
                                                <td>10-10-2020</td>
                                                <td>10-12-2020</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('Status/status_update') ?>" class="btn btn-warning btn-sm" title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                                                        <a href="#" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>PKWT</td>
                                                <td>10-12-2020</td>
                                                <td>10-02-2021</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('Status/status_update') ?>" class="btn btn-warning btn-sm" title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                                                        <a href="#" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm" title="Delete"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->


    <?php } else {
    } ?>

</div>
<!-- /.content-wrapper -->