-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 02:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CCTV Cameras', 'CCTV Camera collection', '2023-09-15 07:23:24', '2023-09-15 07:23:24'),
(2, 'Access Control Systems', 'Access control System packages', '2023-09-15 10:48:07', '2023-09-15 10:48:07'),
(3, 'Accessories', 'Accessories List', '2023-09-15 10:48:52', '2023-09-15 10:48:52');

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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_16_025837_create_messages_table', 2),
(7, '2023_06_06_062953_create_products_table', 3),
(9, '2023_09_09_154627_add_dob_to_users', 4),
(10, '2023_09_15_065941_create_categories_table', 5),
(11, '2023_09_15_070707_create_products_table', 5),
(12, '2023_09_15_095839_create_products_table', 6);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ayantha1004@gmail.com', '$2y$10$gNc9qsNuoIDEIn8xfYSX..0.eAY4EMsPQxN/Fh40imGWMtEC7rqXi', '2023-05-16 00:55:26');

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 11, 'API TOKEN', 'ea85c6374253af37030f7dee922016910ee4edd0c00af3f98e855a0077cb726b', '[\"*\"]', NULL, NULL, '2023-09-25 02:34:01', '2023-09-25 02:34:01'),
(2, 'App\\Models\\User', 17, 'API TOKEN', '84a1dc2c2640eddf72e19ac001696d3ad4fbfe49ed217ef00cf9ee2e58f85cb7', '[\"*\"]', NULL, NULL, '2023-09-25 02:52:59', '2023-09-25 02:52:59'),
(3, 'App\\Models\\User', 1, 'API TOKEN', '33b94fbdb9045ff715322b26f5eed0d87ef004ee9f72ed3546ab61d694227195', '[\"admin\"]', '2023-09-27 00:15:32', NULL, '2023-09-26 23:59:54', '2023-09-27 00:15:32'),
(4, 'App\\Models\\User', 11, 'API TOKEN', 'fbfb1c4658b918daa2141d09fdc78a36f243458c9abb8d0c9bd8d30d0569eab9', '[\"standard\"]', '2023-09-27 00:20:39', NULL, '2023-09-27 00:15:55', '2023-09-27 00:20:39'),
(5, 'App\\Models\\User', 1, 'API TOKEN', 'aed9e66fb61130c92e8c0ab1ac7c43daaea1eb969536db7b4cde80a1787f3dbb', '[\"admin\"]', '2023-09-29 02:22:28', NULL, '2023-09-27 00:20:51', '2023-09-29 02:22:28'),
(6, 'App\\Models\\User', 1, 'API TOKEN', '5dc3082f50faafab35b648742418342bf7690ad8cd08a3472262decdc998317c', '[\"admin\"]', NULL, NULL, '2023-09-29 00:43:03', '2023-09-29 00:43:03'),
(7, 'App\\Models\\User', 1, 'API TOKEN', '528771b43366a7c283a122f49178b0b2ccefc0d10bec0f6423129f5a5c4c6e67', '[\"admin\"]', NULL, NULL, '2023-09-29 01:39:58', '2023-09-29 01:39:58'),
(8, 'App\\Models\\User', 20, 'API TOKEN', 'dba5c4c04f3867fa5e69d5c8c8065d208e3667894f5c2ad4589715c62f028a55', '[\"*\"]', NULL, NULL, '2023-09-29 01:46:20', '2023-09-29 01:46:20'),
(9, 'App\\Models\\User', 1, 'API TOKEN', 'd580ba29ed82e4540fe972fbb2dfc0c22141bc9b95add089e58f54a3ef18d7cf', '[\"admin\"]', NULL, NULL, '2023-09-29 01:58:46', '2023-09-29 01:58:46'),
(10, 'App\\Models\\User', 11, 'API TOKEN', 'fb85da714a9c27a133d5c8c9c66f7176a047b1d166fe8631af4c0c16a0a72048', '[\"standard\"]', NULL, NULL, '2023-09-29 02:09:09', '2023-09-29 02:09:09'),
(11, 'App\\Models\\User', 21, 'API TOKEN', '29621a94ba9b8404cc8ee81e37d37496c148110862aeef56d610e78dce0a3854', '[\"*\"]', NULL, NULL, '2023-09-29 02:10:35', '2023-09-29 02:10:35'),
(12, 'App\\Models\\User', 1, 'API TOKEN', '71c7f4d5eb38172a9dd0d90d186df7e681707b409c526e17ca0ab3d04b4967e6', '[\"admin\"]', '2023-09-29 03:55:16', NULL, '2023-09-29 02:37:32', '2023-09-29 03:55:16'),
(13, 'App\\Models\\User', 1, 'API TOKEN', 'e811ff87084f07dadaa86142849aa31a62a601a97cd76f2f80f23bf55d063641', '[\"admin\"]', NULL, NULL, '2023-09-29 04:08:26', '2023-09-29 04:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `color`, `created_at`, `updated_at`) VALUES
(2, 2, 'Readers', '100.00', 'Indoor and outdoor readers for access control and more', 'Black', '2023-09-15 10:57:45', '2023-09-15 10:57:45'),
(3, 3, 'Joysticks and Keypads\r\n', '95.00', 'Modular control board for professional camera and video management', 'Black', '2023-09-15 11:10:00', '2023-09-15 11:10:00'),
(5, 2, 'Solar cam', '128.00', 'Solar power charged cam', 'White', '2023-09-29 03:01:30', '2023-09-29 03:01:30'),
(6, 2, 'Solar cam', '128.00', 'Solar power charged cam', 'Black', '2023-09-29 03:06:53', '2023-09-29 03:06:53'),
(7, 2, 'Solar cam', '128.00', 'Solar power charged cam', 'Red', '2023-09-29 03:10:31', '2023-09-29 03:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `address`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `date_of_birth`) VALUES
(1, 'Admin', 'admin@gmail.com', '0774565231', '123 Kandy Road Welligalla', '2023-05-14 22:28:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'zctcUGGvB2d1UnUzcYSRl47dtHsDCuTW8IogzKdkcnBoI2im3MpO0ZukFn8A', '2023-05-14 22:28:00', '2023-09-07 11:49:02', '2023-09-04'),
(4, 'Dammika Bambaradeniya', 'bambare@gmail.com', '0775035897', 'Bambaradeniya Walawwa Welligalla', NULL, '$2y$10$u9Shau73I/.UltNyVMT7qO0mwD/5UrPmcycs12pSPmUuFitPBIhtm', 0, NULL, '2023-05-15 21:05:02', '2023-05-15 21:05:02', NULL),
(11, 'Ayantha Seneviratne', 'ayantha1004@gmail.com', '0774264255', '119 Kandy Road Welligalla', NULL, '$2y$10$kTBvbvoFzlBQdT2bALGOtulmcrsU6Jo4qmPn1fSFmUA4bR.KixEf.', 0, NULL, '2023-09-07 11:55:02', '2023-09-07 11:55:02', '2003-04-20'),
(12, 'Kanchana Senadheera', 'kanchanas@gmail.com', '0774565789', '19/A Rajagiriya', NULL, '$2y$10$E5lWiq1DYGuCCtF1fKGxg.Uadfi6AKvzJLzoKNybyrw9hQpNy0I0O', 0, NULL, '2023-09-09 09:59:10', '2023-09-09 09:59:10', NULL),
(13, 'Bashini Weerasinghe', 'bashi@gmail.com', '0774785961', '41 Hippala Rd Thalathuoya', NULL, '$2y$10$yT2MRbYNqWpnjuesWT7iEu0gAlmvxC.43XViCGYY5P3TxsEuzb5xm', 0, NULL, '2023-09-09 10:41:37', '2023-09-09 10:41:37', NULL),
(14, 'Maryam Mashkoora', 'maryam@gmail.com', '0777456669', 'Street hut Mawanella', NULL, '$2y$10$ETE.j8nF9YbOQnxTyBFx.Oz/IBderwmuIwrzSrLtm4fBRlIw6j9XK', 0, NULL, '2023-09-09 11:08:59', '2023-09-09 11:08:59', NULL),
(17, 'Ruchintha Tennakoon', 'ruchii@gmail.com', '0771234567', 'Matale Rd, Kandy', NULL, '$2y$10$5JgTgPAlZyo/xs70ZkO/kOZNGuZ0wCpxIUyt6XE.eyAY23hzwYwXm', 0, NULL, '2023-09-25 02:52:59', '2023-09-27 00:32:46', '2002-09-09'),
(19, 'Kanchana Bambaradeniya', 'kanchana@gmail.com', '076737452', '119 Kandy Road Welligalla', NULL, '$2y$10$4nYdOfJSN21xgSg7zINf3Owc8Z1wlcbEAJDxpcQFJyOVWjn9NcmMq', 0, NULL, '2023-09-29 00:15:37', '2023-09-29 00:15:37', '1973-03-26'),
(20, 'Ruchintha Tennakoon', 'ruchintha@gmail.com', '0764561230', 'Kubikale Maathale', NULL, '$2y$10$u7NtzU.64mIXxCpuC7v4duljw/RIzmNe.nBFcOlAMP1uetjPjWp42', 0, NULL, '2023-09-29 01:46:20', '2023-09-29 01:46:20', '2003-07-16'),
(21, 'Amindu', 'ammi@gmail.com', '0774567892', 'Anuradhapura', NULL, '$2y$10$FpgX3/CdWVzLN.eDwZQHGuETE1PWg6s0isILB7uWKpda7v5wSTOde', 0, NULL, '2023-09-29 02:10:35', '2023-09-29 02:10:35', '2003-07-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
