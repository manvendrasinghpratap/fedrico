-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2019 at 07:07 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fedrico`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Certificazione 1', '2019-04-01 12:09:22', '2019-04-01 12:09:22'),
(3, 'Sicurezza', '2019-04-01 12:09:30', '2019-04-01 12:09:30');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `empid` bigint(225) DEFAULT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'First Name',
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'Last Name',
  `email` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactno` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `pro` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `versus` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagename` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courses` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=>active,2=>Inactive',
  `description` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `empid`, `firstname`, `lastname`, `email`, `contactno`, `country`, `state`, `city`, `startdate`, `enddate`, `pro`, `versus`, `imagename`, `courses`, `status`, `description`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, 'Alessandro', 'Bianchi', 'alessandro@gmail.com', '354365545', 'Piemonte', 'Torino', 'Valchiusa', '2019-04-17', '2019-04-19', 'Puntualità', 'Mezzi tenuti male', NULL, '[\"2\"]', 1, 'Deve migliorare il linguaggio tecnico', 'phpscLkhv.png', '2019-03-12 13:51:54', '2019-04-05 05:12:52', NULL),
(3, 22, 'Mario', 'Rossi', 'mario@gmail.com', '343434344', 'Lombardia', 'Milano', 'Pieve Emanuele', '2019-04-04', '2019-04-01', 'Buona Presenza', 'Scarsa Puntualità', NULL, '[\"3\"]', 1, 'Poca attenzione durante le riunioni', 'phpeO886B.jpg', '2019-03-15 15:44:44', '2019-04-05 05:12:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_rating_mapping`
--

CREATE TABLE `employee_rating_mapping` (
  `id` int(10) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `subskill_id` int(11) NOT NULL,
  `rating` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_rating_mapping`
--

INSERT INTO `employee_rating_mapping` (`id`, `employee_id`, `skill_id`, `subskill_id`, `rating`, `created_at`, `updated_at`, `deleted_at`) VALUES
(51, 1, 4, 15, '2', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(52, 1, 4, 16, '1.5', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(53, 1, 4, 17, '3', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(54, 1, 4, 18, '2', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(55, 1, 4, 19, '3', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(56, 1, 4, 20, '4', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(57, 1, 4, 21, '1', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(58, 1, 4, 22, '2', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(59, 1, 6, 7, '1.5', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(60, 1, 6, 8, '4.5', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(61, 1, 6, 13, '3', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(62, 1, 6, 14, '1.5', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(63, 1, 6, 23, '2', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(64, 1, 6, 24, '3', '2019-03-21 08:27:04', '2019-03-21 08:27:04', NULL),
(79, 3, 4, 15, '4.5', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(80, 3, 4, 16, '2.5', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(81, 3, 4, 17, '2', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(82, 3, 4, 18, '2', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(83, 3, 4, 19, '1', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(84, 3, 4, 20, '1', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(85, 3, 4, 21, '1.5', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(86, 3, 4, 22, '2', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(87, 3, 6, 7, '2.5', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(88, 3, 6, 8, '3', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(89, 3, 6, 13, '4', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(90, 3, 6, 14, '4', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(91, 3, 6, 23, '1.5', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL),
(92, 3, 6, 24, '2.5', '2019-03-27 14:02:09', '2019-03-27 14:02:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groupings`
--

CREATE TABLE `groupings` (
  `id` int(10) UNSIGNED NOT NULL,
  `groupname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1=>active,0=>inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groupings`
--

INSERT INTO `groupings` (`id`, `groupname`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Assurance', 1, NULL, '2019-04-05 04:56:35'),
(3, 'Creation', 1, NULL, '2019-04-01 13:18:32'),
(5, 'Val', 1, '2019-04-01 05:38:31', '2019-04-01 13:18:43'),
(6, 'Delivery', 1, '2019-04-05 04:56:42', '2019-04-05 04:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skillname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grouping_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skillname`, `grouping_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Skill Tecnico', 5, '2019-03-12 10:48:51', '2019-04-01 05:39:08', NULL),
(6, 'HR', 5, '2019-03-13 00:24:55', '2019-04-01 05:39:02', NULL),
(9, 'Delivery', 6, '2019-04-01 05:39:44', '2019-04-01 13:19:31', NULL),
(10, 'Assurance', 2, '2019-04-01 05:40:11', '2019-04-01 13:19:16', NULL),
(11, 'C Scavi', 3, '2019-04-01 11:11:41', '2019-04-01 13:19:56', NULL),
(12, 'C Posa', 3, '2019-04-01 11:54:19', '2019-04-01 13:19:50', NULL),
(13, 'C Giunzione', 3, '2019-04-01 11:54:31', '2019-04-01 13:19:46', NULL),
(14, 'C Verticali', 3, '2019-04-01 11:54:45', '2019-04-01 13:19:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subskills`
--

CREATE TABLE `subskills` (
  `id` int(10) UNSIGNED NOT NULL,
  `skill_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skill_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subskills`
--

INSERT INTO `subskills` (`id`, `skill_name`, `skill_id`, `created_at`, `updated_at`) VALUES
(7, 'Skill Tecnico', 6, '2019-03-13 00:25:37', '2019-03-21 08:23:12'),
(8, 'Formazione', 6, '2019-03-15 12:03:44', '2019-03-21 08:23:34'),
(13, 'Affiancamento', 6, '2019-03-21 08:19:40', '2019-03-21 08:23:47'),
(14, 'Feedback Continui', 6, '2019-03-21 08:19:53', '2019-03-21 08:24:01'),
(15, 'Buona Presenza', 4, '2019-03-21 08:20:24', '2019-03-21 08:20:24'),
(16, 'Rispetto Mezzi e Materiali', 4, '2019-03-21 08:20:40', '2019-03-21 08:20:40'),
(17, 'Dedizione al Lavoro', 4, '2019-03-21 08:20:49', '2019-03-21 08:20:49'),
(18, 'Capacità di Apprendimento', 4, '2019-03-21 08:21:11', '2019-03-21 08:21:11'),
(19, 'Capacità Commerciali', 4, '2019-03-21 08:21:29', '2019-03-21 08:21:29'),
(20, 'Ambizioni Lavorative', 4, '2019-03-21 08:21:40', '2019-03-21 08:21:40'),
(21, 'Gestione del Tempo', 4, '2019-03-21 08:21:49', '2019-03-21 08:21:49'),
(22, 'Problem Solving', 4, '2019-03-21 08:21:57', '2019-03-21 08:21:57'),
(23, 'Capacità di Cantierizzare', 6, '2019-03-21 08:24:17', '2019-03-21 08:24:17'),
(24, 'Linguaggio Tecnico', 6, '2019-03-21 08:24:33', '2019-03-21 08:24:33'),
(33, 'D Metroweb', 9, '2019-04-01 11:14:29', '2019-04-01 11:14:29'),
(34, 'D Open Fiber', 9, '2019-04-01 11:14:42', '2019-04-01 11:14:42'),
(35, 'D Flash Fiber FW', 9, '2019-04-01 11:15:04', '2019-04-01 11:15:04'),
(36, 'D Flash Fiber Tim', 9, '2019-04-01 11:15:32', '2019-04-01 11:15:32'),
(37, 'D GOM', 9, '2019-04-01 11:15:53', '2019-04-01 11:15:53'),
(38, 'D FTTH TIM', 9, '2019-04-01 11:16:22', '2019-04-01 11:16:22'),
(39, 'D Metroring', 9, '2019-04-01 11:17:14', '2019-04-01 11:17:14'),
(40, 'D ADSL', 9, '2019-04-01 11:17:27', '2019-04-01 11:17:27'),
(41, 'D Sky', 9, '2019-04-01 11:17:39', '2019-04-01 11:17:39'),
(42, 'D Sky Q', 9, '2019-04-01 11:17:48', '2019-04-01 11:18:11'),
(43, 'D Linkem', 9, '2019-04-01 11:18:04', '2019-04-01 11:18:15'),
(44, 'D Eolo', 9, '2019-04-01 11:18:32', '2019-04-01 11:18:32'),
(45, 'D Kena', 9, '2019-04-01 11:18:41', '2019-04-01 11:18:41'),
(46, 'A Metroweb', 10, '2019-04-01 11:19:27', '2019-04-01 11:19:27'),
(47, 'A Open Fiber', 10, '2019-04-01 11:19:40', '2019-04-01 11:19:40'),
(48, 'A Flash Fiber FW', 10, '2019-04-01 11:20:00', '2019-04-01 11:20:00'),
(49, 'A Flash Fiber TIM', 10, '2019-04-01 11:20:14', '2019-04-01 11:20:14'),
(50, 'A GOM', 10, '2019-04-01 11:20:52', '2019-04-01 11:20:52'),
(51, 'A FTTH TIM', 10, '2019-04-01 11:21:06', '2019-04-01 11:21:06'),
(52, 'A Metroring', 10, '2019-04-01 11:21:25', '2019-04-01 11:21:25'),
(53, 'A ADSL', 10, '2019-04-01 11:47:22', '2019-04-01 11:47:22'),
(54, 'A Sky', 10, '2019-04-01 11:47:33', '2019-04-01 11:47:33'),
(55, 'A Sky Q', 10, '2019-04-01 11:48:01', '2019-04-01 11:48:11'),
(56, 'A Linkem', 10, '2019-04-01 11:48:25', '2019-04-01 11:48:25'),
(57, 'A Eolo', 10, '2019-04-01 11:48:37', '2019-04-01 11:48:37'),
(58, 'A Kena', 10, '2019-04-01 11:48:50', '2019-04-01 11:48:50'),
(59, 'CS Metroweb', 11, '2019-04-01 11:49:53', '2019-04-01 11:49:53'),
(60, 'CS Open Fiber', 11, '2019-04-01 11:50:05', '2019-04-01 11:50:05'),
(61, 'CS Flash Fiber FW', 11, '2019-04-01 11:50:32', '2019-04-01 11:50:32'),
(62, 'CS Flash Fiber TIM', 11, '2019-04-01 11:51:03', '2019-04-01 11:51:03'),
(63, 'CS GOM', 11, '2019-04-01 11:51:29', '2019-04-01 11:51:29'),
(64, 'CS FTTH TIM', 11, '2019-04-01 11:53:09', '2019-04-01 11:53:09'),
(65, 'CS Metroring', 11, '2019-04-01 11:53:43', '2019-04-01 11:53:43'),
(66, 'CP Metroweb', 12, '2019-04-01 11:55:43', '2019-04-01 11:55:43'),
(67, 'CP Open Fiber', 12, '2019-04-01 11:56:13', '2019-04-01 11:56:13'),
(68, 'CP Flash Fiber FW', 12, '2019-04-01 11:56:36', '2019-04-01 11:56:36'),
(69, 'CP Flash Fiber TIM', 12, '2019-04-01 12:00:59', '2019-04-01 12:01:06'),
(70, 'CP GOM', 12, '2019-04-01 12:01:27', '2019-04-01 12:01:27'),
(71, 'CP FTTH TIM', 12, '2019-04-01 12:01:54', '2019-04-01 12:01:54'),
(72, 'CP Metroring', 12, '2019-04-01 12:02:14', '2019-04-01 12:02:14'),
(73, 'CG Metroweb', 13, '2019-04-01 12:02:37', '2019-04-01 12:02:37'),
(74, 'CG Open Fiber', 13, '2019-04-01 12:03:12', '2019-04-01 12:03:12'),
(75, 'CG Flash Fiber FW', 13, '2019-04-01 12:03:35', '2019-04-01 12:03:35'),
(76, 'CG Flash Fiber TIM', 13, '2019-04-01 12:04:07', '2019-04-01 12:04:07'),
(77, 'CG GOM', 13, '2019-04-01 12:04:20', '2019-04-01 12:04:20'),
(78, 'C FTTH TIM', 13, '2019-04-01 12:04:45', '2019-04-01 12:04:45'),
(79, 'CG Metroring', 13, '2019-04-01 12:05:12', '2019-04-01 12:05:12'),
(80, 'CV Metroweb', 14, '2019-04-01 12:05:33', '2019-04-01 12:05:33'),
(81, 'CV Open Fiber', 14, '2019-04-01 12:05:47', '2019-04-01 12:05:47'),
(82, 'CV Flash Fiber FW', 14, '2019-04-01 12:06:34', '2019-04-01 12:06:34'),
(83, 'CV Flash Fiber TIM', 14, '2019-04-01 12:06:58', '2019-04-01 12:06:58'),
(84, 'CV GOM', 14, '2019-04-01 12:07:29', '2019-04-01 12:07:29'),
(85, 'CV FTTH TIM', 14, '2019-04-01 12:08:35', '2019-04-01 12:08:35'),
(86, 'CV Metroring', 14, '2019-04-01 12:08:52', '2019-04-01 12:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `remember_token`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin@admin.com', '$2y$10$vnLZPCilmVR77R40ta0SluW15trAyvkGrlP6I7qEGhERHeqPvYGem', 'default.jpg', 'EcfnaRthGN7d4x2Btox4DyEVjsUhUhAJJnskMaxHuxgPbp8s8AzqWLykQ2Wa', '0', NULL, NULL, NULL),
(2, 'adminone@admin.com', 'adminone@admin.com', '$2y$10$vnLZPCilmVR77R40ta0SluW15trAyvkGrlP6I7qEGhERHeqPvYGem', 'default.jpg', 'EcfnaRthGN7d4x2Btox4DyEVjsUhUhAJJnskMaxHuxgPbp8s8AzqWLykQ2Wa', '0', NULL, NULL, NULL),
(3, 'admintwo@admin.com', 'admintwo@admin.com', '$2y$10$vnLZPCilmVR77R40ta0SluW15trAyvkGrlP6I7qEGhERHeqPvYGem', 'default.jpg', 'PSzV0uIzzgUbPBJP0hr7Nt3Hr64BwaQ1izOpCRB3I8VD0UqXKIfLmq3VE5pt', '0', NULL, NULL, NULL),
(4, 'g.damiani@consorzioprogresso.it', 'g.damiani@consorzioprogresso.it', '$2y$10$rtN/.RMFHT1dRjrVNSiDt.iNwsILW4INEnR/R3CHPKh8gYwB0Jy6e', 'default.jpg', 'bXRkNpttlERc8S8BVGZUt2rC7Mw5cQwOm41EumKB4fBUoBcfGr0au38wh0jb', '0', '2019-03-21 10:17:00', '2019-03-21 10:17:00', '2019-03-21 10:17:00'),
(5, 'tecnici@cabliamolitalia.it', 'tecnici@cabliamolitalia.it', '$2y$10$2CiSTmSSE6NXO2./d4iaWOpShH7R.Awjn3r2yBjU26ityjZiKcSXK', 'default.jpg', 'Uzpkw6x78TDWkBzKOkW2mvEQBK9cBYnFDL4dsF02Jf1RdhNR11OCPfYcNr79', '0', '2019-03-21 10:17:00', '2019-03-21 10:17:00', '2019-03-21 10:17:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_rating_mapping`
--
ALTER TABLE `employee_rating_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupings`
--
ALTER TABLE `groupings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_grouping_id_foreign` (`grouping_id`);

--
-- Indexes for table `subskills`
--
ALTER TABLE `subskills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subskills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_rating_mapping`
--
ALTER TABLE `employee_rating_mapping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `groupings`
--
ALTER TABLE `groupings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subskills`
--
ALTER TABLE `subskills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_grouping_id_foreign` FOREIGN KEY (`grouping_id`) REFERENCES `groupings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subskills`
--
ALTER TABLE `subskills`
  ADD CONSTRAINT `subskills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
