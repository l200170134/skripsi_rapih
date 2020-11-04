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
              <li class="breadcrumb-item"><a href="<?php echo base_url('karyawan/Karyawan') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daily Activity</li>
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
                <h3 class="card-title">Daily Activity</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table>
                  <tr>
                    <td class="pr-2"><a href="<?php echo base_url('karyawan/Karyawan/daily_form') ?>" class="btn btn-block btn-sm btn-success" style="width: 100px;">New Task</a></td>
                    <td><a href="<?php echo base_url('karyawan/Karyawan/daily_report') ?>" class="btn btn-block btn-sm btn-primary" style="width: 100px;">Report</a></td>
                  </tr>
                </table>

                <br>
                <div class="bungkus p-0" style="overflow: scroll;">
                  <table class="table table-hover" style="table-layout: fixed; word-wrap: break-word;">
                    <thead class="">
                      <tr align="center">
                        <th width="50px">No</th>
                        <th width="250px">Aktivitas</th>
                        <th width="70px" align="center">Hasil</th>
                        <th width="250px">Catatan</th>
                        <th width="250px">Evaluasi</th>

                        <th width="80px">Status</th>
                        <th width="80px">Urgensi</th>
                        <th width="120px" colspan="2">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php  
                      $no =1;
                      foreach ($daily as $dy): ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $dy->aktivitas ?></td>
                        <td>
                          <?php echo ($dy->hasil == 'Belum' ? '<span class="badge badge-danger">Belum</span>' : ''); ?>
                          <?php echo ($dy->hasil == 'Proses' ? '<span class="badge badge-primary">Proses</span>' : ''); ?>
                          <?php echo ($dy->hasil == 'Selesai' ? '<span class="badge badge-success">Selesai</span>' : ''); ?>
                        </td>
                        <td><?php echo $dy->catatan ?></td>
                        <td><?php echo $dy->evaluasi ?></td>
                        <td>
                          <?php echo ($dy->status == 'Pending' ? '<span class="badge badge-danger">Pending</span>' : ''); ?>
                          <?php echo ($dy->status == 'Approve' ? '<span class="badge badge-success">Approve</span>' : ''); ?>
                        </td>
                        <td><span class="badge badge-warning" style="color:white;"><?php echo $dy->urgensi ?></span></td>
                        <td align="center" onclick="javascript: return confirm('Anda yakin ingin menghapus')">
                          <?php  echo anchor('karyawan/Karyawan/daily_proses_hapus/'.$dy->id, '<div class="btn btn-danger ml-2"><i class="fas fa-trash"></i></div>'); ?>
                        </td>
                        <td align="center">
                          <?php  echo anchor('karyawan/Karyawan/daily_update/'.$dy->id,'<div class="btn btn-warning"><i class="fas fa-edit" style="color:white;"></i></div>'); ?>
                        </td>
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
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->