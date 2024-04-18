-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 12:25 PM
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
-- Database: `db_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_absensi`
--

CREATE TABLE `t_absensi` (
  `id` int(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_absensi`
--

INSERT INTO `t_absensi` (`id`, `nis`, `date_time`, `keterangan`) VALUES
(1, 'NIS0000002', '2023-08-20 15:09:44', 'Anda terlambat\n'),
(2, 'NIS0000002', '2023-08-20 15:11:46', 'Anda terlambat\n'),
(3, 'NIS0000001', '2023-08-20 15:12:16', 'Anda terlambat\n');

-- --------------------------------------------------------

--
-- Table structure for table `t_rfid`
--

CREATE TABLE `t_rfid` (
  `id` int(50) NOT NULL,
  `no_rfid` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL,
  `chatid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_rfid`
--

INSERT INTO `t_rfid` (`id`, `no_rfid`, `nis`, `token`, `chatid`) VALUES
(1, '73925ad', 'NIS0000001', '6318616714:AAH9YDnMrdpyuVVvwUFiZKMuuIGezE2P-3o', '6211031822'),
(2, '70c09f55', 'NIS0000002', '6607443772:AAEVk5dju_S1oxMo26p5B1RJxlOyG0XjpWI', '6211031822');

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `id` int(20) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`id`, `nis`, `nama`, `alamat`, `kelas`, `status`) VALUES
(1, 'NIS0000001', 'Muhammad Fadil', 'Jl. Merdeka No. 123', '1A', 1),
(2, 'NIS0000002', 'Siti Rahma', 'Jl. Kenangan Indah No. 45', '2B', 1),
(3, 'NIS0000003', 'Ahmad Hasan', 'Jl. Pahlawan Kecil No. 67', '1C', 0),
(4, 'NIS0000004', 'Indah Sari', 'Jl. Seruni No. 89', '3F', 0),
(5, 'NIS0000005', 'Rudi Santoso', 'Jl. Makmur No. 10', '2B', 0),
(6, 'NIS0000006', 'Linda Wijaya', 'Jl. Bahagia No. 22', '1A', 0),
(7, 'NIS0000007', 'Budi Santoso', 'Jl. Bunga Indah No. 34', '3B', 0),
(8, 'NIS0000008', 'Ratna Dewi', 'Jl. Pelangi No. 56', '3A', 0),
(9, 'NIS0000009', 'Eko Prasetyo', 'Jl. Cendana No. 78', '1H', 0),
(10, 'NIS0000010', 'Anita Wulandari', 'Jl. Harmoni No. 90', '3A', 0),
(11, 'NIS0000011', 'Hadi Kurniawan', 'Jl. Perdamaian No. 11', '1B', 0),
(12, 'NIS0000012', 'Dewi Anggraeni', 'Jl. Mawar No. 33', '2A', 0),
(13, 'NIS0000013', 'Agus Setiawan', 'Jl. Sejahtera No. 55', '2C', 0),
(14, 'NIS0000014', 'Rina Susanti', 'Jl. Kenari No. 77', '3D', 0),
(15, 'NIS0000015', 'Surya Pratama', 'Jl. Indah No. 99', '1B', 0);

--
-- Indexes for dumped tables
--

--
-- Table structure for table `history_rfid`
--

CREATE TABLE `history_rfid` (
  `id` int(50) NOT NULL,
  `no_rfid` varchar(50) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Indexes for table `history_rfid`
--
ALTER TABLE `history_rfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_absensi`
--
ALTER TABLE `t_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_rfid`
--
ALTER TABLE `t_rfid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_rfid`
--
ALTER TABLE `history_rfid`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_absensi`
--
ALTER TABLE `t_absensi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_rfid`
--
ALTER TABLE `t_rfid`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_siswa`
--
ALTER TABLE `t_siswa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
