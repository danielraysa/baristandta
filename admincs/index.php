<?php $filename = basename(__FILE__); ?>
    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <center><div class="font-bold font-32">Penyerahan dan Pendaftaran Produk</p>
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
                Data berhasil ditambahkan
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
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="header">
                            
                                <h2>Data Penyerahan Produk</h2>
                            
                        </div>
                        <div class="body">
                            <!-- <form method="post" action="form-action.php"> -->
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 form-control-label">
                                        <label for="email_address_2">ID Pendaftaran</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="id_pendaftaran" id="id_pendaftaran" class="form-control" placeholder="ID Pendaftaran" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">
                                        <button type="button" class="btn btn-success btn-block cekbutton" name="cek">Cek ID Pendaftaran</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Jadwal Datang</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tanggal_datang" id="tanggal" class="form-control datepicker" placeholder="Jadwal Datang" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Tanggal Penyerahan </label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="tanggal_penyerahan" id="tanggal_penyerahan" class="form-control datepicker" placeholder="Tanggal Penyerahan" required>
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
                                                <input type="text" name="nama_perusahaan" id="hasil1" class="form-control" placeholder="Nama Perusahaan" required>
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
                                                <input type="text" name="nama_produk" id="hasil2" class="form-control" placeholder="Nama Produk" required>
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
                                                <input type="text" name="jenis_produk" id="hasil3" class="form-control" placeholder="Jenis Produk">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Pengunjung</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="nama_pengunjung" id="nama_pengunjung" class="form-control" placeholder="Nama Pengunjung" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <center>
                            <div class="form-group">
                                <!-- <button type="submit" id="simpan_cetak" name="simpan" class="btn btn-primary btn-lg waves-effect" style="width: 500px;">Simpan</button> -->
                                <button type="button" id="simpan_cetak" name="simpan" class="btn btn-primary btn-lg waves-effect" style="width: 500px;">Simpan</button>
                            </div>
                            </center>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!--
                <div id="chat1" class="panel panel-chat mini">
                    <div class="panel-heading">
                        <a href="#" class="chatMinimize" onclick="return false"><span>Özgür Gürbüz</span></a>
                        <a href="#" class="chatMinimize" onclick="return false"><i class="glyphicon glyphicon-remove"></i></a>
                        <div class="clearFix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="messageMe">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                            <span>asdasdssadasdasdassssssssssssssssssssssssssssssssssssssssssdasdasd</span>
                            <div class="clearFix"></div>
                        </div>
                        <div class="messageHer">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                            <span>asdasdsassssssssssssssssssssssssssssssssssssssss</span>
                            <div class="clearFix"></div>
                        </div>
                        <div class="messageMe">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                            <span>asdasdssadasdasdassssssssssssssssssssssssssssssssssssssssssdasdasd</span>
                            <div class="clearFix"></div>
                        </div>
                        <div class="messageHer">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                            <span>asdasdsassssssssssssssssssssssssssssssssssssssss</span>
                            <div class="clearFix"></div>
                        </div>
                        <div class="messageMe">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                            <span>asdasdssadasdasdassssssssssssssssssssssssssssssssssssssssssdasdasd</span>
                            <div class="clearFix"></div>
                        </div>
                        <div class="messageHer">
                            <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" alt=""/>
                            <span>asdasdsassssssssssssssssssssssssssssssssssssssss</span>
                            <div class="clearFix"></div>
                        </div>
                        <div class="clearFix"></div>
                    </div>
                    <div class="panel-footer">
                        <textarea name="textMessage" cols="0" rows="0"></textarea>
                    </div>
                </div>
                -->
                
            </div>
        </div>
    </section>
    
    <?php include "footer.php"; ?>
