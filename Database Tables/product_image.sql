-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2020 at 05:34 PM
-- Server version: 10.2.27-MariaDB-10.2.27+maria~xenial
-- PHP Version: 7.0.33-0ubuntu0.16.04.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lakshiva_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='image files related to a product';

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `name`) VALUES
(11, 1, 'iphone6S.jpg'),
(21, 2, 'Iphone6plus.jpg'),
(31, 3, 'iphonese.jpg'),
(41, 4, 'Google-Pixel.jpg'),
(51, 5, 'googlepixelxl.jpg'),
(61, 6, 'Samsung-Galaxy-S6-edge.jpg'),
(71, 7, 'asus_zenphone2.jpg'),
(81, 8, 'LG.jpg'),
(91, 9, 'Nokia-Lumia.jpg'),
(101, 10, 'samsungnote4.jpg'),
(12, 1, 'iphone6s2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
