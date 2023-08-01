-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 10:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_date` date NOT NULL,
  `in_time` time NOT NULL,
  `out_time` time NOT NULL,
  `status` int(11) NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `attendance_date`, `in_time`, `out_time`, `status`, `ip_address`, `mac_address`, `created_at`, `updated_at`, `remark`) VALUES
(1, 3, '2023-08-01', '06:50:43', '00:00:00', 1, '::1', '0', '2023-08-01 00:50:43', '2023-08-01 02:58:18', 'punctual'),
(2, 3, '2023-08-01', '00:00:00', '06:50:57', 2, '::1', '0', '2023-08-01 00:50:57', '2023-08-01 02:58:26', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` decimal(8,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `salary`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '30000.000', '2023-08-01 00:22:49', '2023-08-01 00:22:49'),
(2, 'Assistant', '17000.000', '2023-08-01 00:23:28', '2023-08-01 00:23:28'),
(3, 'Junior software Developer', '25000.000', '2023-08-01 00:23:53', '2023-08-01 00:23:53'),
(4, 'Senior Developer', '45000.000', '2023-08-01 00:24:12', '2023-08-01 00:24:12'),
(5, 'Frontend developer', '24000.000', '2023-08-01 00:24:29', '2023-08-01 00:24:29'),
(6, 'HR', '24000.000', '2023-08-01 00:24:50', '2023-08-01 00:24:50'),
(7, 'it', '25000.000', '2023-08-01 00:25:14', '2023-08-01 00:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_21_042932_create_sessions_table', 1),
(7, '2023_05_23_050114_create_user_details', 1),
(8, '2023_05_23_050337_add_user_type_column_to_users_table', 1),
(9, '2023_05_28_054357_create_user_types_table', 1),
(10, '2023_05_28_105243_create_designations_table', 1),
(11, '2023_05_29_091807_create_projects_table', 1),
(12, '2023_05_30_060837_create_project_users_table', 1),
(13, '2023_06_03_114247_create_project_assigneds_table', 1),
(14, '2023_06_07_043703_user_id_in_table', 1),
(15, '2023_06_14_090716_create_attendances_table', 1),
(16, '2023_06_19_101314_add_remark_to_attendances_table', 1),
(17, '2023_06_21_053414_modify_attendances_nullable_remark', 1);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `manager`, `created_at`, `updated_at`) VALUES
(1, 'Ecommerce', 1, '2023-08-01 00:36:08', '2023-08-01 00:36:08'),
(2, 'Furniture', 5, '2023-08-01 00:49:01', '2023-08-01 00:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `project_assigneds`
--

CREATE TABLE `project_assigneds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_assigneds`
--

INSERT INTO `project_assigneds` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '2023-08-01 00:36:08', '2023-08-01 00:36:08'),
(2, 1, '4', '2023-08-01 00:36:08', '2023-08-01 00:36:08'),
(3, 1, '6', '2023-08-01 00:36:08', '2023-08-01 00:36:08'),
(4, 2, '2', '2023-08-01 00:49:01', '2023-08-01 00:49:01'),
(5, 2, '8', '2023-08-01 00:49:01', '2023-08-01 00:49:01'),
(6, 2, '9', '2023-08-01 00:49:01', '2023-08-01 00:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `project_users`
--

CREATE TABLE `project_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4MBL8uMK4mwbubAc1uDTDzhAOwntSJXBjTK0ltFm', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWVdCbXZ5MTJ2SmpTNGN1V3QxOGE4ZlRpMkhQYmV6ZGJUQVhDUWNVRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTk6Imh0dHA6Ly9sb2NhbGhvc3Qvb2ZmaWNlLW1hbmFnZW1lbnQvcHVibGljL3Nob3dfYXR0ZW5kYW5jZS8zIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRMelc1TnhtMk02VnM2Zm5DRDZCd1EuQnlpWVF3akUueUdRbEhvbmlpREpXZS80WEtmbndNYSI7fQ==', 1690880306);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `user_type`) VALUES
(1, 'Tanvir', 'tanvir@gmail.com', NULL, '$2y$10$LzW5Nxm2M6Vs6fnCD6BwQ.ByiYQwjE.yGQlHoniiDJWe/4XKfnwMa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:16:02', '2023-08-01 00:16:02', 1),
(2, 'asif', 'asif@gmail.com', NULL, '$2y$10$JXjid4lIA8DymNCGYX89AeUzjLmZrlNdPjkZwnl51dySzDB7JmZ3S', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:27:50', '2023-08-01 00:27:50', 1),
(3, 'bd', 'bd@gmail.com', NULL, '$2y$10$4tiDJYOcH4gdP99Y8b3O1OIYZaKC2nw87pgz0Wib2G1MGCrzH6ihu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:30:45', '2023-08-01 00:30:45', 4),
(4, 'asd', 'asd@gmail.com', NULL, '$2y$10$kPx9IkTJ2C0hHukiIMXNKelpEqrrtzib9qvZRm2O7kEbw8t9AviHW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:33:27', '2023-08-01 00:33:27', 1),
(5, 'tarek', 'tarek@gmail.com', NULL, '$2y$10$d1K9Z9soD6UfLZ6S3Hluie.9bmlgoEo4ACIu2CNco3.0sJv9N5/xG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:34:34', '2023-08-01 00:34:34', 3),
(6, 'abc', 'abc@gmail.com', NULL, '$2y$10$Dn13McO73Lji1qx5dVHpYeLiWJg7S7dbwVZLb8zp7aNFYoFnw5THq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:35:33', '2023-08-01 00:35:33', 7),
(7, 'asdfsg', 'as@gmail.com', NULL, '$2y$10$bZ.nsZJwpuQQi4nJDAblF.LNxjwjgsI4UvKF21ZEDi.6gyJOdMnOC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:39:16', '2023-08-01 00:39:16', 5),
(8, 'ROFIK', 'rofik@gmail.com', NULL, '$2y$10$8XwJNZyxyvSBoWEQlLqvfuLS/5t5xveLrJAa.MzLIvlisKBarDrLK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:40:23', '2023-08-01 00:40:23', 7),
(9, 'zxc', 'zxc@gmail.com', NULL, '$2y$10$8Ic8wqqpEMz0IuEIu6enRuGBHX.UFdwJ51U1yClA2DuZRO5h/zzTK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:41:17', '2023-08-01 00:41:17', 4),
(10, 'mn', 'mn@gmail.com', NULL, '$2y$10$mfPLubQ/EpmIBVtyhcPpreDNzoOvgHeSOa39N1xjKcwWu8jGdnMd.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:42:47', '2023-08-01 00:42:47', 5),
(11, 'qwe', 'qwe@gmail.com', NULL, '$2y$10$WyCkOsfiYip8BaPqC9KIn.w9Q7qiCODgWVn/7..d/9b/vAJ23P04O', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:44:04', '2023-08-01 00:44:04', 8),
(12, 'sad', 'sad@gmail.com', NULL, '$2y$10$STTUuM25slg4y4NXwYxMae217Znwbb5aV6LxW63h530FAyUUOem9K', NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-01 00:48:09', '2023-08-01 00:48:09', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `joined_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `mobile`, `designation`, `user_id`, `joined_date`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, '0185343564', 3, 2, '2021-09-01', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'user-image/8.jpg', '2023-08-01 00:27:50', '2023-08-01 00:27:50'),
(2, '0185343564', 5, 3, '2022-03-30', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/4.jpg', '2023-08-01 00:30:45', '2023-08-01 00:30:45'),
(3, '0185343564', 4, 4, '2022-09-06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/s.jpg', '2023-08-01 00:33:27', '2023-08-01 00:33:27'),
(4, '0185343564', 6, 5, '2023-05-02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/e2.jpeg', '2023-08-01 00:34:34', '2023-08-01 00:34:34'),
(5, '0185343564', 2, 6, '2020-01-01', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/e2.jpeg', '2023-08-01 00:35:33', '2023-08-01 00:35:33'),
(6, '0185343564', 7, 7, '2021-06-02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/e1.jpeg', '2023-08-01 00:39:16', '2023-08-01 00:39:16'),
(7, '0185343564', 2, 8, '2021-02-02', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/12\'.jpg', '2023-08-01 00:40:23', '2023-08-01 00:40:23'),
(8, '0185343564', 5, 9, '2023-06-13', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/6.jpg', '2023-08-01 00:41:17', '2023-08-01 00:41:17'),
(9, '0185343564', 7, 10, '2023-06-25', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/2.jpg', '2023-08-01 00:42:47', '2023-08-01 00:42:47'),
(10, '0185343564', 7, 11, '2023-06-18', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/5.jpg', '2023-08-01 00:44:04', '2023-08-01 00:44:04'),
(11, '0185343564', 2, 12, '2023-06-25', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially', 'user-image/e2.jpeg', '2023-08-01 00:48:09', '2023-08-01 00:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Software Devloper', '2023-08-01 00:18:05', '2023-08-01 00:18:05'),
(2, 'Designer', '2023-08-01 00:18:17', '2023-08-01 00:18:17'),
(3, 'Graphics Designer', '2023-08-01 00:21:10', '2023-08-01 00:21:10'),
(4, 'React Designer', '2023-08-01 00:21:25', '2023-08-01 00:21:25'),
(5, 'cyber sequrity', '2023-08-01 00:22:12', '2023-08-01 00:22:12'),
(6, 'admin', '2023-08-01 00:26:22', '2023-08-01 00:26:22'),
(7, 'assistant', '2023-08-01 00:26:32', '2023-08-01 00:26:32'),
(8, 'it service', '2023-08-01 00:26:46', '2023-08-01 00:26:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_assigneds`
--
ALTER TABLE `project_assigneds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_users`
--
ALTER TABLE `project_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_assigneds`
--
ALTER TABLE `project_assigneds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_users`
--
ALTER TABLE `project_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
