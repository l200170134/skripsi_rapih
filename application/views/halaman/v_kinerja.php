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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('leader/Leader') ?>">Home</a></li>
                        <!--               <li class="breadcrumb-item"><a href="leader_monitoring.php">Monitoring</a></li>
              <li class="breadcrumb-item"><a href="leader_monitoring_daily.php">Daily</a></li> -->
                        <li class="breadcrumb-item active">Kinerja</li>
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
                            <h3 class="card-title">Evaluasi Kinerja Karyawan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p>Divisi <span class="badge badge-success">MARKETING</span></p>
                            <!-- <form role="form"> -->
                            <?php echo form_open('leader/Leader/kinerja_search') ?>
                            <div class="row">
                                <div class="col-lg-2 mb-3">
                                    <select name="" class="form-control">
                                        <option value="">Pilih Bulan</option>
                                        <option value="1">Januari</option>
                                        <option value="2">Februari</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 mb-3">
                                    <select class="form-control">
                                        <option value="">Pilih Tahun</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 mb-3">
                                    <select name="keyword" class="form-control">
                                        <option value="">Pilih Karyawan</option>
                                        <option value="norhadi">norhadi</option>

                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                    <?php echo form_close() ?>
                                    <a href="<?php echo base_url('leader/Leader/kinerja_form') ?>" class="btn btn-success">Evaluasi</a>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-plus"></i> KPI
                                    </button>
                                </div>
                            </div>
                            <!-- </form> -->
                            <div class="bungkus p-0" style="overflow: scroll;">
                                <table class="table table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                    <thead>
                                        <tr align="center">
                                            <th width="50px">No</th>
                                            <th width="200px">Nama</th>
                                            <th width="200px">Periode</th>
                                            <th width="100px">Point</th>
                                            <th width="200px">Keterangan</th>
                                            <th width="100px" colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody align="center">
                                        <?php
                                        $no = 1;
                                        foreach ($kinerja as $kj) : ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $kj->nama_karyawan ?></td>
                                                <td>
                                                    <?php
                                                    $bulan = $kj->bulan;
                                                    if ($bulan == ' 1 ') {
                                                        echo "Januari";
                                                    } else if ($bulan == ' 2 ') {
                                                        echo "Februari";
                                                    } else if ($bulan == ' 3 ') {
                                                        echo "Maret";
                                                    } else if ($bulan == ' 4 ') {
                                                        echo "April";
                                                    } else if ($bulan == ' 5 ') {
                                                        echo "Mei";
                                                    } else if ($bulan == ' 6 ') {
                                                        echo "Juni";
                                                    } else if ($bulan == ' 7 ') {
                                                        echo "Juli";
                                                    } else if ($bulan == ' 8 ') {
                                                        echo "Agustus";
                                                    } else if ($bulan == ' 9 ') {
                                                        echo "September";
                                                    } else if ($bulan == ' 10 ') {
                                                        echo "Oktober";
                                                    } else if ($bulan == ' 11 ') {
                                                        echo "November";
                                                    } else if ($bulan == ' 12 ') {
                                                        echo "Desember";
                                                    }
                                                    ?>

                                                    <?php echo $kj->tahun ?>
                                                </td>
                                                <td>
                                                    <?php echo $kj->point ?></td>
                                                <!-- <?php echo ($kj->hrd_1 + $kj->hrd_2) / 2; ?> -->
                                                </td>
                                                <td>
                                                    <?php
                                                    $point_ket = $kj->point;
                                                    if ($point_ket >= 1 && $point_ket <= 3) {
                                                        echo "<span class='badge badge-danger'>Buruk</span>";
                                                    } else if ($point_ket >= 3.1 && $point_ket <= 3.7) {
                                                        echo "<span class='badge badge-warning'>Cukup Baik</span>";
                                                    } else if ($point_ket >= 3.8 && $point_ket <= 4.4) {
                                                        echo "<span class='badge badge-success'>Baik</span>";
                                                    } else if ($point_ket >= 4.5 && $point_ket <= 5) {
                                                        echo "<span class='badge badge-success'>Sangat Baik</span>";
                                                    }
                                                    ?>

                                                </td>
                                                <td align="center">
                                                    <?php echo anchor('leader/Leader/kinerja_update/' . $kj->id, '<div class="btn btn-warning"><i class="fas fa-edit" style="color:white;"></i></div>'); ?></td>
                                                <td align="center" onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                                                    <?php echo anchor('leader/Leader/kinerja_proses_hapus/' . $kj->id, '<div class="btn btn-danger ml-2"><i class="fas fa-trash"></i></div>'); ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
        <!-- Button trigger modal -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Key Performance Index</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <select class="form-control">
                            <option>Pilih Divisi</option>
                            <option value="ma">Marketing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value="" readonly></input>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Masukkan Kriteria KPI" class="form-control"></input>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModa2" data-dismiss="modal">
                    List KPI
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Key Performance Index</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="bungkus p-0" style="overflow: scroll;">
                    <table class="table table-hover" style="table-layout: fixed; word-wrap: break-word;">
                        <thead class="">
                            <tr align="center">
                                <th width="50px">No</th>
                                <th width="100px">Divisi</th>
                                <th width="70px">Kode</th>
                                <th width="200px">Kriteria</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>