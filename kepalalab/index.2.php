<?php $filename = basename(__FILE__); ?>
<?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <center><div class="font-bold font-32">Laporan Pemasukan dan Kinerja Karyawan </p>
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
                            
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="password_2">Jumlah Pemasukan Bulan Ini  </label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <?php
                                                $ab = mysqli_query($koneksi,"SELECT SUM(total_bayar) as total FROM pembayaran WHERE MONTH(tanggal_bayar) = '".date('m')."'");
                                                $get = mysqli_fetch_array($ab);
                                            ?>
                                            <input type="text" id="password_2" class="form-control" value="<?php echo $get['total']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Persentase Kinerja Karyawan Bulan ini </label>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <canvas id="myChart"></canvas>
                                    <?php
                                        $a = mysqli_query($koneksi, "SELECT ROUND(AVG(angka_rating), 1) as rating FROM kinerja WHERE id_pegawai = 'LKT001'");
                                        $b = mysqli_fetch_array($a);
                                        echo "<br><center>Rating : ".$b['rating']."</center>";
                                    ?>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <canvas id="myChart_A"></canvas>
                                    <?php
                                        $a = mysqli_query($koneksi, "SELECT ROUND(AVG(angka_rating), 1) as rating FROM kinerja WHERE id_pegawai = 'LKT002'");
                                        $b = mysqli_fetch_array($a);
                                        echo "<br><center>Rating : ".$b['rating']."</center>";
                                    ?>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <canvas id="myChart_B"></canvas>
                                    <?php
                                        $a = mysqli_query($koneksi, "SELECT ROUND(AVG(angka_rating), 1) as rating FROM kinerja WHERE id_pegawai = 'LKT003'");
                                        $b = mysqli_fetch_array($a);
                                        echo "<br><center>Rating : ".$b['rating']."</center>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Data Keluhan</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Asal Perusahaan</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Keluhan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Asal Perusahaan</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Keluhan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM keluhan");
                                        $a = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $row['asal_perusahaan']; ?></td>
                                            <td><?php echo $row['nama_pengunjung']; ?></td>
                                            <td><?php echo $row['keluhan']; ?></td>
                                        </tr>
                                    <?php
                                        $a++;
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
