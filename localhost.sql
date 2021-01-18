-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2021 at 07:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cedcab`
--
CREATE DATABASE IF NOT EXISTS `cedcab` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cedcab`;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(50) NOT NULL,
  `name` varchar(155) NOT NULL,
  `distance` varchar(155) NOT NULL,
  `isavailable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `distance`, `isavailable`) VALUES
(1, 'Charbagh', '0', 1),
(2, 'Indira Nagar', '10', 1),
(3, 'BBD', '30', 1),
(4, 'Barabanki', '60', 1),
(5, 'Faizabad', '100', 1),
(6, 'Basti', '150', 1),
(7, 'Gorakhpur', '210', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ride`
--

CREATE TABLE `ride` (
  `ride_id` int(50) NOT NULL,
  `ride_date` varchar(100) NOT NULL DEFAULT 'current_timestamp(6)',
  `from` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `cab_type` varchar(50) NOT NULL,
  `total_distance` varchar(255) NOT NULL,
  `luggage` varchar(100) NOT NULL,
  `total_fare` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `customer_user_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ride`
--

INSERT INTO `ride` (`ride_id`, `ride_date`, `from`, `to`, `cab_type`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id`) VALUES
(4, '2021-01-07 15:59:47', 'Gorakhpur', 'Charbagh', 'CedSUV', '210', '455.65', '3460', 2, 5),
(5, '2021-01-07 16:00:08', 'Gorakhpur', 'Charbagh', 'CedSUV', '210', '455.65', '3460', 2, 5),
(16, '2021-01-07 17:41:28', 'Indira Nagar', 'Barabanki', 'CedMini', '50', '455.65', '1015', 2, 5),
(22, '2021-01-07 17:47:35', 'Basti', 'Faizabad', 'CedMini', '50', '5', '865', 2, 5),
(40, '2021-01-08 11:42:53', 'Charbagh', 'Basti', 'CedSUV', '150', '78', '2753', 1, 5),
(41, '2021-01-08 17:14:11', 'Indira Nagar', 'Gorakhpur', 'CedSUV', '200', '22', '3345', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dateofsignup` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `mobile` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email_id`, `name`, `dateofsignup`, `mobile`, `status`, `password`, `is_admin`) VALUES
(5, 'navneets303@gmail.com', 'king', '2021-01-06 09:55:28.000000', '9452610901', 0, '69875', 0),
(6, 'admin@gmail.com', 'admin', '2021-01-06 09:51:28.000000', '12345', 1, 'Password123$', 1),
(40, 'lovely123@gmail.com', 'lovely', '2021-01-07 12:16:56.000000', '98756', 0, '1234', 0),
(42, 'aman@gmail.com', 'aman', '2021-01-08 08:25:39.000000', '1234', 0, '123', 0),
(48, 'm@gmail.com', 'mm', '2021-01-08 12:20:53.000000', '123', 0, '123', 0),
(49, 'aa@gmail.com', 'aaa', '2021-01-08 12:40:38.000000', '123', 0, '123', 0),
(50, 'god@gmail.com', 'god', '2021-01-08 13:02:48.000000', '123', 0, '123', 0),
(51, 'abcd@gmail.com', 'abcdef', '2021-01-08 13:04:39.000000', '123', 0, '123', 0),
(52, 'devyadav3001@gmail.com', 'abcd', '2021-01-08 17:58:41.000000', '123', 0, '123', 0),
(53, 'himan@gmail.com', 'himan', '2021-01-08 18:17:34.000000', '1234', 0, '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ride`
--
ALTER TABLE `ride`
  ADD PRIMARY KEY (`ride_id`),
  ADD KEY `customer_user_id` (`customer_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ride`
--
ALTER TABLE `ride`
  MODIFY `ride_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ride`
--
ALTER TABLE `ride`
  ADD CONSTRAINT `ride_ibfk_1` FOREIGN KEY (`customer_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
