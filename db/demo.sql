-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2025 at 06:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ask`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_tabs`
--

CREATE TABLE `all_tabs` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_option` varchar(150) DEFAULT NULL,
  `category_name` varchar(150) DEFAULT NULL,
  `price` varchar(150) DEFAULT NULL,
  `specimen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `book_id` varchar(200) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_price` varchar(255) DEFAULT NULL,
  `book_stock` varchar(200) DEFAULT NULL,
  `book_image` varchar(255) DEFAULT NULL,
  `upload_date` varchar(255) DEFAULT NULL,
  `remarks` varchar(266) DEFAULT NULL,
  `purchase_bid` varchar(225) NOT NULL,
  `brand` varchar(225) NOT NULL,
  `hsn` varchar(225) NOT NULL,
  `color` varchar(225) NOT NULL,
  `chassis_no` varchar(225) NOT NULL,
  `motor_no` varchar(225) NOT NULL,
  `controller_no` varchar(225) NOT NULL,
  `charger_no` varchar(225) NOT NULL,
  `battery_model` varchar(225) NOT NULL,
  `battery_sn` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `brand` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `c_id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `check_credit` int(11) NOT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `due_amount` varchar(11) DEFAULT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `balance_amount` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `credit1`
--

CREATE TABLE `credit1` (
  `c_id` int(11) NOT NULL,
  `bill_id` int(11) DEFAULT NULL,
  `check_credit` int(11) NOT NULL,
  `cname` varchar(100) DEFAULT NULL,
  `date` varchar(200) DEFAULT NULL,
  `due_amount` int(11) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `balance_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `aadhar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer1`
--

CREATE TABLE `customer1` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `check_id` int(11) NOT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `c_amount` varchar(255) DEFAULT NULL,
  `r_amount` varchar(255) DEFAULT NULL,
  `mop` varchar(255) DEFAULT NULL,
  `credit_status` int(11) NOT NULL,
  `net_amount` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `brand` varchar(225) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `category_option` int(11) NOT NULL,
  `courieramt` varchar(225) DEFAULT NULL,
  `aadhar` varchar(225) DEFAULT NULL,
  `color` varchar(225) DEFAULT NULL,
  `chassis` varchar(225) DEFAULT NULL,
  `motor` varchar(225) DEFAULT NULL,
  `controller` varchar(225) DEFAULT NULL,
  `charger` varchar(225) DEFAULT NULL,
  `batterymodel` varchar(225) DEFAULT NULL,
  `batterysn` varchar(225) DEFAULT NULL,
  `cus_gst` varchar(225) NOT NULL,
  `cgst` varchar(225) NOT NULL,
  `hsn` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_type`
--

CREATE TABLE `delivery_type` (
  `id` int(11) NOT NULL,
  `delivery_type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `bid` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `brand` varchar(225) DEFAULT NULL,
  `brandid` int(11) DEFAULT NULL,
  `hsn` varchar(225) DEFAULT NULL,
  `tax` varchar(225) DEFAULT NULL,
  `total_price` varchar(225) DEFAULT NULL,
  `upload_media` varchar(255) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `check_id` int(11) NOT NULL,
  `c_amount` varchar(255) DEFAULT NULL,
  `r_amount` varchar(255) DEFAULT NULL,
  `mop` varchar(255) DEFAULT NULL,
  `credit_status` int(11) NOT NULL,
  `net_amount` varchar(255) DEFAULT NULL,
  `total` int(255) DEFAULT NULL,
  `tax` varchar(255) DEFAULT NULL,
  `discount` varchar(10) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `brand` varchar(225) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `remarks` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `category_option` int(11) NOT NULL,
  `color` varchar(225) DEFAULT NULL,
  `chassis` varchar(225) DEFAULT NULL,
  `motor` varchar(225) DEFAULT NULL,
  `controller` varchar(225) DEFAULT NULL,
  `charger` varchar(225) DEFAULT NULL,
  `batterymodel` varchar(225) DEFAULT NULL,
  `batterysn` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `minimum_book_stock`
--

CREATE TABLE `minimum_book_stock` (
  `id` int(11) NOT NULL,
  `minimum_book_stock` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `check_id` int(11) NOT NULL,
  `cname` varchar(225) DEFAULT NULL,
  `date` varchar(225) DEFAULT NULL,
  `mobile` varchar(225) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `net_amount` varchar(225) DEFAULT NULL,
  `total` varchar(225) DEFAULT NULL,
  `tax` varchar(225) DEFAULT NULL,
  `discount` varchar(225) DEFAULT NULL,
  `quantity` varchar(225) DEFAULT NULL,
  `price` varchar(225) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `remarks` varchar(225) DEFAULT NULL,
  `category_name` varchar(225) DEFAULT NULL,
  `category_option` int(11) DEFAULT NULL,
  `aadhar` varchar(225) DEFAULT NULL,
  `color` varchar(225) DEFAULT NULL,
  `chassis` varchar(225) DEFAULT NULL,
  `motor` varchar(225) DEFAULT NULL,
  `controller` varchar(225) DEFAULT NULL,
  `charger` varchar(225) DEFAULT NULL,
  `batterymodel` varchar(225) DEFAULT NULL,
  `batterysn` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `sgst` varchar(11) NOT NULL,
  `cgst` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `tax`, `discount`, `sgst`, `cgst`) VALUES
(1, 5, 0, '2.5', '2.5');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
--

CREATE TABLE `sidebar` (
  `menu_id` int(11) NOT NULL,
  `dashboard` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `expenses` int(11) NOT NULL,
  `sales` int(255) NOT NULL,
  `crm` varchar(255) DEFAULT NULL,
  `accounts` varchar(255) DEFAULT NULL,
  `procurement` varchar(255) DEFAULT NULL,
  `inventory` varchar(255) DEFAULT NULL,
  `stocks` varchar(255) DEFAULT NULL,
  `maintainance` varchar(255) DEFAULT NULL,
  `reports` varchar(255) DEFAULT NULL,
  `book` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `mobile_num` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `proof` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `sales` int(11) NOT NULL,
  `crm` int(11) NOT NULL,
  `accounts` int(11) NOT NULL,
  `inventory` int(11) NOT NULL,
  `stocks` int(11) NOT NULL,
  `reports` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `procurement` int(11) NOT NULL,
  `load1` int(11) NOT NULL,
  `sales_order` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `expenses` int(11) NOT NULL,
  `income` int(11) NOT NULL,
  `date` varchar(200) DEFAULT NULL,
  `time` varchar(200) DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  `block` int(11) NOT NULL,
  `quotation` int(11) NOT NULL,
  `enquiry` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `password`, `age`, `gender`, `mobile_num`, `city`, `email`, `pincode`, `address1`, `address2`, `remarks`, `image`, `status`, `resume`, `proof`, `role`, `sales`, `crm`, `accounts`, `inventory`, `stocks`, `reports`, `service`, `procurement`, `load1`, `sales_order`, `invoice`, `expenses`, `income`, `date`, `time`, `ipaddress`, `block`, `quotation`, `enquiry`, `customer`, `credit`) VALUES
(12, 'Admin', 'admin', '123', 25, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin.png', NULL, '', '', 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '9/12/2025', '10:33:49', '::1', 0, 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_tabs`
--
ALTER TABLE `all_tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `credit1`
--
ALTER TABLE `credit1`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer1`
--
ALTER TABLE `customer1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_type`
--
ALTER TABLE `delivery_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minimum_book_stock`
--
ALTER TABLE `minimum_book_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidebar`
--
ALTER TABLE `sidebar`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_tabs`
--
ALTER TABLE `all_tabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `credit1`
--
ALTER TABLE `credit1`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `customer1`
--
ALTER TABLE `customer1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `delivery_type`
--
ALTER TABLE `delivery_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `minimum_book_stock`
--
ALTER TABLE `minimum_book_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sidebar`
--
ALTER TABLE `sidebar`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
