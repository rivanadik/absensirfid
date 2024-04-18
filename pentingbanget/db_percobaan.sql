SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `t_absensi` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nis` VARCHAR(50) NOT NULL,
  `date_time` DATETIME NOT NULL,
  `keterangan` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `t_absensi` (`nis`, `date_time`, `keterangan`) VALUES
('NIS0000002', '2023-08-20 15:09:44', 'Anda terlambat\n'),
('NIS0000002', '2023-08-20 15:11:46', 'Anda terlambat\n'),
('NIS0000001', '2023-08-20 15:12:16', 'Anda terlambat\n');

CREATE TABLE `t_rfid` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `no_rfid` VARCHAR(50) NOT NULL,
  `nis` VARCHAR(50) NOT NULL,
  `token` VARCHAR(200) NOT NULL,
  `chatid` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `t_rfid` (`no_rfid`, `nis`, `token`, `chatid`) VALUES
('73925ad', 'NIS0000001', '6318616714:AAH9YDnMrdpyuVVvwUFiZKMuuIGezE2P-3o', '6211031822'),
('70c09f55', 'NIS0000002', '6607443772:AAEVk5dju_S1oxMo26p5B1RJxlOyG0XjpWI', '6211031822');

CREATE TABLE `t_siswa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nis` VARCHAR(50) NOT NULL,
  `nama` VARCHAR(50) NOT NULL,
  `alamat` VARCHAR(150) NOT NULL,
  `kelas` VARCHAR(5) NOT NULL,
  `status` INT(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `t_siswa` (`nis`, `nama`, `alamat`, `kelas`, `status`) VALUES
('NIS0000001', 'Muhammad Fadil', 'Jl. Merdeka No. 123', '1A', 1),
('NIS0000002', 'Siti Rahma', 'Jl. Kenangan Indah No. 45', '2B', 1),
('NIS0000003', 'Ahmad Hasan', 'Jl. Pahlawan Kecil No. 67', '1C', 0),
('NIS0000004', 'Indah Sari', 'Jl. Seruni No. 89', '3F', 0),
('NIS0000005', 'Rudi Santoso', 'Jl. Makmur No. 10', '2B', 0),
('NIS0000006', 'Linda Wijaya', 'Jl. Bahagia No. 22', '1A', 0),
('NIS0000007', 'Budi Santoso', 'Jl. Bunga Indah No. 34', '3B', 0),
('NIS0000008', 'Ratna Dewi', 'Jl. Pelangi No. 56', '3A', 0),
('NIS0000009', 'Eko Prasetyo', 'Jl. Cendana No. 78', '1H', 0),
('NIS0000010', 'Anita Wulandari', 'Jl. Harmoni No. 90', '3A', 0),
('NIS0000011', 'Hadi Kurniawan', 'Jl. Perdamaian No. 11', '1B', 0),
('NIS0000012', 'Dewi Anggraeni', 'Jl. Mawar No. 33', '2A', 0),
('NIS0000013', 'Agus Setiawan', 'Jl. Sejahtera No. 55', '2C', 0),
('NIS0000014', 'Rina Susanti', 'Jl. Kenari No. 77', '3D', 0),
('NIS0000015', 'Surya Pratama', 'Jl. Indah No. 99', '1B', 0);

CREATE TABLE `history_rfid` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `no_rfid` VARCHAR(50) NOT NULL,
  `date_time` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

COMMIT;
