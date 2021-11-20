-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2021 at 06:31 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistempemesanan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` int(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_user`, `no_meja`, `tanggal_pemesanan`, `total_belanja`, `status`) VALUES
(64, 17, 90, '2021-11-20', 70000, 'Sudah dibayar'),
(65, 17, 90, '2021-11-20', 70000, 'Sudah dibayar'),
(66, 18, 8, '2021-11-20', 56000, 'Sudah dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan_produk`
--

CREATE TABLE `tb_pemesanan_produk` (
  `id_pemesanan_produk` int(50) NOT NULL,
  `id_pemesanan` int(50) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pemesanan_produk`
--

INSERT INTO `tb_pemesanan_produk` (`id_pemesanan_produk`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(55, 64, '7', 1),
(56, 64, '8', 1),
(57, 64, '9', 2),
(58, 65, '9', 2),
(59, 65, '8', 1),
(60, 65, '7', 1),
(61, 66, '7', 2),
(62, 66, '9', 1),
(63, 66, '15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_menu` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_menu`, `nama_menu`, `jenis_menu`, `stok`, `harga`, `gambar`) VALUES
(6, 'Bakso Urat', 'Makanan', 80, 12000, '5ff86f55cf2e4.jpg'),
(7, 'Mie Ayam', 'Makanan', 50, 13000, 'mieayam.jpg'),
(8, 'Mie Ayam Bakso', 'Makanan', 50, 17000, 'mieayambakso.jpg'),
(9, 'Ayam Bakar', 'Makanan', 45, 20000, 'ayambakar.jpg'),
(10, 'Lele Bakar', 'Makanan', 50, 12000, 'lele.jpg'),
(11, 'Nasi Goreng', 'Makanan', 78, 10000, 'nasgor.jpg'),
(12, 'Nasi Putih', 'Makanan', 100, 2000, 'nasi.jpeg'),
(13, 'Es Jeruk', 'Makanan', 55, 8000, 'esjeruk.jpg'),
(14, 'Jus Alpukat', 'Minuman', 50, 10000, 'juspukat.jpg'),
(15, 'Jus Mangga', 'Minuman', 50, 10000, 'jusmangga.jpg'),
(16, 'Teh Obeng', 'Minuman', 60, 5000, 'tehobeng.jpg'),
(17, 'Air Mineral', 'Minuman', 100, 4000, 'sanford.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama_lengkap`, `jenis_kelamin`, `tanggal_lahir`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', '66b65567cedbc743bda3417fb813b9ba', 'Laode Fardin1', 'Laki-Laki', '1996-07-14', 'Mamuju', '089560328673', 'admin'),
(18, 'ahmad', 'ae0444cc90e9f1c1abe3da7548fcfa5f', 'Ahmad', 'Laki-Laki', '2021-11-20', 'galesong utara', '085240330927', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tb_pemesanan_produk`
--
ALTER TABLE `tb_pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_pemesanan_produk`
--
ALTER TABLE `tb_pemesanan_produk`
  MODIFY `id_pemesanan_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_menu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
