<?php
    include "../connection.php";

    $nama = $_POST['nama'];
    $perusahaan = $_POST['perusahaan'];
    $keluhan = $_POST['keluhan'];
    $insert = mysqli_query($koneksi, "INSERT INTO keluhan VALUES ('', '$nama', '$perusahaan', '$keluhan')");

?>