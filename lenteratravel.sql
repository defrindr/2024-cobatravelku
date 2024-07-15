-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 02:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lenteratravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `user_id`, `alamat`, `nomor_telepon`, `created_at`, `updated_at`) VALUES
(1, 2, 'Jl. Maju mundur cantik No. 18', '08121212345', '2024-07-11 23:48:45', '2024-07-11 23:48:45'),
(2, 3, 'Jl. Maju mundur cantik No. 18', '08121212345', '2024-07-11 23:48:45', '2024-07-11 23:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_polisi` varchar(255) NOT NULL,
  `jenis_mobil` varchar(255) NOT NULL,
  `kuota` int(11) NOT NULL,
  `sisa_kuota` int(11) NOT NULL,
  `harga_travel` varchar(255) NOT NULL,
  `harga_barang` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_berangkat` time NOT NULL,
  `kota_keberangkatan_id` bigint(20) UNSIGNED NOT NULL,
  `kota_tujuan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `nomor_polisi`, `jenis_mobil`, `kuota`, `sisa_kuota`, `harga_travel`, `harga_barang`, `tanggal`, `jam_berangkat`, `kota_keberangkatan_id`, `kota_tujuan_id`, `created_at`, `updated_at`) VALUES
(1, 'B 063 L', 'Avanza', 1, 1, '100000', '60000', '2024-07-12', '10:48:46', 1, 1, '2024-07-11 23:48:46', '2024-07-11 23:48:46'),
(2, 'K 374 N', 'Kijang', 1, 1, '700000', '60000', '2024-07-12', '15:48:46', 1, 1, '2024-07-11 23:48:46', '2024-07-11 23:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan`
--

CREATE TABLE `keluhan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kota_keberangkatan`
--

CREATE TABLE `kota_keberangkatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kota_keberangkatan`
--

INSERT INTO `kota_keberangkatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Malang', '2024-07-11 23:48:46', '2024-07-12 00:44:55'),
(2, 'Surabaya', '2024-07-11 23:48:46', '2024-07-12 00:45:03'),
(3, 'Kediri', '2024-07-11 23:48:46', '2024-07-12 00:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `kota_tujuan`
--

CREATE TABLE `kota_tujuan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kota_tujuan`
--

INSERT INTO `kota_tujuan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', '2024-07-11 23:48:46', '2024-07-11 23:48:46'),
(2, 'Malang', '2024-07-11 23:48:46', '2024-07-12 00:45:22'),
(3, 'Juanda', '2024-07-11 23:48:46', '2024-07-12 00:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_08_051842_create_kota_keberangkatan', 1),
(6, '2024_07_08_070410_create_kota_tujuan', 1),
(7, '2024_07_08_074503_create_keluhan', 1),
(8, '2024_07_08_074805_create_customer', 1),
(9, '2024_07_09_164952_create_jadwal_table', 1),
(10, '2024_07_09_165020_create_pemesanan_table', 1),
(11, '2024_07_10_000123_create_pengiriman_table', 1),
(12, '2024_07_12_063401_create_mitra_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `nomor_polisi` varchar(255) NOT NULL,
  `jenis_mobil` varchar(255) NOT NULL,
  `harga_sewa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_code` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jumlah_kursi` int(11) NOT NULL DEFAULT 1,
  `bisa_bayar` int(11) NOT NULL DEFAULT 0,
  `jumlah_bayar` bigint(20) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `lokasi_penjemputan` varchar(255) NOT NULL,
  `lokasi_pengantaran` varchar(255) NOT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `waktu_mulai_bayar` time NOT NULL,
  `waktu_selesai_bayar` time NOT NULL,
  `status` enum('pending','butuh konfirmasi','lunas') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `ref_code`, `customer_id`, `jadwal_id`, `jumlah_kursi`, `bisa_bayar`, `jumlah_bayar`, `nomor_telepon`, `lokasi_penjemputan`, `lokasi_pengantaran`, `bukti_bayar`, `waktu_mulai_bayar`, `waktu_selesai_bayar`, `status`, `created_at`, `updated_at`) VALUES
(1, '1720741726', 1, 1, 1, 1, 100000, '081231231242', '-', '-', NULL, '06:38:46', '06:48:46', 'pending', '2024-07-11 23:48:46', '2024-07-11 23:48:46'),
(2, '1720741776', 1, 1, 1, 0, 100000, '081231231242', '-', '-', NULL, '06:48:46', '06:58:46', 'pending', '2024-07-11 23:48:46', '2024-07-11 23:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ref_code` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lokasi_penjemputan` varchar(255) NOT NULL,
  `lokasi_pengantaran` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `jumlah_bayar` bigint(20) NOT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `status` enum('pending','butuh konfirmasi','lunas') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer','mitra','pemilik') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@example.com', NULL, '$2y$10$TW4P6Mr.soTU2cAok4gjpesRWPaiHZ9PwAlUljiFNDvERmuJtxkTy', 'admin', NULL, '2024-07-11 23:48:45', '2024-07-11 23:48:45'),
(2, 'Customer 1', 'customer@example.com', NULL, '$2y$10$uXOPUmtnM.oZfbLc6VF5neU7KSZ3eNFgVfDqgSmyYB8bq1MZjooDe', 'customer', NULL, '2024-07-11 23:48:45', '2024-07-11 23:48:45'),
(3, 'Customer 2', 'customer2@example.com', NULL, '$2y$10$GuR784G60FqIEoH0SKihzeiuNV/co23pyV4wseGPXGq.lHf1RILPq', 'customer', NULL, '2024-07-11 23:48:45', '2024-07-11 23:48:45'),
(4, 'Eka', 'mitra@example.com', NULL, '$2y$10$l1PVgtjIlZcZ/jJl54e9y..dHRLWxuIHcMR5hjr88OvNekOg4z4AC', 'mitra', NULL, '2024-07-11 23:48:46', '2024-07-11 23:48:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_kota_keberangkatan_id_foreign` (`kota_keberangkatan_id`),
  ADD KEY `jadwal_kota_tujuan_id_foreign` (`kota_tujuan_id`);

--
-- Indexes for table `keluhan`
--
ALTER TABLE `keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota_keberangkatan`
--
ALTER TABLE `kota_keberangkatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mitra_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pemesanan_customer_id_foreign` (`customer_id`),
  ADD KEY `pemesanan_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengiriman_customer_id_foreign` (`customer_id`),
  ADD KEY `pengiriman_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keluhan`
--
ALTER TABLE `keluhan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota_keberangkatan`
--
ALTER TABLE `kota_keberangkatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_kota_keberangkatan_id_foreign` FOREIGN KEY (`kota_keberangkatan_id`) REFERENCES `kota_keberangkatan` (`id`),
  ADD CONSTRAINT `jadwal_kota_tujuan_id_foreign` FOREIGN KEY (`kota_tujuan_id`) REFERENCES `kota_tujuan` (`id`);

--
-- Constraints for table `mitra`
--
ALTER TABLE `mitra`
  ADD CONSTRAINT `mitra_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `pemesanan_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`);

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `pengiriman_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
