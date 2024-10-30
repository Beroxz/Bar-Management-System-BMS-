-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 05:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `no` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `booking_name` varchar(100) NOT NULL,
  `person` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_phone` varchar(10) NOT NULL,
  `dateCreate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`no`, `table_id`, `booking_name`, `person`, `booking_date`, `booking_time`, `booking_phone`, `dateCreate`) VALUES
(1, 8, 'สมหมาย', 2, '2023-10-25', '16:21:00', '0987764533', '2023-10-25 22:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mem_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `mem_level` int(11) NOT NULL,
  `mem_name` varchar(50) NOT NULL,
  `mem_username` varchar(20) NOT NULL,
  `mem_password` varchar(100) NOT NULL,
  `mem_img` varchar(200) NOT NULL,
  `dateinsert` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `mem_level`, `mem_name`, `mem_username`, `mem_password`, `mem_img`, `dateinsert`) VALUES
(001, 1, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '203842661320230918_204331.png', '2019-09-04 03:40:46'),
(029, 2, 'staff', 'staff', '8effee409c625e1a2d8f5033631840e6ce1dcb64', '62773583020230920_231504.png', '2023-09-18 13:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `mem_id` int(11) NOT NULL,
  `receive_name` varchar(100) NOT NULL COMMENT 'ชื่อผู้รับ',
  `order_status` int(1) NOT NULL,
  `b_name` varchar(100) DEFAULT NULL COMMENT 'ชื่อธนาคาร',
  `pay_amount` float(10,2) DEFAULT NULL,
  `pay_amount2` float(10,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `mem_id`, `receive_name`, `order_status`, `b_name`, `pay_amount`, `pay_amount2`, `order_date`) VALUES
(0001, 29, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 60.00, 60.00, '2023-10-25 20:35:42'),
(0002, 29, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 90.00, 90.00, '2023-10-25 20:36:10'),
(0003, 29, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 60.00, 60.00, '2023-10-25 21:45:29'),
(0004, 29, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 340.00, 340.00, '2023-10-25 21:45:56'),
(0005, 29, 'ลูกค้าหน้าร้าน', 1, 'ชำระหน้าร้าน', 160.00, 160.00, '2023-10-25 21:47:57'),
(0006, 29, 'ลูกค้าหน้าร้าน', 1, 'ชำระหน้าร้าน', 160.00, 160.00, '2023-10-25 21:50:54'),
(0007, 29, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 30.00, 30.00, '2023-10-25 21:54:37'),
(0008, 29, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 5520.00, 5520.00, '2023-10-25 22:14:34'),
(0009, 29, 'ลูกค้าหน้าร้าน', 4, 'ชำระหน้าร้าน', 60.00, 60.00, '2023-10-25 22:50:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(10) NOT NULL,
  `order_id` int(11) NOT NULL COMMENT 'tbl_order',
  `p_id` int(11) NOT NULL COMMENT 'tbl_product',
  `p_c_qty` int(11) NOT NULL COMMENT 'product qty',
  `total` float NOT NULL COMMENT 'product x qty'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `order_id`, `p_id`, `p_c_qty`, `total`) VALUES
(1, 1, 15, 1, 30),
(2, 1, 16, 1, 30),
(3, 2, 15, 1, 30),
(4, 2, 16, 1, 30),
(5, 2, 18, 1, 30),
(6, 3, 15, 1, 30),
(7, 3, 16, 1, 30),
(8, 4, 16, 1, 30),
(9, 4, 18, 1, 30),
(10, 4, 14, 1, 150),
(11, 4, 13, 1, 130),
(12, 5, 15, 1, 30),
(13, 5, 13, 1, 130),
(14, 6, 15, 1, 30),
(15, 6, 13, 1, 130),
(16, 7, 18, 1, 30),
(17, 8, 12, 46, 5520),
(18, 9, 16, 1, 30),
(19, 9, 18, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `p_price` float(10,2) NOT NULL,
  `p_qty` int(10) NOT NULL,
  `p_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p_date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `p_name`, `type_id`, `p_price`, `p_qty`, `p_img`, `p_date_save`) VALUES
(11, 'เบียร์ช้าง', 1, 120.00, 50, '115096654520230924_191600.jpg', '2023-09-24 12:16:00'),
(12, 'เบียร์ลีโอ', 1, 120.00, 0, '116176545520230924_191628.jpg', '2023-09-24 12:16:28'),
(13, 'เบียร์สิงห์', 1, 130.00, 43, '165766413520230924_191644.jpg', '2023-09-24 12:16:44'),
(14, 'เบียร์ไฮเนเก้น', 1, 150.00, 48, '77746663520230924_191709.png', '2023-09-24 12:17:09'),
(15, 'เลย์รสบาบีคิว', 2, 30.00, 0, '20100431620230924_191724.jpg', '2023-09-24 12:17:24'),
(16, 'เลย์รสสไปซี่', 2, 30.00, 18, '33685931420231009_161548.jpg', '2023-09-24 12:17:42'),
(18, 'เลย์รสดั้งเดิม', 2, 30.00, 38, '51819039420230924_191822.jpg', '2023-09-24 12:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_table`
--

CREATE TABLE `tbl_table` (
  `table_id` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `table_status` int(1) NOT NULL DEFAULT 0 COMMENT '0 =ว่าง , 1 = จอง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_table`
--

INSERT INTO `tbl_table` (`table_id`, `table_name`, `table_status`) VALUES
(1, 'A01', 0),
(2, 'A02', 0),
(3, 'A03', 0),
(4, 'A04', 0),
(5, 'A05', 0),
(6, 'B01', 0),
(7, 'B02', 0),
(8, 'B03', 1),
(9, 'B04', 0),
(10, 'B05', 0),
(11, 'C01', 0),
(12, 'C02', 0),
(13, 'C03', 0),
(14, 'C04', 0),
(15, 'C05', 0),
(16, 'D01', 0),
(17, 'D02', 0),
(18, 'D03', 0),
(19, 'D04', 0),
(20, 'D05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'เครื่องดื่ม'),
(2, 'ของทานเล่น');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_table`
--
ALTER TABLE `tbl_table`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mem_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_table`
--
ALTER TABLE `tbl_table`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
