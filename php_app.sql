-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 04:31 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `userName`, `password`, `status`, `createdDate`) VALUES
(1, 'vivek', '123123', 0, '2021-03-01 03:47:19'),
(2, 'vrajesh', '123', 1, '2021-03-17 11:04:20'),
(3, 'shivdip', '123', 0, '2021-03-17 11:06:18'),
(11, 'm', '123', 0, '2021-03-18 08:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attribute_id` int(11) NOT NULL,
  `entityType_id` enum('products','category','customers','') NOT NULL,
  `name` varchar(64) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(64) DEFAULT NULL,
  `sortOrder` int(11) NOT NULL,
  `backendModel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attribute_id`, `entityType_id`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(3, 'products', 'color', 'color', 'select', 'varchar(20)', 1, '1'),
(34, 'category', 'm', 'm', 'text', 'varchar(20)', 0, 'm'),
(37, 'products', 'material', 'material', 'text', 'varchar(20)', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `attributeoption`
--

CREATE TABLE `attributeoption` (
  `option_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `categoryName` varchar(20) NOT NULL,
  `path_id` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `description` varchar(200) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `createdDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `categoryName`, `path_id`, `status`, `description`, `featured`, `createdDate`) VALUES
(1, 0, 'house', '1', 0, '', 1, ''),
(2, 1, 'bedroom', '1=2', 0, '', 0, ''),
(5, 2, 'bed1', '1=2=5', 1, '', 1, ''),
(13, 2, 'bed2', '1=2=13', 0, '', 1, ''),
(34, 1, 'sofa3', '1=34', 0, '', 0, ''),
(35, 1, 'sofa2', '1=35', 1, '', 1, ''),
(36, 47, 'sofa', '1=47=36', 0, '', 0, ''),
(37, 1, 'kitchen', '1=37', 0, '', 0, ''),
(47, 1, 'livingroom', '1=47', 1, '', 1, ''),
(54, 37, 'abc', '1=37=54', 1, '', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `page_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customeraddresses`
--

CREATE TABLE `customeraddresses` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `addressType` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customeraddresses`
--

INSERT INTO `customeraddresses` (`address_id`, `customer_id`, `addressType`, `address`, `city`, `state`, `zipcode`, `country`) VALUES
(21, 1, 'shipping', 'm1', 'm', 'm', 'm', 'm'),
(22, 1, 'billing', 'k', 'k1', 'k', 'k', 'k'),
(23, 6, 'shipping', 'h', 'h', 'h', 'h', 'h'),
(24, 6, 'billing', 'up', 'u', 'u', 'u', 'p'),
(25, 11, 'shipping', 'h', 'h', 'h', 'h', 'h'),
(26, 11, 'billing', 'j', 'j', 'j', 'j', 'j');

-- --------------------------------------------------------

--
-- Table structure for table `customergroup`
--

CREATE TABLE `customergroup` (
  `group_id` int(11) NOT NULL,
  `groupName` varchar(20) NOT NULL,
  `default` tinyint(1) NOT NULL,
  `createdDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customergroup`
--

INSERT INTO `customergroup` (`group_id`, `groupName`, `default`, `createdDate`) VALUES
(9, 'g1', 0, '2021-03-15 09:31:25'),
(10, 'g2', 0, '2021-03-15 09:34:54'),
(11, 'g3', 1, '2021-03-15 09:36:06'),
(12, 'g4', 0, '2021-03-15 09:36:19'),
(15, 'g7', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 'vivek', 'a', 'va1232@gmail.com', 9876543210, '123', 0, '2021-03-18 05:59:14', '2021-03-18 06:59:14'),
(2, 'Keyur', 'patel', 'kk17@gmail.com', 123456, '123', 1, '2021-03-18 05:59:18', '2021-03-18 06:59:18'),
(6, 'mayank', 'd', 'md@gmail.com', 9876541230, '123456', 0, '2021-03-18 05:59:17', '2021-03-18 06:59:17'),
(7, 'vipul', 'ahir', 'vipul@gmail.com', 123, '1234456', 1, '2021-03-17 21:09:49', '2021-03-17 10:09:49'),
(9, 'tarang', 'm', 'tm@gmail.com', 123, '123', 1, '2021-03-17 21:16:46', '2021-03-17 10:16:46'),
(11, 'mk', 'k', 'k', 0, 'm', 1, '2021-03-17 21:16:46', '2021-03-17 10:16:46'),
(12, 'mkl', 'kl', 'l', 0, 'm', 1, '2021-03-17 21:16:47', '2021-03-17 10:16:47'),
(13, 'm', 'm', 'm', 0, 'm', 0, '2021-03-18 01:26:55', '2021-03-18 06:56:55'),
(14, 'm', 'm', 'm', 0, 'm', 0, '2021-03-18 02:39:50', '2021-03-18 08:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(20) NOT NULL,
  `paymentName` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `paymentName`, `code`, `description`, `status`, `createdDate`) VALUES
(1, 'abc', 'a1a1', '', 1, '2021-02-27 01:25:12'),
(2, 'xyz', '1', '1', 0, '2021-03-16 06:18:50'),
(3, 'abc', 'a1a1', '2\r\n', 1, '2021-03-16 06:19:01'),
(4, 'abc', 'a1a', '2\r\n', 1, '2021-03-16 06:19:07'),
(5, '1u', 'u', 'u1', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `productgroupprice`
--

CREATE TABLE `productgroupprice` (
  `entity_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productgroupprice`
--

INSERT INTO `productgroupprice` (`entity_id`, `product_id`, `group_id`, `price`) VALUES
(1, 54, 9, '6600'),
(2, 55, 10, '20000'),
(3, 56, 11, '300'),
(4, 57, 9, '101'),
(5, 54, 10, '7100'),
(8, 54, 11, '6200'),
(9, 54, 12, '6300'),
(12, 55, 9, '19000'),
(13, 55, 11, '21000'),
(14, 55, 12, '19500'),
(15, 54, 15, '5000'),
(16, 55, 15, '19000'),
(17, 59, 9, '1000'),
(18, 59, 10, '1230'),
(19, 59, 11, '1200'),
(20, 59, 12, '0'),
(21, 59, 15, '0');

-- --------------------------------------------------------

--
-- Table structure for table `productmedia`
--

CREATE TABLE `productmedia` (
  `image_id` int(11) NOT NULL,
  `image` varchar(40) NOT NULL,
  `label` varchar(40) NOT NULL,
  `small` tinyint(1) NOT NULL,
  `thumb` tinyint(1) NOT NULL,
  `base` tinyint(1) NOT NULL,
  `gallery` tinyint(1) NOT NULL,
  `remove` tinyint(1) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productmedia`
--

INSERT INTO `productmedia` (`image_id`, `image`, `label`, `small`, `thumb`, `base`, `gallery`, `remove`, `product_id`) VALUES
(12, '1-1-.jpg', '', 0, 0, 0, 0, 0, 8),
(13, 'corner 8 8.jpg', '', 0, 0, 0, 0, 0, 8),
(14, 'corner 10 10.jpg', '', 0, 0, 0, 0, 0, 8),
(15, 'corner 8 8.jpg', '', 0, 0, 0, 0, 0, 8),
(16, '', '', 0, 0, 0, 0, 0, 8),
(17, '', '', 0, 0, 0, 0, 0, 8),
(18, '', '', 0, 0, 0, 0, 0, 8),
(19, '', '', 0, 0, 0, 0, 0, 8),
(20, '1-1-.jpg', '', 0, 0, 0, 0, 0, 54),
(31, 'corner 8 8.jpg', '', 0, 0, 0, 0, 0, 54),
(34, 'corner 10 10.jpg', '', 0, 0, 0, 0, 0, 55),
(35, 'corner 12 12.jpg', '', 0, 0, 0, 0, 0, 54),
(38, 'corner 12 12.jpg', '', 0, 0, 0, 0, 0, 0),
(39, 'IMG_9231.jpg', '', 0, 0, 0, 0, 0, 57),
(40, '', '', 0, 0, 0, 0, 0, 54),
(41, '51v70btuXQL._SL1250_.jpg', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedDate` varchar(20) NOT NULL,
  `material` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `sku`, `productName`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `material`) VALUES
(54, 'tv01', 'TV', 7000, 0, 30, '', 0, '2021-03-18 03:01:04', '2021-03-18 08:31:04', NULL),
(55, 'tv05', 'tv', 20000, 22, 52, 'null', 0, '2021-03-18 07:30:58', '2021-03-18 08:30:58', NULL),
(56, 'laptop01', 'Laptop', 35500, 0, 1, '', 0, '2021-03-17 21:11:31', '2021-03-17 10:11:31', NULL),
(57, 'laptop02', 'laptop', 40000, 5, 10, 'null\r\n', 1, '2021-02-25 07:58:27', '2021-02-25 08:58:27', NULL),
(58, 'laptop03', 'Laptop', 50000, 10, 5, 'update', 0, '2021-02-25 07:59:07', '2021-02-25 08:59:07', NULL),
(59, 'watch06', 'watch', 1200, 12, 100, '1', 1, '2021-02-27 11:37:15', '2021-02-27 12:37:15', NULL),
(60, 'watch02', 'watch', 1200, 10, 0, '0', 1, '2021-03-01 03:40:05', '2021-03-01 09:10:05', NULL),
(61, 'mobile01', 'mobile', 20000, 5, 1, '', 1, '2021-03-02 01:10:00', '2021-03-02 06:40:00', NULL),
(62, 'mobile03', 'mobile', 12000, 0, 10, '', 1, '2021-03-02 02:18:49', '2021-03-02 07:48:49', NULL),
(63, 'watch06', 'watch', 990, 10, 20, 'null', 0, '2021-03-02 02:23:43', '2021-03-02 07:53:43', NULL),
(65, 'mobile04', 'mobile', 25000, 2, 2, '', 1, '2021-03-02 02:34:00', '2021-03-02 08:04:00', NULL),
(67, 'laptop02', 'laptop', 40000, 10, 0, 'laptop', 0, '2021-03-02 02:37:37', '2021-03-02 08:07:37', NULL),
(71, 'laptop06', 'laptop', 60000, 2, 2, '', 1, '2021-03-03 00:41:35', '2021-03-03 06:11:35', NULL),
(72, 'tv06', 'TV', 15000, 0, 1, '', 1, '2021-03-03 00:47:04', '2021-03-03 06:17:04', NULL),
(73, 'tv07', 'TV', 10000, 0, 0, '', 1, '2021-03-03 00:58:53', '2021-03-03 06:28:53', NULL),
(74, 'laptop01', 'laptop', 50000, 10, 1, '', 0, '2021-03-04 07:19:34', '2021-03-04 08:19:34', NULL),
(75, 'laptop02', 'laptop', 40000, 0, 2, '', 1, '2021-03-03 22:02:49', '2021-03-04 03:32:49', NULL),
(76, 'laptop05', 'laptop', 60000, 10, 1, '', 1, '2021-03-04 02:48:01', '2021-03-04 08:18:01', NULL),
(78, 'mobile07', 'mobile', 40000, 10, 1, '', 0, '2021-03-05 01:02:31', '2021-03-05 06:32:31', NULL),
(83, 'pc01', 'pc', 50000, 1, 1, '', 1, '2021-03-14 14:04:54', '2021-03-14 03:04:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `shipping_id` int(20) NOT NULL,
  `methodName` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`shipping_id`, `methodName`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(2, 'def', 'd1d1d1d', 58, 'null', 1, '2021-02-23 06:31:01'),
(3, 'hij', 'h123d', 100, '123\r\n', 0, '2021-03-16 06:18:35'),
(4, 'klm', 'w1w1w', 150, 'null', 0, '2021-02-23 06:32:27'),
(6, 'abcd', 'a1', 12, '11', 1, '2021-03-03 09:01:07'),
(7, 'hij', 'h123d', 100, '123', 0, '2021-03-16 06:08:38'),
(8, 'm', 'm', 100, 'm', 0, '2021-03-16 06:17:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `attributeoption`
--
ALTER TABLE `attributeoption`
  ADD PRIMARY KEY (`option_id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `customeraddresses`
--
ALTER TABLE `customeraddresses`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `customergroup`
--
ALTER TABLE `customergroup`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `productgroupprice`
--
ALTER TABLE `productgroupprice`
  ADD PRIMARY KEY (`entity_id`);

--
-- Indexes for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`shipping_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `attributeoption`
--
ALTER TABLE `attributeoption`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customeraddresses`
--
ALTER TABLE `customeraddresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productgroupprice`
--
ALTER TABLE `productgroupprice`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipping_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributeoption`
--
ALTER TABLE `attributeoption`
  ADD CONSTRAINT `attributeoption_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
