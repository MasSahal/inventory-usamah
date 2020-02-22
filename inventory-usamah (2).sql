-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 11:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory-usamah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `email_anggota` varchar(20) NOT NULL,
  `tanggal_gabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_anggota`, `email_anggota`, `tanggal_gabung`) VALUES
(1, 'Sahal', 'sahal@mail.com', '2020-02-12'),
(3, 'Usamah', 'usamah@mail.com', '2020-02-12'),
(4, 'Ardie', 'ardi@mail.com', '2020-02-11'),
(5, 'user123', 'user123@localhost.co', '2020-02-11'),
(6, 'Arif', 'arif@mail.com', '2020-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang_buku` varchar(100) NOT NULL,
  `penerbit_buku` varchar(100) NOT NULL,
  `isbn_buku` int(20) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `dimensi_buku` varchar(20) NOT NULL,
  `stok_buku` int(50) NOT NULL,
  `sinopsis_buku` text NOT NULL,
  `foto_buku` varchar(50) NOT NULL,
  `tgl_masuk_buku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `judul_buku`, `pengarang_buku`, `penerbit_buku`, `isbn_buku`, `tahun_terbit`, `dimensi_buku`, `stok_buku`, `sinopsis_buku`, `foto_buku`, `tgl_masuk_buku`) VALUES
(1581456075, 'Hujan 2', 'Tere Liye', 'Gramedia', 12345678, '1948', '324', 731, 'sxdcfvgbhnj', '2019-01-20 (7).png', '2020-02-11'),
(1581456151, 'Hujan', 'Tere Liye', 'Gramedia', 345678, '1903', '78', 568, 'sdrtfyguijk', '2019-01-20 (9).png', '2020-02-11'),
(1581476623, 'Aku ', 'Tere Liye', 'Gramedia', 24432423, '2014', '1212121', 91, 'Tambah baru', '2019-01-20 (9).png', '2020-02-12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `detail_pinjaman` text NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `status_pinjaman` varchar(20) NOT NULL DEFAULT 'Pending',
  `jml_pinjaman` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjaman`, `id_buku`, `id_anggota`, `nama_peminjam`, `detail_pinjaman`, `tanggal_pinjaman`, `status_pinjaman`, `jml_pinjaman`) VALUES
(1, 1581456075, 3, 'Usamah', 'WWDW', '2020-02-21', 'Dikembalikan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_riwayat` date NOT NULL,
  `status_riwayat` varchar(20) NOT NULL,
  `ket_riwayat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_riwayat`
--

INSERT INTO `tb_riwayat` (`id_riwayat`, `id_buku`, `jumlah`, `tanggal_riwayat`, `status_riwayat`, `ket_riwayat`) VALUES
(1, 1581456075, 700, '2020-02-21', 'Pinjaman Buku', 'WWDW'),
(2, 1581456075, 700, '2020-02-21', 'Pengembalian', 'Pengembalian pinjaman sebanyak 700 buku');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1581476624;

--
-- AUTO_INCREMENT for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
