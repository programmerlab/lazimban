-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2018 at 06:39 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lazimban_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `name`) VALUES
(1, 'admin@admin.com', '$2y$10$G8ILTi8Gmte4Te51RNAj2OiQ2zI5H3SNUfypMHV/MYoAe7J1v8XJ2', 'n4Ae7LRNjDt4sQCDSXF6UJ9p0A1eYaooQRkfv17MKe8Laxeuwz0zBWMOWm3b', NULL, '2018-05-25 08:59:39', 'Ramu Tulsiram');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `photo` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `level` int(10) UNSIGNED DEFAULT '1',
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `category_name`, `sub_category_name`, `parent_id`, `level`, `status`, `created_at`, `updated_at`) VALUES
(87, 'Masoor Dal', 'masoor-dal', 'Masoor Dal', 'Masoor Dal', 79, 2, 1, '2017-04-20 20:30:06', '2017-04-20 20:30:06'),
(94, 'Soyabean Oil', 'soyabean-oil', 'Soyabean Oil', 'Soyabean Oil', 80, 2, 1, '2017-04-20 20:33:54', '2017-04-20 20:33:54'),
(96, 'Otomotiv & Motosiklet', 'otomotiv-motosiklet', 'Otomotiv & Motosiklet', 'Otomotiv & Motosiklet', 0, 1, 1, '2017-04-20 20:44:34', '2018-05-25 10:34:20'),
(102, 'Supermarket', 'supermarket', 'Supermarket', 'Supermarket', 0, 1, 1, '2017-08-11 15:34:26', '2018-05-25 10:34:31'),
(103, 'CAR WASHING', 'car-washing', 'CAR WASHING', 'CAR WASHING', 0, 1, 1, '2017-08-11 15:52:27', '2017-08-11 15:52:27'),
(104, 'LAUNDRY SERVICE', 'laundry-service', 'LAUNDRY SERVICE', 'LAUNDRY SERVICE', 0, 1, 1, '2017-08-11 15:53:32', '2017-08-11 15:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupans`
--

CREATE TABLE `coupans` (
  `id` int(10) UNSIGNED NOT NULL,
  `coupan_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `customer_supports`
--

CREATE TABLE `customer_supports` (
  `id` int(10) NOT NULL,
  `contact_person` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `id` int(10) UNSIGNED NOT NULL,
  `dealer_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dealer_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2017_03_19_212358_create_admin_table', 1),
('2017_03_19_212358_create_categories_table', 1),
('2017_03_19_212358_create_products_table', 1),
('2017_03_19_212358_create_users_table', 1),
('2017_03_19_212400_add_foreign_keys_to_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `page_content` text,
  `creeated_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_category` int(10) UNSIGNED DEFAULT NULL,
  `product_sub_category` int(10) UNSIGNED DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `qty` int(10) UNSIGNED DEFAULT '1',
  `discount` float(10,2) NOT NULL DEFAULT '0.00',
  `description` mediumtext COLLATE utf8_unicode_ci,
  `photo` mediumtext COLLATE utf8_unicode_ci,
  `product_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validity` int(10) UNSIGNED DEFAULT NULL,
  `product_key_id` int(10) UNSIGNED DEFAULT NULL,
  `total_stocks` int(10) UNSIGNED DEFAULT NULL,
  `available_stocks` int(10) UNSIGNED DEFAULT NULL,
  `views` int(10) UNSIGNED DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `product_category`, `product_sub_category`, `price`, `qty`, `discount`, `description`, `photo`, `product_type`, `validity`, `product_key_id`, `total_stocks`, `available_stocks`, `views`, `created_at`, `updated_at`) VALUES
(30, 'Soyabean Oil', 94, NULL, 78.00, 1, 3.00, '<p>Best quality soyabean oil for cooking 1 KG</p>\r\n', '1493617546soybean_oil.jpg', NULL, NULL, NULL, NULL, NULL, 115, '2017-05-01 05:45:46', '2018-05-28 06:32:25'),
(65, 'LOKI', 102, NULL, 25.00, 1, 0.00, '<p>only KG</p>\r\n', '1502465878Loki.jpg', NULL, NULL, NULL, NULL, NULL, 70, '2017-08-11 15:37:58', '2018-05-28 07:02:37'),
(66, 'GILKI', 102, NULL, 30.00, 1, 0.00, '<p>FRESH GILKI</p>\r\n', '1502466293GILKI.jpg', NULL, NULL, NULL, NULL, NULL, 28, '2017-08-11 15:44:53', '2018-05-29 03:01:59'),
(67, 'TAMATAR', 102, NULL, 65.00, 1, 0.00, '<p>ONLY 1KG</p>\r\n', '1502466460TAMATAR.jpg', NULL, NULL, NULL, NULL, NULL, 25, '2017-08-11 15:47:40', '2018-05-21 07:30:16'),
(68, 'HARI MIRCH', 102, NULL, 60.00, 1, 0.00, '<p>FRESH MIRCHI 1KG</p>\r\n', '1502466643HARI MIRCH.jpg', NULL, NULL, NULL, NULL, NULL, 21, '2017-08-11 15:50:43', '2018-05-21 07:30:20'),
(69, 'PRESS', 104, NULL, 10.00, 1, 0.00, '<p>ONLY SHIRT PANT</p>\r\n', '1502467058LAUNDRY.jpg', NULL, NULL, NULL, NULL, NULL, 54, '2017-08-11 15:57:38', '2018-05-21 07:28:02'),
(70, 'CAR WASHING', 103, NULL, 500.00, 1, 0.00, '<p>One Month Package 7 Wash With Polish One Time And Dust Clean</p>\r\n', '1502467160CAR WASHING.jpg', NULL, NULL, NULL, NULL, NULL, 79, '2017-08-11 15:59:20', '2018-05-23 13:37:18'),
(71, 'PYAZ', 102, NULL, 40.00, 1, 0.00, '<p>GOOD FRESH ONLY 1KG</p>\r\n', '1503841339PYAZ.jpg', NULL, NULL, NULL, NULL, NULL, 21, '2017-08-27 13:42:19', '2018-05-21 07:30:24'),
(72, 'LEHSUN', 102, NULL, 80.00, 1, 20.00, '<p>FRESH ONLY 1KG</p>\r\n', '1503841743LEHSUN.jpg', NULL, NULL, NULL, NULL, NULL, 24, '2017-08-27 13:49:03', '2018-05-21 07:30:25'),
(73, 'HARI DHANIYA', 102, NULL, 60.00, 1, 0.00, '<p>FRESH DHANIYA ONLY 1KG</p>\r\n', '1503841826DHANIYA.jpg', NULL, NULL, NULL, NULL, NULL, 23, '2017-08-27 13:50:26', '2018-05-21 07:30:27'),
(74, 'TURAI', 102, NULL, 40.00, 1, 0.00, '<p>FRESH TURAI ONLY 1KG</p>\r\n', '1503841939TURAI.jpg', NULL, NULL, NULL, NULL, NULL, 24, '2017-08-27 13:52:19', '2018-05-21 07:30:29'),
(75, 'AALOO', 102, NULL, 10.00, 1, 0.00, '<p>FRESH AALOO ONLY 1KG</p>\r\n', '1503841988ALOO.jpg', NULL, NULL, NULL, NULL, NULL, 29, '2017-08-27 13:53:08', '2018-05-21 07:30:31'),
(76, 'GANWAR FALLI', 102, NULL, 50.00, 1, 0.00, '<p>FRESH GANWAR FALLI ONLY 1KG</p>\r\n', '1503842095GANWAR.jpg', NULL, NULL, NULL, NULL, NULL, 23, '2017-08-27 13:54:55', '2018-05-21 07:30:33'),
(78, 'HELMETS', 96, NULL, 699.00, 1, 5.00, '<p>Vega Cruiser W/P Motorbike Helmet&nbsp;&nbsp;(Dull Black)</p>\r\n', '1511680197download (1).jpg', NULL, NULL, NULL, NULL, NULL, 86, '2017-11-26 07:09:57', '2018-05-31 07:37:45'),
(81, 'Masoor daal', 87, NULL, 150.00, 1, 0.00, '<p>150 per/Kg</p>\r\n', '1527113745msoor.jpeg', NULL, NULL, NULL, NULL, NULL, 65, '2018-05-23 19:15:45', '2018-05-31 07:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_keys`
--

CREATE TABLE `product_keys` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `secret_key` text COLLATE utf8_unicode_ci,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `validity_year` int(10) UNSIGNED DEFAULT NULL,
  `dealer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `field_key`, `field_value`, `created_at`, `updated_at`) VALUES
(44, 'website_title', 'Lazimbana', '2017-04-15 17:31:06', '2018-05-24 05:51:26'),
(45, 'website_email', 'info@Lazimban.com', '2017-04-15 17:31:07', '2018-05-23 19:02:38'),
(46, 'website_url', 'http://Lazimban.com/laravel', '2017-04-15 17:31:07', '2018-05-23 19:02:38'),
(47, 'contact_number', '+91-7974343960', '2017-04-15 17:31:07', '2018-05-23 19:02:38'),
(48, 'company_address', '<p>istanbul&nbsp;</p>\r\n\r\n<p>80027</p>\r\n', '2017-04-15 17:31:07', '2018-05-23 19:02:38'),
(49, 'banner_image1', '149271233901.jpg', '2017-04-15 17:31:07', '2017-04-20 12:48:59'),
(53, '_method', 'PATCH', '2017-04-15 18:06:33', '2017-04-15 18:06:33'),
(54, 'banner_image2', '149271236302.jpg', '2017-04-20 12:49:23', '2017-04-20 12:49:23'),
(55, 'banner_image3', '1527112958E-commerce-1666x555.jpg', '2017-04-20 12:49:23', '2018-05-23 19:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_billing_addresses`
--

CREATE TABLE `shipping_billing_addresses` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` text,
  `address2` text,
  `zip_code` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_type` tinyint(4) DEFAULT '1',
  `payment_mode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_billing_addresses`
--

INSERT INTO `shipping_billing_addresses` (`id`, `user_id`, `product_id`, `status`, `reference_number`, `name`, `email`, `mobile`, `phone`, `address1`, `address2`, `zip_code`, `city`, `state`, `country`, `address_type`, `payment_mode`, `created_at`, `updated_at`) VALUES
(1, 11, NULL, NULL, NULL, ' nileshvyas1986@gmail.com', 'admin@admin.com', '343543543', NULL, 'dfgdfgfdgfd', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-04-10 10:23:08', '2017-04-10 10:40:56'),
(2, 11, NULL, NULL, NULL, ' nileshvyas1986@gmail.com', 'admin@admin.com', '256   ', NULL, 'mp', 'mp', '452001', 'kad@gmail.com', '123456', NULL, 2, NULL, '2017-04-10 10:37:01', '2017-04-10 11:29:12'),
(3, 0, NULL, NULL, NULL, 'nileshvyas1986@gmail.com', 'admin@admin.com', ' ', NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-04-10 12:56:40', '2018-05-28 06:07:04'),
(4, 16, NULL, NULL, NULL, 'kundn', 'kroy.webxpert@gmail.com', '456123', NULL, 'indore', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-04-10 13:39:17', '2017-04-10 13:39:17'),
(5, 16, NULL, NULL, NULL, 'kandu', 'kanu@sdfdk.cso', '45421212', NULL, 'indore sds', 'dgdfgfdg', '89089', 'indore', 'mp', NULL, 2, NULL, '2017-04-10 13:39:41', '2017-04-10 13:39:41'),
(6, 15, NULL, NULL, NULL, 'nileshvyas1986@gmail.com', 'kroy.iips@gmail.com', ' 456123 ', NULL, '4', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-04-10 16:31:26', '2017-04-14 16:02:37'),
(7, 15, NULL, NULL, NULL, 'nileshvyas1986@gmail.com', 'admin@admin.com', ' 456123 ', NULL, '4', 'fsdfds', '34324324', 'kad2@gmail.com', 'kad2@gmail.com', NULL, 2, NULL, '2017-04-10 16:31:50', '2017-04-14 16:02:40'),
(8, 18, NULL, NULL, NULL, 'vaibhav', 'v@gmail.com', '8794564', NULL, 'indore', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-04-10 16:54:45', '2017-04-10 16:54:46'),
(9, 18, NULL, NULL, NULL, 'va', 'v@gmail.com', '789546465', NULL, 'iuh', 'hkjh', '4545415', 'root', 'root', NULL, 2, NULL, '2017-04-10 16:55:23', '2017-04-10 16:55:23'),
(10, 19, NULL, NULL, NULL, 'kundan', 'kroy.iips@gmail.com', '8103194076', NULL, 'indore mp 452001', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-04-13 14:52:34', '2017-04-13 14:52:34'),
(11, 19, NULL, NULL, NULL, 'kundan roy', 'kroy.zend@gmail.com', '8103194076', NULL, 'indore', 'vijay nagar mp', '452001', 'indore', 'mp', NULL, 2, NULL, '2017-04-13 14:53:15', '2017-04-13 14:53:15'),
(12, 20, NULL, NULL, NULL, '', '', ' ', NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-05-01 07:00:53', '2017-05-01 07:00:53'),
(13, 20, NULL, NULL, NULL, 'vicky', 'vaibhavdeveloper2014@gmail.com', '8982461354', NULL, '231 ', 'bdsa sdbsa', '452001', 'indore', 'MP', NULL, 2, NULL, '2017-05-01 07:01:19', '2017-05-01 07:01:19'),
(14, 21, NULL, NULL, NULL, 'sawati koushal', 'sawatikoushal1983@gmail.com', '9096665538', NULL, 'NAGPUR', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-05-04 11:52:43', '2017-05-04 11:52:43'),
(15, 21, NULL, NULL, NULL, 'sawati koushal', 'sawatikoushal1983@gmail.com', ' 9096665538', NULL, '56 Uday Naagar Near Vithal school', 'Ring Road Nagpur', '440034', 'NAGPUR', 'MAHARASTRA', NULL, 2, NULL, '2017-05-04 11:53:56', '2017-05-04 11:53:56'),
(16, 22, NULL, NULL, NULL, '', '', ' ', NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, '2017-06-30 11:44:14', '2017-06-30 11:44:14'),
(17, 22, NULL, NULL, NULL, 'Rajesh', 'meenaramutulsiram@gmail.com', '8770828351', NULL, '8 New Kanwar Nagar Indore', 'Nr.Hanuman Mandir', '452006', 'INDORE', 'Madhya Pradesh', NULL, 2, NULL, '2017-06-30 11:45:16', '2017-06-30 11:45:16'),
(18, 23, NULL, NULL, NULL, 'Ramu Tulsiram', 'ramu.valluvan@gmail.com', ' 9168518310', NULL, '6 Kaveri Nagar Scheme No 51', 'Near Sanmati Hospital Indore', '452006', 'indore', 'Madhya Pradesh', NULL, 2, NULL, '2017-11-26 07:15:30', '2017-11-26 07:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `support_type` varchar(255) DEFAULT NULL,
  `subject` tinytext,
  `description` text,
  `ticket_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_key_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `coupan_id` int(11) UNSIGNED DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_price` float(10,2) DEFAULT NULL,
  `discount_price` float(10,2) DEFAULT '0.00',
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_details` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `product_id`, `product_name`, `product_key_id`, `payment_mode`, `status`, `coupan_id`, `discount`, `total_price`, `discount_price`, `transaction_id`, `product_details`, `created_at`, `updated_at`) VALUES
(1, 20, 36, 'Bajra Aata', NULL, 'COD', NULL, NULL, NULL, 80.00, 80.00, '1493622088', '[{"id":36,"product_title":"Bajra Aata","product_category":100,"product_sub_category":null,"price":80,"qty":1,"discount":0,"description":"<p>Best Quality Bajra Aata 1 KG<\\/p>\\r\\n","photo":"1493621894bajra-roti2.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":1,"created_at":"2017-05-01 06:58:14","updated_at":"2017-05-01 06:58:14"}]', '2017-05-01 07:01:28', '2017-05-01 07:01:28'),
(2, 21, 55, 'Lifebuoy Care Soap', NULL, 'COD', NULL, NULL, NULL, 26.00, 26.00, '1493898723', '[{"id":55,"product_title":"Lifebuoy Care Soap","product_category":79,"product_sub_category":null,"price":26,"qty":1,"discount":0,"description":"<h2>125 gm<\\/h2>\\r\\n\\r\\n<p>Has active natural shield for anti germ protection Makes skin soft and supple Enriched with the goodness of milk and oats Specially designed for sensitive skin<\\/p>\\r\\n","photo":"1493631822pro_25806.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":8,"created_at":"2017-05-01 09:43:42","updated_at":"2017-05-04 11:51:39"}]', '2017-05-04 11:52:03', '2017-05-04 11:52:03'),
(3, 21, 15, 'Masoor Dal', NULL, 'COD', NULL, NULL, NULL, 107.00, 107.00, '1493898723', '[{"id":15,"product_title":"Masoor Dal","product_category":87,"product_sub_category":null,"price":107,"qty":1,"discount":0,"description":"<p>Masoor Daal<\\/p>\\r\\n","photo":"1493424524mas.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":16,"created_at":"2017-04-28 12:51:14","updated_at":"2017-04-30 09:38:17"}]', '2017-05-04 11:52:03', '2017-05-04 11:52:03'),
(4, 21, 55, 'Lifebuoy Care Soap', NULL, 'COD', NULL, NULL, NULL, 26.00, 26.00, '1493898850', '[{"id":55,"product_title":"Lifebuoy Care Soap","product_category":79,"product_sub_category":null,"price":26,"qty":1,"discount":0,"description":"<h2>125 gm<\\/h2>\\r\\n\\r\\n<p>Has active natural shield for anti germ protection Makes skin soft and supple Enriched with the goodness of milk and oats Specially designed for sensitive skin<\\/p>\\r\\n","photo":"1493631822pro_25806.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":8,"created_at":"2017-05-01 09:43:42","updated_at":"2017-05-04 11:51:39"}]', '2017-05-04 11:54:10', '2017-05-04 11:54:10'),
(5, 21, 15, 'Masoor Dal', NULL, 'COD', NULL, NULL, NULL, 107.00, 107.00, '1493898852', '[{"id":15,"product_title":"Masoor Dal","product_category":87,"product_sub_category":null,"price":107,"qty":1,"discount":0,"description":"<p>Masoor Daal<\\/p>\\r\\n","photo":"1493424524mas.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":16,"created_at":"2017-04-28 12:51:14","updated_at":"2017-04-30 09:38:17"}]', '2017-05-04 11:54:12', '2017-05-04 11:54:12'),
(6, 22, 24, 'TATA Salt ', NULL, 'COD', NULL, NULL, NULL, 18.00, 18.00, '1498823130', '[{"id":24,"product_title":"TATA Salt ","product_category":81,"product_sub_category":null,"price":18,"qty":1,"discount":0,"description":"<p>Tata Salt<\\/p>\\r\\n\\r\\n<p>1KG<\\/p>\\r\\n\\r\\n<p>Tata White Salt is pure and white salt, manufactured using vacuum evaporation technology. This salt contains requisite amount of Iodine that ensures proper mental development of children and also prevents iodine deficiency disorders in adults. Just add it to make your dishes delectable and wholesome.<\\/p>\\r\\n","photo":"1493442603salt.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":13,"created_at":"2017-04-29 05:10:03","updated_at":"2017-06-26 21:41:29"}]', '2017-06-30 11:45:30', '2017-06-30 11:45:30'),
(7, 22, 32, 'White Sugar', NULL, 'COD', NULL, NULL, NULL, 40.00, 40.00, '1498823130', '[{"id":32,"product_title":"White Sugar","product_category":81,"product_sub_category":null,"price":40,"qty":1,"discount":0,"description":"<p>Best quality sugar 1 KG<\\/p>\\r\\n","photo":"1493621178sugar.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":6,"created_at":"2017-05-01 06:46:18","updated_at":"2017-06-20 14:52:21"}]', '2017-06-30 11:45:30', '2017-06-30 11:45:30'),
(8, 22, 31, 'Mastard Oil', NULL, 'COD', NULL, NULL, NULL, 120.00, 120.00, '1498823130', '[{"id":31,"product_title":"Mastard Oil","product_category":95,"product_sub_category":null,"price":120,"qty":1,"discount":5,"description":"<p>Best quality mastard oil 1 KG<\\/p>\\r\\n","photo":"1493618303mustard-oil.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":8,"created_at":"2017-05-01 05:58:23","updated_at":"2017-06-26 21:41:32"}]', '2017-06-30 11:45:30', '2017-06-30 11:45:30'),
(9, 19, 55, 'Lifebuoy Care Soap', NULL, 'COD', NULL, NULL, NULL, 26.00, 26.00, '1498939765', '[{"id":55,"product_title":"Lifebuoy Care Soap","product_category":79,"product_sub_category":null,"price":26,"qty":1,"discount":0,"description":"<h2>125 gm<\\/h2>\\r\\n\\r\\n<p>Has active natural shield for anti germ protection Makes skin soft and supple Enriched with the goodness of milk and oats Specially designed for sensitive skin<\\/p>\\r\\n","photo":"1493631822pro_25806.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":15,"created_at":"2017-05-01 09:43:42","updated_at":"2017-07-01 20:07:41"}]', '2017-07-01 20:09:25', '2017-07-01 20:09:25'),
(10, 19, 24, 'TATA Salt ', NULL, 'COD', NULL, NULL, NULL, 18.00, 18.00, '1498940339', '[{"id":24,"product_title":"TATA Salt ","product_category":81,"product_sub_category":null,"price":18,"qty":1,"discount":0,"description":"<p>Tata Salt<\\/p>\\r\\n\\r\\n<p>1KG<\\/p>\\r\\n\\r\\n<p>Tata White Salt is pure and white salt, manufactured using vacuum evaporation technology. This salt contains requisite amount of Iodine that ensures proper mental development of children and also prevents iodine deficiency disorders in adults. Just add it to make your dishes delectable and wholesome.<\\/p>\\r\\n","photo":"1493442603salt.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":17,"created_at":"2017-04-29 05:10:03","updated_at":"2017-07-01 20:17:50"}]', '2017-07-01 20:18:59', '2017-07-01 20:18:59'),
(11, 22, 37, 'Black Tea', NULL, 'COD', NULL, NULL, NULL, 270.00, 270.00, '1499004353', '[{"id":37,"product_title":"Black Tea","product_category":83,"product_sub_category":null,"price":270,"qty":1,"discount":0,"description":"<p>Best Quality Asam Black Tea Patti 1 KG<\\/p>\\r\\n","photo":"1493622511chaypatti.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":6,"created_at":"2017-05-01 07:08:31","updated_at":"2017-06-26 21:41:29"}]', '2017-07-02 14:05:53', '2017-07-02 14:05:53'),
(12, 22, 40, 'Cashews', NULL, 'COD', NULL, NULL, NULL, 900.00, 900.00, '1499004353', '[{"id":40,"product_title":"Cashews","product_category":85,"product_sub_category":null,"price":900,"qty":1,"discount":0,"description":"<p>Besh Quality Bold Cashews 1 KG Pack<\\/p>\\r\\n","photo":"1493630395cashew.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":9,"created_at":"2017-05-01 09:19:55","updated_at":"2017-06-26 21:41:31"}]', '2017-07-02 14:05:53', '2017-07-02 14:05:53'),
(13, 22, 65, 'LOKI', NULL, 'COD', NULL, NULL, NULL, 25.00, 25.00, '1504703498', '[{"id":65,"product_title":"LOKI","product_category":102,"product_sub_category":null,"price":25,"qty":1,"discount":0,"description":"<p>only KG<\\/p>\\r\\n","photo":"1502465878Loki.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":4,"created_at":"2017-08-11 15:37:58","updated_at":"2017-08-29 18:14:28"}]', '2017-09-06 13:11:38', '2017-09-06 13:11:38'),
(14, 22, 67, 'TAMATAR', NULL, 'COD', NULL, NULL, NULL, 65.00, 65.00, '1504703499', '[{"id":67,"product_title":"TAMATAR","product_category":102,"product_sub_category":null,"price":65,"qty":1,"discount":0,"description":"<p>ONLY 1KG<\\/p>\\r\\n","photo":"1502466460TAMATAR.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":3,"created_at":"2017-08-11 15:47:40","updated_at":"2017-08-29 18:19:46"}]', '2017-09-06 13:11:39', '2017-09-06 13:11:39'),
(15, 22, 71, 'PYAZ', NULL, 'COD', NULL, NULL, NULL, 25.00, 25.00, '1504703499', '[{"id":71,"product_title":"PYAZ","product_category":102,"product_sub_category":null,"price":25,"qty":1,"discount":5,"description":"<p>GOOD FRESH ONLY 1KG<\\/p>\\r\\n","photo":"1503841339PYAZ.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":2,"created_at":"2017-08-27 13:42:19","updated_at":"2017-08-29 18:19:51"}]', '2017-09-06 13:11:39', '2017-09-06 13:11:39'),
(16, 22, 75, 'AALOO', NULL, 'COD', NULL, NULL, NULL, 10.00, 10.00, '1504703499', '[{"id":75,"product_title":"AALOO","product_category":102,"product_sub_category":null,"price":10,"qty":1,"discount":0,"description":"<p>FRESH AALOO ONLY 1KG<\\/p>\\r\\n","photo":"1503841988ALOO.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":2,"created_at":"2017-08-27 13:53:08","updated_at":"2017-08-29 18:20:00"}]', '2017-09-06 13:11:39', '2017-09-06 13:11:39'),
(17, 22, 72, 'LEHSUN', NULL, 'COD', NULL, NULL, NULL, 80.00, 80.00, '1504703499', '[{"id":72,"product_title":"LEHSUN","product_category":102,"product_sub_category":null,"price":80,"qty":1,"discount":20,"description":"<p>FRESH ONLY 1KG<\\/p>\\r\\n","photo":"1503841743LEHSUN.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":2,"created_at":"2017-08-27 13:49:03","updated_at":"2017-08-29 18:19:53"}]', '2017-09-06 13:11:39', '2017-09-06 13:11:39'),
(18, 23, 78, 'HELMETS', NULL, 'COD', NULL, NULL, NULL, 699.00, 699.00, '1511680541', '[{"id":78,"product_title":"HELMETS","product_category":96,"product_sub_category":null,"price":699,"qty":1,"discount":5,"description":"<p>Vega Cruiser W\\/P Motorbike Helmet&nbsp;&nbsp;(Dull Black)<\\/p>\\r\\n","photo":"1511680197download (1).jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":1,"created_at":"2017-11-26 07:09:57","updated_at":"2017-11-26 07:09:57"}]', '2017-11-26 07:15:41', '2017-11-26 07:15:41'),
(19, 23, 78, 'HELMETS', NULL, 'COD', NULL, NULL, NULL, 699.00, 699.00, '1511680589', '[{"id":78,"product_title":"HELMETS","product_category":96,"product_sub_category":null,"price":699,"qty":1,"discount":5,"description":"<p>Vega Cruiser W\\/P Motorbike Helmet&nbsp;&nbsp;(Dull Black)<\\/p>\\r\\n","photo":"1511680197download (1).jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":1,"created_at":"2017-11-26 07:09:57","updated_at":"2017-11-26 07:09:57"}]', '2017-11-26 07:16:29', '2017-11-26 07:16:29'),
(20, 23, 78, 'HELMETS', NULL, 'COD', NULL, NULL, NULL, 699.00, 699.00, '1511680643', '[{"id":78,"product_title":"HELMETS","product_category":96,"product_sub_category":null,"price":699,"qty":1,"discount":5,"description":"<p>Vega Cruiser W\\/P Motorbike Helmet&nbsp;&nbsp;(Dull Black)<\\/p>\\r\\n","photo":"1511680197download (1).jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":1,"created_at":"2017-11-26 07:09:57","updated_at":"2017-11-26 07:09:57"}]', '2017-11-26 07:17:23', '2017-11-26 07:17:23'),
(21, 24, 30, 'Soyabean Oil', NULL, 'COD', NULL, NULL, NULL, 78.00, 78.00, '1526479132', '[{"id":30,"product_title":"Soyabean Oil","product_category":94,"product_sub_category":null,"price":78,"qty":1,"discount":3,"description":"<p>Best quality soyabean oil for cooking 1 KG<\\/p>\\r\\n","photo":"1493617546soybean_oil.jpg","product_type":null,"validity":null,"product_key_id":null,"total_stocks":null,"available_stocks":null,"views":78,"created_at":"2017-05-01 11:15:46","updated_at":"2018-05-07 10:05:59"}]', '2018-05-16 08:28:52', '2018-05-16 08:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user3', 'user3', 'user3@user3.com', '$2y$10$Lz/T3Dag7MEdSq0rReZ4E.7y8jcDnPVMLT/sboOKQcVuv6kdyPWz6', NULL, '', 0, '0000-00-00 00:00:00', '2017-03-16 22:11:19'),
(2, 'user2', 'user2', 'user2@user2.com', '$2y$10$Hak7CISZtp53vF2V7tP1/uRhXs8mqjebuRwblENnm5L4zFi2xSEuu', NULL, '', 0, '2016-12-04 17:47:05', '2017-03-16 22:10:46'),
(3, 'user1', 'user1', 'user1@user1.com', '$2y$10$wdUo8O4gKFbTeKlA4rdw6uMTRBGQNzIjm/xvHTmcBFiCQrZ3HMboe', NULL, '', 1, '2016-12-04 17:47:53', '2017-03-16 22:10:27'),
(4, 'kundan', 'roy', 'test@gmail.com', '$2y$10$ZYWi19RyDm1M/5JE1/ZPvuz0DaBKLR5xK1MVAuwUMmRH/D1FbpYqO', NULL, '', 1, '2017-03-16 18:18:54', '2017-03-16 18:20:23'),
(8, 'sdmail.com', '', 'user1s@user1.com', '$2y$10$2.K1aGZmgtRokQriv9PtKuZGxodDhccLrf/NMdsa9xc.uIJhc6flu', NULL, NULL, 0, '2017-03-17 21:40:47', '2017-03-17 21:40:47'),
(10, 'Kandy', '', 'kandyroy@gmail.com', '$2y$10$ZYWi19RyDm1M/5JE1/ZPvuz0DaBKLR5xK1MVAuwUMmRH/D1FbpYqO', NULL, NULL, 0, '2017-03-19 23:26:01', '2017-03-19 23:26:01'),
(11, 'kad', 'k', 'kad@gmail.com', '$2y$10$qpdQ8GigrG3bRksUEmgbe.cXNgFvjjkcM04RgcHJAHmSlS5oCtcFK', NULL, NULL, 0, '2017-04-10 12:11:35', '2017-04-10 12:11:35'),
(12, 'fdfdf', '', 'k1@mailinator.com', '$2y$10$Q3q9uh4IoAMmsPypzG37vegTJaeiGMrXguVSMK2XuakV/xs240cgi', NULL, NULL, 0, '2017-04-10 18:10:08', '2017-04-10 18:10:08'),
(13, 'kandy', '', 'kandy@mailinator.com', '$2y$10$lAzg4PtJc5Dm0MoDcwvXKeSDK0v72zxKkWg48JT5rv7zC.SnKlzkS', NULL, NULL, 0, '2017-04-10 18:11:32', '2017-04-10 18:11:32'),
(14, 'kad', '', 'kadw@gmail.com', '$2y$10$bPjm/xDgxirBpeb0ytpkL.vwM/Fxmpka8B1b07silC8zZCIxpwMH2', NULL, NULL, 0, '2017-04-10 18:20:43', '2017-04-10 18:20:43'),
(15, 'kad', '', 'kad2@gmail.com', '$2y$10$YwQ85PyV0xioJtEH8LBPHultXA6TJWDWTKhj.cb.litv1.Da.i5f.', NULL, NULL, 0, '2017-04-10 18:45:43', '2017-04-10 18:45:43'),
(16, 'kad', '', 'kads2@gmail.com', '$2y$10$I3vvSafXQC1rK9FFr8NBDOcW7lqUc7h7plDFgpzb4OFg9NW0i1esm', NULL, NULL, 0, '2017-04-10 19:08:38', '2017-04-10 19:08:38'),
(17, 'kunda', '', 'roy@sdsd.com', '$2y$10$h8KgGLoQgdKgDikG76YsSOvp6Ba.hdj.UdRfN22oFQnXoL0GM6lW6', NULL, NULL, 0, '2017-04-10 21:20:14', '2017-04-10 21:20:14'),
(18, 'vaibhav', '', 'vaibhav@gmail.com', '$2y$10$ffn2Niy9cD.3Iy6pzOGA6OMW0wtBh9KfmZ0ZRzQ9AiwnoZ6o9ld8m', NULL, NULL, 0, '2017-04-10 22:23:40', '2017-04-10 22:23:40'),
(19, 'kundan', '', 'kroy.iips@gmail.com', '$2y$10$BW8yh95vKxFalx7gWz3iI..HQY5tvJD1ahHqRIYG8ZnXMzZzKGb2m', NULL, NULL, 0, '2017-04-13 20:22:09', '2017-04-13 20:22:09'),
(20, 'vicky', '', 'vaibhavdeveloper2014@gmail.com', '$2y$10$UtEnh9StilDGL/NLEz5IheJ9UyjoPAaHOOQtXF60mh01pBP3V3rKq', NULL, NULL, 1, '2017-05-01 07:00:22', '2017-05-01 07:01:57'),
(21, 'Sawati Koushal', '', 'sawatikoushal1983@gmail.com', '$2y$10$4b0h4qxCfM.vmPEuGt0sTeaRDdmhHswrcy1OVwed14iuLIDmPipi.', NULL, NULL, 0, '2017-05-04 11:50:14', '2017-05-04 11:50:14'),
(22, 'Rajesh Pounikar', '', 'meenaramutulsiram@gmail.com', '$2y$10$Pv9L3g2O562xMSsSs57RhOS8AVxDeHfZBESSeVfnNPzL45JyshXfm', NULL, NULL, 0, '2017-06-30 11:43:16', '2017-06-30 11:43:16'),
(23, 'Ramu', '', 'ramu.valluvan@gmail.com', '$2y$10$zgfaBMK2YDabl.ZGcWbiNOgsgWVPWvfIXWQFe.xUHaDmrZIX3mVRe', NULL, NULL, 0, '2017-11-26 07:13:24', '2017-11-26 07:13:24'),
(24, 'anasayfam', '', 'anasayfam@gmail.com', '$2y$10$bgjuSs2KROwTk2Gi3FvHhupXHbQhTULsgwUwYXGbqfXrLb6Y.vQW2', NULL, NULL, 0, '2018-05-16 13:58:20', '2018-05-16 13:58:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupans`
--
ALTER TABLE `coupans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_supports`
--
ALTER TABLE `customer_supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category` (`product_category`);

--
-- Indexes for table `product_keys`
--
ALTER TABLE `product_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_billing_addresses`
--
ALTER TABLE `shipping_billing_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `coupans`
--
ALTER TABLE `coupans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_supports`
--
ALTER TABLE `customer_supports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `product_keys`
--
ALTER TABLE `product_keys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `shipping_billing_addresses`
--
ALTER TABLE `shipping_billing_addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
