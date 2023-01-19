-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 19, 2023 at 04:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavalust`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stocks` int(11) NOT NULL,
  `supplier_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `prodname`, `price`, `stocks`, `supplier_name`) VALUES
(1, 'Dark Choco Latte', 135, 567, 'Lyca May Nobleza'),
(2, 'Americano', 120, 70, 'Darlene Angel Fajari'),
(3, 'Choco Latte', 135, 50, 'Pamela Delizo');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `contact_no` int(20) NOT NULL,
  `product` varchar(50) NOT NULL,
  `stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `company`, `address`, `contact_no`, `product`, `stocks`) VALUES
(1, 'Lyca May Nobleza', 'Nobz Inc', 'secret', 2147483647, '', 0),
(5, 'lycs', 'lycs inc.', 'BH MASIPTS', 987654321, 'dfghj', 567);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` float NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblmidpro`
--

CREATE TABLE `tblmidpro` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmidpro`
--

INSERT INTO `tblmidpro` (`id`, `name`, `username`, `email`, `password`) VALUES
(2, 'Lyca May Nobleza', 'admin', 'noblezalycamay18@gmail.com', 'lavlav'),
(3, 'Lyca', 'LycaMay', 'noblezalycamay18@gmail.com', 'lycamay');

-- --------------------------------------------------------

--
-- Table structure for table `tblsupply`
--

CREATE TABLE `tblsupply` (
  `supply_id` int(10) NOT NULL,
  `products` varchar(50) DEFAULT NULL,
  `stocks` varchar(50) DEFAULT NULL,
  `supplier_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsupply`
--

INSERT INTO `tblsupply` (`supply_id`, `products`, `stocks`, `supplier_name`) VALUES
(1, 'Hot Choco Milk', '70', 'Lyca May Nobleza'),
(2, 'Cold Coffee', '50', 'Darlene Angel Fajari'),
(3, 'Cold Coffee', '50', 'Pamela Delizo'),
(4, 'Americano', '123', NULL),
(5, 'Americano', '89', NULL),
(6, 'Americano', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_name`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tblmidpro`
--
ALTER TABLE `tblmidpro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsupply`
--
ALTER TABLE `tblsupply`
  ADD PRIMARY KEY (`supply_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmidpro`
--
ALTER TABLE `tblmidpro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblsupply`
--
ALTER TABLE `tblsupply`
  MODIFY `supply_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
