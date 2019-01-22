<?php

    include "../connection.php";
    if (isset($_GET['id'])) {
        $q = mysqli_real_escape_string($koneksi, $_GET['id']);

        $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, a.nama_produk, a.jenis_produk, l.nama_layanan, p2.asal_perusahaan, l.tarif_layanan, l.id_layanan from antrian a JOIN pengunjung p2 ON a.id_pendaftaran = p2.id_pengunjung JOIN layanan l ON a.id_layanan = l.id_layanan WHERE a.id_pendaftaran = '".$q."'");
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
    }

    
    $myJSON = json_encode($myObj);
    echo $myJSON;

?>