-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2019 at 06:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendancedbfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_list`
--

CREATE TABLE `access_list` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `rfid_code` varchar(20) NOT NULL,
  `pin` char(6) NOT NULL,
  `sms_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `access_log`
--

CREATE TABLE `access_log` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `userIP` varchar(255) NOT NULL,
  `date_` date NOT NULL,
  `Checkin_datetime` varchar(300) NOT NULL,
  `Checkout_datetime` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Username`, `user_password`) VALUES
(1, 'Ashok', '123456'),
(3, 'Chandan', '123456'),
(4, 'Pravin', '123456'),
(5, 'Kunal', '123456'),
(6, 'Divya ', '123456'),
(7, 'Numaan', '123456'),
(8, 'Kavita ', '123456'),
(9, 'Justin', '123456'),
(10, 'Saurabh', '123456'),
(11, 'Anurag', '123456'),
(12, 'Uzair ', '123456'),
(13, 'Nikita', '123456'),
(14, 'Karan', '123456'),
(15, 'Shubham', '123456'),
(16, 'Amesh', '123456'),
(17, 'Prasad', '123456'),
(18, 'Vaishnavi', '123456'),
(19, 'Hiren', '123456'),
(20, 'Mohit ', '123456'),
(21, 'Mohite', '123456'),
(22, 'Sagar ', '123456'),
(23, 'Rizwan', '123456'),
(24, 'jeremy', '123456'),
(25, 'Palak', '123456'),
(26, 'Aniket ', '123456'),
(45, 'palak123', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_list`
--
ALTER TABLE `access_list`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `rfid_code` (`rfid_code`),
  ADD UNIQUE KEY `image` (`image`);

--
-- Indexes for table `access_log`
--
ALTER TABLE `access_log`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_list`
--
ALTER TABLE `access_list`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `access_log`
--
ALTER TABLE `access_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
