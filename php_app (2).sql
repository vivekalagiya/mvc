-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 05:01 PM
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
(3, 'shivdip', '123', 0, '2021-03-17 11:06:18');

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
(39, 'products', 'brand', 'brand', 'checkbox', 'varchar(20)', 4, '1'),
(41, 'products', 'material', 'material', 'textarea', 'varchar(20)', 3, '1'),
(42, 'products', 'Type', 'type', 'radio', 'varchar(20)', 4, '1'),
(43, 'products', 'keyword', 'keyword', 'text', 'varchar(20)', 1, '1'),
(49, 'customers', 'type', 'type', 'radio', 'varchar(20)', 1, '1'),
(51, 'category', 'taxCode', 'taxCode', 'select', 'varchar(20)', 3, '1');

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

--
-- Dumping data for table `attributeoption`
--

INSERT INTO `attributeoption` (`option_id`, `name`, `attribute_id`, `sortOrder`) VALUES
(14, 'xyz', 39, 1),
(15, 'abc', 39, 2),
(16, 'pqr', 39, 3),
(17, 'inactive', 42, 2),
(18, 'active', 42, 1),
(21, 'regular', 49, 3),
(22, 'business', 49, 2),
(26, 'GST_18', 51, 4),
(27, 'GST_5', 51, 2),
(28, 'GST_12', 51, 3),
(29, 'GST_0', 51, 1),
(30, 'green', 3, 1),
(31, 'red', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `session_id` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `shippingAmount` decimal(10,0) NOT NULL,
  `createdDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `session_id`, `customer_id`, `total`, `discount`, `payment_id`, `shipping_id`, `shippingAmount`, `createdDate`) VALUES
(34, '', 2, '0', '0', 8, 11, '0', '2021-04-03 08:45:32'),
(35, '', 6, '0', '0', 0, 0, '0', '2021-04-03 08:45:43'),
(36, '', 1, '0', '0', 0, 0, '0', '2021-04-03 08:45:46'),
(37, '', 9, '0', '0', 8, 10, '70', '2021-04-03 08:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `cartaddress`
--

CREATE TABLE `cartaddress` (
  `cartAddress_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `addressType` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zipCode` varchar(20) NOT NULL,
  `sameAsBilling` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartaddress`
--

INSERT INTO `cartaddress` (`cartAddress_id`, `cart_id`, `address_id`, `addressType`, `address`, `city`, `state`, `country`, `zipCode`, `sameAsBilling`) VALUES
(11, 34, 0, 'billing', 'xyz', 'Ahmedabad', 'gujarat', 'India', '382222', 0),
(12, 34, 0, 'shipping', 'xyz', 'Ahmedabad', 'gujarat', 'India', '382222', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `cartItem_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `basePrice` decimal(10,0) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `createdDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`cartItem_id`, `cart_id`, `product_id`, `quantity`, `basePrice`, `price`, `discount`, `createdDate`) VALUES
(51, 34, 54, 9, '0', '7500', '0', '2021-04-03 08:45:32'),
(52, 35, 54, 1, '0', '7500', '0', '2021-04-03 08:50:48'),
(53, 35, 56, 1, '0', '35500', '0', '2021-04-03 08:51:34'),
(54, 37, 56, 1, '0', '35500', '0', '2021-04-03 08:52:01'),
(55, 34, 59, 3, '0', '1200', '12', '2021-04-05 06:21:52'),
(56, 34, 56, 3, '35500', '35500', '0', '2021-04-05 06:24:15');

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
  `createdDate` varchar(20) NOT NULL,
  `taxCode` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `parent_id`, `categoryName`, `path_id`, `status`, `description`, `featured`, `createdDate`, `taxCode`) VALUES
(1, 0, 'house', '1', 1, '', 1, '', 'GST_12'),
(2, 1, 'bedroom', '1=2', 1, '', 1, '', ''),
(5, 2, 'bed1', '1=2=5', 1, '', 1, '', ''),
(13, 2, 'bed2', '1=2=13', 0, '', 0, '', ''),
(34, 47, 'sofa3', '1=47=34', 0, '', 1, '', ''),
(35, 47, 'sofa2', '1=47=35', 0, '', 0, '', ''),
(36, 47, 'sofa', '1=47=36', 0, '', 0, '', NULL),
(37, 1, 'kitchen', '1=37', 0, '', 0, '', NULL),
(47, 1, 'livingroom', '1=47', 1, '', 1, '', NULL),
(54, 37, 'abc', '1=37=54', 1, '', 1, '', NULL),
(55, 1, 'sofa5', '1=55', 1, '', 1, '', ''),
(56, 2, 'bed3', '1=2=56', 1, '', 1, '', '');

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
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `code` varchar(30) NOT NULL,
  `value` varchar(30) NOT NULL,
  `createdDate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `group_id`, `title`, `code`, `value`, `createdDate`) VALUES
(10, 2, 'c2', 'c2', 'c3', ''),
(11, 2, 'b1', 'b2', 'b3', ''),
(15, 4, 'jh', 'jj', 'jj', ''),
(16, 4, 'rtr', 'rt', 'rt', ''),
(17, 8, 'g7-1', 'g7-2', 'g7-3', ''),
(18, 8, 't1', 't2', 't3', '2021-04-05 16:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `configgroup`
--

CREATE TABLE `configgroup` (
  `group_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `createdDate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configgroup`
