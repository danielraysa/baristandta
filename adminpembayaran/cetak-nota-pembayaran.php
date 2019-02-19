<?php
session_start();
use setasign\Fpdi\Fpdi;
use setasign\fpdf;
require_once('../plugins/fpdf/fpdf.php');
require_once('../plugins/fpdi/src/autoload.php');

include '../connection.php';
$pdf = new setasign\Fpdi\Fpdi();
$pageCount = $pdf->setSourceFile('notapembayaran.pdf');
$pageId = $pdf->importPage(1);
$pdf->addPage();
$pdf->useImportedPage($pageId, 0, 0);
$pdf->SetTitle('Bukti Pembayaran');
setlocale (LC_TIME, 'INDONESIAN');
//$id = $_GET['id'];
$query = mysqli_query($koneksi, $_SESSION['bayar_query']);
$row = mysqli_fetch_array($query);
$tanggalbayar = strftime("%d %B %Y", strtotime($row['tanggal_bayar']));
$tanggalpenyerahan = strftime("%d %B %Y", strtotime($row['tanggal_penyerahan']));
$date = $row['tanggal_pendaftaran'];
$newdate = date('Y-m-d', strtotime("$date +7 day"));
$tanggaldatang = strftime("%d %B %Y", strtotime($newdate));

$pdf->SetFont('Times','B',13);
$pdf->Text(73, 60, $tanggalbayar);
$pdf->SetFont('Times','B',12);
$pdf->Text(82, 76, $row['id_pendaftaran']);
$pdf->SetFont('Times','',12);
$pdf->Text(82, 81, $tanggaldatang);
$pdf->Text(82, 86.5, $tanggalpenyerahan);
$pdf->Text(82, 91.5, $row['asal_perusahaan']);
$pdf->Text(82, 96, $row['nama_produk']);
$pdf->Text(82, 102, $row['jenis_produk']);
$pdf->Text(82, 107.5, $row['nama_pengunjung']);
//bayar
$pdf->Text(121, 117, "Rp. ".$row['total_bayar']);
$pdf->Output('I', 'BUKTI_PEMBAYARAN.pdf');
?>
