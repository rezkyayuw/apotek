-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 09:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek2`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'apoteker', 'Administrator'),
(2, 'karyawan', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu_to_pembelian`
--

CREATE TABLE `menu_to_pembelian` (
  `id_menu_to_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `tgl_beli` date NOT NULL,
  `tgl_dtng` date NOT NULL,
  `lead_times` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_to_pembelian`
--

INSERT INTO `menu_to_pembelian` (`id_menu_to_pembelian`, `id_pembelian`, `id_obat`, `banyak`, `grandtotal`, `tgl_beli`, `tgl_dtng`, `lead_times`, `id_status`) VALUES
(1, 3, 1, 1, 2000, '2020-11-12', '2020-11-14', 2, 1),
(2, 4, 6, 20, 20000, '2020-11-12', '2020-11-16', 4, 1),
(3, 5, 5, 10, 100000, '2020-11-12', '2020-11-15', 3, 1),
(4, 6, 5, 2, 100000, '2020-11-12', '2020-11-15', 3, 1),
(5, 7, 5, 200, 200000, '2020-11-12', '2020-11-15', 3, 1),
(6, 7, 3, 50, 40000, '2020-11-12', '2020-11-13', 1, 1),
(7, 7, 4, 50, 40000, '2020-11-12', '2020-11-13', 1, 1),
(16, 10, 10, 10, 100000, '2020-11-13', '2020-11-17', 4, 1),
(17, 11, 11, 3, 40000, '2020-11-14', '2020-11-17', 3, 1),
(18, 12, 9, 1, 30000, '2020-11-15', '2020-11-20', 5, 1),
(22, 20, 8, 2, 20000, '2020-11-17', '2020-11-23', 6, 1),
(23, 21, 9, 1, 10000, '2020-11-17', '2020-11-22', 5, 1),
(26, 23, 11, 1, 20000, '2020-11-18', '2020-11-22', 4, 1),
(33, 27, 3, 118, 500000, '2020-11-19', '2020-11-23', 4, 1),
(116, 115, 11, 109, 0, '2021-01-12', '2021-01-12', 4, 1),
(117, 116, 11, 109, 0, '2021-01-12', '0000-00-00', 0, 0),
(118, 117, 18, 1, 0, '2021-01-12', '0000-00-00', 0, 0),
(119, 119, 19, 1, 0, '2021-01-12', '0000-00-00', 0, 0),
(120, 119, 9, 329, 0, '2021-01-12', '0000-00-00', 0, 0),
(121, 120, 18, 12, 0, '2021-01-12', '0000-00-00', 3, 0),
(122, 120, 14, 1, 0, '2021-01-12', '0000-00-00', 0, 0),
(123, 121, 18, 1, 0, '2021-01-12', '0000-00-00', 0, 0),
(124, 121, 14, 1, 0, '2021-01-12', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu_to_penjualan`
--

CREATE TABLE `menu_to_penjualan` (
  `id_menu_to_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `grandtotal` int(11) NOT NULL,
  `tgl_beli` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_to_penjualan`
--

INSERT INTO `menu_to_penjualan` (`id_menu_to_penjualan`, `id_penjualan`, `id_obat`, `banyak`, `grandtotal`, `tgl_beli`) VALUES
(1, 1, 3, 1, 20000, '2020-11-12'),
(2, 1, 8, 1, 23000, '2020-11-12'),
(3, 2, 10, 1, 40000, '2020-11-12'),
(4, 2, 8, 1, 23000, '2020-11-12'),
(5, 3, 8, 1, 23000, '2020-11-12'),
(6, 3, 6, 1, 12000, '2020-11-12'),
(7, 5, 5, 0, 0, '2020-11-12'),
(8, 5, 6, 1, 12000, '2020-11-12'),
(9, 6, 6, 80, 960000, '2020-11-12'),
(10, 6, 8, 20, 460000, '2020-11-12'),
(11, 6, 3, 1, 20000, '2020-11-12'),
(12, 7, 6, 12, 144000, '2020-11-12'),
(13, 7, 3, 30, 600000, '2020-11-12'),
(14, 10, 3, 20, 400000, '2020-11-12'),
(15, 10, 10, 20, 800000, '2020-11-12'),
(16, 15, 8, 100, 2300000, '2020-11-12'),
(17, 18, 10, 1, 40000, '2020-11-12'),
(18, 18, 8, 1, 23000, '2020-11-12'),
(19, 19, 10, 3, 120000, '2020-11-12'),
(20, 21, 6, 30, 360000, '2020-11-12'),
(21, 20, 2, 1, 25000, '2020-11-12'),
(22, 22, 6, 20, 240000, '2020-11-12'),
(23, 23, 6, 5, 60000, '2020-11-12'),
(24, 24, 5, 6, 90000, '2020-11-12'),
(25, 25, 3, 160, 3200000, '2020-11-13'),
(26, 25, 9, 80, 1600000, '2020-11-13'),
(28, 26, 7, 70, 350000, '2020-11-13'),
(29, 27, 7, 6, 30000, '2020-11-13'),
(30, 28, 7, 2, 10000, '2020-11-13'),
(31, 29, 10, 1, 40000, '2020-11-13'),
(32, 30, 9, 1, 20000, '2020-11-13'),
(33, 30, 10, 1, 40000, '2020-11-13'),
(34, 30, 8, 1, 23000, '2020-11-13'),
(35, 31, 6, 2, 24000, '2020-11-14'),
(36, 32, 7, 3, 15000, '2020-11-15'),
(37, 33, 8, 1, 23000, '2020-11-15'),
(38, 33, 10, 1, 40000, '2020-11-15'),
(39, 34, 7, 1, 5000, '2020-11-16'),
(40, 38, 7, 1, 5000, '2020-11-17'),
(41, 39, 11, 1, 35000, '2020-11-17'),
(42, 40, 11, 3, 105000, '2020-11-17'),
(43, 37, 7, 2, 10000, '2020-11-17'),
(52, 41, 9, 1, 20000, '2020-11-17'),
(57, 45, 3, 20, 400000, '2020-11-18'),
(58, 36, 7, 2, 10000, '2020-11-19'),
(59, 44, 11, 1, 35000, '2020-11-19'),
(60, 47, 11, 2, 70000, '2020-11-19'),
(62, 47, 5, 1, 15000, '2020-11-19'),
(63, 48, 13, 1, 15000, '2020-11-19'),
(64, 49, 13, 2, 30000, '2020-11-19'),
(65, 50, 14, 1, 10000, '2020-11-19'),
(66, 51, 11, 30, 1050000, '2020-11-21'),
(67, 35, 10, 1, 40000, '2020-11-22'),
(68, 52, 11, -1, -35000, '2020-11-24'),
(69, 54, 7, 236, 1180000, '2020-11-24'),
(70, 55, 7, 1, 5000, '2020-11-24'),
(71, 57, 11, 1, 35000, '2020-11-25'),
(72, 58, 14, 7, 70000, '2020-11-26'),
(73, 61, 13, 7, 105000, '2020-11-26'),
(74, 59, 10, 3, 120000, '2020-11-26'),
(75, 63, 10, 2, 80000, '2020-11-30'),
(77, 66, 11, 1, 35000, '2020-12-04'),
(79, 65, 9, 1, 20000, '2020-12-11'),
(80, 64, 7, 2, 10000, '2020-12-11'),
(81, 67, 11, 1, 35000, '2020-12-11'),
(82, 53, 13, 15, 225000, '2020-12-11'),
(83, 68, 10, -1, -40000, '2020-12-21'),
(84, 69, 11, 1, 35000, '2020-12-22'),
(85, 71, 11, 2, 70000, '2020-12-22'),
(86, 73, 7, 2, 10000, '2020-12-25'),
(87, 72, 7, 5, 25000, '2020-12-25'),
(88, 52, 6, 1, 12000, '2020-12-25'),
(89, 74, 11, 1, 35000, '2020-12-25'),
(90, 75, 7, 5, 25000, '2020-12-25'),
(91, 76, 5, 2, 30000, '2020-12-25'),
(92, 77, 11, 1, 35000, '2020-12-25'),
(93, 78, 7, 3, 15000, '2020-12-25'),
(94, 79, 9, 1, 20000, '2020-12-25'),
(95, 79, 6, 1, 12000, '2020-12-25'),
(96, 80, 11, 1, 35000, '2020-12-25'),
(97, 81, 18, 1, 15000, '2020-12-25'),
(98, 82, 18, 1, 15000, '2020-12-25'),
(99, 83, 18, 1, 15000, '2020-12-25'),
(100, 84, 18, 1, 15000, '2020-12-25'),
(101, 85, 18, 1, 15000, '2020-12-25'),
(102, 86, 18, 1, 15000, '2020-12-25'),
(103, 87, 18, 1, 15000, '2020-12-25'),
(104, 88, 18, 2, 30000, '2020-12-25'),
(105, 89, 18, 1, 15000, '2020-12-25'),
(106, 90, 11, 1, 35000, '2020-12-25'),
(117, 97, 18, 1, 15000, '2021-01-12'),
(118, 99, 18, 1, 15000, '2021-01-12'),
(119, 100, 18, 1, 15000, '2021-01-12'),
(120, 101, 18, 1, 15000, '2021-01-12'),
(121, 102, 18, 1, 15000, '2021-01-12'),
(122, 103, 18, 1, 15000, '2021-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id_perusahaan` int(114) NOT NULL,
  `kode_perusahaan` varchar(114) NOT NULL,
  `nama_perusahaan` varchar(114) NOT NULL,
  `alamat_perusahaan` varchar(114) NOT NULL,
  `nama_pemilik` varchar(114) NOT NULL,
  `no_sipa` varchar(114) NOT NULL,
  `logo` varchar(114) NOT NULL DEFAULT 'logo.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `kode_perusahaan`, `nama_perusahaan`, `alamat_perusahaan`, `nama_pemilik`, `no_sipa`, `logo`) VALUES
(1, 'apotek', 'Apotek Qaureen Farma', 'Jl. Betoambari Kel. Lipu Kec. Betoambari, Baubau', 'Trysnah Yuyun Pratma Sari, S.Si., Apt', '440.23/Kota/01/XI/2018', 'logo-apotek-qaureen-farma-20201117-1605590580.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `table_kategori`
--

CREATE TABLE `table_kategori` (
  `id_kategori` int(114) NOT NULL,
  `nama_kategori` varchar(114) NOT NULL,
  `des_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_kategori`
--

INSERT INTO `table_kategori` (`id_kategori`, `nama_kategori`, `des_kategori`) VALUES
(1, 'Obat Bebas', 'Obat yang paling aman dikonsumsi, sehingga obat bebas dapat ditemui di berbagai toko'),
(2, 'Obat Keras', 'Obat yang hanya boleh diserahkan dengan resep dokter'),
(3, 'Obat Bebas Terbatas', 'Obat yang dapat dibeli bebas tanpa resep dokter di toko obat berizin'),
(6, 'Obat Psikotropika', 'Obat baik alamiah maupun sintetis bukan narkotika yang berkhasiat psikoaktif');

-- --------------------------------------------------------

--
-- Table structure for table `table_obat`
--

CREATE TABLE `table_obat` (
  `id_obat` int(114) NOT NULL,
  `kode_obat` varchar(114) NOT NULL,
  `nama_obat` varchar(114) NOT NULL,
  `penyimpanan` varchar(114) NOT NULL,
  `stok` int(114) NOT NULL,
  `unit` varchar(114) NOT NULL,
  `nama_kategori` varchar(114) NOT NULL,
  `kedaluwarsa` date NOT NULL,
  `harga_beli` int(114) NOT NULL,
  `harga_jual` int(114) NOT NULL,
  `nama_pemasok` varchar(114) NOT NULL,
  `lead_times` int(11) NOT NULL,
  `pcs` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_obat`
--

INSERT INTO `table_obat` (`id_obat`, `kode_obat`, `nama_obat`, `penyimpanan`, `stok`, `unit`, `nama_kategori`, `kedaluwarsa`, `harga_beli`, `harga_jual`, `nama_pemasok`, `lead_times`, `pcs`) VALUES
(1, '12312', 'PLANOTAB', 'RAK 1', 14, '3', '1', '2021-11-12', 4000, 6000, '3', 6, 20),
(2, '34656', 'EM KAPSUL', 'RAK 3', 30, '4', '1', '2021-11-28', 20000, 25000, '2', 4, 15),
(3, 'LB19016', 'BETADINE SOL 15 ML', 'RAK 2', 20, '1', '1', '2021-04-12', 18000, 20000, '3', 3, 1),
(4, 'MTNLGD9445', 'NEURALGIN RX', 'RAK 1', 90, '3', '2', '2021-07-18', 75000, 80000, '2', 6, 15),
(5, '90231', 'REGUMEN', 'RAK 3', 10, '1', '1', '2022-06-23', 10000, 15000, '3', 3, 1),
(6, '059604', 'FARIZOL', 'RAK 4', 18, '1', '1', '2022-12-12', 12000, 12000, '2', 4, 1),
(7, '8503583', 'MYCORAL TAB', 'RAK 1', 60, '4', '1', '2022-02-01', 15000, 20000, '3', 3, 22),
(9, '492094', 'BINOTAL', 'RAK 3', 34, '3', '1', '2021-03-23', 18000, 20000, '3', 4, 20),
(10, '903985', 'HOLIMOX', 'RAK 3', 14, '3', '2', '2021-04-20', 20000, 40000, '3', 6, 1),
(11, '2392345', 'PROSTAKUR', 'RAK 2', 25, '3', '1', '2021-02-13', 30000, 35000, '2', 4, 15),
(14, '420423', 'CTM', 'RAK 1', 14, '4', '1', '2021-12-22', 8000, 15000, '2', 2, 36),
(18, '383493', 'AMPLODIPIN', 'RAK 1', 5, '4', '2', '2021-12-19', 12000, 15000, '2', 3, 15),
(19, '0099', 'AMPISILIN', 'RAK 1', 24, '3', '1', '2021-12-25', 20000, 23000, '2', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_pemasok`
--

CREATE TABLE `table_pemasok` (
  `id_pemasok` int(114) NOT NULL,
  `nama_pemasok` varchar(114) NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_pemasok`
--

INSERT INTO `table_pemasok` (`id_pemasok`, `nama_pemasok`, `alamat`, `phone`) VALUES
(1, 'Belum di isi', 'Tidak diketahui', '081256789145'),
(2, 'PT. CAHAYA SATU SATU', 'Jl. Pajak No. 7 Kendari Sultra', '08132435564'),
(3, 'PT. DELTA BUTON', 'Jl. Betoambari', '081356788786');

-- --------------------------------------------------------

--
-- Table structure for table `table_pembelian`
--

CREATE TABLE `table_pembelian` (
  `id_pembelian` int(114) NOT NULL,
  `ref` varchar(114) NOT NULL,
  `grandtotal` int(114) NOT NULL,
  `nama_pemasok` varchar(114) NOT NULL DEFAULT '1',
  `tgl_beli` date NOT NULL,
  `jam_beli` time NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `verifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_pembelian`
--

INSERT INTO `table_pembelian` (`id_pembelian`, `ref`, `grandtotal`, `nama_pemasok`, `tgl_beli`, `jam_beli`, `id_user`, `id_status`, `verifikasi`) VALUES
(3, 'B202011023', 2000, '2', '2020-11-12', '02:24:10', 1, 1, 1),
(7, 'B202011037', 280000, '2', '2020-11-12', '03:09:26', 1, 1, 1),
(11, 'B202011129', 40000, '2', '2020-11-13', '12:41:05', 1, 1, 1),
(12, 'B2020110110', 30000, '2', '2020-11-15', '01:33:51', 1, 1, 1),
(26, 'B2020110416', 30000, '2', '2020-11-19', '04:12:27', 1, 1, 1),
(116, 'B202101126', 0, '2', '2021-01-12', '12:48:59', 1, 0, 1),
(117, 'B202101027', 0, '1', '2021-01-12', '02:49:28', 1, 0, 0),
(118, 'B202101028', 0, '1', '2021-01-12', '02:52:50', 1, 0, 0),
(119, 'B202101029', 0, '1', '2021-01-12', '02:53:32', 1, 0, 0),
(120, 'B2021010310', 0, '1', '2021-01-12', '03:13:49', 1, 0, 1),
(121, 'B2021010311', 0, '3', '2021-01-12', '03:19:33', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_penjualan`
--

CREATE TABLE `table_penjualan` (
  `id_penjualan` int(114) NOT NULL,
  `ref` varchar(114) NOT NULL,
  `nama_pembeli` varchar(114) DEFAULT NULL,
  `tgl_beli` date NOT NULL,
  `grandtotal` int(114) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jam_beli` time NOT NULL,
  `kembalian` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_penjualan`
--

INSERT INTO `table_penjualan` (`id_penjualan`, `ref`, `nama_pembeli`, `tgl_beli`, `grandtotal`, `id_user`, `jam_beli`, `kembalian`, `id_status`) VALUES
(5, 'J202011025', 'YTY', '2020-11-12', 612000, 1, '02:38:56', 0, 1),
(6, 'J202011022', NULL, '2020-11-12', 1440000, 1, '02:40:00', 0, 1),
(7, 'J202011023', 'EQE', '2020-11-12', 744000, 1, '02:40:38', 0, 1),
(10, 'J202011026', NULL, '2020-11-12', 1200000, 1, '02:41:56', 0, 1),
(15, 'J202011027', NULL, '2020-11-12', 2300000, 1, '02:43:38', 0, 1),
(18, 'J202011028', NULL, '2020-11-12', 63000, 1, '02:44:45', 0, 1),
(19, 'J202011029', NULL, '2020-11-12', 120000, 1, '02:45:30', 0, 1),
(20, 'J2020110210', NULL, '2020-11-12', 25000, 1, '02:45:57', 0, 1),
(21, 'J2020110211', NULL, '2020-11-12', 360000, 1, '02:47:39', 0, 1),
(22, 'J2020110212', NULL, '2020-11-12', 240000, 1, '02:50:08', 0, 1),
(23, 'J2020110213', NULL, '2020-11-12', 60000, 1, '02:50:49', 0, 1),
(24, 'J2020110314', NULL, '2020-11-12', 90000, 1, '03:05:23', 0, 1),
(25, 'J2020110513', NULL, '2020-11-13', 4800000, 1, '05:56:03', 0, 1),
(26, 'J2020110814', 'olfk', '2020-11-13', 350000, 1, '08:47:53', 0, 1),
(27, 'J2020110815', 'klfk', '2020-11-13', 30000, 1, '08:48:37', 0, 1),
(28, 'J2020110816', NULL, '2020-11-13', 10000, 1, '08:49:03', 0, 1),
(29, 'J2020110117', NULL, '2020-11-13', 40000, 1, '01:11:50', 10000, 1),
(30, 'J2020110118', NULL, '2020-11-13', 83000, 1, '01:18:51', 17000, 1),
(31, 'J2020111219', 'Nur', '2020-11-14', 24000, 1, '12:06:24', 0, 1),
(32, 'J2020111220', NULL, '2020-11-15', 15000, 1, '12:46:01', 0, 1),
(33, 'J2020110121', 'Noni', '2020-11-15', 63000, 1, '01:33:34', 0, 1),
(35, 'J2020111023', 'Yanti', '2020-11-16', 40000, 1, '10:47:13', 0, 1),
(47, 'J2020111233', 'Nanang', '2020-11-19', 85000, 1, '12:27:46', 0, 1),
(66, 'J2020121239', 'sinta', '2020-12-04', 35000, 1, '12:20:37', 0, 1),
(67, 'J2020120539', 'Nining', '2020-12-11', 35000, 1, '05:23:47', 5000, 1),
(72, 'J2020120741', 'Amel', '2020-12-22', 25000, 1, '07:12:49', 0, 1),
(80, 'J2020120729', 'Yuni', '2020-12-25', 35000, 1, '07:44:30', 0, 1),
(97, 'J2021010228', NULL, '2021-01-12', 0, 1, '02:49:57', 0, 0),
(98, 'J2021010229', NULL, '2021-01-12', 0, 1, '02:52:34', 0, 0),
(99, 'J2021010230', NULL, '2021-01-12', 15000, 1, '02:54:59', 0, 1),
(100, 'J2021010231', NULL, '2021-01-12', 15000, 1, '02:55:23', 0, 1),
(101, 'J2021010232', NULL, '2021-01-12', 15000, 1, '02:55:43', 0, 1),
(102, 'J2021010233', NULL, '2021-01-12', 15000, 1, '02:56:32', 0, 1),
(103, 'J2021010234', NULL, '2021-01-12', 15000, 1, '02:57:38', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `table_reoder_point`
--

CREATE TABLE `table_reoder_point` (
  `id_reorder_point` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `jml_aman` int(15) NOT NULL,
  `tgl_reorder_point` date NOT NULL,
  `jml_stok_sekarang` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_reoder_point`
--

INSERT INTO `table_reoder_point` (`id_reorder_point`, `id_obat`, `jml_aman`, `tgl_reorder_point`, `jml_stok_sekarang`, `id_status`) VALUES
(2, 6, 0, '2020-11-12', 1, 1),
(3, 5, 51, '2020-11-12', 4, 1),
(4, 3, 118, '2020-11-13', 28, 1),
(5, 7, 0, '2020-11-13', 2, 1),
(6, 9, 277, '2020-11-13', 61, 1),
(7, 7, 0, '2020-11-15', 0, 1),
(9, 7, 302, '2020-11-17', 0, 1),
(10, 7, 0, '2020-11-17', 0, 1),
(11, 9, 451, '2020-11-17', 62, 1),
(12, 7, 237, '2020-11-19', 0, 1),
(13, 13, 0, '2020-11-19', 3, 1),
(14, 11, 119, '2020-11-21', 49, 1),
(15, 8, 506, '2020-11-22', 26, 1),
(18, 14, 15, '2020-11-26', 0, 1),
(19, 13, 15, '2020-11-26', 0, 1),
(20, 10, 102, '2020-11-26', 80, 1),
(21, 9, 451, '2020-12-11', 62, 1),
(22, 7, 904, '2020-12-11', 884, 1),
(23, 13, 48, '2020-12-11', 0, 1),
(35, 22, 0, '2021-01-12', 1, 1),
(36, 11, 109, '2021-01-12', 24, 1),
(39, 11, 109, '2021-01-12', 25, 0),
(40, 9, 329, '2021-01-12', 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `table_unit`
--

CREATE TABLE `table_unit` (
  `id_unit` int(114) NOT NULL,
  `unit` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_unit`
--

INSERT INTO `table_unit` (`id_unit`, `unit`) VALUES
(1, 'Botol'),
(3, 'Box'),
(4, 'Pack'),
(9, 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `repassword` varchar(114) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `jk` varchar(1) NOT NULL DEFAULT 'l',
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `repassword`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `jk`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$10$OAveGPL1KQT98ZAkJnXS8.EWOivWYWbKyWTgBd7pGk4LwSHsAmyTy', 'password', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1611821007, 1, 'Admin', 'istrator', 'l', '1', '081567845672'),
(2, '::1', 'Musniaa', '$2y$10$JYOmft7mVwEmFWxwHs5wXOdqKXBtUClu8m4U8gnq/wUKOjJb31V1C', '12345', 'r3zkywulandari@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1605442556, 1605444849, 1, 'Musnia', 'Nia', 'p', '1', '081356734590'),
(7, '::1', 'Caroline', '$2y$10$Nf79QigcoVKlbdrZUTShi.iz64Flb6a8jDbrtbg4shyJ2OaV5S/pi', '1234', 'r3zkywulanndari@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1605602236, NULL, 1, 'Chinthya Frodelin', 'Frodelin', 'p', '1', '081234567890'),
(8, '::1', 'Nurhayati', '$2y$10$ceQYPjWLcKRoZnB8uo3unedSZT1V4.EayajYV9PS05Xj0PMDiPNPu', 'Nurr', 'noynui84@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1605675844, 1606749542, 1, 'Nur', 'hayati', 'l', '1', '082367838960');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(41, 1, 1),
(39, 2, 2),
(44, 7, 2),
(42, 8, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_to_pembelian`
--
ALTER TABLE `menu_to_pembelian`
  ADD PRIMARY KEY (`id_menu_to_pembelian`);

--
-- Indexes for table `menu_to_penjualan`
--
ALTER TABLE `menu_to_penjualan`
  ADD PRIMARY KEY (`id_menu_to_penjualan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `table_kategori`
--
ALTER TABLE `table_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `table_obat`
--
ALTER TABLE `table_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `table_pemasok`
--
ALTER TABLE `table_pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indexes for table `table_pembelian`
--
ALTER TABLE `table_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `table_penjualan`
--
ALTER TABLE `table_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `table_reoder_point`
--
ALTER TABLE `table_reoder_point`
  ADD PRIMARY KEY (`id_reorder_point`);

--
-- Indexes for table `table_unit`
--
ALTER TABLE `table_unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menu_to_pembelian`
--
ALTER TABLE `menu_to_pembelian`
  MODIFY `id_menu_to_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `menu_to_penjualan`
--
ALTER TABLE `menu_to_penjualan`
  MODIFY `id_menu_to_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id_perusahaan` int(114) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_kategori`
--
ALTER TABLE `table_kategori`
  MODIFY `id_kategori` int(114) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_obat`
--
ALTER TABLE `table_obat`
  MODIFY `id_obat` int(114) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `table_pemasok`
--
ALTER TABLE `table_pemasok`
  MODIFY `id_pemasok` int(114) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `table_pembelian`
--
ALTER TABLE `table_pembelian`
  MODIFY `id_pembelian` int(114) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `table_penjualan`
--
ALTER TABLE `table_penjualan`
  MODIFY `id_penjualan` int(114) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `table_reoder_point`
--
ALTER TABLE `table_reoder_point`
  MODIFY `id_reorder_point` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `table_unit`
--
ALTER TABLE `table_unit`
  MODIFY `id_unit` int(114) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
