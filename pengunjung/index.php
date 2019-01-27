    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <center><div class="font-bold font-32">Tahapan Sertifikasi Anda Saat Ini</p></center>
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
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 <?php if ($_SESSION['status_tahapan'] == "Tahap 1") echo "bg-teal"; ?> hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">android</i>
                        </div>
                        <div class="content">
                            <div class="font-bold font-20">TAHAP 1</div>
                            <div class="font-bold font-15">Pengumpulan Uji Produk</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 <?php if ($_SESSION['status_tahapan'] == "Tahap 2") echo "bg-teal"; ?> hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="font-bold font-20">TAHAP 2</div>
                            <?php
                            if ($_SESSION['id_layanan'] == "LYN001") {
                            ?>
                            <div class="font-bold font-15">Laboratorium Kimia dan Lingkungan</div>
                            <?php
                            }
                            if ($_SESSION['id_layanan'] == "LYN002") {
                            ?>
                            <div class="font-bold font-15">Laboratorium Teknis Pengujian dan Kalibrasi</div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 <?php if ($_SESSION['status_tahapan'] == "Tahap 3") echo "bg-teal"; ?> hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="font-bold font-20">TAHAP 3</div>
                            <?php
                            if ($_SESSION['id_layanan'] == "LYN001") {
                            ?>
                            <div class="font-bold font-15">Laboratorium Pengujian Mutu</div>
                            <?php
                            }
                            if ($_SESSION['id_layanan'] == "LYN002") {
                            ?>
                            <div class="font-bold font-15">Laboratorium Fisika dan Lingkungan</div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 <?php if ($_SESSION['status_tahapan'] == "Tahap 4") echo "bg-teal"; ?> hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="font-bold font-20">TAHAP 4</div>
                                <div class="font-bold font-15">Keputusan Sertifikasi</div>
                            </div>
                        </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
            

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Data Produk Disertifikasi</h2>
                        </div>
                        <div class="body">
                            
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">ID Pengunjung</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_pendaftaran" name="id_pendaftaran" class="form-control" value="<?php echo $_SESSION['id_pengunjung']; ?>" placeholder="ID Pengunjung">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Perusahaan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" value="<?php echo $fet['asal_perusahaan']; ?>" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Jenis Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jenis_produk" name="jenis_produk" value="<?php echo $fet['jenis_produk']; ?>" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $fet['nama_produk']; ?>" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"> Jenis Sertifikasi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_layanan" name="nama_layanan" value="<?php echo $fet['nama_layanan']; ?>" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
