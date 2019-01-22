    <?php $filename = basename(__FILE__); ?>
    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <center><div class="font-bold font-32">Pengecekan Layanan Sertifikasi </p>
                <div class="font-bold font-32">Balai Riset dan Standardisasi Industri Surabaya</p></center>
            </div>
            <!--
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-lg bg-pink waves-effect waves-light">LEFT</button>
                        <button type="button" class="btn btn-lg bg-pink waves-effect waves-light">MIDDLE</button>
                        <button type="button" class="btn btn-lg bg-pink waves-effect waves-light">RIGHT</button>
                    </div>
                </div>
            </div> -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                           
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 form-control-label">
                                        <label for="email_address_2">ID Pendaftaran</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="id_pendaftaran" id="id_pendaftaran" class="form-control" placeholder="tuliskan id pendaftaran disini..">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                        <div class="form-group">
                                            <button type="button" name="cek" class="btn btn-success waves-effect cekbutton">Cek Sertifikasi</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                           
                        </div>
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Layanan Sertifikasi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="layanan" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Perusahaan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_perusahaan" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_3">Status Sertifikasi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="status" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>