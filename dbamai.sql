-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 08:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbamai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_namastandar`
--

CREATE TABLE `tb_namastandar` (
  `id_standar` int(10) NOT NULL,
  `nama_standar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_namastandar`
--

INSERT INTO `tb_namastandar` (`id_standar`, `nama_standar`) VALUES
(1, 'Standar 2: Kompetensi Lulusan'),
(2, 'Standar 3: Isi Pembelajaran '),
(3, 'Standar 4: Proses Pembelajaran '),
(4, 'Standar 5: Standar Penilaian Pembelajaran'),
(5, 'Standar 6: Standar Dosen dan Tenaga Kependidikan'),
(6, 'Standar 10: Standar Hasil Penelitian'),
(7, 'Standar 11: Standar Isi Penelitian'),
(8, 'Standar 12: Standar Proses Penelitian'),
(9, 'Standar 13: Standar Penilaian Penelitian'),
(10, 'Standar 14: Standar Peneliti'),
(11, 'Standar 18: Standar Hasil Pengabdian kepada Masyarakat'),
(12, 'Standar 19: Standar Isi Pengabdian kepada Masyarakat'),
(13, 'Standar 20: Standar Proses Pengabdian Kepada Masyarakat'),
(14, 'Standar 21: Standar Penilaian Pengabdian kepada Masyarakat'),
(15, 'Standar 22: Standar Pelaksana Pengabdian kepada Masyarakat'),
(16, 'Standar 26: Standar Kerja Sama'),
(17, 'Standar 27: Standar Kemahasiswaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `telp` varchar(30) DEFAULT NULL,
  `level` enum('s_admin','auditor','auditee','pimpinan') DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `tgl_daftar` varchar(20) DEFAULT NULL,
  `terakhir_login` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `jurusan`, `prodi`, `email`, `telp`, `level`, `status`, `tgl_daftar`, `terakhir_login`) VALUES
(1, 'itsagung', '202cb962ac59075b964b07152d234b70', 'Prasasti Agung', 'Manajemen Informatika', NULL, '-', '-', 's_admin', 'aktif', NULL, '28-11-2022 13:49:41'),
(13, 'admin', '202cb962ac59075b964b07152d234b70', 'Muhammad Prasasti Agung', 'Teknik Mesin', 'D4 Teknik Mesin Produksi dan Perawatan', 'bpsmisumsel@polsri.ac.id', '089688038383', 'auditor', 'aktif', '26-11-2022 12:28:03', '28-11-2022 13:37:10'),
(14, 'tes', '6e7906b7fb3f8e1c6366c0910050e595', 'tes', 'Teknik Elektro', 'D4 Teknik Telekomunikasi', '-', '-', 'auditor', 'aktif', '26-11-2022 12:28:50', NULL),
(17, 'auditee1', '202cb962ac59075b964b07152d234b70', 'Muhammad Raihan', 'Teknik Elektro', 'D4 Teknik Telekomunikasi', 'Admin@gmail.com', '0895-0212-7859', 'auditee', 'aktif', '28-11-2022 11:49:00', '28-11-2022 12:31:10'),
(18, 'ahmadzam', '202cb962ac59075b964b07152d234b70', 'Ahmad Zamheri', '-', '-', 'Agungmhd57@gmail.com', '089688038383', 'pimpinan', 'aktif', '28-11-2022 12:10:01', '28-11-2022 12:31:22'),
(19, 'Auditor1', '202cb962ac59075b964b07152d234b70', 'Auditor1', 'Manajemen Informatika', 'D4 Manajemen Informatika', '-', '-', 'auditor', 'aktif', '28-11-2022 13:19:41', '28-11-2022 13:23:58'),
(20, 'Auditor2', '202cb962ac59075b964b07152d234b70', 'Auditor2', 'Manajemen Informatika', 'D4 Manajemen Informatika', '-', '-', 'auditor', 'aktif', '28-11-2022 13:20:01', NULL),
(21, 'MI', '202cb962ac59075b964b07152d234b70', 'MI', 'Manajemen Informatika', 'D4 Manajemen Informatika', '-', '-', 'auditee', 'aktif', '28-11-2022 13:20:45', '28-11-2022 13:24:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_namastandar`
--
ALTER TABLE `tb_namastandar`
  ADD PRIMARY KEY (`id_standar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_namastandar`
--
ALTER TABLE `tb_namastandar`
  MODIFY `id_standar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
