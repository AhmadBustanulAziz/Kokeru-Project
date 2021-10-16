-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 05:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kokeru`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `password`) VALUES
(1, 'adis', 'adis@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(11) UNSIGNED NOT NULL,
  `id_kar` int(11) UNSIGNED DEFAULT NULL,
  `id_ruang` int(11) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idkaryawan` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `nama`, `email`, `password`) VALUES
(1, 'sulthan fadli', 'sulthan@karyawan.com', '9e014682c94e0f2cc834bf7348bda428'),
(2, 'Rezza Aldy', 'rezza@karyawan.com', '67eb145dd1f03780c6aa051027033a9c'),
(3, 'Yulian Adi', 'yulian@karyawan.com', '9e014682c94e0f2cc834bf7348bda428'),
(4, 'andra nugraha', 'andra@karyawan.com', '9e014682c94e0f2cc834bf7348bda428');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `idlaporan` int(11) UNSIGNED NOT NULL,
  `id_ruang` int(11) UNSIGNED NOT NULL,
  `id_karyawan` int(11) UNSIGNED NOT NULL,
  `id_jadwal` int(11) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `file1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `file2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `file3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `file4` varchar(255) CHARACTER SET utf8 NOT NULL,
  `file5` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` enum('sudah','belum') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `idruang` int(11) UNSIGNED NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idkaryawan` int(11) NOT NULL,
  `status` varchar(6) NOT NULL,
  `foto` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`idruang`, `nama`, `idkaryawan`, `status`, `foto`) VALUES
(1, '104', 1, 'BELUM', ''),
(2, '105', 2, 'BELUM', ''),
(3, '123', 4, 'BELUM', ''),
(4, '143', 1, 'BELUM', ''),
(5, '183', 2, 'BELUM', ''),
(6, '129', 3, 'BELUM', ''),
(7, '122', 3, 'BELUM', ''),
(8, '163', 4, 'BELUM', ''),
(9, '149', 2, 'BELUM', ''),
(10, '113', 3, 'BELUM', ''),
(11, '139', 1, 'BELUM', ''),
(12, '153', 4, 'BELUM', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`),
  ADD KEY `id_kar` (`id_kar`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idlaporan`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`idruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idkaryawan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idlaporan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `idruang` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kar`) REFERENCES `karyawan` (`idkaryawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`idruang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`idjadwal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
