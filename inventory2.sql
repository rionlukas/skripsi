-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 04:28 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory2`
--

-- --------------------------------------------------------

--
-- Table structure for table `kain`
--

CREATE TABLE `kain` (
  `Kode Kain` varchar(10) NOT NULL,
  `Nama Kain` varchar(100) NOT NULL,
  `Jenis Kain` varchar(50) NOT NULL,
  `Harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kain`
--

INSERT INTO `kain` (`Kode Kain`, `Nama Kain`, `Jenis Kain`, `Harga`) VALUES
('010111A', 'BSY Muda 117', 'BSY - YES.31', 725000),
('010111B', 'BSY Tua 117', 'BSY- YES.31', 725000),
('010212', 'BSY Spirit Hitam / Putih', 'BSY - Spirit', 700000),
('010321', 'BSY Tua 120', 'BSY - MZM.31', 750000),
('010321-2', 'BSY Muda 120', 'BSY - MZM.31', 750000),
('0110103', 'Renda Kupu Besar', 'Renda - GP', 1500000),
('0110107', 'Renda Kupu Kecil', 'Renda - GP', 1400000),
('0110109', 'Renda Daun', 'Renda - GP', 1450000),
('011013A', 'Saten Bordir Two Tone', 'Saten Bordir Two Ton', 2000000),
('011035-2', 'Micro ADS', 'MICRO ADS CUCI 69', 1075000),
('011035-3', 'Micro ADS', 'MICRO ADS 78 GSM', 1150000),
('011051', 'Velvet Micro', 'VVT MICRO IMPORT PUT', 1350000),
('011051-1', 'Velvet Micro', 'VVT - MICRO IMP WARN', 1500000),
('011054C', 'Velvet Micro', 'VVT MICRO LOKAL WARN', 1200000),
('011054D', 'Velvet Micro', 'VVT MICRO LOKAL PTH/', 1005000),
('0230D11', 'Rayon Polos', 'RAYON POLOS KH PUTIH', 850000),
('11035', 'Micor ADS', 'MICRO - ADS CUCI 90 ', 1405000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kain`
--
ALTER TABLE `kain`
  ADD PRIMARY KEY (`Kode Kain`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
