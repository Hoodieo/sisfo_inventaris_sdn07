-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2021 at 09:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sk_sisfoinventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id` int(11) NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `nilai_aset` int(11) NOT NULL,
  `sumber_aset` varchar(20) NOT NULL,
  `kepemilikan` varchar(20) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `status_penggunaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_aset`
--

INSERT INTO `tb_aset` (`id`, `nama_aset`, `foto`, `jenis`, `qty`, `nilai_aset`, `sumber_aset`, `kepemilikan`, `kondisi`, `status_penggunaan`) VALUES
(1, 'Penghapus', '5ff456f613336_5ff456f61333a.jpg', 'Sarana', 1, 5700, 'APBN', 'Pribadi', 'Baik', 'Digunakan'),
(2, 'Penggaris 100cm', '', 'Sarana', 18, 6500, 'BOS', 'Pribadi', 'Baik', 'Digunakan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajuan_aset`
--

CREATE TABLE `tb_pengajuan_aset` (
  `id` int(11) NOT NULL,
  `nama_aset` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl_diajukan` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengajuan_aset`
--

INSERT INTO `tb_pengajuan_aset` (`id`, `nama_aset`, `qty`, `tgl_diajukan`, `keterangan`, `status`) VALUES
(1, 'Manekin Anatomi Tubuh', 3, '2021-01-05', 'Untuk mata pelajaran Biologi', 'Diajukan'),
(2, 'Komputer Kuantum', 10, '2021-03-03', 'Untuk menghitung keakuratan zodiak siswa', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '12345', 'Admin'),
(2, 'kepsek', '12345', 'Kepala Sekolah'),
(3, 'tatausaha', '12345', 'Tata Usaha'),
(4, 'guru', '12345', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penggunaan_aset`
--

CREATE TABLE `tb_penggunaan_aset` (
  `id` int(11) NOT NULL,
  `penanggung_jawab` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `tgl_serahkan` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_aset` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penggunaan_aset`
--

INSERT INTO `tb_penggunaan_aset` (`id`, `penanggung_jawab`, `qty`, `status`, `tgl_serahkan`, `tgl_kembali`, `keterangan`, `id_aset`, `id_user`) VALUES
(1, 'Budi Jamelah', 1, 'Dipinjamkan', '2021-01-05', NULL, 'Pak Toto, Mapel MTK', 2, 0),
(2, 'Susi Hyun', 3, 'Dipinjamkan', '2021-01-01', '2021-01-04', '', 1, 0),
(6, 'Kim Se Jeong', 1, 'Dikembalikan', '2021-03-07', '2021-03-09', 'Utk nabok kepala park seo joon', 1, 4),
(7, 'Bae Suzy', 1, 'Diproses', NULL, NULL, '', 1, 4),
(9, 'Dindin', 1, 'Ditolak', '2021-03-07', NULL, '', 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengajuan_aset`
--
ALTER TABLE `tb_pengajuan_aset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_username` (`username`);

--
-- Indexes for table `tb_penggunaan_aset`
--
ALTER TABLE `tb_penggunaan_aset`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengajuan_aset`
--
ALTER TABLE `tb_pengajuan_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_penggunaan_aset`
--
ALTER TABLE `tb_penggunaan_aset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
