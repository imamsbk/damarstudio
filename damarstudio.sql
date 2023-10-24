-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Oct 24, 2023 at 08:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `damarstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(1, 'imam subakir', 'imam', '$2y$10$Hvqo54G6lCPJiDt5S6i/t.EUgywhBriR/LhIob5Ydpy1n3w44CGne');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesan`
--

CREATE TABLE `tbl_pemesan` (
  `id_pemesan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(50) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesan`
--

INSERT INTO `tbl_pemesan` (`id_pemesan`, `id_produk`, `nama_pemesan`, `alamat`, `no_telpon`, `jumlah`, `metode_pembayaran`, `tanggal`, `waktu`) VALUES
(5, 17, 'imam', 'BEDAHAN. Bedahan. Sawangan. Kota Depok. Jawa Barat', '08976537698', '3', 'Transfer', '2023-10-24', '10:46:22'),
(6, 14, 'imam', 'BEDAHAN. Bedahan. Sawangan. Kota Depok. Jawa Barat', '08976537698', '5', 'Transfer', '2023-10-24', '11:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `kategori`, `harga`, `cover`, `tanggal`, `waktu`) VALUES
(14, 'a', 'Tradisional', '50000', 'Picsart_23-10-24_10-24-15-923.jpg', '2023-10-24', '10:13:59'),
(15, 'b', 'Tradisional', '50000', 'Picsart_23-10-24_10-25-57-460.jpg', '2023-10-24', '10:14:12'),
(16, 'c', 'Tradisional', '50000', 'Picsart_23-10-24_10-26-43-297.jpg', '2023-10-24', '10:14:56'),
(17, 'd', 'Tradisional', '50000', 'Picsart_23-10-24_10-27-22-600.jpg', '2023-10-24', '10:15:18'),
(18, 'e', 'Tradisional', '50000', 'Picsart_23-10-24_10-28-11-061.jpg', '2023-10-24', '10:15:34'),
(19, 'f', 'Tradisional', '50000', 'Picsart_23-10-24_10-28-40-578.jpg', '2023-10-24', '10:15:48'),
(20, 'g', 'Tradisional', '50000', 'Picsart_23-10-24_10-29-19-611.jpg', '2023-10-24', '10:16:02'),
(25, 'apa aja nih', 'Balet', '50000', 'Picsart_23-10-24_10-22-06-465.jpg', '2023-10-24', '11:31:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  ADD PRIMARY KEY (`id_pemesan`),
  ADD KEY `fk_pemesan_produk` (`id_produk`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  MODIFY `id_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  ADD CONSTRAINT `fk_pemesan_produk` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
