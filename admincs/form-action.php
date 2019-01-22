<?php
    session_start();
    include "../connection.php";
    
    if (isset($_POST['simpan'])) {
        $idpendaftaran = $_POST['id_pendaftaran'];
        $tglpendaftaran = substr($_POST['tanggal_penyerahan'], 0, 10);
        $namaperusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
        $namaproduk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
        $jenisproduk = $_POST['jenis_produk'];
        $namapengunjung = mysqli_real_escape_string($koneksi, $_POST['nama_pengunjung']);
        
        $update = mysqli_query($koneksi, "UPDATE pendaftaran SET nama_produk = '".$namaproduk."', tanggal_penyerahan = '".$tglpendaftaran."' WHERE id_pendaftaran = '".$idpendaftaran."'");
        $update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."', nama_pengunjung = '".$namapengunjung."' WHERE id_pengunjung = '".$idpendaftaran."'");
        if($update && $update2) {
        header("location: ../admincs/?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../admincs/?error");
        }
    }
    if (isset($_POST['update'])) {
        $idpendaftaran = $_POST['id_pendaftaran'];
        $namaperusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
        $namaproduk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
        $namapengunjung = mysqli_real_escape_string($koneksi, $_POST['nama_pengunjung']);
    
        $update = mysqli_query($koneksi, "UPDATE pendaftaran SET nama_produk = '".$namaproduk."' WHERE id_pendaftaran = '".$idpendaftaran."'");
        $update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."', nama_pengunjung = '".$namapengunjung."' WHERE id_pengunjung = '".$idpendaftaran."'");
        if($update && $update2) {
        header("location: ../admincs/index.2.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../admincs/index.2.php?error");
        }
    }
    if (isset($_POST['save-rating'])) {
        echo "rating : ".$_POST['stars'];
    }
    
?>