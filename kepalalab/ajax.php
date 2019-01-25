<?php

    include "../connection.php";
    
    if (isset($_GET['ID'])) {
        
        $id = $_GET['ID'];
        $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, a.id_layanan, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, l.nama_layanan, a.status FROM antrian a JOIN pendaftaran p on a.id_pendaftaran = p.id_pendaftaran JOIN layanan l ON a.id_layanan = l.id_layanan JOIN pengunjung p1 ON a.id_pendaftaran = p1.id_pengunjung WHERE a.id_pendaftaran = '".$id."'");
        if (mysqli_num_rows($query) == 1) {
            $row = mysqli_fetch_array($query);
            $id = $row['id_pendaftaran'];
            $nama = $row['nama_produk'];
            $jenis = $row['jenis_produk'];
            $sertifikasi = $row['nama_layanan'];
            $perusahaan = $row['asal_perusahaan'];

            $myObj = array('hasil' => true, 'id' => $id, 'nama' => $nama, 'jenis' => $jenis, 'sertifikasi' => $sertifikasi, 'perusahaan' => $perusahaan);
        }
        else {
            $myObj = array('hasil' => false, 'id' => '-', 'nama' => '-', 'jenis' => '-', 'sertifikasi' => '-', 'perusahaan' => '-');
        }
    }

    $myJSON = json_encode($myObj);
    echo $myJSON;

?>