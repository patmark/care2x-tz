-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2018 at 12:32 PM
-- Server version: 5.7.20-0ubuntu0.17.04.1
-- PHP Version: 5.6.33-1+ubuntu17.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `care_nhif_claims`
--

CREATE TABLE `care_nhif_claims` (
  `FolioID` varchar(200) DEFAULT NULL,
  `ClaimYear` year(4) DEFAULT NULL,
  `ClaimMonth` int(2) DEFAULT NULL,
  `FolioNo` int(50) DEFAULT NULL,
  `SerialNo` varchar(50) DEFAULT NULL,
  `CardNo` varchar(50) DEFAULT NULL,
  `Age` int(3) DEFAULT NULL,
  `TelephoneNo` varchar(50) DEFAULT NULL,
  `encounter_nr` bigint(11) DEFAULT NULL,
  `claim_status` varchar(50) DEFAULT NULL,
  `CreatedBy` varchar(50) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `LastModifiedBy` varchar(50) DEFAULT NULL,
  `LastModified` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
