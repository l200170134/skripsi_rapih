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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12 col-lg-6">
                                <a href="<?php echo base_url('Jurnal'); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                <h5 style="display:inline;">Jurnal Harian Karyawan</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- <div class="col-2">
                                <div class="row"> -->
                                    <a href="<?php echo base_url('Jurnal/jurnal_form/' . $nip) ?>" class="btn btn-block btn-success mb-3" style="width:180px;">Tambahkan Aktivitas</a>
                                <!-- </div>
                            </div -->
                            
                            <div class="bungkus p-0 mb-2" style="overflow: scroll;">
                                <table class="table table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <tr align="center" class="bg-secondary">
                                        <th width="50px">No</th>
                                        <!-- <th width="60px">NIP</th> -->
                                        <th width="300px">Aktivitas</th>
                                        <th width="90px">Jam</th>
                                        <th width="100px">Tanggal</th>
                                        <th width="60px">Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($jurnal as $ju) : ?>
                                            <tr align="center">
                                                <td><?php echo ++$start ?></td>
                                                <!-- <td><span class="badge badge-primary"><?php //echo $ju['nip'] ?></span></td> -->
                                                <td align="left" class="pl-3"><?php echo $ju['aktivitas'] ?></td>
                                                <td><?php echo $ju['jam'] ?></td>
                                                <td><?php echo $ju['tgl'] ?></td>
                                                <td align="center" class="pl-1" onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                    <?php echo anchor('Jurnal/jurnal_proses_hapus/' . $ju['id'], '<div class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></div>'); ?>
                                                </td>
                                            <?php endforeach ?>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper