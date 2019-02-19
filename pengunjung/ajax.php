<?php
    
    include "../connection.php";

    $id = $_POST['id'];
    $pass_lama = $_POST['lama'];
    $pass_baru = $_POST['baru'];
    $query = mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE id_pengunjung = '".$id."' AND id_password = '".$pass_lama."'");
    if(mysqli_num_rows($query) == 1) {
        $update = mysqli_query($koneksi, "UPDATE pengunjung SET id_password = '".$pass_baru."' WHERE id_pengunjung = '".$id."'");
        echo true;
    }
    else {
        echo false;
    }

?>