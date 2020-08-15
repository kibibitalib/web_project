-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 10:51 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rental`
--
CREATE DATABASE IF NOT EXISTS `rental` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rental`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `name`, `password`) VALUES
(1, 'admin', 'admin01');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE IF NOT EXISTS `house` (
  `houseNo` varchar(10) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`houseNo`),
  KEY `owner` (`owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`houseNo`, `type`, `location`, `owner`, `description`, `cost`, `picture`, `status`) VALUES
('ass3', 'appartement', 'flat', 'maimuna29', 'rrhrtszfsf', 50800, 'image/h8.jpg', NULL),
('gdg34', 'flat', 'cottage', 'maimuna29', 'rrhrtszfsf', 50000, 'image/h11.jpg', NULL),
('oi09', 'cottage', 'jumbi', 'khalid34', 'assajgb', 90000, 'image/h12.jpg', NULL),
('oijb', 'appartement', 'kwerkwe', 'khalid34', 'luxury', 50000, 'image/images3.jpg', NULL),
('sd009', 'cottage', 'jangwani', 'maimuna29', 'nice one', 50000, 'image/h5.jpg', NULL),
('sv21', 'cottage', 'mwera', 'khalid34', 'very nice', 700000, 'image/h7.jpg', NULL),
('ty79', 'cottage', 'dunga', NULL, '2 bed room and one master room', 60000, 'image/h14.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE IF NOT EXISTS `renter` (
  `RID` varchar(50) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `gender` char(6) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`RID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`RID`, `name`, `address`, `phone`, `gender`, `age`, `password`) VALUES
('ashura22', 'ashura', 'mikindani', 9533224, 'female', 22, '12345'),
('haji38', 'haji', 'fuoni', 9725244, 'male', 38, 'azsx'),
('khalid34', 'khalid', 'fuoni', 9876655, 'male', 34, '12345'),
('maimuna29', 'maimuna', 'nungwi', 9964322, 'female', 29, 'asdf'),
('mussa50', 'mussa', 'jangombe', 123445656, 'male', 50, 'asd'),
('nasra67', 'nasra', 'tunguu', 0, 'female', 67, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE IF NOT EXISTS `tenant` (
  `tID` varchar(10) NOT NULL,
  `tName` varchar(150) DEFAULT NULL,
  `tAddress` varchar(50) DEFAULT NULL,
  `tAge` int(11) DEFAULT NULL,
  `tGender` char(6) DEFAULT NULL,
  `tPhoneNo` int(11) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `rentingtime` varchar(50) DEFAULT NULL,
  `houseNo` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`tID`),
  KEY `houseNo` (`houseNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`tID`, `tName`, `tAddress`, `tAge`, `tGender`, `tPhoneNo`, `job`, `rentingtime`, `houseNo`) VALUES
('', 'ashura', 'nungwi', 25, 'female', 779889066, 'nurse', '0000-00-00', 'sv21');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`owner`) REFERENCES `renter` (`RID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`houseNo`) REFERENCES `house` (`houseNo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
