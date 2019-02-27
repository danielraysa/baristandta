<?php
    session_start();
    setlocale(LC_TIME, 'INDONESIAN');
    date_default_timezone_set('Asia/Jakarta');
    
    include "../connection.php";

    if(isset($_POST['update-antrian'])) {

        $idpendaftaran = $_POST['id_pendaftaran'];
        $namaperusahaan = $_POST['nama_perusahaan'];
        $namaproduk = $_POST['nama_produk'];
        
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
            $_SESSION['success-msg'] = "<b>Success!</b> Berhasil update data";
            header("location: ../kepalalab/index.1.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../kepalalab/index.1.php?error");
        }
    }
    if(isset($_POST['delete'])) {
        $idpendaftaran = $_POST['id_pendaftaran'];
        $update = mysqli_query($koneksi, "UPDATE antrian SET hapus_data = 1 WHERE id_pendaftaran = '".$idpendaftaran."'");
        //$delete = mysqli_query($koneksi, "DELETE FROM antrian WHERE id_pendaftaran = '".$idpendaftaran."'");
        
        if($update) {
            $_SESSION['success-msg'] = "<b>Success!</b> Berhasil menghapus data";
            header("location: ../kepalalab/?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../kepalalab/?error");
        }
    }
    if(isset($_POST['delete-layanan'])) {
        $idpendaftaran = $_POST['id_pendaftaran'];
        $update = mysqli_query($koneksi, "UPDATE antrian SET hapus_data = 1 WHERE id_pendaftaran = '".$idpendaftaran."'");
        //$delete = mysqli_query($koneksi, "DELETE FROM antrian WHERE id_pendaftaran = '".$idpendaftaran."'");
        if($update) {
            $_SESSION['success-msg'] = "<b>Success!</b> Berhasil menghapus data";
            header("location: ../kepalalab/index.1.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../kepalalab/index.1.php?error");
        }
    }
    if(isset($_POST['delete-produk'])) {
        $idpendaftaran = $_POST['id_pendaftaran'];
        $update = mysqli_query($koneksi, "UPDATE antrian SET hapus_data = 1 WHERE id_pendaftaran = '".$idpendaftaran."'");
        //$delete = mysqli_query($koneksi, "DELETE FROM antrian WHERE id_pendaftaran = '".$idpendaftaran."'");
        if($update) {
            $_SESSION['success-msg'] = "<b>Success!</b> Berhasil menghapus data";
            header("location: ../kepalalab/index.3.php?success");
        }
        else {
            $_SESSION['error-msg'] = mysqli_error($koneksi);
            header("location: ../kepalalab/index.3.php?error");
        }
    }
    if(isset($_POST['approve'])) {
        $idpendaftaran = $_POST['id_approve'];
        $update = mysqli_query($koneksi, "UPDATE antrian SET status = target_status, approval = 1 WHERE id_pendaftaran = '".$idpendaftaran."'");
        //$update3 = mysqli_query($koneksi, "UPDATE antrian SET status = target_status WHERE id_pendaftaran = '".$idpendaftaran."'");
        $select = mysqli_query($koneksi, "SELECT * FROM antrian WHERE id_pendaftaran = '".$idpendaftaran."'");
        $row = mysqli_fetch_array($select);
        if ($row['status'] == "Tahap 4") {
            $cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '".$no_antrian."'");
            if (mysqli_num_rows($cek) == 0) {
                $insert = mysqli_query($koneksi, "INSERT INTO produk (id_produk, no_antrian, tanggal_sertifikasi) VALUES ('".$no_antrian."', '".$no_antrian."','".$date."')");
            }
        }
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