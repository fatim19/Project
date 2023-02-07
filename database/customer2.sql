-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 07, 2023 at 10:51 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer2`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_machines`
--

DROP TABLE IF EXISTS `add_machines`;
CREATE TABLE IF NOT EXISTS `add_machines` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `version` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provider_form`
--

DROP TABLE IF EXISTS `provider_form`;
CREATE TABLE IF NOT EXISTS `provider_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provider_form`
--

INSERT INTO `provider_form` (`id`, `name`, `email`, `phone`, `city`, `password`, `gender`) VALUES
(1, 'Malak', 'sd@gmail.com', '0508887597', 'Al Bahah', '9de37a0627c25684fdd519ca84073e34', 'Female'),
(2, 'Ahmed', 'sdg@gmail.com', '0508948930', 'Medina', '74b87337454200d4d33f80c4663dc5e5', 'Male'),
(3, 'Noor', 'sdj@gmail.com', '0508494530', 'Arar', 'f7c0e071db137f5ae65382041c7cef4b', 'Female'),
(4, 'Saleh', 'syu@gmail.com', '0508437430', 'Al Bahah', '8f60c8102d29fcd525162d02eed4566b', 'Male'),
(5, 'Saad', 'sged@gmail.com', '0508487930', 'Najran', '02c425157ecd32f259548b33402ff6d3', 'Male'),
(6, 'Eman', 'sht@gmail.com', '0508407830', 'Jazan', '670da91be64127c92faac35c8300e814', 'Female'),
(7, 'Mohammad Alzahrani', 'FmaazDeveloper@gmail.com', '0563272784', 'Riyadh', '81dc9bdb52d04dc20036dbd8313ed055', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
CREATE TABLE IF NOT EXISTS `rent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_p` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `statuse` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `id_p`, `name`, `price`, `time`, `image`, `statuse`) VALUES
(13, 1, 'Camera', '100', '16:05', '4551689.png', 'Accept'),
(27, 7, 'moahammad', '5', '23:52', '4551689.png', 'Reject'),
(29, 1, 'Khaled', '31', '00:38', '4551689.png', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

DROP TABLE IF EXISTS `user_form`;
CREATE TABLE IF NOT EXISTS `user_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `phone`, `password`, `user_type`) VALUES
(1, 'Fatima', 'dghh@gmail.com', 501861701, 'ce7ce9108ae218e4ee612b0b36e3ed1d', 'user'),
(2, 'Heba', 'sdhk@gmail.com', 502347890, '121d1087bf34138564c7a04aa68ae858', 'user'),
(3, 'Ali', 'sdfk@gmail.com', 502347530, '41fcba09f2bdcdf315ba4119dc7978dd', 'provider'),
(4, 'Zahra', 'sgyd@gmail.com', 507547530, '9de37a0627c25684fdd519ca84073e34', 'user'),
(5, 'Ahmed', 'sddd@gmail.com', 508947530, '670da91be64127c92faac35c8300e814', 'admin'),
(6, 'Sara', 'sdhdd@gmail.com', 508998530, '3fcf6748deb8c48fcbfef4a9cd6e55a0', 'user'),
(7, 'Dala', 'sd@gmail.com', 508867530, '65ba841e01d6db7733e90a5b7f9e6f80', 'user'),
(8, 'Noor', 'sdgh@gmail.com', 508894530, 'f7c0e071db137f5ae65382041c7cef4b', 'user'),
(9, 'Malak', 'sdgjh@gmail.com', 508894597, '8f60c8102d29fcd525162d02eed4566b', 'user'),
(10, 'Saleh', 'sdu@gmail.com', 508497430, '8f60c8102d29fcd525162d02eed4566b', 'user'),
(11, 'Nora', 'sgh@gmail.com', 508498930, 'f7c0e071db137f5ae65382041c7cef4b', 'user'),
(12, 'Jamal', 'sgt@gmail.com', 508442930, '3b6281fa2ce2b6c20669490ef4b026a4', 'user'),
(13, 'Laila', 'sge@gmail.com', 508462930, '562b530cff1f5bca3b1a4c1ad4ad9962', 'user'),
(14, 'Bayan', 'sh@gmail.com', 508402930, '65ba841e01d6db7733e90a5b7f9e6f80', 'user'),
(15, 'Ali', 'syk@gmail.com', 502348530, '74b87337454200d4d33f80c4663dc5e5', 'user'),
(16, 'Mohammad Alzahrani', 'FmaazDeveloper@gmail.com', 563272784, '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(17, 'Mohammad Alzahrani', 'FmaazDeveloper@gmail.com', 563272784, '202cb962ac59075b964b07152d234b70', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
