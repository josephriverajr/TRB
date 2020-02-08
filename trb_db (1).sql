-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2020 at 05:27 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `inspected`
--

CREATE TABLE `inspected` (
  `userid` int(11) NOT NULL,
  `toda_no` varchar(225) NOT NULL,
  `toda` varchar(255) NOT NULL,
  `inspector` varchar(225) NOT NULL,
  `ins_date` text NOT NULL,
  `status` int(6) NOT NULL,
  `seen_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspected`
--

INSERT INTO `inspected` (`userid`, `toda_no`, `toda`, `inspector`, `ins_date`, `status`, `seen_status`) VALUES
(1, '1', 'F.Roman', 'admin2@email.com', '2020-02-06 20:17:43', 0, 0),
(2, '2', 'F.Roman', 'admin2@email.com', '2020-02-06 20:21:05', 0, 0),
(3, '5', 'F.Roman', 'admin2@email.com', '2020-02-08 21:46:27', 0, 0),
(4, '213', '123', '123', '', 0, 0),
(5, '1', 'Toda', 'admin2@email.com', '2020-02-08 22:51:02', 0, 0),
(6, '2', 'g', 'admin2@email.com', '2020-02-08 22:51:28', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `new_user`
--

CREATE TABLE `new_user` (
  `new_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `seen_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_user`
--

INSERT INTO `new_user` (`new_id`, `username`, `fname`, `lname`, `seen_status`) VALUES
(1, 'test', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `or_payments`
--

CREATE TABLE `or_payments` (
  `id_payment` int(6) NOT NULL,
  `id_no` int(6) NOT NULL,
  `reg_fee` int(6) NOT NULL,
  `mch` int(6) NOT NULL,
  `reg_sticker` int(6) NOT NULL,
  `petition` int(6) NOT NULL,
  `confirmation` int(6) NOT NULL,
  `inspection` int(6) NOT NULL,
  `supervision` int(6) NOT NULL,
  `fare_sticker` int(6) NOT NULL,
  `plate_sticker` int(6) NOT NULL,
  `others` text NOT NULL,
  `total_amount` text NOT NULL,
  `sticker_no` text NOT NULL,
  `or_date` text NOT NULL,
  `seen_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `or_payments`
--

INSERT INTO `or_payments` (`id_payment`, `id_no`, `reg_fee`, `mch`, `reg_sticker`, `petition`, `confirmation`, `inspection`, `supervision`, `fare_sticker`, `plate_sticker`, `others`, `total_amount`, `sticker_no`, `or_date`, `seen_status`) VALUES
(1, 1, 150, 100, 0, 0, 0, 0, 0, 0, 100, '1', '350', '1', '2020-02-09 00:15:30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tricycle_operator`
--

CREATE TABLE `tricycle_operator` (
  `id_no` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `house_no` varchar(25) NOT NULL,
  `street` varchar(25) NOT NULL,
  `barangay` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `case_no` varchar(25) NOT NULL,
  `toda` varchar(25) NOT NULL,
  `toda_no` smallint(6) NOT NULL,
  `make` varchar(25) NOT NULL,
  `motor_no` varchar(25) NOT NULL,
  `chasis_no` varchar(25) NOT NULL,
  `plate_no` varchar(25) NOT NULL,
  `date` varchar(25) NOT NULL,
  `unit` smallint(6) NOT NULL,
  `status` int(6) NOT NULL,
  `seen_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tricycle_operator`
--

INSERT INTO `tricycle_operator` (`id_no`, `first_name`, `middle_name`, `last_name`, `house_no`, `street`, `barangay`, `city`, `case_no`, `toda`, `toda_no`, `make`, `motor_no`, `chasis_no`, `plate_no`, `date`, `unit`, `status`, `seen_status`) VALUES
(1, '12313', '12312', '3123123', '12312', '1231', '31231', '31231', '123', '123', 213, '31231', '31231', '3131', '1', '2020-02-09 00:15:06', 1, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `phone_no` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `isAdmin` tinyint(4) NOT NULL,
  `isBlocked` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `verified` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `first_name`, `last_name`, `phone_no`, `username`, `password`, `isAdmin`, `isBlocked`, `active`, `deleted`, `verified`) VALUES
(1, 'Andrea', 'Milaor', '09215595342', 'admin1@email.com', 'password', 1, 0, 1, 0, 1),
(37, 'TRB', 'Personel', '09215595340', 'inspector@email.com', 'password', 2, 0, 1, 0, 1),
(38, 'Admin TRB', 'Admin nila abra', '09090909', 'admin2@email.com', 'password', 3, 0, 1, 0, 1),
(39, 'treasury', 'treasury', '', 'treasury@email.com', 'password', 0, 0, 1, 0, 1),
(40, 'atty', 'atyy', '', 'atty@email.com', 'password', 4, 0, 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inspected`
--
ALTER TABLE `inspected`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `new_user`
--
ALTER TABLE `new_user`
  ADD PRIMARY KEY (`new_id`);

--
-- Indexes for table `or_payments`
--
ALTER TABLE `or_payments`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_no` (`id_no`);

--
-- Indexes for table `tricycle_operator`
--
ALTER TABLE `tricycle_operator`
  ADD PRIMARY KEY (`id_no`),
  ADD UNIQUE KEY `case_no` (`case_no`),
  ADD UNIQUE KEY `motor_no` (`motor_no`),
  ADD UNIQUE KEY `chasis_no` (`chasis_no`),
  ADD UNIQUE KEY `plate_no` (`plate_no`),
  ADD UNIQUE KEY `case_no_2` (`case_no`),
  ADD UNIQUE KEY `case_no_3` (`case_no`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inspected`
--
ALTER TABLE `inspected`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `new_user`
--
ALTER TABLE `new_user`
  MODIFY `new_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `or_payments`
--
ALTER TABLE `or_payments`
  MODIFY `id_payment` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tricycle_operator`
--
ALTER TABLE `tricycle_operator`
  MODIFY `id_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `or_payments`
--
ALTER TABLE `or_payments`
  ADD CONSTRAINT `or_payments_ibfk_1` FOREIGN KEY (`id_no`) REFERENCES `tricycle_operator` (`id_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
