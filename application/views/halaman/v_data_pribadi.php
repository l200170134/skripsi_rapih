<?php
$this->load->library('session');
$role_id = $this->session->userdata('role_id');
$id_divisi = $this->session->userdata('divisi_page');
$link = $this->session->userdata('link_kar');
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
                        <!-- <li class="breadcrumb-item active">Dashboard</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row ml-2">
                <?php if ($back == 1 && $role_id == 3) { ?>
                    <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $id_divisi . '/' . $link); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                <?php } else if ($back == 1 && $role_id == 2) { ?>
                    <a href="<?php echo base_url('Data_karyawan/detail_karyawan_leader/' . $id_divisi . '/' . $link); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                <?php } elseif ($back == 1 && $role_id == 4) { ?>
                    <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $id_divisi . '/' . $link); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                <?php } else {
                } ?>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <?php foreach ($karyawan as $kar) : ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Data Pribadi</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 d-flex justify-content-center">
                                        <img src="<?php echo base_url(); ?>assets/image/<?php echo $kar['image']; ?>" class="profile-img img-fluid img-circle img-lg">
                                        <!-- <img class="profile-img img-fluid img-circle img-lg" src="<?php //echo base_url('assets/dist/img/user4-128x128.jpg') 
                                                                                                        ?>" alt="User profile picture"> -->
                                    </div>
                                    <div class="col-lg-5">
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
                                        <p class="text-muted">Office <?php echo $kar['office']; ?></p>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="row">

                                            <p class="mb-0 col-6 p-1"><i class="fas fa-phone-alt mr-3" style="color:#007bff;"></i><?php echo $kar['no_hp']; ?><br></p>
                                            <p class="mb-0 col-6 p-1"><i class="fas fa-phone-alt mr-3" style="color:#dc3545;"></i><?php echo $kar['no_hp_kel']; ?><br></p>
                                            <p class="mb-0 col-12 p-1"><i class="fas fa-envelope mr-3" style="color:#007bff;"></i><?php echo $kar['email']; ?><br></p>

                                        </div>
                                    </div>
                                </div>

                                <div class="row pt-4">
                                    <!-- kiri utama -->
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="mb-0">Jenis Kelamin</label>
                                                <p class="text-muted"><?php echo $kar['jk']; ?></p>
                                                <label class="mb-0">Status Pernikahan</label>
                                                <p class="text-muted"><?php echo $kar['pernikahan']; ?></p>
                                                <label class="mb-0">Alamat Tinggal</label>
                                                <p class="text-muted"><?php echo $kar['alamat']; ?></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="mb-0">Tempat, Tanggal Lahir</label>
                                                <p class="text-muted">
                                                    <?php
                                                    echo $kar['tempat_lahir'];
                                                    echo ', ';
                                                    echo date('d-m-Y', strtotime($kar['tgl_lahir']));
                                                    ?>
                                                </p>
                                                <label class="mb-0">NIK</label>
                                                <p class="text-muted"><?php echo $kar['nik']; ?></p>
                                                <label class="mb-0">Alamat KTP</label>
                                                <p class="text-muted"><?php echo $kar['alamat_ktp']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- kanan utama -->
                                    <div class="col-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="mb-0">NIP</label>
                                                <p class="text-muted"><?php echo $kar['nip']; ?></p>
                                                <label class="mb-0">NPWP</label>
                                                <p class="text-muted"><?php echo $kar['npwp']; ?></p>
                                                <label class="mb-0">Status</label>
                                                <p class="text-muted">

                                                    <?php
                                                    if ($status_p != null) {
                                                        $get_status = $this->db->get_where('tb_status', ['id' => $status_p['status']])->row_array();
                                                        echo $get_status['status'];
                                                    } else {
                                                        echo "Belum Terisi";
                                                    }
                                                    // $kode = $status_p['status'];
                                                    // echo $kode;
                                                    // $get_status = $this->db->get_where('tb_status', ['id' => $kode])->row_array();
                                                    // echo $get_status['status'];
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="mb-0">No. Rekening</label>
                                                <p class="text-muted">
                                                    <?php
                                                    echo $kar['bank'];
                                                    echo '/';
                                                    echo $kar['no_rek'];
                                                    ?>
                                                </p>
                                                <label class="mb-0">Divisi</label>
                                                <p class="text-muted">
                                                    <?php
                                                    $get_id = $kar['id_divisi'];
                                                    $divisi = $this->db->get_where('tb_divisi', ['id_divisi' => $get_id])->row_array();
                                                    echo $divisi['divisi'];
                                                    ?>
                                                </p>
                                                <label class="mb-0">Perusahaan</label>
                                                <p class="text-muted"><?php echo $kar['perusahaan']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Rincian Gaji</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <a href="<?php echo base_url('Gaji/rincian_form/' . $kar['nip']); ?>" class="btn btn-success p-1 ml-2 mb-3 btn-sm">Perbaharui Rincian Gaji</a>
                                    <div class="col-12">
                                        <?php
                                        echo $this->session->flashdata('tambahGaji');
                                        echo $this->session->flashdata('ubahGaji');
                                        echo $this->session->flashdata('hapusGaji');
                                        ?>
                                    </div>
                                    <div class="col-12 mb-2" style="overflow: scroll;">
                                        <table class="table table-sm  table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                            <thead class="bg-secondary">
                                                <tr align="center">
                                                    <th width="40px">No</th>
                                                    <th width="150px">Gaji Pokok</th>
                                                    <th width="150px">Bulan Mulai</th>
                                                    <th width="150px">Bulan Akhir</th>
                                                    <th width="100px">Status</th>
                                                    <th width="150px">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr align="center">
                                                    <td>1</td>
                                                    <td>Rp. 2.000.000</td>
                                                    <td>Mei 2020</td>
                                                    <td>Sekarang</td>
                                                    <td><span class="badge badge-primary">Aktif</span></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#modalGaji"><i class="fas fa-eye " style="color:white;" title="Lihat Detail"></i></button>
                                                        <?php echo anchor('Data_pribadi/status_karyawan_update/', '<div class="btn btn-warning btn-sm mr-2" title="Update Rincian Gaji"><i class="fas fa-edit" style="color:white;"></i></div>'); ?>
                                                        <label onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                            <?php echo anchor('Data_pribadi/status_karyawan_hapus/', '<div class="btn btn-danger btn-sm"  title="Hapus Rincian Gaji"><i class="fas fa-trash-alt" style="color:white;"></i></div>'); ?>
                                                        </label>
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
            </div>
        <?php endforeach; ?>
    </section>

    <?php if ($role_id == 3 && $back == 1) { ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-success">
                            <div class="card-header">
                                <div class="card-title">Hak Akses</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 mb-2">
                                        <label class="mb-0">Username</label>
                                        <p class="mb-0"><?php echo $kar['username']; ?></p>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <label class="mb-0">Password</label>
                                        <p class="mb-0"><?php echo $kar['password']; ?></p>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <label class="mb-0">Level</label>
                                        <p class="mb-0">
                                            <?php
                                            $get_id = $kar['role_id'];
                                            $divisi = $this->db->get_where('user_role', ['id_role' => $get_id])->row_array();
                                            echo $divisi['nama_role'];
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-lg-3 mb-2">
                                        <label class="mb-0">Status Karyawan</label>
                                        <p class="mb-0">
                                            <?php
                                            $get_id = $kar['is_active'];
                                            if ($get_id == '0') {
                                                echo 'Tidak Aktif';
                                            } else {
                                                echo 'Aktif';
                                            }
                                            ?>
                                        </p>
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
                        <div class="card card-warning">
                            <div class="card-header">
                                <div class="card-title">Riwayat Kepegawaian</div>
                            </div>
                            <div class="card-body">
                                <?php echo anchor('Data_pribadi/status_karyawan_form/' . $kar['nip'], '<div class="btn btn-success ml-2 mb-3 btn-sm">Tambah Status Karyawan</div>'); ?>
                                <div class="col-12">
                                    <?php
                                    echo $this->session->flashdata('tambahStatus');
                                    echo $this->session->flashdata('ubahStatus');
                                    echo $this->session->flashdata('hapusStatus');
                                    ?>
                                </div>
                                <div class="col-12 mb-2" style="overflow: scroll;">
                                    <table class="table table-sm  table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                        <thead class="bg-secondary">
                                            <tr align="center">
                                                <th width="30px">No</th>
                                                <th width="200px">Status</th>
                                                <th width="150px">Tanggal Mulai</th>
                                                <th width="150px">Tanggal Akhir</th>
                                                <th width="150px">Ketetangan</th>
                                                <th width="90px">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($status as $st) :

                                            ?>
                                                <tr align="center">
                                                    <input type="text" name="id" hidden>
                                                    <td><?php echo ++$start; ?></td>
                                                    <td>
                                                        <?php
                                                        $get_id = $st['status'];
                                                        $status = $this->db->get_where('tb_status', ['id' => $get_id])->row_array();
                                                        echo $status['status'];
                                                        ?>
                                                    </td>
                                                    <td><?php echo date('d-m-Y', strtotime($st['tgl_mulai'])); ?></td>
                                                    <td><?php echo date('d-m-Y', strtotime($st['tgl_akhir'])); ?></td>
                                                    <td>
                                                        <?php if ($st['aktivasi'] == 1) { ?>
                                                            <span class="badge badge-secondary">Berakhir</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-primary">Aktif</span>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <?php echo anchor('Data_pribadi/status_karyawan_update/' . $st['id_status'], '<div class="btn btn-warning btn-sm mr-2" title="Update Status"><i class="fas fa-edit" style="color:white;"></i></div>'); ?>

                                                            <label onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                                <?php echo anchor('Data_pribadi/status_karyawan_hapus/' . $st['id_status'], '<div class="btn btn-danger btn-sm"  title="Hapus Status kepegawaian"><i class="fas fa-trash-alt" style="color:white;"></i></div>'); ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <?php echo $this->pagination->create_links() ?>
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

<!-- Modal -->
<div class="modal fade" id="modalGaji" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Rincian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table style="table-layout: fixed; word-wrap: break-word;" class="table table-hover">
                    <thead class="bg-secondary">
                        <tr>
                            <th>Rincian</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tunjangan Kehadiran</td>
                            <td>Rp. 200.000</td>
                        </tr>
                        <tr>
                            <td>Uang Makan</td>
                            <td>Rp. 200.000</td>
                        </tr>
                        <tr>
                            <td>Uang Transport</td>
                            <td>Rp. 200.000</td>
                        </tr>
                        <tr>
                            <td>Lain-lain</td>
                            <td>Rp. 200.000</td>
                        </tr>
                        <tr>
                            <td>Over Time</td>
                            <td>Rp. 200.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>