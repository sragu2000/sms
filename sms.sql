-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 05:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeid` int(11) NOT NULL,
  `gradename` mediumtext NOT NULL,
  `payment` double NOT NULL,
  `coordinator` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gradeid`, `gradename`, `payment`, `coordinator`) VALUES
(1, 'Grade 6', 500, 'Ragu'),
(2, 'Grade 7', 600, 'Mathesh'),
(3, 'Grade 8', 800, 'Sasi');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `indexnumber` int(11) NOT NULL,
  `gradeid` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `receivedby` mediumtext NOT NULL,
  `receiveddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentid`, `indexnumber`, `gradeid`, `month`, `receivedby`, `receiveddate`) VALUES
(1, 3, 3, 1, 'm@mail.com', '2022-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `indexnumber` int(11) NOT NULL,
  `firstname` longtext NOT NULL,
  `lastname` longtext NOT NULL,
  `gradeid` int(11) NOT NULL,
  `phonenum` mediumtext NOT NULL,
  `email` longtext NOT NULL,
  `dob` date NOT NULL,
  `address` longtext NOT NULL,
  `password` longtext NOT NULL,
  `status` mediumtext NOT NULL,
  `role` mediumtext NOT NULL,
  `regDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`indexnumber`, `firstname`, `lastname`, `gradeid`, `phonenum`, `email`, `dob`, `address`, `password`, `status`, `role`, `regDate`) VALUES
(1, 'Raguraj', 'Sivanantham', 1, '0772116778', 'm@mail.com', '2000-12-20', 'Jaffna', '$2y$10$6JGbh4bNg9oixEL0Z7eER.TfA.XV334v2PDcTXojU7bLpZZw16j86', 'active', 'admin', '2022-07-29'),
(3, 'Mathesh ', 'Yogeswaran', 3, '07789876787', 'ma@mail.com', '2022-06-29', 'Jaffna', '$2y$10$m0zpn5GTZ7HxVI..KO41ruStQw.W0WILuUvwYW5D5l.5sR6ggjY0u', 'active', 'student', '2022-07-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`indexnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `indexnumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
