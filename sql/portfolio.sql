-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 02:24 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tblexam`
--

CREATE TABLE `tblexam` (
  `exam_type` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblexam`
--

INSERT INTO `tblexam` (`exam_type`, `subjectcode`, `exam_date`, `exam_time`) VALUES
('1st_term', '003', '2019-12-04', '13:00:00.000'),
('1st_term', '007', '2019-12-05', '13:00:00.000'),
('1st_term', '124', '2019-12-06', '13:00:00.000'),
('1st_term', '126', '2019-12-08', '13:00:00.000'),
('1st_term', '130', '2019-12-09', '13:00:00.000');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `username` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL,
  `marks` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roll` int(10) NOT NULL,
  `class` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `parent` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `shift` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`name`, `gender`, `username`, `password`, `roll`, `class`, `stream`, `address`, `contact`, `parent`, `section`, `date`, `shift`) VALUES
('kushal', 'Male', 'kushal1', 'iamawesome', 3, 'BIM', 'BIM', 'parijat', 9860102155, 'sushil', 'durkhim', '2019-11-14', 'morning'),
('Kushal Bajracharya ', 'Male', 'kushal12', 'iamawesome', 11, 'BIM', 'BIM', 'parijat', 9860102155, 'sushil', 'durkhim', '2019-11-29', 'morning'),
('Rachana', 'Female', 'rachu12', 'rachu12', 6, 'BIM', 'BIM', 'bhairav road', 9865408020, 'chanda adhikari', 'labaris', '2000-06-25', 'morning'),
('ram', 'male', 'ram1', '123456789', 11, '11', 'Science', 'hetauda', 986012549, 'shyaam', 'mandal', '2019-11-20', 'day'),
('sita', 'female', 'sita1', '123456789', 12, '12', 'science', 'patan', 9860125557, 'ram', 'darwin', '2019-11-27', 'night');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `subject` varchar(255) NOT NULL,
  `subjectcode` varchar(255) NOT NULL,
  `Grade` varchar(255) NOT NULL,
  `pass_marks` varchar(255) NOT NULL,
  `full_marks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`subject`, `subjectcode`, `Grade`, `pass_marks`, `full_marks`) VALUES
('Compulsory Nepali', '003', '11', '40', '100'),
('Compulsory English', '004', '12', '40', '100'),
('Compulsory English ', '007', '11', '40', '100'),
('Principles of Accounting I', '124', '11', '40', '100'),
('Economics', '126', '11', '40', '100'),
('Computer Science', '130', '11', '27', '75'),
('Mathematics', '216', '12', '40', '100'),
('Principles of Accounting II', '224', '12', '40', '100'),
('Economics', '226', '12', '40', '100'),
('Computer Science', '230', '12', '27', '75'),
('Management Information System', 'IT_226', 'BIM', '20', '40'),
('Object Oriented Analysis and Design', 'IT_227', 'BIM', '20', '40'),
('Artificial Intelligence', 'IT_228', 'BIM', '20', '40'),
('Organizational Behavior', 'MGT_203', 'BIM', '30', '60'),
('Operations Management', 'MGT_205', 'BIM', '30', '60'),
('Business Strategy', 'MGT_208', 'BIM', '30', '60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tblexam`
--
ALTER TABLE `tblexam`
  ADD PRIMARY KEY (`subjectcode`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`username`,`subjectcode`),
  ADD KEY `subjectcode` (`subjectcode`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`subjectcode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblexam`
--
ALTER TABLE `tblexam`
  ADD CONSTRAINT `tblexam_ibfk_1` FOREIGN KEY (`subjectcode`) REFERENCES `tblsubject` (`subjectcode`);

--
-- Constraints for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD CONSTRAINT `tblresult_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tblstudent` (`username`),
  ADD CONSTRAINT `tblresult_ibfk_2` FOREIGN KEY (`subjectcode`) REFERENCES `tblsubject` (`subjectcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
