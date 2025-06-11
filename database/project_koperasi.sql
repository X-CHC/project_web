-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 05:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota_p`
--

CREATE TABLE `tbl_anggota_p` (
  `id_pinjaman` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `telpon` int(14) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nik` int(14) NOT NULL,
  `total_p` int(255) NOT NULL,
  `total_a` int(255) NOT NULL,
  `total_cicilan` int(12) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_anggota_p`
--

INSERT INTO `tbl_anggota_p` (`id_pinjaman`, `nama`, `tgl_lahir`, `alamat`, `status`, `jenis_kelamin`, `telpon`, `email`, `nik`, `total_p`, `total_a`, `total_cicilan`, `created`, `updated`, `deleted`) VALUES
('PJN001', 'dfsadsa', '2024-07-18', 'dimana bumi dipijak disitu saya ada', '0', 'Perempuan', 855576432, 'sofyanwirawan21@gmail.com', 2147483647, 2000000, 0, 12, '2024-07-01 09:25:08', '2024-07-01 09:25:08', '0'),
('PJN002', 'dfsadsa', '2023-07-05', 'jauh sekali', '1', 'Laki-laki', 855576432, 'bedulgames@gmail.com', 2147483647, 140000, 0, 0, '2024-07-03 14:44:10', '2024-07-04 02:21:13', '0'),
('PJN004', 'dfsadsa', '2024-07-08', 'jauh sekali', '0', 'attack helikopter', 855576432, 'bedulgames@gmail.com', 2147483647, 2150000, 0, 0, '2024-07-03 15:02:47', '2024-07-03 15:02:47', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota_s`
--

CREATE TABLE `tbl_anggota_s` (
  `id_simpanan` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `bukti_p` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `telpon` int(14) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nik` int(16) NOT NULL,
  `total` int(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_angsuran`
--

CREATE TABLE `tbl_angsuran` (
  `id_angsuran` varchar(6) NOT NULL,
  `id_pinjaman` varchar(6) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_b` int(255) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`id_angsuran`, `id_pinjaman`, `tgl_bayar`, `total_b`, `bukti`) VALUES
('ANG001', 'PJN004', '2024-08-03', 358000, '0'),
('ANG002', 'PJN004', '2024-09-03', 358000, '0'),
('ANG003', 'PJN004', '2024-10-03', 358000, '0'),
('ANG004', 'PJN004', '2024-11-03', 358000, '0'),
('ANG005', 'PJN004', '2024-12-03', 358000, '0'),
('ANG006', 'PJN004', '2025-01-03', 358000, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting_a`
--

CREATE TABLE `tbl_setting_a` (
  `id_set` varchar(6) NOT NULL,
  `bunga` int(255) NOT NULL,
  `admin` int(255) NOT NULL,
  `gaji_anggota` int(255) NOT NULL,
  `total_penarikan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simpanan_sukarela`
--

CREATE TABLE `tbl_simpanan_sukarela` (
  `id_sim_s` varchar(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_b` int(255) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `deleted` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_simpanan_sukarela`
--

INSERT INTO `tbl_simpanan_sukarela` (`id_sim_s`, `nama`, `tgl_bayar`, `total_b`, `bukti`, `deleted`) VALUES
('SPS001', '', '2024-07-04', 20000, 'BuktiSS-240704133600.png', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_simpanan_wajib`
--

CREATE TABLE `tbl_simpanan_wajib` (
  `id_sim_w` varchar(6) NOT NULL,
  `id_simpanan` varchar(6) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `total_b` int(255) NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_simpanan_wajib`
--

INSERT INTO `tbl_simpanan_wajib` (`id_sim_w`, `id_simpanan`, `tgl_bayar`, `total_b`, `bukti`) VALUES
('SPW001', 'SPN001', '2024-07-04', 25000, 'BuktiW-240704104634.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` varchar(6) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `akses_level` enum('GM','Major','Tengkorak') NOT NULL,
  `is_delete_admin` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `akses_level`, `is_delete_admin`, `created_at`, `update_at`) VALUES
('ADM000', 'Developer', 'developer', '$2y$10$BtHHWFXmLuhnP79ievN58O8EivCDmojcmNDivaVhmIlBQNSiqr9Ku', 'GM', '0', '2024-05-30 21:57:33', '2024-05-30 21:57:33'),
('ADM001', 'sss', 'kun', '$2y$10$22d4iXsrpvleDCQrYpc7nOOxNGmGSKKYtjnIgXzGPKaQIpr23w/62', 'GM', '1', '2024-06-04 16:08:48', '2024-06-09 09:36:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota_p`
--
ALTER TABLE `tbl_anggota_p`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indexes for table `tbl_anggota_s`
--
ALTER TABLE `tbl_anggota_s`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indexes for table `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `tbl_setting_a`
--
ALTER TABLE `tbl_setting_a`
  ADD PRIMARY KEY (`id_set`);

--
-- Indexes for table `tbl_simpanan_sukarela`
--
ALTER TABLE `tbl_simpanan_sukarela`
  ADD PRIMARY KEY (`id_sim_s`);

--
-- Indexes for table `tbl_simpanan_wajib`
--
ALTER TABLE `tbl_simpanan_wajib`
  ADD PRIMARY KEY (`id_sim_w`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
