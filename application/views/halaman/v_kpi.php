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
                                <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $id_divisi); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                <h5 style="display:inline;">Key Performance Index karyawan</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div>
                                        <?php echo anchor('Evaluasi/kpi_form/' . $divisi['id_divisi'], '<div class="btn btn-block btn-md btn-success"><i class="fas fa-plus p-1" style="color:white;" title="Tambah Data"></i>KPI</div>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div style="overflow: scroll;">
                                <table class="table col-12 col-lg-6 table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr class="bg-secondary" align="center">
                                            <th width="50px">No</th>
                                            <th width="150px">Pertanyaan</th>
                                            <th width="150px">Divisi</th>
                                            <th width="150px">Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($kpi_data as $kpi) : ?>
                                            <tr>
                                                <td><?php echo ++$start; ?></td>
                                                <td><?php echo $kpi['pertanyaan']; ?></td>
                                                <td align="center"><?php echo $divisi['divisi']; ?></td>
                                                <td align="center">
                                                    <div class="btn-group">
                                                        <?php echo anchor('Evaluasi/kpi_update/' . $kpi['id_pertanyaan'], '<div class="btn btn-block btn-sm btn-warning"><i class="fas fa-edit p-1" style="color:white;" title="Kembali"></i></div>'); ?>
                                                    </div>
                                                    <div class="btn-group mr-1" onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                        <?php echo anchor('Evaluasi/kpi_hapus_proses/' . $kpi['id_pertanyaan'], '<div class="btn btn-block btn-sm btn-danger"><i class="fas fa-trash-alt p-1" style="color:white;" title="Kembali"></i></div>'); ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <!-- table ke 2 -->
                                </table>


                                <div class="modal fade" id="modal-info">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-success">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Info Pembayaran</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                            <div class="d-flex justify-content-start m-2">

                                <?php echo $this->pagination->create_links(); ?>
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
<!-- /.content-wrapper