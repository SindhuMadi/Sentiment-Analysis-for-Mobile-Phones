-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2020 at 08:00 PM
-- Server version: 10.2.27-MariaDB-10.2.27+maria~xenial
-- PHP Version: 7.0.33-0ubuntu0.16.04.14

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
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `product_id` int(11) NOT NULL,
  `userid` int(100) NOT NULL,
  `review_id` int(100) NOT NULL,
  `review` mediumtext NOT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`product_id`, `userid`, `review_id`, `review`, `rating`) VALUES
(1, 1, 1, 'This is the best phone Ive ever used. The camera is good but the battery performance is poor.', 5),
(2, 2, 2, 'Worth its price. Better than the previous generation phones.', 5),
(3, 3, 3, 'Great value for money. Good phone.', 5),
(4, 4, 4, 'Worst phone. I did not like the phone. Google has a long way to make a good phone.', 1),
(5, 5, 5, 'Compared to Pixel XL seems to be good. The battery life is good. Impressed with the stock android', 5),
(6, 6, 6, 'Not a good phone', 4),
(7, 7, 7, 'Worst phone. Poor batery performance. The phone hangs frequently.', 1),
(8, 8, 8, 'not good. Not bad', 3),
(9, 9, 9, 'worst phone', 1),
(10, 10, 10, 'I like it. Has been one week since I bought it. So far no issues. Looking forward to explore the phone more.', 5),
(1, 11, 11, 'good phone. The only drawback is the size of the phone. Other companies have started giving a bigger screen size. A bigger screen size would have been nice.', 4),
(2, 12, 12, 'very nice working phone no problem', 5),
(3, 13, 13, 'Satisfied with the purchase', 5),
(4, 14, 14, 'Nice', 5),
(5, 15, 15, 'The touch is seamless. Functionalities are great.', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `userid` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
