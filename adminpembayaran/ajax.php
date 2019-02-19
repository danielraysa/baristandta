<?php
    session_start();
    include "../connection.php";
    if (isset($_GET['id'])) {
        $q = mysqli_real_escape_string($koneksi, $_GET['id']);

        $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, p.nama_produk, p.jenis_produk, l.nama_layanan, p2.asal_perusahaan, l.tarif_layanan, l.id_layanan from antrian a JOIN pendaftaran p ON a.id_pendaftaran = p.id_pendaftaran JOIN pengunjung p2 ON a.id_pendaftaran = p2.id_pengunjung JOIN layanan l ON a.id_layanan = l.id_layanan WHERE a.id_pendaftaran = '".$q."'");
        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            
            $nama = $row[1];
            $jenis = $row[2];
            $layanan = $row[3];
            $perusahaan = $row[4];
            $bayar = $row[5];
            //$layanan = $row[6];

            $myObj = array('hasil' => true, 'nama' => $nama, 'jenis' => $jenis, 'layanan' => $layanan, 'perusahaan' => $perusahaan, 'bayar' => $bayar);
        }
        else {
            $myObj = array('hasil' => false, 'nama' => "-", 'jenis' => "-", 'layanan' => "-", 'perusahaan' => "-", 'bayar' => "-");
        }
        $myJSON = json_encode($myObj);
        echo $myJSON;
    }

    if (isset($_POST['bayar'])) {
        $idpendaftaran = mysqli_real_escape_string($koneksi, $_POST['id']);
        $tglpembayaran = date("Y-m-d H:i:s");
        $totalbayar = $_POST['bayar'];
        $insert = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pendaftaran, total_bayar, tanggal_bayar, status_bayar) VALUES ('".$idpendaftaran."','".$totalbayar."','".$tglpembayaran."', 1)");
        $_SESSION['bayar_query'] = "SELECT p.id_pendaftaran, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, p.tanggal_pendaftaran, p.tanggal_penyerahan, p1.nama_pengunjung, b.total_bayar, b.tanggal_bayar FROM pendaftaran p JOIN pengunjung p1 ON p.id_pendaftaran = p1.id_pengunjung JOIN pembayaran b ON p.id_pendaftaran = b.id_pendaftaran WHERE p.id_pendaftaran = '".$idpendaftaran."'";
        if(!$insert) {
            echo mysqli_error($koneksi);
        }
        else {
            echo "Success";
        }
    }
    

?>