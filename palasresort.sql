-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 04:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `palasresort`
--

-- --------------------------------------------------------

--
-- Table structure for table `entrances`
--

CREATE TABLE `entrances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `time_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_out` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'To update if customer want''s to extends.',
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Remaining balance if they extends.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_rate` double NOT NULL,
  `night_rate` double NOT NULL,
  `overnigth_rate` double NOT NULL,
  `facility_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `description`, `image`, `day_rate`, `night_rate`, `overnigth_rate`, `facility_type`, `status`) VALUES
(46, 'Shipwrecked Cabin 1', '2 to 4 pax', 'CABIN 1.jpg', 2000, 2500, 0, 'rooms', ''),
(47, 'Shipwrecked Cabin 2', '6 to 8 pax', 'CAVIN 2.jpg', 3000, 3500, 0, 'rooms', ''),
(48, 'Grove Dormitory', '10 to 12 pax', 'GROVE DORMITORY.jpg', 4500, 5500, 0, 'rooms', ''),
(49, 'Grove Top', '2', 'GROVE TOP.jpg', 3000, 3500, 0, 'rooms', ''),
(50, 'Sunrise Pavillion', '6 to 8 pax', 'SUNRISE PAVILLION.jpg', 2000, 2500, 0, 'rooms', ''),
(51, 'Twin Room', '2 to 4 pax', 'TWIN COTTAGE.jpg', 2000, 2500, 0, 'rooms', ''),
(52, 'Big Nipa Cottage', '10 to 15 pax', 'BIG NIPA COTTAGE.jpg', 600, 800, 0, 'cottage', ''),
(53, 'Lagoon Cottage', '3 to 5 pax', 'LAGOON COTTAGE.jpg', 1000, 1500, 0, 'cottage', ''),
(54, 'Log Cabin', '6 to 8 pax', 'LOG CABIN.jpg', 3000, 3500, 0, 'cottage', ''),
(55, 'Nipa Cottage`', '6 to 10 pax', 'NIPA COTTAGE.jpg', 400, 600, 0, 'cottage', ''),
(56, 'Nipa with Room', '3 to 5 pax', 'NIPA WITH ROOM.jpg', 1000, 1500, 0, 'cottage', ''),
(57, 'Rest House', '8 to 10 pax', 'REST HOUSE.jpg', 1500, 2000, 0, 'cottage', ''),
(58, 'Classic Pavillion', '60 to 125 pax', 'classic pavillion.jpg', 9000, 10000, 0, 'function_pavillion', ''),
(59, 'Flower Bloom ', '50 to 100 pax', 'flower bloom.jpg', 9000, 10000, 0, 'function_pavillion', ''),
(60, 'Swimming Pool', '0', 'pic4.jpg', 140, 175, 200, 'pool', ''),
(61, 'Swimming Pool', '0', 'q6.jpg', 140, 175, 0, 'pool', ''),
(62, 'Swimming Pool', '0', 'q2.jpg', 140, 175, 200, 'pool', ''),
(63, 'Airsoft', '7 Bullets', 'airsoft.jpg', 100, 0, 0, 'sports_center', ''),
(64, 'Archery', '10 Arrows', 'archery.jpg', 100, 0, 0, 'sports_center', ''),
(65, 'ATV', '1 Hour', 'atv.jpg', 350, 0, 0, 'sports_center', ''),
(66, 'Billiards', '1 Hour', 'billiards.jpg', 80, 0, 0, 'sports_center', ''),
(67, 'Darts', '1 Hour', 'darts.jpg', 50, 0, 0, 'sports_center', ''),
(68, '13 - Cable Games', '1 Person', 'cable games.jpg', 80, 0, 0, 'adrenaline_game', ''),
(69, 'Obstacle Course', '1 Person', 'obstacle course.jpg', 30, 0, 0, 'adrenaline_game', ''),
(70, 'Garden Maze', '1 Person', 'gardenmaze.jpg', 30, 0, 0, 'adrenaline_game', ''),
(71, 'Wall Climbing And Rappelling', '1 Person', 'wall climbing.jpg', 100, 0, 0, 'adrenaline_game', ''),
(72, '2- Way Zipline', '1 Person', 'zipline.jpg', 100, 0, 0, 'adrenaline_game', '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, '2013_10_19_072756_create_permissions_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2022_10_19_073212_create_facilities_table', 1),
(6, '2022_10_19_073433_create_services_table', 1),
(7, '2022_10_19_073512_create_reservations_table', 1),
(8, '2022_10_19_073923_create_sales_table', 1),
(9, '2022_10_19_074122_create_entrances_table', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permissions_id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissions_id`, `permission_name`) VALUES
(1, 'Administrator'),
(2, 'Customer'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `res_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `facility_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_adult_quantity` int(11) NOT NULL,
  `person_kids_quantity` int(11) NOT NULL,
  `total_balance` double NOT NULL,
  `reservation_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`) VALUES
(3, 'Walk-in'),
(4, 'Thru-Call'),
(5, 'Online Booking');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `permission_id`, `fname`, `mname`, `lname`, `address`, `contact_num`, `email`, `verification_code`, `email_verified_at`, `username`, `password`, `profile`) VALUES
(59, 1, 'Jomari', 'banayos', 'Mallare', 'sampaguita', '0987675432', 'jomarimallare2020@gmail.com', '166140', '2022-11-27 09:21:13', 'superadmin', 'password', 'profile.jpg'),
(60, 2, 'Jolo', 'Banayo', 'Mallare', 'sampedro', '0987675432', 'jomarimallare000@gmail.com', '233776', '2022-11-30 05:05:03', 'jolo', 'password', 'profile.jpg'),
(61, 2, 'Gherome', 'B', 'Biglang-Awas', 'samapaguitas', '09878765443', 'innovatechdeveloper0013@gmail.com', '171738', '2022-11-30 09:32:47', 'ghe', 'password', 'WIN_20220514_11_12_17_Pro.jpg'),
(62, 2, 'KEVIN ', 'FELIX', 'CALUAG', 'BAGO GENERAL TINIO NE', '09261364720', 'customer1@gmail.com', '171738', '2022-11-30 09:32:47', 'BOSSKEVZ', 'password', '242260692_138514495162774_5629228213219838715_n.jpg'),
(63, 2, 'Joana', 'Banayo', 'Mallare', 'samapaguita', '09878765443', 'joanamarimallare01@gmail.com', '118188', NULL, 'joana', 'password', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entrances`
--
ALTER TABLE `entrances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrances_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissions_id`),
  ADD UNIQUE KEY `permissions_permission_name_unique` (`permission_name`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `reservations_service_id_foreign` (`service_id`),
  ADD KEY `reservations_facility_id_foreign` (`facility_id`),
  ADD KEY `reservations_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_user_id_foreign` (`user_id`),
  ADD KEY `sales_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_permission_id_foreign` (`permission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entrances`
--
ALTER TABLE `entrances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissions_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `res_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entrances`
--
ALTER TABLE `entrances`
  ADD CONSTRAINT `entrance_reservation_id` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`res_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_permissions_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permissions_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
