<?php
    session_start();
    include "../connection.php";
    
    $idpendaftaran = $_POST['id'];
    $tglpendaftaran = $_POST['penyerahan'];
    $tgldatang = $_POST['datang'];
    $namaperusahaan = $_POST['perusahaan'];
    $namaproduk = $_POST['produk'];
    $jenisproduk = $_POST['jenis'];
    $namapengunjung = $_POST['pengunjung'];
    
    $update = mysqli_query($koneksi, "UPDATE pendaftaran SET nama_produk = '".$namaproduk."', tanggal_penyerahan = '".$tglpendaftaran."' WHERE id_pendaftaran = '".$idpendaftaran."'");
    $update2 = mysqli_query($koneksi, "UPDATE pengunjung SET asal_perusahaan = '".$namaperusahaan."', nama_pengunjung = '".$namapengunjung."' WHERE id_pengunjung = '".$idpendaftaran."'");
    $_SESSION['kirim_query'] = "SELECT p.id_pendaftaran, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, p.tanggal_pendaftaran, p.tanggal_penyerahan, p1.nama_pengunjung FROM pendaftaran p JOIN pengunjung p1 ON p.id_pendaftaran = p1.id_pengunjung WHERE p.id_pendaftaran = '".$idpendaftaran."'";
    if($update && $update2) {
        //header("location: ../admincs/?success");
        //echo $idpendaftaran;
        $myObj = array('hasil' => true, 'id' => $idpendaftaran, 'query' => $_SESSION['kirim_query'], 'error' => '');
    }
    else {
        $error = mysqli_error($koneksi);
        //echo $error;
        $myObj = array('hasil' => false, 'id' => $idpendaftaran, 'query' => $_SESSION['kirim_query'], 'error' => $error);
        //header("location: ../admincs/?error");
    }

    $myJSON = json_encode($myObj);
    echo $myJSON;
?>