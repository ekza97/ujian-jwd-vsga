-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 28, 2022 at 03:17 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_jwd`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `nama` varchar(64) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `nama`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '$2y$10$MwT7hqkd6RgMeE9ruLfqEOGezSIZi6SUFiI2/R2qQcI.fTBkRIUoO');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idpesanan` int(11) NOT NULL,
  `nama_lengkap` varchar(64) DEFAULT NULL,
  `no_identitas` varchar(32) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jml_dewasa` int(11) DEFAULT NULL,
  `jml_anak` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `wisata_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idpesanan`, `nama_lengkap`, `no_identitas`, `no_hp`, `tanggal`, `jml_dewasa`, `jml_anak`, `total_bayar`, `wisata_id`) VALUES
(4, 'asdasd', '1231231323123123', '082248577297', '2022-07-28', 2, 2, 45000, 0),
(5, 'Saya', '1232131231231232', '123123123231', '2022-07-28', 2, 1, 1250000, 0),
(6, 'Dian Okta', '1231231231231232', '123123123231', '2022-07-28', 1, 0, 15000, 0),
(7, 'Eka', '9132312312312312', '082248577297', '2022-07-28', 2, 1, 11250000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `idwisata` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`idwisata`, `nama`, `alamat`, `harga`) VALUES
(4, 'Gunung Botak', 'Manokwari Selatan', 500000),
(5, 'Pantai Pasir Putih', 'Manokwari', 15000),
(6, 'Pintu Angin', 'Manokwari Selatan', 500000),
(9, 'Raja Ampat', 'Raja Ampat', 4500000);

-- --------------------------------------------------------

--
-- Table structure for table `wisata_galery`
--

CREATE TABLE `wisata_galery` (
  `idwisata_galery` int(11) NOT NULL,
  `file` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `wisata_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wisata_galery`
--

INSERT INTO `wisata_galery` (`idwisata_galery`, `file`, `keterangan`, `wisata_id`) VALUES
(4, 'Galeri File-20220728194533.jpeg', 'Foto 1', 0),
(8, 'z4PXDABK43w', 'Video 1', 0),
(9, 'Q-OWraAwJOE&t=19s', 'Video 2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idpesanan`),
  ADD KEY `fk_pesanan_wisata1_idx` (`wisata_id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`idwisata`);

--
-- Indexes for table `wisata_galery`
--
ALTER TABLE `wisata_galery`
  ADD PRIMARY KEY (`idwisata_galery`),
  ADD KEY `fk_wisata_galery_wisata_idx` (`wisata_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `idwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wisata_galery`
--
ALTER TABLE `wisata_galery`
  MODIFY `idwisata_galery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_pesanan_wisata1` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`idwisata`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wisata_galery`
--
ALTER TABLE `wisata_galery`
  ADD CONSTRAINT `fk_wisata_galery_wisata` FOREIGN KEY (`wisata_id`) REFERENCES `wisata` (`idwisata`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
