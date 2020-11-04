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
                        <li class="breadcrumb-item active">Divisi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Section divisi box -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h5>Data Karyawan</h5>
                    <div class="alert alert-sm alert-success alert-dismissible m-1">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Karyawan dikelompokkan berdasarkan Divisi masing-masing. <span class="text-indigo">Lihat Detail</span> untuk mendapatkan informasi lebih detail.
                    </div>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">

                        <?php foreach ($divisi as $dv) : ?>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h4 class="font-weight-bold"><?php echo $dv->divisi; ?></h4>

                                        <p>12 Orang</p>
                                    </div>
                                    <div class="icon">
                                        <i class="<?php echo $dv->icon; ?>"></i>
                                    </div>

                                    <?php echo anchor('hrd/Hrd/detail_karyawan/' . $dv->id_divisi, '<div class="small-box-footer"><center>Lihat detail <i class="fas fa-arrow-circle-right"></i></center></div>'); ?>
                                </div>
                            </div>

                        <?php endforeach; ?>


                    </div>
                    <!-- end row ketiga -->
                </div>
            </div>
        </div>
    </section>


    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    $(function() {
        $("hrd_detail_karyawan.phpjsGrid1").jsGrid({
            height: "100%",
            width: "100%",

            sorting: true,
            paging: true,

            data: db.clients,

            fields: [{
                    name: "Name",
                    type: "text",
                    width: 150
                },
                {
                    name: "Age",
                    type: "number",
                    width: 50
                },
                {
                    name: "Address",
                    type: "text",
                    width: 200
                },
                {
                    name: "Country",
                    type: "select",
                    items: db.countries,
                    valueField: "Id",
                    textField: "Name"
                },
                {
                    name: "Married",
                    type: "checkbox",
                    title: "Is Married"
                }
            ]
        });
    });
</script>