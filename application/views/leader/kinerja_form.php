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
              <li class="breadcrumb-item"><a href="<?php echo base_url('leader/Leader/kinerja') ?>">Kinerja</a></li>
              <li class="breadcrumb-item active">Form</li>
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
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Evaluasi Kinerja Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <form role="form" method="post" action="<?php echo base_url('leader/Leader/kinerja_proses_tambah') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                      <input name="nip" type="text" class="form-control" value="0" hidden>

                        <p class="text-sm">Nama Karyawan</p>
                        <select name="hasil" class="form-control">
                          <option value="">Pilih Karyawan</option>
                          <option>Norhadi</option>
                          <option>Hafid Al Afaf</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <p class="text-sm">Bulan</p>
                        <input name="bulan" type="text" class="form-control" value=" <?php echo date("m") ?> " readonly>
                      </div>
                      <div class="form-group">
                        <p class="text-sm">Tahun</p>
                        <input name="tahun" type="text" class="form-control" value=" <?php echo date("Y") ?> " readonly>
                      </div>
                      <div class="form-group">
                        <p class="text-sm">Point Akhir</p>


                      </div>
                      <div class="form-group">
                        <p class="text-sm">Keterangan</p>
                        <input name="ket" type="text" class="form-control" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      
                      <div class="form-group">
                        <p class="text-sm">HRD(01):</p>
                        <select name="hrd_1" class="form-control" required>
                          <option>Point</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <p class="text-sm">HRD(02):</p>
                        <select name="hrd_2" class="form-control" required>
                          <option>Point</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <p class="text-sm">MA(01):</p>
                        <select name="ma_1" class="form-control" required>
                          <option>Point</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <p class="text-sm">MA(02):</p>
                        <select name="ma_2" class="form-control" required>
                          <option>Point</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <p class="text-sm">MA(03):</p>
                        <select name="ma_3" class="form-control" required>
                          <option>Point</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>

                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?php echo base_url('leader/Leader/kinerja') ?>" class="btn btn-secondary">Cancel</a>
                  </div>
              </form>
             </div>
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->