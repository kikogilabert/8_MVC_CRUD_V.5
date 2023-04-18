-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 07:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsproyect`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `cod_brand` int(11) NOT NULL,
  `desc_brand` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `license_number` int(11) NOT NULL,
  `car_plate` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `km` int(8) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `doors` int(11) DEFAULT NULL,
  `registration_date` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` int(11) DEFAULT NULL,
  `motor_type` int(11) DEFAULT NULL,
  `cc` int(11) DEFAULT NULL,
  `cv` int(11) DEFAULT NULL,
  `upload_date` varchar(50) DEFAULT NULL,
  `lat` varchar(10) DEFAULT NULL,
  `lon` varchar(10) DEFAULT NULL,
  `sticker` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cod_category` int(11) NOT NULL,
  `name_cat` varchar(100) DEFAULT NULL,
  `desc_cat` varchar(100) DEFAULT NULL,
  `img_cat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cod_category`, `name_cat`, `desc_cat`, `img_cat`) VALUES
(0, 'KM-0', 'This cars have 0km', 'view/images/pic1.jpg'),
(0, 'Pre-Owned', 'There was a owner before you', 'view/images/pic2.jpg'),
(0, 'Renting', 'This car is for renting', 'view/images/pic3.jpg'),
(0, 'Offer', 'This type of cars have an offer', 'view/images/pic3.jpg'),
(0, 'New', 'All these cars are new', 'view/images/pic3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `extras`
--

CREATE TABLE `extras` (
  `cod_extras` int(11) NOT NULL,
  `desc_extras` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `cod_model` int(11) NOT NULL,
  `desc_model` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `motor_type`
--

CREATE TABLE `motor_type` (
  `cod_motortype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
