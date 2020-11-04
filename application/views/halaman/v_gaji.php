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
                        <!-- <li class="breadcrumb-item active">Dashboard</li> -->
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
                            <h5>Riwayat Gaji</h5>
                            <div class="alert alert-sm alert-success alert-dismissible m-1">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Menampilkan riwayat gaji anda setiap bulan serta status pembayaran.
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="overflow: scroll;">
                            <table class="table table-bordered table-hover" style="table-layout: fixed; word-wrap: break-word;">
                                <thead>
                                    <tr align="center">
                                        <th width="100px" align="center">Bulan</th>
                                        <th width="80px" align="center">Tahun</th>
                                        <th width="130px" align="center">Gaji Pokok</th>
                                        <th width="130px" align="center">Denda Telat</th>
                                        <th width="130px" align="center">Denda Lain</th>
                                        <th width="130px" align="center">Bonus</th>
                                        <th width="150px" align="center">Gaji Akhir</th>
                                        <th width="110px" align="center">Status</th>
                                    </tr>
                                </thead>
                                <tr align="center">
                                    <td align="center">Januari</td>
                                    <td align="center">2020</td>
                                    <td align="center">Rp.4.500.000</td>
                                    <td align="center">Rp.100.000</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.4.400.000</td>
                                    <td align="center">
                                        <button type="button" class="btn badge badge-success" data-toggle="modal" data-target="#modal-info">
                                            Terbayar
                                        </button>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center">Februari</td>
                                    <td align="center">2020</td>
                                    <td align="center">Rp.4.500.000</td>
                                    <td align="center">Rp.4.500.000</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.4.500.000</td>
                                    <td align="center">
                                        <button type="button" class="btn badge badge-success" data-toggle="modal" data-target="#modal-info">
                                            Terbayar
                                        </button>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center">Maret</td>
                                    <td align="center">2020</td>
                                    <td align="center">Rp.4.500.000</td>
                                    <td align="center">Rp.50.000</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.4.450.000</td>
                                    <td align="center">
                                        <button type="button" class="btn badge badge-success" data-toggle="modal" data-target="#modal-info">
                                            Terbayar
                                        </button>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td align="center">April</td>
                                    <td align="center">2020</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center">Rp.0</td>
                                    <td align="center"><span class="badge badge-danger">Belum</span></td>
                                </tr>
                                <tbody>
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
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->