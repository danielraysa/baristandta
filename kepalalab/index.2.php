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
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Data Pemasukan Per Bulan</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Bulan - Tahun</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Bulan - Tahun</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                        $query = mysqli_query($koneksi, "SELECT MONTHNAME(tanggal_bayar) as month, YEAR(tanggal_bayar) as year, SUM(total_bayar) as sum FROM pembayaran GROUP BY YEAR(tanggal_bayar) DESC, MONTH(tanggal_bayar) DESC");
                                        $a = 1;
                                        while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $a; ?></td>
                                            <td><?php echo $row['month']." - ".$row['year']; ?></td>
                                            <td>Rp. <?php echo $row['sum']; ?></td>
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

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Persentase Kinerja Karyawan Bulan ini</h2>
                        <div class="body">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <canvas id="myChart" height="300px"></canvas>
                                    <?php
                                        $a = mysqli_query($koneksi, "SELECT ROUND(AVG(angka_rating), 1) as rating FROM kinerja WHERE id_pegawai = 'LKT001'");
                                        $b = mysqli_fetch_array($a);
                                        echo "<br><center>Rating : ".$b['rating']."</center>";
                                    ?>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <canvas id="myChart_A" height="300px"></canvas>
                                    <?php
                                        $a = mysqli_query($koneksi, "SELECT ROUND(AVG(angka_rating), 1) as rating FROM kinerja WHERE id_pegawai = 'LKT002'");
                                        $b = mysqli_fetch_array($a);
                                        echo "<br><center>Rating : ".$b['rating']."</center>";
                                    ?>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <canvas id="myChart_B" height="300px"></canvas>
                                    <?php
                                        $a = mysqli_query($koneksi, "SELECT ROUND(AVG(angka_rating), 1) as rating FROM kinerja WHERE id_pegawai = 'LKT003'");
                                        $b = mysqli_fetch_array($a);
                                        echo "<br><center>Rating : ".$b['rating']."</center>";
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Loket</th>
                                                <th>★</th>
                                                <th>★★</th>
                                                <th>★★★</th>
                                                <th>★★★★</th>
                                                <th>★★★★★</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $query = mysqli_query($koneksi, "SELECT
                                            l.jenis_loket,
                                            SUM(CASE WHEN angka_rating = 1 THEN +1 ELSE 0 END) AS Bintang_1,
                                            SUM(CASE WHEN angka_rating = 2 THEN +1 ELSE 0 END) AS Bintang_2,
                                            SUM(CASE WHEN angka_rating = 3 THEN +1 ELSE 0 END) AS Bintang_3,
                                            SUM(CASE WHEN angka_rating = 4 THEN +1 ELSE 0 END) AS Bintang_4,
                                            SUM(CASE WHEN angka_rating = 5 THEN +1 ELSE 0 END) AS Bintang_5,
                                            COUNT(*) AS Jumlah
                                        FROM kinerja k JOIN loket l ON k.id_pegawai = l.id_loket
                                        GROUP BY
                                            k.id_pegawai");
                                            $a = 1;
                                            while ($row = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td>Admin <?php echo $row['jenis_loket']; ?></td>
                                                <td><?php echo $row['Bintang_1']; ?></td>
                                                <td><?php echo $row['Bintang_2']; ?></td>
                                                <td><?php echo $row['Bintang_3']; ?></td>
                                                <td><?php echo $row['Bintang_4']; ?></td>
                                                <td><?php echo $row['Bintang_5']; ?></td>
                                                <td><?php echo $row['Jumlah']; ?></td>
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
