-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 01:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` smallint(6) NOT NULL,
  `bill_date` date NOT NULL,
  `customer_id` smallint(6) NOT NULL,
  `order_id` smallint(6) NOT NULL,
  `total_bill` double NOT NULL,
  `discount` int(11) NOT NULL,
  `net_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `bill_date`, `customer_id`, `order_id`, `total_bill`, `discount`, `net_bill`) VALUES
(11, '2021-06-19', 58, 1, 1360, 100, 1260),
(12, '2021-06-19', 59, 2, 880, 132, 748),
(13, '2021-06-19', 64, 7, 900, 0, 900),
(14, '2021-06-19', 69, 8, 1000, 120, 880),
(15, '2021-06-19', 70, 9, 1000, 120, 880);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `dob`) VALUES
(58, 'Asif Hossain', '1997-01-01'),
(59, 'Ridwanul Rifat', '1998-12-08'),
(60, 'Mahmud Bin Sultan', '1996-06-12'),
(61, 'Mahmud Bin Sultan', '1996-06-12'),
(62, 'Mahmud Bin Sultan', '1996-06-12'),
(63, 'Mahmud Bin Sultan', '1996-06-12'),
(64, 'Mahmud Bin Sultan', '1996-06-12'),
(65, '', '0000-00-00'),
(66, '', '0000-00-00'),
(67, '', '0000-00-00'),
(68, 'Asif Hossain', '2021-06-02'),
(69, 'Md. Asif Hossain', '1998-12-31'),
(70, 'Md. Asif Hossain', '1998-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` tinyint(4) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `item`, `price`) VALUES
(1, 'Chicken Chilly Pasta', 200),
(2, 'Cheesy Chicken Pasta', 300),
(3, 'Fried Rice with Fried Chicken', 200),
(4, 'Cheesy Burger', 250),
(5, 'Sausage Carnival 8\" Pizza', 450),
(7, 'Six Pack Burger', 600);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` smallint(4) NOT NULL,
  `order_id` smallint(6) NOT NULL,
  `customer_id` smallint(4) NOT NULL,
  `item_id` smallint(4) NOT NULL,
  `quantity` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `item_id`, `quantity`) VALUES
(107, 1, 58, 1, 2),
(108, 1, 58, 3, 2),
(109, 1, 58, 4, 2),
(110, 2, 59, 3, 1),
(111, 2, 59, 4, 1),
(112, 2, 59, 5, 1),
(113, 3, 60, 3, 5),
(114, 4, 61, 3, 5),
(115, 5, 62, 3, 5),
(116, 6, 63, 3, 5),
(117, 7, 64, 3, 5),
(118, 8, 69, 2, 2),
(119, 8, 69, 3, 2),
(120, 9, 70, 2, 2),
(121, 9, 70, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
