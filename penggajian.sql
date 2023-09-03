-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2023 at 11:15 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`) VALUES
(1, 'Marketing'),
(2, 'HRD'),
(3, 'Manager'),
(4, 'Staff'),
(5, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `status_karyawan` enum('tetap','kontrak','magang','') NOT NULL,
  `bagian_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `nama`, `tanggal_mulai`, `gaji_pokok`, `status_karyawan`, `bagian_id`) VALUES
('0001', 'WACHID', '2022-10-01', 3100000, 'tetap', 3),
('0002', 'DWI', '2011-01-05', 3100000, 'tetap', 2),
('0003', 'TRIO', '2011-01-05', 2900000, 'tetap', 1),
('0004', 'ARBA', '2015-09-09', 2400000, 'kontrak', 1),
('0005', 'PANCA', '2019-09-09', 2200000, 'kontrak', 1),
('0006', 'SITI', '2021-09-16', 1500000, 'magang', 1),
('0008', 'WINDU', '2018-08-08', 1300000, 'kontrak', 1),
('0009', 'NINO', '2022-01-05', 1000000, 'tetap', 1),
('0011', 'EVAN', '2022-01-05', 1000000, 'magang', 1),
('0012', 'TIWI', '2022-12-31', 1234567, 'magang', 1),
('44242424', 'fula', '2023-01-17', 1000000, 'magang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id` int(11) NOT NULL,
  `karyawan_nik` varchar(20) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `bulan` char(2) DEFAULT NULL,
  `gaji_bayar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id`, `karyawan_nik`, `tahun`, `bulan`, `gaji_bayar`) VALUES
(1, '0001', 2015, '07', 1000000),
(2, '0002', 2015, '07', 1000000),
(3, '0001', 2015, '08', 1000000),
(4, '0002', 2015, '08', 1000000),
(5, '0001', 2015, '09', 1200000),
(6, '0002', 2015, '09', 1200000),
(7, '0003', 2016, '09', 1000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `bagian_id` (`bagian_id`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