--

INSERT INTO `configgroup` (`group_id`, `name`, `createdDate`) VALUES
(2, 'g1', ''),
(4, 'g3', ''),
(5, 'g4', ''),
(6, 'g5', ''),
(7, 'g5', ''),
(8, 'g7', ''),
(9, 'g9', '2021-04-05 16:12:02');

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
(23, 6, 'shipping', 'h', 'h', 'h', 'h', 'h'),
(24, 6, 'billing', 'up', 'u', 'u', 'u', 'p'),
(25, 11, 'shipping', 'h', 'h', 'h', 'h', 'h'),
(26, 11, 'billing', 'j', 'j', 'j', 'j', 'j'),
(33, 2, 'shipping', 'xyz', 'Ahmedabad', 'gujarat', '382222', 'India'),
(34, 2, 'billing', 'xyz', 'Ahmedabad', 'gujarat', '382222', 'India'),
(35, 7, 'shipping', 'abc', 'amreli', 'gujarat', '365656', 'india'),
(36, 1, 'shipping', 'xyz', 'Ahmedabad', 'gujarat', '382222', 'india');

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
(10, 'g2', 1, '2021-03-15 09:34:54'),
(11, 'g3', 0, '2021-03-15 09:36:06'),
(12, 'g4', 0, '2021-03-15 09:36:19'),
(15, 'g5', 0, '');

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
  `updatedDate` varchar(20) NOT NULL,
  `type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdDate`, `updatedDate`, `type`) VALUES
(1, 'vivek', 'alagiya', 'va1232@gmail.com', 9876543210, '123', 0, '2021-03-26 03:14:05', '2021-03-26 08:44:05', 'regular'),
(2, 'Keyur', 'patel', 'kk17@gmail.com', 12345, '123', 1, '2021-03-25 01:42:00', '2021-03-25 07:12:00', 'business'),
(6, 'mayank', 'd', 'md@gmail.com', 9876541230, '123456', 0, '2021-03-18 05:59:17', '2021-03-18 06:59:17', NULL),
(7, 'vipul', 'ahir', 'vipul@gmail.com', 123, '1234456', 0, '2021-03-26 07:43:50', '2021-03-26 08:43:50', NULL),
(9, 'tarang', 'm', 'tm@gmail.com', 123, '123', 1, '2021-03-17 21:16:46', '2021-03-17 10:16:46', NULL),
(16, 'jigar', 'p', 'jp@gmail.com', 12312, '123', 1, '2021-03-25 01:41:41', '2021-03-25 07:11:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `orderTotal` decimal(10,0) NOT NULL,
  `totalDiscount` decimal(10,0) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `paymentCode` varchar(20) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `shippingCode` varchar(20) NOT NULL,
  `shippingAmount` decimal(10,0) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `orderTotal`, `totalDiscount`, `payment_id`, `paymentCode`, `shipping_id`, `shippingCode`, `shippingAmount`, `status`) VALUES
