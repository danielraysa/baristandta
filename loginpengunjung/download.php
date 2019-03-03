<?php
session_start();
use setasign\Fpdi\Fpdi;
use setasign\fpdf;
require_once('../plugins/fpdf/fpdf.php');
require_once('../plugins/fpdi/src/autoload.php');

include '../connection.php';
$pdf = new setasign\Fpdi\Fpdi();
$pageCount = $pdf->setSourceFile('pendaftaran.pdf');
$pageId = $pdf->importPage(1);
$pdf->addPage();
$pdf->useImportedPage($pageId, 0, 0);
$pdf->SetTitle('Data Pendaftaran');
setlocale (LC_TIME, 'INDONESIAN');
//$id = $_GET['id'];
$query = mysqli_query($koneksi, $_SESSION['temp_query']);
$row = mysqli_fetch_array($query);

$date = strftime("%d %B %Y %T", strtotime($_SESSION['temp_date']));
$date2 = strftime("%T", strtotime($_SESSION['temp_date']." +5 minutes"));
$tanggaldaftar = strftime("%d %B %Y", strtotime($row['tanggal_pendaftaran']));
$pdf->SetFont('Times','',13);
$pdf->Text(80, 60, $tanggaldaftar);
$pdf->SetFont('Times','B',13);
$pdf->Text(80, 68, $date." - ".$date2);

$pdf->SetFont('Times','',12);
$pdf->SetXY(34,85);
//$pdf->Text(45, 90, $row['id_pendaftaran']);
$pdf->Cell(30,10,$row['id_pendaftaran'],0,1,'C');
//$pdf->drawTextBox(, 29, 50);
$pdf->SetXY(64,85);
//$pdf->Text(75, 90, $row['nama_produk']);
$pdf->Cell(36,10,$row['nama_produk'],0,1,'C');
$pdf->SetXY(101,85);
//$pdf->Text(113, 90, $row['jenis_produk']);
$pdf->Cell(40,10,$row['jenis_produk'],0,1,'C');
$pdf->SetXY(142,85);
$pdf->Cell(40,10,$row['asal_perusahaan'],0,1,'C');
//$pdf->drawTextBox($row['asal_perusahaan'], 29, 50);
$pdf->Output('I', 'DATA_PENDAFTARAN.pdf');
?>
