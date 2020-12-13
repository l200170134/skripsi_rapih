<?php
$link = $this->session->userdata('link');
$level_akses = $this->session->userdata('role_id');
$id_divisi = $this->session->userdata('divisi_page');
//$role_id = $this->session->userdata('role_id');
//$id_divisi = $this->session->userdata('divisi_page');
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
                            <?php 
                                if($level_akses==4){ ?>
                                    <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' .$id_divisi); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
                                    <h5 style="display:inline;">Monitoring</h5>
                                <?php
                                }else{ ?>
                                    <h5 style="display:inline;">Monitoring</h5>     
                            <?php        
                                }
                             ?>
                            
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
                                        <th width="150px">Monitoring</th>
                                        <th width="50px"><i class="fas fa-bell"></i></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $a = 1;
                                    foreach ($list_user as $ls) :
                                    ?>
                                        <tr>
                                            <td class="p-2" align="center"><?php echo ++$start; ?></td>
                                            <td class="p-2" align="center">
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
                                            <td class="p-2" align="center">
                                                <div class="form-group">
                                                    <div class="col-lg-6 col-md-3">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <?php echo anchor('Monitoring/monitoring_daily/' . $ls['nip'], '<div class="btn btn-success btn-sm">Today</div>'); ?>
                                                            </div>
                                                            <div class="col-6">
                                                                <a href="<?php echo base_url('Monitoring/monitoring_report/' . $ls['nip']) ?>" class="btn btn-primary btn-sm">Report</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td align="center">
                                                <?php
                                                    $pending = $this->db->query(" SELECT * FROM tb_ldr_daily WHERE  nip = '$get' AND status ='Pending'")->num_rows(); ?>
                                                <?php if ($pending==''){ ?>
                                                    <label class="bg-success pl-2 pr-2 rounded-circle"><?php echo $pending; ?></label>
                                                <?php } else { ?>
                                                    <label class="bg-danger pl-2 pr-2 rounded-circle"><?php echo $pending; ?></label>
                                                <?php 
                                                    }
                                                ?>
                                            </td>
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