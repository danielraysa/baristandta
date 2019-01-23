<?php
    session_start();
    include "../connection.php";
    echo $_POST['username'];
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, a.id_layanan, a.status, p.asal_perusahaan, p.nama_pengunjung FROM antrian a JOIN pengunjung p ON a.id_pendaftaran = p.id_pengunjung WHERE a.id_pendaftaran = '".$username."'");
    if (mysqli_num_rows($query) == 1 && $password == "12345") {
        $fet = mysqli_fetch_array($query);
        $_SESSION['id_pengunjung'] = $username;
        header("location: ../pengunjung");
    }
    else {
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
        else if ($username == "Kepala001" && $password == "12345") {
            //$_SESSION['username'] = $username;
            header("location: ../kepalalab");
        }
        else {
            header("location: index.php?error");
        }
    }
    
    
?>