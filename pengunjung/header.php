<?php
    session_start();
    include "../connection.php";
    if (!isset($_SESSION['id_pengunjung'])) {
        header("location:../loginpengunjung/");
    }
    $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, a.id_layanan, l.nama_layanan, a.status, p.asal_perusahaan, p.nama_pengunjung, pe.nama_produk, pe.jenis_produk FROM antrian a JOIN pendaftaran pe ON a.id_pendaftaran = pe.id_pendaftaran JOIN pengunjung p ON a.id_pendaftaran = p.id_pengunjung JOIN layanan l ON a.id_layanan = l.id_layanan WHERE a.id_pendaftaran = '".$_SESSION['id_pengunjung']."'");
    $fet = mysqli_fetch_array($query);
    $_SESSION['id_layanan'] = $fet['id_layanan'];
    $_SESSION['status_tahapan'] = $fet['status'];
    $_SESSION['nama_perusahaan'] = $fet['asal_perusahaan'];
    $_SESSION['nama_pengunjung'] = $fet['nama_pengunjung'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Halaman Pengunjung</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Sweetalert Css -->
    <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
