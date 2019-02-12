<?php
    
    header('Content-Type: application/vnd-ms-excel');
    //header('Default-Charset : utf-8');
    //header('Content-Disposition: attachment; filename=download.xls');
    if (isset($_GET['layanan'])) {
        header('Content-Disposition: attachment; filename=Laporan Layanan.xls');
	    include "data-excel.php";
    }
    if (isset($_GET['produk'])) {
        header('Content-Disposition: attachment; filename=Laporan Produk.xls');
	    include "data-excel-produk.php";
    }
?>