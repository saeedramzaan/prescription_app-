-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 03, 2023 at 02:51 PM
-- Server version: 8.0.31-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE `item_details` (
  `id` bigint UNSIGNED NOT NULL,
  `patient_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `drug_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prescription_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_details`
--

INSERT INTO `item_details` (`id`, `patient_id`, `patient_name`, `drug_name`, `price`, `qty`, `total`, `created_at`, `updated_at`, `prescription_id`) VALUES
(34, '13', 'ramzan', 'amoxlin 500g', '50', '3', '150', '2023-01-03 02:08:31', '2023-01-03 02:08:31', '11'),
(35, '13', 'ramzan', 'Panadol', '30', '4', '120', '2023-01-03 02:08:40', '2023-01-03 02:08:40', '11'),
(36, '13', 'ramzan', 'amoxlin 500g', '50', '4', '200', '2023-01-03 02:25:34', '2023-01-03 02:25:34', '10'),
(37, '13', 'ramzan', 'amoxlin 500g', '50', '3', '150', '2023-01-03 02:35:57', '2023-01-03 02:35:57', '12'),
(38, '13', 'ramzan', 'Panadol', '30', '2', '60', '2023-01-03 02:36:08', '2023-01-03 02:36:08', '12'),
(39, '13', 'ramzan', 'amoxlin 500g', '50', '4', '200', '2023-01-03 02:42:55', '2023-01-03 02:42:55', '13'),
(40, '13', 'ramzan', 'Panadol', '30', '2', '60', '2023-01-03 02:43:16', '2023-01-03 02:43:16', '13'),
(41, '13', 'ramzan', 'Panadol', '10', '4', '40', '2023-01-03 03:36:44', '2023-01-03 03:36:44', '14'),
(42, '13', 'ramzan', 'Panadol', '10', '2', '20', '2023-01-03 03:38:05', '2023-01-03 03:38:05', '14');

-- --------------------------------------------------------

--
-- Table structure for table `item_masters`
--

CREATE TABLE `item_masters` (
  `id` bigint UNSIGNED NOT NULL,
  `patient_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prescription_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_masters`
--

INSERT INTO `item_masters` (`id`, `patient_id`, `patient_name`, `discount`, `total`, `created_at`, `updated_at`, `prescription_id`, `status`) VALUES
(26, '13', 'ramzan', 'null', '270', '2023-01-03 02:08:45', '2023-01-03 02:31:50', '11', 'Accept'),
(27, '13', 'ramzan', 'null', '200', '2023-01-03 02:25:37', '2023-01-03 02:32:54', '10', 'Reject'),
(28, '13', 'ramzan', 'null', '210', '2023-01-03 02:36:13', '2023-01-03 03:32:03', '12', 'Accept'),
(29, '13', 'ramzan', 'null', '260', '2023-01-03 02:43:23', '2023-01-03 02:43:23', '13', 'Not Updated'),
(30, '13', 'ramzan', 'null', '60', '2023-01-03 03:38:08', '2023-01-03 03:38:08', '14', 'Not Updated');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_12_055541_create_patients_table', 1),
(6, '2022_11_12_065716_add_column_patients', 2),
(7, '2022_11_17_093635_create_times_table', 3),
(8, '2022_11_17_113041_add_column', 4),
(9, '2022_11_17_113239_add_column_patient', 5),
(10, '2022_11_19_080713_add_column_post', 6),
(11, '2018_02_02_121732_create_forms_table', 7),
(12, '2018_02_02_121732_createPres', 8),
(13, '2022_12_28_121519_add_column_pres', 9),
(14, '2022_12_28_172916_create_product_table', 10),
(15, '2022_12_29_045515_create_item_details', 11),
(16, '2022_12_29_060945_create_column_presc', 12),
(17, '2022_12_29_061524_create_column_item', 13),
(18, '2022_12_29_090233_create_master_table', 14),
(19, '2022_12_29_100122_ceate_column_table', 15),
(20, '2022_12_29_133149_create_column_mastertable', 16),
(21, '2022_12_30_112421_make_user_col', 17),
(22, '2022_12_31_110340_add_user', 18),
(23, '2023_01_03_065044_add_column_status', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int UNSIGNED NOT NULL,
  `img_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `patient_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `img_name`, `note`, `delivery_time`, `delivery_address`, `created_at`, `updated_at`, `patient_id`, `patient_name`, `status`) VALUES
(10, 'RBAC.png,Table.png', 'test', 'teeest', '45/1 Kandy Road', '2023-01-03 01:34:01', '2023-01-03 02:25:37', '13', 'ramzan', 'Done'),
(11, 'spiritual-quotes-20.jpg,Table.png', 'test', '11:30pm', '43/1 Kandy Road beli Mw', '2023-01-03 01:36:04', '2023-01-03 02:08:45', '13', 'ramzan', 'Done'),
(12, 'PDO vs MySQL.png,Table.png', 'test', '02:30', '221/1 Kandy Road', '2023-01-03 02:29:56', '2023-01-03 02:36:13', '13', 'ramzan', 'Done'),
(13, 'img2.png', 'test', '13:33', '221/1 Kandy Road', '2023-01-03 02:34:01', '2023-01-03 02:43:23', '13', 'ramzan', 'Done'),
(14, 'Table.png', 'test note', '14:31', '45/1 Kandy Road', '2023-01-03 03:31:30', '2023-01-03 03:38:08', '13', 'ramzan', 'Done');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `drug_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `drug_name`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(4, 'Amoxlin 500g', '25', '50', '2023-01-03 03:25:03', '2023-01-03 03:25:03'),
(5, 'Panadol', '10', '100', '2023-01-03 03:25:35', '2023-01-03 03:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`, `contact_no`, `dob`, `address`) VALUES
(11, 'Saeed', 'saeed@gmail.com', NULL, '$2y$10$uE4JKak0KovTD4JEQA0mY.h5NsVD5e9U5gZEs6D0MRy/0auKwPFU2', NULL, '2022-12-31 06:04:34', '2022-12-31 06:04:34', 'pharmacist', '0717772500', '2022-12-31', '123'),
(12, 'zain', 'zain@gmail.com', NULL, '$2y$10$qEPBXK1X474DORIrwqzSau5dFJnV87EHb0xdN92AzTTjq1aUEAARq', NULL, '2022-12-31 06:10:08', '2022-12-31 06:10:08', 'patient', '0717772500', '2022-12-31', '123'),
(13, 'ramzan', 'ramzan@gmail.com', NULL, '$2y$10$CJdrtQCLiS3l5Gfd1j.sWORmw.ZpP3zDNzhtR/..oPcBW9OGIFVRe', NULL, '2022-12-31 06:15:09', '2022-12-31 06:15:09', 'patient', '0717772500', '2022-12-31', '123 kandy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item_details`
--
ALTER TABLE `item_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_masters`
--
ALTER TABLE `item_masters`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `item_details`
--
ALTER TABLE `item_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `item_masters`
--
ALTER TABLE `item_masters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
