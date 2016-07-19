-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 04:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumini`
--

CREATE TABLE IF NOT EXISTS `alumini` (
  `faculty_id` varchar(20) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumini`
--

INSERT INTO `alumini` (`faculty_id`, `status`) VALUES
('0001', NULL),
('0002', NULL),
('0003', NULL),
('0007', NULL),
('1019', NULL),
('12334', NULL),
('1922', 'Im Awesome! :)'),
('1923', 'Im Awesome! :)'),
('sd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `username` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `faculty_id` varchar(40) NOT NULL DEFAULT '',
  `role` varchar(40) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `batch` varchar(20) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`username`, `password`, `faculty_id`, `role`, `name`, `batch`, `branch`) VALUES
('ajaykumar', 'stud1', '0001', 'student', 'Ajay Kumar R', '2012-2016', 'CSE'),
('aruntom', 'stud1', '0002', 'student', 'Arun Tom Skariah', '2012-2016', 'CSE'),
('athira', 'stud1', '0003', 'student', 'Athira Narayan', '2012-2016', 'CSE'),
('chandru', 'stud1', '0007', 'student', 'Chandirasegaran P', '2012-2016', 'CSE'),
('nirmal', 'alu1', '1019', 'alumini', 'Nirmal R', '2010-2014', 'CSE'),
('asfhkjasf', 'sdklc', '12334', 'student', 'asdfmsdaf;', '2011-2015', 'ECE'),
('gaurav', 'alu1', '1922', 'alumini', 'Gaurav Chauhan', '2010-2014', 'CSE'),
('niharika', 'alu1', '1923', 'alumini', 'B L G Niharika', '2010-2014', 'CSE'),
('su', 'pass', 'a001', 'admin', 'Mr. P. Surendiran', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `faculty_id` varchar(20) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `pno` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`faculty_id`, `age`, `pno`, `email`) VALUES
('0001', 21, '234234234', ' ajaycool@gmail.com'),
('0002', NULL, NULL, NULL),
('0003', NULL, NULL, NULL),
('0007', NULL, NULL, NULL),
('1019', NULL, NULL, NULL),
('12334', NULL, NULL, NULL),
('1922', 22, '324234234', 'gaurav@gmail.com'),
('1923', 22, '948478239', 'nikhacutie@gmail.com'),
('sd', NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
