-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 06:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `facebook_users`
--

CREATE TABLE `facebook_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `f_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facebook_users`
--

INSERT INTO `facebook_users` (`id`, `name`, `email`, `f_id`) VALUES
(30, 'Md Ehsan', 'mdsabirpokhrauni@gmail.com', '1077371529949867');

-- --------------------------------------------------------

--
-- Table structure for table `github_users`
--

CREATE TABLE `github_users` (
  `id` int(11) NOT NULL,
  `github_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `github_users`
--

INSERT INTO `github_users` (`id`, `github_id`, `name`, `username`, `location`, `picture`, `link`) VALUES
(2, '105972025', 'MD EHSAN', 'wwwmd', 'madhbani', 'https://avatars.githubusercontent.com/u/105972025?v=4', ' https://github.com/wwwmd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `token`, `status`) VALUES
(9, 'mdehsan', '6207798939', 'mdehsan480@gmail.com', '$2y$10$0uBE9H8Loe9cb7ZJWUWfsem9Na1tT5xQHYJ6o84/xhkE8y8PUScKi', '219243', 'active'),
(10, 'nikhil', '6207798939', 'mdsabirpokhrauni@gmail.com', '$2y$10$HiSp4eDyAnCSOXn8FwzizeHFfYq2xecR94zBmQP1y8lve0pwg89wa', '386539', 'active'),
(11, 'mdeh', '6207798939', 'mdehsan@gmail.com', '$2y$10$MAFcsqE7j4cKOLhbtYSMZuSYl4r91LTwhfaBERxb6SskOKDoirMZS', '927180', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `G_ID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `picture`, `G_ID`) VALUES
(22, 'Md Sabir', 'mdsabirpokhrauni@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocKrPWEUOV6SgazQAzHzIgrBKmIyxRflSM7hgTQztLapVc8=s96-c', '102190493999171855672'),
(23, 'md ehsan', 'mdehsan480@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJAQ3mXfTaCkxvx8N-B9yPdNt-EUlddjlvUHl5MntVcJfU=s96-c', '103922714373126042448');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facebook_users`
--
ALTER TABLE `facebook_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `github_users`
--
ALTER TABLE `github_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `facebook_users`
--
ALTER TABLE `facebook_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `github_users`
--
ALTER TABLE `github_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
