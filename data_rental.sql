-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Mar 2017 pada 04.22
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_rental`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `merek` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `plat_no` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tgl_service` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama`, `image`, `merek`, `type`, `warna`, `plat_no`, `status`, `harga`, `tgl_service`, `created_at`, `updated_at`) VALUES
(1, 'Honda Supra', '800086d106de50fa21eb6bc5992ebeb6.jpg', 'Honda', 1, 'Hitam', 'DK1000ED', 1, 75000, 14, '2017-03-08 19:10:07', '2017-03-08 19:26:51'),
(2, 'Honda Scoopy', 'aee922459b322e4d2017bd748773eb89.jpg', 'Honda', 1, 'Hitam-Merah', 'DK3000NA', 1, 100000, 10, '2017-03-09 18:45:07', '2017-03-09 18:45:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_03_054055_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'operator', 'Input Operator', 'User is the operator of a system', '2017-03-02 21:51:52', '2017-03-02 21:51:52'),
(2, 'admin', 'User Administrator', 'User is allowed to manage and edit other users', '2017-03-02 21:51:52', '2017-03-02 21:51:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 2),
(2, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `kendaraan_id` int(11) DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `service`
--

INSERT INTO `service` (`id`, `kendaraan_id`, `service_date`, `total`, `image`, `created_at`, `updated_at`) VALUES
(1, 2, '2017-08-03', 73000, '146b8736183d68296ec2a76157f19052.jpg', '2017-03-09 20:07:14', '2017-03-09 20:07:14'),
(3, 1, '2017-03-16', 100000, 'cf09a56182f8ffda31c082129a3b06ff.jpg', '2017-03-15 18:32:58', '2017-03-15 18:32:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `kendaraan_id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text,
  `id_type` int(1) DEFAULT NULL,
  `id_no` varchar(100) DEFAULT NULL,
  `id_image` varchar(225) DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `durasi` int(2) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kendaraan_id`, `nama`, `telp`, `alamat`, `id_type`, `id_no`, `id_image`, `tgl_sewa`, `durasi`, `denda`, `total`, `status`, `tgl_kembali`, `created_at`, `updated_at`) VALUES
(1, 2, 'Eriko', '085737364525', 'Jalan Nangka', 1, '6210599048739', '4486a13f73e18caf871f5d21250e5ca4.jpg', '2017-03-07', 3, 300000, 300000, 2, '2017-03-13', '2017-03-11 20:46:17', '2017-03-13 04:25:16'),
(2, 1, 'Hendra', '0822373734', 'Jalan Nangka Utara', 2, '1231232334345', '68904290369c28c06c8d1fe012501070.jpg', '2017-03-16', 3, 0, 225000, 2, '2017-03-16', '2017-03-15 18:54:09', '2017-03-15 18:54:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telp` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telp`, `password`, `remember_token`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '085737343456', '$2y$10$Ga3rIFEmrG.8QsWkpHddrOgoxl6JhPfP4SY/CgCauTBnTpHzLpHTu', 'lHMnv9kWdkxtCvaAok37TpfYLnozL7GQBxKSMCpRCKa606UgD1JFbYYeYINc', 1, 1, '2017-03-02 21:49:08', '2017-03-15 19:22:21'),
(2, 'Test Operator', 'operator@mail.com', '08573736483', '$2y$10$GVVx1dXRRaMCeqKxLOAxoesiIPHRtyVmed7lR9/ejUXa6iaBMDYXi', NULL, 2, 1, '2017-03-13 05:44:16', '2017-03-13 05:52:09'),
(3, 'Admin Test', 'admin2@mail.com', '085737343456', '$2y$10$2dAYQNTVNhDruggKIqRaTuZtAQETnhKAr2LLtNeBX30c/.ntRGzOG', NULL, 1, 1, '2017-03-14 19:21:49', '2017-03-14 19:21:49'),
(4, 'Operator Awesome', 'awesome@mail.com', '08474283728', '$2y$10$YgZeq5P7BJnIJvcLIJbLSORIW9i0XOWJ.RbniMjZ0d5AKFmH7Y.tW', 'RIgzVSlCTBElZPgrwG48uUmNF7XgYhwPL8kqvTl1UR8lRgH9NXl5UjumNPPs', 2, 1, '2017-03-14 19:25:49', '2017-03-14 19:29:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
