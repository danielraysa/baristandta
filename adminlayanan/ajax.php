<?php

    include "../connection.php";
    if (isset($_GET['id'])) {
        $q = mysqli_real_escape_string($koneksi, $_GET['id']);

        $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, l.nama_layanan, p2.asal_perusahaan, p2.nama_pengunjung, a.status from antrian a JOIN pengunjung p2 ON a.id_pendaftaran = p2.id_pengunjung JOIN layanan l ON a.id_layanan = l.id_layanan WHERE a.id_pendaftaran = '".$q."'");
        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            
            $nama = $row[1];
            $layanan = $row[2];
            $status = $row[3];

            $myObj = array('hasil' => true, 'nama' => $nama, 'layanan' => $layanan, 'status' => $status);
        }
        else {
            $myObj = array('hasil' => false, 'nama' => "-", 'layanan' => "Belum terdaftar", 'status' => "-");
        }
    }

    if (isset($_GET['id_daftar'])) {
        $q = mysqli_real_escape_string($koneksi, $_GET['id_daftar']);

        $query = mysqli_query($koneksi, "SELECT p1.id_pendaftaran, p2.asal_perusahaan, p2.nama_pengunjung from pendaftaran p1 JOIN pengunjung p2 ON p1.id_pendaftaran = p2.id_pengunjung WHERE p1.id_pendaftaran = '".$q."'");
        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            $perusahaan = $row[1];
            $nama = $row[2];

            $myObj = array('hasil' => true, 'perusahaan' => $perusahaan, 'nama' => $nama);
        }
        else {
            $myObj = array('hasil' => false, 'perusahaan' => "-", 'nama' => "-");
        }
    }   
    $myJSON = json_encode($myObj);
    echo $myJSON;

?>