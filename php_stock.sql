-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2022 at 10:03 PM
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
(4, 'Dhanmondi', 'Shukrabad', 'Asik Bhuiyan', '01458756854', 'dhanmondi@gmail.com', 1),
(5, 'Mirpur', 'Kazipara', 'Salim Ahmad', '01458756854', 'mirpur@gmail.com', 1),
(6, 'Firmgate', 'Firmgate', 'Robin Ahmad', '01458756854', 'firmgate@gmail.com', 1);

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
(14, 5, 'Knox Meyers Inc', '0164654643', 'kypahux@mailinator.com', 'Wong Moreno', 'Soto and Miles Plc');

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
(3, 4, 'Talon Orr', 'Id unde beatae volu', '+1 (236) 234-6616', 1),
(4, 5, 'Jada Howard', 'Maiores incidunt el', '+1 (744) 851-2559', 1),
(6, 4, 'Dexter Guerrero', 'Quae vitae qui liber', '+1 (805) 365-8386', 1);

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
(48, '5', 'manager', 'Admin', NULL, NULL, '01835061968', 'admin@mail.com', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(52, '6', 'Eum mollit proident', 'Alisa Whitfield', 'Et culpa temporibus', 9, '+1 (821) 806-6234', 'wojiwuzid@mailinator.com', '2016-11-18', 76, '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(53, '4', 'user', 'Camille Gibson', 'Accusamus velit dolo', 30, '01303132067', 'user@mail.com', '2000-01-18', 88, '5f4dcc3b5aa765d61d8327deb882cf99', 1);

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
(1, 5, '21547854', 'Headphone', 'Fantech Headphone', 'gaming', 'larage', 500, 700, 20, 1),
(2, 4, '58', 'Sophia Norman', 'Fugit consectetur ', 'gadget', 'small', 35, 32, 100, 1),
(4, 6, '6', 'Lillith Simpson', 'Culpa quia accusamus', 'security', 'medium', 36, 81, 314, 1),
(5, 4, '8', 'Justin Williams', 'In nisi tempora aut ', 'components', 'large', 18, 1, 39, 1),
(6, 4, '28', 'Farrah Sweet', 'Amet et qui nostrum', 'gadget', 'small', 71, 37, 711, 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `em_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
