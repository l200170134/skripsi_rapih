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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Data_karyawan') ?>">Divisi</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Data_karyawan/detail_karyawan') ?>">Karyawan</a></li>
                        <li class="breadcrumb-item">Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <?php foreach($update as $ud) :?>
        <form role="form" action="<?php echo base_url('Data_karyawan/detail_karyawan_update'); ?>" method="post">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form Update Data Karyawan</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->

                            <div class="card-body">
                                <input type="hidden" name="id_user" value="<?php echo $ud->id_user; ?>">
                                <div class="row">
                                    <!-- form bagian kiri -->
                                    <div class="col-lg-6 col-12 pl-3 pr-3">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $ud->nama; ?>" >
                                        </div>
                                        <div class="form-group">
                                        <label for="nama">Tempat, Tanggal Lahir</label>
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $ud->tempat_lahir; ?>">
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $ud->tgl_lahir; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control" name="nip" value="<?php echo $ud->nip; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Divisi</label>
                                            <select name="id_divisi" class="form-control">
                                                <?php 
                                                    $id_divisi = $ud->id_divisi;
                                                    $divisi= $this->db->get('tb_divisi')->result_array();
                                                    foreach ($divisi as $div):
                                                        if($div['id_divisi']==$id_divisi){ ?>
                                                            <option value="<?php echo $ud->id_divisi; ?>" selected><?php echo $div['divisi']; ?></option>
                                                        <?php 
                                                            } else { ?>
                                                             <option value="<?php echo $ud->id_divisi; ?>"><?php echo $div['divisi']; ?></option>
                                                        <?php
                                                            }
                                                        ?>   
                                                ?>

                                                
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label>Jabatan</label>                                                                 
                                            <select class="form-control" name="jabatan">
                                                <option value="Staff"<?php echo ($ud->jabatan == 'Staff' ? ' selected' : ''); ?>>Staff</option>
                                                <option value="Asisten Manajer"<?php echo ($ud->jabatan == 'Asisten Manajer' ? ' selected' : ''); ?>>Asisten Manajer</option>
                                                <option value="Manajer"<?php echo ($ud->jabatan == 'Manajer' ? ' selected' : ''); ?>>Manajer</option>
                                                <option value="Direksi"<?php echo ($ud->jabatan == 'Direksi' ? ' selected' : ''); ?>>Direksi</option>
                                            </select>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No. HP</label>
                                            <input type="text" class="form-control" name="no_hp" value="<?php echo $ud->no_hp; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_keluarga">No. HP Keluarga</label>
                                            <input type="text" class="form-control" name="no_hp_kel" value="<?php echo $ud->no_hp_kel; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="rekening">Bank</label>
                                            <select name="bank" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="BNI">BNI</option>
                                                <option value="BRI">BRI</option>
                                                <option value="MANDIRI">MANDIRI</option>
                                                <option value="PERMATA">PERMATA</option>
                                                <option value="BANK JATENG">BANK JATENG</option>
                                                <option value="BCA">BCA</option>
                                            </select>
                                        </div>                   
                                        <div class="form-group">
                                            <label for="rekening">No. Rekening</label>
                                            <input type="text" class="form-control" name="no_rek" placeholder="Masukkan Nomor Rekening Anda">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $ud->email; ?>">
                                        </div>

                                    </div>
                                    <!-- End form bagian kiri -->

                                    <!-- form bagian kanan -->
                                    
                                    <div class="col-lg-6 col-12 pl-3 pr-3">
                                        <div class="form-group">
                                            <label for="npwp">NPWP</label>
                                            <input type="text" class="form-control" name="npwp" value="<?php echo $ud->tempat_lahir; ?>">
                                        </div>
                                         <div class="form-group">
                                            <label for="ttl">Perusahaan</label>
                                            <select name="perusahaan" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="PT. Sinar Grafindo">PT. Sinar Grafindo</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Office</label>
                                            <select name="office" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                <option value="Bandung">Bandung</option>
                                                <option value="Tangerang">Tangerang</option>
                                                <option value="Solo">Solo</option>
                                                <option value="Surabaya">Surabaya</option>
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
                                        <div class="form-group pb-2">
                                            <div class="row">
                                                <div class="col-lg-4 col-12">
                                                    <label>Status Karyawan</label>
                                                    <select class="form-control">
                                                        <option>-- Pilih --</option>
                                                        <option>PKWT</option>
                                                        <option>PKWTT</option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <p class="mb-2">Tanggal Mulai</p>
                                                    <input type="date" class="form-control" name="">
                                                </div>
                                                <div class="col-lg-4 col-12">
                                                    <p class="mb-2">Tanggal Akhir</p>
                                                    <input type="date" class="form-control" name="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Tinggal</label>
                                            <textarea class="form-control" rows="2" value="<?php echo $ud->alamat; ?>" name="alamat"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat di KTP</label>
                                            <textarea class="form-control" rows="2" value="<?php echo $ud->alamat_ktp; ?>" name="alamat_ktp"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="upload_foto">Upload Foto</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="">
                                                    <label class="custom-file-label" for="upload_foto">Choose file</label>
                                                </div>
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
                                            <input type="text" class="form-control" name="username" value="<?php echo $ud->username; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Password</label>
                                            <input type="password" class="form-control" name="password" value="<?php echo $ud->password; ?>">
                                        </div>
                                    </div>
                                    <!-- End New Left Colum -->

                                    <div class="col-lg-6 col-12 pl-3 pr-3">
                                        <div class="form-group">
                                            <label for="ttl">Hak Akses</label>
                                            <select class="form-control" name="role_id">
                                                <option>Pilih Hak Akses</option>
                                                <option value="1">Karyawan</option>
                                                <option value="2">Leader</option>
                                                <option value="3">HRD</option>
                                                <option value="4">Direksi</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Aktivasi</label>
                                            <select class="form-control" name="is_active">
                                                <option>Pilih Aktivasi</option>
                                                <option value="1">Aktiv</option>
                                                <option value="0">Tidak Aktiv</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End New Left Colum -->
                                </div>
                                <!-- End Row -->

                                <div class="card-footer d-flex justify-content-center m-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="submit" class="btn btn-secondary ml-2">Cancel</button>
                                </div>
                                <!--             </form>  -->
                            </div>
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
        </form>
        <?php endforeach; ?>  
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper