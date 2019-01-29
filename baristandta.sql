-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 04:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baristandta`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `no_antrian` varchar(10) NOT NULL,
  `id_layanan` varchar(10) NOT NULL,
  `id_pendaftaran` varchar(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `masa_expired` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `approval` int(11) NOT NULL,
  `hapus_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`no_antrian`, `id_layanan`, `id_pendaftaran`, `nama_produk`, `jenis_produk`, `nama_layanan`, `masa_expired`, `status`, `approval`, `hapus_data`) VALUES
('1288511894', 'LYN002', 'bxyMC50dFh', '', '', '', 100, 'Tahap 1', 0, 0),
('1457655291', 'LYN001', '7NSZ8VdXTU', '', '', '', 40, 'Tahap 3', 1, 0),
('1858539206', 'LYN002', 'qLtfHKxArq', '', '', '', 70, 'Tahap 1', 1, 0),
('3112180001', 'LYN001', 'gmFhJd2t0N', 'Ciki', 'Makanan/Minuman', 'Layanan Pengaduan', 60, 'Tahap 2', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` int(11) NOT NULL,
  `nama_pengunjung` varchar(50) NOT NULL,
  `asal_perusahaan` varchar(100) NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan`
--

INSERT INTO `keluhan` (`id`, `nama_pengunjung`, `asal_perusahaan`, `keluhan`) VALUES
(1, 'Rizky Kans', 'PT Maju Mundur', 'Prosedur yang ribet');

-- --------------------------------------------------------

--
-- Table structure for table `kinerja`
--

CREATE TABLE `kinerja` (
  `id_kinerja` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `angka_rating` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kinerja`
--

INSERT INTO `kinerja` (`id_kinerja`, `id_pegawai`, `angka_rating`, `keterangan`) VALUES
(1, 'LKT001', 5, 'Bagus'),
(2, 'LKT001', 3, 'kurang sip'),
(3, 'LKT001', 4, 'baik'),
(4, 'LKT001', 5, ''),
(5, 'LKT003', 5, 'Ramah'),
(6, 'LKT003', 4, 'baik'),
(7, 'LKT003', 5, ''),
(8, 'LKT003', 4, ''),
(9, 'LKT003', 5, 'Baik'),
(10, 'LKT003', 4, ''),
(11, 'LKT002', 4, ''),
(12, 'LKT002', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` varchar(10) NOT NULL,
  `jenis_lab` varchar(50) NOT NULL,
  `nama_lab` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `jenis_lab`, `nama_lab`) VALUES
('LAB001', 'Lab Makanan', 'Lab 001'),
('LAB002', 'Lab Minuman', 'Lab 002');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` varchar(10) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `tarif_layanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `tarif_layanan`) VALUES
('LYN001', 'Layanan Sertifikasi Makanan/Minuman', 100000),
('LYN002', 'Layanan Sertifikasi Non Makanan/Minuman', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `loket`
--

CREATE TABLE `loket` (
  `id_loket` varchar(10) NOT NULL,
  `id_layanan` varchar(10) NOT NULL,
  `jenis_loket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loket`
--

INSERT INTO `loket` (`id_loket`, `id_layanan`, `jenis_loket`) VALUES
('LKT001', 'LYN001', 'Loket Admin CS'),
('LKT002', 'LYN001', 'Loket Admin Layanan'),
('LKT003', 'LYN001', 'Loket Pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `id_loket` varchar(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `jenis_loket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_loket`, `nama_pegawai`, `jenis_loket`) VALUES
('PGW001', 'LKT001', 'Rizky', ''),
('PGW002', 'LKT002', 'Nanda', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_pendaftaran` varchar(10) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `tanggal_bayar` datetime NOT NULL,
  `status_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_pendaftaran`, `total_bayar`, `tanggal_bayar`, `status_bayar`) VALUES
(1, 'gmFhJd2t0N', 115000, '2019-01-24 02:19:37', 1),
(3, '7NSZ8VdXTU', 115000, '2019-01-24 02:39:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` varchar(10) NOT NULL,
  `id_loket` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `tanggal_penyerahan` date NOT NULL,
  `tanggal_pendaftaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_loket`, `id_pegawai`, `jenis_produk`, `nama_produk`, `tanggal_penyerahan`, `tanggal_pendaftaran`) VALUES
('7NSZ8VdXTU', '', '', 'Makanan/Minuman', 'Jajancoklat', '2019-01-24', '2019-01-17'),
('bxyMC50dFh', '', '', 'Non Makanan/Minuman', 'Pipa Karbon', '2019-01-31', '2019-01-25'),
('gmFhJd2t0N', 'LKT001', '', 'Makanan/Minuman', 'Ciki Tos', '2019-01-17', '2018-12-27'),
('qLtfHKxArq', '', '', 'Non Makanan/Minuman', 'Tali Rafia', '2019-01-31', '2019-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` varchar(10) NOT NULL,
  `id_kinerja` varchar(10) NOT NULL,
  `asal_perusahaan` varchar(50) NOT NULL,
  `nama_pengunjung` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `id_kinerja`, `asal_perusahaan`, `nama_pengunjung`, `jabatan`) VALUES
('7NSZ8VdXTU', '', 'PT Nyoblos Lagi', 'Mas Rizky', 'Pegawai'),
('bxyMC50dFh', '', 'PT Tahan Banting', 'Mas Dwi', 'Sekretaris'),
('gmFhJd2t0N', '', 'PT Nyemil Terus', 'Om Rizky', 'Bos'),
('qLtfHKxArq', '', 'PT Panjang Pendek', 'Mas Nugraha', 'Owner');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `id_layanan` varchar(10) NOT NULL,
  `no_antrian` varchar(10) NOT NULL,
  `id_pengunjung` varchar(10) NOT NULL,
  `id_lab` varchar(10) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jenis_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`no_antrian`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kinerja`
--
ALTER TABLE `kinerja`
  ADD PRIMARY KEY (`id_kinerja`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `loket`
--
ALTER TABLE `loket`
  ADD PRIMARY KEY (`id_loket`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kinerja`
--
ALTER TABLE `kinerja`
  MODIFY `id_kinerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
