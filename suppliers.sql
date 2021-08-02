-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2021 at 09:29 AM
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
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `KodeSupplier` varchar(3) NOT NULL,
  `NamaSupplier` varchar(30) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Kota` varchar(20) NOT NULL,
  `Telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`KodeSupplier`, `NamaSupplier`, `Alamat`, `Kota`, `Telepon`) VALUES
('C03', 'PT. GUxxx xxx', 'MEKAR WANGI', 'BANDUNG', '022-5233xxx'),
('C04', 'PT. KAxxx xxx', '-', 'BANDUNG', '-'),
('C05', 'PT. BAxxx xxx', '-', 'BANDUNG', '022-6071xxx'),
('S01', 'PT. ANxxx', 'TAMIM', 'BANDUNG', '022-4231xxx'),
('S02', 'PT. ASxxx xxx', '-', 'BANDUNG', '08112223xxx'),
('S06', 'PT. WAxxx', 'TAMIM', 'BANDUNG', '022-4209xxx'),
('S07', 'PT. KOxxx', 'KOMP. DADALI', 'BANDUNG', '022-9112xxx'),
('S08', 'PT. SIxxx xxx', 'B.T.C D II', 'BANDUNG', '022-4204xxx'),
('S09', 'PT. SExxx xxx', 'DULATIP', 'BANDUNG', 'xxx'),
('S10', 'PT. KAxxx', 'MOH TOHA', 'BANDUNG', '022-5225xxx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`KodeSupplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
