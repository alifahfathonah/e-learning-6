-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 02:46 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jinno_demo_andreas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `crerated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `crerated_at`) VALUES
(1, 'Administrator', 'admin', '1234', '2017-10-21 19:47:45');

-- --------------------------------------------------------

--
-- Table structure for table `belajar`
--

CREATE TABLE `belajar` (
  `id` int(11) NOT NULL,
  `id_murid` int(50) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `harga` decimal(25,0) NOT NULL,
  `nilai` varchar(3) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belajar`
--

INSERT INTO `belajar` (`id`, `id_murid`, `id_guru`, `id_modul`, `harga`, `nilai`, `created_at`) VALUES
(7, 4, 8, 0, '150000', '90', '2017-10-21 19:55:19'),
(8, 3, 8, 0, '150000', '89', '2017-10-21 20:20:20'),
(9, 2, 7, 0, '30000', NULL, '2017-10-24 15:10:23'),
(10, 9, 12, 0, '250000', NULL, '2017-10-24 15:49:21'),
(11, 9, 12, 0, '150000', NULL, '2017-10-24 16:12:21'),
(12, 9, 11, 0, '275000', NULL, '2017-10-24 16:45:05'),
(13, 2, 8, 0, '70000', NULL, '2017-10-24 17:22:04'),
(14, 2, 11, 0, '175000', '95', '2017-10-24 17:22:55'),
(15, 3, 11, 0, '275000', NULL, '2017-10-24 18:41:06'),
(16, 3, 8, 0, '70000', NULL, '2017-10-24 18:43:15'),
(17, 3, 8, 0, '70000', NULL, '2017-10-24 18:43:21'),
(18, 3, 12, 0, '150000', NULL, '2017-10-24 18:47:32'),
(19, 8, 12, 0, '250000', NULL, '2017-10-25 11:55:41'),
(20, 8, 8, 0, '70000', NULL, '2017-10-25 11:55:56'),
(21, 8, 8, 0, '70000', NULL, '2017-10-25 11:58:04'),
(22, 2, 12, 0, '350000', NULL, '2017-10-26 08:35:40'),
(23, 2, 12, 0, '350000', NULL, '2017-10-26 08:38:46'),
(24, 2, 11, 0, '450000', NULL, '2017-10-26 10:19:11'),
(25, 2, 11, 0, '450000', NULL, '2017-10-26 10:27:45'),
(26, 9, 5, 0, '575000', '95', '2017-10-27 08:55:19'),
(27, 3, 5, 0, '350000', '87', '2017-10-27 09:01:48'),
(28, 9, 5, 0, '575000', NULL, '2017-10-27 09:27:57'),
(29, 10, 11, 0, '175000', NULL, '2017-10-28 11:26:16'),
(30, 10, 7, 0, '30000', NULL, '2017-10-28 11:26:52'),
(31, 10, 5, 0, '575000', NULL, '2017-10-28 11:30:55'),
(32, 11, 14, 0, '1500000', '10', '2017-10-29 16:17:16'),
(33, 9, 15, 0, '250000', '85', '2017-10-30 08:58:01'),
(34, 14, 14, 0, '1500000', NULL, '2017-10-30 09:34:42'),
(35, 15, 15, 0, '250000', '87', '2017-10-30 10:06:15'),
(36, 15, 7, 0, '650000', '89', '2017-10-30 11:52:11'),
(37, 9, 12, 0, '350000', '95', '2017-10-30 16:18:52'),
(38, 16, 17, 0, '685000', NULL, '2017-11-01 09:20:25'),
(39, 24, 7, 0, '650000', '95', '2017-11-02 10:49:46'),
(40, 16, 17, 0, '450000', NULL, '2017-11-02 13:08:08'),
(41, 16, 15, 0, '250000', NULL, '2017-11-02 16:17:48'),
(42, 25, 7, 0, '650000', '95', '2017-11-03 18:03:37'),
(43, 26, 16, 0, '750000', NULL, '2017-11-06 21:21:39'),
(44, 2, 7, 0, '30000', '98', '2017-11-07 09:15:30'),
(45, 27, 5, 0, '350000', '95', '2017-11-07 09:18:50'),
(46, 18, 7, 0, '650000', '95', '2017-11-07 10:56:37'),
(47, 26, 20, 0, '185000', '75', '2017-11-08 15:58:26'),
(48, 16, 2, 0, '250000', NULL, '2017-11-08 16:03:03'),
(49, 9, 21, 0, '5000000', NULL, '2017-11-09 16:44:22'),
(50, 9, 21, 0, '5000000', NULL, '2017-11-09 17:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `file_modul`
--

CREATE TABLE `file_modul` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pengalaman` text NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `ttd` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:belum,1:sudah',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nama`, `email`, `telp`, `password`, `tgl_lahir`, `pengalaman`, `deskripsi`, `foto`, `file`, `ttd`, `status`, `created_at`) VALUES
(1, 'Isal Iskandar', 'isal@gmail.com', '0898767654', '123', '2017-10-07', 'Saya pernah menjadi admin grup', 'Saya pernah menjadi admin grup', 'Positif_dan_Negatif_Internet.jpg', NULL, NULL, 1, '2017-10-14 22:28:00'),
(2, 'Muhammad Idrus', 'idrus@gmail.com', '0898987767', '123', '2017-10-07', 'saya bisa main bola', 'saya bisa main bola', 'images5.jpg', NULL, NULL, 2, '2017-10-15 07:12:35'),
(3, 'Fikri Hanavi', 'fikri@gmail.com', '0878765654', '123', '2017-10-07', 'saya biasa dakwah', 'saya biasa dakwah', 'photo.jpg', NULL, NULL, 1, '2017-10-15 11:57:39'),
(4, 'adham', 'adham@gmail.com', '0898778676', '123', '2017-10-21', 'saya biasa manggung', 'saya biasa manggung', 'male.png', NULL, NULL, 2, '2017-10-18 11:06:34'),
(5, 'nanang', 'nanang@gmail.com', '089876678765', '123', '2017-10-14', 'saya jomblo', 'saya jomblo', 'images2.jpg', NULL, NULL, 1, '2017-10-18 11:06:56'),
(6, 'gurna', 'gurna@gmail.com', '089876654', '123', '2017-10-14', 'saya adek fikri', 'saya adek fikri', 'unnamed.png', NULL, NULL, 2, '2017-10-18 11:07:19'),
(7, 'bayu', 'bayu@gmail.com', '087777654231', '123456', '2017-10-20', 'Aku sudah move on', 'yeyeye', 'images4.jpg', NULL, NULL, 1, '2017-10-21 15:44:21'),
(8, 'mulyani', 'muy@gmail.com', '085635678921', 'muy@gmail.com', '2017-10-18', 'kehidupan bermula dari awal', 'kehidupan bermula dari awal', '2.jpg', NULL, NULL, 1, '2017-10-21 19:46:31'),
(11, 'Haditya', 'aditya@gmail.com', '08787878787', '1', '2014-10-15', 'bulam pengalaman', 'pinter2 bodo', 'images_Hd.jpg', NULL, NULL, 1, '2017-10-24 15:25:38'),
(12, 'nanda', 'nanda@gmail.com', '081818181818', '1', '2017-10-26', 'bisa ngapa2 in ajah', 'masih single', '1.jpg', NULL, NULL, 1, '2017-10-24 15:35:52'),
(13, 'tirta', 'tirta@gmail.com', '081375638475', 'tirta@gmail.com', '0000-00-00', '', '', NULL, NULL, NULL, 1, '2017-10-29 06:27:44'),
(14, 'Jhon Lennon', 'jhon@gmail.com', '0878767656', 'jhon@gmail.com', '2017-10-07', 'Lorep isum du manama ahabad jakuns skuoa', 'lorep ismu koe ora iki moe kawe domo domo', 'images7.jpg', NULL, NULL, 1, '2017-10-29 16:08:15'),
(15, 'sunandar', 'sunandar@gmail.com', '08787878787', '1', '2017-11-02', 'Sangat pengalaman sekali', 'sekali sekali pengalaman', 'images6.jpg', NULL, NULL, 1, '2017-10-30 08:38:11'),
(16, 'jiwo', 'jiwo@gmail.com', '08136666666', '1', '1980-11-25', 'Jagoan IT', 'Saya sangat jago sekali', 'images1.jpg', NULL, NULL, 1, '2017-11-01 08:40:28'),
(17, 'kejon', 'kejon@gmail.com', '08456879546', '1', '1980-06-17', 'kurang jago IT', 'Saya sangat kurang sekali jago IT nya', 'images.jpg', NULL, NULL, 1, '2017-11-01 08:51:14'),
(19, 'yono', 'yono@gmail.com', '08456879546', '123', '0000-00-00', '', '', NULL, NULL, NULL, 1, '2017-11-07 09:16:38'),
(20, 'febri', 'febri20@gmail.com', '081312345678', '12', '2017-11-08', 'mau belajar', 'baik hati dan tidak sombong', 'images_EA.jpg', NULL, NULL, 1, '2017-11-08 15:39:23'),
(21, 'jos', 'josef30@gmail.com', '0817171717171', '1', '0000-00-00', '', '', NULL, NULL, NULL, 1, '2017-11-09 15:18:47');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL,
  `modul` varchar(100) NOT NULL,
  `harga` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `nama`, `email`, `telp`, `password`, `created_at`) VALUES
