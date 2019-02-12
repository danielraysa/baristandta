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
        $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, a.id_layanan, a.status, p.asal_perusahaan, p.nama_pengunjung FROM antrian a JOIN pengunjung p ON a.id_pendaftaran = p.id_pengunjung WHERE a.id_pendaftaran = '".$username."'");
        if (mysqli_num_rows($query) == 1 && $password == "12345") {
            $fet = mysqli_fetch_array($query);
            $_SESSION['id_pengunjung'] = $username;
            header("location: ../pengunjung");
        }
        else {
            $query_admin = mysqli_query($koneksi, "SELECT p.id_pegawai, p.nama_pegawai, p.id_loket, l.jenis_loket FROM pegawai p JOIN loket l ON p.id_loket = l.id_loket WHERE p.id_pegawai = '".$username."'");
            if (mysqli_num_rows($query_admin) == 1 && $password == "12345"){
                $row = mysqli_fetch_array($query_admin);
                $_SESSION['id_pegawai'] = $username;
                $_SESSION['loket'] = $row['id_loket'];
                $_SESSION['jenis_loket'] = $row['jenis_loket'];
                $_SESSION['nama_pegawai'] = $row['nama_pegawai'];
                if($_SESSION['loket'] == "LKT001") {
                    header("location: ../admincs");    
                }
                if($_SESSION['loket'] == "LKT002") {
                    header("location: ../adminlayanan");
                }
                if($_SESSION['loket'] == "LKT003") {
                    header("location: ../adminpembayaran");
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
            */
            else if ($username == "kepalalab" && $password == "12345") {
                //$_SESSION['username'] = $username;
                header("location: ../kepalalab");
            }
            
            else {
                $_SESSION['error-msg'] = "Username/password salah, silahkan cek kembali";
                header("location: ../loginpengunjung/?error");
            }
        }   
    }
    
?>