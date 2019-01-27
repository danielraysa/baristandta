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
        $insert = mysqli_query($koneksi, "INSERT INTO pembayaran (id_pendaftaran, total_bayar, tanggal_bayar, status_bayar) VALUES ('".$idpendaftaran."','".$totalbayar."','".$tglpembayaran."', 1)");
        //$update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."', nama_pengunjung = '".$namapengunjung."' WHERE id_pengunjung = '".$idpendaftaran."'");
        
        if($insert) {
            header("location: ../adminpembayaran/?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../adminpembayaran/?error");
        }
    }

    if(isset($_POST['update'])) {
        $idpendaftaran = $_POST['id_pendaftaran'];
        $namaperusahaan = $_POST['nama_perusahaan'];
        $namaproduk = $_POST['nama_produk'];
        $jml_bayar = $_POST['jml_bayar'];
        $update1 = mysqli_query($koneksi, "UPDATE pembayaran SET total_bayar = ".$jml_bayar." WHERE id_pendaftaran = '".$idpendaftaran."'");
        $update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."' WHERE id_pengunjung = '".$idpendaftaran."'");
        $update3 = mysqli_query($koneksi, "UPDATE pendaftaran SET nama_produk = '".$namaproduk."' WHERE id_pendaftaran = '".$idpendaftaran."'");
        if($update1 && $update2 && $update3) {
            header("location: ../adminpembayaran/index.2.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../adminpembayaran/index.2.php?error");
        }
    }    

?>