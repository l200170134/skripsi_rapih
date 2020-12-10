<?php
$role_id  = $this->session->userdata('role_id');
$link = $this->session->userdata('link_kar');
?>
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
                            <?php
                            $role_id = $this->session->userdata('role_id');
                            if ($back == 1) {
                            ?>
                                <div class="col-12 col-lg-6">
                                    <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $user['id_divisi'] . '/' . $link); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                    <h5 style="display:inline;">Key Performance Index Karyawan</h5>
                                </div>
                            <?php
                            } elseif ($role_id == 2) {
                            ?>
                                <div class="col-12 col-lg-6">
                                    <a href="<?php echo base_url('Evaluasi'); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                    <h5 style="display:inline;">Key Performance Index Karyawan</h5>
                                </div>
                                <!-- <?php
                                        ?> -->
                            <?php
                            } else {
                            ?>
                                <h5 style="display:inline;">Key Performance Index Karyawan</h5>
                            <?php
                            } ?>

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
                                                <td><?php echo round($bu['rata'], 2); ?>/5</td>



                                                <!-- Tombol Aksi -->
                                                <?php
                                                if ($role_id != 2) {
                                                } else {
                                                ?>
                                                    <td>
                                                        <label onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                            <?php echo anchor('Evaluasi/kpivalue_hapus_proses/' . $bu['nip'] . '/' . $bu['bulan'] . '/' . $bu['tahun'], '<div class="btn btn-block btn-md btn-danger"><i class="fas fa-trash-alt p-1" style="color:white;" title="Kembali"></i></div>'); ?>
                                                        </label>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-<?= $bu['bulan'] ?>-<?= $bu['tahun'] ?>"><i class="fas fa-eye p-1" style="color:white;" title="Kembali"></i></button>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-start m-2">
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
<!-- /.content-wrapper -->

<!-- Button trigger modal -->

<?php
foreach ($value as $modal) : ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal-<?= $modal['bulan'] ?>-<?= $modal['tahun'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rincian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= $modal['bulan'] ?> <?= $modal['tahun'] ?>
                    <table style="table-layout: fixed; word-wrap: break-word;" class="table table-hover">
                        <thead class="bg-secondary">
                            <tr>
                                <?php
                                $id_divisi = $user['id_divisi'];
                                $kpi = $this->db->get_where('tb_kpi', ['id_divisi' => $id_divisi])->result_array();
                                foreach ($kpi as $kp) :
                                ?>
                                    <th><?php echo $kp['pertanyaan']; ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $nip = $bu['nip'];
                                $bulan = $bu['bulan'];
                                $tahun = $bu['tahun'];
                                $nilai = $this->db->get_where('tb_kpi_value', ['nip' => $nip, 'bulan' => $bulan, 'tahun' => $tahun])->result_array();
                                foreach ($nilai as $nil) :
                                ?>
                                    <td><?php echo $nil['value']; ?></td>
                                <?php endforeach; ?>
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
<?php
endforeach;
?>