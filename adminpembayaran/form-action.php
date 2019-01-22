<?php
    session_start();
    setlocale(LC_TIME, 'INDONESIAN');
    date_default_timezone_set('Asia/Jakarta');
    
    include "../connection.php";
    
    //$currentLocal = setlocale(LC_ALL, 0);
    //echo $currentLocal; //outputs C/en_US.UTF-8/C/C/C/C on my machine

    if(isset($_POST['bayar'])) {
        
        $idpendaftaran = mysqli_real_escape_string($koneksi, $_POST['id_pendaftaran']);
        $tglpembayaran = date("Y-m-d H:i:s");
        $totalbayar = $_POST['jumlah_bayar'];
        //$namaperusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
        //$namaproduk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
        //$jenisproduk = $_POST['jenis_produk'];
        //$namapengunjung = mysqli_real_escape_string($koneksi, $_POST['nama_pengunjung']);
        //echo $tglpembayaran;
        $insert = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pendaftaran, total_bayar, tanggal_bayar) VALUES ('".$idpendaftaran."','".$totalbayar."','".$tglpembayaran."'");
        //$update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."', nama_pengunjung = '".$namapengunjung."' WHERE id_pengunjung = '".$idpendaftaran."'");
        
        if($insert) {
            header("location: ../adminpembayaran/?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../adminpembayaran/?error");
        }
    }

?>