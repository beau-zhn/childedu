-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2017 at 02:16 PM
-- Server version: 5.7.19-17-beget-5.7.19-17-1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h77588vx_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--
-- Creation: Dec 04, 2017 at 07:17 PM
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'adminfaz', '8c972d4b260649826809891869119746e29466bf');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
-- Creation: Dec 04, 2017 at 07:17 PM
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Electronics'),
(2, 'cakes');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--
-- Creation: Dec 04, 2017 at 07:17 PM
-- Last update: Dec 05, 2017 at 11:10 AM
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `forname`, `surname`, `add1`, `add2`, `add3`, `postcode`, `phone`, `email`, `registered`) VALUES
(1, 'am', 'par', 'ka, Banh', 'shan 1', 'dkjf, lksd kl', '1200', '9879797', 'par@gmail.com', 1),
(2, 'Gal', 'Hos', 'ka', 'baz', 'shan', '9879', '9898797', 'gal@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--
-- Creation: Dec 04, 2017 at 07:17 PM
--

DROP TABLE IF EXISTS `delivery_addresses`;
CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `forname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `add3` varchar(50) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--
-- Creation: Dec 04, 2017 at 07:17 PM
-- Last update: Dec 05, 2017 at 11:11 AM
--

DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `username`, `password`) VALUES
(1, 1, 'par', '5e6a8d12704c428d47cd0dfa1a457326e590fd6f'),
(2, 2, 'gal', '7c4a8d09ca3762af61e59520943dc26494f8941b'),
(3, 3, 'mag', '91d9f9fcfa4532b537188d1d220c7cf603b2a3a6'),
(4, 4, 'sun', '22fa6121da96f43a106e413e65d4f9089c53824c'),
(5, 5, 'han', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2'),
(6, 6, 'hee', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2'),
(7, 7, 'ria', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2'),
(8, 8, 'ria', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2'),
(9, 9, 'ria', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2'),
(10, 10, 'ria', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2'),
(11, 11, 'ra', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2'),
(12, 12, 'he', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2'),
(13, 13, 'name', '6ae999552a0d2dca14d62e2bc8b764d377b1dd6c');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--
-- Creation: Dec 04, 2017 at 07:17 PM
-- Last update: Dec 05, 2017 at 09:05 AM
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(2, 1, 1, 10),
(3, 8, 2, 1),
(4, 8, 2, 10),
(6, 10, 2, 10),
(8, 9, 1, 43),
(9, 9, 2, 41),
(10, 11, 1, 8),
(11, 12, 2, 11),
(16, 13, 2, 35),
(17, 13, 2, 13),
(18, 14, 2, 9),
(19, 15, 2, 10),
(20, 16, 1, 12),
(21, 16, 1, 16),
(22, 17, 2, 14),
(23, 18, 2, 17),
(24, 18, 2, 38),
(25, 18, 2, 15),
(28, 20, 1, 60),
(29, 20, 1, 46),
(31, 19, 1, 20),
(32, 21, 2, 11),
(33, 22, 2, 15),
(34, 22, 2, 18),
(35, 23, 1, 17),
(36, 23, 2, 13),
(37, 23, 2, 17),
(38, 24, 2, 19),
(39, 24, 2, 18),
(113, 25, 2, 1),
(132, 26, 1, 1),
(133, 26, 2, 1),
(134, 26, 2, 1),
(135, 26, 1, 1),
(136, 26, 1, 1),
(137, 26, 1, 1),
(138, 26, 1, 1),
(139, 26, 1, 1),
(140, 26, 2, 1),
(141, 26, 1, 1),
(143, 27, 1, 1),
(146, 27, 2, 1),
(147, 27, 1, 1),
(150, 28, 1, 1),
(151, 29, 1, 1),
(152, 29, 2, 1),
(153, 30, 1, 1),
(154, 31, 1, 5),
(155, 31, 1, 1),
(156, 32, 1, 1),
(157, 32, 1, 1),
(161, 33, 1, 12),
(162, 33, 1, 1),
(163, 33, 2, 1),
(164, 34, 1, 1),
(166, 34, 2, 1),
(167, 34, 1, 11),
(168, 35, 1, 12),
(169, 35, 1, 1),
(170, 34, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--
-- Creation: Dec 04, 2017 at 07:17 PM
-- Last update: Dec 05, 2017 at 09:07 AM
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `delivery_add_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `session` varchar(100) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `status`, `session`, `total`) VALUES
(26, 0, 0, 0, 0, '2017-12-04 16:52:49', 0, 'btk9gn7qk3a5mg0glf3bvoae95', 0.9),
(27, 3, 1, 0, 0, '2017-12-04 17:01:18', 1, '', 6.88),
(28, 3, 1, 0, 0, '2017-12-04 17:21:47', 0, 'btk9gn7qk3a5mg0glf3bvoae95', 0.9),
(29, 0, 0, 0, 0, '2017-12-04 22:52:07', 1, '729tl80huie02boa5pj7bo7g90', 3.89),
(30, 0, 0, 0, 1, '2017-12-05 00:05:18', 10, '729tl80huie02boa5pj7bo7g90', 3.89),
(31, 11, 1, 0, 1, '2017-12-05 00:27:17', 2, '', 17.94),
(32, 11, 1, 0, 2, '2017-12-05 00:28:51', 10, '', 5.98),
(33, 13, 1, 0, 3, '2017-12-05 08:49:07', 2, '', 39.77),
(34, 13, 1, 0, 0, '2017-12-05 11:52:07', 0, '', 39.77),
(35, 0, 0, 0, 0, '2017-12-05 11:58:41', 0, '54ccf2941a6581cb33b141ea366e0e13', 38.87);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
-- Creation: Dec 04, 2017 at 07:17 PM
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`) VALUES
(1, 1, 'Best Bags', 'A quality pack of tea bags.200 bags in each box', '', 2.99),
(2, 1, 'Best Orange Juice', 'One gallon of quality sequeezed orange juice.', 'bestorange-juice.jpg', 0.9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