(1, 'tes', 'a@f', '3242', '123', '2017-10-14 22:24:06'),
(2, 'Reksi Vaisal', 'vaisalreksi@gmail.com', '08987876567', '123', '2017-10-15 07:11:59'),
(3, 'Andi', 'andi@gmail.com', '085722736738', '123', '2017-10-21 15:41:49'),
(4, 'Roni', 'roni@gmail.com', '08123456784', 'roni@gmail.com', '2017-10-21 19:45:34'),
(5, 'dsf', 'sfd@d', 'dsf', 'fsd', '2017-10-21 20:48:42'),
(6, 'jojon', 'jojon@j', '089765423123', 'jojon@j', '2017-10-21 21:04:16'),
(7, 'tes dummy', 'tes@gmail.com', '089877686', 'tes@gmail.com', '2017-10-23 10:26:48'),
(8, 'Adam', 'dimitry@limadigit.com', '089694316006', 'admin', '2017-10-24 14:58:25'),
(9, 'Susmoyo', 'susmoyo@gmail.com', '08787878787', '1', '2017-10-24 15:47:46'),
(10, 'Dmitry Adam Nugroho', 'dimitry.adam@jinno.id', '089', 'admin123', '2017-10-28 11:25:55'),
(11, 'Alan Warker', 'alan@gmail.com', '088888888', 'alan@gmail.com', '2017-10-29 16:04:54'),
(12, 'dada', 'ds@dfs.cm', '0878765654', '123', '2017-10-29 16:07:41'),
(13, 'desy', 'desy@gmail.com', '081818181818', '1', '2017-10-30 08:36:46'),
(14, 'jos', 'jos@gmail.com', '08787878787', '1', '2017-10-30 09:31:56'),
(15, 'adi', 'adi@gmail.com', '081818181818', '1', '2017-10-30 10:04:59'),
(16, 'roy', 'roy@gmail.com', '081312345678', '1', '2017-11-01 08:29:24'),
(18, 'jiwo', 'jiwo@gmail.com', '08136666666', '1', '2017-11-01 08:40:00'),
(20, 'vaisal', 'vaisal@gmail.com', '0878216', '123', '2017-11-02 08:27:58'),
(24, 'moyo', 'moyo@gmail.com', '081313434343', '1', '2017-11-02 10:47:53'),
(25, 'Zhambronk', 'amir@gmail.com', '0812678123', '1', '2017-11-03 18:00:49'),
(26, 'Riko harun', 'riko@gmail.com', '08787878787', '1', '2017-11-06 19:49:52'),
(27, 'rich', 'rich@gmail.com', '085454685456', '123', '2017-11-07 09:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_murid` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `crerated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `id_guru`, `id_murid`, `rating`, `deskripsi`, `crerated_at`) VALUES
(1, 14, 11, 4, 'makasih ya pak jon, kapan kapan kita ketmu,\n\neh ba', '2017-10-29 17:04:35'),
(2, 15, 9, 3, 'Modul nya cukup membantu kami', '2017-10-30 09:15:10'),
(3, 15, 15, 3, 'Oke mas materinya', '2017-10-30 10:50:36'),
(4, 7, 15, 3, 'Mantap pak materi nya', '2017-10-30 11:55:13'),
(5, 12, 9, 4, 'Oke bu materi pelajarannya oke banget', '2017-10-30 17:15:36'),
(6, 8, 2, 4, 'Sipo dah ahhh.... mantap materinya', '2017-10-31 10:57:03'),
(7, 8, 2, 4, 'Sipo dah ahhh.... mantap materinya', '2017-10-31 10:57:09'),
(8, 12, 2, 4, 'Materi yang sangat bagus sekali dan gurunya pandai', '2017-10-31 11:19:48'),
(9, 11, 2, 4, 'Mantaf materinya oke banget', '2017-10-31 11:23:21'),
(10, 17, 16, 5, 'Oke materi Cisco nya', '2017-11-01 09:24:16'),
(11, 7, 24, 4, 'oke', '2017-11-02 10:55:20'),
(12, 7, 24, 4, 'oke', '2017-11-02 10:55:25'),
(13, 17, 16, 5, 'Keren cara ngajarnya....!!!', '2017-11-02 16:16:10'),
(14, 15, 16, 2, 'Kurang oke materinya, rugi saya bayarnya', '2017-11-02 16:20:40'),
(15, 7, 25, 5, 'Oce', '2017-11-03 18:07:35'),
(16, 7, 2, 3, 'Boleh juga materi nya', '2017-11-07 09:22:22'),
(17, 5, 27, 4, 'Biasa aja materinya', '2017-11-07 09:23:09'),
(18, 7, 18, 4, 'Cukup banyak juga materi yang diberikan', '2017-11-07 13:29:35'),
(19, 16, 26, 2, 'Agak kurang berbobot materinya', '2017-11-08 15:36:02'),
(20, 20, 26, 3, 'Lumayanlah ....', '2017-11-08 16:05:10'),
(21, 2, 16, 3, 'Lumayan lah', '2017-11-08 20:50:51'),
(22, 21, 9, 3, 'comment', '2017-11-09 17:59:36');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_belajar` int(11) NOT NULL,
  `file` varchar(30) DEFAULT NULL,
  `status_verf` tinyint(1) NOT NULL COMMENT '0:belum verf, 1:sudah di verf oleh murid; 2 sudah di verf oleh admin',
  `status_clear` tinyint(1) NOT NULL COMMENT '0:belum, 1:sudah(murid), 2:sertifikat, 3:sudah di admin',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_verified` datetime DEFAULT NULL,
  `tgl_clear` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_belajar`, `file`, `status_verf`, `status_clear`, `created_at`, `updated_at`, `tgl_verified`, `tgl_clear`) VALUES
(1, 7, 'fahmy.png', 2, 3, '2017-10-21 19:55:19', '2017-10-21 20:10:57', '2017-10-21 19:56:04', '2017-10-21 20:10:57'),
(2, 8, 'fahmy.png', 2, 3, '2017-10-21 20:20:20', '2017-10-29 16:00:15', '2017-10-21 20:20:48', '2017-10-29 16:00:15'),
(3, 9, 'SERTIFIKAT_9k_sawit_rev.pdf', 2, 3, '2017-10-24 15:10:23', '2017-10-24 15:32:44', '2017-10-24 15:11:39', '2017-10-24 15:32:44'),
(4, 10, 'login_lpm.jpg', 2, 3, '2017-10-24 15:49:21', '2017-10-24 16:26:38', '2017-10-24 15:51:59', '2017-10-24 16:26:38'),
(5, 11, 'jadwal_vaksin.jpg', 2, 3, '2017-10-24 16:12:21', '2017-10-24 16:26:49', '2017-10-24 16:16:31', '2017-10-24 16:26:49'),
(6, 12, 'jadwal_vaksin.jpg', 2, 3, '2017-10-24 16:45:05', '2017-10-24 16:51:46', '2017-10-24 16:47:39', '2017-10-24 16:51:46'),
(7, 13, 'jadwal_vaksin.jpg', 2, 1, '2017-10-24 17:22:04', '2017-10-26 08:22:23', '2017-10-26 08:21:53', NULL),
(8, 14, 'bayar_3_sambel.jpg', 2, 3, '2017-10-24 17:22:55', '2017-11-01 08:37:38', '2017-10-31 11:16:03', '2017-11-01 08:37:38'),
(9, 15, NULL, 0, 0, '2017-10-24 18:41:06', '2017-10-24 18:41:06', NULL, NULL),
(10, 16, NULL, 0, 0, '2017-10-24 18:43:15', '2017-10-24 18:43:15', NULL, NULL),
(11, 17, NULL, 0, 0, '2017-10-24 18:43:21', '2017-10-24 18:43:21', NULL, NULL),
(12, 18, 'logo-bank-mandiri.png', 2, 3, '2017-10-24 18:47:32', '2017-10-27 09:44:13', '2017-10-27 09:04:25', '2017-10-27 09:44:13'),
(13, 19, NULL, 0, 0, '2017-10-25 11:55:41', '2017-10-25 11:55:41', NULL, NULL),
(14, 20, NULL, 0, 0, '2017-10-25 11:55:56', '2017-10-25 11:55:56', NULL, NULL),
(15, 21, NULL, 0, 0, '2017-10-25 11:58:04', '2017-10-25 11:58:04', NULL, NULL),
(16, 22, 'bayar_hutang_moyo.jpg', 2, 1, '2017-10-26 08:35:40', '2017-10-31 11:17:46', '2017-10-31 11:16:30', NULL),
(17, 23, 'logo-bank-mandiri.png', 2, 3, '2017-10-26 08:38:46', '2017-10-26 08:41:27', '2017-10-26 08:39:21', '2017-10-26 08:41:27'),
(18, 24, 'logo-bank-mandiri.png', 2, 3, '2017-10-26 10:19:11', '2017-10-27 09:45:03', '2017-10-26 10:20:05', '2017-10-27 09:45:03'),
(19, 25, 'logo-bank-mandiri.png', 2, 3, '2017-10-26 10:27:45', '2017-10-27 09:44:57', '2017-10-26 10:28:00', '2017-10-27 09:44:57'),
(20, 26, 'logo-bank-mandiri.png', 2, 3, '2017-10-27 08:55:19', '2017-10-29 16:03:40', '2017-10-27 08:57:34', '2017-10-29 16:03:40'),
(21, 27, 'logo-bank-mandiri.png', 2, 3, '2017-10-27 09:01:48', '2017-10-29 16:03:35', '2017-10-27 09:03:15', '2017-10-29 16:03:35'),
(22, 28, 'logo-bank-mandiri.png', 2, 3, '2017-10-27 09:27:57', '2017-10-27 09:44:38', '2017-10-27 09:28:44', '2017-10-27 09:44:38'),
(23, 29, NULL, 0, 0, '2017-10-28 11:26:16', '2017-10-28 11:26:16', NULL, NULL),
(24, 30, NULL, 0, 0, '2017-10-28 11:26:52', '2017-10-28 11:26:52', NULL, NULL),
(25, 31, 'masjid-al-haram-kaaba-mosque-a', 2, 0, '2017-10-28 11:30:55', '2017-10-28 11:32:05', '2017-10-28 11:31:18', NULL),
(26, 32, '24.jpg', 2, 3, '2017-10-29 16:17:16', '2017-10-29 17:07:21', '2017-10-29 16:30:36', '2017-10-29 17:07:21'),
(27, 33, 'logo-bank-mandiri.png', 2, 3, '2017-10-30 08:58:01', '2017-10-30 09:25:08', '2017-10-30 08:58:28', '2017-10-30 09:25:08'),
(28, 34, 'logo-bank-mandiri.png', 2, 0, '2017-10-30 09:34:42', '2017-10-30 09:35:57', '2017-10-30 09:35:22', NULL),
(29, 35, 'logo-bank-mandiri.png', 2, 3, '2017-10-30 10:06:15', '2017-10-30 10:53:01', '2017-10-30 10:06:48', '2017-10-30 10:53:01'),
(30, 36, 'bayar_hutang_moyo.jpg', 2, 3, '2017-10-30 11:52:11', '2017-10-30 12:13:59', '2017-10-30 11:53:00', '2017-10-30 12:13:59'),
(31, 37, 'Bmega.png', 2, 3, '2017-10-30 16:18:52', '2017-10-30 17:18:27', '2017-10-30 16:39:12', '2017-10-30 17:18:27'),
(32, 38, 'bayar_hutang_moyo.jpg', 2, 1, '2017-11-01 09:20:25', '2017-11-01 09:23:02', '2017-11-01 09:20:43', NULL),
(33, 39, 'ACCREDITATION1.jpg', 2, 3, '2017-11-02 10:49:46', '2017-11-02 16:11:52', '2017-11-02 10:51:54', '2017-11-02 16:11:52'),
(34, 40, '1509602911469-54496058.jpg', 2, 1, '2017-11-02 13:08:08', '2017-11-02 13:11:20', '2017-11-02 13:09:22', NULL),
(35, 41, 'Uang_Jajan.jpg', 2, 1, '2017-11-02 16:17:48', '2017-11-02 16:19:33', '2017-11-02 16:18:55', NULL),
(36, 42, '5C1C4BB6-D593-4DEF-88DC-F14BA5', 2, 3, '2017-11-03 18:03:37', '2017-11-07 09:28:01', '2017-11-03 18:04:10', '2017-11-07 09:28:01'),
(37, 43, 'img_20171106_212147_-119545881', 2, 1, '2017-11-06 21:21:39', '2017-11-07 09:20:41', '2017-11-06 21:22:17', NULL),
(38, 44, 'bayar_3_sambel.jpg', 2, 3, '2017-11-07 09:15:30', '2017-11-07 10:37:22', '2017-11-07 09:16:05', '2017-11-07 10:37:22'),
(39, 45, 'bayar_hutang_moyo.jpg', 2, 3, '2017-11-07 09:18:50', '2017-11-07 10:37:30', '2017-11-07 09:18:58', '2017-11-07 10:37:30'),
(40, 46, 'bayar_hutang_moyo.jpg', 2, 3, '2017-11-07 10:56:37', '2017-11-08 16:04:15', '2017-11-07 10:56:50', '2017-11-08 16:04:15'),
(41, 47, 'img_20171108_160203_2024669332', 2, 3, '2017-11-08 15:58:26', '2017-11-08 16:06:52', '2017-11-08 15:59:54', '2017-11-08 16:06:52'),
(42, 48, 'Screenshot_20171106-123420.png', 2, 1, '2017-11-08 16:03:03', '2017-11-08 16:04:03', '2017-11-08 16:03:30', NULL),
(43, 49, NULL, 0, 0, '2017-11-09 16:44:22', '2017-11-09 16:44:22', NULL, NULL),
(44, 50, 'logo_eas.png', 2, 1, '2017-11-09 17:37:15', '2017-11-09 17:43:41', '2017-11-09 17:41:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `belajar`
--
ALTER TABLE `belajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_murid` (`id_murid`),
  ADD KEY `FK_belajar_guru` (`id_guru`),
  ADD KEY `FK_belajar_modul` (`id_modul`);

--
-- Indexes for table `file_modul`
--
ALTER TABLE `file_modul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_file_modul_modul` (`id_modul`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_modul_guru` (`id_guru`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_rating_guru` (`id_guru`),
  ADD KEY `FK_rating_murid` (`id_murid`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_transaksi_to_belajar` (`id_belajar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `belajar`
--
ALTER TABLE `belajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `file_modul`
--
ALTER TABLE `file_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `belajar`
--
ALTER TABLE `belajar`
  ADD CONSTRAINT `FK_belajar_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `FK_belajar_modul` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id`),
  ADD CONSTRAINT `FK_murid` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id`);

--
-- Constraints for table `file_modul`
--
ALTER TABLE `file_modul`
  ADD CONSTRAINT `FK_file_modul_modul` FOREIGN KEY (`id_modul`) REFERENCES `modul` (`id`);

--
-- Constraints for table `modul`
--
ALTER TABLE `modul`
  ADD CONSTRAINT `FK_modul_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_rating_guru` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`),
  ADD CONSTRAINT `FK_rating_murid` FOREIGN KEY (`id_murid`) REFERENCES `murid` (`id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_transaksi_to_belajar` FOREIGN KEY (`id_belajar`) REFERENCES `belajar` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
