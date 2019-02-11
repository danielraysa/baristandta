<?php
    include "../connection.php";
    
    $output = "";
	// untuk tulisan bercetak tebal silakan sesuaikan dengan detail database Anda
	// membuat koneksi
	//$koneksi = mysqli_koneksiect($servername, $username, $password, $database);
	//Akhir koneksi
    $query = mysqli_query($koneksi, "SELECT a.id_pendaftaran, p1.asal_perusahaan, p1.nama_pengunjung, p1.jabatan, p.nama_produk, p.jenis_produk, l.nama_layanan, a.masa_expired, a.status FROM antrian a JOIN pendaftaran p on a.id_pendaftaran = p.id_pendaftaran JOIN layanan l ON a.id_layanan = l.id_layanan JOIN pengunjung p1 ON a.id_pendaftaran = p1.id_pengunjung WHERE a.status = 'Tahap 4' AND a.hapus_data = 0");
    
    $output .= "
	<table border='1'>  
    <tr>
    <td><b>No</b></td>
	<td><b>ID Pendaftaran</td>
    <td><b>Nama Perusahaan</b></td>
    <td><b>Nama Pengunjung</b></td>
    <td><b>Jabatan</b></td>
    <td><b>Nama Produk</b></td>
    <td><b>Jenis Produk</b></td>
    <td><b>Jenis Sertifikasi</b></td>
    <td><b>Masa Expired</b></td>
    </tr>";
    $a = 1;
	while($row = mysqli_fetch_array($query)) {
	$output .= "
    <tr>
    <td>".$a."</td>
	<td>".$row['id_pendaftaran']."</td>
	<td>".$row['asal_perusahaan']."</td>
    <td>".$row['nama_pengunjung']."</td>
    <td>".$row['jabatan']."</td>
    <td>".$row['nama_produk']."</td>
    <td>".$row['jenis_produk']."</td>
    <td>".$row['nama_layanan'] ."</td>
    <td>".$row['masa_expired']." hari</td>
	</tr>
    ";
    $a++;
	}
    $output .= "</table>";
    echo $output;

?>