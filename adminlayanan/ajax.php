<?php

include "../connection.php";

$q = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT p1.id_pendaftaran, p1.nama_produk, p1.jenis_produk, p2.asal_perusahaan from pendaftaran p1 JOIN pengunjung p2 ON p1.id_pendaftaran = p2.id_pengunjung WHERE p1.id_pendaftaran = '".$q."'");
if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_array($query);
    //echo $row['id_pendaftaran'];

    $nama = $row['asal_perusahaan'];
    $layanan = $row['jenis_produk'];
    $status = $row['asal_perusahaan'];

    $myObj = array('hasil' => true, 'nama' => $nama, 'layanan' => $layanan, 'status' => $status);
}
else {
    $myObj = array('hasil' => false, 'nama' => "", 'jenis' => "", 'asal' => "");
}

    $myJSON = json_encode($myObj);
    echo $myJSON;
    
?>