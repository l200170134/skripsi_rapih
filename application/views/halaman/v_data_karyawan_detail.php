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
                                <h5>Tabel Karyawan <?php echo $nd['divisi'] ?></h5>
                                <div class="alert alert-sm alert-success alert-dismissible m-1">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Menampilkan seluruh data karyawan <?php echo $nd['divisi'] ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <?php if ($this->session->userdata('role_id') != 4) { ?>
                                <table>
                                    <tr>
                                        <td class="pr-2"><a href="<?php echo base_url('Data_karyawan/tambah_data_karyawan') ?>" class="btn btn-block btn-md btn-success">Tambah Karyawan</a></td>
                                    </tr>
                                </table>
                            <?php } else {
                            } ?>

                            <br>
                            <div class="bungkus" style="overflow: scroll;">
                                <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr align="center">
                                            <th width="50px">No</th>
                                            <th width="200px">NIP</th>
                                            <th width="130px">Nama</th>
                                            <th width="130px">Divisi</th>
                                            <th width="150px">Jabatan</th>
                                            <th width="150px">Perusahaan</th>

                                            <?php if ($this->session->userdata('role_id') != 4) { ?>
                                                <th width="80px">Gaji</th>
                                                <th width="80px">Kinerja</th>
                                            <?php } else {
                                            }; ?>

                                            <th width="120px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no = 1;
                                    foreach ($divisi as $dv) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $dv['nip']; ?></td>
                                            <td><?php echo $dv['nama']; ?></td>
                                            <td><?php echo $dv['id_divisi']; ?></td>
                                            <td></td>
                                            <td></td>

                                            <?php
                                            if ($this->session->userdata('role_id') != '4') { ?>
                                                <td class="d-flex justify-content-center"><a href="<?php echo base_url('Gaji') ?>" class="btn btn-primary btn-sm" title="Lihat Gaji">Lihat</a></td>
                                                <td align="center"><a href="<?php echo base_url('Kinerja') ?>" class="btn btn-primary btn-sm" title="Lihat Kinerja">Lihat</a></td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('Data_pribadi') ?>" class="btn btn-success btn-sm" title="Lihat Detail"><i class="fas fa-eye" style="color:white;"></i></a>
                                                        <a href="<?php echo base_url('Data_karyawan/tambah_data_karyawan') ?>" class="btn btn-warning btn-sm" title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                                                        <a href="" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fas fa-trash"></i></a>
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

                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
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