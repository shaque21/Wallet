-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 11:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet-practise`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` bigint(20) UNSIGNED NOT NULL,
  `expense_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expcate_id` int(11) NOT NULL,
  `expense_amount` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_creator` int(11) NOT NULL,
  `expense_slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_title`, `expcate_id`, `expense_amount`, `expense_date`, `expense_creator`, `expense_slug`, `expense_status`, `created_at`, `updated_at`) VALUES
(1, 'Cox\'s Bazar', 1, '5000', '2021-04-02', 1, 'E607f09d7aaa58', 1, '2021-04-20 17:05:27', '2021-04-20 17:36:27'),
(2, 'Eid Shopping', 2, '20000', '2021-04-19', 1, 'E607f0c63c4d70', 1, '2021-04-20 17:16:19', '2021-04-20 17:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `expcate_id` bigint(20) UNSIGNED NOT NULL,
  `expcate_name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expcate_remarks` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expcate_slug` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expcate_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`expcate_id`, `expcate_name`, `expcate_remarks`, `expcate_slug`, `expcate_status`, `created_at`, `updated_at`) VALUES
(1, 'Tour', '----', 'tour', 1, '2021-03-31 11:42:34', NULL),
(2, 'Shopping', '---', 'shopping', 1, '2021-04-20 16:47:45', NULL);

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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `income_id` bigint(20) UNSIGNED NOT NULL,
  `income_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incate_id` int(11) NOT NULL,
  `income_amount` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_creator` int(11) NOT NULL,
  `income_slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `income_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`income_id`, `income_title`, `incate_id`, `income_amount`, `income_date`, `income_creator`, `income_slug`, `income_status`, `created_at`, `updated_at`) VALUES
(2, 'Eid Shoppingdfds', 1, '200000', '2021-04-13', 1, 'I6074367a77866', 1, '2021-04-12 12:00:58', '2021-04-20 17:24:11'),
(3, 'Income Test purpose', 5, '800000', '2021-04-20', 1, 'I607ead0424bb0', 1, '2021-04-20 10:29:24', NULL),
(4, 'Salary For April', 4, '10000', '2021-04-10', 1, 'I607eddf42cceb', 1, '2021-04-20 13:58:12', '2021-04-20 15:59:40'),
(5, 'Event Management', 1, '2000', '2021-04-12', 1, 'I607efaab93443', 1, '2021-04-20 16:00:43', '2021-04-20 16:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `income_categories`
--

CREATE TABLE `income_categories` (
  `incate_id` bigint(20) UNSIGNED NOT NULL,
  `incate_name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incate_remarks` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incate_slug` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incate_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `income_categories`
--

INSERT INTO `income_categories` (`incate_id`, `incate_name`, `incate_remarks`, `incate_slug`, `incate_status`, `created_at`, `updated_at`) VALUES
(1, 'Freelancing', 'International Marketplace', 'freelancing', 1, '2021-03-15 10:35:22', '2021-03-29 10:55:07'),
(2, 'Job in Creative Shaper', 'Monthly Salary Based', 'job-in-creative-shaper', 1, '2021-03-15 10:36:06', '2021-03-15 11:15:31'),
(3, 'Consultancy', 'Freelancing Consultancy for CS Company', 'consultancy', 0, '2021-03-15 10:39:49', '2021-03-29 10:52:22'),
(4, 'Tuition', 'Tuition After Job', 'tuition', 1, '2021-03-15 10:41:06', '2021-03-15 11:15:28'),
(5, 'Home Support', 'Family Support for My Life', 'home-support', 1, '2021-03-15 10:42:49', '2021-03-15 11:15:35'),
(7, 'Digital Marketing Income', 'Digital Marketing Income for My skill', 'digital-marketing-income', 0, '2021-03-15 10:54:09', '2021-03-31 11:25:28');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_08_111145_create_user_roles_table', 2),
(5, '2021_03_10_102611_create_income_categories_table', 3),
(6, '2021_03_22_164451_create_expense_categories_table', 4),
(7, '2021_04_12_164758_create_incomes_table', 5),
(8, '2021_04_12_165256_create_expenses_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 5,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `role`, `photo`, `remember_token`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Creative Shaper', '01654491921', 'creative@gmail.com', NULL, '$2y$10$YOOVV47doA1wEt2G4afoOuHWMd4n.h4ok6Tij7kmisF0.TqiSzGmS', 1, 'creative-shaper(1)1618950489.jpg', NULL, 'creative-shaper', 1, '2021-03-01 05:40:55', '2021-04-20 20:28:09'),
(2, 'Sakil Khan', NULL, 'shakil.shahan02@gmail.com', NULL, '$2y$10$hsxAz.rXUX4WxWWxu87xT.Z8vLIGSWXlFVshaB8RqfWIY0rztVROS', 5, NULL, NULL, NULL, 0, '2021-03-08 04:50:52', '2021-04-20 19:04:23'),
(4, 'Saidul Islam Uzzal', '01654491921', 'uzzalbd.creative@gmail.com', NULL, '$2y$10$L1Hyg2vp91z0ld/wtOtuP.cA7/q9VxHf0xgMHxzxcA8Ip4sZb3CdW', 2, NULL, NULL, 'U206061b8e88deba', 1, '2021-03-29 11:24:24', NULL),
(5, 'Ishan Khan', '01735678912', 'ishan@gmail.com', NULL, '$2y$10$mlY3gMLllFL4nWJ7W/Ep2ub8CY848je6TZ0N2E7nfAzN8xjIA34xi', 2, NULL, NULL, 'U20606450b9f131e', 0, '2021-03-31 10:36:42', '2021-04-20 19:14:36'),
(6, 'Mr, John', '01312312321', 'john@gmail.com', NULL, '$2y$10$B0ezaqpm.U/TmULLLF8OpuAx.MVLyWBIcKvYs7H4V5uYjyy/hjSAG', 3, 'user_6_1617187156.png', NULL, 'U2060645153d8540', 1, '2021-03-31 10:39:15', '2021-03-31 10:39:16'),
(8, 'Samsul Haque', '+8801723-625189', 'samsul@gmail.com', NULL, '$2y$10$vX4tifRbR7tV/zcSKG2lC.9t5tqdFBXBQxi5bmD.vv.tnGVAJ5xi6', 1, 'user_8_1618950666.png', NULL, 'samsul-haque', 1, '2021-04-20 20:31:06', '2021-04-20 20:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`role_id`, `role_name`, `role_status`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 1, '2021-03-22 10:47:06', NULL),
(2, 'Admin', 1, '2021-03-22 10:47:07', NULL),
(3, 'Author', 1, '2021-03-22 10:47:20', NULL),
(4, 'Editor', 1, '2021-03-22 10:47:21', NULL),
(5, 'Subscriber', 1, '2021-03-22 10:48:51', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`expcate_id`),
  ADD UNIQUE KEY `expense_categories_expcate_name_unique` (`expcate_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `income_categories`
--
ALTER TABLE `income_categories`
  ADD PRIMARY KEY (`incate_id`),
  ADD UNIQUE KEY `income_categories_incate_name_unique` (`incate_name`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `user_roles_role_name_unique` (`role_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `expcate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `income_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `income_categories`
--
ALTER TABLE `income_categories`
  MODIFY `incate_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
