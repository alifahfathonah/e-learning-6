-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 11:17 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
(1, 2, 1, 1, '105000', '80', '2017-11-26 17:02:44');

-- --------------------------------------------------------

--
-- Table structure for table `file_modul`
--

CREATE TABLE `file_modul` (
  `id` int(11) NOT NULL,
  `id_modul` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_modul`
--

INSERT INTO `file_modul` (`id`, `id_modul`, `file`) VALUES
(1, 1, 'Trigonometry.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
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
(1, 'Isal Iskandar', 'isal@gmail.com', '0898767654', '123', '2017-10-07', 'Saya pernah menjadi admin grup', 'Saya pernah menjadi admin grup', 'user.png', 'cv.rar', 'ttd.png', 1, '2017-10-14 22:28:00'),
(2, 'Muhammad Idrus', 'idrus@gmail.com', '0898987767', '123', '2017-10-07', 'saya bisa main bola', 'saya bisa main bola', '', NULL, NULL, 0, '2017-10-15 07:12:35'),
(3, 'Fikri Hanavi', 'hanavilzen2016@gmail.com', '0878765654', 'QWERASDF', '2017-10-07', 'saya biasa dakwah', 'saya biasa dakwah', '', 'cv.rar', 'ttd.png', 0, '2017-10-15 11:57:39'),
(4, 'adham', 'adham@gmail.com', '0898778676', '123', '2017-10-21', 'saya biasa manggung', 'saya biasa manggung', '', NULL, NULL, 0, '2017-10-18 11:06:34'),
(5, 'nanang', 'nanang@gmail.com', '089876678765', '123', '2017-10-14', 'saya jomblo', 'saya jomblo', '', NULL, NULL, 0, '2017-10-18 11:06:56'),
(6, 'gurna', 'gurna@gmail.com', '089876654', '123', '2017-10-14', 'saya adek fikri', 'saya adek fikri', '', NULL, NULL, 0, '2017-10-18 11:07:19'),
(7, 'bayu', 'bayu@gmail.com', '087777654231', '123456', '2017-10-20', 'Aku sudah move on', 'yeyeye', '', NULL, NULL, 0, '2017-10-21 15:44:21'),
(8, 'mulyani', 'muy@gmail.com', '085635678921', 'muy@gmail.com', '2017-10-18', 'kehidupan bermula dari awal', 'kehidupan bermula dari awal', '', NULL, NULL, 0, '2017-10-21 19:46:31'),
(11, 'Haditya', 'aditya@gmail.com', '08787878787', '1', '2014-10-15', 'bulam pengalaman', 'pinter2 bodo', '', NULL, NULL, 0, '2017-10-24 15:25:38'),
(12, 'nanda', 'nanda@gmail.com', '081818181818', '1', '2017-10-26', 'bisa ngapa2 in ajah', 'masih single', '', NULL, NULL, 0, '2017-10-24 15:35:52'),
(13, 'tirta', 'tirta@gmail.com', '081375638475', 'tirta@gmail.com', '0000-00-00', '', '', '', NULL, NULL, 0, '2017-10-29 06:27:44'),
(14, 'Jhon Lennon', 'jhon@gmail.com', '0878767656', 'jhon@gmail.com', '2017-10-07', 'Lorep isum du manama ahabad jakuns skuoa', 'lorep ismu koe ora iki moe kawe domo domo', '', NULL, NULL, 0, '2017-10-29 16:08:15'),
(15, 'sunandar', 'sunandar@gmail.com', '08787878787', '1', '2017-11-02', 'Sangat pengalaman sekali', 'sekali sekali pengalaman', '', NULL, NULL, 0, '2017-10-30 08:38:11'),
(16, 'jiwo', 'jiwo@gmail.com', '08136666666', '1', '1980-11-25', 'Jagoan IT', 'Saya sangat jago sekali', '', NULL, NULL, 0, '2017-11-01 08:40:28'),
(17, 'kejon', 'kejon@gmail.com', '08456879546', '1', '1980-06-17', 'kurang jago IT', 'Saya sangat kurang sekali jago IT nya', '', NULL, NULL, 0, '2017-11-01 08:51:14'),
(19, 'yono', 'yono@gmail.com', '08456879546', '123', '0000-00-00', '', '', '', NULL, NULL, 0, '2017-11-07 09:16:38'),
(20, 'febri', 'febri20@gmail.com', '081312345678', '12', '2017-11-08', 'mau belajar', 'baik hati dan tidak sombong', '', NULL, NULL, 0, '2017-11-08 15:39:23'),
(21, 'jos', 'josef30@gmail.com', '0817171717171', '1', '0000-00-00', '', '', '', NULL, NULL, 0, '2017-11-09 15:18:47');

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

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `id_guru`, `mata_pelajaran`, `modul`, `harga`) VALUES
(1, 1, 'RPL', 'Algoritma', '105000.00');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`id`, `nama`, `email`, `telp`, `password`, `created_at`) VALUES
(1, 'tes', 'a@f', '3242', '123', '2017-10-14 22:24:06'),
(2, 'Reksi Vaisal', 'vaisalreksi@gmail.com', '08987876567', 'QWERASDF', '2017-10-15 07:11:59'),
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
(1, 1, 2, 4, 'makasih pak cikgu', '2017-11-26 17:08:21');

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
(1, 1, 'fahmy.png', 2, 3, '2017-11-26 17:02:44', '2017-11-26 17:09:02', '2017-11-26 17:07:14', '2017-11-26 17:09:02');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `file_modul`
--
ALTER TABLE `file_modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
