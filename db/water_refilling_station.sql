-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2022 at 09:49 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water_refilling_station`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accountId` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `accountType` varchar(45) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accountId`, `fullname`, `username`, `password`, `accountType`, `dateAdded`) VALUES
(1, NULL, 'test', '098f6bcd4621d373cade4e832627b4f6', 'customer', '2022-02-11 11:27:18'),
(2, NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '2022-02-14 11:00:01'),
(3, NULL, 'hello', '5d41402abc4b2a76b9719d911017c592', 'admin', '2022-02-14 11:49:30'),
(4, NULL, 'world', '7d793037a0760186574b0282f2f435e7', 'admin', '2022-02-14 11:51:42'),
(5, NULL, 'Customer', '91ec1f9324753048c0096d036a694f86', 'admin', '2022-02-14 11:53:47'),
(6, NULL, 'customer', '91ec1f9324753048c0096d036a694f86', 'customer', '2022-02-14 12:27:01'),
(7, NULL, 'Customer1', 'ffbc4675f864e0e9aab8bdf7a0437010', 'customer', '2022-02-14 12:44:17'),
(8, '', 'testlang', '098f6bcd4621d373cade4e832627b4f6', 'admin', '2022-02-14 14:10:17'),
(9, '', 'agent', 'b33aed8f3134996703dc39f9a7c95783', 'admin', '2022-02-14 14:11:53'),
(11, 'Rycel Melyan Cuizon', 'rycelmelyan', '345c528c0b3643a5aaef6b72ae6d3673', 'customer', '2022-02-14 15:57:22');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `orderID` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phoneNumber` varchar(11) DEFAULT NULL,
  `deliveryAddress` text DEFAULT NULL,
  `productID` int(11) DEFAULT NULL,
  `accountId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderType` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `dateRequested` datetime DEFAULT NULL,
  `dateDelivered` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`orderID`, `name`, `phoneNumber`, `deliveryAddress`, `productID`, `accountId`, `quantity`, `orderType`, `status`, `dateRequested`, `dateDelivered`) VALUES
(4, 'Melyan Cuizon', '5649878', 'Santa Monica, Barangay 656, \r\n					INTRAMUROS, NCR, CITY OF MANILA, FIRST DISTRICT, NATIONAL CAPITAL REGION (NCR)', 5, 1, 1, 'for_delivery', 'pending', '2022-02-10 12:44:10', '0000-00-00 00:00:00'),
(5, 'Test User', '6548798', 'Employees Village, Buas (Pob.), \r\n					CANDABA, PAMPANGA, REGION III (CENTRAL LUZON)', 7, 2, 1, 'for_delivery', 'approved', '2022-02-10 12:48:21', NULL),
(6, 'Test Consumer', '484578', 'Santa Monica, Barangay V (Pob.), \r\n					CORON, PALAWAN, REGION IV-B (MIMAROPA)', 7, 3, 1, 'for_delivery', 'pending', '2022-02-10 12:50:00', NULL),
(7, 'Test Consumer', '484578', 'Santa Monica, Barangay V (Pob.), \r\n					CORON, PALAWAN, REGION IV-B (MIMAROPA)', 7, 4, 1, 'for_delivery', 'completed', '2022-02-10 12:50:55', '2022-02-10 17:46:34'),
(8, 'Melyan Cuizon', '6866798', 'Santa Monica, Dolores, \r\n					BACOLOR, PAMPANGA, REGION III (CENTRAL LUZON)', 7, 5, 1, 'for_delivery', 'cancelled', '2022-02-10 12:51:28', '2022-02-10 17:46:05'),
(9, 'Melyan Cuizon', '89797465', 'Santa Monica, Cabaruan, \r\n					MADDELA, QUIRINO, REGION II (CAGAYAN VALLEY)', 6, 6, 1, 'for_reservation', 'pending', '2022-02-10 12:51:28', NULL),
(10, 'Melyan Cuizon', '8798787', 'Santa Monica, Biñang 1st, \r\n					BOCAUE, BULACAN, REGION III (CENTRAL LUZON)', 5, 7, 1, 'for_reservation', 'pending', '2022-02-10 12:51:28', NULL),
(11, 'Melyan Cuizon', '5787', 'Santa Monica, Bangco, \r\n					Cavinti, Laguna, REGION IV-A (CALABARZON)', 6, 8, 1, 'for_delivery', 'cancelled', '2022-02-14 10:15:07', '2022-02-14 11:19:09'),
(12, 'Melyan Cuizon', '45878', 'Santa Monica, Labayo, \r\n					Cavinti, Laguna, REGION IV-A (CALABARZON)', 7, 9, 1, 'for_reservation', 'pending', '2022-02-14 10:15:59', NULL),
(13, 'Rycel Melyan', '489898', 'Santa Monica, Cansuso, \r\n					Cavinti, Laguna, REGION IV-A (CALABARZON)', 5, 11, 1, 'for_delivery', 'pending', '2022-02-14 14:21:12', NULL),
(14, 'Rycel Melyan', '5998945', 'Santa Monica, Duhat, \r\n					Cavinti, Laguna, REGION IV-A (CALABARZON)', 7, 11, 1, 'for_delivery', 'pending', '2022-02-14 14:26:33', NULL),
(15, 'Rycel Melyan', '4885599', 'Santa Monica, Layasin, \r\n					Cavinti, Laguna, REGION IV-A (CALABARZON)', 7, 11, 1, 'for_reservation', 'pending', '2022-02-14 14:32:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `deliveryID` int(11) NOT NULL,
  `deliveryTime` varchar(45) DEFAULT NULL,
  `orderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`deliveryID`, `deliveryTime`, `orderID`) VALUES
(2, '08:00 AM', 4),
(3, '11:00 AM', 6),
(4, '11:00 AM', 8),
(5, '08:00 AM', 11),
(6, '08:00 AM', 13),
(7, '08:00 AM', 14);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `containerType` varchar(100) NOT NULL,
  `price` varchar(45) NOT NULL,
  `image` text NOT NULL,
  `dateAdded` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `containerType`, `price`, `image`, `dateAdded`) VALUES
(5, '2.5 Gallons Container', '20.00', '2-5-Gallons.png', '2022-02-14 15:46:50'),
(6, '3 Gallons Container', '25.00', '3-Gallons.png', '2022-02-14 14:46:50'),
(7, 'T1 5 Gallons Container', '35.00', 'T1-Gallons.png', '2022-02-14 13:46:50'),
(8, 'T2 5 Gallons Container', '35.00', 'T2-Gallons.png', '2022-02-14 12:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationID` int(11) NOT NULL,
  `deliveryDate` datetime NOT NULL,
  `deliveryTime` varchar(45) NOT NULL,
  `orderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `deliveryDate`, `deliveryTime`, `orderID`) VALUES
(2, '2022-02-11 00:00:00', '09:00 AM', 5),
(3, '2022-02-10 00:00:00', '11:00 AM', 7),
(4, '2022-02-18 00:00:00', '10:00 AM', 9),
(5, '2022-02-24 00:00:00', '11:00 AM', 10),
(6, '2022-02-15 00:00:00', '09:00 AM', 12),
(7, '2022-02-15 00:00:00', '08:00 AM', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`deliveryID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `deliveryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
