    <?php $filename = basename(__FILE__); ?>
    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <center><div class="font-bold font-32">Pendaftaran Layanan Sertifikasi</p>
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
            <?php 
                if (isset($_GET['success'])) {
            ?>
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <b>Success!</b> Data berhasil ditambahkan
            </div>
            <?php
                }
                if (isset($_GET['error'])) {
            ?>
            <div class="alert bg-red alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <b>Error!</b> <?php echo $_SESSION['error-msg']; ?>
            </div>
            <?php
                }
            ?>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                           <b>Pendaftaran Sertifikasi</b>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="form-action.php">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                                        <label for="email_address_2">ID Pendaftaran</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="id_pendaftaran" id="id_pendaftaran" class="form-control" placeholder="ID Pendaftaran">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">
                                        <button type="button" class="btn btn-success btn-block cekdaftar" name="cek">Cek ID Pendaftaran</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Asal Perusahaan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Nama Pengunjung</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_pengunjung" id="namapengunjung" class="form-control" placeholder="Nama Pengunjung">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_3">Jabatan Dalam Perusahaan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_4">Layanan Sertifikasi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <select name="layanan_sertifikasi" id="nama_layanan" class="form-control show-tick" onchange="jenisLayanan()">
                                            <option value="">-- Pilih Layanan Sertifikasi --</option>
                                            <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM layanan");
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                            <option id="<?php echo $row['id_layanan']; ?>" value="<?php echo $row['id_layanan']; ?>"><?php echo $row['nama_layanan']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 form-control-label">
                                        <label for="password_3">Masa Expired</label>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" name="expired" id="expired" min="1" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-2 form-control-label">
                                        <center><label for="password_3">hari</label></center>
                                    </div>
                                </div>
                                <center>
                                <div class="form-group">
                                    <button type="submit" name="daftar" class="btn btn-success waves-effect">Simpan Layanan Sertifikasi</button>
                                </div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
