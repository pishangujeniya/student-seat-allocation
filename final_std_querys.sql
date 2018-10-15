-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 08:51 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_std`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `allocation_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `choice_id` int(11) NOT NULL,
  `dead` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`allocation_id`, `std_id`, `choice_id`, `dead`) VALUES
(47, 9, 44, 0),
(48, 8, 39, 0),
(49, 27, 34, 0),
(50, 28, 50, 0),
(51, 1, 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `branch_name` text NOT NULL,
  `seats_available` int(11) NOT NULL DEFAULT '3',
  `dead` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `college_id`, `branch_name`, `seats_available`, `dead`) VALUES
(7, 1, 'Information Technology', 0, 0),
(8, 2, 'Information Technology', 3, 0),
(9, 3, 'Information Technology', 3, 0),
(10, 4, 'Information Technology', 3, 0),
(11, 5, 'Information Technology', 3, 0),
(13, 7, 'Information Technology', 3, 0),
(14, 8, 'Information Technology', 3, 0),
(15, 9, 'Information Technology', 3, 0),
(17, 11, 'Information Technology', 3, 0),
(18, 1, 'Computer Science', 3, 0),
(19, 2, 'Computer Science', 3, 0),
(20, 3, 'Computer Science', 1, 0),
(23, 6, 'Computer Science', 3, 0),
(25, 8, 'Computer Science', 3, 0),
(26, 9, 'Computer Science', 3, 0),
(27, 10, 'Computer Science', 3, 0),
(28, 11, 'Computer Science', 3, 0),
(30, 2, 'Mechanical Engineering', 3, 0),
(31, 3, 'Mechanical Engineering', 3, 0),
(32, 4, 'Mechanical Engineering', 3, 0),
(33, 5, 'Mechanical Engineering', 3, 0),
(34, 6, 'Mechanical Engineering', 3, 0),
(36, 8, 'Mechanical Engineering', 3, 0),
(37, 9, 'Mechanical Engineering', 3, 0),
(38, 10, 'Mechanical Engineering', 3, 0),
(40, 1, 'Civil Engineering', 3, 0),
(42, 3, 'Civil Engineering', 3, 0),
(43, 4, 'Civil Engineering', 3, 0),
(44, 5, 'Civil Engineering', 3, 0),
(45, 6, 'Civil Engineering', 3, 0),
(46, 7, 'Civil Engineering', 3, 0),
(48, 9, 'Civil Engineering', 3, 0),
(49, 10, 'Civil Engineering', 3, 0),
(50, 11, 'Civil Engineering', 3, 0),
(51, 1, 'Chemical Engineering', 3, 0),
(53, 3, 'Chemical Engineering', 3, 0),
(54, 4, 'Chemical Engineering', 3, 0),
(55, 5, 'Chemical Engineering', 3, 0),
(56, 6, 'Chemical Engineering', 3, 0),
(57, 7, 'Chemical Engineering', 3, 0),
(59, 9, 'Chemical Engineering', 3, 0),
(61, 11, 'Chemical Engineering', 3, 0),
(62, 1, 'Electronics Engineering', 3, 0),
(63, 2, 'Electronics Engineering', 3, 0),
(65, 4, 'Electronics Engineering', 3, 0),
(66, 5, 'Electronics Engineering', 3, 0),
(67, 6, 'Electronics Engineering', 3, 0),
(68, 7, 'Electronics Engineering', 3, 0),
(70, 9, 'Electronics Engineering', 3, 0),
(71, 10, 'Electronics Engineering', 3, 0),
(72, 11, 'Electronics Engineering', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `choice_id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `pref` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `dead` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`choice_id`, `std_id`, `pref`, `college_id`, `branch_id`, `dead`) VALUES
(29, 1, 1, 3, 20, 0),
(30, 1, 2, 7, 46, 0),
(31, 1, 3, 8, 25, 0),
(32, 1, 4, 4, 65, 0),
(33, 1, 5, 2, 63, 0),
(34, 27, 1, 1, 7, 0),
(35, 27, 2, 1, 18, 0),
(36, 27, 3, 8, 25, 0),
(37, 27, 4, 8, 14, 0),
(38, 27, 5, 5, 11, 0),
(39, 8, 1, 1, 7, 0),
(40, 8, 2, 2, 63, 0),
(41, 8, 3, 2, 19, 0),
(42, 8, 4, 2, 30, 0),
(43, 8, 5, 1, 62, 0),
(44, 9, 1, 1, 7, 0),
(45, 9, 2, 2, 19, 0),
(46, 9, 3, 2, 63, 0),
(47, 9, 4, 2, 30, 0),
(48, 9, 5, 1, 18, 0),
(49, 28, 1, 1, 7, 0),
(50, 28, 2, 3, 20, 0),
(51, 28, 3, 11, 28, 0),
(52, 28, 4, 1, 40, 0),
(53, 28, 5, 1, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_name` text NOT NULL,
  `college_city` text NOT NULL,
  `dead` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`, `college_city`, `dead`) VALUES
(1, 'DDU', 'Nadiad', 0),
(2, 'Charusat', 'Changa', 0),
(3, 'MSU', 'BARODA', 0),
(4, 'GSET', 'SURAT', 0),
(5, 'SVNIT', 'SURAT', 0),
(6, 'SVMIT', 'BHARUCH', 0),
(7, 'GEC', 'BHARUCH', 0),
(8, 'PDPU', 'GANDHINAGAR', 0),
(9, 'Sr Shroff', 'VALIYA', 0),
(10, 'Nirma', 'Ahmedabad', 0),
(11, 'GMT', 'GANDHINAGAR', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_id` int(11) NOT NULL,
  `std_name` text,
  `std_password` text NOT NULL,
  `std_rank` int(11) NOT NULL DEFAULT '-1',
  `std_marks` int(11) NOT NULL DEFAULT '0',
  `dead` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `std_name`, `std_password`, `std_rank`, `std_marks`, `dead`) VALUES
(1, 'Maulin', 'maulin', 5, 425, 0),
(8, 'Ramesh', 'ramesh', 2, 970, 0),
(9, 'Suresh', 'suresh', 1, 980, 0),
(27, 'Tapan', 'tapan', 3, 560, 0),
(28, 'Shyam', 'shyam', 4, 456, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`allocation_id`),
  ADD KEY `choice_id` (`choice_id`),
  ADD KEY `allocated_std_id` (`std_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`),
  ADD KEY `branch_college_id` (`college_id`);

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `college_id` (`college_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `choice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocation`
--
ALTER TABLE `allocation`
  ADD CONSTRAINT `allocated_std_id` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`),
  ADD CONSTRAINT `choice_id` FOREIGN KEY (`choice_id`) REFERENCES `choice` (`choice_id`);

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_college_id` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`);

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `branch_id` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`),
  ADD CONSTRAINT `college_id` FOREIGN KEY (`college_id`) REFERENCES `college` (`college_id`),
  ADD CONSTRAINT `std_id` FOREIGN KEY (`std_id`) REFERENCES `students` (`std_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
