-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2023 at 10:02 AM
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
  `id_p` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `version` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `statuse` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `add_machines`
--

INSERT INTO `add_machines` (`id`, `id_p`, `name`, `version`, `description`, `image`, `statuse`) VALUES
(5, 28, 'محمد الزهراني', '2025', 'hello world', '4551689.png', 'Requested');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Mohammad', 'x@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_rent` int DEFAULT NULL,
  `id_p` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `statuse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_rent`, `id_p`, `id_user`, `name`, `time`, `image`, `statuse`) VALUES
(1, 29, 1, 19, 'Khaled', '13:15:02', '4551689.png', NULL),
(2, 29, 27, 19, 'Khaled', '13:15:09', '4551689.png', NULL),
(3, 29, 1, 19, 'Khaled', '13:54:19', '4551689.png', NULL),
(4, 29, 1, 19, 'Khaled', '13:56:31', '4551689.png', NULL),
(5, 29, 28, 20, 'Khaled', '16:56:29', '4551689.png', 'Reject'),
(6, 5, 28, 20, 'محمد الزهراني', '20:49:54', '4551689.png', 'Accept'),
(7, 5, 28, 20, 'محمد الزهراني', '21:36:57', '4551689.png', 'Accept'),
(8, 5, 28, 20, 'محمد الزهراني', '21:40:24', '4551689.png', 'Reject');

-- --------------------------------------------------------

--
-- Table structure for table `provider_form`
--

DROP TABLE IF EXISTS `provider_form`;
CREATE TABLE IF NOT EXISTS `provider_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `major` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quastion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'user',
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `provider_form`
--

INSERT INTO `provider_form` (`id`, `name`, `email`, `phone`, `major`, `city`, `password`, `quastion`, `gender`, `image`) VALUES
(1, 'Malak', 'sd@gmail.com', '0508887597', NULL, 'Al Bahah', '9de37a0627c25684fdd519ca84073e34', NULL, 'Female', NULL),
(2, 'Ahmed', 'sdg@gmail.com', '0508948930', NULL, 'Medina', '74b87337454200d4d33f80c4663dc5e5', NULL, 'Male', NULL),
(3, 'Noor', 'sdj@gmail.com', '0508494530', NULL, 'Arar', 'f7c0e071db137f5ae65382041c7cef4b', NULL, 'Female', NULL),
(4, 'Saleh', 'syu@gmail.com', '0508437430', NULL, 'Al Bahah', '8f60c8102d29fcd525162d02eed4566b', NULL, 'Male', NULL),
(5, 'Saad', 'sged@gmail.com', '0508487930', NULL, 'Najran', '02c425157ecd32f259548b33402ff6d3', NULL, 'Male', NULL),
(6, 'Eman', 'sht@gmail.com', '0508407830', NULL, 'Jazan', '670da91be64127c92faac35c8300e814', NULL, 'Female', NULL),
(30, 'Alzahrani', 'FmaazDeveloper@gmail.com', '0563272784', 'Programmer', 'Riyadh', '8e296a067a37563370ded05f5a3bf3ec', 'red', 'Male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

DROP TABLE IF EXISTS `rent`;
CREATE TABLE IF NOT EXISTS `rent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_p` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `statuse` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `id_p`, `name`, `price`, `time`, `image`, `statuse`) VALUES
(13, 1, 'Camera', '100', '16:05', '4551689.png', 'Reject'),
(27, 7, 'moahammad', '5', '23:52', '4551689.png', 'Reject'),
(29, 1, 'Khaled', '31', '00:38', '4551689.png', 'Requested'),
(30, 28, 'Camera', '500', '19:46', '4551689.png', 'Accept');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

DROP TABLE IF EXISTS `user_form`;
CREATE TABLE IF NOT EXISTS `user_form` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `phone` int NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `quastion` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `phone`, `password`, `quastion`) VALUES
(1, 'Fatima', 'dghh@gmail.com', 501861701, 'ce7ce9108ae218e4ee612b0b36e3ed1d', NULL),
(2, 'Heba', 'sdhk@gmail.com', 502347890, '121d1087bf34138564c7a04aa68ae858', NULL),
(3, 'Ali', 'sdfk@gmail.com', 502347530, '41fcba09f2bdcdf315ba4119dc7978dd', NULL),
(4, 'Zahra', 'sgyd@gmail.com', 507547530, '9de37a0627c25684fdd519ca84073e34', NULL),
(5, 'Ahmed', 'sddd@gmail.com', 508947530, '670da91be64127c92faac35c8300e814', NULL),
(6, 'Sara', 'sdhdd@gmail.com', 508998530, '3fcf6748deb8c48fcbfef4a9cd6e55a0', NULL),
(7, 'Dala', 'sd@gmail.com', 508867530, '65ba841e01d6db7733e90a5b7f9e6f80', NULL),
(8, 'Noor', 'sdgh@gmail.com', 508894530, 'f7c0e071db137f5ae65382041c7cef4b', NULL),
(9, 'Malak', 'sdgjh@gmail.com', 508894597, '8f60c8102d29fcd525162d02eed4566b', NULL),
(10, 'Saleh', 'sdu@gmail.com', 508497430, '8f60c8102d29fcd525162d02eed4566b', NULL),
(11, 'Nora', 'sgh@gmail.com', 508498930, 'f7c0e071db137f5ae65382041c7cef4b', NULL),
(12, 'Jamal', 'sgt@gmail.com', 508442930, '3b6281fa2ce2b6c20669490ef4b026a4', NULL),
(13, 'Laila', 'sge@gmail.com', 508462930, '562b530cff1f5bca3b1a4c1ad4ad9962', NULL),
(14, 'Bayan', 'sh@gmail.com', 508402930, '65ba841e01d6db7733e90a5b7f9e6f80', NULL),
(15, 'Ali', 'syk@gmail.com', 502348530, '74b87337454200d4d33f80c4663dc5e5', NULL),
(20, 'Alzahrani', 'xxxx@gmail.com', 563272784, '19ca14e7ea6328a42e0eb13d585e4c22', 'black');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
