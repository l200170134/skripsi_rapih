<?php $id_divisi =  $this->session->userdata('divisi_page') ?>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12 col-lg-6">
                                <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $id_divisi); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                <h5 style="display:inline;">Data Kumulatif Gaji</h5>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            $user = $this->db->get_where('user', ['nip' => $nip])->row_array(); ?>
                            <table class="mb-2">
                                <tr>
                                    <td><span class="badge badge-primary"><?php echo $user['nama']; ?></span></td>
                                    </label>
                                </tr>
                            </table>

                            <div class="mb-2" style="overflow: scroll;">
                                <table class="table col-12 col-lg-6 table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr class="bg-secondary" align="center">
                                            <th width="50px">No</th>
                                            <th width="150px">Periode</th>
                                            <th width="150px">Nominal</th>
                                            <th width="180px">Tanggal Pembayaran</th>
                                            <?php if ($role_id == 3) {
                                                echo '<th width="150px">Aksi</td>';
                                            } else {
                                            } ?>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($gaji as $gj) :

                                        ?>

                                            <tr>
                                                <td align="center"><?php echo ++$start; ?></td>
                                                <td><?php echo $gj['bulan'];
                                                    echo ' ';
                                                    echo $gj['tahun']; ?></td>


                                                <td align="center">Rp. <?php echo $gj['gaji']; ?></td>
                                                <td align="center"><?php echo $gj['tgl_pembayaran']; ?></td>
                                                <?php if ($role_id == 3) { ?>
                                                    <td align="center">
                                                        <?php echo anchor('Gaji/gaji_update/' . $gj['id_gaji'], '<div class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit p-1" style="color:white;" title="Update Gaji"></i></div>'); ?>
                                                        <label onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                            <?php echo anchor('Gaji/gaji_hapus_proses/' . $gj['id_gaji'], '<div class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash-alt p-1" style="color:white;" title="Hapus Gaji"></i></div>'); ?>
                                                        </label>
                                                    </td>
                                                <?php } ?>

                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                                <div class="modal fade" id="modal-info">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-success">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Info Pembayaran</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Terbayar tanggal 12/01/2020</p>
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