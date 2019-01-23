<?php $filename = basename(__FILE__); ?>
<?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <center><div class="font-bold font-32">Laporan Layanan Sertifikasi </p>
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
                            
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Layanan Paling Banyak Dipilih</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="email_address_2" class="form-control" placeholder="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Layanan Paling Sedikit Dipilih</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="password_2" class="form-control" placeholder="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                <th>Prioritas</th>
                                                <th>Status Sertifikasi</th>
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
                                                <th>Prioritas</th>
                                                <th>Status Sertifikasi</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                            $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, l.nama_layanan, a.masa_expired, a.status FROM antrian a JOIN pendaftaran p on a.id_pendaftaran = p.id_pendaftaran JOIN layanan l ON a.id_layanan = l.id_layanan JOIN pengunjung p1 ON a.id_pendaftaran = p1.id_pengunjung");
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
                                                <?php
                                                if ($row['masa_expired'] <= 10) {
                                                    echo "High Priority";
                                                }
                                                else if ($row['masa_expired'] > 10 && $row['masa_expired'] <= 30) {
                                                    echo "Medium Priority";
                                                }
                                                else {
                                                    echo "Low Priority";
                                                }
                                                ?>
                                                </td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><button type="button" name="update" class="btn btn-success waves-effect modalLink" data-toggle="modal" data-target="#myModal" data-id="<?php echo $row['id_pendaftaran']; ?>" >Update</button>
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
                
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
