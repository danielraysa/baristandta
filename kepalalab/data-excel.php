<?php
    session_start();
    include "../connection.php";
	date_default_timezone_set("Asia/Jakarta");
	setlocale (LC_TIME, 'INDONESIAN');
	$date = strftime("%d %B %Y", time());
    $output = "";
	// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
	// membuat koneksi
	//$koneksi = mysqli_koneksiect($servername, $username, $password, $database);
	//Akhir koneksi
	if($_GET['layanan'] == "all") {
		$query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, p1.asal_perusahaan, p1.nama_pengunjung, p.nama_produk, l.nama_layanan FROM antrian a JOIN pendaftaran p on a.id_pendaftaran = p.id_pendaftaran JOIN layanan l ON a.id_layanan = l.id_layanan JOIN pengunjung p1 ON a.id_pendaftaran = p1.id_pengunjung WHERE a.hapus_data = 0");
	}
	else {
		$query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, p1.asal_perusahaan, p1.nama_pengunjung, p.nama_produk, l.nama_layanan FROM antrian a JOIN pendaftaran p on a.id_pendaftaran = p.id_pendaftaran JOIN layanan l ON a.id_layanan = l.id_layanan JOIN pengunjung p1 ON a.id_pendaftaran = p1.id_pengunjung WHERE a.id_layanan = '".$_GET['layanan']."' AND a.hapus_data = 0");
	}
    $output .= "
	<table border='1'>
	<tr>
	<td colspan='6'><center><b>LAPORAN LAYANAN SERTIFIKASI</b></center></td>
	</tr>  
	<tr>
	<td colspan='6'>Tanggal: ".$date."</b></td>
	</tr>  
	<tr>
	<td><b>No</b></td>
	<td><b>ID Pendaftaran</b></td>
    <td><b>Nama Perusahaan</b></td>
    <td><b>Nama Pengunjung</b></td>
	<td><b>Nama Produk</b></td>
	<td><b>Jenis Sertifikasi</b></td>
	</tr>";
	$a = 1;
	while($row = mysqli_fetch_array($query)) {
	$output .= "
	<tr>
	<td>".$a."</td>
	<td>".$row['id_pendaftaran']."</td>
	<td>".$row['asal_perusahaan']."</td>
	<td>".$row['nama_pengunjung']."</td>
	<td>".$row['nama_produk']."</td>
	<td>".$row['nama_layanan'] ."</td>
	</tr>
	";
	$a++;
	}
    $output .= "</table>";
    echo $output;

?>