-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2026 pada 07.42
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_kelontong`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` varchar(255) NOT NULL DEFAULT 'info',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `judul`, `deskripsi`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'Akun Kasir Dibuat', 'Akun kasir Tiwi (Tiwi) telah didaftarkan.', 'success', '2026-03-11 09:40:11', '2026-03-11 09:40:11'),
(2, 'Kategori Baru Ditambahkan', 'Kategori minyak telah ditambahkan.', 'success', '2026-03-13 18:06:07', '2026-03-13 18:06:07'),
(3, 'Kategori Baru Ditambahkan', 'Kategori beras telah ditambahkan.', 'success', '2026-03-13 18:06:19', '2026-03-13 18:06:19'),
(4, 'Kategori Baru Ditambahkan', 'Kategori sabun telah ditambahkan.', 'success', '2026-03-13 18:06:31', '2026-03-13 18:06:31'),
(5, 'Barang Baru Ditambahkan', 'Barang Minyak Bimoli telah ditambahkan ke database.', 'success', '2026-03-13 18:13:14', '2026-03-13 18:13:14'),
(6, 'Data Barang Diubah', 'Data untuk barang Minyak Bimoli telah diperbarui.', 'info', '2026-03-13 18:13:44', '2026-03-13 18:13:44'),
(7, 'Barang Baru Ditambahkan', 'Barang Berass telah ditambahkan ke database.', 'success', '2026-03-13 19:25:45', '2026-03-13 19:25:45'),
(8, 'Barang Baru Ditambahkan', 'Barang Sabun Give telah ditambahkan ke database.', 'success', '2026-03-13 19:26:30', '2026-03-13 19:26:30'),
(9, 'Data Barang Diubah', 'Data untuk barang Minyak Bimoli telah diperbarui.', 'info', '2026-03-13 19:54:07', '2026-03-13 19:54:07'),
(10, 'Data Barang Diubah', 'Data untuk barang Minyak Bimoli telah diperbarui.', 'info', '2026-03-13 19:54:41', '2026-03-13 19:54:41'),
(11, 'Data Barang Diubah', 'Data untuk barang Minyak Bimoli telah diperbarui.', 'info', '2026-03-13 20:11:32', '2026-03-13 20:11:32'),
(12, 'Data Barang Diubah', 'Data untuk barang Berass telah diperbarui.', 'info', '2026-03-13 20:11:50', '2026-03-13 20:11:50'),
(13, 'Data Barang Diubah', 'Data untuk barang Minyak Bimoli telah diperbarui.', 'info', '2026-03-13 20:13:15', '2026-03-13 20:13:15'),
(14, 'Data Barang Diubah', 'Data untuk barang Berass telah diperbarui.', 'info', '2026-03-13 20:13:56', '2026-03-13 20:13:56'),
(15, 'Data Barang Diubah', 'Data untuk barang Sabun Give telah diperbarui.', 'info', '2026-03-13 20:14:38', '2026-03-13 20:14:38'),
(16, 'Kategori Baru Ditambahkan', 'Kategori Tepung telah ditambahkan.', 'success', '2026-03-13 20:17:55', '2026-03-13 20:17:55'),
(17, 'Barang Baru Ditambahkan', 'Barang Tepung terigu telah ditambahkan ke database.', 'success', '2026-03-13 20:19:33', '2026-03-13 20:19:33'),
(18, 'Data Barang Diubah', 'Data untuk barang Sabun Give telah diperbarui.', 'info', '2026-03-13 20:19:53', '2026-03-13 20:19:53'),
(19, 'Akun Kasir Dibuat', 'Akun kasir Lessa (Lessa) telah didaftarkan.', 'success', '2026-03-13 20:23:15', '2026-03-13 20:23:15'),
(20, 'Transaksi Baru (INV-20260314-69B4E9DFC9346)', 'Kasir Lessa memproses transaksi sebesar Rp20.000', 'info', '2026-03-13 21:53:51', '2026-03-13 21:53:51'),
(21, 'Transaksi Baru (INV-20260314-69B5095F56A53)', 'Kasir Lessa memproses transaksi sebesar Rp30.000', 'info', '2026-03-14 00:08:15', '2026-03-14 00:08:15'),
(22, 'Transaksi Baru (INV-20260314-69B50A8CAF41E)', 'Kasir Lessa memproses transaksi sebesar Rp10.000', 'info', '2026-03-14 00:13:16', '2026-03-14 00:13:16'),
(23, 'Barang Masuk (Minyak Bimoli)', 'Admin Admin Toko menambahkan 100 unit dari supplier PT Suppra', 'info', '2026-03-14 00:35:16', '2026-03-14 00:35:16'),
(24, 'Transaksi Baru (INV-20260327-69C625824B4BF)', 'Kasir Tiwi memproses transaksi sebesar Rp235.000', 'info', '2026-03-26 23:36:50', '2026-03-26 23:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga_beli` decimal(15,2) NOT NULL,
  `harga_jual` decimal(15,2) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `kategori_id`, `kode_barang`, `nama_barang`, `gambar`, `harga_beli`, `harga_jual`, `stok`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'BRG-001', 'Minyak Bimoli', 'produk/A7L9BylLG4BMcAMpSmOhIf1UQjTmITcfkiKERz6l.jpg', 0.00, 20000.00, 108, 'minyak goreng pangan dan minyak hasil olahan bumi petroleum', '2026-03-13 18:13:14', '2026-03-26 23:36:50'),
