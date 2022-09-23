-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 07:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `namitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `name`) VALUES
(1, 'Abhay_raj', '1234', 'thermo');

-- --------------------------------------------------------

--
-- Table structure for table `complaint_form_detail`
--

CREATE TABLE `complaint_form_detail` (
  `id` int(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `chassis_no` varchar(200) NOT NULL,
  `DayOfTheft` varchar(200) NOT NULL,
  `LastLocation` varchar(200) NOT NULL,
  `model_no` varchar(200) NOT NULL,
  `Date` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint_form_detail`
--

INSERT INTO `complaint_form_detail` (`id`, `username`, `chassis_no`, `DayOfTheft`, `LastLocation`, `model_no`, `Date`, `status`) VALUES
(1, 'Abhay_raj', '123456785432', '14-02-1997', 'chandigarh', 'vvw', '22-01-2021 13:06:27', 0),
(4, '', '22344', '14-02-1997', 'kanpur', 'vvw', '25-01-2021 18:12:54', 0),
(10, 'ashu@gmail.com', '123456785432', '24-12-2020', 'kanpur', 'cbz23', '29-01-2021 14:44:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(11) NOT NULL,
  `nm` varchar(20) DEFAULT NULL,
  `mob` varchar(15) DEFAULT NULL,
  `addr` varchar(50) DEFAULT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `nm`, `mob`, `addr`, `img`) VALUES
(1, 'XYZ23', '5502', 'GUJ', ''),
(2, 'ABC', '8090', 'KNP', 'bird3.jpg'),
(3, 'XYZ', '123422', 'CND', 'bird4.png'),
(5, 'Namita', '34343', 'LKO', 'bird5.jpg'),
(6, 'ABC', '8090', 'KNP', 'natr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `Date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_name`, `name`, `password`, `address`, `contact`, `gender`, `dob`, `Date`) VALUES
(1, 'Anand', '', '', 'Divyasree Greens, Ground Floor, #12/1', '3456786543', 'Male', '2021-01-23', ''),
(6, 'xyz@yahoo.com', 'ghj', '', 'dffg', '1234567890', 'Male', '2021-01-13', ''),
(7, 'ashu@gmail.com', 'qwert', '12345', 'kanpur', '00000000003456734', 'Male', '2021-01-18', '27-01-2021 17:44:12'),
(8, 'php@gmail.com', 'php', '1234', 'phpstreet noida', '1234567890', 'Male', '2021-01-29', ''),
(9, 'ccc@gmail.com', 'ccc', '12345', 'ccc noida', '0987654321', 'Male', '2021-01-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `vehicle_id` varchar(200) NOT NULL,
  `vehicle_name` varchar(200) NOT NULL,
  `chassis_no` varchar(200) NOT NULL,
  `model_no` varchar(200) NOT NULL,
  `vehicle_color` varchar(200) NOT NULL,
  `Date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`id`, `username`, `vehicle_id`, `vehicle_name`, `chassis_no`, `model_no`, `vehicle_color`, `Date`) VALUES
(1, '', 'UP 78 RT 4567', 'HERO', '234567890111', 'CT', 'GREY', ''),
(10, '', 'UP 75 TY 7890', 'DUET', '123456785432', 'HU', 'RED', ''),
(11, '', 'Up 78 Eb 9645', 'HERO', '3456789', 'cb', 'brown', ''),
(12, '', 'UP 78 RT 4567', 'DUET', '987', 'jkl', 'brown', ''),
(34, 'ashu@gmail.com', 'UP 78 RT 4567', 'HERO', '3456789', 'vvwww', 'tealred20', '30-01-2021 22:41:40'),
(35, 'ccc@gmail.com', 'UP 78 RT 4567', 'DUET', '123456785432', 'dfg', 'RED green', '29-01-2021 17:21:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaint_form_detail`
--
ALTER TABLE `complaint_form_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaint_form_detail`
--
ALTER TABLE `complaint_form_detail`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
