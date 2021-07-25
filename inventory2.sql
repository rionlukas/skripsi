-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2021 pada 16.55
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kains`
--

CREATE TABLE `kains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KodeKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kains`
--

INSERT INTO `kains` (`id`, `KodeKain`, `NamaKain`, `JenisKain`, `Harga`) VALUES
(1, '010111A', 'BSY Muda 117', 'BSY - YES.31', 725000),
(2, '010111B', 'BSY Tua 117', 'BSY- YES.31', 725000),
(3, '010212', 'BSY Spirit Hitam / Putih', 'BSY - Spirit', 700000),
(4, '010321', 'BSY Tua 120', 'BSY - MZM.31', 750000),
(5, '010321-2', 'BSY Muda 120', 'BSY - MZM.31', 750000),
(6, '0110103', 'Renda Kupu Besar', 'Renda - GP', 1500000),
(7, '0110107', 'Renda Kupu Kecil', 'Renda - GP', 1400000),
(8, '0110109', 'Renda Daun', 'Renda - GP', 1450000),
(9, '011013A', 'Saten Bordir Two Tone', 'Saten Bordir Two Ton', 2000000),
(10, '011035-2', 'Micro ADS', 'MICRO ADS CUCI 69', 1075000),
(11, '011035-3', 'Micro ADS', 'MICRO ADS 78 GSM', 1150000),
(12, '011051', 'Velvet Micro', 'VVT MICRO IMPORT PUT', 1350000),
(13, '011051-1', 'Velvet Micro', 'VVT - MICRO IMP WARN', 1500000),
(14, '011054C', 'Velvet Micro', 'VVT MICRO LOKAL WARN', 1200000),
(15, '011054D', 'Velvet Micro', 'VVT MICRO LOKAL PTH/', 1005000),
(16, '0230D11', 'Rayon Polos', 'RAYON POLOS KH PUTIH', 850000),
(17, '11035', 'Micor ADS', 'MICRO - ADS CUCI 90 ', 1405000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_07_11_153310_create_permission_tables', 1),
(10, '2021_07_12_152927_create_stocks_table', 1),
(11, '2021_07_15_092028_add__keterangan__tanggal__supplier_to_stocks_table', 2),
(12, '2021_07_16_074837_create_orders_table', 3),
(13, '2021_07_16_075847_add_jumlah_to_orders_table', 4),
(14, '2021_07_16_091107_create_pembelians_table', 5),
(15, '2021_07_23_133306_add_harga_to_orders_table', 6),
(16, '2021_07_23_144811_create_kains_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `OrderId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaCustomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TanggalOrder` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `OrderId`, `NamaCustomer`, `NamaKain`, `KodeKain`, `JenisKain`, `TanggalOrder`, `Keterangan`, `Status`, `Jumlah`, `Harga`) VALUES
(3, 'Order_001', 'aldi', 'Katun Wol', 'CV_99', 'Hybrid', '2021-07-16 09:01:08', 'beli 23 roll', 'Disetujui', 31, 0),
(4, 'Order_002', 'rion', 'Katun Wol 22', 'CV_99', 'Katun aja', '2021-07-16 09:02:35', 'beli 22 roll', 'Disetujui', 22, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelians`
--

CREATE TABLE `pembelians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TransactionId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `TanggalPembelian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembelians`
--

INSERT INTO `pembelians` (`id`, `TransactionId`, `Supplier`, `NamaKain`, `KodeKain`, `JenisKain`, `Jumlah`, `TanggalPembelian`, `Keterangan`, `Status`) VALUES
(1, 'TRX_001', 'BUN', 'Katrot', 'AA_99', 'Katun Jahit', 19, '2021-07-16 09:29:52', 'hahaha', 'Disetujui'),
(2, 'TRX_002', 'L7', 'Beng Beng', 'BARU_001', 'Coklat', 22, '2021-07-16 09:53:30', 'beli 22 roll', 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KodeKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisKain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stocks`
--

INSERT INTO `stocks` (`id`, `KodeKain`, `NamaKain`, `JenisKain`, `Jumlah`, `Status`, `Keterangan`, `Supplier`, `Tanggal`) VALUES
(1, 'CV_99', 'Katun Wol', 'Hybrid', 78, 'Disetujui', '', '', '2021-07-16 09:02:35'),
(2, 'HH_90', 'Bludru', 'Katun', 10, 'Disetujui', '', '', '2021-07-15 16:39:56'),
(3, 'AA_99', 'Katrot', 'Katun Jahit', 80, 'Belum Disetujui', 'aaaa', 'BUN', '2021-07-16 09:29:52'),
(4, 'BARU_001', 'Beng Beng', 'Coklat', 22, 'Belum Disetujui', 'beli 22 roll', 'L7', '2021-07-16 09:53:30'),
(5, '011035-2', 'Micro ADS', 'MICRO ADS CUCI 69', 33, 'Belum Disetujui', '', '', '2021-07-23 15:45:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'owner01@gmail.com', NULL, '$2y$10$wQQmWKo2fK7fdn4HAOmCmuwLnyEwgnOfPl/30u1QKVkkyt8uOsQui', NULL, '2021-07-15 00:36:35', '2021-07-15 00:36:35'),
(2, 'Admin', 'admingudang01@gmail.com', NULL, '$2y$10$Mt3uf2a6FhXqveUemF0lz.Ez5Y5hHNtETDNadWl2DTTP9Vzxi/N4e', NULL, '2021-07-15 00:36:59', '2021-07-15 00:36:59');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kains`
--
ALTER TABLE `kains`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kains`
--
ALTER TABLE `kains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
