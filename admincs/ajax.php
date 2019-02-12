<?php

include "../connection.php";

$q = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT p1.id_pendaftaran, p1.nama_produk, p1.jenis_produk, p1.tanggal_pendaftaran, p2.asal_perusahaan from pendaftaran p1 JOIN pengunjung p2 ON p1.id_pendaftaran = p2.id_pengunjung WHERE p1.id_pendaftaran = '".$q."'");
if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_array($query);
    //echo $row['id_pendaftaran'];

    $nama = $row['nama_produk'];
    $jenis = $row['jenis_produk'];
    $asal = $row['asal_perusahaan'];
    $date = $row['tanggal_pendaftaran'];
    $newdate = date('Y-m-d', strtotime("$date +7 day"));
    //echo date('M d, Y', $date);
    $myObj = array('hasil' => true, 'nama' => $nama, 'jenis' => $jenis, 'asal' => $asal, 'tanggal' => $newdate);
}
else {
    $myObj = array('hasil' => false, 'nama' => "", 'jenis' => "", 'asal' => "", 'tanggal' => '');
}

    $myJSON = json_encode($myObj);
    echo $myJSON;
?>