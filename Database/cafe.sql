-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 02:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `ID_Kasir` int(5) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID_Menu` int(5) NOT NULL,
  `Nama_Menu` varchar(30) NOT NULL,
  `Deskripsi` varchar(20) NOT NULL,
  `Harga` int(10) NOT NULL,
  `Kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID_Pelanggan` int(5) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `No_HP` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelayan`
--

CREATE TABLE `pelayan` (
  `ID_Pelayan` int(5) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `Posisi` varchar(20) NOT NULL,
  `Gaji` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `ID_Pesanan` int(5) NOT NULL,
  `ID_Menu` int(5) NOT NULL,
  `ID_Pelanggan` int(5) NOT NULL,
  `ID_Pelayan` int(5) NOT NULL,
  `Tanggal_Pemesanan` date NOT NULL,
  `Total_Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` int(5) NOT NULL,
  `Metode_Bayar` varchar(20) NOT NULL,
  `Tanggal_Transaksi` date NOT NULL,
  `Total_Bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`ID_Kasir`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_Menu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID_Pelanggan`);

--
-- Indexes for table `pelayan`
--
ALTER TABLE `pelayan`
  ADD PRIMARY KEY (`ID_Pelayan`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`ID_Pesanan`),
  ADD KEY `FK_Menu` (`ID_Menu`),
  ADD KEY `FK_Pelanggan` (`ID_Pelanggan`),
  ADD KEY `FK_Karyawan` (`ID_Pelayan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD CONSTRAINT `FK_Karyawan` FOREIGN KEY (`ID_Pelayan`) REFERENCES `pelayan` (`ID_Pelayan`),
  ADD CONSTRAINT `FK_Menu` FOREIGN KEY (`ID_Menu`) REFERENCES `menu` (`ID_Menu`),
  ADD CONSTRAINT `FK_Pelanggan` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `pelanggan` (`ID_Pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
