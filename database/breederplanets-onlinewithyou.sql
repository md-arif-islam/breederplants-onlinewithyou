-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2024 at 12:52 PM
-- Server version: 10.11.8-MariaDB-0ubuntu0.24.04.1
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `breederplanets-onlinewithyou`
--

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(29, '2024_07_16_214532_create_variety_reports_table', 2),
(30, '2024_07_16_214607_create_variety_samples_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` enum('admin','grower','breeder') NOT NULL DEFAULT 'grower',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', '$2y$12$pg22L/t2RBsc/W6/8P2H/.c2JBPAeN82C5T1f2hlWf/8PF.3hVFeS', NULL, 'admin', 'active', '2024-07-16 15:01:13', '2024-07-16 15:01:13'),
(3, 'Breeder User', 'breeder@example.com', '$2y$12$3lVLsLCfn7iqCv0VQkUgcehlrgj67a84X0.9.EKU2O2EAZcFF12r2', NULL, 'breeder', 'active', '2024-07-17 11:19:02', '2024-07-17 11:19:02'),
(14, 'Grower 1', 'grower1@example.com', '$2y$12$00XYufe5sqAWma8XOfmote8CtjkXj9n1.69c6K7rdRw8nqGVLVTaO', NULL, 'grower', 'active', '2024-07-17 12:45:00', '2024-07-17 12:45:00'),
(15, 'Grower 2', 'grower2@example.com', '$2y$12$Anc7NhDOsQ16yhkutZs3ae23fwrKSkH/Z7G5RLdweIL9UXDyUNNZG', NULL, 'grower', 'active', '2024-07-17 12:45:01', '2024-07-17 12:45:01'),
(16, 'Grower 3', 'grower3@example.com', '$2y$12$yHdbL0I1S7Z4LzrOuavhROymsfojJHR/cKTr/6L69FrWCOTb4m5Su', NULL, 'grower', 'active', '2024-07-17 12:45:01', '2024-07-17 12:45:01'),
(17, 'Grower 4', 'grower4@example.com', '$2y$12$VTQE.U5J0PWnx3kF7vu8u.LHldaGCwngLdOdYBlvqc7PVfyRGuXXi', NULL, 'grower', 'active', '2024-07-17 12:45:01', '2024-07-17 12:45:01'),
(18, 'Grower 5', 'grower5@example.com', '$2y$12$ZRKPEZp04DRyREVkI9oa2eiEtJABauXxnNaptE4MRjxRlJ490Ro8e', NULL, 'grower', 'inactive', '2024-07-17 12:45:01', '2024-07-23 09:37:52'),
(19, 'Breeder 1', 'breeder1@example.com', '$2y$12$sanVrAb67gbx/xyX8pmSfu6viZEA8kLEabVJgLmRrP62dF5LCk0tu', NULL, 'breeder', 'active', '2024-07-17 12:45:01', '2024-07-17 12:45:01'),
(20, 'Breeder 2', 'breeder2@example.com', '$2y$12$Fm7KLfFZFEuwUZ3rZRxEv..8ZHyzgCgHxX/MTQHNzuF.kFTD4Hlr.', NULL, 'breeder', 'active', '2024-07-17 12:45:02', '2024-07-17 12:45:02'),
(21, 'Breeder 3', 'breeder3@example.com', '$2y$12$EAJxviO04Uy5JIKlog0fb.Sncju9eImu8/QFYRJ4ct3bYld8CVX.u', NULL, 'breeder', 'active', '2024-07-17 12:45:02', '2024-07-17 12:45:02'),
(22, 'Breeder 4', 'breeder4@example.com', '$2y$12$iS637Eja91q2HhwkOkVv6OVyO0AgOMrQ10cDSx5bVglaapL4bRjAi', NULL, 'breeder', 'active', '2024-07-17 12:45:02', '2024-07-17 12:45:02'),
(23, 'Breeder 5', 'breeder5@example.com', '$2y$12$S9CsZRAzW7p5Jhu.P5nM5u7AmiNGyH7KgIqVvlMlkt5lpXYejc5Oy', NULL, 'breeder', 'active', '2024-07-17 12:45:02', '2024-07-17 12:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `variety_reports`
--

CREATE TABLE `variety_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `variety` varchar(255) NOT NULL,
  `breeder_id` varchar(255) NOT NULL,
  `grower_id` varchar(255) NOT NULL,
  `amount_of_plants` bigint(20) NOT NULL,
  `amount_of_samples` bigint(20) NOT NULL,
  `next_sample_date` date DEFAULT NULL,
  `pot_size` varchar(255) DEFAULT NULL,
  `pot_trial` tinyint(1) NOT NULL DEFAULT 0,
  `trial_location` varchar(255) DEFAULT NULL,
  `open_field_trial` tinyint(1) NOT NULL DEFAULT 0,
  `date_of_propagation` date DEFAULT NULL,
  `date_of_potting` date DEFAULT NULL,
  `cut_back` tinyint(1) NOT NULL DEFAULT 0,
  `removed_flowers` bigint(20) DEFAULT NULL,
  `caned` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variety_reports`
--

INSERT INTO `variety_reports` (`id`, `user_id`, `name`, `slug`, `thumbnail`, `variety`, `breeder_id`, `grower_id`, `amount_of_plants`, `amount_of_samples`, `next_sample_date`, `pot_size`, `pot_trial`, `trial_location`, `open_field_trial`, `date_of_propagation`, `date_of_potting`, `cut_back`, `removed_flowers`, `caned`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Variety Report 1', 'variety-report-1', 'uploads/variety_reports/1.png', 'Variety 1', '21', '16', 96, 8, '2024-08-04', '10 cm', 0, 'Location 1', 0, '2024-06-18', '2024-06-29', 1, 6, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(2, 1, 'Variety Report 2', 'variety-report-2', 'uploads/variety_reports/1.png', 'Variety 2', '20', '17', 19, 6, '2024-08-17', '16 cm', 0, 'Location 2', 0, '2024-06-04', '2024-07-11', 0, 42, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(3, 1, 'Variety Report 3', 'variety-report-3', 'uploads/variety_reports/1.png', 'Variety 3', '21', '16', 68, 3, '2024-08-04', '9 cm', 1, 'Location 3', 0, '2024-04-14', '2024-06-26', 0, 47, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(4, 1, 'Variety Report 4', 'variety-report-4', 'uploads/variety_reports/1.png', 'Variety 4', '22', '17', 79, 4, '2024-07-31', '15 cm', 0, 'Location 4', 0, '2024-05-30', '2024-06-26', 0, 40, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(5, 1, 'Variety Report 5', 'variety-report-5', 'uploads/variety_reports/1.png', 'Variety 5', '19', '15', 20, 5, '2024-07-30', '9 cm', 1, 'Location 5', 0, '2024-05-30', '2024-07-07', 1, 32, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(6, 1, 'Variety Report 6', 'variety-report-6', 'uploads/variety_reports/1.png', 'Variety 6', '23', '18', 48, 4, '2024-07-29', '18 cm', 0, 'Location 6', 1, '2024-04-15', '2024-07-08', 1, 46, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(7, 1, 'Variety Report 7', 'variety-report-7', 'uploads/variety_reports/1.png', 'Variety 7', '21', '15', 37, 8, '2024-08-12', '11 cm', 1, 'Location 7', 1, '2024-04-23', '2024-06-26', 1, 45, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(8, 1, 'Variety Report 8', 'variety-report-8', 'uploads/variety_reports/1.png', 'Variety 8', '23', '15', 42, 4, '2024-07-28', '18 cm', 0, 'Location 8', 1, '2024-05-16', '2024-07-06', 0, 15, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(9, 1, 'Variety Report 9', 'variety-report-9', 'uploads/variety_reports/1.png', 'Variety 9', '21', '16', 88, 2, '2024-08-21', '11 cm', 0, 'Location 9', 0, '2024-05-12', '2024-06-24', 1, 20, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(10, 1, 'Variety Report 10', 'variety-report-10', 'uploads/variety_reports/1.png', 'Variety 10', '23', '16', 85, 1, '2024-08-07', '16 cm', 0, 'Location 10', 1, '2024-05-24', '2024-07-07', 0, 12, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(12, 1, 'Variety Report 12', 'variety-report-12', 'uploads/variety_reports/1.png', 'Variety 12', '22', '17', 57, 8, '2024-07-31', '17 cm', 0, 'Location 12', 1, '2024-06-09', '2024-07-08', 0, 14, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(13, 1, 'Variety Report 13', 'variety-report-13', 'uploads/variety_reports/1.png', 'Variety 13', '23', '17', 99, 2, '2024-08-07', '18 cm', 1, 'Location 13', 1, '2024-05-08', '2024-06-28', 0, 38, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(14, 1, 'Variety Report 14', 'variety-report-14', 'uploads/variety_reports/1.png', 'Variety 14', '23', '14', 96, 10, '2024-08-19', '18 cm', 1, 'Location 14', 1, '2024-04-24', '2024-07-02', 0, 46, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(15, 1, 'Variety Report 15', 'variety-report-15', 'uploads/variety_reports/1.png', 'Variety 15', '23', '18', 96, 2, '2024-08-03', '10 cm', 0, 'Location 15', 0, '2024-06-11', '2024-06-29', 1, 41, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(16, 1, 'Variety Report 16', 'variety-report-16', 'uploads/variety_reports/1.png', 'Variety 16', '19', '14', 79, 5, '2024-08-15', '14 cm', 1, 'Location 16', 0, '2024-06-14', '2024-06-28', 0, 35, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(17, 1, 'Variety Report 17', 'variety-report-17', 'uploads/variety_reports/1.png', 'Variety 17', '20', '17', 47, 5, '2024-08-10', '9 cm', 1, 'Location 17', 0, '2024-05-28', '2024-06-23', 1, 3, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(18, 1, 'Variety Report 18', 'variety-report-18', 'uploads/variety_reports/1.png', 'Variety 18', '21', '14', 82, 8, '2024-08-15', '18 cm', 0, 'Location 18', 1, '2024-04-20', '2024-06-26', 1, 38, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(19, 1, 'Variety Report 19', 'variety-report-19', 'uploads/variety_reports/1.png', 'Variety 19', '19', '14', 48, 3, '2024-07-25', '11 cm', 1, 'Location 19', 0, '2024-05-12', '2024-07-02', 1, 13, 0, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(20, 1, 'Variety Report 20', 'variety-report-20', 'uploads/variety_reports/1.png', 'Variety 20', '21', '14', 41, 10, '2024-08-16', '20 cm', 1, 'Location 20', 0, '2024-06-04', '2024-06-26', 1, 22, 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `variety_samples`
--

CREATE TABLE `variety_samples` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`images`)),
  `variety_report_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `leaf_color` varchar(255) DEFAULT NULL,
  `amount_of_branches` bigint(20) DEFAULT NULL,
  `flower_buds` bigint(20) DEFAULT NULL,
  `branch_color` varchar(255) DEFAULT NULL,
  `roots` varchar(255) DEFAULT NULL,
  `flower_color` varchar(255) DEFAULT NULL,
  `flower_petals` bigint(20) DEFAULT NULL,
  `flowering_time` varchar(255) DEFAULT NULL,
  `length_of_flowering` varchar(255) DEFAULT NULL,
  `seeds` bigint(20) DEFAULT NULL,
  `seed_color` varchar(255) DEFAULT NULL,
  `amount_of_seeds` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variety_samples`
