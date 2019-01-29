<?php $filename = basename(__FILE__); ?>
<?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <center><div class="font-bold font-32">Laporan Produk Sertifikasi </p>
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
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Data Produk Sertifikasi</h2>
                            <a role="button" class="btn btn-success waves-effect" href="export-excel.php?produk" style="right: 50px; top: 15px; position: absolute;">Export Excel</a>
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
                                            <th>Jenis Sertifikasi</th>
                                            <th>Masa Expired</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID Pendaftaran</th>
                                            <th>Asal Perusahaan</th>
                                            <th>Nama Produk</th>
                                            <th>Jenis Produk</th>
                                            <th>Jenis Sertifikasi</th>
                                            <th>Masa Expired</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, l.nama_layanan, a.masa_expired, a.status FROM antrian a JOIN pendaftaran p on a.id_pendaftaran = p.id_pendaftaran JOIN layanan l ON a.id_layanan = l.id_layanan JOIN pengunjung p1 ON a.id_pendaftaran = p1.id_pengunjung WHERE a.status = 'Tahap 4'");
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id_pendaftaran']; ?></td>
                                            <td><?php echo $row['asal_perusahaan']; ?></td>
                                            <td><?php echo $row['nama_produk']; ?></td>
                                            <td><?php echo $row['jenis_produk']; ?></td>
                                            <td><?php echo $row['nama_layanan']; ?></td>
                                            <td><?php echo $row['masa_expired']; ?> hari</td>
                                            <td>
                                            <button type="button" name="update" class="btn btn-success waves-effect modalLink" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id_pendaftaran']; ?>" >Update</button>
                                            <button class="btn btn-danger waves-effect">Delete</button>
                                            </td>
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
                        <form action="form-action.php" method="post">
                            <div class="modal-header">
                                <h4 class="modal-title">Data Sertifikasi Produk</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">ID Pendaftaran</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_pendaftaran" name="id_pendaftaran" class="form-control" placeholder="ID Pendaftaran" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Perusahaan</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" placeholder="Nama Perusahaan">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Produk</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Nama Produk">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Jenis Produk</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jenis_produk" name="jenis_produk" class="form-control" placeholder="Jenis Produk" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Jenis Layanan Sertifikasi</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jenis_sertifikasi" name="jenis_sertifikasi" class="form-control" placeholder="Nama Layanan" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-link waves-effect" name="update-produk">SAVE</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Delete -->
                <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                        <form action="form-action.php" method="post">
                            <div class="modal-header"><h4 class="modal-title">Hapus</h4></div>
                            <div class="modal-body">
                                Hapus data?
                                <input type="hidden" id="idpendaftaran" name="id_pendaftaran" value=""/>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-link waves-effect" type="submit" name="delete-layanan">Hapus</button>
                                <button class="btn btn-link waves-effect" type="button" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
