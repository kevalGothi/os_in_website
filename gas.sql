-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2024 at 08:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gas`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquirydocumnet`
--

CREATE TABLE `enquirydocumnet` (
  `id` int(11) NOT NULL,
  `enquiryID` int(11) NOT NULL,
  `productNumber` varchar(255) NOT NULL,
  `listDraw` varchar(255) NOT NULL,
  `completionCert` varchar(255) NOT NULL,
  `asBuildDraw` varchar(255) NOT NULL,
  `StabilityCer` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `po` varchar(255) NOT NULL,
  `structuralstability` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquirydocumnet`
--

INSERT INTO `enquirydocumnet` (`id`, `enquiryID`, `productNumber`, `listDraw`, `completionCert`, `asBuildDraw`, `StabilityCer`, `invoice`, `po`, `structuralstability`, `status`, `date`) VALUES
(1, 2, 'RAM/2024/July/22/01/44-93', 'LogoBonika.png', 'call1.png', 'h4-slider1-backgroound-img.jpg', 'Flipkart-Labels-18-Jul-2024-12-41.pdf', 'screencapture-websitedemos-net-accountant-02-2024-07-17-15_42_49.pdf', '', '', 1, '2024-07-23 10:58:51'),
(6, 2, 'RAM/2024/July/23/08/07-38', 'screencapture-websitedemos-net-accountant-02-2024-07-17-15_42_49.pdf', 'screencapture-websitedemos-net-accountant-02-2024-07-17-15_42_49.pdf', 'screencapture-websitedemos-net-accountant-02-2024-07-17-15_42_49.pdf', 'screencapture-websitedemos-net-accountant-02-2024-07-17-15_42_49.pdf', 'screencapture-websitedemos-net-accountant-02-2024-07-17-15_42_49.pdf', '', '', 1, '2024-07-23 11:49:07'),
(7, 1, 'RAM/2024/July/27/04/49-48', 'IMG_6490.JPG', 'IMG_6490.JPG', 'IMG_6490.JPG', 'IMG_6490.JPG', 'IMG_6490.JPG', '', '', 1, '2024-07-27 23:23:43'),
(8, 3, 'RAM/2024/July/31/07/32-64', 'screencapture-dashboard-qikink-index-php-products-myProducts-2024-07-30-12_31_54.png', 'screencapture-dashboard-qikink-index-php-products-myProducts-2024-07-30-12_31_54.png', 'screencapture-dashboard-qikink-index-php-products-myProducts-2024-07-30-12_31_54.png', 'screencapture-dashboard-qikink-index-php-products-myProducts-2024-07-30-12_31_54.png', 'screencapture-dashboard-qikink-index-php-products-myProducts-2024-07-30-12_31_54.png', 'screencapture-dashboard-qikink-index-php-products-myProducts-2024-07-30-12_31_54.png', 'screencapture-dashboard-qikink-index-php-products-myProducts-2024-07-30-12_31_54.png', 1, '2024-07-31 11:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `agencyName` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `Name`, `product_name`, `product_id`, `phone`, `email`, `location`, `agencyName`, `status`, `date`) VALUES
(1, 'sr', 'web', 'RAM/2024/July/27/04/49-48', 'vd', 'admin@php.com', '1234', '', 0, '2024-07-22 13:59:50'),
(2, 'SR', 'PB', 'RAM/2024/July/23/08/07-38', '123456789', 'admin@php.com', '123456', '', 0, '2024-07-22 17:12:04'),
(3, 'nf', 'fgfgn', 'RAM/2024/July/31/07/32-64', 'nfg', 'fn@ng', 'nfg', 'ngf', 1, '2024-07-31 10:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `phone`, `email`, `pass`, `address`, `status`, `date`) VALUES
(1, 'SR', '7585869548', 'admin@php.com', '123456', 'WB', 1, '2024-07-21 11:26:31'),
(2, 'Sk Rubel', '7585869548', 'admin@gmail.com', '123456', 'wb', 2, '2024-07-27 19:56:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquirydocumnet`
--
ALTER TABLE `enquirydocumnet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquirydocumnet`
--
ALTER TABLE `enquirydocumnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
