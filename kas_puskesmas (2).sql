-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2023 at 01:20 PM
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
-- Database: `kas_puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penerimaan_kas`
--

CREATE TABLE `detail_penerimaan_kas` (
  `id` int(11) NOT NULL,
  `tanggal_transaksi` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah_tarif` varchar(150) NOT NULL,
  `jasa_pelayanan` int(150) NOT NULL,
  `jasa_sarana` int(150) NOT NULL,
  `pasien_kode` varchar(150) NOT NULL,
  `layanan_tindakan_medis` int(150) NOT NULL,
  `header_penerimaan_kas_id` int(150) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_penerimaan_kas`
--

CREATE TABLE `header_penerimaan_kas` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_pembayaran` decimal(60,0) NOT NULL,
  `pengguna_id` int(150) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_layanan_medis`
--

CREATE TABLE `kategori_layanan_medis` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(150) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `layanan_tindakan_medis`
--

CREATE TABLE `layanan_tindakan_medis` (
  `id` int(11) NOT NULL,
  `nama_pemeriksa` varchar(150) NOT NULL,
  `jumlah_tarif` decimal(50,0) NOT NULL,
  `jasa_pelayanan` decimal(50,0) NOT NULL,
  `jasa_sarana` decimal(50,0) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori_pemeriksaan_id` int(150) NOT NULL,
  `created_at` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kode_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenis_pasien` varchar(50) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_pasien` text NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` varchar(150) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `last_login` varchar(150) NOT NULL,
  `last_season` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `create_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `last_login`, `last_season`, `nama`, `hak_akses`, `create_at`) VALUES
(2, 'ahmadbaihaqy@gmail.com', '$2y$10$1uynzpMdk8XW4u8jR7OhOue/Nnm4QUbiElbr4WomljAmUZQAvMiri', '1685186092', '', 'ahmad baihaqy', 'kepala', '2023-05-27 11:14:52.730319'),
(6, 'sayang@gmail.com', '$2y$10$d08Q8XTYNC6cXe.eg.9lTu3w.AAgGAlsH6PdaB/b02JMVu/jhj5.6', '1685185749', '', 'sayang', 'admin', '2023-05-27 11:13:29.806495'),
(7, 'lala@gmail.com', '$2y$10$8IaHOs95I1gJi6/vNLCNxuIqa1feYKnezOzmMyvFhzOnTHFAMM2XS', '1685183554', '', 'lala', 'petugas', '2023-05-27 11:13:47.083416'),
(8, 'misna@gmail.com', '$2y$10$VxxEXWNuzmFDzMPX67gSj.ce6ytsoEOe7f4/R/GQY/teVtO7HYUOe', '', '', 'misna', 'bendahara', '2023-05-27 11:18:45.813715');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penerimaan_kas`
--
ALTER TABLE `detail_penerimaan_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_penerimaan_kas`
--
ALTER TABLE `header_penerimaan_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_layanan_medis`
--
ALTER TABLE `kategori_layanan_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_tindakan_medis`
--
ALTER TABLE `layanan_tindakan_medis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_pasien`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penerimaan_kas`
--
ALTER TABLE `detail_penerimaan_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_penerimaan_kas`
--
ALTER TABLE `header_penerimaan_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_layanan_medis`
--
ALTER TABLE `kategori_layanan_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layanan_tindakan_medis`
--
ALTER TABLE `layanan_tindakan_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kode_pasien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
