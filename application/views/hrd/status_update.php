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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('hrd/Hrd/index') ?>">Home</a></li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Update Status Kepegawaian</h5>
                        </div>
                        <!-- /.card-header -->
                        <form role="form">
                            <div class="card-body col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 pb-1">
                                            <label>Status</label>
                                            <input type="text" class="form-control" placeholder="Status Kepegawaian" required>
                                        </div>
                                        <div class="col-12 pb-1">
                                            <label> Tanggal awal</label>
                                            <input type="date" class="form-control" required>
                                        </div>
                                        <div class="col-12 pb-1">
                                            <label>Tanggal akhir</label>
                                            <input type="date" class="form-control" required>
                                        </div>
                                        <button class="btn btn-md btn-primary m-2">Update</button>
                                        <a href="<?php echo base_url('hrd/Hrd/data_pribadi') ?>" class="btn btn-secondary m-2">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->