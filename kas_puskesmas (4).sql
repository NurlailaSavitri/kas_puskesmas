-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 01:27 PM
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
  `id` int(15) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `jenis_pasien` varchar(50) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_pasien` text NOT NULL,
  `nomor_telphone` varchar(20) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `kode_pasien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `nama_pasien`, `jenis_pasien`, `tempat_lahir`, `tanggal_lahir`, `alamat_pasien`, `nomor_telphone`, `created_at`, `kode_pasien`) VALUES
(1005, 'AHMAD BAIHAQY', 'laki-laki', 'kalsel', '2023-06-10', 'CEMPAKA 5', '082154780747', '2023-05-29 13:10:42.657463', 'BA-01'),
(1006, 'sayangku', 'perempuan', 'banjar', '2023-05-07', 'dzafri zam zam', '082154780747', '2023-05-29 14:37:55.049028', 'KP-02');

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
(6, 'sayang@gmail.com', '1', '1685371036', '', 'sayangku', 'admin', '2023-05-29 14:37:16.176050'),
(11, 'juraida@gmail.com', '1', '', '', 'juraida', '', '2023-05-28 07:13:39.650589'),
(25, 'lala@gmail.com', '1', '1685367196', '', 'lala', 'petugas', '2023-05-29 13:33:16.129574'),
(28, 'ahmadbaihaqy@yahoo.co.id', '2', '1685366172', '', 'ahmad baihaqy', 'kepala', '2023-05-29 13:16:12.065005'),
(30, 'misna@gmail.com', '1', '', '', 'misna', 'bendahara', '2023-05-28 09:45:03.446007');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