--

INSERT INTO `variety_samples` (`id`, `images`, `variety_report_id`, `date`, `leaf_color`, `amount_of_branches`, `flower_buds`, `branch_color`, `roots`, `flower_color`, `flower_petals`, `flowering_time`, `length_of_flowering`, `seeds`, `seed_color`, `amount_of_seeds`, `status`, `created_at`, `updated_at`) VALUES
(1, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 1, '2024-07-12', 'Color 5', 7, 5, 'Color 4', 'Roots 2', 'Color 2', 3, '9 days', '8 cm', 9, 'Color 1', 7, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(2, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 1, '2024-07-22', 'Color 1', 9, 6, 'Color 2', 'Roots 1', 'Color 1', 6, '1 days', '6 cm', 7, 'Color 3', 8, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(3, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 2, '2024-06-23', 'Color 1', 3, 7, 'Color 1', 'Roots 3', 'Color 5', 4, '3 days', '2 cm', 6, 'Color 5', 7, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(4, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 2, '2024-07-04', 'Color 5', 8, 2, 'Color 1', 'Roots 4', 'Color 2', 6, '7 days', '6 cm', 6, 'Color 1', 5, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(5, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 3, '2024-06-25', 'Color 1', 9, 4, 'Color 1', 'Roots 2', 'Color 5', 8, '1 days', '10 cm', 8, 'Color 3', 5, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(6, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 3, '2024-07-04', 'Color 1', 8, 10, 'Color 4', 'Roots 2', 'Color 1', 3, '2 days', '8 cm', 3, 'Color 4', 9, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(7, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 4, '2024-07-08', 'Color 1', 10, 7, 'Color 3', 'Roots 5', 'Color 4', 9, '1 days', '9 cm', 3, 'Color 3', 2, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(8, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 4, '2024-06-24', 'Color 2', 9, 4, 'Color 3', 'Roots 5', 'Color 5', 8, '2 days', '6 cm', 3, 'Color 4', 5, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(9, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 5, '2024-06-29', 'Color 2', 2, 5, 'Color 4', 'Roots 2', 'Color 3', 1, '5 days', '4 cm', 4, 'Color 5', 5, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(10, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 5, '2024-07-22', 'Color 2', 5, 7, 'Color 1', 'Roots 1', 'Color 2', 10, '5 days', '6 cm', 10, 'Color 2', 6, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(11, '[\"uploads\\/variety_samples\\/2.png\"]', 6, '2024-06-29', 'Color 2', 8, 9, 'Color 3', 'Roots 1', 'Color 4', 2, '3 days', '3 cm', 6, 'Color 1', 8, 1, '2024-07-23 09:34:16', '2024-07-23 09:35:58'),
(12, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 6, '2024-06-23', 'Color 5', 2, 3, 'Color 1', 'Roots 3', 'Color 4', 6, '6 days', '1 cm', 10, 'Color 1', 5, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(13, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 7, '2024-06-28', 'Color 2', 2, 5, 'Color 3', 'Roots 4', 'Color 5', 7, '5 days', '5 cm', 9, 'Color 4', 3, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(14, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 7, '2024-07-13', 'Color 5', 2, 4, 'Color 5', 'Roots 5', 'Color 5', 5, '8 days', '7 cm', 8, 'Color 3', 4, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(15, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 8, '2024-07-06', 'Color 4', 6, 1, 'Color 5', 'Roots 1', 'Color 5', 8, '8 days', '9 cm', 6, 'Color 4', 4, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(16, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 8, '2024-06-27', 'Color 5', 1, 6, 'Color 4', 'Roots 1', 'Color 1', 9, '6 days', '5 cm', 5, 'Color 1', 8, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(17, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 9, '2024-07-09', 'Color 2', 7, 1, 'Color 5', 'Roots 2', 'Color 4', 7, '6 days', '4 cm', 6, 'Color 1', 4, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(18, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 9, '2024-07-17', 'Color 1', 1, 4, 'Color 3', 'Roots 1', 'Color 1', 2, '5 days', '7 cm', 7, 'Color 2', 6, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(19, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 10, '2024-06-24', 'Color 1', 9, 1, 'Color 1', 'Roots 2', 'Color 5', 8, '3 days', '6 cm', 9, 'Color 3', 6, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(20, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 10, '2024-07-03', 'Color 5', 7, 7, 'Color 3', 'Roots 3', 'Color 2', 5, '3 days', '1 cm', 5, 'Color 1', 8, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(23, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 12, '2024-07-13', 'Color 2', 7, 8, 'Color 2', 'Roots 5', 'Color 4', 1, '7 days', '8 cm', 9, 'Color 4', 8, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(24, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 12, '2024-06-28', 'Color 2', 7, 8, 'Color 2', 'Roots 5', 'Color 2', 1, '6 days', '8 cm', 1, 'Color 4', 3, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(25, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 13, '2024-07-12', 'Color 2', 3, 10, 'Color 4', 'Roots 3', 'Color 1', 4, '1 days', '9 cm', 1, 'Color 2', 10, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(26, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 13, '2024-06-27', 'Color 1', 6, 3, 'Color 2', 'Roots 4', 'Color 1', 3, '5 days', '10 cm', 4, 'Color 1', 4, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(27, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 14, '2024-07-11', 'Color 4', 4, 1, 'Color 2', 'Roots 2', 'Color 1', 10, '10 days', '5 cm', 1, 'Color 1', 9, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(28, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 14, '2024-07-14', 'Color 1', 1, 3, 'Color 3', 'Roots 1', 'Color 4', 9, '2 days', '8 cm', 9, 'Color 3', 2, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(29, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 15, '2024-06-25', 'Color 1', 6, 8, 'Color 4', 'Roots 1', 'Color 3', 9, '4 days', '9 cm', 8, 'Color 3', 9, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(30, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 15, '2024-07-10', 'Color 3', 4, 4, 'Color 2', 'Roots 2', 'Color 4', 2, '1 days', '2 cm', 8, 'Color 3', 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(31, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 16, '2024-07-08', 'Color 1', 9, 8, 'Color 2', 'Roots 2', 'Color 1', 5, '10 days', '5 cm', 9, 'Color 3', 9, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(32, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 16, '2024-06-29', 'Color 1', 8, 7, 'Color 3', 'Roots 2', 'Color 4', 6, '1 days', '10 cm', 3, 'Color 4', 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(33, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 17, '2024-07-18', 'Color 3', 10, 10, 'Color 4', 'Roots 3', 'Color 5', 5, '2 days', '5 cm', 5, 'Color 4', 9, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(34, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 17, '2024-06-30', 'Color 2', 1, 7, 'Color 4', 'Roots 5', 'Color 5', 10, '9 days', '9 cm', 4, 'Color 5', 2, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(35, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 18, '2024-07-21', 'Color 3', 3, 6, 'Color 4', 'Roots 2', 'Color 2', 8, '2 days', '6 cm', 3, 'Color 2', 2, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(36, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 18, '2024-07-10', 'Color 5', 5, 8, 'Color 5', 'Roots 4', 'Color 1', 3, '4 days', '1 cm', 2, 'Color 1', 7, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(37, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 19, '2024-07-12', 'Color 3', 7, 3, 'Color 4', 'Roots 1', 'Color 5', 9, '5 days', '8 cm', 3, 'Color 4', 6, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(38, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 19, '2024-07-03', 'Color 1', 8, 9, 'Color 4', 'Roots 5', 'Color 1', 4, '9 days', '1 cm', 4, 'Color 1', 8, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(39, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 20, '2024-07-20', 'Color 5', 1, 1, 'Color 2', 'Roots 3', 'Color 3', 2, '6 days', '10 cm', 4, 'Color 3', 1, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16'),
(40, '[\"uploads\\/variety_samples\\/1.png\",\"uploads\\/variety_samples\\/2.png\"]', 20, '2024-06-26', 'Color 3', 7, 10, 'Color 3', 'Roots 2', 'Color 1', 9, '2 days', '4 cm', 7, 'Color 1', 2, 1, '2024-07-23 09:34:16', '2024-07-23 09:34:16');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `variety_reports`
--
ALTER TABLE `variety_reports`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `variety_reports_slug_unique` (`slug`),
  ADD KEY `variety_reports_user_id_foreign` (`user_id`);

--
-- Indexes for table `variety_samples`
--
ALTER TABLE `variety_samples`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variety_samples_variety_report_id_foreign` (`variety_report_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `variety_reports`
--
ALTER TABLE `variety_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `variety_samples`
--
ALTER TABLE `variety_samples`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `variety_reports`
--
ALTER TABLE `variety_reports`
  ADD CONSTRAINT `variety_reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variety_samples`
--
ALTER TABLE `variety_samples`
  ADD CONSTRAINT `variety_samples_variety_report_id_foreign` FOREIGN KEY (`variety_report_id`) REFERENCES `variety_reports` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