(2, 2, 'BRG-002', 'Berass', 'produk/8vZghd357VV3M8cm1qZ3QVyDjpelzpxslkGlbjfT.jpg', 0.00, 200000.00, 29, 'Produk utuh dari hasil gilingan padi umumnya terdiri dari 70% beras giling, 10% dedak, dan 20% sekam', '2026-03-13 19:25:45', '2026-03-26 23:36:50'),
(3, 3, 'BRG-003', 'Sabun Give', 'produk/491L4jX1anx9xlv6H03ZUsoI28ybCEehGzekjMv5.jpg', 0.00, 10000.00, 21, 'Sabun ini terkenal sebagai sabun kecantikan dengan keunggulan wewangian parfum mewah yang tahan lama dan formula pencerah kulit', '2026-03-13 19:26:30', '2026-03-26 23:36:50'),
(4, 4, 'BRG-004', 'Tepung terigu', 'produk/J7bDTvspxnT35lryU2i0E8sFQYlXCqkTxmeyUws1.jpg', 0.00, 5000.00, 27, 'tepung bubuk halus yang dihasilkan dari biji gandum yang digiling.', '2026-03-13 20:19:33', '2026-03-26 23:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuks`
--

CREATE TABLE `barang_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_masuks`
--

INSERT INTO `barang_masuks` (`id`, `barang_id`, `user_id`, `supplier`, `qty`, `tanggal`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PT Suppra', 100, '2026-03-14', 'Barang harian diskon', '2026-03-14 00:35:16', '2026-03-14 00:35:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksis`
--

CREATE TABLE `detail_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksis`
--

INSERT INTO `detail_transaksis` (`id`, `transaksi_id`, `barang_id`, `qty`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 20000.00, 20000.00, '2026-03-13 21:53:51', '2026-03-13 21:53:51'),
(2, 2, 3, 3, 10000.00, 30000.00, '2026-03-14 00:08:15', '2026-03-14 00:08:15'),
(3, 3, 4, 2, 5000.00, 10000.00, '2026-03-14 00:13:16', '2026-03-14 00:13:16'),
(4, 4, 3, 1, 10000.00, 10000.00, '2026-03-26 23:36:50', '2026-03-26 23:36:50'),
(5, 4, 4, 1, 5000.00, 5000.00, '2026-03-26 23:36:50', '2026-03-26 23:36:50'),
(6, 4, 2, 1, 200000.00, 200000.00, '2026-03-26 23:36:50', '2026-03-26 23:36:50'),
(7, 4, 1, 1, 20000.00, 20000.00, '2026-03-26 23:36:50', '2026-03-26 23:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `kasirs`
--

CREATE TABLE `kasirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kasir` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'minyak', NULL, '2026-03-13 18:06:07', '2026-03-13 18:06:07'),
(2, 'beras', NULL, '2026-03-13 18:06:19', '2026-03-13 18:06:19'),
(3, 'sabun', NULL, '2026-03-13 18:06:31', '2026-03-13 18:06:31'),
(4, 'Tepung', NULL, '2026-03-13 20:17:55', '2026-03-13 20:17:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_03_09_164321_create_kategoris_table', 1),
(6, '2026_03_09_164444_create_barangs_table', 1),
(7, '2026_03_09_164455_create_kasirs_table', 1),
(8, '2026_03_09_174651_create_aktivitas_table', 1),
(9, '2026_03_11_075456_add_role_to_users_table', 1),
(10, '2026_03_11_142811_add_gambar_to_barangs_table', 1),
(11, '2026_03_11_143420_create_transaksis_table', 1),
(12, '2026_03_11_143444_create_detail_transaksis_table', 1),
(13, '2026_03_14_025946_add_deskripsi_to_barangs_table', 2),
(14, '2026_03_14_044927_add_metode_pembayaran_to_transaksis_table', 3),
(15, '2026_03_14_072548_create_barang_masuks_table', 4),
(16, '2026_03_22_002919_create_pengaturans_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_toko` varchar(255) NOT NULL DEFAULT 'Toko Kelontong',
  `alamat` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `catatan_struk` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturans`
--

INSERT INTO `pengaturans` (`id`, `nama_toko`, `alamat`, `telepon`, `catatan_struk`, `created_at`, `updated_at`) VALUES
(1, 'Toko Kelontong', 'Jl. Haji nazar rt003/014 karang tengah', '+62 822-4625-8819', 'Terima kasih telah berbelanja! Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan.', '2026-03-21 17:32:10', '2026-03-21 17:49:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_nota` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` decimal(15,2) NOT NULL,
  `uang_bayar` decimal(15,2) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL DEFAULT 'Tunai',
  `kembalian` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `no_nota`, `user_id`, `total_harga`, `uang_bayar`, `metode_pembayaran`, `kembalian`, `created_at`, `updated_at`) VALUES
(1, 'INV-20260314-69B4E9DFC9346', 4, 20000.00, 25000.00, 'Tunai', 5000.00, '2026-03-13 21:53:51', '2026-03-13 21:53:51'),
(2, 'INV-20260314-69B5095F56A53', 4, 30000.00, 35000.00, 'Tunai', 5000.00, '2026-03-14 00:08:15', '2026-03-14 00:08:15'),
(3, 'INV-20260314-69B50A8CAF41E', 4, 10000.00, 10000.00, 'Tunai', 0.00, '2026-03-14 00:13:16', '2026-03-14 00:13:16'),
(4, 'INV-20260327-69C625824B4BF', 3, 235000.00, 300000.00, 'Tunai', 65000.00, '2026-03-26 23:36:50', '2026-03-26 23:36:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Toko', 'admin', 'admin', '2026-03-11 09:37:15', '$2y$12$AjsjRQ/.FQqJb.P/i7pTpenWXHYb.GH0Hk6axgoa80eAk9Chf1Dju', 'Y6hSy7nQkK7sfyWm3KlKeJcWG32R8yCzXb88nep03JRkKALqOt6Wy6vVDZ60', '2026-03-11 09:37:15', '2026-03-21 17:21:01'),
(2, 'Owner Toko', 'owner', 'owner', '2026-03-11 09:37:15', '$2y$12$HmRDhagb1r1zFfHHB2hzMO3.xcWgHa/3Z51S6UUUYjBL9u/QgRsey', 'k6mHWD9BJItricOmgmqIdo21fGUxXLgEHWhRRfS4Pvg293GhW8WrBc8U5MxC', '2026-03-11 09:37:15', '2026-03-11 09:37:15'),
(3, 'Tiwi', 'Tiwi', 'kasir', NULL, '$2y$12$2DMTOMwrRP7bSmlaEtk/J.7GopsLNk2hH1PUQbtmZ6r2xQkT65zBS', NULL, '2026-03-11 09:40:11', '2026-03-26 23:42:09'),
(4, 'Lessa', 'Lessa', 'kasir', NULL, '$2y$12$CmwRqSWdHTzm.0bMSbUAUeXdiFlYinPEv9IJZ2T6neWOk4o/M.Rb2', NULL, '2026-03-13 20:23:15', '2026-03-13 20:23:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barangs_kode_barang_unique` (`kode_barang`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuks_barang_id_foreign` (`barang_id`),
  ADD KEY `barang_masuks_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksis_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `detail_transaksis_barang_id_foreign` (`barang_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kasirs`
--
ALTER TABLE `kasirs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kasirs_email_unique` (`email`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaksis_no_nota_unique` (`no_nota`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kasirs`
--
ALTER TABLE `kasirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_masuks`
--
ALTER TABLE `barang_masuks`
  ADD CONSTRAINT `barang_masuks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `barang_masuks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD CONSTRAINT `detail_transaksis_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
