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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12 col-lg-6">
                                <a href="<?php echo base_url('Evaluasi'); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                <h5 style="display:inline;">Key Performance Index karyawan</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="col-12">
                                <div class="row">
                                    <?php
                                    $role_id = $this->session->userdata('role_id');
                                    if ($role_id != 2) {
                                    } else {
                                    ?>
                                        <div>
                                            <?php echo anchor('Evaluasi/kpivalue_form/' . $user['nip'], '<div class="btn btn-block btn-md btn-success mb-2"><i class="fas fa-plus p-1" style="color:white;" title="Tambah Data"></i>KPI Value</div>'); ?>
                                        </div>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>

                            <!-- end percobaan -->
                            <div style="overflow: scroll;">
                                <table class="table col-12 col-lg-6 table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <?php
                                        if ($role_id != 2) {
                                        } else {
                                        ?>
                                            <tr class="bg-primary">
                                                <td colspan="4" align="center" height="15x"><?php echo $user['nama']; ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr class="bg-secondary" align="center">
                                            <th width="50px">No</th>
                                            <th width="150px">Periode</th>
                                            <th width="150px">Nilai KPI</th>
                                            <?php
                                            if ($role_id != 2) {
                                            } else {
                                            ?>
                                                <th width="150px">Aksi</th>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($value as $bu) : ?>

                                            <tr align="center">
                                                <td><?php echo $no++; ?></td>
                                                <td> <?php echo $bu['bulan'] . ' ' . $bu['tahun']; ?></td>
                                                <td><?php echo $bu['rata']; ?></td>
                                                <?php
                                                if ($role_id != 2) {
                                                } else {
                                                ?>
                                                    <td>
                                                        <label onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                            <?php echo anchor('Evaluasi/kpivalue_hapus_proses/' . $bu['nip'] . '/' . $bu['bulan'] . '/' . $bu['tahun'], '<div class="btn btn-block btn-md btn-danger"><i class="fas fa-trash-alt p-1" style="color:white;" title="Kembali"></i></div>'); ?>
                                                        </label>
                                                    </td>
                                                <?php
                                                }
                                                ?>

                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>



                                </table>


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