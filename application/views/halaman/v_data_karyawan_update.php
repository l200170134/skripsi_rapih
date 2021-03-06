<?php
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
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item">Form</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row ml-2">
                <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $id_divisi . '/' . $link); ?>" class="mr-2 bg-info p-1 rounded-circle"><i class="fas fa-arrow-left p-1" style="color:#fff;display:inline;" title="Kembali"></i></a>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <?php foreach ($update as $ud) : ?>
            <!-- <form role="form" action="<?php //echo base_url('Data_karyawan/detail_karyawan_update'); 
                                            ?>" method="post"> -->
            <?php echo form_open_multipart('Data_karyawan/detail_karyawan_update/' . $ud->nip); ?>
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

                                <div class="row">
                                    <!-- form bagian kiri -->
                                    <div class="col-lg-6 col-12 pl-3 pr-3">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $ud->nama; ?>" maxlength="100">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Tempat, Tanggal Lahir</label>
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $ud->tempat_lahir; ?>" maxlength="100">
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $ud->tgl_lahir; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Jenis Kelamin</label>
                                            <select class="form-control" name="jk">
                                                <option>-- Pilih --</option>
                                                <option value="Laki-Laki" <?php echo ($ud->jk == 'Laki-Laki' ? ' selected' : ''); ?>>Laki-Laki</option>
                                                <option value="Perempuan" <?php echo ($ud->jk == 'Perempuan' ? ' selected' : ''); ?>>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>NIP</label>
                                            <input type="text" class="form-control" name="nip" value="<?php echo $ud->nip; ?>" maxlength="16">
                                        </div>
                                        <div class="form-group">
                                            <label>Divisi</label>
                                            <select name="id_divisi" class="form-control">
                                                <?php
                                                $id_divisi = $ud->id_divisi;
                                                $divisi = $this->db->get('tb_divisi')->result_array();
                                                foreach ($divisi as $div) :
                                                    if ($div['id_divisi'] == $id_divisi) { ?>
                                                        <option value="<?php echo $div['id_divisi']; ?>" selected><?php echo $div['divisi']; ?></option>
                                                    <?php
                                                    } else { ?>
                                                        <option value="<?php echo $div['id_divisi']; ?>"><?php echo $div['divisi']; ?></option>
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
                                                <?php
                                                $jabatan = $this->db->get('tb_jabatan')->result_array();
                                                foreach ($jabatan as $jb) :
                                                    if ($jb['jabatan'] == $ud->jabatan) { ?>
                                                        <option value="<?php echo $jb['jabatan']; ?>" selected><?php echo $jb['jabatan']; ?></option>
                                                    <?php } else { ?>
                                                        <option value="<?php echo $jb['jabatan']; ?>"><?php echo $jb['jabatan']; ?></option>

                                                    <?php }
                                                    ?>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No. HP</label>
                                            <input type="text" class="form-control" name="no_hp" value="<?php echo $ud->no_hp; ?>" maxlength="13">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_keluarga">No. HP Keluarga</label>
                                            <input type="text" class="form-control" name="no_hp_kel" value="<?php echo $ud->no_hp_kel; ?>" maxlength="13">
                                        </div>
                                        <div class="form-group">
                                            <label for="rekening">Bank</label>
                                            <select name="bank" class="form-control">
                                                <?php
                                                $get_bank = $ud->bank;
                                                $bank = $this->db->get('tb_bank')->result_array();
                                                foreach ($bank as $bk) :
                                                    if ($bk['bank'] == $get_bank) {
                                                ?>
                                                        <option value="<?php echo $bk['bank']; ?>" selected> <?php echo $bk['bank']; ?> </option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?php echo $bk['bank']; ?>"> <?php echo $bk['bank']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="rekening">No. Rekening</label>
                                            <input type="text" class="form-control" name="no_rek" value="<?php echo $ud->no_rek; ?>" maxlength="25">
                                        </div>
                                    </div>
                                    <!-- End form bagian kiri -->

                                    <!-- form bagian kanan -->

                                    <div class="col-lg-6 col-12 pl-3 pr-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $ud->email; ?>" maxlength="128">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwp">NIK</label>
                                            <input type="text" class="form-control" name="nik" value="<?php echo $ud->nik; ?>" maxlength="17">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwp">NPWP</label>
                                            <input type="text" class="form-control" name="npwp" value="<?php echo $ud->npwp; ?>" maxlength="20">
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Perusahaan</label>
                                            <select name="perusahaan" class="form-control">

                                                <?php
                                                $get_perusahaan = $ud->perusahaan;
                                                $perusahaan = $this->db->get('tb_perusahaan')->result_array();
                                                foreach ($perusahaan as $ph) :
                                                    if ($ph['perusahaan'] == $get_perusahaan) {
                                                ?>
                                                        <option value="<?php echo $ph['perusahaan']; ?>" selected> <?php echo $ph['perusahaan']; ?> </option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?php echo $ph['perusahaan']; ?>"> <?php echo $ph['perusahaan']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Office</label>
                                            <select name="office" class="form-control">
                                                <?php
                                                $get_office = $ud->office;
                                                $office = $this->db->get('tb_office')->result_array();
                                                foreach ($office as $ofc) :
                                                    if ($ofc['office'] == $get_office) {
                                                ?>
                                                        <option value="<?php echo $ofc['office']; ?>" selected> <?php echo $ofc['office']; ?> </option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="<?php echo $ofc['office']; ?>"> <?php echo $ofc['office']; ?> </option>
                                                    <?php
                                                    }
                                                    ?>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Status Pernikahan</label>
                                            <select class="form-control" name="pernikahan">
                                                <option value="Belum Menikah" <?php echo ($ud->pernikahan == 'Belum Menikah' ? ' selected' : ''); ?>>Belum Menikah</option>
                                                <option value="Menikah" <?php echo ($ud->pernikahan == 'Menikah' ? ' selected' : ''); ?>>Menikah</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Tinggal</label>
                                            <textarea class="form-control" rows="2" name="alamat" maxlength="250"><?php echo $ud->alamat; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat di KTP</label>
                                            <textarea class="form-control" rows="2" name="alamat_ktp" maxlength="250"><?php echo $ud->alamat_ktp; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-12 mb-2">
                                                <img src="<?php echo base_url(); ?>assets/image/<?php echo $ud->image; ?>" class="img-thumbnail" width="12%">
                                            </div>

                                            <div class="col-12">
                                                <input type="file" class="form-control custom-file-label" name="image" value="<?php echo $ud->image; ?>">

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
                                            <input type="text" class="form-control" name="username" value="<?php echo $ud->username; ?>" maxlength="50">
                                        </div>
                                        <div class="form-group">
                                            <label for="ttl">Password</label>
                                            <input type="text" class="form-control" name="password" value="<?php echo $ud->password; ?>" maxlength="50">
                                        </div>
                                    </div>
                                    <!-- End New Left Colum -->

                                    <div class="col-lg-6 col-12 pl-3 pr-3">
                                        <div class="form-group">
                                            <label for="ttl">Hak Akses</label>
                                            <select class="form-control" name="role_id">

                                                <?php
                                                $get_role = $ud->role_id;
                                                $role = $this->db->get('user_role')->result_array();
                                                foreach ($role as $ro) :
                                                    if ($ro['id_role'] == $get_role) { ?>
                                                        <option value="<?php echo $ro['id_role']; ?>" selected><?php echo $ro['nama_role']; ?></option>
                                                    <?php
                                                    } else { ?>
                                                        <option value="<?php echo $ro['id_role']; ?>"><?php echo $ro['nama_role']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                    ?>
                                                <?php endforeach; ?>
                                            </select>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <!-- <label for="ttl">Aktivasi</label> -->
                                            <select class="form-control" name="is_active" hidden>
                                                <option value="0" <?php echo ($ud->is_active == '0' ? ' selected' : ''); ?>>Tidak Aktiv</option>
                                                <option value="1" <?php echo ($ud->is_active == '1' ? ' selected' : ''); ?>>Aktiv</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End New Left Colum -->
                                </div>
                                <!-- End Row -->

                                <div class="card-footer d-flex justify-content-center m-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?php echo base_url('Data_karyawan/detail_karyawan/' . $id_divisi . '/' . $link) ?>" class="btn btn-secondary ml-2">Kembali</a>
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
            <?php echo form_close(); ?>
            <!-- </form> -->

        <?php endforeach; ?>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->