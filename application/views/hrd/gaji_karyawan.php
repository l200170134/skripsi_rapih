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
              <li class="breadcrumb-item active"><a href="<?php echo base_url('hrd/Hrd/index')?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url('hrd/Hrd/data_karyawan')?>">Divisi</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url('hrd/Hrd/detail_karyawan')?>">Karyawan</a></li>
              <li class="breadcrumb-item">Gaji</li>
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
                <h3 class="card-title">Riwayat Gaji Nama Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table>
                    <tr>
                        <td class="pr-2 pb-3"><a href="<?php echo base_url('hrd/Hrd/input_gaji_karyawan')?>" class="btn btn-block btn-md btn-success" >Masukkan Gaji</a></td>
                    </tr>
                </table>
                <div class="bungkus" style="overflow: scroll;">
                  <table class="table table-bordered table-hover">
                    <thead>                  
                      <tr align="center">
                        <th align="center">Bulan</th>
                        <th align="center">Tahun</th>
                        <th align="center">Gaji Pokok</th>
                        <th align="center">Denda Telat</th>
                        <th align="center">Denda Lain</th>
                        <th align="center">Bonus</th>
                        <th align="center">Gaji Akhir</th>
                        <th align="center">Status</th>
                        <th>Aksi</th>
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
                          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-info">
                              Terbayar
                          </button>
                        </td>
                        <td align="center">
                          <div class="btn-group">
                          <a href="<?php echo base_url('hrd/Hrd/edit_gaji_karyawan')?>" class="btn btn-warning btn-sm"  title="Edit"><i class="fas fa-edit" style="color:white;"></i></a>
                          <a href="" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm"  title="Hapus"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                      <tr align="center">
                        <td align="center">Februari</td>
                        <td align="center">2020</td>
                        <td align="center">Rp.4.500.000</td>
                        <td align="center">Rp.0</td>
                        <td align="center">Rp.0</td>
                        <td align="center">Rp.0</td>
                        <td align="center">Rp.4.500.000</td>
                        <td align="center">
                          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-info">
                              Terbayar
                          </button>
                        </td>
                        <td align="center">
                          <div class="btn-group">
                          <a href="<?php echo base_url('hrd/Hrd/edit_gaji_karyawan')?>" class="btn btn-warning btn-sm"  title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                          <a href="" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm"  title="Hapus"><i class="fas fa-trash"></i></a>
                          </div>
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
                          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-info">
                              Terbayar
                          </button>
                        </td>
                        <td align="center">
                          <div class="btn-group">
                          <a href="<?php echo base_url('hrd/Hrd/edit_gaji_karyawan')?>" class="btn btn-warning btn-sm"  title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                          <a href="" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm"  title="Hapus"><i class="fas fa-trash"></i></a>
                          </div>
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
                        <td align="center">
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-update">
                              Belum Terbayar
                          </button>
                        </td>
                        <td align="center">
                          <div class="btn-group">
                          <a href="<?php echo base_url('hrd/Hrd/edit_gaji_karyawan')?>" class="btn btn-warning btn-sm"  title="Update"><i class="fas fa-edit" style="color:white;"></i></a>
                          <a href="" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger btn-sm"  title="Hapus"><i class="fas fa-trash"></i></a>
                          </div>
                        </td>
                      </tr>
                    <tbody>
                    </tbody>
                  </table>
                </div>

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

                <div class="modal fade" id="modal-update">
                    <div class="modal-dialog">
                        <div class="modal-content bg-danger">
                            <div class="modal-header">
                            <h4 class="modal-title">Update Status Pembayaran</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                            <p>Klik Update apabila gaji sudah dibayarkan !!</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Update</button>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->