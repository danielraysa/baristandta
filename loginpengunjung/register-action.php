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
    function random_alphabet($length) {
        $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        $count = strlen($charset);
        while ($length--) {
            $str .= $charset[mt_rand(0, $count-1)];
        }
        return $str;
    }
    function random_number($length) {
        $charset='0123456789';
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
        $expired = $_POST['expired'];
        $date = date("Y-m-d");
        if ($jenisproduk == "") {
            $_SESSION['error-msg'] = "Jenis produk must not blank!";
            header("location: index.php?error");
        }
        else {
            $random_first = random_alphabet(5);
            $random_last = random_number(5);
            $random_string = $random_first.$random_last;
            $random_password = randString(10);
            $is_unique = false;
            
            while (!$is_unique) {
                $result = mysqli_query($koneksi, "SELECT id_pendaftaran FROM pendaftaran WHERE id_pendaftaran = '".$random_string."' LIMIT 1");
                if (mysqli_num_rows($result) == 0) {  
                    // if you don't get a result, then you're good
                    $is_unique = true;
                    //algoritma
                    $proceed = false;
                    $date_rec = date('Y-m-d', strtotime("+1 days"));
                    $a = 2;
                    while(!$proceed) {
                        //$get_count = mysqli_query($koneksi, "SELECT * FROM mock_date WHERE DATE(tanggal) = '".$date_rec."'"); 
                        $get_count = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE DATE(rekomendasi_datang) = '".$date_rec."'"); 
                        $num_rows = mysqli_num_rows($get_count);
                        if ($num_rows >= 90) {
                            $date_rec = date('Y-m-d', strtotime("+".$a." days"));
                            $a++;
                        }
                        else {
                            $proceed = true;
                            $get_last = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE DATE(rekomendasi_datang) = '".$date_rec."' ORDER BY rekomendasi_datang DESC LIMIT 1"); 
                            if (mysqli_num_rows($get_last) == 0) {
                                $tempdate = strtotime($date_rec." 08:00:00");
                                $date_rec = date('Y-m-d H:i:s', $tempdate);
                            }
                            else {
                                $fetch = mysqli_fetch_array($get_last);
                                $date_rec = date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime($fetch['rekomendasi_datang'])));
                            }
                            
                        }
                    }
                    echo $date_rec;
                    $query = mysqli_query($koneksi, "INSERT INTO pendaftaran (id_pendaftaran, jenis_produk, nama_produk, masa_expired, rekomendasi_datang, tanggal_pendaftaran) VALUES ('".$random_string."', '".$jenisproduk."', '".$namaproduk."', ".$expired.",  '".$date_rec."', '".$date."')");
                    $query1 = mysqli_query($koneksi, "INSERT INTO pengunjung (id_pengunjung, id_password, asal_perusahaan) VALUES ('".$random_string."', '".$random_password."', '".$namaperusahaan."')");
                    $_SESSION['temp_id'] = $random_string;
                    $_SESSION['temp_date'] = $date_rec;
                    $temp_dr = strtotime($date_rec." +5 minutes");
                    $duration = date('H:i:s', $temp_dr);
                    $_SESSION['duration'] = $duration;
                    $_SESSION['temp_query'] = "SELECT p.id_pendaftaran, p.nama_produk, p.jenis_produk, p.rekomendasi_datang, p.tanggal_pendaftaran, p2.asal_perusahaan FROM pendaftaran p JOIN pengunjung p2 ON p.id_pendaftaran = p2.id_pengunjung WHERE p.id_pendaftaran = '".$random_string."'";
                    header("location: success.php");
                }
                else {                     
                    // if you DO get a result, keep trying
                    $random_first = random_alphabet(5);
                    $random_last = random_number(5);
                    $random_string = $random_first.$random_last;
                }
            }
        }
    }
    //catch exception
    catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }

?>