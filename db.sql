-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 01:10 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role_id` int(5) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role_id`, `phone`, `updated_at`) VALUES
(4, 'fade sarakpe2', 'admin@admin.com', '$2y$10$tPscEM1wovXQfMgZmnn7XeCac.sxjvyckkp8IRrLmGWNe41FxFgPO', 1, '0994749533', '2022-06-04 17:28:27'),
(5, 'beta', 'beta@gmail.com', '$2y$10$r9hr4CgIjhW8cx4Z0eGgVe95b0in.Kq0T6lA63NNqnxQxOCRioi4.', 2, '0958479699', '2022-06-03 13:03:06'),
(10, 'فادي', 'fadesarakpe12345@gmail.com', '$2y$10$Ca3S95dIA7n69oNA4t9PG.of97Qa1kIswKMGUCnp/Qz4DfMlRFUEy', 2, '0958479699', '2022-06-04 23:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role_id` int(5) NOT NULL,
  `address` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `price_period` decimal(10,0) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Latitude` varchar(100) NOT NULL,
  `Longtude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `name`, `email`, `password`, `role_id`, `address`, `photo`, `phone`, `price_period`, `status`, `sdate`, `edate`, `updated_at`, `Latitude`, `Longtude`) VALUES
(25, 'fade4', 'tcc.fade.test@gmail.com', '$2y$10$RqrLnb4QJGRC4Af1DPzu6.FLPKssTAaav4WEyxJ6mA1ZTlRQUX1mK', 3, 'المزة', '1653408038.jpg', '0947586958', '80000', 0, '2022-06-05', '2022-09-05', '2022-06-05 06:15:48', '', ''),
(28, 'fader5', 'fawd@gmai.com', '$2y$10$pqQv40CxeC/SWVg.4B7Ov.5IDMxr5KnSplkOrp9utX2Ogk6GGmSRe', 3, 'المزة', 'Author.png', '0947586958', '10000', 1, '2021-01-21', '2022-03-24', '2022-06-02 04:14:53', '', ''),
(29, 'المتفوقين', 'ahmadkokeko@gmail.com', '$2y$10$22e5GEFo1H7zun0WjV/mkOvMpY98PXacSRmHspKVKCPvIqjtf3HSi', 3, 'المزة', 'Author.png', '0947586958', '34000', 0, '2022-05-31', '2022-08-31', '2022-05-31 10:56:51', '', ''),
(30, 'المتفوقين', 'fadesarakpe9947@gmail.com', '$2y$10$kCt3wy91KSzTZzvE1PCYbewWqPEUlghHK17h4Ul3SB.ZuX/eJssKa', 3, 'المزة', 'Author.png', '0947586958', '43354', 0, '2022-05-31', '2022-08-31', '2022-06-05 05:47:29', '', ''),
(32, 'المتفوقين', 'fdsdawd@gmai.com', '$2y$10$BPKV8EaFgHbhSvDeu431w.AFYX7wMI1W3Nc6szEFh7OeAirXaJqES', 3, 'المزة', 'Author.png', '0947586958', '30000', 0, '2022-06-01', '2022-07-01', '2022-06-01 22:23:02', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_offer`
--

CREATE TABLE `course_offer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `count` int(5) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `price` int(5) NOT NULL,
  `center_id` int(5) NOT NULL,
  `trainer_id` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_offer`
--

INSERT INTO `course_offer` (`id`, `name`, `details`, `count`, `sdate`, `edate`, `price`, `center_id`, `trainer_id`, `created_at`, `updated_at`, `Status`) VALUES
(20, 'برمجة متقدمة', 'OOP', 50, '2022-06-16', '2022-06-24', 50000, 25, 20, '2022-06-08 12:07:40', '2022-06-08 12:07:40', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_order`
--

CREATE TABLE `course_order` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `center_id` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_order`
--

INSERT INTO `course_order` (`id`, `name`, `details`, `center_id`, `created_at`, `updated_at`) VALUES
(10, 'asp', 'dasic', 30, '2022-06-01 17:42:09', '2022-06-01 17:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ahmadkokeko@gmail.com', '1TpvhLZB365EDSWd1f8Xb9KoUqQTZ6MPG2d12oj6YxQAuF46e5waDU918R94mrgy', '2022-05-31 07:58:34'),
('fadesarakpe12345@gmail.com', 'OR3yXRTcWXE6ZQOJVqkRUagdxs3XrvveYMR9V11GnX42zqcML4bkmY06i1bp5St8', '2022-06-04 20:47:50'),
('fadesarakpe12345@gmail.com', 'U2mlXZ21W6u9jDQxxMz8ba2vU9tdwDyxLH5EZCmv5K7kbSVPppmteffEOdJMNUXj', '2022-06-05 04:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`) VALUES
(2, 'اضافة مركز'),
(1, 'اضافة مشرف');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'مدير نظام'),
(2, 'مشرف'),
(3, 'مركز');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `course_id` int(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `address`, `date_of_birth`, `phone`, `gender`, `email`, `password`, `course_id`, `created_at`, `updated_at`, `user_id`) VALUES
(33, 'd', 'fdsf', 'fdsfd', '2022-06-24', '0994749588', 'ذكر', 'beta2@gmail.com', 'fadefade', 20, '2022-06-08 12:13:15', '2022-06-08 12:13:15', 3),
(34, 'lolo', 'lolo', 'aleppo', '2022-06-08', '0994749588', 'f', 'dsadas@gmaial.com', 'sadsadasd', 20, '2022-06-08 19:42:21', '2022-06-08 19:42:21', 1),
(36, 'lkkl', ';lk', ';lklk', '2222-02-22', '35434', 'ذكر', 'Alkooo@kk', ';ljkl', 20, '2022-06-08 19:45:51', '2022-06-08 19:45:51', 6),
(37, 'ewdew', 'dsf', 'wew', '2222-02-22', 'wqwq', 'ذكر', 'tcc.fade.test@gmail.com', 'fadefade', 20, '2022-06-08 19:45:56', '2022-06-08 19:45:56', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(2) NOT NULL,
  `name` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `name`, `price`, `updated_at`) VALUES
