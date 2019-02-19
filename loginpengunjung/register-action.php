<?php
    session_start();
    date_default_timezone_set("Asia/Jakarta");
    include "../connection.php";

    function randString($length) {
        $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count-1)];
        }
        return $str;
    }

    //trigger exception in a "try" block
    try {
        //If the exception is thrown, this text will not be shown
        $namaproduk = $_POST['namaproduk'];
        $jenisproduk = $_POST['jenisproduk'];
        $namaperusahaan = $_POST['namaperusahaan'];
        $date = date("Y-m-d");
        if ($jenisproduk == "") {
            $_SESSION['error-msg'] = "Jenis produk must not blank!";
            header("location: index.php?error");
        }
        else {
            $random_string = randString(10);
            $is_unique = false;
            
            while (!$is_unique) {
                $result = mysqli_query($koneksi, "SELECT id_pendaftaran FROM pendaftaran WHERE id_pendaftaran = '".$random_string."' LIMIT 1");
                if (mysqli_num_rows($result) == 0) {  // if you don't get a result, then you're good
                    $is_unique = true;
                    $query = mysqli_query($koneksi, "INSERT INTO pendaftaran (id_pendaftaran, jenis_produk, nama_produk, tanggal_pendaftaran) VALUES ('".$random_string."', '".$jenisproduk."', '".$namaproduk."', '".$date."')");
                    $query1 = mysqli_query($koneksi, "INSERT INTO pengunjung (id_pengunjung, id_password, asal_perusahaan) VALUES ('".$random_string."', '12345', '".$namaperusahaan."')");
                    $_SESSION['temp_id'] = $random_string;
                    $_SESSION['temp_query'] = "SELECT p.id_pendaftaran, p.nama_produk, p.jenis_produk, p.tanggal_pendaftaran, p2.asal_perusahaan FROM pendaftaran p JOIN pengunjung p2 ON p.id_pendaftaran = p2.id_pengunjung WHERE p.id_pendaftaran = '".$random_string."'";
                    header("location: success.php");
                }
                else {                     // if you DO get a result, keep trying
                    $random_string = randString(10);
                }
            }
        }
    }
    //catch exception
    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }

?>