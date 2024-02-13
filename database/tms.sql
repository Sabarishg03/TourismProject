-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 10:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `checkin_date` date NOT NULL,
  `total_adults` int(11) NOT NULL,
  `total_children` int(11) NOT NULL,
  `area_code` varchar(10) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `room_preference` varchar(50) DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `payment_mode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `first_name`, `last_name`, `address`, `email`, `checkin_date`, `total_adults`, `total_children`, `area_code`, `phone`, `room_preference`, `gender`, `payment_mode`) VALUES
(1, 'Ranjith', 'M', 'gfgk gasf ajkf kaf af kaf', 'ranjithsuraj23082001@gmail.com', '2023-12-26', 4, 3, '98453', '90787', 'Connecting', 'Male', 'Male'),
(2, 'Ranjith', 'M', 'gfgk gasf ajkf kaf af kaf', 'ranjithsuraj23082001@gmail.com', '2023-12-26', 4, 3, '98453', '90787', 'Connecting', 'Male', 'Male'),
(3, 'Ranjith', 'M', 'gfgk gasf ajkf kaf af kaf', 'ranjithsuraj23082001@gmail.com', '2023-12-26', 4, 3, '98453', '90787', 'Connecting', 'Male', 'Male'),
(4, 'Ranjith', 'M', 'gfgk gasf ajkf kaf af kaf', 'ranjithsuraj23082001@gmail.com', '2023-12-26', 4, 3, '98453', '90787', 'Connecting', 'Male', 'Male'),
(5, 'Ranjith', 'M', 'gfgk gasf ajkf kaf af kaf', 'ranjithsuraj23082001@gmail.com', '2023-12-26', 4, 3, '98453', '90787', 'Connecting', 'Male', 'Male'),
(6, 'Ranjith', 'M', 'gfgk gasf ajkf kaf af kaf', 'ranjithsuraj23082001@gmail.com', '2023-12-26', 4, 3, '98453', '90787', 'Connecting', 'Male', 'Male'),
(7, 'Ranjith', 'M', 'gfgk gasf ajkf kaf af kaf', 'ranjithsuraj23082001@gmail.com', '2023-12-07', 5, 5, '98453', '90787', 'Adjoining', 'Male', 'Male'),
(8, 'Ranjith', 'Suraj', 'bangalore', 'ranjith@gmail.com', '2023-12-08', 1, 1, '560016', '9739316237', 'Adjoining', 'Male', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Ranjith', '$2y$10$Zneew8a7iZ4rzwXtiSGt0uGMMV8vFJFx.YLYLqMukIvdr66whHu2y', '2023-08-21'),
(2, 'test', '$2y$10$KEzDU9BRHO4fRY7YXAIxVOC.PNoVN5T35zsUly1Dk/UD5mvyeL5EG', '2023-08-21'),
(3, 'suraj', '$2y$10$qwZziPzHIwuC5/7hxuG1u.6mk2h0VGb50zT.dUB3VQd5.VYwH6.eq', '2023-08-21'),
(4, 'sabarish', '$2y$10$KphVLUgXr3sRyKodS2lLxenGoQGlnRFoOX0.EbJ0y7eTcqYturlGy', '2023-12-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
