-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 15, 2020 at 12:19 PM
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
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserId` int(16) NOT NULL,
  `FirstName` varchar(128) NOT NULL,
  `LastName` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Phone` varchar(16) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `ConfirmPassword` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserId`, `FirstName`, `LastName`, `Email`, `Phone`, `Password`, `ConfirmPassword`) VALUES
(1, 'Keerthana', 'Yadavelli', 'kyadavel@gmail.com', '8013306969', 'kyadavel23', 'kyadavel23'),
(2, 'Sindhuja', 'Madishetty', 'smadishe@iu.edu', '3177497809', 'smadishe23', 'smadishe23'),
(3, 'Lakshmi Shri Shivaram', 'Ponallaghi', 'lakshiva@iu.edu', '+917550233063', 'lakshiva23', 'lakshiva23'),
(4, 'Bharat', 'Reddy', 'Bharat.gunreddy@gmail.com', '9802638889', 'Bharat23', 'Bharat23'),
(5, 'Sravya', 'Yadavelli', 'sravya@gmail.com', '8985113264', 'sravya07', 'sravya07'),
(6, 'Aqueasha', 'Martin', 'aqumarti@iupui.edu', '3172787686', 'aqumarti23', 'aqumarti23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
