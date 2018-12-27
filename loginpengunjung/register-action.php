<?php
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
        
        $random_string = randString(10);
        $is_unique = false;
        
        while (!$is_unique) {
            $result = mysqli_query($koneksi, "SELECT id_pendaftaran FROM pendaftaran WHERE id_pendaftaran = '".$random_string."' LIMIT 1");
            if (mysqli_num_rows($result) == 0) {  // if you don't get a result, then you're good
                $is_unique = true;
                echo "success";
                $query = mysqli_query($koneksi, "INSERT INTO pendaftaran (id_pendaftaran, jenis_produk, nama_produk, tanggal_pendaftaran) VALUES ('".$random_string."', '".$jenisproduk."', '".$namaproduk."', '".$date."')");
                $query1 = mysqli_query($koneksi, "INSERT INTO pengunjung (id_pengunjung, asal_perusahaan) VALUES ('".$random_string."', '".$namaperusahaan."')");
                header("location: success.php");
            }
            else {                     // if you DO get a result, keep trying
                $random_string = randString(10);
            }
        }
    }
  
    //catch exception
    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }

?>