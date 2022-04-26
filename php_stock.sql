-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 26, 2022 at 10:59 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_location` varchar(100) NOT NULL,
  `branch_manager` varchar(50) NOT NULL,
  `branch_phone` varchar(20) NOT NULL,
  `branch_email` varchar(50) DEFAULT NULL,
  `branch_status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_location`, `branch_manager`, `branch_phone`, `branch_email`, `branch_status`) VALUES
(8, 'Dhanmondi', 'Dhanmondi 32 Road Bridge, Dhanmondi Bridge, Dhaka', 'Aslam Ahamde', '01823039800', 'info@stock.com', 1),
(9, 'Mirpur', 'Mirpur 10 Bus Stand, মিরপুর ১০ নং গোলচত্বর, Dhaka', 'Salim Ahmad', '01711125323', 'info@stock.com', 1),
(10, 'Kawran Bazar', 'Kawran Bazar Bus Stop, Kazi Nazrul Islam Avenue, Dhaka', 'Amit Choudhori', '01713061459', 'info@stock.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int NOT NULL,
  `company_branch` int NOT NULL,
  `company_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company_phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `company_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `company_address` text,
  `company_manager` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_branch`, `company_name`, `company_phone`, `company_email`, `company_address`, `company_manager`) VALUES
(19, 9, 'Start Tech', '01355485684', 'starttech@gmail.com', 'Abu Rayhan', 'multiplan, Elephan Road'),
(20, 9, 'Ryans Computers', '01854512475', 'ryanscomputers@gmail.com', 'Robin Ahmad', 'multiplan, Elephan Road'),
(21, 8, 'Computer City Technologies Ltd', '01938-858800', 'computercity@gmail.com', 'Asikur Raham', '75 Laboratory Rd, Dhaka 1205'),
(22, 10, 'Touch It', '01928-028742', 'touchit@gmail.com', 'Asik Bhuiyan', 'multiplan, Elephan Road');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int NOT NULL,
  `customer_branch` int NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` text,
  `customer_phone` varchar(20) NOT NULL,
  `customer_status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_branch`, `customer_name`, `customer_address`, `customer_phone`, `customer_status`) VALUES
(3, 8, 'Talon Orr', 'Id unde beatae volu', '+1 (236) 234-6616', 1),
(4, 9, 'Jada Howard', 'Maiores incidunt el', '+1 (744) 851-2559', 1),
(6, 10, 'Dexter Guerrero', 'Quae vitae qui liber', '+1 (805) 365-8386', 1),
(7, 9, 'Lee Cunningham', 'Kakoli', '+1 (156) 324-1045', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `em_id` int NOT NULL,
  `em_branch` varchar(10) DEFAULT NULL,
  `em_designation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `em_name` varchar(50) NOT NULL,
  `em_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `em_nid` int DEFAULT NULL,
  `em_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `em_email` varchar(50) NOT NULL,
  `em_join_date` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `em_salary` int DEFAULT NULL,
  `em_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `em_status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`em_id`, `em_branch`, `em_designation`, `em_name`, `em_address`, `em_nid`, `em_phone`, `em_email`, `em_join_date`, `em_salary`, `em_password`, `em_status`) VALUES
