-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 04:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Áo khoác'),
(4, 'Sweater'),
(5, 'Nón'),
(6, 'Dây chuyền'),
(7, 'Giày'),
(8, 'Dép'),
(11, 'Hoodie'),
(12, 'Vớ'),
(13, 'Đồng hồ'),
(14, 'Nhẫn'),
(15, 'Sơ mi');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `product_name`, `thumb`) VALUES
(35, 1, 'Áo Thun Trơn', '1664414131.png'),
(36, 1, 'áo Thun 2 Lớp Giả', '1664414149.png'),
(37, 1, 'Áo Thun Hình Paris', '1664414878.png'),
(38, 11, 'Áo Hoodie Hình Chó', '1664414270.png'),
(39, 11, 'Áo Hoodie Basic', '1664414289.png'),
(44, 3, 'Ao Khoac Jean', '1664415051.png'),
(45, 3, 'áo Khoác Nâu', '1664414457.png'),
(46, 3, 'Blazer', '1664414486.png'),
(47, 2, 'Quần Dài', '1664414514.png'),
(48, 2, 'Quần Jean', '1664414536.png'),
(49, 2, 'Quần Jogger', '1664414567.png'),
(52, 1, 'Áo Polo Dài Tay', '1664414634.png'),
(53, 1, 'Áo Polo Sọc', '1664414645.png'),
(54, 15, 'Sơ Mi Tay Ngắn', '1664414718.png'),
(55, 4, 'Sweater ', '1664414736.png'),
(56, 4, 'Sweater Omori', '1664415810.png'),
(57, 5, 'Nón Bucket', '1664415750.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
