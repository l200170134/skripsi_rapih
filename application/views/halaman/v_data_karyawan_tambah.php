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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <!-- <form role="form" action="<?php //echo base_url('Data_karyawan/detail_karyawan_tambah'); 
                                        ?>" method="post"> -->
        <?php echo form_open_multipart('Data_karyawan/detail_karyawan_tambah'); ?>
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Input Data Karyawan</h3>



                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="row">
                                <!-- form bagian kiri -->
                                <div class="col-lg-6 col-12 pl-3 pr-3">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Tempat, Tanggal Lahir</label>
                                        <div class="row">
                                            <div class="col-lg-6 col-12">
                                                <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir">
                                            </div>
                                            <div class="col-lg-6 col-12">
                                                <input type="date" class="form-control" name="tgl_lahir" value="<?php echo date("d-m-Y") ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Jenis Kelamin</label>
                                        <select class="form-control" name="jk">
                                            <option>-- Pilih --</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <input type="text" class="form-control" name="nip" placeholder="Masukkan Nomor Induk Pegawai">
                                    </div>
                                    <div class="form-group">
                                        <label>Divisi</label>
                                        <select class="form-control" name="id_divisi">
                                            <?php foreach ($nama_divisi as $nd) : ?>
                                                <option value="<?php echo $nd['id_divisi'] ?>"><?php echo $nd['divisi'] ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan</label>
                                        <select class="form-control" name="jabatan">
                                            <option>--Pilih--</option>
                                            <?php
                                            $jabatan = $this->db->get('tb_jabatan')->result_array();
                                            foreach ($jabatan as $jb) :
                                            ?>
                                                <option value="<?php echo $jb['jabatan']; ?>"><?php echo $jb['jabatan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No. HP</label>
                                        <input type="text" class="form-control" name="no_hp" placeholder="Masukkan Nomor HP ">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_keluarga">No. HP Keluarga</label>
                                        <input type="text" class="form-control" name="no_hp_kel" placeholder="Masukkan Nomor HP Keluarga ">
                                    </div>
                                    <div class="form-group">
                                        <label for="rekening">Bank</label>
                                        <select name="bank" class="form-control">
                                            <option>-Pilih--</option>
                                            <?php
                                            $bank = $this->db->get('tb_bank')->result_array();
                                            foreach ($bank as $bk) : ?>
                                                <option value="<?php echo $bk['bank']; ?>"><?php echo $bk['bank']; ?></option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="rekening">No. Rekening</label>
                                        <input type="text" class="form-control" name="no_rek" placeholder="Masukkan Nomor Rekening ">
                                    </div>
                                </div>
                                <!-- End form bagian kiri -->

                                <!-- form bagian kanan -->
                                <div class="col-lg-6 col-12 pl-3 pr-3">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Masukkan Alamat Email ">
                                    </div>
                                    <div class="form-group">
                                        <label for="npwp">NIK</label>
                                        <input type="text" class="form-control" name="nik" placeholder="Masukkan Nomor NPWP ">
                                    </div>
                                    <div class="form-group">
                                        <label for="npwp">NPWP</label>
                                        <input type="text" class="form-control" name="npwp" placeholder="Masukkan Nomor NPWP ">
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Perusahaan</label>
                                        <select name="perusahaan" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <?php
                                            $perusahaan = $this->db->get('tb_perusahaan')->result_array();
                                            foreach ($perusahaan as $ph) :
                                            ?>
                                                <option value="<?php echo $ph['perusahaan']; ?>"><?php echo $ph['perusahaan']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Office</label>
                                        <select name="office" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <?php
                                            $office = $this->db->get('tb_office')->result_array();
                                            foreach ($office as $of) :
                                            ?>
                                                <option value="<?php echo $of['office']; ?>"><?php echo $of['office']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Status Pernikahan</label>
                                        <select class="form-control" name="pernikahan">
                                            <option>-- Pilih --</option>
                                            <option>Menikah</option>
                                            <option>Belum Menikah</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Tinggal</label>
                                        <textarea class="form-control" rows="2" placeholder="Masukkan Alamat Tinggal Sekarang" name="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat di KTP</label>
                                        <textarea class="form-control" rows="2" placeholder="Masukkan Alamat Tinggal Sesuai KTP" name="alamat_ktp"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="upload_foto">Upload Foto</label>
                                        <div class="input-group">

                                            <input type="file" class="form-control custom-file-label" name="image">
                                            <!-- <label class="custom-file-label" for="upload_foto">Choose file</label> -->

                                        </div>
                                    </div>
                                </div>
                                <!-- end form bagian kanan -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- New Card -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Form User Access</h3>
                        </div>
                        <!-- New Card Body -->
                        <div class="card-body">
                            <!-- New Row -->
                            <div class="row">
                                <!-- New Left Coloum -->
                                <div class="col-lg-6 col-12 pl-3 pr-3">
                                    <div class="form-group">
                                        <label for="ttl">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username Setiap Individu Wajib Beda">
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                                    </div>
                                </div>
                                <!-- End New Left Colum -->

                                <div class="col-lg-6 col-12 pl-3 pr-3">
                                    <div class="form-group">
                                        <label for="ttl">Hak Akses</label>
                                        <select class="form-control" name="role_id">
                                            <option>-- Pilih --</option>
                                            <?php foreach ($role as $ro) : ?>
                                                <option value="<?php echo $ro->id_role; ?>"><?php echo $ro->nama_role; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="ttl">Aktivasi</label>
                                        <select class="form-control" name="is_active">
                                            <option>-- Pilih --</option>
                                            <option value="1">Aktiv</option>
                                            <option value="0">Tidak Aktiv</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- End New Left Colum -->
                            </div>
                            <!-- End Row -->
                        </div>

                            <div class="card-footer d-flex justify-content-center m-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $id_divisi) ?>" class="btn btn-secondary ml-2">Kembali</a>

                            </div>
                            <!--             </form>  -->
                        
                        <!-- End New Card Body -->
                    </div>
                    <!--  End New Card -->
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        <!-- </form> -->
        <?php echo form_close(); ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper