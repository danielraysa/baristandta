    <?php $filename = basename(__FILE__); ?>
    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <center><div class="font-bold font-32">Pembayaran Sertifikasi Produk</p>
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
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="form-action.php">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">ID Pengunjung</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_pendaftaran" name="id_pendaftaran" class="form-control" placeholder="ID Pengunjung">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-2 col-xs-2">
                                        <button type="button" class="btn btn-success btn-block cekdaftar" name="cek">Cek ID Pendaftaran</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Perusahaan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" placeholder="">
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
                                                <input type="text" id="jenis_produk" name="jenis_produk" class="form-control" placeholder="">
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
                                                <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="">
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
                                                <input type="text" id="nama_layanan" name="nama_layanan" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_3">Jumlah Pembayaran</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jml_bayar" name="jumlah_bayar" id="password_3" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <center>
                                <div class="form-group">
                                    <button type="submit" name="bayar" class="btn btn-success waves-effect">Simpan Pembayaran</button>
                                </div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Modal Rating -->
                <div class="modal fade" id="myModalRating" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Rating Pelayanan</h4>
                            </div>
                            <div class="modal-body">
                            <style>
                                .rating {
                                display: inline-block;
                                position: relative;
                                height: 50px;
                                line-height: 50px;
                                font-size: 50px;
                                }

                                .rating label {
                                position: absolute;
                                top: 0;
                                left: 0;
                                height: 100%;
                                cursor: pointer;
                                }

                                .rating label:last-child {
                                position: static;
                                }

                                .rating label:nth-child(1) {
                                z-index: 5;
                                }

                                .rating label:nth-child(2) {
                                z-index: 4;
                                }

                                .rating label:nth-child(3) {
                                z-index: 3;
                                }

                                .rating label:nth-child(4) {
                                z-index: 2;
                                }

                                .rating label:nth-child(5) {
                                z-index: 1;
                                }

                                .rating label input {
                                position: absolute;
                                top: 0;
                                left: 0;
                                opacity: 0;
                                }

                                .rating label .icon {
                                float: left;
                                color: transparent;
                                }

                                .rating label:last-child .icon {
                                color: #000;
                                }

                                .rating:not(:hover) label input:checked ~ .icon,
                                .rating:hover label:hover input ~ .icon {
                                color: #f00;
                                }

                                .rating label input:focus:not(:checked) ~ .icon:last-child {
                                color: #000;
                                text-shadow: 0 0 5px #f00;
                                }
                            </style>
                            <form class="rating">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" id="stars" name="stars" value="1" />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" id="stars" name="stars" value="2" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" id="stars" name="stars" value="3" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>   
                                    </label>
                                    <label>
                                        <input type="radio" id="stars" name="stars" value="4" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" id="stars" name="stars" value="5" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>
                                </form>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4" id="keterangan" class="form-control no-resize" placeholder="Keterangan..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="saveRating" class="btn btn-link waves-effect" data-dismiss="modal" name="save-rating">SAVE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
