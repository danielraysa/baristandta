<?php
    include "../connection.php";

    $rating = $_POST['rating'];
    $keterangan = $_POST['keterangan'];
    $insert = mysqli_query($koneksi, "INSERT INTO kinerja VALUES ('', 'LKT002', '$rating', '$keterangan')");

?>