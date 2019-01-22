<?php
    session_start();
    include "../connection.php";
    echo $_POST['username'];
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, a.id_layanan, p.asal_perusahaan, p.nama_pengunjung FROM antrian a JOIN pengunjung p ON a.id_pendaftaran = p.id_pengunjung WHERE a.id_pendaftaran = '".$username."'");
    if (mysqli_num_rows($query) == 1 && $password == "12345") {
        $fet = mysqli_fetch_array($query);
        $_SESSION['id_pengunjung'] = $username;
        $_SESSION['id_layanan'] = $fet['id_layanan'];
        $_SESSION['status_tahapan'] = $fet['status'];
        header("location: ../pengunjung");
    }
    
    else {
        if (isset($username)) {
            if ($username == "Admin001" && $password == "12345") {
            //$_SESSION['username'] = $username;
                header("location: ../admincs");
            }
            if ($username == "Admin002" && $password == "12345") {
                //$_SESSION['username'] = $username;
                header("location: ../adminlayanan");
            }
            if ($username == "Admin003" && $password == "12345") {
                //$_SESSION['username'] = $username;
                header("location: ../adminpembayaran");
            }
            if ($username == "Lab001" && $password == "12345") {
                //$_SESSION['username'] = $username;
                    header("location: ../labsertifikasi");
                }
            if ($username == "Kepala001" && $password == "12345") {
                //$_SESSION['username'] = $username;
                header("location: ../kepalalab");
            }
        }
        else {
            header("location: index.php?error");
        }
    }
    
    
?>