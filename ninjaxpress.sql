-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 10:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ninjaxpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` varchar(100) NOT NULL,
  `passwordadmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `passwordadmin`) VALUES
('admin1', 'admin1'),
('admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `namacs` varchar(50) NOT NULL,
  `idcs` varchar(5) NOT NULL,
  `alamatcs` varchar(50) NOT NULL,
  `nohpcs` varchar(20) NOT NULL,
  `passwordcs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cs`
--

INSERT INTO `cs` (`namacs`, `idcs`, `alamatcs`, `nohpcs`, `passwordcs`) VALUES
('Rudi', 'CUS01', 'Jalan A', '087777777711', '123'),
('Budi', 'CUS02', 'Jalan B', '087777777722', '123'),
('Juki', 'CUS03', 'Jalan C', '087777777733', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kurir`
--

CREATE TABLE `kurir` (
  `namakurir` varchar(30) NOT NULL,
  `idkurir` varchar(5) NOT NULL,
  `alamatkurir` varchar(50) NOT NULL,
  `nohpkurir` varchar(20) NOT NULL,
  `noplatkurir` varchar(10) NOT NULL,
  `passwordkurir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurir`
--

INSERT INTO `kurir` (`namakurir`, `idkurir`, `alamatkurir`, `nohpkurir`, `noplatkurir`, `passwordkurir`) VALUES
('Tio', 'KUR01', 'Jalan A', '08777777771', 'DK001RI', '123'),
('Rio', 'KUR02', 'Jalan B', '08777777771', 'DK002RI', '123'),
('Vio', 'KUR03', 'Jalan C', '08777777771', 'DK003RI', '123');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `namapelanggan` varchar(50) NOT NULL,
  `idpelanggan` varchar(5) NOT NULL,
  `alamatpelanggan` varchar(50) NOT NULL,
  `nohppelanggan` varchar(20) NOT NULL,
  `passwordpelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`namapelanggan`, `idpelanggan`, `alamatpelanggan`, `nohppelanggan`, `passwordpelanggan`) VALUES
('Anto', 'PEL01', 'Jalan A', '087777777778', '123'),
('Ari', 'PEL02', 'Jalan B', '087777777775', '123'),
('Agung', 'PEL03', 'Jalan V', '087777777776', '123'),
('Rew', 'PEL04', 'Jalan J', '087776586555', '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_paket`
--

CREATE TABLE `transaksi_paket` (
  `tanggal` varchar(20) NOT NULL,
  `idpelanggan` varchar(5) NOT NULL,
  `idcs` varchar(5) NOT NULL,
  `namapenerima` varchar(50) NOT NULL,
  `alamatpenerima` varchar(50) NOT NULL,
  `kodepospenerima` int(5) NOT NULL,
  `nohppenerima` varchar(20) NOT NULL,
  `beratpaket` int(10) NOT NULL,
  `ukuranpaket` int(10) NOT NULL,
  `biaya` varchar(20) NOT NULL,
  `noresi` varchar(20) NOT NULL,
  `statuspengiriman` varchar(20) NOT NULL,
  `estimasi` varchar(20) NOT NULL,
  `idkurir` varchar(5) NOT NULL,
  `idpengiriman` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_paket`
--

INSERT INTO `transaksi_paket` (`tanggal`, `idpelanggan`, `idcs`, `namapenerima`, `alamatpenerima`, `kodepospenerima`, `nohppenerima`, `beratpaket`, `ukuranpaket`, `biaya`, `noresi`, `statuspengiriman`, `estimasi`, `idkurir`, `idpengiriman`) VALUES
('15-06-2021', 'PEL01', 'CUS01', 'Den A', 'Jalan A', 80225, '081111111', 100, 100, '110000', 'RESI01', 'Sedang Dikirim', '18-06-2021', 'KUR01', 'DK001RI20062021'),
('15-06-2021', 'PEL01', 'CUS01', 'Den B', 'Jalan B', 80225, '081111112', 100, 100, '110000', 'RESI02', 'Sedang Dikirim', '18-06-2021', 'KUR01', 'DK001RI20062021'),
('15-06-2021', 'PEL01', 'CUS01', 'Den C', 'Jalan C', 80225, '081111113', 123, 123, '135300', 'RESI03', 'Selesai', '18-06-2021', 'KUR03', 'DK003RI20062021'),
('20-06-2021', 'PEL01', 'CUS01', 'Den D', 'Jalan D', 80229, '081111114', 123, 13, '124300', 'RESI04', 'Sedang Dikirim', '28-06-2021', 'KUR02', 'DK002RI20062021'),
('20-06-2021', 'PEL03', 'CUS02', 'Den E', 'Jalan E', 80229, '081111115', 123, 123, '135300', 'RESI05', 'Sedang Dikirim', '28-06-2021', 'KUR03', 'DK003RI20062021'),
('20-06-2021', 'PEL02', 'CUS02', 'Den F', 'Jalan F', 80119, '081111116', 123, 123, '135300', 'RESI06', 'Selesai', '28-06-2021', 'KUR03', 'DK003RI21062021'),
('20-06-2021', 'PEL02', 'CUS03', 'Den G', 'Jalan G', 80229, '081111117', 123, 123, '135300', 'RESI08', 'Sedang Diproses', '28-06-2021', 'KUR03', 'DK003RI21062021'),
('20-06-2021', 'PEL02', 'CUS02', 'Den H', 'Jalan H', 80229, '081111118', 123, 123, '135300', 'RESI09', 'Sedang Diproses', '28-06-2021', 'KUR03', 'DK003RI21062021'),
('21-06-2021', 'PEL03', 'CUS01', 'Erwin', 'Jalan T', 80115, '088888888777', 50, 100, '60000', 'RESI10', 'Sedang Dikirim', '13-07-2021', 'KUR01', 'DK001RI21062021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `cs`
--
ALTER TABLE `cs`
  ADD PRIMARY KEY (`idcs`);

--
-- Indexes for table `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`idkurir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `transaksi_paket`
--
ALTER TABLE `transaksi_paket`
  ADD PRIMARY KEY (`noresi`),
  ADD KEY `idpelanggan` (`idpelanggan`),
  ADD KEY `idcs` (`idcs`,`idkurir`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi_paket`
--
ALTER TABLE `transaksi_paket`
  ADD CONSTRAINT `transaksi_paket_ibfk_1` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_paket_ibfk_2` FOREIGN KEY (`idcs`) REFERENCES `cs` (`idcs`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
