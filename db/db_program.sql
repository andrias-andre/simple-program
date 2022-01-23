-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 03:24 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_program`
--

-- --------------------------------------------------------

--
-- Table structure for table `companys`
--

CREATE TABLE `companys` (
  `id_company` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `telp` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `user_created` varchar(50) NOT NULL,
  `date_edited` datetime NOT NULL,
  `user_edited` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companys`
--

INSERT INTO `companys` (`id_company`, `code`, `name`, `address`, `telp`, `mobile`, `email`, `contact`, `date_created`, `user_created`, `date_edited`, `user_edited`) VALUES
(1, 'ACC-1', 'PT. MAJU JAYA', 'JL CIKINI NO 1 JAKARTA PUSAT', '021-12345678', '08987654321', 'marketing@majujaya.com', 'FRANS', '2022-01-23 05:15:45', 'administrator', '2022-01-23 13:40:45', 'administrator'),
(3, 'ACC-2', 'PT. SARANA ANAK NUSANTARA', 'JL. Radio Dalam No IV Jakarta', '021-321654987', '081122334455', 'marketing@nusantra. com', 'TRI', '2022-01-23 05:21:56', 'administrator', '2022-01-23 13:46:39', 'administrator'),
(4, 'ACC-3', 'PT ABC ALPHABETH', 'JL Angkasa Raya No. 15', '021-9876543', '081144556677', 'sales@abcalphabeth.com', 'RENDY', '2022-01-23 21:08:36', 'administrator', '2022-01-23 21:09:00', 'administrator'),
(5, 'ACC-4', 'PT JINGGA WARNA', 'JL. Jelantik Putih No 11 Jakarta', '021-65432198', '081553322111', 'salesmarketing@jinggawarna.com', 'NITA', '2022-01-23 21:10:49', 'administrator', '2022-01-23 21:11:03', 'administrator'),
(6, 'ACC-5', 'CV MAKMUR SENTOSA', 'JL Merpati No 18 Jakarta', '021-987123456', '081334455667', 'team@makmursentosa.com', 'TIARA', '2022-01-23 21:13:45', 'administrator', '2022-01-23 21:14:02', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `selling_price` float NOT NULL,
  `buying_price` float NOT NULL,
  `date_created` datetime NOT NULL,
  `user_created` varchar(50) NOT NULL,
  `date_edited` datetime DEFAULT NULL,
  `user_edited` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `code`, `name`, `selling_price`, `buying_price`, `date_created`, `user_created`, `date_edited`, `user_edited`) VALUES
(1, 'PRODUCT-1', 'LAPTOP ASUS', 15000000, 14000000, '2022-01-23 03:31:58', 'administrator', '2022-01-23 11:13:33', 'administrator'),
(5, 'PRODUCT-2', 'SSD 512 GB', 1500000, 1200000, '2022-01-23 05:06:25', 'administrator', '2022-01-23 11:14:11', 'administrator'),
(6, 'PRODUCT-3', 'PRINTER EPSON', 2800000, 2500000, '2022-01-23 11:14:54', 'administrator', NULL, ''),
(7, 'PRODUCT-4', 'CAMERA', 11000000, 10000000, '2022-01-23 21:03:59', 'administrator', NULL, ''),
(8, 'PRODUCT-5', 'DDR 4 MEMORY 8 GB', 800000, 700000, '2022-01-23 21:05:45', 'administrator', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id_report` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `docno_transaction` varchar(50) NOT NULL,
  `date_transaction` datetime NOT NULL,
  `type_transaction` varchar(50) NOT NULL,
  `code_product` varchar(50) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `code_company` varchar(50) NOT NULL,
  `name_company` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` float NOT NULL,
  `gross` float NOT NULL,
  `discount` int(11) NOT NULL,
  `tax` varchar(50) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` int(11) NOT NULL,
  `docno_transaction` varchar(50) NOT NULL,
  `date_transaction` date NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `rate` float NOT NULL,
  `gross` float NOT NULL,
  `type_transaction` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `user_created` varchar(50) NOT NULL,
  `date_edited` datetime DEFAULT NULL,
  `user_edited` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_transaction`, `docno_transaction`, `date_transaction`, `id_product`, `id_company`, `qty`, `rate`, `gross`, `type_transaction`, `date_created`, `user_created`, `date_edited`, `user_edited`) VALUES
(2, 'TRANS-2', '2022-01-23', 1, 1, 5, 14000000, 70000000, 'Purchase Order', '2022-01-23 13:47:10', 'administrator', NULL, ''),
(3, 'TRANS-3', '2022-01-23', 5, 1, 5, 1500000, 7500000, 'Sales Order', '2022-01-23 20:46:48', 'administrator', NULL, ''),
(4, 'TRANS-4', '2022-01-23', 5, 1, 5, 1500000, 7500000, 'Sales Order', '2022-01-23 21:15:00', 'administrator', NULL, ''),
(5, 'TRANS-5', '2022-01-23', 7, 3, 2, 11000000, 22000000, 'Sales Order', '2022-01-23 21:16:12', 'administrator', NULL, ''),
(6, 'TRANS-6', '2022-01-23', 6, 5, 1, 2500000, 2500000, 'Return Purchase Order', '2022-01-23 21:16:35', 'administrator', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `type`, `last_login`) VALUES
('administrator', '$2y$10$KNeYb.Kc1DgvhakFbVjIPOW7ByIT4j5NxsLZ7YzM/T6bDVrkAshQq', 'Administrator', '2022-01-22 18:49:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companys`
--
ALTER TABLE `companys`
  ADD PRIMARY KEY (`id_company`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_company` (`id_company`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companys`
--
ALTER TABLE `companys`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `companys` (`id_company`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
