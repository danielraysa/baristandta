<?php
    session_start();
    include "../connection.php";
    if($_POST['username'] == "" || $_POST['password'] == "") {
        $_SESSION['error-msg'] = "Username/password tidak boleh kosong";
        header("location: ../loginpengunjung/?error");
    }
    else {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);
        $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, p.id_password, a.id_layanan, a.status, p.asal_perusahaan, p.nama_pengunjung FROM antrian a JOIN pengunjung p ON a.id_pendaftaran = p.id_pengunjung WHERE a.id_pendaftaran = '".$username."' AND p.id_password = '".$password."'");
        if (mysqli_num_rows($query) == 1) {
            $fet = mysqli_fetch_array($query);
            $_SESSION['id_pengunjung'] = $username;
            header("location: ../pengunjung");
        }
        else {
            //$query_admin = mysqli_query($koneksi, "SELECT p.id_pegawai, p.nama_pegawai, p.id_loket, l.jenis_loket FROM pegawai p JOIN loket l ON p.id_loket = l.id_loket WHERE p.id_pegawai = '".$username."'");
            $query_admin = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = '".$username."'");
            if (mysqli_num_rows($query_admin) == 1 && $password == "12345"){
                $row = mysqli_fetch_array($query_admin);
                $_SESSION['id_pegawai'] = $username;
                $_SESSION['loket'] = $row['id_loket'];
                if($_SESSION['loket'] == "LKT001") {
                    $_SESSION['admincs'] = true;
                    $_SESSION['nama_admincs'] = $row['nama_pegawai'];
                    header("location: ../admincs");    
                }
                if($_SESSION['loket'] == "LKT002") {
                    $_SESSION['adminlayanan'] = true;
                    $_SESSION['nama_adminlayanan'] = $row['nama_pegawai'];
                    header("location: ../adminlayanan");
                }
                if($_SESSION['loket'] == "LKT003") {
                    $_SESSION['adminpembayaran'] = true;
                    $_SESSION['nama_adminpembayaran'] = $row['nama_pegawai'];
                    header("location: ../adminpembayaran");
                }
                if($_SESSION['loket'] == "kepalalab") {
                    $_SESSION['kepalalab'] = true;
                    $_SESSION['nama_kepalalab'] = $row['nama_pegawai'];
                    header("location: ../kepalalab");
                }
            }
            /*
            if ($username == "Admin001" && $password == "12345") {
            //$_SESSION['username'] = $username;
                header("location: ../admincs");
            }
            else if ($username == "Admin002" && $password == "12345") {
                //$_SESSION['username'] = $username;
                header("location: ../adminlayanan");
            }
            else if ($username == "Admin003" && $password == "12345") {
                //$_SESSION['username'] = $username;
                header("location: ../adminpembayaran");
            }
            else if ($username == "Lab001" && $password == "12345") {
                //$_SESSION['username'] = $username;
                    header("location: ../labsertifikasi");
                }
            else if ($username == "kepalalab" && $password == "12345") {
                //$_SESSION['username'] = $username;
                header("location: ../kepalalab");
            }
            */
            else {
                $_SESSION['error-msg'] = "Username/password salah, silahkan cek kembali.";
                header("location: ../loginpengunjung/?error");
            }
        }   
    }
    
?>