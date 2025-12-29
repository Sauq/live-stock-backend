-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2025 at 07:09 PM
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
-- Database: `dynamicstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderstb`
--

CREATE TABLE `orderstb` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shippingaddress` varchar(255) NOT NULL,
  `priceatpurchase` decimal(10,2) NOT NULL,
  `orderstatus` enum('Pending','Complete','Cancelled') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productstb`
--

CREATE TABLE `productstb` (
  `productid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `expired` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productstb`
--

INSERT INTO `productstb` (`productid`, `name`, `description`, `price`, `image_url`, `expired`) VALUES
(1, 'Jordan 4', 'Size 7.5 Mens', 250.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsWlEVavZPg4zWYxjx1H28RNuYl1o7joMN8Q&s', b'1'),
(2, 'Moncler Maya', 'Mens Size S', 200.00, 'https://i.ebayimg.com/images/g/OiIAAOSwpGdkBdkY/s-l1200.jpg', b'1'),
(3, 'Amiri Cap', 'Trucker Hat', 95.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRFy4Q1DibMJs_UO7AAxKZuYMotbirUiLZpPA&s', b'1'),
(4, 'YSL Jumper', 'Saint Laurent Jumper', 100.00, 'https://encrypted-tbn3.gstatic.com/shopping?q=tbn:ANd9GcQCS_BSzpG-ULVK2lTfnAB5EvcXWDCQ7AjLJE1qz9LopJ6zGpK1z5G87zhelwFgNd4z3WKBhewdZChbMc8GQx27M_FsoReNwJ-CgoMNXnW3iB4LHeCA_As2bYYo&usqp=CAc', b'1'),
(7, 'Test Product', 'This is a sample product used for testing orders.', 19.99, 'https://i.ebayimg.com/images/g/qqUAAeSwGCFog3t2/s-l1600.webp', b'1'),
(8, 'Nike Tech Fleece Hoodie', 'Mens Size M — Grey, lightly worn', 60.00, 'https://i.ebayimg.com/images/g/13cAAeSwqcRpQewH/s-l1600.webp', b'1'),
(9, 'Trapstar Shooters Jacket', 'Mens Size L — Black, good condition', 140.00, 'https://i.ebayimg.com/images/g/dZsAAeSwZPJpSnVv/s-l1600.webp', b'1'),
(10, 'Palm Angels Track Pants', 'Size M — Orange stripes', 180.00, 'https://i.ebayimg.com/images/g/BJ8AAeSwpO5pJnPj/s-l1600.webp', b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderstb`
--
ALTER TABLE `orderstb`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `productstb`
--
ALTER TABLE `productstb`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderstb`
--
ALTER TABLE `orderstb`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productstb`
--
ALTER TABLE `productstb`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
