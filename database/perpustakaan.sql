-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2024 at 06:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_18_015333_create_t_anggotas_table', 1),
(6, '2024_04_17_013134_create_t_kategoris_table', 1),
(7, '2024_04_18_014343_create_t_admins_table', 1),
(8, '2024_04_18_035342_create_t_buku_table', 1),
(9, '2024_04_19_013849_create_t_peminjamans_table', 1),
(10, '2024_04_21_061722_create_t_detailbukus_table', 1),
(11, '2024_04_21_113017_create_t_detailpeminjamans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_admins`
--

CREATE TABLE `t_admins` (
  `f_id` bigint UNSIGNED NOT NULL,
  `f_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_level` enum('Admin','Pustakawan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_status` enum('Aktif','Tidak Aktif') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_admins`
--

INSERT INTO `t_admins` (`f_id`, `f_nama`, `f_username`, `f_password`, `f_level`, `f_status`) VALUES
(1, 'admin', 'admin', '$2y$10$xFIulgzcf0JeBmsbZ5aBMO96TnbgrABgiRE5Ynw2nhA.jQQBpRo7a', 'Admin', 'Aktif'),
(2, 'pustakawan', 'pustakawan', '$2y$10$IpddTjjZW4t1naN6Mn163ekrVoXjQss6QPHoVUqYAhPChVz4Zk1pK', 'Pustakawan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_anggotas`
--

CREATE TABLE `t_anggotas` (
  `f_id` bigint UNSIGNED NOT NULL,
  `f_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_tempatlahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_tanggallahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_anggotas`
--

INSERT INTO `t_anggotas` (`f_id`, `f_nama`, `f_username`, `f_password`, `f_tempatlahir`, `f_tanggallahir`) VALUES
(1, 'anggota', 'anggota', '$2y$10$hy0bhn4lYOaiL/5lgyjHT.f0rw35gnVSUTYBrE3qokTMrIUWAho/.', 'Cipinang, Jakarta', '2004-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `t_bukus`
--

CREATE TABLE `t_bukus` (
  `f_id` bigint UNSIGNED NOT NULL,
  `f_idkategori` bigint UNSIGNED NOT NULL,
  `f_judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_pengarang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_penerbit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_bukus`
--

INSERT INTO `t_bukus` (`f_id`, `f_idkategori`, `f_judul`, `f_pengarang`, `f_penerbit`, `f_deskripsi`) VALUES
(1, 1, 'Matematika', 'anonim', 'anonim', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit illum alias dignissimos cumque eaque tenetur possimus molestias cupiditate, aspernatur excepturi delectus illo obcaecati quibusdam odio quidem cum eveniet deserunt quos.');

-- --------------------------------------------------------

--
-- Table structure for table `t_detailbukus`
--

CREATE TABLE `t_detailbukus` (
  `f_id` bigint UNSIGNED NOT NULL,
  `f_idbuku` bigint UNSIGNED NOT NULL,
  `f_stok` int NOT NULL,
  `f_status` enum('Tersedia','Tidak Tersedia') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_detailbukus`
--

INSERT INTO `t_detailbukus` (`f_id`, `f_idbuku`, `f_stok`, `f_status`) VALUES
(1, 1, 3, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `t_detailpeminjamans`
--

CREATE TABLE `t_detailpeminjamans` (
  `f_id` bigint UNSIGNED NOT NULL,
  `f_idpeminjaman` bigint UNSIGNED NOT NULL,
  `f_iddetailbuku` bigint UNSIGNED NOT NULL,
  `f_tanggalkembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_kategoris`
--

CREATE TABLE `t_kategoris` (
  `f_id` bigint UNSIGNED NOT NULL,
  `f_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_kategoris`
--

INSERT INTO `t_kategoris` (`f_id`, `f_kategori`) VALUES
(1, 'Pendidikan'),
(2, 'Novel'),
(3, 'Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjamans`
--

CREATE TABLE `t_peminjamans` (
  `f_id` bigint UNSIGNED NOT NULL,
  `f_idadmin` bigint UNSIGNED NOT NULL,
  `f_idanggota` bigint UNSIGNED NOT NULL,
  `f_tanggalpeminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_admins`
--
ALTER TABLE `t_admins`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_anggotas`
--
ALTER TABLE `t_anggotas`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_bukus`
--
ALTER TABLE `t_bukus`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_bukus_f_idkategori_foreign` (`f_idkategori`);

--
-- Indexes for table `t_detailbukus`
--
ALTER TABLE `t_detailbukus`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_detailbukus_f_idbuku_foreign` (`f_idbuku`);

--
-- Indexes for table `t_detailpeminjamans`
--
ALTER TABLE `t_detailpeminjamans`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_detailpeminjamans_f_idpeminjaman_foreign` (`f_idpeminjaman`),
  ADD KEY `t_detailpeminjamans_f_iddetailbuku_foreign` (`f_iddetailbuku`);

--
-- Indexes for table `t_kategoris`
--
ALTER TABLE `t_kategoris`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `t_peminjamans`
--
ALTER TABLE `t_peminjamans`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `t_peminjamans_f_idadmin_foreign` (`f_idadmin`),
  ADD KEY `t_peminjamans_f_idanggota_foreign` (`f_idanggota`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_admins`
--
ALTER TABLE `t_admins`
  MODIFY `f_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_anggotas`
--
ALTER TABLE `t_anggotas`
  MODIFY `f_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_bukus`
--
ALTER TABLE `t_bukus`
  MODIFY `f_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_detailbukus`
--
ALTER TABLE `t_detailbukus`
  MODIFY `f_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_detailpeminjamans`
--
ALTER TABLE `t_detailpeminjamans`
  MODIFY `f_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_kategoris`
--
ALTER TABLE `t_kategoris`
  MODIFY `f_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_peminjamans`
--
ALTER TABLE `t_peminjamans`
  MODIFY `f_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_bukus`
--
ALTER TABLE `t_bukus`
  ADD CONSTRAINT `t_bukus_f_idkategori_foreign` FOREIGN KEY (`f_idkategori`) REFERENCES `t_kategoris` (`f_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_detailbukus`
--
ALTER TABLE `t_detailbukus`
  ADD CONSTRAINT `t_detailbukus_f_idbuku_foreign` FOREIGN KEY (`f_idbuku`) REFERENCES `t_bukus` (`f_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_detailpeminjamans`
--
ALTER TABLE `t_detailpeminjamans`
  ADD CONSTRAINT `t_detailpeminjamans_f_iddetailbuku_foreign` FOREIGN KEY (`f_iddetailbuku`) REFERENCES `t_detailbukus` (`f_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_detailpeminjamans_f_idpeminjaman_foreign` FOREIGN KEY (`f_idpeminjaman`) REFERENCES `t_peminjamans` (`f_id`) ON DELETE CASCADE;

--
-- Constraints for table `t_peminjamans`
--
ALTER TABLE `t_peminjamans`
  ADD CONSTRAINT `t_peminjamans_f_idadmin_foreign` FOREIGN KEY (`f_idadmin`) REFERENCES `t_admins` (`f_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `t_peminjamans_f_idanggota_foreign` FOREIGN KEY (`f_idanggota`) REFERENCES `t_anggotas` (`f_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
