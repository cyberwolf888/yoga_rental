-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 08:12 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

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
-- Table structure for table `kendaraan`
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
  `kmmeter` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nama`, `image`, `merek`, `type`, `warna`, `plat_no`, `status`, `harga`, `tgl_service`, `kmmeter`, `created_at`, `updated_at`) VALUES
(1, 'Honda Supra', '800086d106de50fa21eb6bc5992ebeb6.jpg', 'Honda', 1, 'Hitam', 'DK1000ED', 2, 75000, 14, 25000, '2017-03-08 19:10:07', '2017-04-19 22:07:12'),
(2, 'Honda Scoopy', 'aee922459b322e4d2017bd748773eb89.jpg', 'Honda', 1, 'Hitam-Merah', 'DK3000NA', 1, 100000, 10, 32202, '2017-03-09 18:45:07', '2017-04-18 19:50:09'),
(3, 'Honda Jazz', '99ee1ab1aef8787e1c6ae13eb0301d2b.jpg', 'Honda', 2, 'Merah', 'DK321LD', 1, 350000, 13, 0, '2017-04-10 19:55:49', '2017-04-17 22:33:21'),
(4, 'Toyota Yaris', '97a0b061b0c70050d63df03da00776aa.jpg', 'Toyota', 2, 'Merah', 'DK454DI', 1, 400000, 5, 2000, '2017-04-10 20:05:37', '2017-04-10 20:05:37'),
(5, 'Toyota Rush', '99b49f0e3ba3d71536cce5203b25fb92.jpg', 'Toyota', 2, 'Putih', 'DK900LI', 1, 400000, 14, 0, '2017-04-10 20:06:51', '2017-04-18 21:10:51'),
(6, 'mio', '9e838e25a3f89805946558d143080ee8.jpg', 'yamaha', 1, 'merah', 'DK1111QQ', 1, 75000, 17, 6000, '2017-04-16 23:13:52', '2017-04-18 21:50:33'),
(7, 'mio', '61b7cdce520962025dd95b648e143ca1.jpg', 'yamaha', 1, 'putih', 'DK123ww', 1, 75000, 19, 1000, '2017-04-18 23:04:34', '2017-04-18 23:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_03_054055_entrust_setup_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
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
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'operator', 'Input Operator', 'User is the operator of a system', '2017-03-02 21:51:52', '2017-03-02 21:51:52'),
(2, 'admin', 'User Administrator', 'User is allowed to manage and edit other users', '2017-03-02 21:51:52', '2017-03-02 21:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 2),
(2, 1),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `kendaraan_id` int(11) DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pic` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
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
  `kmstart` int(11) DEFAULT '0',
  `kmend` int(11) DEFAULT '0',
  `denda` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kendaraan_id`, `nama`, `telp`, `alamat`, `id_type`, `id_no`, `id_image`, `tgl_sewa`, `durasi`, `kmstart`, `kmend`, `denda`, `total`, `status`, `tgl_kembali`, `created_at`, `updated_at`) VALUES
(1, 1, 'aditya', '081234556432', 'denpasar', 1, '00832864364383754732', 'dafaa881edc3c8a12b0aaa0eb62a942d.jpg', '2017-04-20', 4, 25000, 0, 0, 300000, 1, NULL, '2017-04-19 22:07:12', '2017-04-19 22:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telp`, `password`, `remember_token`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '085737343456', '$2y$10$Ga3rIFEmrG.8QsWkpHddrOgoxl6JhPfP4SY/CgCauTBnTpHzLpHTu', 'sQ1tVhBLxrB7wG7kcKwNQ0jgzpObuX3Ji2emVXeCHpoDFUDgeYofel01LTRT', 1, 1, '2017-03-02 21:49:08', '2017-04-19 21:57:27'),
(2, 'Test Operator', 'operator@mail.com', '08573736483', '$2y$10$GVVx1dXRRaMCeqKxLOAxoesiIPHRtyVmed7lR9/ejUXa6iaBMDYXi', 'o7VzbtCoeRnh7JLygbq1PisYaZ9yyb9HLpnQswJjSP7MhzbUzn3Dq0cycjgq', 2, 1, '2017-03-13 05:44:16', '2017-04-19 21:56:35'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
