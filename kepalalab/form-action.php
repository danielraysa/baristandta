<?php
    session_start();
    setlocale(LC_TIME, 'INDONESIAN');
    date_default_timezone_set('Asia/Jakarta');
    
    include "../connection.php";

    if(isset($_POST['update-antrian'])) {
        
        $idpendaftaran = mysqli_real_escape_string($koneksi, $_POST['id_pendaftaran']);
        $namaperusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
        $namaproduk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
        $update = mysqli_query($koneksi, "UPDATE pendaftaran SET nama_produk = '".$namaproduk."' WHERE id_pendaftaran = '".$idpendaftaran."'");
        $update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."' WHERE id_pengunjung = '".$idpendaftaran."'");
        
        if($update && $update2) {
            $_SESSION['success-msg'] = "<b>Success!</b> Berhasil update data";
            header("location: ../kepalalab/index.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../kepalalab/index.php?error");
        }
    }

    if (isset($_POST['update-layanan'])) {
        $idpendaftaran = mysqli_real_escape_string($koneksi, $_POST['id_pendaftaran']);
        $namaperusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
        $namaproduk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
        $update = mysqli_query($koneksi, "UPDATE pendaftaran SET nama_produk = '".$namaproduk."' WHERE id_pendaftaran = '".$idpendaftaran."'");
        $update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."' WHERE id_pengunjung = '".$idpendaftaran."'");
        
        if($update && $update2) {
        header("location: ../kepalalab/index.1.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../kepalalab/index.1.php?error");
        }
    }

    if(isset($_POST['approve'])) {
        $idpendaftaran = $_POST['id_approve'];
        $update = mysqli_query($koneksi, "UPDATE antrian SET approval = 1 WHERE id_pendaftaran = '".$idpendaftaran."'");
        
        if($update) {
            $_SESSION['success-msg'] = "<b>Success!</b> Berhasil approval data";
            header("location: ../kepalalab/index.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../kepalalab/index.php?error");
        }
    }

?>