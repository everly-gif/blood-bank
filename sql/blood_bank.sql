-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2021 at 09:55 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_samples`
--

DROP TABLE IF EXISTS `blood_samples`;
CREATE TABLE IF NOT EXISTS `blood_samples` (
  `id` int NOT NULL AUTO_INCREMENT,
  `blood_group` char(3) NOT NULL,
  `number_of_units` int NOT NULL,
  `hospital_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hospital_id` (`hospital_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blood_samples`
--

INSERT INTO `blood_samples` (`id`, `blood_group`, `number_of_units`, `hospital_id`) VALUES
(14, 'O+', 4, 7),
(13, 'B+', 6, 7),
(12, 'AB+', 3, 7),
(11, 'A+', 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `type` enum('govt','private') NOT NULL,
  `services` text NOT NULL,
  `registration_no` varchar(14) NOT NULL,
  `scanned_copy` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `type`, `services`, `registration_no`, `scanned_copy`, `email`, `password`, `contact`, `address`, `city`, `state`) VALUES
(7, 'XYZ hospital', 'govt', 'general', 'GIS123456789', 'registration_uploads/32-1638858760-logo.png', 'hospital@gmail.com', '$2y$10$/3BRxCi/klfEB/J8DhaX7enQSV3ych3IuGJapwRqN9aY8RwRNzXkS', '8056255119', 'xyz Street, Majestic colony , xyz', 'Chennai', 'Tamil Nadu');

-- --------------------------------------------------------

--
-- Table structure for table `receivers`
--

DROP TABLE IF EXISTS `receivers`;
CREATE TABLE IF NOT EXISTS `receivers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `aadhar` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `aadhar_copy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `blood_type` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contact` varchar(10) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `receivers`
--

INSERT INTO `receivers` (`id`, `name`, `email`, `password`, `aadhar`, `aadhar_copy`, `blood_type`, `contact`, `city`, `state`) VALUES
(10, 'xyz', 'xyz@gmail.com', '$2y$10$a/mfEdUK0nz8nx2pxuVq4uLh3pOZmh2WUbI9OQj1ippQ6b2TjSa2G', '123456789011', 'registration_uploads/22-1638861981-wave.png', 'A+', '1223335551', 'Chennai', 'Tamil Nadu');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `receiver_id` int NOT NULL,
  `blood_group` char(3) NOT NULL,
  `number_of_units` int NOT NULL,
  `hospital_id` int NOT NULL,
  `recommendation_letter` varchar(255) NOT NULL,
  `status` enum('waitlist','approved','denied','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `receiver_id`, `blood_group`, `number_of_units`, `hospital_id`, `recommendation_letter`, `status`) VALUES
(64, 10, 'A+', 1, 7, 'doctor_recommendation_letter/23-1638862041-realtime.png', 'approved'),
(63, 9, 'A+', 1, 7, 'doctor_recommendation_letter/19-1638861007-logo.png', 'waitlist'),
(62, 9, 'A+', 2, 7, 'doctor_recommendation_letter/59-1638858984-wave.png', 'approved');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
