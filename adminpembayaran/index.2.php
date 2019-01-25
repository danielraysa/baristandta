<?php $filename = basename(__FILE__); ?>
<?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <center><div class="font-bold font-32">Laporan Pembayaran Sertifikasi Produk </p>
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
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="header">
                          
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
                                            <th>Jumlah Bayar</th>
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
                                            <th>Jumlah Bayar</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, l.nama_layanan, b.total_bayar FROM antrian a JOIN pembayaran b ON a.id_pendaftaran = b.id_pendaftaran JOIN pendaftaran p on a.id_pendaftaran = p.id_pendaftaran JOIN layanan l ON a.id_layanan = l.id_layanan JOIN pengunjung p1 ON a.id_pendaftaran = p1.id_pengunjung WHERE b.status_bayar = 1");
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id_pendaftaran']; ?></td>
                                            <td><?php echo $row['asal_perusahaan']; ?></td>
                                            <td><?php echo $row['nama_produk']; ?></td>
                                            <td><?php echo $row['jenis_produk']; ?></td>
                                            <td><?php echo $row['nama_layanan']; ?></td>
                                            <td><?php echo $row['total_bayar']; ?></td>
                                            <td><button type="button" name="update" class="btn btn-danger waves-effect modalLink" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id_pendaftaran']; ?>" >Delete</button></td>
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
                <!-- Modal Delete -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                        <form action="form-action.php" method="post">
                            <div class="modal-header"><h4 class="modal-title">Hapus</h4></div>
                            <div class="modal-body">
                                Hapus data?
                                <input type="hidden" id="idbayar" name="id_bayar" value=""/>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-link waves-effect" type="submit" name="delete">Hapus</button>
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
