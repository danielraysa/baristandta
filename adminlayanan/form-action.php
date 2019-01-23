<?php
    session_start();
    setlocale(LC_TIME, 'INDONESIAN');
    date_default_timezone_set('Asia/Jakarta');
    
    include "../connection.php";

    if(isset($_POST['daftar'])) {
        if($_POST['layanan_sertifikasi'] != "") {
            $antrian = mt_rand(1000000000,  mt_getrandmax());
            $is_unique = false;
            $idpendaftaran = mysqli_real_escape_string($koneksi, $_POST['id_pendaftaran']);
            $namaperusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
            //$namaproduk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
            //$jenisproduk = $_POST['jenis_produk'];
            $namalayanan = $_POST['layanan_sertifikasi'];
            $jabatan = $_POST['jabatan'];
            $expired = $_POST['expired'];
            $namapengunjung = mysqli_real_escape_string($koneksi, $_POST['nama_pengunjung']);
            while (!$is_unique) {
                $result = mysqli_query($koneksi, "SELECT no_antrian FROM antrian WHERE no_antrian = '".$antrian."' LIMIT 1");
                if (mysqli_num_rows($result) == 0) {
                    $is_unique = true;
                }
                else {
                    $antrian = mt_rand(1000000000,  mt_getrandmax());
                }
            }

            $insert = mysqli_query($koneksi, "INSERT INTO antrian (no_antrian, id_layanan, id_pendaftaran, masa_expired, status) VALUES ('".$antrian."','".$namalayanan."','".$idpendaftaran."', ".$expired.", 'Waiting')");
            $update = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."', nama_pengunjung = '".$namapengujung."', jabatan = '".$jabatan."' WHERE id_pengunjung = '".$idpendaftaran."'");

            if($insert && $update) {
                header("location: ../adminlayanan/index.1.php?success");
            }
            else {
                $_SESSION['error-msg'] = mysqli_error($koneksi);
                header("location: ../adminlayanan/index.1.php?error");
            }
            
        }
        else {
            $_SESSION['error-msg'] = "Jenis Layanan Sertifikasi kosong";
            header("location: ../adminlayanan/index.1.php?error");
        }
        
    }
    if (isset($_POST['update'])) {
        $idpendaftaran = mysqli_real_escape_string($koneksi, $_POST['id_pendaftaran']);
        $namaperusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
        $namaproduk = mysqli_real_escape_string($koneksi, $_POST['nama_produk']);
        $status = $_POST['status_sertifikasi'];
    
        $update = mysqli_query($koneksi, "UPDATE pendaftaran SET nama_produk = '".$namaproduk."' WHERE id_pendaftaran = '".$idpendaftaran."'");
        $update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."' WHERE id_pengunjung = '".$idpendaftaran."'");
        $update3 = mysqli_query($koneksi, "UPDATE antrian SET status = '".$status."' WHERE id_pendaftaran = '".$idpendaftaran."'");
        if($update && $update2 && $update3) {
        header("location: ../adminlayanan/index.2.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../adminlayanan/index.2.php?error");
        }
    }

?>