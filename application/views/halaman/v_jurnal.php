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
                            <h3 class="card-title">Jurnal Harian Divisi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body mb-2" style="overflow: scroll;">
                            <table class="table table-hover table-md col-6" style="table-layout: fixed; word-wrap: break-word;">
                                <thead class="bg-secondary">
                                    <tr align="center">
                                        <th width="50px">No</th>
                                        <th width="100px">Foto</th>
                                        <th width="200px">Nama Lengkap</th>
                                        <th width="50px">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $a = 1;
                                    foreach ($karyawan as $kr) :
                                    ?>
                                        <tr>
                                            <td class="p-2" align="center"><?php echo ++$start; ?></td>
                                            <td class="p-2">
                                                <img src="<?php echo base_url(); ?>assets/image/<?php echo $kr['image']; ?>" class="rounded" width="70%">
                                            </td>
                                            <td class="p-2" align="rignt" class="pl-3"><?php echo $kr['nama'] ?></td>
                                            <td class="p-2" align="center" class="p-2"><a href="<?php echo base_url('Jurnal/jurnal_list/' . $kr['nip']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye" style="color:white;"></i></a></td>
                                        </tr>

                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->