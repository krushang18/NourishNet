-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 07:42 AM
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
-- Database: `nourishnet`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int(11) NOT NULL,
  `shop_no` int(11) NOT NULL,
  `building_name` varchar(30) NOT NULL,
  `street_no` int(11) NOT NULL,
  `street_name` varchar(30) NOT NULL,
  `landmark` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Mobile_No` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eventcustomer`
--

CREATE TABLE `eventcustomer` (
  `Eid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile_No` bigint(20) NOT NULL,
  `profile_picture` blob NOT NULL,
  `Aid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(1, 'Karan Gondaliya', 'abcxyz6510@gmail.com', 'abcdefgh'),
(2, 'Karan Gondaliya', 'annseva@gmail.com', 'This is website is amazing!!!'),
(3, 'Woodland', 'woodland1@gmail.com', 'This website is amazing!!'),
(4, 'Woodland', 'woodland1@gmail.com', 'this website is amazing!');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `type`, `email`, `mobile`, `address`) VALUES
(1, 'karan', '$2y$10$oSmTiM2Estudkf12FotqauiR6AVjn2oYhDgaYxnCXU0fmZZMnzC/6', ' ngo', 'karangondaliya10@gmail.co', '7862054577', 'jamnagar, gujarat'),
(2, 'Woodland', '$2y$10$LuHUc9GQ1g6AdPSUNamaEuCa/xD//SyutAGKqMyGoRuOkcjOgGncm', 'restaurent', 'woodland1@gmail.com', '1234567890', 'Nadiad'),
(4, 'Ann Seva', '$2y$10$00ftiV.5bTRH1Vx2OLwSnuuqYCLXR9e7uIQRhferZhVH5Zx0pG1ae', 'ngo', 'annseva@gmail.com', '1234567890', 'Nadiad'),
(5, 'Admin', '$2y$10$shHiTtd4ejeZMrXzkwHTcemKX3UyQUWpdSZqkW54g3u9GNuk92qAa', 'restaurent', 'admin@gmail.com', '1234567890', 'Nadiad'),
(7, 'Woodland', '$2y$10$/fja/GBx93msmCCL53auIOkDPVcxSpFRH8ofxZFAnaR3WjprbyT4C', 'restaurent', 'woodland@gmail.com', '1234567890', 'Nadiad'),
(8, 'Woodland', '$2y$10$9zqdJYj4Nrx7.hElsyRfHObDISi2tmcPoXtnr1JcmcVnW1KTAhcH.', 'restaurent', 'woodland@gmail.com', '1234567890', 'Nadiad'),
(9, 'blueberry', '$2y$10$ADmWib.9eYNc04jZ6cX7p.1OY11fcV2K8iHyzYFeOznsj5Nqufpgi', 'restaurent', 'blueberry@gmail.com', '1234567890', 'Nadiad'),
(10, 'food help', '$2y$10$6cdvgdbjZ0r45J2mI8F6pu2unHQ56yPT/hp7.CgqU04.zV3lDH.J.', 'ngo', 'foodhelp@gmail.com', '8628532873', 'Nadiad'),
(11, 'blueberry', '$2y$10$x4bJf/bs2MLzu/YwRls9VeMqh.syHkmvxx6Y8MZVnyPNjg5IpLHTq', 'restaurent', 'blueberry@gmail.com', '1234567890', 'Nadiad');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `nid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Mobile_No` bigint(20) NOT NULL,
  `profile_picture` blob NOT NULL,
  `Aid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ngolog`
--

CREATE TABLE `ngolog` (
  `fid` int(11) NOT NULL DEFAULT 0,
  `food_name` varchar(30) NOT NULL,
  `rid` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `expiredate` date NOT NULL,
  `nid` int(11) DEFAULT NULL,
  `ngo_name` varchar(30) DEFAULT NULL,
  `rname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ngolog`
--

INSERT INTO `ngolog` (`fid`, `food_name`, `rid`, `type`, `category`, `quantity`, `date`, `expiredate`, `nid`, `ngo_name`, `rname`) VALUES
(1, 'pizza', 1, 'veg', 'cooked_food', '2 piece', '2024-02-25', '2024-02-26', 4, 'Ann Seva', 'Woodland');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Rid` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Mobile_No` bigint(20) NOT NULL,
  `Aid` int(11) DEFAULT NULL,
  `profile_picture` blob DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurantlog`
--

CREATE TABLE `restaurantlog` (
  `fid` int(11) NOT NULL,
  `food_name` varchar(30) NOT NULL,
  `rid` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `quantity` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `expiredate` date NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `rname` varchar(30) DEFAULT NULL
) ;

--
-- Dumping data for table `restaurantlog`
--

INSERT INTO `restaurantlog` (`fid`, `food_name`, `rid`, `type`, `category`, `quantity`, `date`, `expiredate`, `status`, `rname`) VALUES
(6, 'potatoes', 1, 'veg', 'raw-food', '2 piece', '2024-02-25', '2024-02-27', 'available', 'Woodland'),
(8, 'pizza', 2, 'veg', 'cooked_food', '2 piece', '2024-02-25', '2024-02-26', 'available', 'Woodland'),
(9, 'pizza', 1, 'veg', 'cooked-food', '2 piece', '2024-02-25', '0000-00-00', NULL, 'Woodland'),
(10, 'pizza', 1, 'veg', 'cooked-food', '2 piece', '2024-02-25', '0000-00-00', NULL, 'Woodland');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `eventcustomer`
--
ALTER TABLE `eventcustomer`
  ADD PRIMARY KEY (`Eid`),
  ADD KEY `FOREIGN_KEY` (`Aid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD PRIMARY KEY (`nid`),
  ADD KEY `FOREIGN_KEY` (`Aid`);

--
-- Indexes for table `ngolog`
--
ALTER TABLE `ngolog`
  ADD KEY `nid` (`nid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `restaurantlog`
--
ALTER TABLE `restaurantlog`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `rid` (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventcustomer`
--
ALTER TABLE `eventcustomer`
  MODIFY `Eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ngo`
--
ALTER TABLE `ngo`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `Rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurantlog`
--
ALTER TABLE `restaurantlog`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Aid`) REFERENCES `login` (`id`);

--
-- Constraints for table `eventcustomer`
--
ALTER TABLE `eventcustomer`
  ADD CONSTRAINT `eventcustomer_ibfk_1` FOREIGN KEY (`Aid`) REFERENCES `address` (`AddressID`),
  ADD CONSTRAINT `eventcustomer_ibfk_2` FOREIGN KEY (`Aid`) REFERENCES `address` (`AddressID`);

--
-- Constraints for table `ngo`
--
ALTER TABLE `ngo`
  ADD CONSTRAINT `ngo_ibfk_1` FOREIGN KEY (`Aid`) REFERENCES `address` (`AddressID`);

--
-- Constraints for table `ngolog`
--
ALTER TABLE `ngolog`
  ADD CONSTRAINT `ngolog_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `login` (`id`);

--
-- Constraints for table `restaurantlog`
--
ALTER TABLE `restaurantlog`
  ADD CONSTRAINT `restaurantlog_ibfk_1` FOREIGN KEY (`rid`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