(17, 6, '7500', '0', 0, '', 0, '', '0', ''),
(18, 9, '35500', '0', 8, 'creditCard', 10, 'regular', '70', ''),
(19, 2, '76564', '36', 0, '', 0, '', '0', ''),
(20, 2, '76564', '36', 7, 'debitCard', 9, 'express', '100', ''),
(21, 2, '112064', '36', 8, 'creditCard', 11, 'free', '0', ''),
(22, 2, '119564', '36', 8, 'creditCard', 11, 'free', '0', ''),
(23, 2, '127064', '36', 8, 'creditCard', 11, 'free', '0', ''),
(24, 2, '134564', '36', 8, 'creditCard', 11, 'free', '0', ''),
(25, 2, '177564', '36', 8, 'creditCard', 11, 'free', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `orderItem_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `productName` varchar(64) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`orderItem_id`, `order_id`, `product_id`, `sku`, `productName`, `quantity`, `price`, `discount`) VALUES
(10, 17, 54, '456', 'Mi Tv', 1, '7500', '0'),
(11, 18, 56, 'laptop01', 'Laptop', 1, '35500', '0'),
(12, 19, 54, '456', 'Mi Tv', 5, '7500', '0'),
(13, 19, 59, 'watch06', 'watch', 3, '1200', '12'),
(14, 19, 56, 'laptop01', 'Laptop', 1, '35500', '0'),
(15, 20, 54, '456', 'Mi Tv', 5, '7500', '0'),
(16, 20, 59, 'watch06', 'watch', 3, '1200', '12'),
(17, 20, 56, 'laptop01', 'Laptop', 1, '35500', '0'),
(18, 21, 54, '456', 'Mi Tv', 5, '7500', '0'),
(19, 21, 59, 'watch06', 'watch', 3, '1200', '12'),
(20, 21, 56, 'laptop01', 'Laptop', 2, '35500', '0'),
(21, 22, 54, '456', 'Mi Tv', 6, '7500', '0'),
(22, 22, 59, 'watch06', 'watch', 3, '1200', '12'),
(23, 22, 56, 'laptop01', 'Laptop', 2, '35500', '0'),
(24, 23, 54, '456', 'Mi Tv', 7, '7500', '0'),
(25, 23, 59, 'watch06', 'watch', 3, '1200', '12'),
(26, 23, 56, 'laptop01', 'Laptop', 2, '35500', '0'),
(27, 24, 54, '456', 'Mi Tv', 8, '7500', '0'),
(28, 24, 59, 'watch06', 'watch', 3, '1200', '12'),
(29, 24, 56, 'laptop01', 'Laptop', 2, '35500', '0'),
(30, 25, 54, '456', 'Mi Tv', 9, '7500', '0'),
(31, 25, 59, 'watch06', 'watch', 3, '1200', '12'),
(32, 25, 56, 'laptop01', 'Laptop', 3, '35500', '0');

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
(7, 'debit card', 'debitCard', '', 1, '0000-00-00 00:00:00'),
(8, 'credit card', 'creditCard', '', 1, '0000-00-00 00:00:00'),
(9, 'paypal', 'paypal', '', 1, '0000-00-00 00:00:00'),
(10, 'paytm', 'paytm', '', 1, '0000-00-00 00:00:00');

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
(3, 56, 11, '30000'),
(4, 57, 9, '101'),
(5, 54, 10, '7100'),
(8, 54, 11, '6400'),
(9, 54, 12, '6300'),
(12, 55, 9, '19000'),
(13, 55, 11, '21000'),
(14, 55, 12, '19500'),
(15, 54, 15, '6250'),
(16, 55, 15, '19700'),
(17, 59, 9, '1000'),
(18, 59, 10, '1230'),
(19, 59, 11, '1200'),
(20, 59, 12, '0'),
(21, 59, 15, '0'),
(22, 63, 9, '1000'),
(23, 63, 10, '1100'),
(24, 63, 11, '980'),
(25, 63, 12, '960'),
(26, 63, 15, '970'),
(27, 56, 9, '34000'),
(28, 56, 10, '0'),
(29, 56, 12, '0'),
(30, 56, 15, '0');

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
(19, '', '', 0, 0, 0, 0, 0, 8),
(34, 'corner 10 10.jpg', '', 0, 0, 0, 0, 0, 55),
(39, 'IMG_9231.jpg', '', 0, 0, 0, 0, 0, 57),
(42, 'Hook Patti M 922.png', '', 0, 0, 0, 0, 0, 54),
(43, 'DIAMOND BATHROOM SET (304) 03.png', '', 0, 0, 0, 0, 0, 54);

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
  `color` varchar(20) DEFAULT NULL,
  `brand` varchar(20) DEFAULT NULL,
  `material` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `keyword` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `sku`, `productName`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `color`, `brand`, `material`, `type`, `keyword`) VALUES
(54, '456', 'Mi Tv', 7500, 0, 1, '', 1, '2021-04-01 12:33:09', '2021-04-01 02:33:09', 'black', 'xyz, abc', 'n', 'active', 'f'),
(55, 'tv02', 'tv', 20000, 10, 1, 'null', 0, '2021-03-23 01:02:35', '2021-03-23 06:32:35', 'green', 'xyz, abc, pqr', '  m', 'active', 'm'),
(56, 'laptop01', 'Laptop', 35500, 0, 1, '', 1, '2021-03-25 14:25:30', '2021-03-25 03:25:30', 'blue', 'xyz, abc', 'bvbv', 'active', 'nn nx x'),
(57, 'laptop02', 'hp laptop', 40000, 5, 10, 'null\r\n', 0, '2021-03-31 21:07:20', '2021-04-01 02:37:20', 'black', 'xyz, abc, pqr', 'vv', '', 'v'),
(58, 'laptop03', 'Laptop', 50000, 10, 5, 'update', 0, '2021-02-25 07:59:07', '2021-02-25 08:59:07', NULL, NULL, NULL, NULL, NULL),
(59, 'watch06', 'watch', 1200, 12, 100, '1', 0, '2021-03-25 14:25:34', '2021-03-25 03:25:34', 'blue', 'xyz, pqr', 'mm', 'active', 'n m'),
(60, 'watch02', 'watch', 1200, 10, 0, '0', 1, '2021-03-01 03:40:05', '2021-03-01 09:10:05', NULL, NULL, NULL, NULL, NULL),
(61, 'mobile01', 'mobile', 20000, 5, 1, '', 1, '2021-03-02 01:10:00', '2021-03-02 06:40:00', NULL, NULL, NULL, NULL, NULL),
(62, 'mobile03', 'mobile', 12000, 0, 10, '', 1, '2021-03-02 02:18:49', '2021-03-02 07:48:49', NULL, NULL, NULL, NULL, NULL),
(63, 'watch06', 'watch', 990, 10, 20, 'null', 0, '2021-03-02 02:23:43', '2021-03-02 07:53:43', NULL, NULL, NULL, NULL, NULL),
(65, 'mobile04', 'mobile', 25000, 2, 2, '', 1, '2021-03-02 02:34:00', '2021-03-02 08:04:00', NULL, NULL, NULL, NULL, NULL),
(193, 'laptop03', 'laptop', 30000, 2, 10, '', 0, '2021-03-22 03:01:32', '2021-03-22 08:31:32', 'black', 'abc', 'n', 'active', 'n v v'),
(194, 'Mobile08', 'mobile', 25000, 5, 1, '', 0, '2021-03-23 01:02:02', '2021-03-23 06:32:02', NULL, NULL, NULL, NULL, NULL),
(196, 'tv11', 'tv', 20000, 10, 0, '0', 0, '2021-03-23 21:11:16', '2021-03-24 02:41:16', NULL, NULL, NULL, NULL, NULL),
(197, 'laptop11', 'laptop', 40000, 10, 1, '', 0, '2021-03-25 01:27:59', '2021-03-25 06:57:59', NULL, NULL, NULL, NULL, NULL),
(198, 'iphone11', 'iphone', 120000, 10, 1, '', 0, '2021-03-24 21:55:16', '2021-03-25 03:25:16', NULL, NULL, NULL, NULL, NULL),
(199, 'MKO2', 'abc', 10000, 200, 1, '', 0, '2021-04-02 01:00:25', '2021-04-02 06:30:25', NULL, NULL, NULL, NULL, NULL),
(200, 'bed01', 'bed', 20000, 400, 1, '', 1, '2021-04-02 04:31:42', '2021-04-02 06:31:42', NULL, NULL, NULL, NULL, NULL);

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
(9, 'express', 'express', 100, '', 1, '2021-03-30 07:02:14'),
(10, 'regular', 'regular', 70, '', 1, '2021-03-30 07:02:30'),
(11, 'free', 'free', 0, '', 1, '2021-03-30 07:53:13');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cartaddress`
--
ALTER TABLE `cartaddress`
  ADD PRIMARY KEY (`cartAddress_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`cartItem_id`),
  ADD KEY `cart_id` (`cart_id`);

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
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `configgroup`
--
ALTER TABLE `configgroup`
  ADD PRIMARY KEY (`group_id`);

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
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`orderItem_id`);

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
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `attributeoption`
--
ALTER TABLE `attributeoption`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cartaddress`
--
ALTER TABLE `cartaddress`
  MODIFY `cartAddress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `cartItem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `configgroup`
--
ALTER TABLE `configgroup`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customeraddresses`
--
ALTER TABLE `customeraddresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `orderItem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productgroupprice`
--
ALTER TABLE `productgroupprice`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipping_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributeoption`
--
ALTER TABLE `attributeoption`
  ADD CONSTRAINT `attributeoption_ibfk_1` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`attribute_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartaddress`
--
ALTER TABLE `cartaddress`
  ADD CONSTRAINT `cartaddress_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `cartitem_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `config`
--
ALTER TABLE `config`
  ADD CONSTRAINT `config_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `configgroup` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
