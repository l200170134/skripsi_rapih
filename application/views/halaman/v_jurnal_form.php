<?php
date_default_timezone_set('Asia/Jakarta');
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Jurnal/jurnal') ?>">Jurnal</a></li>
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
                <div class="col-lg-6 col-xs-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Daily Journal</h3>
                        </div>
                        <!-- /.card-header -->
                        <form role="form" action="<?php echo base_url('Jurnal/jurnal_proses_tambah/' . $nip); ?>" method="post">
                            <div class="card-body">
                                <input name="nip" type="text" class="form-control" value="0" hidden>
                                <input name="tgl" type="text" class="form-control" value=" <?php echo date("d-m-Y"); ?> " hidden>
                                <input name="jam" type="text" class="form-control" value=" <?php echo date("H:i:s"); ?> " hidden>
                                <div class="form-group">
                                    <textarea name="aktivitas" rows="3" class="form-control" placeholder="Masukkan aktivitas" required></textarea>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="<?php echo base_url('Jurnal/jurnal_list/' . $nip) ?>" class="btn btn-secondary">Cancel</a>
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
<!-- /.content-wrapper