-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 07:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `added_on`) VALUES
(1, 'sohidur@gmail.com', '555666', '2021-09-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `operation` varchar(10) NOT NULL,
  `added_on` date NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `qty`, `operation`, `added_on`, `date_time`) VALUES
(1, 'Ladies Bag', 5, 'input', '2021-09-27', '2021-09-27 11:25:52'),
(2, 'Ladies Bag', 6, 'output', '2021-09-27', '2021-09-27 11:25:56'),
(3, 'Ladies Bag', 50, 'return', '2021-09-27', '2021-09-27 11:26:04'),
(4, 'Travel Bag', 62, 'input', '2021-09-27', '2021-09-27 11:26:17'),
(5, 'Travel Bag', 36, 'output', '2021-09-27', '2021-09-27 11:26:21'),
(6, 'Travel Bag', 63, 'return', '2021-09-27', '2021-09-27 11:26:25'),
(7, 'Ladies bag pack', 36, 'input', '2021-09-27', '2021-09-27 11:26:35'),
(8, 'Ladies bag pack', 62, 'output', '2021-09-27', '2021-09-27 11:26:40'),
(9, 'Ladies bag pack', 365, 'return', '2021-09-27', '2021-09-27 11:26:44'),
(10, 'Party purse', 32, 'input', '2021-09-27', '2021-09-27 11:26:59'),
(11, 'Party purse', 98, 'output', '2021-09-27', '2021-09-27 11:27:03'),
(12, 'Party purse', 659, 'return', '2021-09-27', '2021-09-27 11:27:07'),
(13, 'Baby Bag', 365, 'input', '2021-09-27', '2021-09-27 11:27:18'),
(14, 'Baby Bag', 365, 'output', '2021-09-27', '2021-09-27 11:27:22'),
(15, 'Baby Bag', 364, 'return', '2021-09-27', '2021-09-27 11:27:26'),
(16, 'Minmie Bag', 36, 'input', '2021-09-27', '2021-09-27 11:27:39'),
(17, 'Minmie Bag', 354, 'output', '2021-09-27', '2021-09-27 11:27:44'),
(18, 'Minmie Bag', 965, 'return', '2021-09-27', '2021-09-27 11:27:47'),
(19, 'Ladies Bag', 20, 'input', '2022-07-15', '2022-07-15 11:33:10'),
(20, 'Ladies Bag', 30, 'input', '2022-07-15', '2022-07-15 11:33:42'),
(21, 'Ladies Bag', 10, 'input', '2022-07-15', '2022-07-15 11:33:49'),
(22, 'Ladies Bag', 30, 'output', '2022-07-15', '2022-07-15 11:34:13'),
(23, 'Ladies Bag', 365, 'return', '2022-07-15', '2022-07-15 11:34:22'),
(24, 'Baby Bag', 20, 'output', '2022-07-16', '2022-07-16 11:24:08'),
(25, 'Baby Bag', 30, 'input', '2022-07-16', '2022-07-16 11:24:15'),
(26, 'Baby Bag', 5, 'return', '2022-07-16', '2022-07-16 11:24:23'),
(27, 'Ladies Bag', 20, 'input', '2022-07-16', '2022-07-16 11:27:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
