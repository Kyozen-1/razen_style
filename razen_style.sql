-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Jun 2023 pada 12.58
-- Versi server: 5.7.33
-- Versi PHP: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `razen_style`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `brands`
--

INSERT INTO `brands` (`id`, `nama`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Boot Experts', '648692bd60c99-230612.png', '2023-06-11 20:36:29', '2023-06-11 20:36:29'),
(2, 'Code Carnival', '648692c8530fc-230612.png', '2023-06-11 20:36:40', '2023-06-11 20:36:40'),
(3, 'Devitems', '648692d0dda03-230612.png', '2023-06-11 20:36:48', '2023-06-11 20:36:48'),
(4, 'Hastech', '648692d9cdb28-230612.png', '2023-06-11 20:36:57', '2023-06-11 20:36:57'),
(5, 'Right Sell', '648692ed05295-230612.png', '2023-06-11 20:37:17', '2023-06-11 20:37:17');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_banner_berandas`
--

CREATE TABLE `landing_page_banner_berandas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` longtext COLLATE utf8mb4_unicode_ci,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_banner_berandas`
--

INSERT INTO `landing_page_banner_berandas` (`id`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '<p>welcome to our</p>\r\n\r\n<p><strong>elegent furniture</strong></p>\r\n\r\n<p>gallery 2021</p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. &nbsp;If you are going to use a &nbsp;passage of Lorem Ipsum, you need to be sure there hidden in the middle of text.</p>', '648689df033d7-230612.jpg', '2023-06-11 19:58:39', '2023-06-11 19:58:39'),
(2, '<p>welcome to our</p>\r\n\r\n<p><strong>elegent furniture</strong></p>\r\n\r\n<p>gallery 2021</p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. &nbsp;If you are going to use a &nbsp;passage of Lorem Ipsum, you need to be sure there hidden in the middle of text.</p>', '64868a8f5d502-230612.jpg', '2023-06-11 20:01:35', '2023-06-11 20:01:35'),
(3, '<p>welcome to our</p>\r\n\r\n<p><strong>elegent furniture</strong></p>\r\n\r\n<p>gallery 2021</p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. &nbsp;If you are going to use a &nbsp;passage of Lorem Ipsum, you need to be sure there hidden in the middle of text.</p>', '64868aa0c677a-230612.jpg', '2023-06-11 20:01:52', '2023-06-11 20:01:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_berandas`
--

CREATE TABLE `landing_page_berandas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_3` json DEFAULT NULL,
  `section_5` json DEFAULT NULL,
  `section_6` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `section_2` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_berandas`
--

INSERT INTO `landing_page_berandas` (`id`, `section_3`, `section_5`, `section_6`, `created_at`, `updated_at`, `section_2`) VALUES
(1, '{\"judul\": \"Featured Products\"}', '{\"judul\": \"Purchase Online on Hurst\"}', '{\"judul\": \"From The Blog\"}', '2023-06-11 20:15:42', '2023-06-13 20:14:53', '{\"judul\": \"DESIGN BY HURST MODERN -2021\", \"gambar\": \"648930ad72b72-230614.jpg\"}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_kontaks`
--

CREATE TABLE `landing_page_kontaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_kontaks`
--

INSERT INTO `landing_page_kontaks` (`id`, `section_1`, `created_at`, `updated_at`) VALUES
(1, '{\"gambar\": \"6486e3c5b058f-230612.jpg\"}', '2023-06-12 02:22:13', '2023-06-12 02:22:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_perusahaans`
--

CREATE TABLE `landing_page_perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` json DEFAULT NULL,
  `section_2` json DEFAULT NULL,
  `section_3` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_perusahaans`
--

INSERT INTO `landing_page_perusahaans` (`id`, `section_1`, `section_2`, `section_3`, `created_at`, `updated_at`) VALUES
(1, '{\"gambar\": \"6486999037524-230612.jpg\"}', '{\"judul\": \"ABOUT HURST\", \"gambar\": \"64869afa3de82-230612.png\", \"deskripsi\": \"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magn aliqua. Ut enim ad minim veniam, ommodo consequa. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia is be deserunt mollit anim id est laborum.</p>\\r\\n\\r\\n<p>Sed ut perspiciatis unde omnis iste natus error sit. voluptatem accusantium doloremque laudantium, totam remes aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>\\r\\n\\r\\n<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>\"}', '{\"judul\": \"Team Member\"}', '2023-06-11 21:05:36', '2023-06-11 21:13:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `landing_page_produks`
--

CREATE TABLE `landing_page_produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_1` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `landing_page_produks`
--

INSERT INTO `landing_page_produks` (`id`, `section_1`, `created_at`, `updated_at`) VALUES
(1, '{\"gambar\": \"6486e011c7ecd-230612.jpg\"}', '2023-06-12 02:06:25', '2023-06-12 02:06:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_media_sosials`
--

CREATE TABLE `master_media_sosials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_ikon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_media_sosials`
--

INSERT INTO `master_media_sosials` (`id`, `nama`, `kode_ikon`, `created_at`, `updated_at`) VALUES
(1, 'Twitter', 'zmdi zmdi-twitter', '2023-06-11 23:58:45', '2023-06-11 23:58:45'),
(2, 'RDF Site Summary', 'zmdi zmdi-rss', '2023-06-11 23:59:11', '2023-06-11 23:59:11'),
(3, 'Facebook', 'zmdi zmdi-facebook', '2023-06-11 23:59:21', '2023-06-11 23:59:21'),
(4, 'LinkedIn', 'zmdi zmdi-linkedin', '2023-06-11 23:59:31', '2023-06-11 23:59:31'),
(5, 'Pinterest', 'zmdi zmdi-pinterest', '2023-06-11 23:59:41', '2023-06-11 23:59:41'),
(6, 'tes', '1', '2023-06-14 21:19:54', '2023-06-14 21:19:54'),
(7, 'tes', '1', '2023-06-14 21:19:58', '2023-06-14 21:19:58'),
(8, 'tes', '1', '2023-06-14 21:20:01', '2023-06-14 21:20:01'),
(9, 'tes', '1', '2023-06-14 21:20:05', '2023-06-14 21:20:05'),
(10, 'tes', '1', '2023-06-14 21:20:09', '2023-06-14 21:20:09'),
(11, '1', 'tes', '2023-06-14 21:20:17', '2023-06-14 21:20:17');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_11_020610_create_profils_table', 1),
(6, '2023_06_12_022156_create_landing_page_berandas_table', 2),
(7, '2023_06_12_022557_create_landing_page_banner_berandas_table', 2),
(8, '2023_06_12_032528_create_brands_table', 3),
(9, '2023_06_12_035618_create_landing_page_perusahaans_table', 4),
(12, '2023_06_12_042121_create_master_media_sosials_table', 5),
(13, '2023_06_12_065026_create_tims_table', 5),
(14, '2023_06_12_065153_create_pivot_tim_media_sosials_table', 5),
(15, '2023_06_12_090313_create_landing_page_produks_table', 6),
(16, '2023_06_12_092045_create_landing_page_kontaks_table', 7),
(17, '2023_06_14_030019_add_section_2_to_landing_page_berandas', 8);

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pivot_tim_media_sosials`
--

CREATE TABLE `pivot_tim_media_sosials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tim_id` bigint(20) UNSIGNED DEFAULT NULL,
  `media_sosial_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tautan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pivot_tim_media_sosials`
--

INSERT INTO `pivot_tim_media_sosials` (`id`, `tim_id`, `media_sosial_id`, `tautan`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '#', '2023-06-12 00:02:06', '2023-06-12 00:02:06'),
(2, 2, 2, '#', '2023-06-12 00:02:06', '2023-06-12 00:02:06'),
(3, 2, 3, '#', '2023-06-12 00:02:06', '2023-06-12 00:02:06'),
(4, 2, 4, '#', '2023-06-12 00:02:06', '2023-06-12 00:02:06'),
(5, 2, 5, '#', '2023-06-12 00:02:06', '2023-06-12 00:02:06'),
(6, 3, 1, '#', '2023-06-12 00:04:58', '2023-06-12 00:04:58'),
(7, 3, 2, '#', '2023-06-12 00:04:58', '2023-06-12 00:04:58'),
(8, 3, 3, '#', '2023-06-12 00:04:58', '2023-06-12 00:04:58'),
(9, 3, 4, '#', '2023-06-12 00:04:58', '2023-06-12 00:04:58'),
(10, 3, 5, '#', '2023-06-12 00:04:58', '2023-06-12 00:04:58'),
(11, 4, 1, '#', '2023-06-12 00:05:52', '2023-06-12 00:05:52'),
(12, 4, 2, '#', '2023-06-12 00:05:52', '2023-06-12 00:05:52'),
(13, 4, 3, '#', '2023-06-12 00:05:52', '2023-06-12 00:05:52'),
(14, 4, 4, '#', '2023-06-12 00:05:52', '2023-06-12 00:05:52'),
(15, 4, 5, '#', '2023-06-12 00:05:52', '2023-06-12 00:05:52'),
(16, 5, 1, '#', '2023-06-12 00:06:36', '2023-06-12 00:06:36'),
(17, 5, 2, '#', '2023-06-12 00:06:36', '2023-06-12 00:06:36'),
(18, 5, 3, '#', '2023-06-12 00:06:36', '2023-06-12 00:06:36'),
(19, 5, 4, '#', '2023-06-12 00:06:36', '2023-06-12 00:06:36'),
(20, 5, 5, '#', '2023-06-12 00:06:36', '2023-06-12 00:06:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_kecil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profils`
--

INSERT INTO `profils` (`id`, `nama`, `pt`, `no_hp`, `email`, `logo`, `logo_kecil`, `alamat`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Razen Style', 'PT Razen Teknologi Indonesia', '082299449494', 'hello@razen.co.id', '642b9aa063e73-230404.png', '6453110958d3f-230504.png', 'Yogyakarta', 'Razen Style', NULL, '2023-06-10 23:16:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tims`
--

CREATE TABLE `tims` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tims`
--

INSERT INTO `tims` (`id`, `nama`, `deskripsi`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'Nancy holland', 'There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.', 'Chairman', '6486c2ee303f1-230612.png', '2023-06-12 00:02:06', '2023-06-12 00:02:06'),
(3, 'Heather Estrada', 'There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.', 'Chief Marketing', '6486c39a74357-230612.png', '2023-06-12 00:04:58', '2023-06-12 00:04:58'),
(4, 'Nancy holland', 'There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.', 'fashion desinger', '6486c3d09c106-230612.png', '2023-06-12 00:05:52', '2023-06-12 00:05:52'),
(5, 'Sara Knight', 'There are many variations of passage of Lorem Ipsum available, but the in majority have suffered.', 'Graphic Design', '6486c3fc918ab-230612.png', '2023-06-12 00:06:36', '2023-06-12 00:06:36');

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
  `color_layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behaviour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `radius` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `color_layout`, `nav_color`, `placement`, `behaviour`, `layout`, `radius`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Razen Teknologi', 'razen_style@razen.co.id', NULL, '$2y$10$vUlaHLsUBySNV17OB4bA0OgYjwnU1ThdLwFcLlbghO900K8Jz.1f.', 'dark-sky', 'default', 'vertical', 'pinned', 'fluid', 'rounded', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `landing_page_banner_berandas`
--
ALTER TABLE `landing_page_banner_berandas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_berandas`
--
ALTER TABLE `landing_page_berandas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_kontaks`
--
ALTER TABLE `landing_page_kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_perusahaans`
--
ALTER TABLE `landing_page_perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `landing_page_produks`
--
ALTER TABLE `landing_page_produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_media_sosials`
--
ALTER TABLE `master_media_sosials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pivot_tim_media_sosials`
--
ALTER TABLE `pivot_tim_media_sosials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pivot_tim_media_sosials_tim_id_foreign` (`tim_id`),
  ADD KEY `pivot_tim_media_sosials_media_sosial_id_foreign` (`media_sosial_id`);

--
-- Indeks untuk tabel `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tims`
--
ALTER TABLE `tims`
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
-- AUTO_INCREMENT untuk tabel `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `landing_page_banner_berandas`
--
ALTER TABLE `landing_page_banner_berandas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `landing_page_berandas`
--
ALTER TABLE `landing_page_berandas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `landing_page_kontaks`
--
ALTER TABLE `landing_page_kontaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `landing_page_perusahaans`
--
ALTER TABLE `landing_page_perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `landing_page_produks`
--
ALTER TABLE `landing_page_produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `master_media_sosials`
--
ALTER TABLE `master_media_sosials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pivot_tim_media_sosials`
--
ALTER TABLE `pivot_tim_media_sosials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tims`
--
ALTER TABLE `tims`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pivot_tim_media_sosials`
--
ALTER TABLE `pivot_tim_media_sosials`
  ADD CONSTRAINT `pivot_tim_media_sosials_media_sosial_id_foreign` FOREIGN KEY (`media_sosial_id`) REFERENCES `master_media_sosials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pivot_tim_media_sosials_tim_id_foreign` FOREIGN KEY (`tim_id`) REFERENCES `tims` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
