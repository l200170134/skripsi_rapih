<?php
$link = $this->session->userdata('link');
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
                            <h3 class="card-title">Kinerja (Key Performance Index)</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="bungkus p-0 mb-2 col-lg-12 col-md-12" style="overflow: scroll;">
                                <table class="table table-hover table-md" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead class="bg-secondary">
                                        <tr align="center">
                                            <th width="50px">No</th>
                                            <th width="100px">Foto</th>
                                            <th width="200px">Nama Lengkap</th>
                                            <th width="150px">Nilai KPI</th>
                                            <th width="50px"><i class="fas fa-check-circle"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = 1;
                                        foreach ($list_user as $ls) :
                                        ?>
                                        <tr>
                                            <td align="center" class="p-2"><?php echo $a++; ?></td>
                                            <td align="center" class="p-2">
                                                <img src="<?php echo base_url(); ?>assets/image/<?php echo $ls['image']; ?>" class="rounded" width="30%">
                                            </td>
                                            <td class="p-2">
                                                <?php 
                                                    echo $ls['nama'];
                                                    $get =  $ls['nip'];
                                                    $nip = $this->db->get_where('user', ['nip' => $get])->row_array();
                                                ?><br>
                                                <label style="font-size:15px;" class="font-italic text-primary">
                                                    <?php echo $nip['jabatan']; ?>    
                                                </label>      
                                            </td>
                                            <td align="center">
                                                <a href="<?php echo base_url('Evaluasi/kpivalue/' . $ls['nip']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye p-1" style="color:white;" title="Tambah Data"></i></a>
                                            </td>
                                            <td class="p-2" align="center">
                                                <?php 
                                                    $nip= $ls['nip'];
                                                    $kpi_value= $this->db->query("SELECT AVG(value) FROM tb_kpi_value as rata WHERE nip = '$nip'")->row_array();
                                                    foreach ($kpi_value as $kpi) :

                                                            if ($kpi == '') {
                                                                echo '0';
                                                            } else {
                                                                echo round($kpi, 2);
                                                            }
                                                        endforeach;
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        endforeach;
                                        ?>

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