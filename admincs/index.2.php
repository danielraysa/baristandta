<?php $filename = basename(__FILE__); ?>
    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <center><div class="font-bold font-32">Daftar Produk Sertifikasi </p>
                <div class="font-bold font-32">Balai Riset dan Standaridisasi Industri Surabaya</p></center>
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
                <b>Success!</b> Data berhasil diperbarui
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
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>Daftar Produk Sertifikasi</h2>
                                </div>
                                <div class="col-xs-12 col-sm-6 align-right">
                                    <a role="button" class="btn btn-success waves-effect modalFilter" href="#" data-toggle="modal" data-target="#myModalFilter">Filter</a>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID Pendaftaran</th>
                                            <th>Asal Perusahaan</th>
                                            <th>Nama Produk</th>
                                            <th>Jenis Produk</th>
                                            <th>Tanggal Pendaftaran</th>
                                            <th>Tanggal Penyerahan</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        if (isset($_GET['tanggal_awal'])) {
                                            $tgl_awal = $_GET['tanggal_awal'];
                                            $tgl_akhir = $_GET['tanggal_akhir'];
                                            $query = mysqli_query($koneksi, "SELECT p.id_pendaftaran, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, p.tanggal_pendaftaran, p.tanggal_penyerahan, p1.nama_pengunjung FROM pendaftaran p JOIN pengunjung p1 ON p.id_pendaftaran = p1.id_pengunjung WHERE p.tanggal_penyerahan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'");
                                        }
                                        else {
                                            $query = mysqli_query($koneksi, "SELECT p.id_pendaftaran, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, p.tanggal_pendaftaran, p.tanggal_penyerahan, p1.nama_pengunjung FROM pendaftaran p JOIN pengunjung p1 ON p.id_pendaftaran = p1.id_pengunjung WHERE p.tanggal_penyerahan != '0000-00-00'");
                                        }
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id_pendaftaran']; ?></td>
                                            <td><?php echo $row['asal_perusahaan']; ?></td>
                                            <td><?php echo $row['nama_produk']; ?></td>
                                            <td><?php echo $row['jenis_produk']; ?></td>
                                            <td><?php echo $row['tanggal_pendaftaran']; ?></td>
                                            <td><?php echo $row['tanggal_penyerahan']; ?></td>
                                            <td><?php echo $row['nama_pengunjung']; ?></td>
                                            <td><button type="button" name="update" class="btn btn-success waves-effect modalLink" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id_pendaftaran']; ?>" >Update</button></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Modal Update -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="myModalFilter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
