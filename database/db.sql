-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db:3306
-- Generation Time: Aug 30, 2023 at 04:05 PM
-- Server version: 10.4.30-MariaDB-1:10.4.30+maria~ubu2004-log
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `password`) VALUES
(4, 'Hart', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `room` varchar(20) NOT NULL,
  `rent_start` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `email`, `contact`, `room`, `rent_start`) VALUES
(31, 'John Williamson', 'williamsonj@gmail.com', '+639501233625', '3C', '2023-09-01 00:00:00'),
(34, 'Jill Valentine', 'jvalentine@residentevil.com', '+639872712391', '1B', '2023-09-06 00:00:00'),
(35, 'Lorenzo Seroy', 'lorenzo@sample.com', '+6398372615238', '2B', '2023-09-07 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
