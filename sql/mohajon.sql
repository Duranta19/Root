-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2022 at 07:36 PM
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
-- Database: `mohajon`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `pass` varchar(24) DEFAULT NULL,
  `catagory` varchar(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(24) DEFAULT NULL,
  `phnNum` varchar(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `createDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `pass`, `catagory`, `name`, `address`, `phnNum`, `gender`, `createDate`) VALUES
(1, 'akamal11', '1111', 'Farmer', 'Abdul Kamal', '145,Khulna', '01894578265', 'Male', '2022-08-19'),
(2, 'mss14', '1112', 'Distributor', 'Md Salam', '15,Khulna', '01866578265', 'Male', '2022-08-19'),
(3, 'mkm22', '1113', 'Retailer', 'Md Kalam', '1215,Dhaka', '0178678265', 'Male', '2022-08-19'),
(4, 'admin', 'admin', 'Admin', NULL, NULL, NULL, NULL, '2022-08-19'),
(5, 'jml6', '1114', 'Farmer', 'Jamal', 'rtd456', '0184579522', 'Male', '2022-08-20'),
(6, 'kaswn90', '1114', 'Retailer', 'Kaswn Mia', '145,kj', '01147144577', 'male', '2022-08-25'),
(7, 'raj56', '1115', 'Distributor', 'Mr. Rajib', '546,Jamalpur', '01478596', 'male', '2022-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `demand`
--

CREATE TABLE `demand` (
  `product_name` varchar(25) NOT NULL,
  `demand` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demand`
--

INSERT INTO `demand` (`product_name`, `demand`) VALUES
('Lentils', 1000),
('Onions', 1000),
('Potato', 700),
('Rice', 1500),
('Wheat', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `d_sl` int(11) NOT NULL,
  `id` int(10) NOT NULL,
  `product_name` varchar(25) NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `sold` int(11) NOT NULL,
  `unsold` int(11) NOT NULL,
  `buing_price` int(10) NOT NULL,
  `selling_price` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`d_sl`, `id`, `product_name`, `quantity`, `sold`, `unsold`, `buing_price`, `selling_price`) VALUES
(14, 2, 'Rice', 150, 50, 100, 17, 100),
(15, 2, 'Onions', 100, 50, 50, 25, 80),
(16, 2, 'Rice', 150, 0, 150, 25, 23),
(17, 2, 'Rice', 50, 0, 50, 17, 23),
(18, 7, 'Onions', 250, 0, 250, 25, 45),
(19, 2, 'Lentils', 50, 0, 50, 45, 0),
(20, 2, 'Onions', 400, 0, 400, 25, 35),
(21, 2, 'Potato', 10, 0, 10, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dsell_rbuy`
--

CREATE TABLE `dsell_rbuy` (
  `sl` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `r_id` int(11) NOT NULL,
  `p_name` varchar(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `tprice` int(10) NOT NULL,
  `t_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsell_rbuy`
--

INSERT INTO `dsell_rbuy` (`sl`, `d_id`, `r_id`, `p_name`, `amount`, `tprice`, `t_id`) VALUES
(1, 2, 3, 'Rice', 20, 500, 45789),
(2, 2, 3, 'Onions', 50, 1750, 78459),
(3, 2, 3, 'Rice', 30, 3000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `sl` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `quantity` double NOT NULL,
  `price` double NOT NULL,
  `sold` int(10) NOT NULL DEFAULT 0,
  `unsold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`sl`, `id`, `product`, `quantity`, `price`, `sold`, `unsold`) VALUES
(1, 1, 'Rice', 250, 25, 300, -100),
(17, 1, 'Wheat', 480, 20, 200, 200),
(18, 5, 'Onions', 550, 25, 550, 0),
(21, 1, 'Lentils', 800, 45, 300, 500),
(22, 1, 'Rice', 800, 17, 200, 600),
(24, 1, 'Onions', 1200, 25, 400, 800),
(25, 5, 'Potato', 450, 12, 10, 440);

-- --------------------------------------------------------

--
-- Table structure for table `fsell_dbuy`
--

CREATE TABLE `fsell_dbuy` (
  `sl` int(10) NOT NULL,
  `f_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `p_name` varchar(10) NOT NULL,
  `ammount` int(10) NOT NULL,
  `tprice` int(10) NOT NULL,
  `t_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fsell_dbuy`
--

INSERT INTO `fsell_dbuy` (`sl`, `f_id`, `d_id`, `p_name`, `ammount`, `tprice`, `t_id`) VALUES
(5, 1, 2, 'Rice', 150, 2550, 784568),
(6, 5, 2, 'Onions', 100, 2500, 85461248),
(7, 1, 2, 'Rice', 150, 3750, 687732585),
(8, 1, 2, 'Rice', 50, 850, 583984318),
(9, 5, 7, 'Onions', 250, 6250, 621844529),
(10, 1, 2, 'Lentils', 50, 2250, 274851546),
(11, 1, 2, 'Onions', 400, 10000, 272686651),
(12, 5, 2, 'Potato', 10, 120, 47941517);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `phn_num` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`phn_num`, `pin`, `balance`) VALUES
(16, 6666, 1000000),
(17, 7777, 1000000),
(18, 8888, 1000000),
(19, 9999, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `retailer`
--

CREATE TABLE `retailer` (
  `r_sl` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `product_name` varchar(25) NOT NULL,
  `quantity` int(10) NOT NULL,
  `buing_price` int(10) NOT NULL,
  `selling_price` int(10) NOT NULL,
  `trnx_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `retailer`
--

INSERT INTO `retailer` (`r_sl`, `id`, `product_name`, `quantity`, `buing_price`, `selling_price`, `trnx_id`) VALUES
(6, 3, 'Rice', 20, 25, 35, 0),
(7, 3, 'Onions', 50, 35, 55, 0),
(8, 3, 'Rice', 30, 100, 45, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `demand`
--
ALTER TABLE `demand`
  ADD PRIMARY KEY (`product_name`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`d_sl`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `dsell_rbuy`
--
ALTER TABLE `dsell_rbuy`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `fsell_dbuy`
--
ALTER TABLE `fsell_dbuy`
  ADD PRIMARY KEY (`sl`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `retailer`
--
ALTER TABLE `retailer`
  ADD PRIMARY KEY (`r_sl`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `d_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dsell_rbuy`
--
ALTER TABLE `dsell_rbuy`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `fsell_dbuy`
--
ALTER TABLE `fsell_dbuy`
  MODIFY `sl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `retailer`
--
ALTER TABLE `retailer`
  MODIFY `r_sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `distributor_ibfk_1` FOREIGN KEY (`id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `farmer`
--
ALTER TABLE `farmer`
  ADD CONSTRAINT `farmer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `fsell_dbuy`
--
ALTER TABLE `fsell_dbuy`
  ADD CONSTRAINT `fsell_dbuy_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `fsell_dbuy_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `retailer`
--
ALTER TABLE `retailer`
  ADD CONSTRAINT `retailer_ibfk_1` FOREIGN KEY (`id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