(48, '9', 'manager', 'Mirpur Admin', NULL, NULL, '01835061968', 'admin@mail.com', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(52, '8', 'Eum mollit proident', 'Alisa Whitfield', 'Et culpa temporibus', 9, '+1 (821) 806-6234', 'wojiwuzid@mailinator.com', '2016-11-18', 76, '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(53, '10', 'user', 'Camille Gibson', 'Accusamus velit dolo', 30, '01303132067', 'user@mail.com', '2000-01-18', 88, '5f4dcc3b5aa765d61d8327deb882cf99', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int NOT NULL,
  `product_branch` int NOT NULL,
  `product_barcode` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text,
  `product_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_size` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `product_cost` int NOT NULL,
  `product_sell` int NOT NULL,
  `product_quantity` int NOT NULL,
  `product_status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_branch`, `product_barcode`, `product_name`, `product_description`, `product_type`, `product_size`, `product_cost`, `product_sell`, `product_quantity`, `product_status`) VALUES
(11, 9, '202201', 'Logitech K120', '\r\nThe latest price of Logitech K120 Usb Keyboard With Bangla Black in Bangladesh is 600৳. You can buy the Logitech K120 Usb Keyboard With Bangla Black at best price from our website or visit any of our showrooms.', 'accessories', 'no-size', 500, 600, 2030, 1),
(12, 9, '202202', 'Gamdias ZEUS E2 RGB', 'Multi-color lighting Multi-color breathing lighting.6 smart key6 keys for strategic assignment.3200 DPI 3200 DPI for pixel perfect accuracy.MOUSE MAT Dimension(LxWxH) 240 x 180 x 3 mm.3 million click (Lifecycle)Heavy-duty 3 million click lifecycle.Double-layer fabrics Double-layer fabrics provide uniformly vertical and horizontal movement resistance', 'accessories', 'no-size', 950, 1100, 30, 1),
(13, 9, '202203', 'Logitech C270 HD Webcam', 'HD video calling (1280 x 720 pixels)\r\nUp to 3.0 megapixels (software enhanced)\r\nBuilt-in mic with Logitech RightSound™ technology\r\nWorks with Skype, Windows Live, AOL® &Yahoo! Messenger\r\nUSB Connector', 'accessories', 'no-size', 2500, 2800, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_details`
--

CREATE TABLE `tbl_purchase_details` (
  `pd_id` int NOT NULL,
  `pd_date` varchar(100) NOT NULL,
  `pd_invoice` varchar(50) NOT NULL,
  `pd_branch` int NOT NULL,
  `pd_company` int NOT NULL,
  `pd_product_barcode` int NOT NULL,
  `pd_product_price` int NOT NULL,
  `pd_quantity` int NOT NULL,
  `pd_total_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_purchase_details`
--

INSERT INTO `tbl_purchase_details` (`pd_id`, `pd_date`, `pd_invoice`, `pd_branch`, `pd_company`, `pd_product_barcode`, `pd_product_price`, `pd_quantity`, `pd_total_price`) VALUES
(40, '2022-04-26', '12', 9, 19, 202202, 950, 25, 23750),
(41, '2022-04-27', '1010', 9, 19, 202202, 950, 50, 47500),
(42, '2022-04-27', '1010', 9, 19, 202202, 950, 500, 475000),
(43, '2022-04-27', '101002', 9, 19, 202202, 950, 1000, 950000),
(44, '2022-04-27', '1020', 9, 19, 202201, 500, 2000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_summary`
--

CREATE TABLE `tbl_purchase_summary` (
  `ps_id` int NOT NULL,
  `ps_purchase_date` varchar(100) NOT NULL,
  `ps_invoice` int NOT NULL,
  `ps_branch` int NOT NULL,
  `ps_company` int NOT NULL,
  `ps_total_quantity` int NOT NULL,
  `ps_total_price` int NOT NULL,
  `ps_discount` int NOT NULL,
  `ps_net_amount` int NOT NULL,
  `ps_payment` int NOT NULL,
  `ps_due_amount` int NOT NULL,
  `ps_employee` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales_details`
--

CREATE TABLE `tbl_sales_details` (
  `sale__id` int NOT NULL,
  `sale_date` varchar(50) NOT NULL,
  `sale_branch` int NOT NULL,
  `sale_customer` int NOT NULL,
  `sale_invoice` int NOT NULL,
  `sale_barcode` int NOT NULL,
  `sale_price` int NOT NULL,
  `sale_quantity` int NOT NULL,
  `sale_total_price` int NOT NULL,
  `sale_discount_amount` int NOT NULL,
  `sale_net_amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `tbl_purchase_summary`
--
ALTER TABLE `tbl_purchase_summary`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  ADD PRIMARY KEY (`sale__id`),
  ADD UNIQUE KEY `sale_barcode` (`sale_barcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `em_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  MODIFY `pd_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_purchase_summary`
--
ALTER TABLE `tbl_purchase_summary`
  MODIFY `ps_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sales_details`
--
ALTER TABLE `tbl_sales_details`
  MODIFY `sale__id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
