-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 11:58 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `design_ids` varchar(500) NOT NULL,
  `total_rate` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `own_design_img` varchar(150) DEFAULT NULL,
  `cust_desc` text NOT NULL,
  `sizes` varchar(500) NOT NULL,
  `pro_price` int(11) NOT NULL COMMENT 'Adding product price',
  `total_price` int(11) NOT NULL COMMENT 'adding total price',
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `cat_img` varchar(150) DEFAULT NULL,
  `status` enum('YES','NO') NOT NULL,
  `customer_id` int(11) NOT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `category_name`, `cat_img`, `status`, `customer_id`, `update_date`) VALUES
(10, 'Shoe', '836931_cat_img.png', 'YES', 1, NULL),
(11, 'Networking ', '605547_cat_img.jpg', 'YES', 1, NULL),
(12, 'Cloth', '536645_cat_img.png', 'YES', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_design`
--

CREATE TABLE `tbl_design` (
  `design_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `style_id` int(11) NOT NULL,
  `design_name` varchar(150) NOT NULL,
  `design_img` varchar(150) NOT NULL,
  `design_rate` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` enum('YES','NO') NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_design`
--

INSERT INTO `tbl_design` (`design_id`, `cat_id`, `sub_cat_id`, `style_id`, `design_name`, `design_img`, `design_rate`, `customer_id`, `status`, `update_date`) VALUES
(48, 10, 16, 12, 'Old Canvas Shoe', '296514_design_img.jpg', '55', 1, 'YES', '2022-07-01 08:39:35'),
(49, 10, 17, 13, 'Old Bot Shoe', '890449_design_img.png', '55', 1, 'YES', '2022-07-01 08:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `customer_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `email_id` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` enum('YES','NO') DEFAULT NULL,
  `mobile_no` varchar(15) NOT NULL,
  `photo` varchar(150) DEFAULT NULL,
  `role` enum('customer','admin','seller') NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `pincode` varchar(15) DEFAULT NULL,
  `land_mark` varchar(150) NOT NULL,
  `about_me` varchar(150) DEFAULT NULL,
  `company_logo` varchar(150) NOT NULL,
  `company_app_doct` varchar(50) NOT NULL,
  `company_details` text NOT NULL,
  `admin_approve_cmy` enum('1','2') DEFAULT NULL,
  `rejection_reason` text,
  `otp` int(11) DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `money_type` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`customer_id`, `user_name`, `email_id`, `password`, `status`, `mobile_no`, `photo`, `role`, `address`, `city`, `country`, `pincode`, `land_mark`, `about_me`, `company_logo`, `company_app_doct`, `company_details`, `admin_approve_cmy`, `rejection_reason`, `otp`, `update_date`, `money_type`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$K2bwNTxn9RMEKkhgLro0oOZmPnasmmNToE0mDm/GtUS9WG26XXtxe', 'YES', '7092887009', '571082_photo.png', 'admin', 'pondicherry', 'Kaduna', 'Nigeria', '700105', 'Kaduna Kaduna', 'Don\'t be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed des', '979438_company_logo.png', '', '', NULL, NULL, 0, '2022-06-09 17:15:21', '₹'),
(9, 'Yunux', 'customer@gmail.com', '$2y$10$K2bwNTxn9RMEKkhgLro0oOZmPnasmmNToE0mDm/GtUS9WG26XXtxe', 'YES', '7092887009', '834852_photo.jpg', 'customer', 'pondicherry', 'Kano', 'Nigeria', '700105', 'BUK', 'Don\'t be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed des', '', '', '', NULL, NULL, 0, '2022-06-09 17:25:08', NULL),
(10, 'seller', 'seller@gmail.com', '$2y$10$K2bwNTxn9RMEKkhgLro0oOZmPnasmmNToE0mDm/GtUS9WG26XXtxe', 'NO', '7092887009', '140942_photo.png', 'seller', 'Smart Craft Pvt Ltd.,\r\nSmartcraft #48/2 block - 2,\r\nfirst floor kudlu main road near shree bhagya veg hotel\r\nBangalore,\r\nBANGALORE - 560068', 'PUDUCHERRY', 'India', '605105', 'dfgdf', 'dfgdfg', '618687_company_logo.png', '282767_company_app_doct.pdf', '.', '2', NULL, NULL, '2022-02-14 07:53:39', NULL),
(11, 'Yunux', 'yunusisah123@gmail.com', '$2y$10$anHoWoKHjyV6y5Vy6eFlj.C77Pi6o2Jvu84ztDdIixMaA3coGBVCO', 'YES', '0903324840', '526631_photo.png', 'customer', 'kano,kano state', 'kano', 'Nigeria', '700105', 'Kaduna Kaduna', 'Yunus', '', '', '', NULL, NULL, 0, '2022-06-23 21:19:22', NULL),
(13, 'Musa', 'admin@example.com', '$2y$10$cgcbiGB/vVI0R5qVGENkP.u/pMGaQxoD54u0TnIL/HP1uut3sCEW6', 'YES', '909999', '', 'customer', NULL, NULL, NULL, NULL, '', NULL, '', '', '', NULL, NULL, 0, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `design_ids` varchar(500) NOT NULL,
  `total_rate` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `own_design_img` varchar(150) DEFAULT NULL,
  `cust_desc` text NOT NULL,
  `sizes` varchar(500) NOT NULL,
  `order_status` enum('PENDING','COMPLETED') NOT NULL,
  `Payment_Status` enum('PAID','NOT PAID') CHARACTER SET swe7 NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `design_id` varchar(200) NOT NULL,
  `pro_name` varchar(150) NOT NULL,
  `pro_img` varchar(150) NOT NULL,
  `pro_details` text NOT NULL,
  `pro_rate` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pro_price` int(11) NOT NULL COMMENT 'adding price to product',
  `status` enum('YES','NO') NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `cat_id`, `sub_cat_id`, `design_id`, `pro_name`, `pro_img`, `pro_details`, `pro_rate`, `customer_id`, `pro_price`, `status`, `update_date`) VALUES
(7, 10, 17, '', 'New Bot form Admin', '338393_pro_img.png', 'New Bot form Admin', '12', 1, 800, 'YES', '2022-07-01 08:41:28'),
(8, 11, 18, '', 'Testing for Price', '624576_pro_img.jpg', 'New Bot form Admin', '12', 1, 1500, 'YES', '2022-07-01 08:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_styles`
--

CREATE TABLE `tbl_styles` (
  `style_id` int(11) NOT NULL,
  `style_name` varchar(150) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `status` enum('YES','NO') NOT NULL,
  `customer_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_styles`
--

INSERT INTO `tbl_styles` (`style_id`, `style_name`, `cat_id`, `sub_cat_id`, `status`, `customer_id`, `update_date`) VALUES
(12, 'Old Canvas', 10, 16, 'YES', 1, '2022-07-01 08:37:29'),
(13, 'New Bot', 10, 17, 'YES', 1, '2022-07-01 08:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `sub_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_name` varchar(50) NOT NULL,
  `status` enum('YES','NO') NOT NULL,
  `customer_id` int(11) NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`sub_cat_id`, `cat_id`, `sub_cat_name`, `status`, `customer_id`, `update_date`) VALUES
(16, 10, 'Canvas', 'YES', 1, '0000-00-00 00:00:00'),
(17, 10, 'Bot', 'YES', 1, '0000-00-00 00:00:00'),
(18, 11, 'Network Device', 'YES', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_design`
--
ALTER TABLE `tbl_design`
  ADD PRIMARY KEY (`design_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_styles`
--
ALTER TABLE `tbl_styles`
  ADD PRIMARY KEY (`style_id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_design`
--
ALTER TABLE `tbl_design`
  MODIFY `design_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_styles`
--
ALTER TABLE `tbl_styles`
  MODIFY `style_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