(1, 'شهر', 30000, '2022-06-04 17:27:31'),
(2, 'ثلاث اشهر', 80000, '2022-06-04 17:27:39'),
(3, 'ستة اشهر', 160000, '2022-06-03 21:07:20'),
(4, 'سنة', 300000, '2022-06-04 00:01:22');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(5) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `center_id` int(5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `address`, `phone`, `center_id`, `created_at`, `updated_at`, `User_Id`) VALUES
(20, 'kok', 'koke', '2022-06-14', 'ذكر', 'alkoook', '0994749588', 25, '2022-06-08 12:00:30', '2022-06-08 12:00:30', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `date_of_birth`, `phone`, `address`, `gender`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'lolo', 'lolo', '2022-06-08', '0994749588', 'aleppo', 'f', 'dsadas@gmaial.com', 'sadsadasd', NULL, NULL),
(2, 'sara', 'sy', '2022-06-14', '0978544332', 'aleppo', 'f', 'sadsa@gmail.com', 'dadsadas', NULL, NULL),
(3, 'محمد', 'بيتا', '2000-06-14', '0994749588', 'الميدان', 'رجال', 'beta2@gmail.com', 'fadefade', NULL, NULL),
(4, 'ewdew', 'dsf', '2222-02-22', 'wqwq', 'wew', 'ذكر', 'tcc.fade.test@gmail.com', 'fadefade', '2022-06-07 13:31:52', '2022-06-07 13:31:52'),
(6, 'lkkl', ';lk', '2222-02-22', '35434', ';lklk', 'ذكر', 'Alkooo@kk', ';ljkl', '2022-06-07 13:34:47', '2022-06-07 13:34:47'),
(8, 'nlnkl', 'jklnlknkl', '0990-01-09', 'jkklk', 'jknjkn', 'ذكر', 'kjk@kkl', 'lk;l;kl', '2022-06-07 13:38:04', '2022-06-07 13:38:04'),
(12, 'uyfhgfgh', 'ytfgfdrt', '8766-07-06', '54334', 'rfdrfdtgd', 'ذكر', 'jhgghf@gfdfgd', 'hgdfgdfgdtrdfgdredfs', '2022-06-07 13:57:07', '2022-06-07 13:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `user_id` int(5) NOT NULL,
  `course_offer_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `admin_role_fk` (`role_id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `center_role_fk` (`role_id`);

--
-- Indexes for table `course_offer`
--
ALTER TABLE `course_offer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_offer_center` (`center_id`),
  ADD KEY `course_offer_trainer` (`trainer_id`);

--
-- Indexes for table `course_order`
--
ALTER TABLE `course_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_order_center` (`center_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `std_course` (`course_id`),
  ADD KEY `user_student_id` (`user_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`) USING BTREE;

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `center_trainer_id` (`center_id`),
  ADD KEY `user_trainer_id` (`User_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`user_id`,`course_offer_id`),
  ADD KEY `course_order_fk` (`course_offer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `course_offer`
--
ALTER TABLE `course_offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course_order`
--
ALTER TABLE `course_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admin_role_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `centers`
--
ALTER TABLE `centers`
  ADD CONSTRAINT `center_role_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `course_offer`
--
ALTER TABLE `course_offer`
  ADD CONSTRAINT `course_offer_center` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_offer_trainer` FOREIGN KEY (`trainer_id`) REFERENCES `trainer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_order`
--
ALTER TABLE `course_order`
  ADD CONSTRAINT `course_order_center` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `std_course` FOREIGN KEY (`course_id`) REFERENCES `course_offer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_student_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainer`
--
ALTER TABLE `trainer`
  ADD CONSTRAINT `center_trainer_id` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_trainer_id` FOREIGN KEY (`User_Id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD CONSTRAINT `course_order_fk` FOREIGN KEY (`course_offer_id`) REFERENCES `course_offer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_order_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
