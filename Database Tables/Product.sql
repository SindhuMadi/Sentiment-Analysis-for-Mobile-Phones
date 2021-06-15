-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2020 at 01:36 PM
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
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `Pd_id` int(11) NOT NULL,
  `pd_name` varchar(255) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `Description` mediumtext NOT NULL,
  `Overall_rating` int(11)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`Pd_id`, `pd_name`, `cost`, `Description`, `Overall_rating`) VALUES
(1, 'Apple iphone 6S', '735', 'Apple iPhone 6 Plus 128GB Factory Unlocked GSM 4G LTE Cell Phone - Silver', 5),
(2, 'Apple iPhone 6 Plus', '615', 'Apple iPhone 6 Plus 64GB Gold Factory Unlocked', 4),
(3, 'Apple iphone SE', '445', 'Apple iPhone SE Unlocked Phone -16 GB Retail Packaging - Silver', 5),
(4, 'Google Pixel', '743', 'Google Pixel Phone 32GB - 5 inch display /Factory Unlocked US Version /Very Silver', 5),
(5, 'Google Pixel XL', '990', 'Google Pixel XL Phone 32GB - 5.5 inch display/ Factory Unlocked US Version/Quite Black', 5),
(6, 'Samsung Galaxy S6', '600', 'Samsung Galaxy S6 G920v Verizon Unlocked Cell Phone- 32gb Gold Platinum', 4),
(7, 'ASUS Zenfone 2', '295', 'ASUS ZenFone 2 Unlocked Cellphone , 64GB, Silver U.S. Warranty', 4),
(8, 'LG Electronics', '561', 'LG Electronics G3 D855 32GB Unlocked International Phone International Version No Warranty - Retail Packaging - Violet', 4),
(9, 'Microsoft Nokia Lumia 650', '381', 'Microsoft Lumia 650 RM-1154 16GB White, 5", Dual Sim, Unlocked International Model, No Warranty', 4),
(10, 'Samsung Galaxy Note 4', '1000', 'Samsung Galaxy Note 4 SM-N910F 4G LTE White Factory Unlocked International Model', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`Pd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `Pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
