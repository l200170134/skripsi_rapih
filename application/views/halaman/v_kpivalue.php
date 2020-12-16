<?php
$role_id  = $this->session->userdata('role_id');
$link = $this->session->userdata('link_kar');
$id_divisi = $this->session->userdata('divisi_page');
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
                            if ($role_id == 4) { ?>
                                <a href="<?php echo base_url('Evaluasi/index_direksi/' . $id_divisi); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                <h5 style="display:inline;">Key Performance Index Karyawan</h5>
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
                            } elseif ($role_id == 3) {
                            ?>
                                <div class="col-12 col-lg-6">
                                    <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $user_data['id_divisi'] . '/' . $link); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
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
                                            <?php echo anchor('Evaluasi/kpivalue_form/' . $user_data['nip'], '<div class="btn btn-block btn-md btn-success mb-2 ml-2">Tambahkan Index</div>'); ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="col-12">
                                <?php
                                echo $this->session->flashdata('tambahKpi');
                                echo $this->session->flashdata('hapusKpi');
                                ?>
                            </div>

                            <!-- end percobaan -->
                            <div class="col-lg-12 col-md-6" style="overflow: scroll;">
                                <table class="table table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>

                                        <tr class="bg-secondary" align="center">
                                            <th width="50px">No</th>
                                            <th width="150px">Periode</th>
                                            <th width="150px">Nilai KPI</th>
                                            <th width="200px">Keterangan</th>
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
                                        <?php
                                        foreach ($value as $bu) : ?>
                                            <tr align="center">
                                                <td><?php echo ++$start; ?></td>
                                                <td>
                                                    <?php
                                                    //echo $bu['bulan'] . ' ' . $bu['tahun'];
                                                    $get_id = $bu['bulan'];
                                                    $bulan = $this->db->get_where('tb_bulan', ['id_bulan' => $get_id])->result_array();
                                                    foreach ($bulan as $nama) :
                                                        echo $nama['bulan'] . ' ' . $bu['tahun'];
                                                    endforeach;
                                                    ?>
                                                </td>
                                                <?php if (round($bu['rata'], 2) >= 4.0) {
                                                ?>
                                                    <td><span class="badge badge-success"><?php echo round($bu['rata'], 2); ?></span></td>
                                                <?php } else if (round($bu['rata'], 2) >= 3.0) { ?>
                                                    <td><span class="badge badge-info"><?php echo round($bu['rata'], 2); ?></span></td>
                                                <?php } else if (round($bu['rata'], 2) >= 2.0) { ?>
                                                    <td><span class="badge badge-warning"><?php echo round($bu['rata'], 2); ?></span></td>
                                                <?php } else if (round($bu['rata'], 2) >= 1.0) { ?>
                                                    <td><span class="badge badge-danger"><?php echo round($bu['rata'], 2); ?></span></td>
                                                <?php } else { ?>
                                                    <td><span class="badge badge-danger"><?php echo round($bu['rata'], 2); ?></span></td>
                                                <?php } ?>
                                                <td>
                                                    <?php if ($bu['rata'] >= 4) {
                                                        echo "Kinerja Sangat Memuaskan";
                                                    } elseif ($bu['rata'] >= 3) {
                                                        echo "Kinerja Memuaskan";
                                                    } elseif ($bu['rata'] >= 2) {
                                                        echo "Kinerja Cukup Memuaskan";
                                                    } else {
                                                        echo "Kinerja Tidak Memuaskan";
                                                    }
                                                    ?>
                                                </td>
                                                <?php
                                                if ($role_id != 2) {
                                                } else {
                                                ?>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal-<?= $bu['bulan'] ?>-<?= $bu['tahun'] ?>"><i class="fas fa-eye p-1" style="color:white;" title="Lihat"></i></button>
                                                        <label onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                            <?php echo anchor('Evaluasi/kpivalue_hapus_proses/' . $bu['nip'] . '/' . $bu['bulan'] . '/' . $bu['tahun'], '<div class="btn btn-block btn-sm btn-danger"><i class="fas fa-trash-alt p-1" style="color:white;" title="Hapus"></i></div>'); ?>
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
                            <div class="col-12 mt-2">
                                <div class="d-flex justify-content-center">
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
                    <?php
                    $id_bulan = $modal['bulan'];
                    $bulan = $this->db->get_where('tb_bulan', ['id_bulan' => $id_bulan])->row_array();

                    ?>
                    <?= $bulan['bulan'] ?> <?= $modal['tahun'] ?>
                    <table style="table-layout: fixed; word-wrap: break-word;" class="table table-hover">
                        <thead class="bg-secondary">
                            <tr>
                                <th>KPI</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $id_divisi = $user_data['id_divisi'];
                            $kpi_data = $this->db->get_where('tb_kpi', ['id_divisi' => $id_divisi])->result_array();
                            // var_dump($kpi_data);
                            foreach ($kpi_data as $kp) : ?>
                                <?php
                                $nip    = $bu['nip'];
                                $kpiFK  = $kp['id_pertanyaan'];
                                $bulan  = $modal['bulan'];
                                $tahun  = $modal['tahun'];
                                $nilai  = $this->db->get_where('tb_kpi_value', ['nip' => $nip, 'bulan' => $bulan, 'tahun' => $tahun, 'kpiFK' => $kpiFK])->result_array();
                                // var_dump($nilai);
                                foreach ($nilai as $nil) : ?>
                                    <tr>
                                        <td>
                                            <?php echo $kp['pertanyaan']; ?>
                                        </td>

                                        <td>
                                            <?php echo $nil['value']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
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