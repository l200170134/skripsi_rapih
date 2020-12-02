<?php
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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Data_karyawan') ?>">Divisi</a></li>
                        <li class="breadcrumb-item">Karyawan</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Section table karyawan -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <?php foreach ($nama_divisi as $nd) : ?>
                                <h5>Data Karyawan Divisi <?php echo $nd['divisi'] ?></h5>
                                <!-- Variabel Global  -->
                            <?php
                                $this->session->set_userdata('id_divisi', $nd['id_divisi']);
                            endforeach; ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <?php if ($level_akses != 4) { ?>
                                <table>
                                    <tr>
                                        <td>
                                            <?php foreach ($nama_divisi as $nd) : ?>
                                                <?php echo anchor('Data_karyawan/tambah_data_karyawan/' . $nd['id_divisi'], '<div class="btn btn-block btn-md btn-success">Tambah Data Karyawan</div>'); ?>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php } else if ($level_akses == 4) { ?>
                                <table>
                                    <tr>
                                        <td class="pr-2"><a href="<?php echo base_url('Monitoring/monitoring_direksi/' . $id_divisi); ?>" class="btn btn-block btn-md btn-success">Monitoring</a></td>
                                        <td class="pr-2"><a href="<?php echo base_url('Kinerja/kinerja_direksi/' . $id_divisi) ?>" class="btn btn-block btn-md btn-primary">Kinerja</a></td>
                                    </tr>
                                </table>
                            <?php } ?>

                            <br>
                            <div class="bungkus mb-2" style="overflow: scroll;">
                                <table class="table  table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead class="bg-secondary">
                                        <tr align="center">
                                            <th width="50px">No</th>
                                            <th width="80px">NIP</th>
                                            <th width="200px">Nama</th>
                                            <th width="120px">Jabatan</th>
                                            <th width="150px">Perusahaan</th>

                                            <?php if ($level_akses != 4) { ?>
                                                <th width="120px">Gaji</th>
                                                <th width="80px">Kinerja</th>
                                            <?php } else {
                                            }; ?>

                                            <th width="150px">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($divisi as $dv) : ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $dv['nip']; ?></td>
                                                <td><?php echo $dv['nama']; ?></td>
                                                <td><?php echo $dv['jabatan']; ?></td>
                                                <td><?php echo $dv['perusahaan']; ?></td>


                                                <?php
                                                if ($level_akses != '4') { ?>
                                                    <td align="center">

                                                        <?php echo anchor('Gaji/gaji_view/' . $dv['nip'], '<div class="btn btn-primary btn-sm mr-1"><i class="fas fa-eye p-1" style="color:white;" title="Tambah Gaji"></i></div>'); ?>

                                                        <?php echo anchor('Gaji/gaji_form/' . $dv['nip'], '<div class="btn btn-success btn-sm mr-1"><i class="fas fa-plus p-1" style="color:white;" title="Tambah Gaji"></i></div>'); ?>


                                                    <td align="center"><a href="<?php echo base_url('Kinerja') ?>" class="btn btn-primary btn-sm" title="Lihat Kinerja"><i class="fas fa-eye p-1"></i></a></td>
                                                    <td align="center">
                                                        <div class="    btn-group">
                                                            <?php echo anchor('Data_pribadi/data_pribadi/' . $dv['nip'], '<div class="btn btn-primary btn-sm mr-1"><i class="fas fa-eye p-1" style="color:white;" title="Detail Data"></i></div>'); ?>

                                                            <?php echo anchor('Data_karyawan/update_data_karyawan/' . $dv['nip'], '<div class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit p-1" style="color:white;" title="Update Data"></i></div>'); ?>

                                                            <label onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                                <?php echo anchor('Data_karyawan/hapus_data_karyawan/' . $dv['nip'], '<div class="btn btn-danger btn-sm" title="Hapus Data"><i class="fas fa-trash-alt p-1" style="color:white;"></i></div>'); ?>
                                                            </label>
                                                        </div>
                                                    </td>
                                                <?php } else { ?>
                                                    <td align="center">
                                                        <div class="btn-group">
                                                            <a href="<?php echo base_url('Data_pribadi') ?>" class="btn btn-success btn-sm" title="Lihat Detail"><i class="fas fa-eye" style="color:white;"></i></a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                            <?php echo $this->pagination->create_links() ?>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->