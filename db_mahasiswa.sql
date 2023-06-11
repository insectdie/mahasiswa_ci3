-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2023 at 04:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `kode_jurusan`, `nama_jurusan`) VALUES
(3, 'ME', 'Teknik Mesin'),
(4, 'KI', 'Teknik Komputer dan Informatika'),
(8, 'AK', 'Akuntansi'),
(10, 'SI', 'Teknik Sipil'),
(11, 'EK', 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `prodi_id` int(11) DEFAULT NULL,
  `kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `alamat`, `no_hp`, `jurusan_id`, `prodi_id`, `kelas`) VALUES
(1, '1805106', 'Surya Adi', 'Jl. Saudara, Medan', '081234567890', 10, 14, 'MRKG-'),
(2, '1805103', 'Muhammad Bima', 'Jl. Tritura No 582', '081263945586', 4, 3, 'MI-6D'),
(3, '1618046', 'Rani Yati', 'Jl. Terus', '089587876762', 8, 21, 'MICE-'),
(6, '1518044', 'Andry', 'Jl. Ancol', '0812871237671', 3, 6, 'ME-1D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id` int(11) NOT NULL,
  `kode_prodi` varchar(50) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id`, `kode_prodi`, `nama_prodi`, `jurusan_id`) VALUES
(3, 'MI', 'Manajemen Informatika', 4),
(4, 'CE', 'Teknik Komputer', 4),
(6, 'ME', 'Teknik Mesin', 3),
(7, 'MB', 'Manajemen Bisnis', NULL),
(8, 'AB', 'Administrasi Bisnis', NULL),
(11, 'MICE', 'Meeting, Incentive, Convention, and Exhibition', NULL),
(12, 'SI', 'Teknik Sipil', 10),
(13, 'TPJJ', 'Teknik Perancangan Jalan dan Jembatan', 10),
(14, 'MRKG', 'Manajemen Rekayasa Kontruksi Gedung', 10),
(15, 'EL', 'Teknik Listrik', 11),
(16, 'EK', 'Teknik Elektronika', 11),
(17, 'TK', 'Teknik Telekomunikasi', 11),
(18, 'TRMG', 'Teknik Rekayasa Multimedia Grafis', 4),
(19, 'TRPL', 'Teknik Rekayasa Perangkat Lunak', 4),
(20, 'AK', 'Akuntansi', 8),
(21, 'BK', 'Perbankan dan Keuangan', 8),
(22, 'AKP', 'Akuntansi Keuangan Publik', 8),
(23, 'PS', 'Keuangan dan Perbankan Syariah', 8),
(24, 'SIA', 'Sistem Informasi Akuntansi', 8),
(25, 'EN', 'Teknik Konversi Energi', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jurusan_mahasiswa` (`jurusan_id`),
  ADD KEY `fk_prodi_mahasiswa` (`prodi_id`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jurusan_prodi` (`jurusan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `fk_jurusan_mahasiswa` FOREIGN KEY (`jurusan_id`) REFERENCES `tb_jurusan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prodi_mahasiswa` FOREIGN KEY (`prodi_id`) REFERENCES `tb_prodi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD CONSTRAINT `fk_jurusan_prodi` FOREIGN KEY (`jurusan_id`) REFERENCES `tb_jurusan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
